@extends('layouts.app')

@section('title', ($currentLocale ?? 'uk') === 'en' ? 'Home — Science Park Polissia University' : 'Головна — Поліський науковий парк')

@section('content')
    <section class="sp-hero">
        <button class="sp-hero-arrow sp-hero-arrow-left" type="button" aria-label="Попередній слайд">‹</button>

        <div class="sp-hero-text">
            <div class="sp-hero-bg"></div>

            <div class="sp-hero-copy">
                @if(($currentLocale ?? 'uk') === 'en')
                    <h1>Science<br>That Works</h1>
                    <h2>for Communities, Business<br>and the Environment</h2>
                    <p>We unite science, education, business and communities to create innovative solutions and promote the sustainable development of Polissia and Ukraine.</p>

                    <div class="sp-hero-buttons">
                        <a href="#about" class="sp-hero-btn sp-hero-btn-primary">Learn More</a>
                        <a href="#latest-news" class="sp-hero-btn sp-hero-btn-secondary">Latest News</a>
                    </div>
                @else
                    <h1>Наука,<br>що працює</h1>
                    <h2>для громад, бізнесу<br>та довкілля</h2>
                    <p>Об’єднуємо науку, освіту, бізнес та громади для створення інноваційних рішень і сталого розвитку Полісся та України.</p>

                    <div class="sp-hero-buttons">
                        <a href="#about" class="sp-hero-btn sp-hero-btn-primary">Дізнатись більше</a>
                        <a href="#latest-news" class="sp-hero-btn sp-hero-btn-secondary">Останні новини</a>
                    </div>
                @endif
            </div>
        </div>

        <div class="sp-hero-collage">
            <div class="sp-photo sp-photo-top-left">
                <img src="{{ asset('images/5276117098801340184.png') }}" alt="Лабораторія з комп’ютерами">
            </div>

            <div class="sp-photo sp-photo-top-wide">
                <img src="{{ asset('images/5276117098801340186.png') }}" alt="Високотехнологічна техніка">
            </div>

            <div class="sp-photo sp-photo-bottom-left">
                <img src="{{ asset('images/5276117098801340195.png') }}" alt="Робототехніка">
            </div>

            <div class="sp-photo sp-photo-bottom-middle">
                <img src="{{ asset('images/5276117098801340197.png') }}" alt="Цифрове обладнання">
            </div>

            <div class="sp-photo sp-photo-bottom-right">
                <img src="{{ asset('images/5276117098801340193.png') }}" alt="Екологічні технології">
            </div>

            <svg class="sp-collage-lines" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                <path d="M36 0 L30 50 L24 100"></path>
                <path d="M0 50 L100 50"></path>
                <path d="M66 50 L60 100"></path>
            </svg>
        </div>

        <svg class="sp-hero-main-divider" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
            <path d="M40 0 L34.5 100"></path>
        </svg>

        <button class="sp-hero-arrow sp-hero-arrow-right" type="button" aria-label="Наступний слайд">›</button>

        <div class="sp-hero-dots">
            <span class="active"></span>
            <span></span>
            <span></span>
        </div>
    </section>

    <section id="about" class="about-section-light">
        <div class="container">
            <div class="about-light-grid">
                <div class="about-light-heading">
                    <span class="about-light-label">{{ ($currentLocale ?? 'uk') === 'en' ? 'ABOUT US' : 'ПРО НАС' }}</span>
                    <h2>{{ ($currentLocale ?? 'uk') === 'en' ? 'Innovation for the Development of Polissia and Ukraine' : 'Інновації для розвитку Полісся та України' }}</h2>
                </div>

                <div class="about-light-content">
                    <p>
                        {{ ($currentLocale ?? 'uk') === 'en' ? 'The Science Park “Polissia University” is an innovation platform for the development of science, technology and entrepreneurship. We bring together researchers, students, businesses, communities and public institutions to create and implement modern solutions in the fields of digital transformation, ecology, bioeconomy and sustainable development.' : 'Науковий парк «Поліський університет» — це інноваційна платформа для розвитку науки, технологій та підприємництва. Ми об’єднуємо науковців, студентів, бізнес, громади та державні інституції для створення і впровадження сучасних рішень у сферах цифрової трансформації, екології, біоекономіки та сталого розвитку.' }}
                    </p>

                    <div class="about-goal-light">
                        <div class="about-goal-icon" aria-hidden="true">
                            <img src="{{ asset('images/target-icon.png') }}" alt="" class="about-goal-img">
                        </div>

                        <div>
                            <h3>{{ ($currentLocale ?? 'uk') === 'en' ? 'Our Goal' : 'Наша мета' }}</h3>
                            <p>
                                {{ ($currentLocale ?? 'uk') === 'en' ? 'To build a modern innovation ecosystem where science, education and business jointly create digital and green solutions for the sustainable development of Polissia and Ukraine.' : 'Формування сучасної інноваційної екосистеми, у якій наука, освіта та бізнес спільно створюють цифрові та «зелені» рішення для сталого розвитку Полісся та України.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Activities section full-bleed light background -->
    <section class="activities-bleed" style="background:var(--bg);width:100%;">
        <div class="container">
            <section id="activities">
                <h3 class="section-title" style="text-transform:uppercase">{{ ($currentLocale ?? 'uk') === 'en' ? 'AREAS OF ACTIVITY' : 'НАПРЯМИ ДІЯЛЬНОСТІ' }}</h3>
                @include('partials.activities-grid', ['activities' => $activities])
            </section>
        </div>
    </section>

    <div class="container home-bottom-container">
        <section id="opportunities" class="opportunities-section">
            <h3 class="section-title" style="text-transform:uppercase">{{ ($currentLocale ?? 'uk') === 'en' ? 'OUR OPPORTUNITIES' : 'НАШІ МОЖЛИВОСТІ' }}</h3>
            @include('partials.opportunities-grid', ['opportunities' => $opportunities])
        </section>

        @include('partials.home-news')

        <!-- contacts section removed — footer contains contact information -->
    </div>
@endsection

@section('head')
    <style>
        /* Hero banner styles */
        .hero-banner {
            position: relative;
            overflow: hidden;
            background: #042C22;
            min-height: 560px;
            color: #ffffff;
            border-bottom: 3px solid rgba(199, 168, 74, 0.25);
        }

        .hero-content {
            display: grid;
            grid-template-columns: 36% 64%;
            min-height: 560px;
        }

        .hero-text-panel {
            position: relative;
            overflow: hidden;
            background: #042C22;
            padding: 70px 56px 70px 64px;
            display: flex;
            align-items: center;
        }

        .hero-bg-image {
            position: absolute;
            inset: 0;
            background:
                linear-gradient(90deg, rgba(4, 44, 34, 0.94), rgba(4, 44, 34, 0.82)),
                url("{{ asset('images/Gemini_Generated_Image_o9b7mfo9b7mfo9b7.png') }}");
            background-size: cover;
            background-position: center;
            opacity: 0.95;
        }

        .hero-text-content {
            position: relative;
            z-index: 2;
            max-width: 470px;
        }

        .hero-text-content h1 {
            margin: 0;
            font-family: Montserrat, sans-serif;
            font-size: 56px;
            line-height: 1.08;
            font-weight: 800;
            color: #ffffff;
        }

        .hero-text-content h2 {
            margin: 18px 0 22px;
            font-family: Montserrat, sans-serif;
            font-size: 26px;
            line-height: 1.25;
            font-weight: 800;
            color: #8FB35A;
        }

        .hero-text-content p {
            margin: 0;
            max-width: 410px;
            font-size: 16px;
            line-height: 1.65;
            color: #F3EBDD;
        }

        .hero-buttons {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .hero-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 46px;
            padding: 12px 20px;
            border-radius: 6px;
            font-family: Montserrat, sans-serif;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            text-decoration: none;
        }

        .hero-btn-primary {
            background: #8FB35A;
            color: #ffffff;
            box-shadow: 0 10px 24px rgba(143, 179, 90, 0.25);
        }

        .hero-btn-primary:hover { background: #C7A84A; color: #042C22; }

        .hero-btn-secondary {
            background: rgba(4, 44, 34, 0.45);
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.55);
        }

        .hero-btn-secondary:hover { border-color: #C7A84A; color: #C7A84A; }

        .hero-collage {
            position: relative;
            min-height: 560px;
            overflow: hidden;
            background: #042C22;
            isolation: isolate;
        }

        /* Загальний стиль фото-полігонів */
        .hero-photo {
            position: absolute;
            overflow: hidden;
            background: #ffffff;
            padding: 4px;
            z-index: 1;
        }

        .hero-photo img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
            object-position: center;
            transform: scale(1.02);
        }

        /* 
           Верхній лівий блок.
           Має праву межу навскіс.
        */
        .hero-photo-top-left {
            left: -3%;
            top: 0;
            width: 38%;
            height: 50.5%;
            clip-path: polygon(8% 0, 100% 0, 86% 100%, 0 100%, 0 0);
            z-index: 3;
        }

        /*
           Верхній широкий блок.
           Це merged-cell: займає праву верхню частину над двома нижніми фото.
           Ліва межа навскіс і заходить під перше фото.
        */
        .hero-photo-top-wide {
            left: 30%;
            top: 0;
            width: 73%;
            height: 50.5%;
            clip-path: polygon(7% 0, 100% 0, 100% 100%, 0 100%);
            z-index: 2;
        }

        /*
           Нижній перший блок.
           Під верхнім лівим, але межі також навскіс.
        */
        .hero-photo-bottom-1 {
            left: -2%;
            top: 49.5%;
            width: 36%;
            height: 51%;
            clip-path: polygon(0 0, 100% 0, 86% 100%, 0 100%);
            z-index: 3;
        }

        /*
           Нижній середній блок.
           Його ліва і права межі навскіс.
        */
        .hero-photo-bottom-2 {
            left: 30%;
            top: 49.5%;
            width: 37%;
            height: 51%;
            clip-path: polygon(12% 0, 100% 0, 86% 100%, 0 100%);
            z-index: 2;
        }

        /*
           Нижній правий блок.
           Він під правою частиною верхньої merged-картинки.
        */
        .hero-photo-bottom-3 {
            left: 62%;
            top: 49.5%;
            width: 41%;
            height: 51%;
            clip-path: polygon(12% 0, 100% 0, 100% 100%, 0 100%);
            z-index: 1;
        }

        /* ВАЖЛИВО: прибрати старі grid/border правила */
        .hero-photo,
        .hero-photo-top-left,
        .hero-photo-top-wide,
        .hero-photo-bottom-1,
        .hero-photo-bottom-2,
        .hero-photo-bottom-3 {
            border-left: none !important;
            border-bottom: none !important;
            margin-left: 0 !important;
        }

        /* На фото object-fit cover допустимий, але тільки для фото, не для логотипа */
        .hero-photo img { object-fit: cover; }

        .hero-arrow {
            position: absolute;
            top: 50%;
            z-index: 10;
            width: 46px;
            height: 46px;
            transform: translateY(-50%);
            border-radius: 50%;
            border: 2px solid #C7A84A;
            background: rgba(4, 44, 34, 0.72);
            color: #ffffff;
            font-size: 34px;
            line-height: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .hero-arrow:hover { background: #C7A84A; color: #042C22; }

        .hero-arrow-left { left: 20px; }
        .hero-arrow-right { right: 20px; }

        .hero-dots {
            position: absolute;
            left: 50%;
            bottom: 18px;
            z-index: 10;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
        }

        .hero-dots span { width: 10px; height: 10px; border-radius: 50%; background: rgba(255,255,255,0.55); }
        .hero-dots span.active { background: #C7A84A; }

        /* News index category button: use green for active state instead of gold */
        .news-index .category-btn.active{background:var(--green);color:#fff}

        /* About section per updated spec: single clean definition */
        .about-full-bleed{width:100%;background:var(--dark);color:#fff;padding:64px 0;font-family:'Montserrat', sans-serif}
        .about-full-bleed .about-inner{display:grid;grid-template-columns:1fr 1.1fr;gap:60px;align-items:start;max-width:1200px;margin:0 auto;padding:0 20px}

        .about-left .small-label{color:#fff;opacity:.7;font-weight:600;font-size:14px;letter-spacing:3px;margin-bottom:12px;display:block;text-transform:uppercase}
        .about-title{color:#fff;font-weight:700;font-size:40px;line-height:1.25;margin:0}
        .about-text{color:var(--cream);font-size:17px;line-height:1.75;opacity:.95;margin-top:0}

        .goal-card{background:transparent;border:0;border-left:0;border-radius:0;padding:0;margin-top:0}
        .goal-title{color:#fff;font-family:Montserrat, sans-serif;font-weight:600;font-size:18px;margin:0 0 8px 0}
        .goal-text{color:var(--cream);font-size:16px;line-height:1.7;margin:0}

        /* Section title color overrides depending on background */
        .about-full-bleed .section-title{color:#fff}
        .activities-bleed .section-title{color:var(--green)}

        @media(max-width:900px){
            .about-full-bleed{padding:40px 0}
            .about-full-bleed .about-inner{grid-template-columns:1fr;gap:32px}
            .about-title{font-size:28px}
            .about-text{font-size:16px}
        }
    </style>

    <style>
        /* === ABOUT SECTION LIGHT FIX === */

        .about-full-bleed { background: #F8F8F4 !important; color: #1F2937 !important; padding: 0 !important }

        .about-section-light { background: #F8F8F4; color: #1F2937; padding: 58px 0 34px }

        .about-light-grid { display: grid; grid-template-columns: 0.9fr 1.25fr; gap: 72px; align-items: start }

        .about-light-label { display: inline-block; margin-bottom: 14px; font-family: Montserrat, sans-serif; font-size: 14px; line-height: 1; font-weight: 800; letter-spacing: 0.04em; text-transform:uppercase; color: #0A4A33 }

        .about-light-heading h2 { margin: 0; font-family: Montserrat, sans-serif; font-size: 36px; line-height: 1.25; font-weight: 800; color: #042C22 }

        .about-light-content > p { margin: 0; font-size: 16px; line-height: 1.65; font-weight: 500; color: #1F2937 }

        .about-goal-light { display: grid; grid-template-columns: 64px 1fr; gap: 18px; align-items: start; margin-top: 26px }

        .about-goal-icon { width: 58px; height: 58px; display: flex; align-items: center; justify-content: center }

        .about-goal-light h3 { margin: 0 0 6px; font-family: Montserrat, sans-serif; font-size: 18px; font-weight: 800; color: #042C22 }

        .about-goal-light p { margin: 0; font-size: 15px; line-height: 1.55; color: #1F2937 }

        @media (max-width: 900px) {
            .about-section-light { padding: 42px 0 26px }
            .about-light-grid { grid-template-columns: 1fr; gap: 28px }
            .about-light-heading h2 { font-size: 30px }
        }
    </style>

    <style>
        .about-goal-img { display: block; width: 54px; height: 54px; object-fit: contain }
        .about-goal-icon { width: 58px; height: 58px; display: flex; align-items: center; justify-content: center; flex-shrink: 0 }
    </style>

    <style>
        /* === FINAL HERO COLLAGE FIX === */

        .sp-hero {
            position: relative;
            height: 560px;
            min-height: 560px;
            overflow: hidden;
            background: #042C22;
        }

        /* Ліва текстова частина з косою межею */
        .sp-hero-text {
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 40%;
            z-index: 10;
            overflow: hidden;
            background: #042C22;
            clip-path: polygon(0 0, 100% 0, 87% 100%, 0 100%);
        }

        /* Біла лінія між текстом і фото */
        .sp-hero-text::after {
            content: "";
            position: absolute;
            top: -8%;
            right: 10.5%;
            width: 5px;
            height: 120%;
            background: #ffffff;
            transform: rotate(9deg);
            transform-origin: top center;
            z-index: 20;
            border-radius: 4px;
        }

        /* Фотоколаж справа */
        .sp-hero-collage {
            position: absolute !important;
            top: 0;
            right: 0;
            bottom: 0;
            left: 34.5%;
            z-index: 2;
            overflow: hidden;
            background: #042C22;
            display: block !important;
        }

        /* Фото — без padding, border, margin */
        .sp-photo {
            position: absolute !important;
            overflow: hidden;
            padding: 0 !important;
            margin: 0 !important;
            border: 0 !important;
            background: transparent !important;
        }

        .sp-photo img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
            object-position: center;
            transform: scale(1.02);
        }

        /* Верхнє ліве фото */
        .sp-photo-top-left {
            left: 0;
            top: 0;
            width: 34%;
            height: 50%;
            z-index: 4;
            clip-path: polygon(0 0, 100% 0, 84% 100%, 0 100%);
        }

        /* Верхнє праве merged-фото: займає ширину двох нижніх блоків */
        .sp-photo-top-wide {
            left: 29%;
            top: 0;
            width: 72%;
            height: 50%;
            z-index: 3;
            clip-path: polygon(8% 0, 100% 0, 100% 100%, 0 100%);
        }

        /* Нижнє ліве */
        .sp-photo-bottom-left {
            left: 0;
            top: 50%;
            width: 34%;
            height: 50%;
            z-index: 4;
            clip-path: polygon(0 0, 100% 0, 84% 100%, 0 100%);
        }

        /* Нижнє середнє */
        .sp-photo-bottom-middle {
            left: 29%;
            top: 50%;
            width: 37%;
            height: 50%;
            z-index: 3;
            clip-path: polygon(13% 0, 100% 0, 84% 100%, 0 100%);
        }

        /* Нижнє праве */
        .sp-photo-bottom-right {
            left: 61.5%;
            top: 50%;
            width: 39.5%;
            height: 50%;
            z-index: 2;
            clip-path: polygon(13% 0, 100% 0, 100% 100%, 0 100%);
        }

        /* БІЛІ ЛІНІЇ ПОВЕРХ ФОТО */
        .sp-cut-line {
            position: absolute;
            z-index: 30;
            display: block;
            background: #ffffff;
            pointer-events: none;
            border-radius: 6px;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.04);
        }

        /* Діагональна лінія між верхнім лівим і верхнім широким фото */
        .sp-cut-top {
            left: 30.5%;
            top: -3%;
            width: 5px;
            height: 56%;
            transform: rotate(9deg);
            transform-origin: top center;
        }

        /* Горизонтальна лінія між верхнім і нижнім рядом */
        .sp-cut-middle {
            left: 0;
            right: 0;
            top: 49.55%;
            height: 5px;
            width: auto;
        }

        /* Діагональна лінія між нижнім лівим і нижнім середнім */
        .sp-cut-bottom-left {
            left: 30.5%;
            top: 49.4%;
            width: 5px;
            height: 56%;
            transform: rotate(9deg);
            transform-origin: top center;
        }

        /* Діагональна лінія між нижнім середнім і нижнім правим */
        .sp-cut-bottom-right {
            left: 63.5%;
            top: 49.4%;
            width: 5px;
            height: 56%;
            transform: rotate(9deg);
            transform-origin: top center;
        }

        /* Заборонити старі grid/border правила */
        .sp-hero-collage .sp-photo,
        .sp-hero-collage .sp-photo-top-left,
        .sp-hero-collage .sp-photo-top-wide,
        .sp-hero-collage .sp-photo-bottom-left,
        .sp-hero-collage .sp-photo-bottom-middle,
        .sp-hero-collage .sp-photo-bottom-right {
            grid-column: auto !important;
            grid-row: auto !important;
            border-left: 0 !important;
            border-bottom: 0 !important;
            padding: 0 !important;
            margin-left: 0 !important;
        }

        @media (max-width: 900px) {
            .sp-hero { height: auto; min-height: 0 }
            .sp-hero-text { position: relative; width: 100%; min-height: 430px; clip-path: none }
            .sp-hero-text::after { display: none }
            .sp-hero-collage { position: relative !important; left: 0; height: 430px }
        }

        @media (max-width: 640px) {
            .sp-hero-collage { height: auto }
            .sp-photo, .sp-photo-top-left, .sp-photo-top-wide, .sp-photo-bottom-left, .sp-photo-bottom-middle, .sp-photo-bottom-right { position: relative !important; left: auto; top: auto; width: 100%; height: 190px; clip-path: none }
            .sp-cut-line { display: none }
        }
    </style>

    <style>
        /* New SP hero with unique namespace to avoid conflicts */
        .sp-hero {
            position: relative;
            height: 560px;
            min-height: 560px;
            overflow: hidden;
            background: #042C22;
            color: #ffffff;
            border-bottom: 3px solid rgba(199, 168, 74, 0.28);
        }

        .sp-hero-text {
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 41%;
            z-index: 8;
            overflow: hidden;
            clip-path: polygon(0 0, 100% 0, 86% 100%, 0 100%);
            background: #042C22;
        }

        .sp-hero-bg {
            position: absolute;
            inset: 0;
            background:
                linear-gradient(90deg, rgba(4, 44, 34, 0.96), rgba(4, 44, 34, 0.84)),
                url("{{ asset('images/Gemini_Generated_Image_o9b7mfo9b7mfo9b7.png') }}");
            background-size: cover;
            background-position: center;
            opacity: 1;
        }

        .sp-hero-text::after {
            content: "";
            position: absolute;
            top: -8%;
            right: 12.5%;
            width: 5px;
            height: 120%;
            background: #ffffff;
            transform: rotate(11deg);
            transform-origin: center;
            z-index: 4;
            opacity: 0.95;
        }

        .sp-hero-copy {
            position: relative;
            z-index: 5;
            max-width: 430px;
            padding: 82px 58px 64px 74px;
        }

        .sp-hero-copy h1 { margin: 0; font-family: Montserrat, sans-serif; font-size: 58px; line-height:1.08; font-weight:800; color:#fff }
        .sp-hero-copy h2 { margin: 22px 0 24px; font-family: Montserrat, sans-serif; font-size:27px; font-weight:800; color:#8FB35A }
        .sp-hero-copy p { margin:0; max-width:380px; font-size:16px; line-height:1.65; color:#F3EBDD }

        .sp-hero-buttons { display:flex; gap:14px; margin-top:30px }
        .sp-hero-btn { display:inline-flex; align-items:center; justify-content:center; min-height:46px; padding:12px 20px; border-radius:6px; font-family:Montserrat, sans-serif; font-size:13px; font-weight:700; text-transform:uppercase; text-decoration:none }
        .sp-hero-btn-primary { background:#8FB35A; color:#fff }
        .sp-hero-btn-primary:hover { background:#C7A84A; color:#042C22 }
        .sp-hero-btn-secondary { background:rgba(4,44,34,0.35); color:#fff; border:1px solid rgba(255,255,255,0.6) }
        .sp-hero-btn-secondary:hover { color:#C7A84A; border-color:#C7A84A }

        .sp-hero-collage { position:absolute; top:0; right:0; bottom:0; left:34%; z-index:2; overflow:hidden; background:#042C22 }

        .sp-photo { position:absolute; overflow:hidden; background:#ffffff; padding:4px }
        .sp-photo img { width:100%; height:100%; display:block; object-fit:cover; object-position:center; transform:scale(1.025) }

        .sp-photo-top-left { left:0; top:0; width:34%; height:50.5%; clip-path:polygon(0 0,100% 0,84% 100%,0 100%); z-index:5 }
        .sp-photo-top-wide { left:28.5%; top:0; width:73%; height:50.5%; clip-path:polygon(8% 0,100% 0,100% 100%,0 100%); z-index:4 }
        .sp-photo-bottom-left { left:0; top:49.5%; width:34%; height:51%; clip-path:polygon(0 0,100% 0,84% 100%,0 100%); z-index:5 }
        .sp-photo-bottom-middle { left:28.5%; top:49.5%; width:37%; height:51%; clip-path:polygon(13% 0,100% 0,84% 100%,0 100%); z-index:4 }
        .sp-photo-bottom-right { left:61%; top:49.5%; width:41%; height:51%; clip-path:polygon(13% 0,100% 0,100% 100%,0 100%); z-index:3 }

        .sp-hero-arrow { position:absolute; top:50%; z-index:20; width:46px; height:46px; transform:translateY(-50%); border-radius:50%; border:2px solid #C7A84A; background:rgba(4,44,34,0.72); color:#fff; font-size:34px; display:flex; align-items:center; justify-content:center; cursor:pointer }
        .sp-hero-arrow-left { left:22px }
        .sp-hero-arrow-right { right:22px }
        .sp-hero-arrow:hover { background:#C7A84A; color:#042C22 }

        .sp-hero-dots { position:absolute; left:50%; bottom:18px; z-index:20; transform:translateX(-50%); display:flex; gap:10px }
        .sp-hero-dots span { width:10px; height:10px; border-radius:50%; background:rgba(255,255,255,0.55) }
        .sp-hero-dots span.active { background:#C7A84A }

        @media (max-width: 1200px) {
            .sp-hero-copy { padding-left:54px }
            .sp-hero-copy h1 { font-size:48px }
            .sp-hero-copy h2 { font-size:23px }
        }

        @media (max-width: 900px) {
            .sp-hero { height:auto; min-height:0 }
            .sp-hero-text { position:relative; width:100%; min-height:430px; clip-path:none }
            .sp-hero-text::after { display:none }
            .sp-hero-copy { padding:56px 28px }
            .sp-hero-collage { position:relative; left:0; height:430px }
        }

        @media (max-width: 640px) {
            .sp-hero-collage { height:auto; display:block }
            .sp-photo, .sp-photo-top-left, .sp-photo-top-wide, .sp-photo-bottom-left, .sp-photo-bottom-middle, .sp-photo-bottom-right { position:relative; left:auto; top:auto; width:100%; height:190px; clip-path:none; padding:0 }
            .sp-hero-copy h1 { font-size:40px }
        }
    </style>

    <style>
        /* === FINAL EXACT COLLAGE GEOMETRY === */

        .sp-hero {
            position: relative;
            height: 560px;
            min-height: 560px;
            overflow: hidden;
            background: #042C22;
        }

        /* Ліва текстова частина */
        .sp-hero-text {
            position: absolute !important;
            left: 0;
            top: 0;
            bottom: 0;
            width: 40%;
            z-index: 10;
            overflow: hidden;
            background: #042C22;
            clip-path: polygon(0 0, 100% 0, 86.25% 100%, 0 100%);
        }

        /* Вимкнути стару білу лінію, якщо була */
        .sp-hero-text::after { display: none !important; }

        /* Головна діагональна лінія між текстом і колажем */
        .sp-hero-main-divider {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            z-index: 35;
            pointer-events: none;
        }

        .sp-hero-main-divider path {
            fill: none;
            stroke: #ffffff;
            stroke-width: 5;
            vector-effect: non-scaling-stroke;
            stroke-linecap: round;
        }

        /* Фотоколаж справа */
        .sp-hero-collage { position: absolute !important; top: 0; right: 0; bottom: 0; left: 34.5%; z-index: 2; overflow: hidden; background: #042C22; display: block !important; }

        /* Фото без border/padding/margin */
        .sp-photo { position: absolute !important; overflow: hidden; padding: 0 !important; margin: 0 !important; border: 0 !important; background: transparent !important; }

        .sp-photo img { width: 100%; height: 100%; display: block; object-fit: cover; object-position: center; transform: scale(1.02); }

        .sp-photo-top-left { left: 0; top: 0; width: 36%; height: 50%; z-index: 4; clip-path: polygon(0 0, 100% 0, 83.333% 100%, 0 100%); }
        .sp-photo-top-wide { left: 30%; top: 0; width: 70%; height: 50%; z-index: 3; clip-path: polygon(8.571% 0, 100% 0, 100% 100%, 0 100%); }
        .sp-photo-bottom-left { left: 0; top: 50%; width: 30%; height: 50%; z-index: 4; clip-path: polygon(0 0, 100% 0, 80% 100%, 0 100%); }
        .sp-photo-bottom-middle { left: 24%; top: 50%; width: 42%; height: 50%; z-index: 3; clip-path: polygon(14.286% 0, 100% 0, 85.714% 100%, 0 100%); }
        .sp-photo-bottom-right { left: 60%; top: 50%; width: 40%; height: 50%; z-index: 2; clip-path: polygon(15% 0, 100% 0, 100% 100%, 0 100%); }

        /* SVG-лінії точно по координатах clip-path */
        .sp-collage-lines { position: absolute; inset: 0; width: 100%; height: 100%; z-index: 40; pointer-events: none; }

        .sp-collage-lines path { fill: none; stroke: #ffffff; stroke-width: 5; vector-effect: non-scaling-stroke; stroke-linecap: round; stroke-linejoin: round; }

        /* Повністю вимкнути старі span-лінії, якщо вони залишились */
        .sp-cut-line, .sp-cut-top, .sp-cut-middle, .sp-cut-bottom-left, .sp-cut-bottom-right { display: none !important; }

        /* Заборонити стару grid-логіку */
        .sp-hero-collage .sp-photo, .sp-hero-collage .sp-photo-top-left, .sp-hero-collage .sp-photo-top-wide, .sp-hero-collage .sp-photo-bottom-left, .sp-hero-collage .sp-photo-bottom-middle, .sp-hero-collage .sp-photo-bottom-right { grid-column: auto !important; grid-row: auto !important; border-left: 0 !important; border-bottom: 0 !important; padding: 0 !important; margin-left: 0 !important; }

        @media (max-width: 900px) {
            .sp-hero { height: auto; min-height: 0; }
            .sp-hero-text { position: relative !important; width: 100%; min-height: 430px; clip-path: none; }
            .sp-hero-main-divider { display: none; }
            .sp-hero-collage { position: relative !important; left: 0; height: 430px; }
        }

        @media (max-width: 640px) {
            .sp-hero-collage { height: auto; }
            .sp-photo, .sp-photo-top-left, .sp-photo-top-wide, .sp-photo-bottom-left, .sp-photo-bottom-middle, .sp-photo-bottom-right { position: relative !important; left: auto; top: auto; width: 100%; height: 190px; clip-path: none; }
            .sp-collage-lines { display: none; }
        }
    </style>

    <style>
        /* Desktop scale override for very wide screens */
        @media (min-width: 1600px) {
            /* Slight upscale to better utilize very large screens */
            .sp-hero { transform: scale(1.02); transform-origin: top left; }
            /* Keep text panel proportional on very large displays */
            .sp-hero-text { width: 40%; }
            /* Header/logo size hints for layouts that read these overrides */
            header.site-header { min-height: 86px; }
            header .site-logo img { height: 70px; }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function(){
            const slider = document.getElementById('heroSlider');
            if(!slider) return;

            const slides = Array.from(slider.querySelectorAll('.slide'));
            const dots = Array.from(slider.querySelectorAll('.slider-dot'));
            const prevBtn = slider.querySelector('.prev');
            const nextBtn = slider.querySelector('.next');
            let current = slides.findIndex(s => s.classList.contains('active')) || 0;
            let interval = null;

            function show(index){
                slides.forEach((s,i)=> s.classList.toggle('active', i===index));
                dots.forEach((d,i)=> d.classList.toggle('active', i===index));
                current = index;
            }

            function next(){
                show((current + 1) % slides.length);
            }

            function prev(){
                show((current - 1 + slides.length) % slides.length);
            }

            if(nextBtn) nextBtn.addEventListener('click', ()=>{ next(); reset(); });
            if(prevBtn) prevBtn.addEventListener('click', ()=>{ prev(); reset(); });
            dots.forEach(d => d.addEventListener('click', (e)=>{ show(Number(e.currentTarget.dataset.index)); reset(); }));

            function start(){ interval = setInterval(next, 4500); }
            function reset(){ clearInterval(interval); start(); }
            if(slides.length>1) start();
        });
    </script>
    <style>
        /* === FINAL DESKTOP SCALE FIX === */

        @media (min-width: 901px) {
            header { background: #042C22; }

            .header-inner {
                min-height: 86px !important;
                padding: 8px 0 !important;
            }

            .logo-wrap {
                max-height: 70px !important;
                padding: 4px 0 !important;
            }

            .logo-img {
                height: 70px !important;
                max-height: 70px !important;
                width: auto !important;
                object-fit: contain !important;
            }

            nav a {
                font-size: 14px !important;
                margin: 0 12px !important;
                line-height: 1 !important;
                white-space: nowrap !important;
            }

            .locale-switch { font-size: 14px !important; margin-left: 12px !important; }

            .search-icon { width: 24px !important; height: 24px !important; margin-left: 12px !important; }

            .sp-hero { height: 430px !important; min-height: 430px !important; }

            .sp-hero-copy { padding: 54px 40px 44px 54px !important; max-width: 360px !important; }

            .sp-hero-copy h1 { font-size: 38px !important; line-height: 1.08 !important; margin:0 !important; }

            .sp-hero-copy h2 { margin: 16px 0 18px !important; font-size: 21px !important; line-height: 1.25 !important; }

            .sp-hero-copy p { max-width: 320px !important; font-size: 13px !important; line-height: 1.55 !important; }

            .sp-hero-buttons { margin-top: 22px !important; gap: 10px !important; }

            .sp-hero-btn { min-height: 38px !important; padding: 9px 14px !important; font-size: 11px !important; border-radius: 5px !important; }

            .sp-hero-arrow { width: 36px !important; height: 36px !important; font-size: 26px !important; }

            .sp-hero-dots { bottom: 12px !important; }

            .sp-hero-dots span { width: 8px !important; height: 8px !important; }
        }
    </style>
    <style>
        /* FINAL footer/news spacing overrides to remove large gap between latest news and footer */
        #latest-news {
            margin-bottom: 0 !important;
        }

        #latest-news + .site-footer,
        main + .site-footer {
            margin-top: 0 !important;
        }

        .site-footer {
            padding-top: 24px !important;
            margin-top: 0 !important;
        }

        main {
            padding-bottom: 0 !important;
        }

        .home-footer-gap,
        .footer-spacer,
        .contacts-spacer {
            display: none !important;
            height: 0 !important;
            margin: 0 !important;
            padding: 0 !important;
        }
    </style>

    <style>
        .sp-hero-dots span,
        .sp-hero-dots button {
            cursor: pointer;
        }

        .sp-hero-dots span.active,
        .sp-hero-dots button.active {
            background: #C7A84A !important;
        }
    </style>
@endsection
