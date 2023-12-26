<?php

namespace App\Http\Livewire;

use App\Models\Attendance;
use App\Models\Presence;
use Carbon\Carbon;
use DateTime;
use Livewire\Component;
use Ramsey\Uuid\Type\Time;

class PresenceForm extends Component
{
    public Attendance $attendance;
    public $holiday;
    public $data;

    public function mount(Attendance $attendance)
    {
        $this->attendance = $attendance;
    }

    // NOTED: setiap method send presence agar lebih aman seharusnya menggunakan if statement seperti diviewnya

    public function sendEnterPresence()
    {
        if ($this->attendance->data->is_start && !$this->attendance->data->is_using_qrcode) { // sama (harus) dengan view
            Presence::create([
                "user_id" => auth()->user()->id,
                "attendance_id" => $this->attendance->id,
                "presence_date" => now()->toDateString(),
                "presence_enter_time" => now()->toTimeString(),
                "presence_out_time" => null
            ]);

            // untuk refresh if statement
            $this->data['is_has_enter_today'] = true;
            $this->data['is_not_out_yet'] = true;

            return $this->dispatchBrowserEvent('showToast', ['success' => true, 'message' => "Kehadiran atas nama '" . auth()->user()->name . "' berhasil dikirim."]);
        }
    }

    public function sendOutPresence()
    {
        // jika absensi sudah jam pulang (is_end) dan tidak menggunakan qrcode (kebalikan)
        if (!$this->attendance->data->is_end && $this->attendance->data->is_using_qrcode) // sama (harus) dengan view
            return false;

        $presence = Presence::query()
            ->where('user_id', auth()->user()->id)
            ->where('attendance_id', $this->attendance->id)
            ->where('presence_date', now()->toDateString())
            ->where('presence_out_time', null)
            ->where('working_hours', null)
            ->first();

        if (!$presence) // hanya untuk sekedar keamanan (kemungkinan)
            return $this->dispatchBrowserEvent('showToast', ['success' => false, 'message' => "Terjadi masalah pada saat melakukan absensi."]);

        // untuk refresh if statement
        $this->data['is_not_out_yet'] = false;

        //waktu masuk
        $enterTime = $presence->presence_enter_time;

        //dikurang waktu keluar
        $totalWorkingHours = now()->diffInSeconds($enterTime);

        $timeTotal = gmdate('H:i:s', $totalWorkingHours);
        $timeTotalexpd = explode(':', $timeTotal);
        $totalTime = $timeTotalexpd[0];

        //jika waktu kerja kurang
        if ($totalTime > 8) {
            $workingTimeStatus = 1;
        } else {
            $workingTimeStatus = 0;
        }

        $presence->update([
            'presence_out_time' => now()->toTimeString(), 'working_hours' => gmdate('H:i:s', $totalWorkingHours),
            'is_working_hours_status' => $workingTimeStatus
        ]);
        return $this->dispatchBrowserEvent('showToast', ['success' => true, 'message' => "Atas nama '" . auth()->user()->name . "' berhasil melakukan absensi pulang."]);
    }

    public function render()
    {
        return view('livewire.presence-form');
    }
}
