<?php

namespace App\Http\Controllers;

use App\Models\Opportunity;

class OpportunityController extends Controller
{
    public function index()
    {
        $opportunities = Opportunity::query()->active()->ordered()->limit(10)->get();

        return view('opportunities', compact('opportunities'));
    }
}
