<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PostController extends Controller
{
    //
    public function index($slug)
    {
        $slug = Str::replace('.html', '', $slug);
        Log::info('index ' . $slug);
        $post = Post::where('slug', $slug)->first();
        if ($post == null) {
            abort(404);
        }
        if (!session()->has('post_viewed_' . $post->id)) {
            $post->increment('read_count');
            session(['post_viewed_' . $post->id => true]);
        }

        $categories = Category::all();
        $featurePosts = Post::published()->where('featured', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        $mostReadPosts = Post::published()->orderBy('read_count', 'desc')->limit(4)->get();
        $monthsWithPosts = Post::select(
            DB::raw('CONCAT(YEAR(created_at), "-", LPAD(MONTH(created_at), 2, "0")) as formatted_date')
        )
            ->groupBy('formatted_date')
            ->pluck('formatted_date')
            ->toArray();
        Log::info('$monthsWithPosts:', $monthsWithPosts);
        $tags = Tag::all();
        return view('blog-post')->with('post', $post)->with('featurePosts', $featurePosts)->with('mostReadPosts', $mostReadPosts)
            ->with('categories', $categories)->with('monthsWithPosts', $monthsWithPosts)->with('tags', $tags);
    }

    public function searchByCategory($slug)
    {
        Log::info('searchByCategory ' . $slug);
        $category = Category::where('slug', $slug)->first();
        $posts = $category->posts()->limit(10)->get();
        $categories = Category::all();
        $featurePosts = Post::published()->where('featured', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        $mostReadPosts = Post::published()->orderBy('read_count', 'desc')->limit(4)->get();
        $tags = Tag::all();
        return view('category')->with('posts', $posts)->with('category', $category)->with('featurePosts', $featurePosts)->with('mostReadPosts', $mostReadPosts)
            ->with('categories', $categories)->with('tags', $tags);
    }

    public function searchByMonth($slug)
    {
        Log::info('searchByMonth ' . $slug);
        $parts = explode('-', $slug);
        $selectedYear = $parts[0];
        $selectedMonth = $parts[1];
        $posts = Post::whereYear('created_at', $selectedYear)
            ->whereMonth('created_at', $selectedMonth)->limit(10)->get();
        $categories = Category::all();
        $featurePosts = Post::published()->where('featured', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        $mostReadPosts = Post::published()->orderBy('read_count', 'desc')->limit(4)->get();
        $tags = Tag::all();
        return view('archive')->with('posts', $posts)->with('featurePosts', $featurePosts)->with('mostReadPosts', $mostReadPosts)
            ->with('categories', $categories)->with('slug', $slug)->with('tags', $tags);
    }

    public function searchByTag($slug)
    {
        Log::info('searchByTag ' . $slug);
        $tag = Tag::where('slug', $slug)->first();
        $posts = $tag->posts()->limit(10)->get();
        $categories = Category::all();
        $featurePosts = Post::published()->where('featured', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        $mostReadPosts = Post::published()->orderBy('read_count', 'desc')->limit(4)->get();
        $tags = Tag::all();
        return view('tag')->with('posts', $posts)->with('tag', $tag)->with('featurePosts', $featurePosts)->with('mostReadPosts', $mostReadPosts)
            ->with('categories', $categories)->with('tags', $tags);
    }

    public function loadMorePostsByCategory($slug, Request $request)
    {
        Log::info('loadMorePostsByCategory ');
        $category = Category::where('slug', $slug)->first();
        $page = $request->input('page');
        $posts = $category->posts()->paginate(10, ['*'], 'page', $page);
        Log::info('$posts:' . $posts);
        return response()->json(['posts' => view('layouts.item-category')->with('posts', $posts)->with('category', $category)->render(),
            'jsonData' => $posts]);

    }

    public function loadMorePostsByMonth($slug, Request $request)
    {
        Log::info('loadMorePostsByMonth ');
        $parts = explode('-', $slug);
        $selectedYear = $parts[0];
        $selectedMonth = $parts[1];
        $page = $request->input('page');
        $posts = Post::whereYear('created_at', $selectedYear)
            ->whereMonth('created_at', $selectedMonth)->paginate(10, ['*'], 'page', $page);
        Log::info('$posts:' . $posts);
        return response()->json(['posts' => view('layouts.item-archive')->with('posts', $posts)->render(),
            'jsonData' => $posts]);

    }

    public function loadMorePostsByTag($slug, Request $request)
    {
        Log::info('loadMorePostsByCategory ');
        $tag = Tag::where('slug', $slug)->first();
        $page = $request->input('page');
        $posts = $tag->posts()->paginate(10, ['*'], 'page', $page);
        Log::info('$posts:' . $posts);
        return response()->json(['posts' => view('layouts.item-tag')->with('posts', $posts)->with('tag', $tag)->render(),
            'jsonData' => $posts]);

    }
}
