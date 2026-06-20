@extends('layouts.app')

@php
    $isEn = ($currentLocale ?? 'uk') === 'en';
    $activeQ = $q ?? request('q', '');
    $activeCategory = $category ?? request('category');
    $activeYear = $year ?? request('year');
    $hasFilters = filled($activeQ) || filled($activeCategory) || filled($activeYear);
@endphp

@section('title', $isEn ? 'News — Science Park Polissia University' : 'Новини — Поліський науковий парк')

@section('content')
    <div class="container news-index" style="padding-top:30px">
        <h1 class="section-title" style="margin-top:0">{{ $isEn ? 'News' : 'Новини' }}</h1>

        <form method="get" action="{{ route('news.index') }}" role="search" style="display:flex;gap:12px;flex-wrap:wrap;margin-bottom:18px;align-items:center;background:#ffffff;padding:16px;border-radius:12px;box-shadow:0 6px 18px rgba(18,36,24,0.04)">
            <label for="news-search-q" style="position:absolute;left:-9999px">{{ $isEn ? 'Search news' : 'Пошук новин' }}</label>
            <input id="news-search-q" type="search" name="q" value="{{ $activeQ }}" placeholder="{{ $isEn ? 'Search by title, description or text' : 'Пошук за заголовком, описом або текстом' }}" autocomplete="off" style="padding:10px 14px;border-radius:8px;border:1px solid #e6efe8;min-width:240px;flex:1;font-family:Inter,sans-serif;font-size:15px">

            <label for="news-search-category" style="position:absolute;left:-9999px">{{ $isEn ? 'Category' : 'Категорія' }}</label>
            <select id="news-search-category" name="category" style="padding:10px 14px;border-radius:8px;border:1px solid #e6efe8;font-family:Inter,sans-serif;font-size:15px;background:#fff;color:var(--text)">
                <option value="">{{ $isEn ? 'All Categories' : 'Всі категорії' }}</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->slug }}" @selected((string) $activeCategory === (string) $cat->slug)>{{ $isEn ? $cat->name_en : $cat->name_ua }}</option>
                @endforeach
            </select>

            <label for="news-search-year" style="position:absolute;left:-9999px">{{ $isEn ? 'Publication year' : 'Рік публікації' }}</label>
            <select id="news-search-year" name="year" style="padding:10px 14px;border-radius:8px;border:1px solid #e6efe8;font-family:Inter,sans-serif;font-size:15px;background:#fff;color:var(--text)">
                <option value="">{{ $isEn ? 'All Years' : 'Усі роки' }}</option>
                @foreach($years as $y)
                    <option value="{{ $y }}" @selected((string) $activeYear === (string) $y)>{{ $y }}</option>
                @endforeach
            </select>

            <button class="btn" type="submit" style="background:var(--green);color:#fff;padding:10px 20px;font-size:15px">{{ $isEn ? 'Search' : 'Знайти' }}</button>
            @if($hasFilters)
                <a href="{{ route('news.index') }}" class="btn" style="background:#e6efe8;color:var(--text);padding:10px 20px;font-size:15px;text-decoration:none">{{ $isEn ? 'Reset' : 'Скинути' }}</a>
            @endif
        </form>

        @if($hasFilters)
            <div style="margin-bottom:18px;color:var(--muted);font-size:15px">
                {{ $isEn ? 'Found' : 'Знайдено' }}: <strong>{{ $news->total() }}</strong>
            </div>
        @endif

        <div style="margin-bottom:28px;display:flex;gap:10px;flex-wrap:wrap">
            <a href="{{ route('news.index', request()->except(['category', 'page'])) }}"
               class="btn category-btn {{ empty($activeCategory) ? 'active' : '' }}"
               style="background: {{ empty($activeCategory) ? 'var(--green)' : '#ffffff' }}; color: {{ empty($activeCategory) ? '#ffffff' : 'var(--green)' }}; border:1px solid var(--green);font-size:14px;padding:6px 14px;text-decoration:none">
                {{ $isEn ? 'All' : 'Усі' }}
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('news.index', array_merge(request()->except(['category', 'page']), ['category' => $cat->slug])) }}"
                   class="btn category-btn {{ ((string) $activeCategory === (string) $cat->slug) ? 'active' : '' }}"
                   style="background: {{ ((string) $activeCategory === (string) $cat->slug) ? 'var(--green)' : '#ffffff' }}; color: {{ ((string) $activeCategory === (string) $cat->slug) ? '#ffffff' : 'var(--green)' }}; border:1px solid var(--green);font-size:14px;padding:6px 14px;text-decoration:none">
                    {{ $isEn ? $cat->name_en : $cat->name_ua }}
                </a>
            @endforeach
        </div>

        @if($news->count())
            <div class="activities-grid">
                @foreach($news as $n)
                    @include('partials.news-card', ['news' => $n])
                @endforeach
            </div>

            <div style="margin-top:30px;text-align:center">{{ $news->links() }}</div>
        @else
            <div style="padding:40px 24px;background:var(--card);border-radius:12px;box-shadow:0 6px 18px rgba(18,36,24,0.06);text-align:center;font-size:18px;color:var(--muted)">
                {{ $isEn ? 'No news found. Try changing your search query or filters.' : 'Новин не знайдено. Спробуйте змінити пошуковий запит або фільтри.' }}
            </div>
        @endif
    </div>
@endsection
