<?php

namespace App\Http\Controllers;

use App\Models\Activity;

class HomeController extends Controller
{
    public function index()
    {
        $activities = Activity::query()->active()->ordered()->limit(10)->get();

        return view('home', compact('activities'));
    }
}
