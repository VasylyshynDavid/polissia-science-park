<!DOCTYPE html>
<html lang="{{ $currentLocale ?? 'uk' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', ($currentLocale ?? 'uk') === 'en' ? 'Science Park Polissia University' : 'Поліський науковий парк')</title>
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

        .locale-switch a {
            margin: 0 !important;
            color: #ffffff;
            text-decoration: none;
            cursor: pointer;
        }

        .locale-switch a:hover {
            color: #C7A84A;
        }

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
            margin: 0 15px;
            flex-shrink: 0;
            cursor: pointer;
        }

        .search-icon svg {
            width: 18px;
            height: 18px;
            fill: none;
            stroke: #ffffff;
            stroke-width: 2.5px;
            transition: stroke 0.2s ease;
        }

        .search-icon:hover svg {
            stroke: #C7A84A;
            fill: none;
        }

        .footer-logo { width: auto; height: 48px; display: block; margin-bottom: 8px }
        .footer-heading { display: flex; align-items: center; gap: 12px; margin-bottom: 12px }
        .footer-heading h4 { margin: 0; font-family: Montserrat, sans-serif; font-weight: 800; color: #ffffff }
        .footer-leaf { width: 34px; height: 34px; display: inline-flex; align-items: center; justify-content: center; flex-shrink: 0 }

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

        /* Footer: compact dark card */
        .site-footer { background: #F8F8F4; padding: 26px 0 34px; }
        .site-footer .container { max-width: 1200px; }

        .footer-card {
            position: relative;
            overflow: hidden;
            display: grid;
            grid-template-columns: 1.35fr 1.05fr 120px;
            align-items: center;
            gap: 32px;
            min-height: 132px;
            padding: 22px 28px;
            border-radius: 12px;
            background:
                radial-gradient(circle at 0% 50%, rgba(143, 179, 90, 0.22), transparent 26%),
                linear-gradient(135deg, #042C22 0%, #063427 55%, #042C22 100%);
            color: #ffffff;
            box-shadow: 0 18px 42px rgba(4, 44, 34, 0.14);
        }

        .footer-left { position: relative; display: flex; align-items: center; gap: 22px; min-width: 0; }

        .footer-leaf-img { width: 92px; height: 92px; object-fit: contain; flex-shrink: 0; opacity: 0.78; mix-blend-mode: screen; }

        .footer-text h4 { margin: 0 0 10px; font-family: Montserrat, sans-serif; font-size: 22px; line-height: 1.15; font-weight: 800; color: #ffffff; }

        .footer-text p { margin: 0; max-width: 520px; font-size: 14px; line-height: 1.45; color: #F3EBDD; }

        .footer-center { display: flex; flex-direction: column; gap: 8px; min-width: 0; border-left: 1px solid rgba(199, 168, 74, 0.28); padding-left: 28px; }

        .footer-contact-line { display: flex; align-items: flex-start; gap: 10px; color: #F3EBDD; font-size: 14px; line-height: 1.35; }

        .footer-contact-line a { color: #F3EBDD; text-decoration: none; }
        .footer-contact-line a:hover { color: #C7A84A; }

        .footer-contact-icon { width: 20px; height: 20px; display: inline-flex; align-items: center; justify-content: center; flex-shrink: 0; }

        .footer-socials { display: flex; align-items: center; gap: 10px; margin-top: 4px; }
        .footer-socials a { width: 26px; height: 26px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; background: rgba(143, 179, 90, 0.95); color: #042C22; text-decoration: none; font-family: Montserrat, sans-serif; font-weight: 800; font-size: 13px; }
        .footer-socials a:hover { background: #C7A84A; }

        .footer-qr { display: flex; justify-content: flex-end; align-items: center; }
        .footer-qr img { width: 96px; height: 96px; display: block; padding: 6px; border-radius: 6px; background: #ffffff; object-fit: contain; }

        /* Обов'язково прибрати старий підпис під QR */
        .qr-caption { display: none !important; }

        /* Обов'язково прибрати старий логотип у футері, якщо залишився */
        .footer-logo, .footer-left > img:not(.footer-leaf-img) { display: none !important; }

        @media (max-width: 900px) {
            .footer-card { grid-template-columns: 1fr; gap: 22px; text-align: left; }
            .footer-center { border-left: 0; padding-left: 0; }
            .footer-qr { justify-content: flex-start; }
        }

        @media (max-width: 560px) {
            .footer-left { align-items: flex-start; }
            .footer-leaf-img { width: 62px; height: 62px; }
            .footer-text h4 { font-size: 19px; }
        }

        /* Home bottom container to remove extra bottom spacing */
        .home-bottom-container { padding-bottom: 0 !important; margin-bottom: 0 !important; }

        /* Latest news compact spacing */
        #latest-news, .latest-news-section { margin-bottom: 16px !important; padding: 18px !important; background: #ffffff; border-radius: 12px; }
        #latest-news .activities-grid, .latest-news-section .activities-grid { margin-bottom: 0 !important; }

        main { padding-bottom: 0 !important; margin-bottom: 0 !important; }
        main > .container:last-child { padding-bottom: 0 !important; margin-bottom: 0 !important; }

        .site-footer { padding-top: 0 !important; margin-top: 0 !important; }
        .site-footer .container { padding-top: 0 !important; margin-top: 0 !important; }
        .footer-card { margin-top: 0 !important; }

        /* Aggressive overrides to eliminate large gap between latest news and footer */
        main > .container.home-bottom-container,
        main > .container.home-bottom-container > * {
            margin-bottom: 0 !important;
            padding-bottom: 0 !important;
        }

        /* Ensure latest news has compact bottom spacing */
        #latest-news,
        .latest-news-section { margin-bottom: 16px !important; padding-bottom: 0 !important; }

        #latest-news .activities-grid,
        .latest-news-section .activities-grid { margin-bottom: 0 !important; }

        /* Neutralize any inline style large bottom paddings/margins */
        *[style*="margin-bottom: 80px"], *[style*="margin-bottom: 100px"], *[style*="padding-bottom: 80px"], *[style*="padding-bottom: 100px"] {
            margin-bottom: 0 !important;
            padding-bottom: 0 !important;
        }

        /* Tighten main/footer relationship */
        main { padding-bottom: 0 !important; }
        main + footer.site-footer, main + footer { margin-top: 16px !important; }

        /* === ICON BACKGROUND REMOVE FIX === */

        .activity-card .icon-circle {
            background: transparent !important;
            border-radius: 0 !important;
            box-shadow: none !important;
            border: 0 !important;
            width: 72px !important;
            height: 72px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }

        .activity-icon-img {
            display: block !important;
            width: 58px !important;
            height: 58px !important;
            object-fit: contain !important;
            background: transparent !important;
            border: 0 !important;
            box-shadow: none !important;
            border-radius: 0 !important;
        }

        .card img.activity-icon-img {
            background: transparent !important;
            border: 0 !important;
            box-shadow: none !important;
            border-radius: 0 !important;
        }

        .opportunity-icon-wrap {
            background: transparent !important;
            border-radius: 0 !important;
            border: 0 !important;
            box-shadow: none !important;
            width: 64px !important;
            height: 64px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            margin-bottom: 14px !important;
        }

        .opportunity-icon-img {
            display: block !important;
            width: 52px !important;
            height: 52px !important;
            object-fit: contain !important;
            background: transparent !important;
            border: 0 !important;
            box-shadow: none !important;
            border-radius: 0 !important;
        }

        .opportunity-card img.opportunity-icon-img {
            background: transparent !important;
            border: 0 !important;
            box-shadow: none !important;
            border-radius: 0 !important;
        }

        /* If PNG has white background inside file, visually blend it for activities only */
        .activity-icon-img {
            mix-blend-mode: multiply;
        }

        /* === OPPORTUNITIES ICON COLOR FIX === */

        .opportunities-section {
            background: linear-gradient(135deg, #042C22 0%, #0A4A33 100%) !important;
            border-radius: 24px !important;
            padding: 34px 28px 28px !important;
            margin-top: 34px !important;
            overflow: hidden;
        }

        .opportunities-section .section-title {
            position: relative;
            display: flex !important;
            align-items: center;
            justify-content: center;
            gap: 22px;
            color: #ffffff !important;
            opacity: 1 !important;
            margin: 0 0 34px !important;
            font-family: Montserrat, sans-serif;
            font-size: 34px;
            line-height: 1.15;
            font-weight: 800;
            text-align: center;
            text-transform: uppercase;
        }

        /* decorative lines next to title */
        .opportunities-section .section-title::before,
        .opportunities-section .section-title::after {
            content: "";
            display: block;
            width: 96px;
            height: 2px;
            background: linear-gradient(90deg, transparent, #C7A84A);
            opacity: 0.85;
        }

        .opportunities-section .section-title::after {
            background: linear-gradient(90deg, #C7A84A, transparent);
        }

        .opportunity-card.opportunity-home {
            background: transparent !important;
            border: 0 !important;
            box-shadow: none !important;
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            justify-content: flex-start !important;
            text-align: center !important;
            min-height: auto !important;
            padding: 0 12px !important;
            gap: 12px !important;
        }

        .opportunity-icon-wrap {
            background: transparent !important;
            border: 0 !important;
            box-shadow: none !important;
            border-radius: 0 !important;
            width: 68px !important;
            height: 68px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            margin-bottom: 4px !important;
        }

        /* main fix: use filter to recolor, not multiply */
        .opportunity-icon-img {
            display: block !important;
            width: 58px !important;
            height: 58px !important;
            object-fit: contain !important;
            background: transparent !important;
            border: 0 !important;
            box-shadow: none !important;
            border-radius: 0 !important;

            mix-blend-mode: normal !important;
            opacity: 1 !important;

            /* recolor dark/green PNG icon to #C7A84A */
            filter: brightness(0) saturate(100%) invert(67%) sepia(41%) saturate(548%) hue-rotate(9deg) brightness(92%) contrast(88%) !important;
        }

        .opportunity-card img.opportunity-icon-img {
            background: transparent !important;
            border: 0 !important;
            box-shadow: none !important;
            border-radius: 0 !important;
        }

        .opportunity-card .ua-text {
            color: #F3EBDD !important;
            font-family: Inter, sans-serif !important;
            font-size: 14px !important;
            line-height: 1.25 !important;
            font-weight: 700 !important;
            margin: 0 !important;
            max-width: 180px;
        }

        /* ensure no multiply applies inside opportunities */
        .opportunities-section .opportunity-icon-img,
        .opportunities-section img.opportunity-icon-img {
            mix-blend-mode: normal !important;
            filter: brightness(0) saturate(100%) invert(67%) sepia(41%) saturate(548%) hue-rotate(9deg) brightness(92%) contrast(88%) !important;
        }

        .opportunities-section img { mix-blend-mode: normal !important; }

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
        .activity-card .icon-circle{
            width:72px;
            height:72px;
            border-radius:50%;
            background: transparent !important;
            display:flex;
            align-items:center;
            justify-content:center;
            overflow: hidden;
        }

        /* Icons: ensure PNG white backgrounds blend into circular bg */
        .activity-icon-img{
            display:block;
            width:58px;
            height:58px;
            object-fit:contain;
            background: transparent !important;
            mix-blend-mode: normal !important;
        }

        .activity-icon-img[src$=".png"]{
            mix-blend-mode: multiply;
        }

        /* Prevent global .card img rules from styling activity icons */
        .card img.activity-icon-img{
            background: transparent !important;
            border: 0 !important;
            box-shadow: none !important;
            border-radius: 0 !important;
            padding: 0 !important;
        }

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
        /* Enhanced opportunities section and card styles */
        .opportunities-section { background: linear-gradient(135deg, #042C22 0%, #0A4A33 100%); border-radius: 24px; padding: 34px 28px !important; margin-top: 34px; }

        .opportunities-section .section-title { color: #ffffff !important; opacity: 1 !important; margin: 0 0 28px !important; font-family: Montserrat, sans-serif; font-size: 36px; line-height: 1.15; font-weight: 800; text-align: center; text-transform: uppercase; }

        /* Ensure opportunity cards stack vertically with icon on top, text below */
        .opportunity-card.opportunity-home { display: flex !important; flex-direction: column !important; align-items: center !important; justify-content: flex-start !important; text-align: center !important; min-height: 220px !important; padding: 24px 18px !important; gap: 14px !important; background: transparent; box-shadow: none; border: none; }

        .opportunity-icon-wrap { width: 64px; height: 64px; border-radius: 0 !important; background: transparent !important; display: flex; align-items: center; justify-content: center; margin-bottom: 10px; }

        .opportunity-icon-img { display: block; width: 46px; height: 46px; object-fit: contain; mix-blend-mode: normal !important; background: transparent !important; border: 0 !important; box-shadow: none !important; border-radius: 0 !important; }

        .opportunity-card .ua-text { color: #F3EBDD !important; font-family: Inter, sans-serif; font-size: 15px !important; line-height: 1.25; font-weight: 700; margin: 0; }
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
                <a href="{{ route('news.index') }}">{{ ($currentLocale ?? 'uk') === 'en' ? 'News' : 'Новини' }}</a>
                <a href="{{ route('home') }}#about">{{ ($currentLocale ?? 'uk') === 'en' ? 'About Us' : 'Про нас' }}</a>
                <div class="nav-item has-dropdown">
                    <a href="{{ route('activities.index') }}">{{ ($currentLocale ?? 'uk') === 'en' ? 'Areas of Activity' : 'Напрями діяльності' }} <span class="chev">@include('partials.icons.chev')</span></a>
                    <div class="dropdown">
                        @if(isset($menuActivities))
                            @foreach($menuActivities as $item)
                                <a href="{{ route('activities.index') }}#activity-{{ $item->id }}">{{ ($currentLocale ?? 'uk') === 'en' ? $item->title_en : $item->title_ua }}</a>
                            @endforeach
                        @endif
                    </div>
                </div>
                <a href="{{ route('opportunities.index') }}">{{ ($currentLocale ?? 'uk') === 'en' ? 'Our Opportunities' : 'Наші можливості' }}</a>
                <a href="{{ route('home') }}#contacts">{{ ($currentLocale ?? 'uk') === 'en' ? 'Contacts' : 'Наші контакти' }}</a>

                <div class="search-icon" role="button" aria-label="{{ ($currentLocale ?? 'uk') === 'en' ? 'Search' : 'Пошук' }}" title="{{ ($currentLocale ?? 'uk') === 'en' ? 'Search' : 'Пошук' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </div>

                <div style="width:8px"></div>

                <div class="locale-switch">
                    @if(($currentLocale ?? 'uk') === 'en')
                        <a href="{{ route('locale.switch', 'uk') }}" title="Українська">UA</a>
                        <span style="opacity:.6;margin:0 6px">|</span>
                        <span class="active">EN</span>
                    @else
                        <span class="active">UA</span>
                        <span style="opacity:.6;margin:0 6px">|</span>
                        <a href="{{ route('locale.switch', 'en') }}" title="English">EN</a>
                    @endif
                </div>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer id="contacts" class="site-footer">
        <div class="container">
            <div class="footer-card">
                <div class="footer-left">
                    <img src="{{ asset('images/icons/image-Photoroom (8).png') }}"
                         alt=""
                         class="footer-leaf-img"
                         aria-hidden="true">

                    <div class="footer-text">
                        <h4>{{ ($currentLocale ?? 'uk') === 'en' ? 'Building the Future Together' : 'Будуємо майбутнє разом' }}</h4>
                        <p>{{ ($currentLocale ?? 'uk') === 'en' ? 'Join a community of innovators, researchers, entrepreneurs and everyone striving to create positive change.' : 'Долучайтеся до спільноти інноваторів, дослідників, підприємців та всіх, хто прагне змін на краще!' }}</p>
                    </div>
                </div>

                <div class="footer-center">
                    <div class="footer-contact-line">
                        <span class="footer-contact-icon" aria-hidden="true">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                                <path d="M4 6h16v12H4V6Z" stroke="#C7A84A" stroke-width="2" stroke-linejoin="round"/>
                                <path d="M4 7l8 6 8-6" stroke="#C7A84A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                        <a href="mailto:naukpark@polissiauniver.edu.ua">naukpark@polissiauniver.edu.ua</a>
                    </div>

                    <div class="footer-contact-line">
                        <span class="footer-contact-icon" aria-hidden="true">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                                <path d="M12 21s7-5.2 7-12a7 7 0 1 0-14 0c0 6.8 7 12 7 12Z" stroke="#C7A84A" stroke-width="2"/>
                                <circle cx="12" cy="9" r="2.5" stroke="#C7A84A" stroke-width="2"/>
                            </svg>
                        </span>
                        <span>{{ ($currentLocale ?? 'uk') === 'en' ? '7 Staryi Boulevard, Zhytomyr, Zhytomyr Region, 10008, Ukraine' : '10008, Україна, Житомирська обл., м. Житомир, Старий бульвар, 7' }}</span>
                    </div>

                    <div class="footer-socials">
                        <a href="#" aria-label="Facebook">f</a>
                        <a href="#" aria-label="LinkedIn">in</a>
                        <a href="#" aria-label="Telegram">➤</a>
                    </div>
                </div>

                <div class="footer-qr">
                    <img src="{{ asset('images/qr-code.png') }}" alt="QR-код">
                </div>
            </div>
        </div>
    </footer>
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
    <script src="{{ asset('js/hero-slider.js') }}" defer></script>
</body>
</html>
