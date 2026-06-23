<section id="latest-news" class="latest-news-section">
    <div class="latest-news-head">
        <h3 class="latest-news-title">
            {{ ($currentLocale ?? 'uk') === 'en' ? 'LATEST NEWS' : 'ОСТАННІ НОВИНИ' }}
        </h3>

        <a href="{{ route('news.index') }}" class="latest-news-all">
            {{ ($currentLocale ?? 'uk') === 'en' ? 'All News →' : 'Усі новини →' }}
        </a>
    </div>

    <div class="latest-news-grid">
        @foreach($latestNews as $n)
            @include('partials.news-card-mini', ['item' => $n])
        @endforeach
    </div>
</section>
