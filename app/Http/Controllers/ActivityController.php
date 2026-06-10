<?php

namespace App\Http\Controllers;

use App\Models\Activity;

/**
 * Controller for listing activities.
 */
class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::query()->active()->ordered()->limit(10)->get();

        return view('activities', compact('activities'));
    }
}
