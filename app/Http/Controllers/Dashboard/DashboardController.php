<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Facility;
use App\Models\Category;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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

        return view('dashboard.index', [
            "title" => 'Dashboard',
            "latlng" => Facility::latest()->filter(request(['search']))->get(),
            "stCount" => $stCount,
            "rsCount" => $rsCount,
            "tkCount" => $tkCount,
            "mallCount" => $mallCount,
            "polsekCount" => $polsekCount,
            "kpCount" => $kpCount,
            "ptCount" => $ptCount,
            "totalCount" => $totalCount,
        ]);
    }

    public function fasum()
    {
        return view('dashboard.read', [
            'title' => "Read-Fasum",
            'data' => Facility::all()
        ]);
    }

    public function category()
    {
        return view('dashboard.read', [
            'title' => "Read-Category",
            'data' => Category::all()
        ]);
    }

    public function kecamatan()
    {
        return view('dashboard.read', [
            'title' => "Read-Kecamatan",
            'data' => Kecamatan::all()
        ]);
    }

    public function kelurahan()
    {
        return view('dashboard.read', [
            'title' => "Read-Kelurahan",
            'data' => Kelurahan::all()
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create_fasum()
    {
        return ('Ini Halaman Create');
    }

    public function create_category()
    {
        return ('Ini Halaman Create');
    }

    public function create_kecamatan()
    {
        return ('Ini Halaman Create');
    }

    public function create_kelurahan()
    {
        return ('Ini Halaman Create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Facility $facility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facility $facility)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facility $facility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facility $facility)
    {
        //
    }
}
