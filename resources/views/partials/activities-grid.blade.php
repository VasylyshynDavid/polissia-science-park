<div class="activities-grid">
    @foreach($activities as $activity)
        <article class="card">
            <div class="head">
                <img src="{{ asset($activity->image_path) }}" alt="{{ $activity->title_ua }}">
                <div>
                    <h3>{{ $activity->title_ua }}</h3>
                    <div class="en-title">{{ $activity->title_en }}</div>
                </div>
            </div>

            <div class="desc">{{ $activity->description_ua }}</div>
            <div class="en-desc">{{ $activity->description_en }}</div>
        </article>
    @endforeach
</div>
