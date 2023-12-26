<?php

namespace App\Http\Livewire;

use App\Models\Partof;
use App\Models\Position;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class PositionEditForm extends Component
{
    public $positions = [];
    public Collection $partofs;

    public function mount(Collection $positions)
    {
        $this->positions = []; // hapus positions collection
        foreach ($positions as $position) {
            $this->positions[] = [
                'id' => $position->id,
                'name' => $position->name,
                'partof_id' => $position->partof_id
            ];
        }

        $this->partofs = Partof::all();
    }

    public function savePositions()
    {
        $partofIdRuleIn = join(',', $this->partofs->pluck('id')->toArray());

        $this->validate([
            'positions.*.name' => 'required',
            'positions.*.partof_id' => 'required|in:' . $partofIdRuleIn,
        ]);

        // alasan menggunakan create alih2 mengunakan ::insert adalah karena tidak looping untuk menambahkan created_at dan updated_at
        $affected = 0;
        foreach ($this->positions as $position) {
            // cek unique validasi
            $positionBeforeUpdated = Position::find($position['id']);

            $affected += $positionBeforeUpdated->update([
                'name' => $position['name'],
                'partof_id' => $position['partof_id'],
            ]);
        }

        $message = $affected === 0 ?
            "Tidak ada data posisi yang diubah." :
            "Ada $affected data posisi yang berhasil diedit.";

        return redirect()->route('positions.index')->with('success', $message);
    }

    public function render()
    {
        return view('livewire.position-edit-form');
    }
}
