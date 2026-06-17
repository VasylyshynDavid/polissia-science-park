@php
    $isEn = ($currentLocale ?? 'uk') === 'en';

    $activityIcons = [
        'icons/fb8a1396-7b36-4774-ab1e-566dab0ee48c.png',
        'icons/d66c1d3b-eede-4830-946a-94656ea9bbf9.png',
        'icons/b9f6da59-8ad9-46a9-a826-7af0b1c6c88c.png',
        'icons/25ec3d30-cef8-483b-a41e-424eb3ff8874.png',
        'icons/image-Photoroom.png',
    ];
@endphp

<div class="activities-grid">
    @foreach($activities as $activity)
        <article id="activity-{{ $activity->id }}" class="card activity-card">
            <div style="display:flex;justify-content:center;margin-bottom:12px">
                <div class="icon-circle">
                    <img src="{{ asset('images/' . ($activityIcons[$loop->index] ?? 'placeholder.svg')) }}"
                         alt="{{ $isEn ? $activity->title_en : $activity->title_ua }}"
                         class="activity-icon-img">
                </div>
            </div>

            <h3 class="activity-title">{{ $activity->title_ua }}</h3>
            <p class="desc" style="min-height:56px;font-size:14px">{{ $activity->description_ua }}</p>
        </article>
    @endforeach
</div>
