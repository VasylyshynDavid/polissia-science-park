@extends('admin.layouts.app')
@section('title', $slider->exists ? 'Редагувати слайд' : 'Додати слайд')
@section('content')
<div class="topbar"><h1>{{ $slider->exists ? 'Редагувати слайд' : 'Додати слайд' }}</h1><a class="btn secondary" href="{{ route('admin.sliders.index') }}">Назад</a></div>
<form class="card form" method="post" enctype="multipart/form-data" action="{{ $slider->exists ? route('admin.sliders.update',$slider) : route('admin.sliders.store') }}">@csrf @if($slider->exists) @method('PUT') @endif
<div class="grid grid-2"><div class="field"><label>Заголовок UA</label><input name="title_ua" maxlength="120" value="{{ old('title_ua',$slider->title_ua) }}" required></div><div class="field"><label>Заголовок EN</label><input name="title_en" maxlength="120" value="{{ old('title_en',$slider->title_en) }}" required></div></div>
<div class="grid grid-2"><div class="field"><label>Опис UA</label><textarea name="description_ua" maxlength="255" required>{{ old('description_ua',$slider->description_ua) }}</textarea></div><div class="field"><label>Опис EN</label><textarea name="description_en" maxlength="255" required>{{ old('description_en',$slider->description_en) }}</textarea></div></div>
<div class="grid grid-2"><div class="field"><label>Фото слайду {{ $slider->exists ? '(не обовʼязково)' : '' }}</label><input type="file" name="image" accept=".jpg,.jpeg,.png,.webp" {{ $slider->exists ? '' : 'required' }}>@if($slider->image_path)<p><img class="thumb" src="{{ asset($slider->image_path) }}" alt=""></p>@endif</div><div class="field"><label>Порядок</label><input type="number" name="sort_order" min="0" max="255" value="{{ old('sort_order',$slider->sort_order ?? 0) }}"><div class="help">Менше число — вище в слайдері.</div></div></div>
<label class="checkbox"><input type="checkbox" name="is_active" value="1" @checked(old('is_active',$slider->exists ? $slider->is_active : true))> Активний слайд</label><div class="help">За ТЗ максимум активних слайдів — {{ $maxActive }}.</div>
<div><button class="btn gold" type="submit">Зберегти</button></div>
</form>
@endsection
