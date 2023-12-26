<?php

namespace App\Http\Livewire;

use App\Models\Location;
use Livewire\Component;

class LocationCreateForm extends Component
{
    public $locations = [
        'title' => '',
        'description' => '',
        'latitude' => '',
        'longitude' => '',
    ];

    protected $rules = [
        'locations.title' => 'required',
        'locations.description' => 'required',
        'locations.latitude' => 'required|numeric',
        'locations.longitude' => 'required|numeric',
    ];

    public function saveLocations()
    {
        $this->validate([
            'locations.title' => 'required',
            'locations.description' => 'required',
            'locations.latitude' => 'required|numeric',
            'locations.longitude' => 'required|numeric',
        ]);

        Location::create($this->locations);

        session()->flash('success', 'Data lokasi berhasil ditambahkan.');
        return redirect()->route('locations.index');
    }

    public function updatedLocationsLatitude($value)
    {
        $this->locations['latitude'] = $value;
    }

    public function updatedLocationsLongitude($value)
    {
        $this->locations['longitude'] = $value;
    }

    public function render()
    {
        return view('livewire.location-create-form');
    }
}
