<?php

namespace App\Http\Livewire;

use App\Models\Partof;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class PartofEditForm extends Component
{
    public $partofs = [];

    public function mount(Collection $partofs)
    {
        $this->partofs = []; // hapus partofs collection
        foreach ($partofs as $partof) {
            $this->partofs[] = ['id' => $partof->id, 'name' => $partof->name];
        }
    }

    public function savePartofs()
    {
        // tidak mengimplementasikan validasi, karena jika input kosong berarti data tersebut tidak akan diubah
        // ambil input/request dari position yang berisi
        $partofs = array_filter($this->partofs, function ($a) {
            return trim($a['name']) !== "";
        });

        $affected = 0;
        foreach ($partofs as $partof) {
            $affected += Partof::find($partof['id'])->update(['name' => $partof['name']]);
        }

        $message = $affected === 0 ?
            "Tidak ada data bagian yang diubah." :
            "Ada $affected data bagian yang berhasil diedit.";

        return redirect()->route('partofs.index')->with('success', $message);
    }

    public function render()
    {
        return view('livewire.partof-edit-form');
    }
}
