@extends('admin.layouts.app')
@section('title', $activity->exists ? 'Редагувати напрям' : 'Додати напрям')
@section('content')
<div class="topbar"><h1>{{ $activity->exists ? 'Редагувати напрям' : 'Додати напрям' }}</h1><a class="btn secondary" href="{{ route('admin.activities.index') }}">Назад</a></div>
<form class="card form" method="post" enctype="multipart/form-data" action="{{ $activity->exists ? route('admin.activities.update',$activity) : route('admin.activities.store') }}">@csrf @if($activity->exists) @method('PUT') @endif
<div class="grid grid-2"><div class="field"><label>Назва UA</label><input name="title_ua" maxlength="60" value="{{ old('title_ua',$activity->title_ua) }}" required><div class="help">До 60 символів.</div></div><div class="field"><label>Назва EN</label><input name="title_en" maxlength="60" value="{{ old('title_en',$activity->title_en) }}" required></div></div>
<div class="grid grid-2"><div class="field"><label>Короткий опис UA</label><textarea name="description_ua" maxlength="180" required>{{ old('description_ua',$activity->description_ua) }}</textarea><div class="help">До 180 символів.</div></div><div class="field"><label>Короткий опис EN</label><textarea name="description_en" maxlength="180" required>{{ old('description_en',$activity->description_en) }}</textarea></div></div>
<div class="grid grid-2"><div class="field"><label>Іконка SVG/PNG {{ $activity->exists ? '(не обовʼязково)' : '' }}</label><input type="file" name="icon" accept=".svg,.png,.jpg,.jpeg,.webp" {{ $activity->exists ? '' : 'required' }}>@if($activity->image_path)<p><img class="thumb" src="{{ asset($activity->image_path) }}" alt=""></p>@endif</div><div class="field"><label>Порядок</label><input type="number" name="sort_order" min="0" max="255" value="{{ old('sort_order',$activity->sort_order ?? 0) }}"></div></div>
<label class="checkbox"><input type="checkbox" name="is_active" value="1" @checked(old('is_active',$activity->exists ? $activity->is_active : true))> Активний напрям</label><div class="help">За ТЗ максимум активних напрямів — {{ $maxActive }}.</div>
<div><button class="btn gold" type="submit">Зберегти</button></div>
</form>
@endsection
