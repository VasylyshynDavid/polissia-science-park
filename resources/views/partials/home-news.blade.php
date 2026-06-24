<section id="latest-news" class="latest-news-section latest-news-fixed">
    <style>
        /* === HARD FIX V2: HOME LATEST NEWS FLEX ROW === */

        #latest-news.latest-news-fixed {
            width: 100% !important;
            box-sizing: border-box !important;
            overflow: hidden !important;
        }

        #latest-news.latest-news-fixed .latest-news-head {
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            gap: 16px !important;
            margin-bottom: 22px !important;
        }

        #latest-news.latest-news-fixed .latest-news-title {
            margin: 0 !important;
            font-family: Montserrat, sans-serif !important;
            font-size: 24px !important;
            line-height: 1.2 !important;
            font-weight: 800 !important;
            color: var(--green) !important;
            text-transform: uppercase !important;
        }

        #latest-news.latest-news-fixed .latest-news-all {
            color: var(--green) !important;
            font-family: Montserrat, sans-serif !important;
            font-weight: 700 !important;
            text-decoration: none !important;
            white-space: nowrap !important;
        }

        #latest-news.latest-news-fixed .latest-news-row {
            display: flex !important;
            flex-direction: row !important;
            flex-wrap: nowrap !important;
            align-items: flex-start !important;
            justify-content: flex-start !important;
            gap: 22px !important;
            width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        #latest-news.latest-news-fixed .latest-news-item {
            flex: 1 1 0 !important;
            min-width: 0 !important;
            max-width: none !important;
            width: auto !important;
            margin: 0 !important;
            padding: 0 !important;
            position: static !important;
            transform: none !important;
            grid-column: auto !important;
            grid-row: auto !important;
        }

        #latest-news.latest-news-fixed .news-mini {
            display: block !important;
            width: 100% !important;
            max-width: none !important;
            min-width: 0 !important;
            margin: 0 !important;
            padding: 0 !important;
            position: static !important;
            transform: none !important;
            text-decoration: none !important;
            color: inherit !important;
        }

        #latest-news.latest-news-fixed .news-mini img {
            width: 100% !important;
            height: 170px !important;
            object-fit: cover !important;
            border-radius: 12px !important;
            display: block !important;
            margin: 0 !important;
        }

        #latest-news.latest-news-fixed .news-mini h4 {
            margin: 0 !important;
            font-family: Montserrat, sans-serif !important;
            font-weight: 700 !important;
            font-size: 16px !important;
            color: var(--green) !important;
            line-height: 1.22 !important;
            display: -webkit-box !important;
            -webkit-line-clamp: 2 !important;
            -webkit-box-orient: vertical !important;
            overflow: hidden !important;
        }

        @media (min-width: 768px) and (max-width: 1100px) {
            #latest-news.latest-news-fixed .latest-news-row {
                flex-wrap: wrap !important;
            }

            #latest-news.latest-news-fixed .latest-news-item {
                flex: 0 0 calc(50% - 11px) !important;
            }
        }

        @media (max-width: 767px) {
            #latest-news.latest-news-fixed .latest-news-head {
                align-items: flex-start !important;
                flex-direction: column !important;
            }

            #latest-news.latest-news-fixed .latest-news-title {
                font-size: 22px !important;
            }

            #latest-news.latest-news-fixed .latest-news-row {
                flex-direction: column !important;
                flex-wrap: nowrap !important;
                gap: 18px !important;
            }

            #latest-news.latest-news-fixed .latest-news-item {
                flex: 0 0 auto !important;
                width: 100% !important;
            }

            #latest-news.latest-news-fixed .news-mini img {
                height: 190px !important;
            }
        }
    </style>

    <div class="latest-news-head">
        <h3 class="latest-news-title">
            {{ ($currentLocale ?? 'uk') === 'en' ? 'LATEST NEWS' : 'ОСТАННІ НОВИНИ' }}
        </h3>

        <a href="{{ route('news.index') }}" class="latest-news-all">
            {{ ($currentLocale ?? 'uk') === 'en' ? 'All News →' : 'Усі новини →' }}
        </a>
    </div>

    <div class="latest-news-row">
        @foreach($latestNews as $n)
            <div class="latest-news-item">
                @include('partials.news-card-mini', ['item' => $n])
            </div>
        @endforeach
    </div>
</section>
