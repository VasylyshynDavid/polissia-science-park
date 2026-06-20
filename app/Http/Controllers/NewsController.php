<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\NewsCategory;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->validate([
            'q' => ['nullable','string','max:100'],
            'category' => ['nullable','exists:news_categories,slug'],
            'year' => ['nullable','integer'],
        ]);

        $q = $data['q'] ?? null;
        $category = $data['category'] ?? null;
        $year = $data['year'] ?? null;

        $query = News::published()->with('category');

        if($q){
            $query->search($q);
        }

        if($category){
            $query->whereHas('category', function($qcat) use ($category){
                $qcat->where('slug', $category);
            });
        }

        if($year){
            $query->whereBetween('published_at', [
                \Illuminate\Support\Carbon::create($year, 1, 1, 0, 0, 0),
                \Illuminate\Support\Carbon::create($year, 12, 31, 23, 59, 59),
            ]);
        }

        $news = $query->orderedForListing()->paginate(9)->withQueryString();

        $categories = NewsCategory::query()->ordered()->get();

        $years = News::published()
            ->pluck('published_at')
            ->map(fn ($date) => \Illuminate\Support\Carbon::parse($date)->year)
            ->unique()
            ->sortDesc()
            ->values();

        return view('news.index', compact('news','categories','years','q','category','year'));
    }

    public function show(News $news)
    {
        if($news->is_archived || is_null($news->published_at) || $news->published_at->isFuture()){
            abort(404);
        }

        $news->load('category','photos');

        $related = News::published()
            ->where('news_category_id', $news->news_category_id)
            ->where('id', '!=', $news->id)
            ->orderedForListing()
            ->limit(3)
            ->get();

        return view('news.show', compact('news','related'));
    }
}
