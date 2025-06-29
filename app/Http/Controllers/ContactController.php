<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gmail' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($request->all());

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }

    public function index()
    {
    $contacts = Contact::latest()->get(); // Urut dari terbaru
    return view('list_contact', compact('contacts'));
    }

    // Menghapus pesan berdasarkan ID
    public function destroy($id)
    {
    $contact = Contact::findOrFail($id);
    $contact->delete();

    return redirect()->route('contact.index')->with('success', 'Pesan berhasil dihapus.');
    }

}
