<?php

namespace App\Http\Controllers\Utama;

use App\Http\Controllers\Controller;
use App\Models\Facility;

class StController extends Controller
{


    public function index_st()
    {
        $facility = Facility::with('category')
            ->where('category_id', '1')
            ->filter(request(['search']))
            ->get();
        return view('utama.st.tentang', [
            "title" => "Sarana Transportasi", //NANTI GANTI PAKE DB CATEGORIES
            "url" => "Sarana-Transportasi", //NANTI GANTI PAKE DB CATEGORIES
            "nyala" => 'Fasum',
            "latlng" => $facility
            // "latlng" => $facility
        ]);
    }
    //-----------------------------------------------------------
    public function show_st($id)
    {
        return view('utama.st.detail', [
            "title" => "Sarana Transportasi", //NANTI GANTI PAKE DB CATEGORIES
            "nyala" => 'Fasum',
            "detail" => facility::find($id),
        ]);
    }
}
