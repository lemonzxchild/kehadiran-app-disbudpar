<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {

        return view('locations.index', [
            "title" => "Lokasi Kerja"
        ]);
    }

    public function create()
    {
        return view('locations.create', [
            "title" => "Tambah Data Lokasi"
        ]);
    }

    public function store(Request $request)
    {

        Location::create([
            'title' => $request->title,
            'description' => $request->description,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'distance' => $request->distance,
        ]);

        session()->flash('success', 'Data lokasi berhasil ditambahkan.');
        return redirect()->route('locations.index');
    }


    // public function edit()
    // {
    //     $ids = request('ids');
    //     if (!$ids)
    //         return redirect()->back();
    //     $ids = explode('-', $ids);

    //     $locations = Location::query()
    //         ->whereIn('id', $ids)
    //         ->get();

    //     return view('locations.edit', [
    //         "title" => "Edit Data Lokasi Kerja",
    //         "locations" => $locations
    //     ]);
    // }
}
