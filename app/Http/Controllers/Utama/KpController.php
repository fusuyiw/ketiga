<?php

namespace App\Http\Controllers\Utama;

use App\Http\Controllers\Controller;
use App\Models\Facility;

class KpController extends Controller
{


    public function index_kp()
    {
        $facility = Facility::with('category')
            ->where('category_id', '6')
            ->filter(request(['search']))
            ->get();
        return view('utama.kp.tentang', [
            "title" => "Kantor Pemerintahan",
            "url" => "Kantor-Pemerintahan",
            "nyala" => 'Fasum',
            "latlng" => $facility
            // "latlng" => $facility
        ]);
    }
    //-----------------------------------------------------------
    public function show_kp($id)
    {
        return view('utama.kp.detail', [
            "title" => "Kantor Pemerintahan", //NANTI GANTI PAKE DB CATEGORIES
            "nyala" => 'Fasum',
            "detail" => Facility::find($id),
        ]);
    }
}
