<?php

namespace App\Http\Livewire;

use App\Models\Partof;
use App\Models\Position;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;

class PositionCreateForm extends Component
{
    public $positions;
    public Collection $partofs;

    public function mount()
    {
        $this->partofs = Partof::all();
        $this->positions = [
            ['name' => '', 'partof_id' => $this->partofs->first()->id]
        ];
    }

    public function addPositionInput(): void
    {
        $this->positions[] = ['name' => '', 'partof_id' => $this->partofs->first()->id];
    }

    public function removePositionInput(int $index): void
    {
        unset($this->positions[$index]);
        $this->positions = array_values($this->positions);
    }

    public function savePositions()
    {
        $partofIdRuleIn = join(',', $this->partofs->pluck('id')->toArray());

        $this->validate([
            'positions.0.name' => 'required',
            'positions.*.partof_id' => 'required|in:' . $partofIdRuleIn,
        ], ['positions.0.name.required' => 'Setidaknya input posisi pertama wajib diisi.']);

        // ambil input/request dari position yang berisi
        $positions = array_filter($this->positions, function ($a) {
            return trim($a['name']) !== "";
        });

        // alasan menggunakan create alih2 mengunakan ::insert adalah karena tidak looping untuk menambahkan created_at dan updated_at
        foreach ($this->positions as $position) {

            $positionData = Position::create($position);

            // Position::create($position)
        }

        redirect()->route('positions.index')->with('success', 'Data posisi berhasil ditambahkan.');
    }

    public function render()
    {
        return view('livewire.position-create-form');
    }
}
