<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.read', [
            'title' => "Read-Category",
            'url_create' => "/dashboard/kategori/create",
            'url_del' => "/dashboard/kategori/",
            'url' => "kategori",
            'data' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.create.kategori', [
            'title' => "create-Category",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $validatedData = $request->validate([
            'nama' => 'required|max:255|unique:categories'
        ]);
        Category::create($validatedData);
        return redirect('dashboard/kategori/create')->with('succes', 'Kategori Telah Berhasil Ditambahkan!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show($category)
    {
        return view('dashboard.kategori.index', [
            'data' => Category::find($category), 'title' => "{$category}",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return ($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        // return ($fasum);
        return redirect('dashboard/category')->with('success', 'Data berhasil dihapus!');
    }
}
