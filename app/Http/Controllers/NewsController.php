<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
            'category' => ['nullable', 'string', 'exists:news_categories,slug'],
            'year' => ['nullable', 'integer', 'min:1900', 'max:' . now()->year],
        ]);

        $q = trim((string) ($data['q'] ?? ''));
        $category = $data['category'] ?? null;
        $year = $data['year'] ?? null;

        $query = News::published()->with('category');

        if ($q !== '') {
            $query->search($q);
        }

        if ($category) {
            $query->whereHas('category', function ($qcat) use ($category) {
                $qcat->where('slug', $category);
            });
        }

        if ($year) {
            $query->whereBetween('published_at', [
                \Illuminate\Support\Carbon::create($year, 1, 1, 0, 0, 0),
                \Illuminate\Support\Carbon::create($year, 12, 31, 23, 59, 59),
            ]);
        }

        $news = $query->orderedForListing()->orderByDesc('id')->paginate(9)->withQueryString();

        $categories = NewsCategory::query()->ordered()->get();

        $years = News::published()
            ->pluck('published_at')
            ->map(fn ($date) => \Illuminate\Support\Carbon::parse($date)->year)
            ->unique()
            ->sortDesc()
            ->values();

        return view('news.index', compact('news', 'categories', 'years', 'q', 'category', 'year'));
    }

    public function suggestions(Request $request)
    {
        $data = $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
        ]);

        $q = trim((string) ($data['q'] ?? ''));
        $isEn = app()->getLocale() === 'en';

        $query = News::published();

        if ($q !== '') {
            $query->search($q);
        }

        $items = $query
            ->orderedForListing()
            ->orderByDesc('id')
            ->limit(6)
            ->get()
            ->map(function (News $news) use ($isEn) {
                $title = $isEn ? $news->title_en : $news->title_ua;
                $excerpt = $isEn ? $news->excerpt_en : $news->excerpt_ua;

                return [
                    'title' => $title,
                    'excerpt' => Str::limit(strip_tags((string) $excerpt), 90),
                    'date' => $news->published_at ? $news->published_at->format('d.m.Y') : '',
                    'url' => route('news.show', $news),
                ];
            });

        return response()->json($items);
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
