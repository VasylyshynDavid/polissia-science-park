@extends('admin.layouts.app')
@section('title','Панель керування')
@section('content')
<div class="topbar"><h1>Панель керування</h1><a class="btn secondary" href="{{ route('home') }}" target="_blank">Переглянути сайт</a></div>
<div class="grid grid-4">
    <div class="card stat"><b>{{ $activeSlidesCount }}/10</b><span>Активні слайди</span></div>
    <div class="card stat"><b>{{ $activeActivitiesCount }}/10</b><span>Активні напрями</span></div>
    <div class="card stat"><b>{{ $activeOpportunitiesCount }}/10</b><span>Активні можливості</span></div>
    <div class="card stat"><b>{{ $publishedNewsCount }}</b><span>Опубліковані новини</span></div>
</div>
<div class="card">
    <h2>Відповідність ТЗ</h2>
    <ul>
        <li>Слайдер: додавання, редагування, видалення, сортування, максимум 10 активних.</li>
        <li>Напрями діяльності: CRUD, приховування, SVG/PNG іконки, ліміти 60/180 символів, максимум 10 активних.</li>
        <li>Можливості: CRUD, приховування, SVG/PNG іконки, ліміт 120 символів, максимум 10 активних.</li>
        <li>Новини: категорії, SEO URL, головне фото, галерея до 10 фото, закріплення, архів, відкладена публікація.</li>
    </ul>
</div>
@endsection
