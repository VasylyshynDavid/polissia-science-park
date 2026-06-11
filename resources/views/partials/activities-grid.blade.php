<div class="activities-grid">
    @foreach($activities as $activity)
        <article class="card activity-card">
            <div style="display:flex;justify-content:center;margin-bottom:12px">
                <div class="icon-circle">
                    <img src="{{ asset($activity->image_path) }}" alt="{{ $activity->title_ua }}" />
                </div>
            </div>

            <h3 class="activity-title">{{ $activity->title_ua }}</h3>
            <p class="desc">{{ $activity->description_ua }}</p>
        </article>
    @endforeach
</div>
