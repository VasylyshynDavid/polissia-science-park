@extends('admin.layouts.app')
@section('title','Наші можливості')
@section('content')
<div class="topbar"><h1>Наші можливості</h1><a class="btn" href="{{ route('admin.opportunities.create') }}">+ Додати можливість</a></div>
<div class="card">Активних записів: <b>{{ $activeCount }}</b> / {{ $maxActive }}</div>
<div class="card table-wrap"><table class="table"><thead><tr><th>Іконка</th><th>Опис UA</th><th>Опис EN</th><th>Порядок</th><th>Статус</th><th>Дії</th></tr></thead><tbody>
@foreach($opportunities as $opportunity)
<tr><td><img class="thumb" src="{{ asset($opportunity->image_path) }}" alt=""></td><td>{{ $opportunity->description_ua }}</td><td>{{ $opportunity->description_en }}</td><td>{{ $opportunity->sort_order }}</td><td><span class="badge {{ $opportunity->is_active ? 'ok':'off' }}">{{ $opportunity->is_active ? 'Активний':'Прихований' }}</span></td><td class="actions"><a class="btn secondary" href="{{ route('admin.opportunities.edit',$opportunity) }}">Редагувати</a><form method="post" action="{{ route('admin.opportunities.destroy',$opportunity) }}" onsubmit="return confirm('Видалити можливість?')">@csrf @method('DELETE')<button class="btn danger" type="submit">Видалити</button></form></td></tr>
@endforeach
</tbody></table>{{ $opportunities->links() }}</div>
@endsection
