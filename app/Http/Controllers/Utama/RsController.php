<?php

namespace App\Http\Controllers\Utama;

use App\Models\Facility;
use App\Http\Controllers\Controller;

class RsController extends Controller
{


    public function index_rs()
    {
        $facility = Facility::with('category')
            ->where('category_id', '2')
            ->filter(request(['search']))
            ->get();
        return view('utama.rs.tentang', [
            "title" => "Rumah Sakit",
            "url" => "Rumah-Sakit",
            "nyala" => 'Fasum',
            "latlng" => $facility
            // "latlng" => $facility
        ]);
    }
    //-----------------------------------------------------------
    public function show_rs($id)
    {
        return view('utama.rs.detail', [
            "title" => "Rumah Sakit",
            "nyala" => 'Fasum',
            "detail" => Facility::find($id),
        ]);
    }
    public function show_peta($id)
    {
        return view('utama.rs.detail', [
            "title" => "Maloka",
            "nyala" => 'Fasum',
            "detail" => Facility::find($id),
        ]);
    }
}
