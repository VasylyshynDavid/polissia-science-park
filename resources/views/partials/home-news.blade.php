<section id="latest-news" style="margin:34px 0;background:var(--card);padding:18px;border-radius:12px">
    <div style="display:flex;align-items:center;justify-content:space-between">
        <h3 style="margin:0;font-family:Montserrat, sans-serif;font-weight:700;color:var(--gold);text-transform:uppercase">ОСТАННІ НОВИНИ</h3>
        <a href="{{ route('news.index') }}" style="color:var(--gold);font-weight:600;text-decoration:none">Усі новини →</a>
    </div>

    <div class="activities-grid" style="margin-top:12px;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:18px">
        @foreach($latestNews as $n)
            @include('partials.news-card-mini', ['item' => $n])
        @endforeach
    </div>
</section>
