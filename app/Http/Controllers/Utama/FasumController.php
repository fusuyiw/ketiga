<?php

namespace App\Http\Controllers\Utama;

use App\Models\Facility;
use App\Http\Controllers\Controller;

class FasumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facilities = Facility::with('category')
            ->when(request(['search']), function ($query, $search) {
                return $query->filter($search);
            })
            ->orderBy('nama') // Urutkan berdasarkan nama fasilitas
            ->get()
            ->groupBy('category_id'); // Kelompokkan berdasarkan category_id

        $data = [
            "title" => 'Fasum',
            "nyala" => 'Fasum',
            "facilities" => $facilities,
        ];

        return view('utama.fasum', $data);
    }


    public function index_peta()
    {
        $facilities = Facility::with('category')
            ->whereIn('category_id', [1, 2, 3, 4, 5, 6, 7])
            ->get()
            ->groupBy('category_id');



        return view('utama.peta', [
            "title" => 'Peta',
            "st" => $facilities->get(1, collect()),
            "rs" => $facilities->get(2, collect()),
            "tk" => $facilities->get(3, collect()),
            "mall" => $facilities->get(4, collect()),
            "polsek" => $facilities->get(5, collect()),
            "kp" => $facilities->get(6, collect()),
            "pt" => $facilities->get(7, collect()),
            "nyala" => 'peta'
        ]);
    }

    public function index2()
    {
        // dd(request('search'));
        $facilities = Facility::with('category')
            ->whereIn('category_id', [1, 2, 3, 4, 5, 6, 7])
            ->get()
            ->groupBy('category_id');

        // Menghitung jumlah fasilitas untuk setiap kategori
        $countFacilities = $facilities->map(function ($items, $key) {
            return $items->count();
        });

        // Mengambil jumlah untuk masing-masing kategori
        $stCount = $countFacilities->get(1, 0);
        $rsCount = $countFacilities->get(2, 0);
        $tkCount = $countFacilities->get(3, 0);
        $mallCount = $countFacilities->get(4, 0);
        $polsekCount = $countFacilities->get(5, 0);
        $kpCount = $countFacilities->get(6, 0);
        $ptCount = $countFacilities->get(7, 0);

        $totalCount = $stCount + $rsCount + $tkCount + $mallCount + $polsekCount + $kpCount + $ptCount;

        return view('test', [
            "title" => 'MALOKA',
            "stCount" => $stCount,
            "rsCount" => $rsCount,
            "tkCount" => $tkCount,
            "mallCount" => $mallCount,
            "polsekCount" => $polsekCount,
            "kpCount" => $kpCount,
            "ptCount" => $ptCount,
            "totalCount" => $totalCount,
            "nyala" => '',

        ]);
    }
}
