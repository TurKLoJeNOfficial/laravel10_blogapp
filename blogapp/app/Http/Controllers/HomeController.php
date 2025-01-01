<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Contact;
use App\Models\ContactForm;
use App\Models\Home;
use App\Models\Post;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $home = Home::where('id', 1)->first();
        // Blogları en yeni (en son eklenen) blogdan en eskiye doğru sıralamak için 'created_at' sütununa göre azalan sıralama yapıyoruz
        $blog = Post::with('user')->where('status', '1')->orderBy('created_at', 'desc')->paginate(10);

        return view('homepage.pages.index', compact('home', 'blog'));
    }


    public function about()
    {
        $about = About::where('id', 1)->first();
        return view('homepage.pages.about', compact('about'));
    }

    public function contact()
    {
        $contact = Contact::where('id', 1)->first();
        return view('homepage.pages.contact', compact('contact'));
    }

    public function post($slug)
    {
        $post = Post::whereSlug($slug)->where('status', '1')->with('user')->firstOrFail();
        return view('homepage.pages.post', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'message' => 'required|string',
            ],
            [
                'name.required' => 'The name field is required.',
                'name.string' => 'The name must be a valid string.',
                'name.max' => 'The name may not be greater than 255 characters.',

                'email.required' => 'The email field is required.',
                'email.email' => 'Please enter a valid email address.',
                'email.max' => 'The email may not be greater than 255 characters.',

                'message.required' => 'The message field is required.',
                'message.string' => 'The message must be a valid string.',
            ]
        );


        // Veritabanına verileri kaydetme
        ContactForm::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ]);

        return back()->with('success', 'Your message has been sent successfully!');
    }




}
