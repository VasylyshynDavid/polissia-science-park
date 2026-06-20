<?php echo '<' . '?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xhtml="http://www.w3.org/1999/xhtml">
    <url>
        <loc>{{ url('/') }}</loc>
        <xhtml:link rel="alternate" hreflang="uk" href="{{ url('/?lang=uk') }}"/>
        <xhtml:link rel="alternate" hreflang="en" href="{{ url('/?lang=en') }}"/>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ url('/activities') }}</loc>
        <xhtml:link rel="alternate" hreflang="uk" href="{{ url('/activities?lang=uk') }}"/>
        <xhtml:link rel="alternate" hreflang="en" href="{{ url('/activities?lang=en') }}"/>
        <changefreq>monthly</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>{{ url('/opportunities') }}</loc>
        <xhtml:link rel="alternate" hreflang="uk" href="{{ url('/opportunities?lang=uk') }}"/>
        <xhtml:link rel="alternate" hreflang="en" href="{{ url('/opportunities?lang=en') }}"/>
        <changefreq>monthly</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>{{ url('/news') }}</loc>
        <xhtml:link rel="alternate" hreflang="uk" href="{{ url('/news?lang=uk') }}"/>
        <xhtml:link rel="alternate" hreflang="en" href="{{ url('/news?lang=en') }}"/>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    @foreach($news as $item)
    <url>
        <loc>{{ url('/news/' . $item->slug) }}</loc>
        <xhtml:link rel="alternate" hreflang="uk" href="{{ url('/news/' . $item->slug . '?lang=uk') }}"/>
        <xhtml:link rel="alternate" hreflang="en" href="{{ url('/news/' . $item->slug . '?lang=en') }}"/>
        <lastmod>{{ $item->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach
</urlset>
