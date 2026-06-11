<section id="latest-news" style="margin:34px 0;background:var(--card);padding:18px;border-radius:12px">
    <div style="display:flex;align-items:center;justify-content:space-between">
        <h3 class="section-title" style="text-align:left;color:var(--gold)">ОСТАННІ НОВИНИ</h3>
        <a href="{{ route('news.index') }}" class="btn">Усі новини →</a>
    </div>

    <div class="activities-grid" style="margin-top:12px;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));">
        @foreach($latestNews as $n)
            <article class="card">
                @if($n->image_path)
                    <img src="{{ asset($n->image_path) }}" alt="{{ $n->title_ua }}" style="width:100%;height:200px;object-fit:cover;border-radius:8px;margin-bottom:12px">
                @endif
                <div style="color:rgba(0,0,0,0.5);font-size:.85rem">{{ $n->published_at?->format('d.m.Y') }}</div>
                <h3 style="margin:6px 0;color:var(--green);font-family:Montserrat, sans-serif;font-weight:600">{{ $n->title_ua }}</h3>
                <p style="color:var(--text);font-family:Inter, sans-serif">{{ $n->excerpt_ua }}</p>
            </article>
        @endforeach
    </div>
</section>
