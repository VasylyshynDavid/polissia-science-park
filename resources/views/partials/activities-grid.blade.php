<div class="activities-grid">
    @foreach($activities as $activity)
        <article class="card activity-card">
            <div style="display:flex;justify-content:center;margin-bottom:12px">
                <div class="icon-circle">
                    @if($loop->index == 0)
                        <!-- leaf + chip -->
                        <svg width="36" height="36" viewBox="0 0 24 24" fill="none"><path d="M3 21s6-6 9-9 6-6 9-9" stroke="var(--green)" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    @elseif($loop->index == 1)
                        <!-- sprout -->
                        <svg width="36" height="36" viewBox="0 0 24 24" fill="none"><path d="M12 2v10" stroke="var(--green)" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/><path d="M8 6c2 2 4 2 6 0" stroke="var(--green)" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    @elseif($loop->index == 2)
                        <!-- monitor/network -->
                        <svg width="36" height="36" viewBox="0 0 24 24" fill="none"><rect x="3" y="3" width="18" height="12" rx="2" stroke="var(--green)" stroke-width="1.6"/><path d="M8 21h8M12 15v6" stroke="var(--green)" stroke-width="1.6" stroke-linecap="round"/></svg>
                    @elseif($loop->index == 3)
                        <!-- rocket -->
                        <svg width="36" height="36" viewBox="0 0 24 24" fill="none"><path d="M12 2s4 2 6 4 4 6 4 6-2 0-4 2-6 6-6 6-2-4-2-6S6 6 12 2z" stroke="var(--green)" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    @elseif($loop->index == 4)
                        <!-- graduation -->
                        <svg width="36" height="36" viewBox="0 0 24 24" fill="none"><path d="M12 2L2 7l10 5 10-5-10-5z" stroke="var(--green)" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/><path d="M2 17l10 5 10-5" stroke="var(--green)" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    @else
                        <img src="{{ asset($activity->image_path) }}" alt="{{ $activity->title_ua }}" />
                    @endif
                </div>
            </div>

            <h3 class="activity-title">{{ $activity->title_ua }}</h3>
            <p class="desc" style="min-height:56px;font-size:14px">{{ $activity->description_ua }}</p>
        </article>
    @endforeach
</div>
