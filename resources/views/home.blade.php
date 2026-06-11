@extends('layouts.app')

@section('title', 'Головна — Поліський науковий парк')

@section('content')
    <!-- Hero full width -->
    <section class="hero-full">
        <div class="container">
            <div class="hero-inner" role="region" aria-label="Hero">
                <div class="hero-left">
                    <h1 class="hero-title">Наука, що працює</h1>
                    <div class="hero-subtitle">для громад, бізнесу та довкілля</div>
                    <p class="hero-lead">Об’єднуємо науку, освіту, бізнес та громади для створення інноваційних рішень і сталого розвитку Полісся та України.</p>

                    <div style="margin-top:18px;display:flex;gap:12px;flex-wrap:wrap">
                        <a href="#about" class="btn">Дізнатись більше</a>
                        <a href="#news" class="btn-outline">Останні новини</a>
                    </div>
                </div>

                <div class="hero-right">
                    @if(isset($sliders) && count($sliders))
                        <div class="hero-slider" id="heroSlider">
                            @foreach($sliders as $idx => $slide)
                                <div class="slide{{ $idx === 0 ? ' active' : '' }}" data-index="{{ $idx }}">
                                    <img class="slide-image" src="{{ asset($slide->image_path) }}" alt="{{ $slide->title_ua }}">
                                    <div class="slide-overlay">
                                        <div class="slide-overlay-inner">
                                            <h3 class="slide-title">{{ $slide->title_ua }}</h3>
                                            <div class="en-title">{{ $slide->title_en }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="slider-controls">
                                <button class="prev">‹</button>
                                <button class="next">›</button>
                            </div>

                            <div class="slider-dots">
                                @foreach($sliders as $idx => $slide)
                                    <button class="slider-dot{{ $idx === 0 ? ' active' : '' }}" data-index="{{ $idx }}"></button>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div style="background:linear-gradient(180deg,var(--cream),#fff);border-radius:12px;padding:18px;display:flex;align-items:center;justify-content:center;min-height:220px;">
                            <div style="width:320px;height:180px;background:linear-gradient(180deg,#dff3e8,#bfe9d0);border-radius:8px;display:flex;align-items:center;justify-content:center;color:var(--green);font-weight:700">Візуальний блок</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <div class="container">

        <section id="about">
            <div class="about-inner">
                <div>
                    <div class="small-label">ПРО НАС</div>
                    <h3>Інновації для розвитку Полісся та України</h3>
                </div>
                <div>
                    <p>Науковий парк створює умови для комерціалізації наукових розробок, підтримки стартапів, розвитку талантів та співпраці з громадами і підприємствами. Ми працюємо над проєктами у сфері цифрових технологій, агротехнологій, екології та освіти.</p>

                    <div class="goal-card">
                        <strong style="color:var(--gold);">Наша мета:</strong>
                        <p style="margin:8px 0 0 0;color:var(--cream)">Створити екосистему, де наука, бізнес та громади співпрацюють для сталого розвитку регіону.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="activities" style="margin:34px 0">
            <h3 class="section-title" style="color:var(--gold);text-transform:uppercase">НАПРЯМИ ДІЯЛЬНОСТІ</h3>
            @include('partials.activities-grid', ['activities' => $activities])
        </section>

        <section id="opportunities" class="opportunities-section" style="margin:34px 0;padding:18px;">
            <h3 class="section-title" style="color:var(--gold);text-transform:uppercase">НАШІ МОЖЛИВОСТІ</h3>
            @include('partials.opportunities-grid', ['opportunities' => $opportunities])
        </section>

        @include('partials.home-news')

        <section id="contacts" style="margin:34px 0;padding:18px;background:#ffffff;border-radius:12px;box-shadow:0 6px 18px rgba(0,0,0,0.06)">
            <h4 style="margin-top:0;color:var(--green)">Контакти</h4>
            <p style="margin:6px 0">Email: <a href="mailto:naukpark@polissiauniver.edu.ua">naukpark@polissiauniver.edu.ua</a></p>
            <p style="margin:6px 0">Address: 10008, Україна, Житомирська область, м. Житомир, Старий бульвар, 7</p>
        </section>
    </div>
@endsection

@section('head')
    <style>
        .hero-full{width:100%;background:var(--dark);padding:40px 0;color:#fff}
        .hero-inner{display:grid;grid-template-columns:1fr 480px;gap:28px;align-items:center}
        .hero-left{padding:20px}
        .hero-title{font-family:Montserrat, sans-serif;font-weight:800;font-size:56px;margin:0;color:#fff}
        .hero-subtitle{display:inline-block;margin-top:12px;background:var(--gold);color:var(--dark);padding:8px 12px;border-radius:18px;font-weight:600}
        .hero-lead{margin-top:14px;color:var(--cream);opacity:.95;max-width:560px}
        @media(max-width:800px){
            .hero-inner{grid-template-columns:1fr}
            .hero-title{font-size:32px}
        }

        .hero-right .hero-slider{background:transparent;padding:0;min-height:260px}
        .hero-right .slide{display:none}
        .hero-right .slide.active{display:block;position:relative}
        .hero-right .slide-image{width:100%;height:280px;object-fit:cover;border-radius:12px;display:block}
        .slide-overlay{position:absolute;left:0;right:0;bottom:0;padding:12px}
        .slide-overlay-inner{background:linear-gradient(180deg,rgba(0,0,0,0),rgba(0,0,0,0.45));padding:12px;border-radius:0}
        .slide-title{color:#fff;margin:0;font-family:Montserrat, sans-serif}

        .slider-controls{position:absolute;left:8px;right:8px;top:50%;transform:translateY(-50%);display:flex;justify-content:space-between}
        .slider-controls button{width:44px;height:44px;border-radius:50%;background:var(--gold);color:var(--dark);border:none;font-size:22px}
        .slider-dots{position:absolute;left:50%;transform:translateX(-50%);bottom:12px;display:flex;gap:8px}
        .slider-dot{width:10px;height:10px;border-radius:50%;background:var(--gold);opacity:.5;border:none}
        .slider-dot.active{opacity:1}

        /* About section */
        #about{background:linear-gradient(180deg,var(--dark),var(--green));color:#fff;padding:36px;border-radius:12px;margin-top:28px}
        #about .about-inner{display:grid;grid-template-columns:1fr 1fr;gap:20px;align-items:start}
        #about .small-label{color:var(--gold);letter-spacing:2px;font-family:Montserrat, sans-serif;font-weight:700}
        #about h3{font-family:Montserrat, sans-serif;font-weight:700;font-size:36px;margin-top:6px}
        #about p{color:var(--cream);opacity:.95}
        .goal-card{background:rgba(255,255,255,.06);border-left:3px solid var(--gold);padding:12px;border-radius:8px;margin-top:12px}
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
@endsection
