@extends('layouts.app')

@php
    $isEn = ($currentLocale ?? 'uk') === 'en';
@endphp

@section('title', $isEn ? 'Areas of Activity — Science Park Polissia University' : 'Напрями діяльності — Поліський науковий парк')

@section('content')
    <div class="container" style="padding-top:30px;padding-bottom:40px">
        <h1 class="section-title" style="margin-top:0;text-transform:uppercase">{{ $isEn ? 'AREAS OF ACTIVITY' : 'НАПРЯМИ ДІЯЛЬНОСТІ' }}</h1>

        <section id="activities">
            @include('partials.activities-grid', ['activities' => $activities])
        </section>
    </div>
@endsection
