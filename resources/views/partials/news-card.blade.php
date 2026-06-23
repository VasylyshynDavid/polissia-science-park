@php
    $isEn = ($currentLocale ?? 'uk') === 'en';
    $title = $isEn ? $news->title_en : $news->title_ua;
    $excerpt = $isEn ? $news->excerpt_en : $news->excerpt_ua;
@endphp

<article class="news-card">
    @if(!empty($news->image_path))
        <a href="{{ route('news.show', $news) }}" class="news-card-media">
            <img src="{{ asset($news->image_path) }}" alt="{{ $title }}">
        </a>
    @endif

    <div class="news-card-body">
        <div class="news-card-meta">
            <div class="news-card-tags">
                @if($news->is_pinned)
                    <span class="news-card-badge">
                        {{ $isEn ? 'Pinned' : 'Закріплено' }}
                    </span>
                @endif

                @if($news->category)
                    <a href="{{ route('news.index', ['category' => $news->category->slug]) }}" class="news-card-category">
                        {{ $isEn ? $news->category->name_en : $news->category->name_ua }}
                    </a>
                @endif
            </div>

            <time class="news-card-date">
                {{ $news->published_at ? ($isEn ? $news->published_at->translatedFormat('F j, Y') : $news->published_at->translatedFormat('j F Y')) : '' }}
            </time>
        </div>

        <h3 class="news-card-title">
            <a href="{{ route('news.show', $news) }}">{{ $title }}</a>
        </h3>

        <p class="news-card-excerpt">{{ $excerpt }}</p>

        <div class="news-card-footer">
            <a href="{{ route('news.show', $news) }}" class="news-card-more">
                {{ $isEn ? 'Read More →' : 'Читати далі →' }}
            </a>
        </div>
    </div>
</article>
