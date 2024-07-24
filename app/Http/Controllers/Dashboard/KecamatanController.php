<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kecamatan;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.read', [
            'title' => "Read-Kecamatan",
            'url_create' => "/dashboard",
            'url_del' => "/dashboard/kecamatan/",
            'data' => Kecamatan::all(),
            'url' => 'kecamatan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kecamatan.create', [
            'title' => "Create-Kecamatan",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|max:255|unique:kecamatans,nama',
            'geojson' => 'file|mimes:geojson,json'
        ]);

        // Simpan file GeoJSON
        $geojsonFilePath = $request->file('geojson')->store('geojson_kecamatan');

        // Simpan data kecamatan ke database
        $kecamatan = new Kecamatan();
        $kecamatan->nama = $validatedData['nama'];
        $kecamatan->geojson = $geojsonFilePath;
        $kecamatan->save();

        // Redirect dengan pesan sukses
        return redirect()->route('kecamatan.create')->with('success', 'Data Kecamatan Telah Berhasil Ditambahkan!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show($kecamatan)
    {

        return view('dashboard.kecamatan.index', [
            'data' => Kecamatan::find($kecamatan), 'title' => "{$kecamatan}",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        return ($kecamatan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kecamatan $kecamatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kecamatan $kecamatan)
    {
        $kecamatan->delete();
        // return ($fasum);
        return redirect('dashboard/kecamatan')->with('success', 'Data berhasil dihapus!');
    }
}
