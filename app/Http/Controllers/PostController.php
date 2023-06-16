<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    //
    public function index($slug)
    {
        Log::info('index ' . $slug);
        $post = Post::where('slug', $slug)->first();
        if ($post == null){
            abort(404);
        }
        $categories = Category::all();
        $featurePosts = Post::published()->where('featured', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        $mostReadPosts = Post::published()->orderBy('read_count', 'desc')->limit(4)->get();
        return view('blog-post')->with('post', $post)->with('featurePosts', $featurePosts)->with('mostReadPosts', $mostReadPosts)
            ->with('categories', $categories);
    }

    public function searchByCategory($slug)
    {
        Log::info('searchByCategory ' . $slug);
        $category = Category::where('slug', $slug)->first();
        $posts = $category->posts()->limit(10)->get();
        $categories = Category::all();
        $featurePosts = Post::published()->where('featured', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        $mostReadPosts = Post::published()->orderBy('read_count', 'desc')->limit(4)->get();
        return view('category')->with('posts', $posts)->with('category', $category)->with('featurePosts', $featurePosts)->with('mostReadPosts', $mostReadPosts)
            ->with('categories', $categories);
    }

    public function loadMorePostsByCategory($slug, Request $request)
    {
        Log::info('loadMorePostsByCategory ' );
            $category = Category::where('slug', $slug)->first();
            $page = $request->input('page');
            $posts = $category->posts()->paginate(10, ['*'], 'page', $page);
            Log::info('$posts:' . $posts);
            return response()->json(['posts' =>view('layouts.item-category')->with('posts', $posts)->with('category', $category)->render(),
                'jsonData' => $posts]);

    }
}
