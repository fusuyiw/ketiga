<?php

namespace App\Http\Controllers\Utama;

use App\Http\Controllers\Controller;
use App\Models\Facility;

class PtController extends Controller
{


    public function index_pt()
    {
        $facility = Facility::with('category')
            ->where('category_id', '7')
            ->filter(request(['search']))
            ->get();
        return view('utama.pt.tentang', [
            "title" => "Perguruan Tinggi",
            "url" => "Perguruan-Tinggi",
            "nyala" => 'Fasum',
            "latlng" => $facility
            // "latlng" => $facility
        ]);
    }
    //-----------------------------------------------------------
    public function show_pt($id)
    {
        return view('utama.pt.detail', [
            "title" => "Perguruan Tinggi", //NANTI GANTI PAKE DB CATEGORIES
            "nyala" => 'Fasum',
            "detail" => Facility::find($id),
        ]);
    }
}
