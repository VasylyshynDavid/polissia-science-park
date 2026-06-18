@extends('admin.layouts.app')
@section('title','Напрями діяльності')
@section('content')
<div class="topbar"><h1>Напрями діяльності</h1><a class="btn" href="{{ route('admin.activities.create') }}">+ Додати напрям</a></div>
<div class="card">Активних напрямів: <b>{{ $activeCount }}</b> / {{ $maxActive }}</div>
<div class="card table-wrap"><table class="table"><thead><tr><th>Іконка</th><th>Назва</th><th>Опис</th><th>Порядок</th><th>Статус</th><th>Дії</th></tr></thead><tbody>
@foreach($activities as $activity)
<tr><td><img class="thumb" src="{{ asset($activity->image_path) }}" alt=""></td><td><b>{{ $activity->title_ua }}</b><br><span style="color:var(--muted)">{{ $activity->title_en }}</span></td><td>{{ $activity->description_ua }}</td><td>{{ $activity->sort_order }}</td><td><span class="badge {{ $activity->is_active ? 'ok':'off' }}">{{ $activity->is_active ? 'Активний':'Прихований' }}</span></td><td class="actions"><a class="btn secondary" href="{{ route('admin.activities.edit',$activity) }}">Редагувати</a><form method="post" action="{{ route('admin.activities.destroy',$activity) }}" onsubmit="return confirm('Видалити напрям?')">@csrf @method('DELETE')<button class="btn danger" type="submit">Видалити</button></form></td></tr>
@endforeach
</tbody></table>{{ $activities->links() }}</div>
@endsection
