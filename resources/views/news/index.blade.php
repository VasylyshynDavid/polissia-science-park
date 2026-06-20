@extends('layouts.app')

@php
    $isEn = ($currentLocale ?? 'uk') === 'en';
@endphp

@section('title', $isEn ? 'News — Science Park Polissia University' : 'Новини — Поліський науковий парк')

@section('content')
    <div class="container" style="padding-top:30px">
        <h1 class="section-title" style="margin-top:0">{{ $isEn ? 'News' : 'Новини' }}</h1>

        <form method="get" style="display:flex;gap:12px;flex-wrap:wrap;margin-bottom:24px;align-items:center;background:#ffffff;padding:16px;border-radius:12px;box-shadow:0 6px 18px rgba(18,36,24,0.04)">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="{{ $isEn ? 'Search' : 'Пошук' }}" style="padding:10px 14px;border-radius:8px;border:1px solid #e6efe8;min-width:220px;flex:1;font-family:Inter,sans-serif;font-size:15px">

            <select name="category" style="padding:10px 14px;border-radius:8px;border:1px solid #e6efe8;font-family:Inter,sans-serif;font-size:15px;background:#fff;color:var(--text)">
                <option value="">{{ $isEn ? 'All Categories' : 'Всі категорії' }}</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->slug }}" {{ (request('category') == $cat->slug) ? 'selected' : '' }}>{{ $isEn ? $cat->name_en : $cat->name_ua }}</option>
                @endforeach
            </select>

            <select name="year" style="padding:10px 14px;border-radius:8px;border:1px solid #e6efe8;font-family:Inter,sans-serif;font-size:15px;background:#fff;color:var(--text)">
                <option value="">{{ $isEn ? 'All Years' : 'Усі роки' }}</option>
                @foreach($years as $y)
                    <option value="{{ $y }}" {{ (request('year') == $y) ? 'selected' : '' }}>{{ $y }}</option>
                @endforeach
            </select>

            <button class="btn" type="submit" style="background:var(--green);color:#fff;padding:10px 20px;font-size:15px">{{ $isEn ? 'Search' : 'Знайти' }}</button>
            <a href="{{ route('news.index') }}" class="btn" style="background:#e6efe8;color:var(--text);padding:10px 20px;font-size:15px;text-decoration:none">{{ $isEn ? 'Reset' : 'Скинути' }}</a>
        </form>

        <div style="margin-bottom:28px;display:flex;gap:10px;flex-wrap:wrap">
            <a href="{{ route('news.index', request()->except('category')) }}"
               class="btn"
               style="background: {{ empty(request('category')) ? 'var(--green)' : '#ffffff' }}; color: {{ empty(request('category')) ? '#ffffff' : 'var(--green)' }}; border:1px solid var(--green);font-size:14px;padding:6px 14px;text-decoration:none">
                {{ $isEn ? 'All' : 'Усі' }}
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('news.index', ['category' => $cat->slug] + request()->except('category')) }}"
                   class="btn"
                   style="background: {{ (request('category') == $cat->slug) ? 'var(--green)' : '#ffffff' }}; color: {{ (request('category') == $cat->slug) ? '#ffffff' : 'var(--green)' }}; border:1px solid var(--green);font-size:14px;padding:6px 14px;text-decoration:none">
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
                {{ $isEn ? 'No news found.' : 'Новин не знайдено.' }}
            </div>
        @endif
    </div>
@endsection
