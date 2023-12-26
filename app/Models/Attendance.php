<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\URL;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use GuzzleHttp\Client;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_time',
        'batas_start_time',
        'end_time',
        'batas_end_time',
        'code'
    ];

    protected $appends = ['data'];

    protected static function isWeekendToday()
    {
        $dayOfWeek = date('w');
        return ($dayOfWeek == 0 || $dayOfWeek == 6); // 6 = Saturday & 0 = Sunday
    }

    protected function data(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                $now = now();
                $startTime = Carbon::parse($this->start_time);
                $batasStartTime = Carbon::parse($this->batas_start_time);
                $endTime = Carbon::parse($this->end_time);
                $batasEndTime = Carbon::parse($this->batas_end_time);

                $url = 'https://api-harilibur.vercel.app/api';
                // $client = new Client();
                $client = new Client([
                    'verify' => false,
                ]);
                // Using Guzzle to make a single HTTP request
                $response = $client->get($url);
                $dataLiburNasional = json_decode($response->getBody(), true);

                $getLiburApi = [];

                foreach ($dataLiburNasional as $liburNasional) {
                    if ($liburNasional['is_national_holiday'] && $liburNasional['holiday_date'] === now()->toDateString()) {
                        $getLiburApi = $liburNasional;
                        break;
                    }
                }

                $checkHolidayToday = Holiday::query()
                    ->where('holiday_date', now()->toDateString())
                    ->get();

                if ($checkHolidayToday->count() > 0) {
                    $isHolidayToday = Holiday::query()
                        ->where('holiday_date', now()->toDateString())
                        ->get();
                } else {
                    // Check if today is a weekend
                    if (self::isWeekendToday()) {
                        $isHolidayToday = \Illuminate\Database\Eloquent\Collection::make([
                            new \App\Models\Holiday([
                                'id' => 1,
                                'title' => 'Libur Akhir Pekan',
                                'description' => 'Hari Libur Sabtu & Minggu',
                                'holiday_date' => now()->toDateString(),
                                'created_at' => now()->toDateTimeString(),
                                'updated_at' => now()->toDateTimeString(),
                            ]),
                        ]);
                    } elseif (count($getLiburApi) > 0) {
                        $isHolidayToday = \Illuminate\Database\Eloquent\Collection::make([
                            new \App\Models\Holiday([
                                'id' => 1,
                                'title' => $getLiburApi['holiday_name'],
                                'description' => $getLiburApi['holiday_name'],
                                'holiday_date' => now()->toDateString(),
                                'created_at' => now()->toDateTimeString(),
                                'updated_at' => now()->toDateTimeString(),
                            ]),
                        ]);
                    } else {
                        $isHolidayToday = collect([]);
                    }
                }

                return (object) [
                    "start_time" => $this->start_time,
                    "batas_start_time" => $this->batas_start_time,
                    "end_time" => $this->end_time,
                    "batas_end_time" => $this->batas_end_time,
                    "now" => $now->format("H:i:s"),
                    "is_start" => $startTime <= $now && $batasStartTime >= $now,
                    "is_end" => $endTime <= $now && $batasEndTime >= $now,
                    'is_using_qrcode' => $this->code ? true : false,
                    'is_holiday_today' => $isHolidayToday->isNotEmpty(),
                    'holiday' => $isHolidayToday->first(),
                ];
            },
        );
    }



    public function scopeForCurrentUser($query, $userPositionId)
    {
        $query->whereHas('positions', function ($query) use ($userPositionId) {
            $query->where('position_id', $userPositionId);
        });
    }

    public function positions()
    {
        return $this->belongsToMany(Position::class);
    }

    public function presences()
    {
        return $this->hasMany(Presence::class);
    }
}
