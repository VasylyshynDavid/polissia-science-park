@php
    $isEn = ($currentLocale ?? 'uk') === 'en';
@endphp

<div class="activities-grid">
    @foreach($activities as $activity)
        <article id="activity-{{ $activity->id }}" class="card activity-card">
            <div style="display:flex;justify-content:center;margin-bottom:12px">
                <div class="icon-circle">
                    <img src="{{ asset($activity->image_path) }}"
                         alt="{{ $isEn ? $activity->title_en : $activity->title_ua }}"
                         class="activity-icon-img">
                </div>
            </div>

            <h3 class="activity-title">{{ $isEn ? $activity->title_en : $activity->title_ua }}</h3>
            <p class="desc" style="min-height:56px;font-size:14px">{{ $isEn ? $activity->description_en : $activity->description_ua }}</p>
        </article>
    @endforeach
</div>
