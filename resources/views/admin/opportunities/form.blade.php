@extends('admin.layouts.app')
@section('title', $opportunity->exists ? 'Редагувати можливість' : 'Додати можливість')
@section('content')
<div class="topbar"><h1>{{ $opportunity->exists ? 'Редагувати можливість' : 'Додати можливість' }}</h1><a class="btn secondary" href="{{ route('admin.opportunities.index') }}">Назад</a></div>
<form class="card form" method="post" enctype="multipart/form-data" action="{{ $opportunity->exists ? route('admin.opportunities.update',$opportunity) : route('admin.opportunities.store') }}">@csrf @if($opportunity->exists) @method('PUT') @endif
<div class="grid grid-2"><div class="field"><label>Короткий опис UA</label><textarea name="description_ua" maxlength="120" required>{{ old('description_ua',$opportunity->description_ua) }}</textarea><div class="help">До 120 символів.</div></div><div class="field"><label>Короткий опис EN</label><textarea name="description_en" maxlength="120" required>{{ old('description_en',$opportunity->description_en) }}</textarea></div></div>
<div class="grid grid-2"><div class="field"><label>Іконка SVG/PNG {{ $opportunity->exists ? '(не обовʼязково)' : '' }}</label><input type="file" name="icon" accept=".svg,.png,.jpg,.jpeg,.webp" {{ $opportunity->exists ? '' : 'required' }}>@if($opportunity->image_path)<p><img class="thumb" src="{{ asset($opportunity->image_path) }}" alt=""></p>@endif</div><div class="field"><label>Порядок</label><input type="number" name="sort_order" min="0" max="255" value="{{ old('sort_order',$opportunity->sort_order ?? 0) }}"></div></div>
<label class="checkbox"><input type="checkbox" name="is_active" value="1" @checked(old('is_active',$opportunity->exists ? $opportunity->is_active : true))> Активний запис</label><div class="help">За ТЗ максимум активних можливостей — {{ $maxActive }}.</div>
<div><button class="btn gold" type="submit">Зберегти</button></div>
</form>
@endsection
