@extends('layouts.app')

@section('title', 'Наші можливості - Поліський науковий парк')

@section('content')
    <div class="container">
        <h1 class="section-title">Наші можливості</h1>

        @include('partials.opportunities-grid', ['opportunities' => $opportunities])
    </div>
@endsection
