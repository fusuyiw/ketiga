<?php

namespace App\Http\Controllers\Utama;

use App\Http\Controllers\Controller;
use App\Models\Facility;

class TkController extends Controller
{


    public function index_tk()
    {
        $facility = Facility::with('category')
            ->where('category_id', '3')
            ->filter(request(['search']))
            ->get();
        return view('utama.tk.tentang', [
            "title" => "Taman Kota",
            "url" => "Taman-Kota",
            "nyala" => 'Fasum',
            "latlng" => $facility
            // "latlng" => $facility
        ]);
    }
    //-----------------------------------------------------------
    public function show_tk($id)
    {
        return view('utama.tk.detail', [
            "title" => "Taman Kota", //NANTI GANTI PAKE DB CATEGORIES
            "nyala" => 'Fasum',
            "detail" => Facility::find($id),
        ]);
    }
}
