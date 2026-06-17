@php
    $isEn = ($currentLocale ?? 'uk') === 'en';

    $opportunityIcons = [
        'icons/image-Photoroom (1).png',
        'icons/image-Photoroom (2).png',
        'icons/image-Photoroom (3).png',
        'icons/image-Photoroom (4).png',
        'icons/image-Photoroom (5).png',
        'icons/image-Photoroom (6).png',
    ];
@endphp

@if(isset($opportunities) && count($opportunities))
    <div class="opportunities-grid">
        @foreach($opportunities as $idx => $opportunity)
            <div class="opportunity-card opportunity-home">
                <div class="opportunity-icon-wrap">
                    <img src="{{ asset('images/' . ($opportunityIcons[$idx] ?? 'placeholder.svg')) }}"
                         alt="{{ $isEn ? $opportunity->description_en : $opportunity->description_ua }}"
                         class="opportunity-icon-img">
                </div>

                <div class="ua-text">{{ $opportunity->description_ua }}</div>
            </div>
        @endforeach
    </div>
@else
    <p>No opportunities available.</p>
@endif
