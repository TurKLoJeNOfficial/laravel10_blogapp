<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Post::paginate(10);
        return view('backend.pages.blog', compact('blogs'));
    }

    public function edit($id)
    {
        $blog = Post::findOrFail($id); // Blog modelini ilgili id ile getir
        return view('backend.pages.blog-edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:1,0', // Status kontrolü
        ]);

        $blog = Post::findOrFail($id);

        $data = $request->only(['title', 'subtitle', 'content', 'status']);

        if ($request->hasFile('image')) {
            // Eski resmi silme
            if ($blog->image && file_exists(public_path('uploads/' . $blog->image))) {
                unlink(public_path('uploads/' . $blog->image));
            }

            // Yeni resmi yükleme
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            $data['image'] = 'uploads/' . $imageName;
        } else {
            unset($data['image']); // Eski resmi koruma
        }

        $data['slug'] = \Str::slug($request->title . '-' . $id); // Benzersiz slug

        $blog->update($data);

        return redirect()->route('admin.blog')->with('success', 'Blog updated successfully!');
    }

    public function destroy($id)
    {
        $blog = Post::findOrFail($id);

        // Eski resmi silme işlemi (opsiyonel)
        if ($blog->image && file_exists(public_path($blog->image))) {
            unlink(public_path($blog->image));
        }

        // Blog kaydını sil
        $blog->delete();

        return redirect()->route('admin.blog')->with('success', 'Blog deleted successfully!');
    }

    public function create()
    {
        return view('backend.pages.blog-add'); // admin/blog/create.blade.php view dosyasını döner.
    }

    public function store(Request $request)
    {
        // Form doğrulaması
        $validatedData = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'content' => 'required|string',
        ]);

        // Resim yükleme işlemi
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Dosya adı için zaman damgası ekleme
            $timestamp = now()->format('Ymd_His'); // Örneğin: 20240101_123456
            $imageName = $timestamp . '_' . $image->getClientOriginalName();

            // Resmi 'public/assets/img' içerisine kaydet
            $imagePath = 'assets/img/' . $imageName;
            $image->move(public_path('assets/img'), $imageName);
        }

        // Blog verilerini kaydetme
        Post::create([
            'title' => $validatedData['title'],
            'subtitle' => $validatedData['subtitle'],
            'content' => $validatedData['content'],
            'image' => $imagePath, // Resim yolu veritabanına kaydediliyor
            'status' => '1', // Varsayılan olarak aktif
            'user_id' => $request->user_id,
        ]);

        // Başarılı işlem sonrası geri yönlendirme
        return redirect()->route('admin.blog')->with('success', 'Blog successfully created.');
    }

}
