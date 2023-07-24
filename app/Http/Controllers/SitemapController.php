<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Category;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Movie;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SitemapController extends Controller
{
    //

    public function index()
    {
        $monthsWithPosts = Post::select(
            DB::raw('CONCAT(YEAR(created_at), "-", LPAD(MONTH(created_at), 2, "0")) as formatted_date')
        )
            ->groupBy('formatted_date')
            ->pluck('formatted_date')
            ->toArray();
        Log::info('$monthsWithPosts:', $monthsWithPosts);
        return response()->view('sitemaps', [
            'monthsWithPosts' => $monthsWithPosts,
        ])->header('Content-Type', 'text/xml');
    }

    public function getPostByMonth($slug)
    {
        $slug = Str::replace('.xml', ' ', $slug);
        Log::info("start get sitemap " . $slug);
        $parts = explode('-', $slug);
        $selectedYear = $parts[0];
        $selectedMonth = $parts[1];
        $posts = Post::whereYear('created_at', $selectedYear)
            ->whereMonth('created_at', $selectedMonth)->get();
        return response()->view('sitemap', [
            'posts' => $posts,
        ])->header('Content-Type', 'text/xml');
    }

    public function menu()
    {
        Log::info("start get sitemap menu ");
        $categories = Category::all();
        Log::info("end get sitemap menu ");
        return response()->view('sitemap-menu', [
            'categories' => $categories,
        ])->header('Content-Type', 'text/xml');
    }
}
