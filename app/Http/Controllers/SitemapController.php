<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Opportunity;

class SitemapController extends Controller
{
    public function index()
    {
        $activities = Activity::query()->active()->ordered()->get();
        $news = News::published()->orderedForListing()->get();
        $categories = NewsCategory::ordered()->get();
        $opportunities = Opportunity::query()->active()->ordered()->get();

        return response()->view('sitemap', compact('activities', 'news', 'categories', 'opportunities'))
            ->header('Content-Type', 'text/xml');
    }
}
