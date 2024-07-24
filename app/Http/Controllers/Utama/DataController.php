<?php

namespace App\Http\Controllers\Utama;

use App\Http\Controllers\Controller;
use App\Models\Facility;

class DataController extends Controller
{
    public function index_st()
    {
        $facility = Facility::with('category')
            ->where('category_id', '1')
            ->filter(request(['search']))
            ->get();
        return view('utama.tentang', [
            "title" => "Sarana Transportasi", //NANTI GANTI PAKE DB CATEGORIES
            "url" => "Sarana-Transportasi", //NANTI GANTI PAKE DB CATEGORIES
            "latlng" => $facility
            // "latlng" => $facility
        ]);
    }
    //-----------------------------------------------------------
    public function show_st($id)
    {
        return view('utama.detail', [
            "title" => "Sarana Transportasi", //NANTI GANTI PAKE DB CATEGORIES
            "detail" => facility::find($id),
        ]);
    }

    public function index_rs()
    {
        $facility = Facility::with('category')
            ->where('category_id', '2')
            ->filter(request(['search']))
            ->get();
        return view('utama.tentang', [
            "title" => "Rumah Sakit",
            "url" => "Rumah-Sakit",
            "latlng" => $facility
            // "latlng" => $facility
        ]);
    }
    //-----------------------------------------------------------
    public function show_rs($id)
    {
        return view('utama.detail', [
            "title" => "Rumah Sakit", //NANTI GANTI PAKE DB CATEGORIES
            "detail" => Facility::find($id),
        ]);
    }

    public function index_tk()
    {
        $facility = Facility::with('Category')
            ->where('category_id', '3')
            ->filter(request(['search']))
            ->get();
        return view('utama.tentang', [
            "title" => "Taman Kota", //NANTI GANTI PAKE DB CATEGORIES
            "url" => "Taman-Kota", //NANTI GANTI PAKE DB CATEGORIES
            "latlng" => $facility
        ]);
    }
    //-----------------------------------------------------------
    public function show_tk($id)
    {
        return view('utama.detail', [
            "title" => "Taman Kota", //NANTI GANTI PAKE DB CATEGORIES
            "detail" => facility::find($id),
        ]);
    }

    public function index_mall()
    {
        $facility = Facility::with('category')
            ->where('category_id', '4')
            ->filter(request(['search']))
            ->get();
        return view('utama.tentang', [
            "title" => "Pusat Perbelanjaan",
            "latlng" => $facility,
            "url" => "Pasar-Modern"
            // "latlng" => $facility
        ]);
    }
    //-----------------------------------------------------------
    public function show_mall($id)
    {
        return view('utama.detail', [
            "title" => "Pusat Perbelanjaan", //NANTI GANTI PAKE DB CATEGORIES
            "detail" => facility::find($id),
        ]);
    }

    public function index_polsek()
    {
        $facility = Facility::with('category')
            ->where('category_id', '5')
            ->filter(request(['search']))
            ->get();
        return view('utama.tentang', [
            "title" => "Kantor Kepolisian Sektor",
            "url" => "Polsek",
            "latlng" => $facility

        ]);
    }
    //-----------------------------------------------------------
    public function show_polsek($nama_fasum)
    {
        return view('utama.detail', [
            "title" => "Polsek", //NANTI GANTI PAKE DB CATEGORIES
            "detail" => facility::find($nama_fasum),
        ]);
    }

    public function index_kp()
    {
        $facility = Facility::with('category')
            ->where('category_id', '6')
            ->filter(request(['search']))
            ->get();
        return view('utama.tentang', [
            "title" => "Kantor Pemerintahan",
            "url" => "Polsek",
            "latlng" => $facility

        ]);
    }
    //-----------------------------------------------------------
    public function show_kp($nama_fasum)
    {
        return view('utama.detail', [
            "title" => "Kantor Pemerintahan", //NANTI GANTI PAKE DB CATEGORIES
            "detail" => facility::find($nama_fasum),
        ]);
    }

    public function index_pt()
    {
        $facility = Facility::with('category')
            ->where('category_id', '7')
            ->filter(request(['search']))
            ->get();
        return view('utama.tentang', [
            "title" => "Perguruan Tinggi",
            "url" => "Perguruan Tinggi",
            "latlng" => $facility

        ]);
    }
    //-----------------------------------------------------------
    public function show_pt($nama_fasum)
    {
        return view('utama.detail', [
            "title" => "Perguruan Tinggi", //NANTI GANTI PAKE DB CATEGORIES
            "detail" => facility::find($nama_fasum),
        ]);
    }
}
