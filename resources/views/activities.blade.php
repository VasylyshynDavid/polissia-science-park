@extends('layouts.app')

@section('title', 'Напрями діяльності - Поліський науковий парк')

@section('content')
    <div class="container">
        <h1 class="section-title">Напрями діяльності</h1>

        <section id="activities">
            @include('partials.activities-grid', ['activities' => $activities])
        </section>
    </div>
@endsection
