@extends('layouts.app')

@section('title', 'Новини — Поліський науковий парк')

@section('content')
    <div class="container">
        <h1 class="section-title">Новини</h1>

        <form method="get" style="display:flex;gap:8px;flex-wrap:wrap;margin-bottom:12px;align-items:center">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Пошук" style="padding:8px;border-radius:8px;border:1px solid #e6efe8;min-width:220px">

            <select name="category" style="padding:8px;border-radius:8px;border:1px solid #e6efe8">
                <option value="">Всі категорії</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->slug }}" {{ (request('category') == $cat->slug) ? 'selected' : '' }}>{{ $cat->name_ua }}</option>
                @endforeach
            </select>

            <select name="year" style="padding:8px;border-radius:8px;border:1px solid #e6efe8">
                <option value="">Усі роки</option>
                @foreach($years as $y)
                    <option value="{{ $y }}" {{ (request('year') == $y) ? 'selected' : '' }}>{{ $y }}</option>
                @endforeach
            </select>

            <button class="btn" type="submit">Знайти</button>
            <a href="{{ route('news.index') }}" class="btn-outline">Скинути</a>
        </form>

        <div style="margin-bottom:12px;display:flex;gap:8px;flex-wrap:wrap">
            @foreach($categories as $cat)
                <a href="{{ route('news.index', ['category' => $cat->slug]) }}" class="btn" style="background: {{ (request('category') == $cat->slug) ? 'var(--gold)' : 'transparent' }}; color: {{ (request('category') == $cat->slug) ? 'var(--dark)' : '#fff' }}; border:1px solid rgba(255,255,255,0.08)">{{ $cat->name_ua }}</a>
            @endforeach
        </div>

        @if($news->count())
            <div class="activities-grid">
                @foreach($news as $n)
                    @include('partials.news-card', ['news' => $n])
                @endforeach
            </div>

            <div style="text-align:center">{{ $news->links() }}</div>
        @else
            <div style="padding:24px;background:var(--card);border-radius:12px;box-shadow:0 6px 18px rgba(18,36,24,0.06);text-align:center">Новин не знайдено.</div>
        @endif
    </div>
@endsection
