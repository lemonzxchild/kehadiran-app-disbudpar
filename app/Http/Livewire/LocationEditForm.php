<?php

namespace App\Http\Livewire;

use App\Http\Traits\useUniqueValidation;
use App\Models\Location;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class LocationEditForm extends Component
{
    use useUniqueValidation;

    public $locations;

    public function mount(Collection $locations)
    {
        foreach ($locations as $location) {
            $this->locations = [];
            $this->locations = [
                'id' => $location->id,
                'title' => $location->title,
                'description' => $location->description,
                'latitude' => $location->latitude,
                'longitude' => $location->longitude,
            ];
        }
    }

    public function saveLocations()
    {
        $this->validate([
            'locations.title' => 'required',
            'locations.description' => 'required',
            'locations.latitude' => 'required',
            'locations.longitude' => 'required',
        ]);

        $affected = 0;
        // alasan menggunakan create alih2 mengunakan ::insert adalah karena tidak looping untuk menambahkan created_at dan updated_at

        $locationBeforeUpdated = Location::find($this->locations['id']);

        $affected += $locationBeforeUpdated->update([
            'title' => $this->locations['title'],
            'description' => $this->locations['description'],
            'latitude' => $this->locations['latitude'],
            'longitude' => $this->locations['longitude'],
        ]);

        $message = $affected === 0 ?
            "Tidak ada data lokasi yang diubah." :
            "Ada $affected data lokasi yang berhasil diedit.";

        return redirect()->route('locations.index')->with('success', $message);
    }

    public function render()
    {
        return view('livewire.location-edit-form');
    }
}
