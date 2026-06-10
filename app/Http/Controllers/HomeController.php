<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Opportunity;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index()
    {
        $activities = Activity::query()->active()->ordered()->limit(10)->get();
        $opportunities = Opportunity::query()->active()->ordered()->limit(10)->get();
        $sliders = Slider::query()->active()->ordered()->limit(10)->get();

        return view('home', compact('activities', 'opportunities', 'sliders'));
    }
}
