<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\Category;
use App\Models\Kabupaten;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class WisataController extends Controller
{
    public function index()
    {

        $wisatas = Wisata::all();
        return view('home', compact('wisatas'));
        //$wisatas = Wisata::all();
        
    }

    public function form()
    {
    if (!Auth::check()) {
        return redirect()->route('login.form')->with('message', 'Anda Harus Login Terlebih dahulu jika anda ingin melihat Destination!!');
    }
    $query=Wisata::orderBy('id', 'asc');
    if (request('q')) {
        $query->where('title', 'like', '%'. request('q') . '%');
    }
    $wisatas=$query->paginate(100)->withQueryString();
    return view('form', compact('wisatas'));
    }

    public function create()
    {
        $categories = Category::all();
        $kabupatens = Kabupaten::all();
        return view('add_wisata', compact('categories', 'kabupatens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'kabupaten_id' => 'required|numeric',
            'kecamatan' => 'required|string|max:255',
            'description' => 'required|string',
            'year' => 'required|numeric',
            'category_id' => 'required|numeric',
            'rating' => 'required|numeric|min:0|max:5',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['title', 'kabupaten_id', 'kecamatan', 'description', 'year', 'rating', 'category_id']);
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data['cover_image'] = $filename;
        }

        Wisata::create($data);
        return redirect()->route('wisata.list')->with('success', 'Data wisata berhasil ditambahkan!');
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
            'rating' => 'required|numeric|min:0|max:5',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $wisata = Wisata::findOrFail($id);
        $data = $request->only(['title', 'kabupaten_id', 'kecamatan', 'description', 'year', 'rating', 'category_id']);
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('cover_image')) {
            if ($wisata->cover_image && File::exists(public_path('images/' . $wisata->cover_image))) {
                File::delete(public_path('images/' . $wisata->cover_image));
            }

            $file = $request->file('cover_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data['cover_image'] = $filename;
        }

        $wisata->update($data);
        return redirect('/list')->with('success', 'Data wisata berhasil diperbarui!');
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

    public function topRated()
    {
    if (!Auth::check()) {
        return redirect()->route('login.form')->with('message', 'Anda harus Login terlebih dahulu jika ingin melihat Top Rate!!');
    }

    $query = Wisata::orderBy('rating', 'desc'); // urutkan berdasarkan rating tertinggi

    if (request('q')) {
        $query->where('title', 'like', '%' . request('q') . '%'); // pencarian berdasarkan judul
    }

    $wisatas = $query->paginate(100)->withQueryString(); // tampilkan dengan pagination

    return view('top_rate', compact('wisatas'));
    }


    public function dashboard()
    {
        if (!Auth::check()) {
        return redirect()->route('login.form')->with('message', 'ini halaman Admin!!');
    }
        $wisatas = Wisata::all();
        return view('admin.dashboard', compact('wisatas'));
    }
}
