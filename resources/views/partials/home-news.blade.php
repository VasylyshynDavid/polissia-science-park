<section id="latest-news" style="margin:34px 0">
    <div style="display:flex;align-items:center;justify-content:space-between">
        <h3 class="section-title" style="text-align:left">Останні новини</h3>
        <a href="{{ route('news.index') }}" class="btn">Усі новини →</a>
    </div>

    <div class="activities-grid" style="margin-top:12px">
        @foreach($latestNews as $n)
            @include('partials.news-card', ['news' => $n])
        @endforeach
    </div>
</section>
