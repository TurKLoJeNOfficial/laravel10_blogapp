<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::where('id',1)->first();
        return view('backend.pages.about',compact('about'));
    }
    public function edit(Request $request)
    {
        // Doğrulama kuralları
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Her zaman id=1 olan kaydı getir
        $about = About::find(1);

        if (!$about) {
            return back()->with('error', 'Record not found.');
        }

        // Güncellemeleri atama
        $about->title = $request->input('title');
        $about->subtitle = $request->input('subtitle');
        $about->content = $request->input('content');

        // Eğer yeni bir resim yüklendiyse
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $timestamp = now()->format('YmdHis'); // Yükleme tarihi ve saati
            $originalName = $file->getClientOriginalName(); // Orijinal dosya adı
            $fileName = $timestamp . '_' . $originalName;

            // Yeni dosyayı kaydet
            $file->move(public_path('assets/img'), $fileName);

            // Resim adını veritabanına kaydet
            $about->image = 'assets/img/' . $fileName;
        }

        // Veriyi kaydet
        $about->save();

        return back()->with('success', 'About section updated successfully!');
    }


}
