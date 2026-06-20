<section id="latest-news" class="latest-news-section">
    <div class="latest-news-head" style="display:flex;align-items:center;justify-content:space-between">
        <h3 style="margin:0;font-family:Montserrat, sans-serif;font-weight:700;color:var(--green);text-transform:uppercase">{{ ($currentLocale ?? 'uk') === 'en' ? 'LATEST NEWS' : 'ОСТАННІ НОВИНИ' }}</h3>
        <a href="{{ route('news.index') }}" style="color:var(--green);font-weight:600;text-decoration:none">{{ ($currentLocale ?? 'uk') === 'en' ? 'All News →' : 'Усі новини →' }}</a>
    </div>

    <div class="activities-grid" style="margin-top:12px;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:18px">
        @foreach($latestNews as $n)
            @include('partials.news-card-mini', ['item' => $n])
        @endforeach
    </div>
</section>
