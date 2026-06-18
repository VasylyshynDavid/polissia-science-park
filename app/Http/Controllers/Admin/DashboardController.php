<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Opportunity;
use App\Models\Slider;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'slidesCount' => Slider::count(),
            'activitiesCount' => Activity::count(),
            'opportunitiesCount' => Opportunity::count(),
            'newsCount' => News::count(),
            'categoriesCount' => NewsCategory::count(),
            'activeSlidesCount' => Slider::active()->count(),
            'activeActivitiesCount' => Activity::active()->count(),
            'activeOpportunitiesCount' => Opportunity::active()->count(),
            'publishedNewsCount' => News::published()->count(),
        ]);
    }
}
