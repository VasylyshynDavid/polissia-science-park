@extends('layouts.app')

@section('title', $news->title_ua . ' — Новини')

@section('head')
    <meta name="description" content="{{ $news->excerpt_ua }}">
    <meta property="og:title" content="{{ $news->title_ua }}">
    <meta property="og:description" content="{{ $news->excerpt_ua }}">
    @if($news->image_path)
        <meta property="og:image" content="{{ asset($news->image_path) }}">
    @endif
@endsection

@section('content')
    <div class="container">
        <nav style="margin:12px 0;color:var(--muted)">
            <a href="{{ route('home') }}">Головна</a> / <a href="{{ route('news.index') }}">Новини</a> / <span>{{ $news->title_ua }}</span>
        </nav>

        @if($news->image_path)
            <img src="{{ asset($news->image_path) }}" alt="{{ $news->title_ua }}" style="width:100%;height:360px;object-fit:cover;border-radius:12px;margin-bottom:12px">
        @endif

        <div style="display:flex;gap:12px;align-items:center;margin-bottom:12px">
            <a href="{{ route('news.index', ['category' => $news->category?->slug]) }}" class="btn btn-outline">{{ $news->category?->name_ua }}</a>
            <div style="color:var(--muted)">{{ $news->published_at?->translatedFormat('j F Y') }}</div>
        </div>

        <h1 style="margin:0">{{ $news->title_ua }}</h1>
        <div class="en-title" style="margin-top:6px">{{ $news->title_en }}</div>

        <div style="margin-top:18px;color:#234;line-height:1.6">{!! nl2br(e($news->body_ua)) !!}</div>

        @if($news->photos->count())
            <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:12px;margin-top:18px">
                @foreach($news->photos as $p)
                    <div style="background:var(--card);border-radius:8px;overflow:hidden;box-shadow:0 6px 18px rgba(18,36,24,0.06)">
                        <img src="{{ asset($p->image_path) }}" alt="{{ $p->caption_ua }}" style="width:100%;height:160px;object-fit:cover;display:block">
                        @if($p->caption_ua)
                            <div style="padding:8px">{{ $p->caption_ua }}</div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif

        @if($related->count())
            <section style="margin-top:24px">
                <h3 class="section-title">Читайте також</h3>
                <div class="activities-grid">
                    @foreach($related as $r)
                        @include('partials.news-card', ['news' => $r])
                    @endforeach
                </div>
            </section>
        @endif
    </div>
@endsection
