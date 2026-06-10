<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::query()->active()->ordered()->limit(10)->get();

        return view('activities', compact('activities'));
    }
}
