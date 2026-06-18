@extends('admin.layouts.app')
@section('title','Слайдер')
@section('content')
<div class="topbar"><h1>Слайдер головного екрану</h1><a class="btn" href="{{ route('admin.sliders.create') }}">+ Додати слайд</a></div>
<div class="card">Активних слайдів: <b>{{ $activeCount }}</b> / {{ $maxActive }}</div>
<div class="card table-wrap"><table class="table"><thead><tr><th>Фото</th><th>Назва</th><th>Порядок</th><th>Статус</th><th>Дії</th></tr></thead><tbody>
@foreach($sliders as $slider)
<tr><td><img class="thumb" src="{{ asset($slider->image_path) }}" alt=""></td><td><b>{{ $slider->title_ua }}</b><br><span style="color:var(--muted)">{{ $slider->title_en }}</span></td><td>{{ $slider->sort_order }}</td><td><span class="badge {{ $slider->is_active ? 'ok':'off' }}">{{ $slider->is_active ? 'Активний':'Прихований' }}</span></td><td class="actions"><a class="btn secondary" href="{{ route('admin.sliders.edit',$slider) }}">Редагувати</a><form method="post" action="{{ route('admin.sliders.destroy',$slider) }}" onsubmit="return confirm('Видалити слайд?')">@csrf @method('DELETE')<button class="btn danger" type="submit">Видалити</button></form></td></tr>
@endforeach
</tbody></table>{{ $sliders->links() }}</div>
@endsection
