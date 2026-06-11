<article class="card">
    @if(!empty($news->image_path))
        <img src="{{ asset($news->image_path) }}" alt="{{ $news->title_ua }}" style="width:100%;height:160px;object-fit:cover;border-radius:8px;margin-bottom:12px">
    @endif

    <div style="display:flex;justify-content:space-between;align-items:center;gap:8px;margin-bottom:8px">
        <div style="display:flex;gap:8px;align-items:center">
            @if($news->is_pinned)
                <span style="background:rgba(199,168,74,0.12);color:var(--gold);padding:6px 8px;border-radius:8px;font-weight:700;font-size:.85rem">Закріплено</span>
            @endif
            <a href="{{ route('news.index', ['category' => $news->category?->slug]) }}" class="btn btn-outline" style="padding:6px 10px;font-weight:600">{{ $news->category?->name_ua }}</a>
        </div>
        <div style="color:rgba(255,255,255,0.75);font-size:.9rem">{{ $news->published_at?->format('d.m.Y') }}</div>
    </div>


    <h3 style="margin:6px 0"><a href="{{ route('news.show', $news) }}" style="color:var(--green)">{{ $news->title_ua }}</a></h3>

    <p class="desc" style="margin-top:10px">{{ $news->excerpt_ua }}</p>

    <div style="margin-top:12px;text-align:right">
        <a href="{{ route('news.show', $news) }}" class="btn">Читати далі →</a>
    </div>
</article>
