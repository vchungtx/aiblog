<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Prompt;
use App\Models\PromptCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PromptController extends Controller
{
    //
    public function searchByCategory($slug)
    {
        Log::info('searchPromptByCategory ' . $slug);
        $category = PromptCategory::where('slug', $slug)->first();
        $prompts = $category->prompts()->limit(19)->get();
        $categories = PromptCategory::all();

        return view('prompt-category')->with('prompts', $prompts)->with('category', $category)
            ->with('categories', $categories);
    }

    public function loadMorePromptsByCategory($slug, Request $request)
    {
        Log::info('loadMorePromptsByCategory ' );
        $category = PromptCategory::where('slug', $slug)->first();
        $page = $request->input('page');
        $prompts = $category->prompts()->paginate(19, ['*'], 'page', $page);
        Log::info('$prompts:' . $prompts);
        return response()->json(['prompts' =>view('layouts.item-prompt-category')->with('prompts', $prompts)->with('category', $category)->render(),
            'jsonData' => $prompts]);

    }

    public function index()
    {
        Log::info('searchAllPrompt ');
        $prompts = Prompt::orderBy('created_at', 'desc')->limit(19)->get();
        $categories = PromptCategory::all();
        return view('prompt')->with('prompts', $prompts)
            ->with('categories', $categories);
    }

    public function loadMorePrompts(Request $request)
    {
        Log::info('loadMorePrompts ' );
        $page = $request->input('page');
        $prompts = Prompt::orderBy('created_at', 'desc')->paginate(19, ['*'], 'page', $page);
        Log::info('$prompts:' . $prompts);
        return response()->json(['prompts' =>view('layouts.item-prompt-category')->with('prompts', $prompts)->render(),
            'jsonData' => $prompts]);

    }
}
