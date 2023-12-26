<?php

namespace App\Http\Livewire;

use App\Models\Partof;
use Livewire\Component;
use phpDocumentor\Reflection\Types\Boolean;

class PartofCreateForm extends Component
{
    public $partofs;

    public function mount()
    {
        $this->partofs = [
            ['name' => '']
        ];
    }

    public function addPartofInput(): void
    {
        $this->partofs[] = ['name' => ''];
    }

    public function removePartofInput(int $index): void
    {
        unset($this->partofs[$index]);
        $this->partofs = array_values($this->partofs);
    }

    public function savePartofs()
    {

        $this->validate([
            'partofs.0.name' => 'required'
        ], ['partofs.0.name.required' => 'Setidaknya input bagian pertama wajib diisi.']);

        // ambil input/request dari partof yang berisi
        $partofs = array_filter($this->partofs, function ($a) {
            return trim($a['name']) !== "";
        });

        // alasan menggunakan create alih2 mengunakan ::insert adalah karena tidak looping untuk menambahkan created_at dan updated_at
        foreach ($partofs as $partof) {
            Partof::create($partof);
        }

        redirect()->route('partofs.index')->with('success', 'Data bagian berhasil ditambahkan.');
    }

    public function render()
    {
        return view('livewire.partof-create-form');
    }
}
