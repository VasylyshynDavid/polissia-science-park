<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Opportunity;
use App\Models\Slider;
use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
        $locale = app()->getLocale();

        $activities = Activity::query()->active()->ordered()->limit(10)->get();
        $opportunities = Opportunity::query()->active()->ordered()->limit(10)->get();
        $sliders = Slider::query()->active()->ordered()->limit(10)->get();
        $latestNews = News::published()->with('category')->orderedForListing()->limit(3)->get();

        return view('home', compact('activities', 'opportunities', 'sliders', 'latestNews', 'locale'));
    }
}
