<?php

namespace App\Http\Controllers\Utama;

use App\Http\Controllers\Controller;
use App\Models\Facility;

class MallController extends Controller
{


    public function index_mall()
    {
        $facility = Facility::with('category')
            ->where('category_id', '4')
            ->filter(request(['search']))
            ->get();
        return view('utama.mall.tentang', [
            "title" => "Mall",
            "url" => "Mall",
            "nyala" => 'Fasum',
            "latlng" => $facility
            // "latlng" => $facility
        ]);
    }
    //-----------------------------------------------------------
    public function show_mall($id)
    {
        return view('utama.mall.detail', [
            "title" => "Mall", //NANTI GANTI PAKE DB CATEGORIES
            "nyala" => 'Fasum',
            "detail" => Facility::find($id),
        ]);
    }
}
