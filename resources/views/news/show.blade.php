@extends('layouts.app')

@php
    $isEn = ($currentLocale ?? 'uk') === 'en';
@endphp

@section('title', ($isEn ? $news->title_en : $news->title_ua) . ' — ' . ($isEn ? 'News' : 'Новини'))

@section('head')
    <meta name="description" content="{{ $isEn ? $news->excerpt_en : $news->excerpt_ua }}">
    <meta property="og:title" content="{{ $isEn ? $news->title_en : $news->title_ua }}">
    <meta property="og:description" content="{{ $isEn ? $news->excerpt_en : $news->excerpt_ua }}">
    @if($news->image_path)
        <meta property="og:image" content="{{ asset($news->image_path) }}">
    @endif
@endsection

@section('content')
    <div class="container" style="padding-top:20px;padding-bottom:40px">
        <div class="breadcrumbs" style="margin:10px 0 20px;font-family:Inter,sans-serif;font-size:14px;color:#6b7280">
            <a href="{{ route('home') }}" style="color:var(--green);text-decoration:none;font-weight:600">{{ $isEn ? 'Home' : 'Головна' }}</a> /
            <a href="{{ route('news.index') }}" style="color:var(--green);text-decoration:none;font-weight:600">{{ $isEn ? 'News' : 'Новини' }}</a> /
            <span style="color:var(--text)">{{ $isEn ? $news->title_en : $news->title_ua }}</span>
        </div>

        @if($news->image_path)
            <img src="{{ asset($news->image_path) }}" alt="{{ $isEn ? $news->title_en : $news->title_ua }}" style="width:100%;height:420px;object-fit:cover;border-radius:16px;margin-bottom:24px;box-shadow:0 8px 24px rgba(4,44,34,0.08)">
        @endif

        <div style="display:flex;gap:14px;align-items:center;margin-bottom:16px;flex-wrap:wrap">
            @if($news->category)
                <a href="{{ route('news.index', ['category' => $news->category->slug]) }}" class="btn" style="background:var(--green);color:#fff;text-decoration:none;font-size:14px;padding:6px 14px;font-weight:600">{{ $isEn ? $news->category->name_en : $news->category->name_ua }}</a>
            @endif
            <div style="color:#6b7280;font-size:15px;font-weight:500;font-family:Inter,sans-serif">{{ $news->published_at ? ($isEn ? $news->published_at->translatedFormat('F j, Y') : $news->published_at->translatedFormat('j F Y')) : '' }}</div>
        </div>

        <h1 style="margin:0;font-family:Montserrat,sans-serif;font-size:36px;font-weight:800;color:var(--dark);line-height:1.2">{{ $isEn ? $news->title_en : $news->title_ua }}</h1>
        <div class="secondary-title" style="margin-top:8px;font-family:Montserrat,sans-serif;font-size:17px;font-weight:600;color:#6b7280">{{ $isEn ? $news->title_ua : $news->title_en }}</div>

        <div class="news-body" style="margin-top:28px;font-family:Inter,sans-serif;font-size:18px;color:var(--text);line-height:1.75;background:#fff;padding:32px;border-radius:16px;box-shadow:0 6px 18px rgba(18,36,24,0.04)">
            {!! nl2br(e($isEn ? $news->body_en : $news->body_ua)) !!}
        </div>

        @if($news->photos->count())
            <section style="margin-top:36px">
                <h3 class="section-title" style="text-align:left;font-size:24px;margin-bottom:16px">{{ $isEn ? 'Photo Gallery' : 'Фотогалерея' }}</h3>
                <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:16px">
                    @foreach($news->photos as $p)
                        <div style="background:var(--card);border-radius:12px;overflow:hidden;box-shadow:0 6px 18px rgba(18,36,24,0.06)">
                            <img src="{{ asset($p->image_path) }}" alt="{{ $isEn ? $p->caption_en : $p->caption_ua }}" style="width:100%;height:180px;object-fit:cover;display:block">
                            @if($p->caption_ua || $p->caption_en)
                                <div style="padding:10px 14px;font-size:14px;color:var(--text);font-family:Inter,sans-serif;font-weight:500;text-align:center">
                                    {{ $isEn ? ($p->caption_en ?: $p->caption_ua) : ($p->caption_ua ?: $p->caption_en) }}
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        @if($related->count())
            <section style="margin-top:48px;border-top:2px solid rgba(199, 168, 74, 0.2);padding-top:32px">
                <h3 class="section-title" style="margin-bottom:24px">{{ $isEn ? 'Related News' : 'Читайте також' }}</h3>
                <div class="activities-grid">
                    @foreach($related as $r)
                        @include('partials.news-card', ['news' => $r])
                    @endforeach
                </div>
            </section>
        @endif
    </div>
@endsection
