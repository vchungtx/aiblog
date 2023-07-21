<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Prompt;
use App\Models\PromptCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MidjourneyController extends Controller
{
    //

    public function index()
    {
        Log::info('midjourney index ');
        $prompts = Prompt::orderBy('created_at', 'desc')->limit(6)->get();
        $promptCategories = PromptCategory::all();
        $midjourneyPostCategory = Category::where('type', 'midjourney')->get();
        $posts = Post::with('categories')->whereHas('categories', function ($query) {
            $query->where('categories.type', 'midjourney');
        })->limit(6)->orderBy('created_at', 'desc')->get();
        Log::info('post count:' . count($posts));
        Log::info('$midjourneyPostCategory count:' . count($midjourneyPostCategory));
        $tags = Tag::all();
        return view('midjourney')->with('prompts', $prompts)->with('posts', $posts)->with('categories', $midjourneyPostCategory)
            ->with('promptCategories', $promptCategories)->with('tags', $tags);
    }

    public function posts()
    {
        Log::info('midjourney post ');
        $midjourneyPostCategory = Category::where('type', 'midjourney')->get();
        $posts = Post::with('categories')->whereHas('categories', function ($query) {
            $query->where('categories.type', 'midjourney');
        })->limit(6)->orderBy('created_at', 'desc')->get();
        Log::info('post count:' . count($posts));
        Log::info('$midjourneyPostCategory count:' . count($midjourneyPostCategory));
        $tags = Tag::all();
        return view('midjourney-post')->with('posts', $posts)->with('categories', $midjourneyPostCategory)->with('tags', $tags)
            ;
    }
}
