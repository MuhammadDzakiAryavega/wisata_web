<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\Category;
use App\Models\Kabupaten;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class WisataController extends Controller
{
    // Tampilkan data wisata di halaman home
    public function index()
    {
        $wisatas = Wisata::all();
        return view('home', compact('wisatas'));
    }

    // Tampilkan data wisata dalam daftar
    public function form()
    {
        $wisatas = Wisata::all();
        return view('form', compact('wisatas'));
    }

    // Tampilkan form untuk menambah wisata
    public function create()
    {
        $categories = Category::all();
        $kabupatens = Kabupaten::all();
        return view('add_wisata', compact('categories', 'kabupatens'));
    }
    
    // Proses simpan data wisata ke database
    public function store(Request $request)
    {
    $request->validate([
        'title' => 'required|string|max:255',
        'kabupaten_id' => 'required|numeric',
        'kecamatan' => 'required|string|max:255',
        'description' => 'required|string',
        'year' => 'required|numeric',
        'category_id' => 'required|numeric',
        'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $data = $request->only(['title', 'kabupaten_id', 'kecamatan', 'description', 'year', 'category_id']);
    $data['slug'] = \Str::slug($request->title);

    if ($request->hasFile('cover_image')) {
        $file = $request->file('cover_image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $filename);
        $data['cover_image'] = $filename;
    }

    // Simpan ke database
    Wisata::create($data);

    return redirect()->route('form')->with('success', 'Data wisata berhasil ditambahkan!');
    }

    public function list()
   {
    $wisatas = Wisata::with('category')->paginate(10);
    return view('list', compact('wisatas'));
   }
   
   public function show($id)
   {
    $wisata = Wisata::with('category')->findOrFail($id);
    return view('wisata.detail_wisata', compact('wisata'));
   }

    public function edit($id)
   {  
    $wisata = Wisata::findOrFail($id);
    $categories = Category::all();
    $kabupatens = Kabupaten::all();
    return view('edit_wisata', compact('wisata', 'categories', 'kabupatens'));
   }

    public function update(Request $request, $id)
    {
    $request->validate([
        'title' => 'required|string|max:255',
        'kabupaten_id' => 'required|numeric',
        'kecamatan' => 'required|string|max:255',
        'description' => 'required|string',
        'year' => 'required|numeric',
        'category_id' => 'required|numeric',
        'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $wisata = Wisata::findOrFail($id);
    $data = $request->only(['title', 'kabupaten_id', 'kecamatan', 'description', 'year', 'category_id']);
    $data['slug'] = Str::slug($request->title);

    if ($request->hasFile('cover_image')) {
        // Hapus gambar lama jika ada
        if ($wisata->cover_image && File::exists(public_path('images/' . $wisata->cover_image))) {
            File::delete(public_path('images/' . $wisata->cover_image));
        }

        $file = $request->file('cover_image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $filename);
        $data['cover_image'] = $filename;
    }

    $wisata->update($data);
    return redirect()->route('wisata.edit', $id)->with('success', 'Data wisata berhasil diperbarui!');
    }

    public function destroy($id)
   {
    $wisata = Wisata::findOrFail($id);

    if ($wisata->cover_image && File::exists(public_path('images/' . $wisata->cover_image))) {
        File::delete(public_path('images/' . $wisata->cover_image));
    }

    $wisata->delete();

    return redirect()->route('wisata.list')->with('success', 'Data wisata berhasil dihapus!');
    }

}
