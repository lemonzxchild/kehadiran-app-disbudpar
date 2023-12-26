<?php

namespace App\Http\Controllers;

use App\Models\Partof;
use Illuminate\Http\Request;

class PartofController extends Controller
{
    public function index()
    {
        return view('partofs.index', [
            "title" => "Bagian"
        ]);
    }

    public function create()
    {
        return view('partofs.create', [
            "title" => "Tambah Bagian"
        ]);
    }

    public function edit()
    {
        $ids = request('ids');
        if (!$ids)
            return redirect()->back();
        $ids = explode('-', $ids);

        $partofs = Partof::query()->whereIn('id', $ids)->get();

        return view('partofs.edit', [
            "title" => "Edit Data Bagian",
            "partofs" => $partofs
        ]);
    }
}
