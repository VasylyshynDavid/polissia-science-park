@extends('admin.layouts.app')
@section('title', $category->exists ? 'Редагувати категорію' : 'Додати категорію')
@section('content')
<div class="topbar"><h1>{{ $category->exists ? 'Редагувати категорію' : 'Додати категорію' }}</h1><a class="btn secondary" href="{{ route('admin.categories.index') }}">Назад</a></div>
<form class="card form" method="post" action="{{ $category->exists ? route('admin.categories.update',$category) : route('admin.categories.store') }}">@csrf @if($category->exists) @method('PUT') @endif
<div class="grid grid-2"><div class="field"><label>Назва UA</label><input name="name_ua" maxlength="120" value="{{ old('name_ua',$category->name_ua) }}" required></div><div class="field"><label>Назва EN</label><input name="name_en" maxlength="120" value="{{ old('name_en',$category->name_en) }}" required></div></div>
<div class="grid grid-2"><div class="field"><label>SEO slug</label><input name="slug" maxlength="140" value="{{ old('slug',$category->slug) }}"><div class="help">Якщо залишити порожнім — сформується автоматично.</div></div><div class="field"><label>Порядок</label><input type="number" name="sort_order" min="0" max="255" value="{{ old('sort_order',$category->sort_order ?? 0) }}"></div></div>
<div><button class="btn gold" type="submit">Зберегти</button></div>
</form>
@endsection
