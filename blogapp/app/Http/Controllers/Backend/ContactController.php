<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::where('id',1)->first();
        return view('backend.pages.contact',compact('contact'));
    }

    public function edit(Request $request)
    {
        // Doğrulama kuralları
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'desc' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Her zaman id=1 olan kaydı getir
        $contact = Contact::find(1);

        if (!$contact) {
            return back()->with('error', 'Record not found.');
        }

        // Güncellemeleri atama
        $contact->title = $request->input('title');
        $contact->subtitle = $request->input('subtitle');

        // Eğer yeni bir resim yüklendiyse
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $timestamp = now()->format('YmdHis'); // Yükleme tarihi ve saati
            $originalName = $file->getClientOriginalName(); // Orijinal dosya adı
            $fileName = $timestamp . '_' . $originalName;

            // Yeni dosyayı kaydet
            $file->move(public_path('assets/img'), $fileName);

            // Resim adını veritabanına kaydet
            $contact->image = 'assets/img/' . $fileName;
        }

        // Veriyi kaydet
        $contact->save();

        return back()->with('success', 'Contact section updated successfully!');
    }
}
