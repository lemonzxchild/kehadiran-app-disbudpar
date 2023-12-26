<?php

namespace App\Http\Livewire;

use App\Models\Attendance;
use Illuminate\Support\Str;

class AttendanceEditForm extends AttendanceAbstract
{
    public $initialCode;

    public function mount()
    {
        parent::mount();
        // format time
        $this->attendance['start_time'] = substr($this->attendance['start_time'], 0, -3);
        $this->attendance['batas_start_time'] = substr($this->attendance['batas_start_time'], 0, -3);
        $this->attendance['end_time'] = substr($this->attendance['end_time'], 0, -3);
        $this->attendance['batas_end_time'] = substr($this->attendance['batas_end_time'], 0, -3);

        // $this->initialCode = $this->attendance['code']; // ini untuk pengecekan/mengatasi update code
        // $this->attendance['code'] = $this->initialCode ? true : false; // untuk kondisi apakah input code checked

        $this->position_ids = $this->attendance->positions()->pluck('positions.id', 'positions.id')->toArray();
    }

    public function save()
    {
        // filter value before validate (ambil yang hanya checked)
        $this->position_ids = array_filter($this->position_ids, function ($id) {
            return is_numeric($id);
        });
        $position_ids = array_values($this->position_ids);

        $this->validate([
            'attendance.description' => 'required',
            'attendance.start_time' => 'required|time_format',
            'attendance.batas_start_time' => 'required|time_format',
            'attendance.end_time' => 'required|time_format',
            'attendance.batas_end_time' => 'required|time_format',
        ], [
            'attendance.description.required' => 'Tidak boleh kosong.',
            'attendance.start_time.required' => 'Start time is required.',
            'attendance.batas_start_time.required' => 'Batas start time is required.',
            'attendance.end_time.required' => 'End time is required.',
            'attendance.batas_end_time.required' => 'Batas end time is required.',
            'attendance.*.time_format' => 'Invalid time format. The time should be in the format HH:ii.',
        ]);


        $attendance = [];
        if (!$this->attendance->code) {
            $this->attendance->code = null;
            $attendance = $this->attendance->toArray();
        } else {
            $attendance = $this->attendance->toArray();
            // generate code baru jika sebelumnya attendance menggunakan button (atau diubah)
            if (!$this->initialCode) {
                $attendance['code'] = Str::random();
            } else {
                $attendance['code'] = $this->initialCode;
            }
        }

        $this->attendance->update($attendance);
        $this->attendance->positions()->sync($position_ids);

        redirect()->route('attendances.index')->with('success', "Data presensi berhasil diubah.");
    }

    public function render()
    {
        return view('livewire.attendance-edit-form');
    }
}
