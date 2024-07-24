<?php

namespace App\Http\Controllers\Utama;

use App\Http\Controllers\Controller;
use App\Models\Facility;

class PolsekController extends Controller
{


    public function index_polsek()
    {
        $facility = Facility::with('category')
            ->where('category_id', '5')
            ->filter(request(['search']))
            ->get();
        return view('utama.polsek.tentang', [
            "title" => "Polsek", //NANTI GANTI PAKE DB CATEGORIES
            "url" => "Polsek", //NANTI GANTI PAKE DB CATEGORIES
            "nyala" => 'Fasum',
            "latlng" => $facility
            // "latlng" => $facility
        ]);
    }
    //-----------------------------------------------------------
    public function show_polsek($id)
    {
        return view('utama.polsek.detail', [
            "title" => "Polsek", //NANTI GANTI PAKE DB CATEGORIES
            "nyala" => 'Fasum',
            "detail" => facility::find($id),
        ]);
    }
}
