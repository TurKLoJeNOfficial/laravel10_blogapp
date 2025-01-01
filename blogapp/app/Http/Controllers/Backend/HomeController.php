<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $home = Home::where('id',1)->first();
        return view('backend.pages.home',compact('home'));
    }

    public function edit(Request $request)
    {
        // Doğrulama kuralları
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Her zaman id=1 olan kaydı getir
        $home = Home::find(1);

        if (!$home) {
            return back()->with('error', 'Record not found.');
        }

        // Güncellemeleri atama
        $home->title = $request->input('title');
        $home->subtitle = $request->input('subtitle');

        // Eğer yeni bir resim yüklendiyse
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $timestamp = now()->format('YmdHis'); // Yükleme tarihi ve saati
            $originalName = $file->getClientOriginalName(); // Orijinal dosya adı
            $fileName = $timestamp . '_' . $originalName;

            // Yeni dosyayı kaydet
            $file->move(public_path('assets/img'), $fileName);

            // Resim adını veritabanına kaydet
            $home->image = 'assets/img/' . $fileName;
        }

        // Veriyi kaydet
        $home->save();

        return back()->with('success', 'Home section updated successfully!');
    }
}
