<a href="{{ route('news.show', $item) }}" class="news-mini" style="display:block;text-decoration:none">
    @if($item->image_path)
        <img src="{{ asset($item->image_path) }}" alt="{{ $item->title_ua }}" style="width:100%;height:170px;object-fit:cover;border-radius:10px;display:block">
    @endif
    <div style="padding:10px 0 0 0">
        <h4 style="margin:0;font-family:Montserrat, sans-serif;font-weight:600;font-size:16px;color:var(--green);line-height:1.2;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden">{{ $item->title_ua }}</h4>
        <div style="margin-top:6px;color:#6b7280;font-size:14px">{{ $item->published_at?->translatedFormat('j F Y') }}</div>
    </div>
</a>
