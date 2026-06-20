@php
    $isEn = ($currentLocale ?? 'uk') === 'en';
@endphp
<article class="card">
    @if(!empty($news->image_path))
        <img src="{{ asset($news->image_path) }}" alt="{{ $isEn ? $news->title_en : $news->title_ua }}" style="width:100%;height:160px;object-fit:cover;border-radius:8px;margin-bottom:12px">
    @endif

    <div style="display:flex;justify-content:space-between;align-items:center;gap:8px;margin-bottom:8px">
        <div style="display:flex;gap:8px;align-items:center">
            @if($news->is_pinned)
                <span style="background:var(--green);color:#fff;padding:6px 8px;border-radius:8px;font-weight:700;font-size:.85rem">{{ $isEn ? 'Pinned' : 'Закріплено' }}</span>
            @endif
            @if($news->category)
                <a href="{{ route('news.index', ['category' => $news->category->slug]) }}" class="btn btn-outline" style="padding:6px 10px;font-weight:600;background:rgba(10,74,51,0.8);color:#fff">{{ $isEn ? $news->category->name_en : $news->category->name_ua }}</a>
            @endif
        </div>
        <div style="color:var(--text);font-size:.9rem;font-weight:500">{{ $news->published_at ? ($isEn ? $news->published_at->translatedFormat('F j, Y') : $news->published_at->translatedFormat('j F Y')) : '' }}</div>
    </div>


    <h3 style="margin:6px 0"><a href="{{ route('news.show', $news) }}" style="color:var(--green);text-decoration:none">{{ $isEn ? $news->title_en : $news->title_ua }}</a></h3>

    <p class="desc" style="margin-top:10px">{{ $isEn ? $news->excerpt_en : $news->excerpt_ua }}</p>

    <div style="margin-top:12px;text-align:right">
        <a href="{{ route('news.show', $news) }}" class="btn" style="background:var(--green);color:#fff">{{ $isEn ? 'Read More →' : 'Читати далі →' }}</a>
    </div>
</article>
