<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    //
    public function index($slug) {
        Log::info('index ' . $slug);
        $post = Post::where('slug', $slug)->first();

        return view('blog-post')->with('post', $post);

    }
}
