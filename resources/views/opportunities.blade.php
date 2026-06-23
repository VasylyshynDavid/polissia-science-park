@extends('layouts.app')

@php
    $isEn = ($currentLocale ?? 'uk') === 'en';
@endphp

@section('title', $isEn ? 'Our Opportunities — Science Park Polissia University' : 'Наші можливості — Поліський науковий парк')

@section('content')
    <div class="container" style="padding-top:30px;padding-bottom:40px">
        <section id="opportunities" class="opportunities-section" style="margin-top:0">
            <h1 class="section-title" style="margin-top:0;text-transform:uppercase;color:#ffffff">{{ $isEn ? 'OUR OPPORTUNITIES' : 'НАШІ МОЖЛИВОСТІ' }}</h1>

            @include('partials.opportunities-grid', ['opportunities' => $opportunities])
        </section>
    </div>
@endsection
