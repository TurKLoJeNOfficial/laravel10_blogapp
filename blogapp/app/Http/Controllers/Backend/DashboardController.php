<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $blog = Post::paginate(5);
        return view('backend.pages.dashboard',compact('blog'));
    }
}
