<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    //
    public function index() {
        Log::info('start home');
        $categories = Category::all();
        $featurePosts = Post::published()->where('featured', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        $recentPosts = Post::published()->orderBy('created_at', 'desc')->limit(13)->get();
        $mostReadPosts = Post::published()->orderBy('read_count', 'desc')->limit(4)->get();
        Log::info('end home');
        return view('index')->with('featurePosts', $featurePosts)->with('recentPosts', $recentPosts)->with('mostReadPosts', $mostReadPosts)
            ->with('categories', $categories);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
