<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\Kelurahan;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kelurahan.index', [
            'title' => "Read-Kelurahan",
            'url_create' => "/dashboard/kelurahan/create",
            'url_del' => "/dashboard/kelurahan/",
            'url' => 'kelurahan',
            'data' => Kelurahan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kelurahan.create', [
            'title' => "Create-Kelurahan",
            'kecamatans' => Kecamatan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $validatedData = $request->validate([
            'nama' => 'required|max:255|unique:kelurahans',
            'kecamatan_id' => 'required'
        ]);
        Kelurahan::create($validatedData);
        return redirect('dashboard/kelurahan/create')->with('succes', 'Data Fasum Telah Berhasil Ditambahkan!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show($kelurahan)
    {
        return view('dashboard.kelurahan.index', [
            'data' => Kelurahan::find($kelurahan), 'title' => "{$kelurahan}",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        return ($kelurahan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelurahan $kelurahan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelurahan $kelurahan)
    {
        $kelurahan->delete();
        // return ($fasum);
        return redirect('dashboard/kelurahan')->with('success', 'Data berhasil dihapus!');
    }
}
