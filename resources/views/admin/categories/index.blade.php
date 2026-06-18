@extends('admin.layouts.app')
@section('title','Категорії новин')
@section('content')
<div class="topbar"><h1>Категорії новин</h1><a class="btn" href="{{ route('admin.categories.create') }}">+ Додати категорію</a></div>
<div class="card table-wrap"><table class="table"><thead><tr><th>Назва UA</th><th>Назва EN</th><th>Slug</th><th>Порядок</th><th>Дії</th></tr></thead><tbody>
@foreach($categories as $category)
<tr><td><b>{{ $category->name_ua }}</b></td><td>{{ $category->name_en }}</td><td>{{ $category->slug }}</td><td>{{ $category->sort_order }}</td><td class="actions"><a class="btn secondary" href="{{ route('admin.categories.edit',$category) }}">Редагувати</a><form method="post" action="{{ route('admin.categories.destroy',$category) }}" onsubmit="return confirm('Видалити категорію?')">@csrf @method('DELETE')<button class="btn danger" type="submit">Видалити</button></form></td></tr>
@endforeach
</tbody></table>{{ $categories->links() }}</div>
@endsection
