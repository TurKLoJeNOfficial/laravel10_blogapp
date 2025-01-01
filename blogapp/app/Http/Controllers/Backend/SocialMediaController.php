<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function index(){
        $socialmedias = SocialMedia::paginate(10);
        return view('backend.pages.socialmedia',compact('socialmedias'));
    }

    public function edit($id){
        $socialmedia = SocialMedia::findOrFail($id); // Blog modelini ilgili id ile getir
        return view('backend.pages.socialmedia-edit', compact('socialmedia'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required',
            'link' => 'required|string',
            'status' => 'required|in:1,0', // Status kontrolü
        ]);

        $socialmedia = SocialMedia::findOrFail($id);

        if (!$socialmedia) {
            return back()->with('error', 'Record not found.');
        }

        // Güncellemeleri atama
        $socialmedia->title = $request->input('title');
        $socialmedia->icon = $request->input('icon');
        $socialmedia->link = $request->input('link');
        $socialmedia->status = $request->input('status');

        $socialmedia->save();

        return back()->with('success', 'About section updated successfully!');
    }

    public function destroy($id)
    {
        $socialmedia = SocialMedia::findOrFail($id);


        // Blog kaydını sil
        $socialmedia->delete();

        return redirect()->route('admin.socialmedia')->with('success', 'Blog deleted successfully!');
    }

    public function create()
    {
        return view('backend.pages.socialmedia-add'); // admin/blog/create.blade.php view dosyasını döner.
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required',
            'link' => 'required|string',
        ]);

        // Blog verilerini kaydetme
        SocialMedia::create([
            'title' => $validatedData['title'],
            'icon' => $validatedData['icon'],
            'link' => $validatedData['link'],
            'status' => '1', // Varsayılan olarak aktif
        ]);

        // Başarılı işlem sonrası geri yönlendirme
        return redirect()->route('admin.socialmedia')->with('success', 'Blog successfully created.');
    }
}
