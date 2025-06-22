<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\Category;
use Illuminate\Support\Str;

class WisataController extends Controller
{
    // Tampilkan data wisata di halaman home
    public function index()
    {
        $wisatas = Wisata::all();
        return view('home', compact('wisatas'));
    }

    // Tampilkan data wisata dalam daftar
    public function list()
    {
        $wisatas = Wisata::all();
        return view('list', compact('wisatas'));
    }

    // Tampilkan form untuk menambah wisata
    public function create()
    {
        $categories = Category::all();
        return view('add_wisata', compact('categories'));
    }
    
    // Proses simpan data wisata ke database
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'kecamatan' => 'required|string|max:255',
        'description' => 'required|string',
        'year' => 'required|numeric',
        'category_id' => 'required|numeric',
        'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $data = $request->only(['title', 'kecamatan', 'description', 'year', 'category_id']);
    $data['slug'] = \Str::slug($request->title);

    if ($request->hasFile('cover_image')) {
        $file = $request->file('cover_image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $filename);
        $data['cover_image'] = $filename;
    }

    // Simpan ke database
    Wisata::create($data);

    return redirect()->route('list')->with('success', 'Data wisata berhasil ditambahkan!');
}

}
