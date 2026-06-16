<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Поліський науковий парк')</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root{
        --dark:#042C22;
            --green:#0A4A33;
            --olive:#8FB35A;
            --olive-light:#A8C96A;
            --gold:#C7A84A;
            --cream:#F3EBDD;
            --bg:#F8F8F4;
            --text:#1F2937;
            --card: #ffffff;
            --container: 1200px;
        }

        html,body{height:100%;}
        html{scroll-behavior: smooth;}
        body{margin:0;font-family:Inter, Arial, Helvetica, sans-serif;background:var(--bg);color:var(--text);font-size:16px}
        .container{max-width:var(--container);margin:0 auto;padding:20px}

        /* Ensure sections are flush with each other; sections provide their own padding */
        main > section{margin:0}
        .container > section{margin:0}

        /* Header */
        header {
            background: #042C22;
            border-bottom: 2px solid rgba(199, 168, 74, 0.28);
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .header-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
            padding: 12px 0;
            min-height: 86px;
        }

        .logo-wrap {
            display: flex;
            align-items: center;
            text-decoration: none;
            flex-shrink: 0;
            max-height: 70px;
            padding: 4px 0;
        }

        .logo-img {
            display: block;
            height: 70px;
            max-height: 70px;
            width: auto;
            object-fit: contain;
            object-position: left center;
        }

        nav {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex: 1;
            margin-left: auto;
            gap: 0;
        }

        nav a {
            display: inline-flex;
            align-items: center;
            color: #ffffff;
            text-decoration: none;
            font-family: Montserrat, sans-serif;
            font-weight: 600;
            font-size: 16px;
            line-height: 1;
            margin: 0 15px;
            white-space: nowrap;
        }

        nav a:hover {
            color: #C7A84A;
            text-decoration: none;
        }

        .has-dropdown > a {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .locale-switch {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
            padding: 0;
            margin-left: 15px;
            border: none;
            background: transparent;
            color: #ffffff;
            font-family: Montserrat, sans-serif;
            font-weight: 600;
            font-size: 16px;
            line-height: 1;
        }

        .locale-switch a,
        .locale-switch span {
            display: inline-flex;
            align-items: center;
            line-height: 1;
        }

        .locale-switch .active {
            color: #C7A84A;
            border-bottom: 2px solid #C7A84A;
            padding-bottom: 6px;
        }

        .search-icon {
            width: 28px;
            height: 28px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-left: 15px;
            flex-shrink: 0;
        }

        .search-icon svg {
            width: 18px;
            height: 18px;
            fill: #ffffff;
        }

        .search-icon:hover svg {
            fill: #C7A84A;
        }

        .footer-logo { width: auto; height: 48px; display: block; margin-bottom: 8px }

        @media (max-width: 1100px) {
            .header-inner { gap: 20px; }
            .logo-img { height: 54px; max-height: 54px; }
            nav a { font-size: 14px; margin: 0 10px; }
            .locale-switch { font-size: 14px; margin-left: 10px; }
        }

        @media (max-width: 900px) {
            .header-inner { min-height: 72px; padding: 8px 0; }
            .logo-img { height: 50px; max-height: 50px; }
            nav { display: none; }
            .burger { display: block; color: #fff; font-size: 24px; cursor: pointer; }
            #nav-toggle:checked + label.burger + nav {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                position: absolute;
                left: 0;
                right: 0;
                top: 72px;
                padding: 18px 20px;
                background: #042C22;
                gap: 14px;
                border-top: 1px solid rgba(199, 168, 74, 0.25);
            }

            #nav-toggle:checked + label.burger + nav a {
                margin: 0;
                font-size: 16px;
            }
        }

        /* Buttons */
        .btn{display:inline-block;padding:8px 14px;border-radius:8px;background:#fff;color:var(--dark);font-family:Montserrat, sans-serif;font-weight:600;border:none}
        .btn-outline{display:inline-block;padding:8px 14px;border-radius:8px;background:transparent;color:#fff;font-family:Montserrat, sans-serif;border:1px solid rgba(255,255,255,0.18)}
        .btn-outline:hover{border-color:rgba(255,255,255,0.5);color:#fff}

        footer{background:var(--dark);color:#fff;padding:40px 0}
        .footer-inner{display:flex;justify-content:space-between;gap:20px;align-items:flex-start}
        .footer-left h4{font-family:Montserrat, sans-serif;font-weight:700;color:#fff;margin:0 0 8px}
        .footer-left p{margin:0;color:#fff;max-width:520px}
        .footer-right{display:flex;flex-direction:column;gap:8px}
        .socials{display:flex;gap:8px;align-items:center}
        .socials a{display:inline-flex;width:36px;height:36px;border-radius:6px;align-items:center;justify-content:center;color:#fff;opacity:0.85}
        .socials a svg{fill:#fff}
        .socials a:hover svg{fill:var(--olive-light);background:transparent}
        /* QR image link in footer */
        .footer-right .qr-link{display:block;align-self:flex-end}
        .qr-link img{display:block;width:96px;height:96px;border-radius:8px;background:#fff;padding:6px}
        .qr-caption{font-size:13px;color:rgba(255,255,255,.7);margin-top:8px;display:block}
        @media(max-width:900px){
            .footer-right .qr-link{align-self:center}
        }

        /* Activities / cards shared styles (used by home and /activities) */
        .section-title{
            font-size:40px;
            color:var(--green);
            margin:16px 0;
            text-align:center;
            font-weight:800;
            font-family:Montserrat, sans-serif;
        }

        .activities-grid{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(240px,1fr));
            gap:20px;
            margin:20px 0 36px;
            align-items:stretch;
        }

        .card{
            background:var(--card);
            border-radius:12px;
            box-shadow:0 6px 18px rgba(18,36,24,0.06);
            padding:18px;
            display:flex;
            flex-direction:column;
            min-height:150px;
            transition:transform .15s ease,box-shadow .15s ease;
        }

        .card:hover{
            transform:translateY(-6px);
            box-shadow:0 12px 30px rgba(18,36,24,0.10);
        }

        .card .head{
            display:flex;
            align-items:center;
            gap:12px;
            margin-bottom:8px;
        }

        .card img{
            width:56px;
            height:56px;
            object-fit:cover;
            border-radius:8px;
            flex:0 0 56px;
            background:#f4fbf6;
            border:1px solid rgba(45,106,79,0.06);
        }

        .card h3{
            margin:0;
            font-size:22px;
            color:var(--green);
            line-height:1.15;
            font-family:Montserrat, sans-serif;
        }

        .card .en-title{
            display:block;
            font-size:.9rem;
            color:rgba(0,0,0,0.55);
            margin-top:4px;
            font-weight:600;
            font-family:Montserrat, sans-serif;
        }

        .card .desc{
            margin-top:10px;
            color:var(--text);
            font-size:.95rem;
            line-height:1.45;
            flex:1 1 auto;
            font-family:Inter, sans-serif;
        }

        /* Opportunities styles (shared) */
        .opportunities-grid{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
            gap:16px;
            margin-top:12px;
        }

        .opportunity-card{
            background:var(--card);
            padding:14px;
            border-radius:10px;
            box-shadow:0 6px 18px rgba(18,36,24,0.06);
            display:flex;
            align-items:flex-start;
            gap:12px;
        }

        .opportunity-card img{
            width:52px;
            height:52px;
            object-fit:cover;
            border-radius:8px;
            flex:0 0 52px;
            background:#f4fbf6;
        }

        .opportunity-card .ua-text{
            font-weight:700;
            color:var(--green);
            margin-bottom:6px;
        }

        .opportunity-card .en-text{
            color:rgba(0,0,0,0.55);
            font-size:.92rem;
        }

        /* Hero slider styles */
        .hero{--slider-accent:var(--green)}
        .hero-slider{position:relative;background:linear-gradient(180deg,#f6fbf8,#eef7ee);border-radius:12px;padding:10px;min-height:220px;overflow:hidden}
        .slide{display:none;align-items:center;gap:12px;padding:8px}
        .slide.active{display:flex}
        .slide-image{width:140px;height:100px;object-fit:cover;border-radius:8px;flex:0 0 140px}
        .slide-content h3{margin:0;color:var(--slider-accent);font-size:1.05rem;font-family:Montserrat, sans-serif}
        .slide-content .en-title{font-weight:600;color:rgba(0,0,0,0.55);font-size:.9rem;margin-top:6px}
        .slide-desc{margin-top:8px;color:var(--text)}

        .slider-controls{position:absolute;left:8px;right:8px;bottom:8px;display:flex;justify-content:space-between;pointer-events:none}
        .slider-controls button{pointer-events:auto;background:var(--green);color:#fff;border:none;padding:6px 10px;border-radius:8px}

        .slider-dots{position:absolute;left:50%;transform:translateX(-50%);bottom:8px;display:flex;gap:8px}
        .slider-dot{width:10px;height:10px;border-radius:50%;background:rgba(10,74,51,0.15);border:none}
        .slider-dot.active{background:var(--green)}
        /* New grid rules for homepage */
        .activities-grid{grid-template-columns:repeat(auto-fit,minmax(210px,1fr))}
        @media(max-width:1100px){
            .activities-grid{grid-template-columns:repeat(2,1fr)}
            .opportunities-grid{grid-template-columns:repeat(2,1fr)}
        }
        @media(max-width:700px){
            .activities-grid{grid-template-columns:1fr}
            .opportunities-grid{grid-template-columns:1fr}
            .hero-inner{grid-template-columns:1fr}
        }

        /* Header responsive burger */
        #nav-toggle{display:none}
        .burger{display:none}
        @media(max-width:900px){
            nav{display:none}
            .burger{display:block;color:#fff;font-size:24px;cursor:pointer}
            /* Checkbox hack to toggle nav */
            #nav-toggle:checked + label.burger + nav{display:flex;flex-direction:column;position:absolute;left:0;right:0;top:72px;padding:12px;background:var(--dark);gap:12px}
        }

        /* Activities and opportunities card tweaks */
        .activity-card{background:#fff;border-radius:14px;box-shadow:0 8px 22px rgba(15,30,18,0.06);padding:20px;display:flex;flex-direction:column}
        .activity-card .icon-circle{width:72px;height:72px;border-radius:50%;background:linear-gradient(180deg,rgba(143,179,90,0.12),rgba(168,201,106,0.06));display:flex;align-items:center;justify-content:center}
        .activity-title{font-family:Montserrat, sans-serif;font-weight:600;color:var(--green);margin-top:8px}

        .opportunity-home{background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.12);border-radius:12px;padding:14px;color:var(--cream)}
        .opportunity-home .ua-text{color:var(--cream);font-weight:700}

        /* Force 5 columns on very wide screens for activities, 6 for opportunities */
        @media(min-width:1400px){
            .activities-grid{grid-template-columns:repeat(5,1fr)}
            .opportunities-grid{grid-template-columns:repeat(6,1fr)}
        }
        .opportunities-grid{grid-template-columns:repeat(auto-fit,minmax(170px,1fr))}
        .opportunities-section{background:linear-gradient(135deg,var(--dark),var(--green));border-radius:18px;padding:18px}
        /* Dropdown styles for activities menu */
        .has-dropdown{position:relative}
        .has-dropdown .chev svg{transition:transform .18s ease}
        .dropdown{position:absolute;top:100%;left:0;min-width:280px;background:var(--dark);border:1px solid rgba(255,255,255,.06);border-radius:0 0 10px 10px;box-shadow:0 12px 30px rgba(0,0,0,.35);padding:8px 0;opacity:0;visibility:hidden;transform:translateY(8px);transition:opacity .2s, transform .2s;z-index:50}
        .has-dropdown:hover .dropdown{opacity:1;visibility:visible;transform:translateY(0)}
        .dropdown a{display:block;padding:10px 18px;color:#fff;font-size:15px;text-decoration:none}
        .dropdown a:hover{color:var(--olive-light);background:rgba(255,255,255,.03)}

        /* mobile open via .open class */
        .has-dropdown.open .dropdown{position:static;opacity:1;visibility:visible;transform:none}
        .has-dropdown.open .chev svg{transform:rotate(180deg)}
    </style>
    @yield('head')
</head>
<body>
    <header>
        <div class="container header-inner">
            <a href="{{ route('home') }}" class="logo-wrap" aria-label="Науковий парк Поліський університет">
                <img src="{{ asset('images/logo-science-park.png') }}" alt="Науковий парк Поліський університет" class="logo-img">
            </a>

            <input type="checkbox" id="nav-toggle">
            <label for="nav-toggle" class="burger">☰</label>
            <nav>
                <a href="{{ route('news.index') }}">Новини</a>
                <a href="{{ route('home') }}#about">Про нас</a>
                <div class="nav-item has-dropdown">
                    <a href="{{ route('activities.index') }}">Напрями діяльності <span class="chev">@include('partials.icons.chev')</span></a>
                    <div class="dropdown">
                        @if(isset($menuActivities))
                            @foreach($menuActivities as $item)
                                <a href="{{ route('activities.index') }}#activity-{{ $item->id }}">{{ $item->title_ua }}</a>
                            @endforeach
                        @endif
                    </div>
                </div>
                <a href="{{ route('opportunities.index') }}">Наші можливості</a>
                <a href="{{ route('home') }}#contacts">Наші контакти</a>

                <div style="width:8px"></div>

                <div class="locale-switch" aria-hidden>
                    <span class="active">UA</span>
                    <span style="opacity:.6"> | </span>
                    <span>EN</span>
                </div>

                <div class="search-icon" role="button" aria-label="Search">
                    <svg width="18" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden>
                        <path d="M21.71 20.29l-3.4-3.39A8 8 0 1 0 18 18.31l3.39 3.4a1 1 0 0 0 1.41-1.42zM4 10a6 6 0 1 1 6 6 6 6 0 0 1-6-6z" />
                    </svg>
                </div>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer id="contacts">
        <div class="container">
            <div class="footer-inner">
                <div class="footer-left">
                    <img src="{{ asset('images/logo-science-park.png') }}" alt="Науковий парк Поліський університет" class="footer-logo">
                    <h4>Будуємо майбутнє разом</h4>
                    <p>Приєднуйтесь до спільноти інноваторів, дослідників, підприємців та всіх, хто прагне створювати позитивні зміни.</p>
                </div>

                <div class="footer-right">
                    <div><strong>Електронна пошта:</strong> <a href="mailto:naukpark@polissiauniver.edu.ua" style="color:#fff">naukpark@polissiauniver.edu.ua</a></div>
                    <div><strong>Адреса:</strong> 10008, Україна, Житомирська область, м. Житомир, Старий бульвар, 7</div>

                        <div style="display:flex;align-items:center;gap:12px;margin-top:8px">
                            <div class="socials">
                                <a href="#" aria-label="Facebook">
                                    <svg width="16" height="16" viewBox="0 0 24 24"><path d="M22 12a10 10 0 1 0-11.5 9.9v-7H8v-3h2.5V9.5c0-2.5 1.5-3.9 3.7-3.9 1.1 0 2.3.2 2.3.2v2.5h-1.3c-1.3 0-1.7.8-1.7 1.6V12H20l-1 3h-2v7A10 10 0 0 0 22 12z"/></svg>
                                </a>
                                <a href="#" aria-label="LinkedIn">
                                    <svg width="16" height="16" viewBox="0 0 24 24"><path d="M4.98 3.5C4.98 4.88 3.86 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1 4.98 2.12 4.98 3.5zM0 8h5v16H0zM7.5 8h4.8v2.2h.1c.7-1.3 2.4-2.6 4.9-2.6C22.8 7.6 24 10 24 14.4V24h-5v-8.6c0-2.1 0-4.8-3-4.8-3 0-3.5 2.4-3.5 4.7V24h-5V8z"/></svg>
                                </a>
                                <a href="#" aria-label="Telegram">
                                    <svg width="16" height="16" viewBox="0 0 24 24"><path d="M21.5 3.2L2.6 9.2c-.8.3-.8 1.2.1 1.5l4.4 1.4 1.6 5.1c.2.7 1.1.8 1.5.2L12 15l6.2 3.6c.6.3 1.4-.1 1.5-.8l2.1-18c.1-.7-.6-1.2-1.3-.9z"/></svg>
                                </a>
                            </div>

                            <div style="display:flex;flex-direction:column;align-items:center;gap:6px">
                                <a href="mailto:naukpark@polissiauniver.edu.ua" class="qr-link" title="Написати нам">
                                    <img src="{{ asset('images/qr-code.png') }}" alt="QR-код — napysaty na naukpark@polissiauniver.edu.ua" width="96" height="96" loading="lazy">
                                </a>
                                <span class="qr-caption">Скануй для зв'язку з нами</span>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </footer>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        function isMobile(){ return window.innerWidth < 900 }
        document.querySelectorAll('.has-dropdown').forEach(function(el){
            el.addEventListener('click', function(e){
                if(!isMobile()) return; // only intercept on mobile
                // toggle open state
                e.preventDefault();
                el.classList.toggle('open');
            });
        });

        // close dropdowns when clicking outside on mobile
        document.addEventListener('click', function(e){
            if(!isMobile()) return;
            document.querySelectorAll('.has-dropdown.open').forEach(function(el){
                if(!el.contains(e.target)) el.classList.remove('open');
            });
        });
    });
</script>
</html>
