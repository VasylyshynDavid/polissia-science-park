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
                    <a href="#" class="btn" style="background:#fff;color:var(--accent);border:1px solid #e3efe6;">Останні новини</a>
                </div>
            </div>

            <div style="background:#eaf6ee;border-radius:12px;padding:18px;display:flex;align-items:center;justify-content:center;min-height:220px;">
                <div style="width:320px;height:180px;background:linear-gradient(180deg,#dff3e8,#bfe9d0);border-radius:8px;display:flex;align-items:center;justify-content:center;color:var(--accent);font-weight:700">Візуальний блок</div>
            </div>
        </section>

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
