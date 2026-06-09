<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity; // Підключаємо нашу модель

class ActivityController extends Controller
{
    public function index()
    {
        // Дістаємо всі напрями діяльності з бази
        $activities = Activity::all();
        
        // Передаємо їх у візуальний шаблон 'activities'
        return view('activities', compact('activities'));
    }
}
