<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Category;
use App\Models\Kecamatan;
use App\Models\Kelurahan;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.fasum.read', [
            'title' => "Read-Fasum",
            'url_create' => "/dashboard/fasum/create",
            'url_del' => "/dashboard/fasum",
            'data' => Facility::all(),
            'url' => 'fasum'

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.fasum.create', [
            'title' => "Create-Fasum",
            'categories' => Category::all(),
            'kelurahans' => Kelurahan::all(),
            'kecamatans' => Kecamatan::all(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255|unique:facilities',
            'alamat' => 'required',
            'tipe' => 'nullable',
            'web' => 'nullable',
            'telpon' => 'nullable',
            'lat' => [
                'required',
                'unique:facilities',
                'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'
            ],
            'lng' => [
                'required',
                'unique:facilities',
                'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+)))|(180(\.0+)?)$/'
            ],
            'category_id' => 'required',
            'kelurahan_id' => 'required',
            'kecamatan_id' => 'required',
            'pelayanan' => 'required',
            'deskripsi' => 'nullable',
            'images.*' => 'image|file'
        ]);

        $images = [];

        // Mengelola setiap file yang diunggah
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $filename = $file->store('images');
                $images[] = str_replace('public/', '', $filename);
            }
        }

        // Simpan data fasilitas dengan array images
        $validatedData['images'] = $images;
        Facility::create($validatedData);

        return redirect('dashboard/fasum')->with('success', 'Data Fasum Telah Berhasil Ditambahkan!!!');
    }


    /**
     * Display the specified resource.
     */
    public function show($fasum)
    {
        return view('dashboard.fasum.index', [
            'data' => Facility::find($fasum), 'title' => "{$fasum}",
        ]);

        // $facility = Facility::find($fasum);
        // if (!$facility) {
        //     return response()->json(['message' => 'Facility not found'], 404);
        // }
        // return response()->json($facility);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $facility = Facility::findOrFail($id);
        $categories = Category::all();
        $kelurahans = Kelurahan::all();
        $kecamatans = Kecamatan::all();

        // return view('dashboard.fasum.edit', compact('facility', 'categories', 'kelurahans', 'kecamatans'));
        return ($facility);
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
    public function destroy(Facility $fasum)
    {

        $fasum->delete();
        // return ($fasum);
        return redirect('dashboard/fasum')->with('success', 'Data berhasil dihapus!');
    }
}
