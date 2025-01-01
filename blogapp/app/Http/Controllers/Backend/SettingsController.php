<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::where('id',1)->first();
        return view('backend.pages.settings',compact('settings'));
    }
    public function edit(Request $request)
    {
        // Doğrulama kuralları
        $request->validate([
            'title' => 'required|string|max:255',
            'header' => 'nullable|string|max:255',
            'footer' => 'nullable|string',
            'description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'author' => 'nullable|string',
        ]);

        // Her zaman id=1 olan kaydı getir
        $settings = Setting::find(1);

        if (!$settings) {
            return back()->with('error', 'Record not found.');
        }

        // Güncellemeleri atama
        $settings->title = $request->input('title');
        $settings->header = $request->input('header');
        $settings->footer = $request->input('footer');
        $settings->description = $request->input('description');
        $settings->keywords = $request->input('keywords');
        $settings->author = $request->input('author');


        // Veriyi kaydet
        $settings->save();

        return back()->with('success', 'About section updated successfully!');
    }
}
