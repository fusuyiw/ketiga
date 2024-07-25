<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use App\Models\Facility;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
            'pelayanan' => 'nullable',
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
        $fasum = Facility::findOrFail($id);
        $categories = Category::all();
        $kelurahans = Kelurahan::all();
        $kecamatans = Kecamatan::all();
        $title = 'Edit Fasilitas Umum'; // Ubah sesuai kebutuhan Anda

        return view('dashboard.fasum.edit', compact('fasum', 'categories', 'kelurahans', 'kecamatans', 'title'));
    }



    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'category_id' => 'required',
            'alamat' => 'required',
            'kelurahan_id' => 'required',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'web' => 'nullable',
            'telpon' => 'nullable',
            'deskripsi' => 'nullable',
        ]);

        $fasum = Facility::findOrFail($id);

        $fasum->nama = $request->nama;
        $fasum->category_id = $request->category_id;
        $fasum->alamat = $request->alamat;
        $fasum->tipe = $request->tipe;
        $fasum->kelurahan_id = $request->kelurahan_id;
        $fasum->kelurahan->kecamatan_id = $request->kecamatan_id;
        $fasum->lat = $request->lat;
        $fasum->lng = $request->lng;
        $fasum->pelayanan = $request->pelayanan;
        $fasum->web = $request->web;
        $fasum->telpon = $request->telpon;
        $fasum->deskripsi = $request->deskripsi;

        // Jika ada gambar baru yang diunggah
        if ($request->hasFile('images')) {
            // Hapus gambar lama
            if ($fasum->images) {
                $oldImages = is_array($fasum->images) ? $fasum->images : json_decode($fasum->images, true);
                foreach ($oldImages as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
            $images = [];

            // Mengelola setiap file yang diunggah
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    $filename = $file->store('images');
                    $images[] = str_replace('public/', '', $filename);
                }
            }
            // Simpan gambar baru
            $images = [];
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $filename = $file->store('images');
                    $images[] = str_replace('public/', '', $filename);
                }
                $fasum->images = json_encode($images, JSON_UNESCAPED_SLASHES);
            }
        }

        $fasum->save();

        return redirect('/dashboard/fasum')->with('success', 'Fasilitas Umum berhasil diupdate!');
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
