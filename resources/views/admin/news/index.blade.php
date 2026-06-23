@extends('admin.layouts.app')
@section('title','Новини')
@section('content')
<div class="topbar"><h1>Новини</h1><a class="btn" href="{{ route('admin.news.create') }}">+ Додати новину</a></div>
<form class="card" method="get" style="display:flex;gap:8px;flex-wrap:wrap;align-items:end"><div class="field" style="min-width:260px"><label>Пошук</label><input name="q" value="{{ request('q') }}" placeholder="Заголовок, опис, текст"></div><div class="field"><label>Категорія</label><select name="category"><option value="">Усі</option>@foreach($categories as $cat)<option value="{{ $cat->id }}" @selected(request('category') == $cat->id)>{{ $cat->name_ua }}</option>@endforeach</select></div><button class="btn" type="submit">Фільтрувати</button><a class="btn secondary" href="{{ route('admin.news.index') }}">Скинути</a></form>
<div class="card table-wrap"><table class="table"><thead><tr><th>Фото</th><th>Заголовок</th><th>Категорія</th><th>Публікація</th><th>Статус</th><th>Дії</th></tr></thead><tbody>
@foreach($news as $item)
<tr><td>@if($item->image_path)<img class="thumb" src="{{ asset($item->image_path) }}" alt="">@endif</td><td><b>{{ $item->title_ua }}</b><br><span style="color:var(--muted)">/{{ $item->slug }}</span></td><td>{{ $item->category?->name_ua }}</td><td>{{ $item->published_at?->format('d.m.Y H:i') ?: 'Не заплановано' }}</td><td>@if($item->is_archived)<span class="badge off">Архів</span>@elseif($item->published_at && $item->published_at->isFuture())<span class="badge warn">Заплановано</span>@else<span class="badge ok">Опубліковано</span>@endif @if($item->is_pinned)<span class="badge warn">Закріплено</span>@endif</td><td class="actions"><a class="btn secondary" href="{{ route('admin.news.edit',$item) }}">Редагувати</a><a class="btn secondary" href="{{ route('news.show',$item) }}" target="_blank">Перегляд</a><form method="post" action="{{ route('admin.news.destroy',$item) }}" onsubmit="return confirm('Видалити новину?')">@csrf @method('DELETE')<button class="btn danger" type="submit">Видалити</button></form></td></tr>
@endforeach
</tbody></table>{{ $news->links() }}</div>
@endsection
