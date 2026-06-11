@extends('layouts.app')

@section('title', 'Головна — Поліський науковий парк')

@section('content')
    <div class="container">
        <section class="hero" style="display:grid;grid-template-columns:1fr 420px;gap:28px;align-items:center;margin:28px 0;">
            <div>
                <h2 style="margin:0;color: #173a2e;font-size:36px;">Наука, що працює</h2>
                <p style="margin:10px 0 18px 0;color:#2b5f4a;font-size:18px;">для громад, бізнесу та довкілля</p>
                <p style="color:#3a4f3f;line-height:1.5;">Об’єднуємо науку, освіту, бізнес та громади для створення інноваційних рішень і сталого розвитку Полісся та України.</p>

                <div style="margin-top:18px;display:flex;gap:12px;flex-wrap:wrap">
                    <a href="#about" class="btn">Дізнатись більше</a>
                    <a href="#news" class="btn" style="background:#fff;color:var(--accent);border:1px solid #e3efe6;">Останні новини</a>
                </div>
            </div>

            <div>
                @if(isset($sliders) && count($sliders))
                    <div class="hero-slider" id="heroSlider">
                        @foreach($sliders as $idx => $slide)
                            <div class="slide{{ $idx === 0 ? ' active' : '' }}" data-index="{{ $idx }}">
                                <img class="slide-image" src="{{ asset($slide->image_path) }}" alt="{{ $slide->title_ua }}">
                                <div class="slide-content">
                                    <h3>{{ $slide->title_ua }}</h3>
                                    <div class="en-title">{{ $slide->title_en }}</div>
                                    <p class="slide-desc">{{ $slide->description_ua }}</p>
                                </div>
                            </div>
                        @endforeach

                        <div class="slider-controls">
                            <button class="prev">Prev</button>
                            <button class="next">Next</button>
                        </div>

                        <div class="slider-dots">
                            @foreach($sliders as $idx => $slide)
                                <button class="slider-dot{{ $idx === 0 ? ' active' : '' }}" data-index="{{ $idx }}"></button>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div style="background:#eaf6ee;border-radius:12px;padding:18px;display:flex;align-items:center;justify-content:center;min-height:220px;">
                        <div style="width:320px;height:180px;background:linear-gradient(180deg,#dff3e8,#bfe9d0);border-radius:8px;display:flex;align-items:center;justify-content:center;color:var(--accent);font-weight:700">Візуальний блок</div>
                    </div>
                @endif
            </div>
        </section>

        @include('partials.home-news')

        <section id="about" style="margin:34px 0;padding:20px;background:#ffffff;border-radius:12px;box-shadow:0 6px 18px rgba(0,0,0,0.06)">
            <h3 style="margin-top:0;color:var(--accent)">Інновації для розвитку Полісся та України</h3>
            <p>Науковий парк створює умови для комерціалізації наукових розробок, підтримки стартапів, розвитку талантів та співпраці з громадами і підприємствами. Ми працюємо над проєктами у сфері цифрових технологій, агротехнологій, екології та освіти.</p>

            <div style="margin-top:12px;padding:12px;border-left:4px solid var(--accent);background:#f6f9f6;border-radius:6px">
                <strong>Наша мета:</strong>
                <p style="margin:8px 0 0 0">Створити екосистему, де наука, бізнес та громади співпрацюють для сталого розвитку регіону.</p>
            </div>
        </section>

        <section id="activities" style="margin:34px 0">
            <h3 style="color:var(--accent);">Напрями діяльності</h3>
            @include('partials.activities-grid', ['activities' => $activities])
            <div style="margin-top:12px;text-align:right">
                <a href="{{ route('activities.index') }}" class="btn">Усі напрями</a>
            </div>
        </section>

        <section id="opportunities" style="margin:34px 0;background:#ffffff;border-radius:12px;padding:18px;box-shadow:0 6px 18px rgba(0,0,0,0.06)">
            <h4 style="margin-top:0;color:var(--accent)">Наші можливості</h4>
            @include('partials.opportunities-grid', ['opportunities' => $opportunities])
            <div style="margin-top:12px;text-align:right">
                <a href="{{ route('opportunities.index') }}" class="btn">Усі можливості</a>
            </div>
        </section>

        <section id="contacts" style="margin:34px 0;padding:18px;background:#ffffff;border-radius:12px;box-shadow:0 6px 18px rgba(0,0,0,0.06)">
            <h4 style="margin-top:0;color:var(--accent)">Контакти</h4>
            <p style="margin:6px 0">Email: <a href="mailto:naukpark@polissiauniver.edu.ua">naukpark@polissiauniver.edu.ua</a></p>
            <p style="margin:6px 0">Address: 10008, Україна, Житомирська область, м. Житомир, Старий бульвар, 7</p>
        </section>
    </div>
@endsection

@section('head')
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
