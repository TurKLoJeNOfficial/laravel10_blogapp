<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = ContactForm::paginate(10); // Sayfalama işlemi
        return view('backend.pages.message', compact('messages'));
    }
    public function show($id)
    {
        // Mesajı ID'ye göre bul
        $message = ContactForm::findOrFail($id);

        // Detayları view'de göstermek için gönder
        return view('backend.pages.message-detail', compact('message'));
    }
}
