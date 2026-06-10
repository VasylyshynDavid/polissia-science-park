<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Напрями діяльності - Поліський науковий парк</title>
    <style>
        :root{
            --bg: #f6f9f6;
            --card: #ffffff;
            --accent: #2d6a4f;
            --muted: #6b6b6b;
        }
        body{background:var(--bg);font-family:Arial,Helvetica,sans-serif;margin:0;padding:24px;color:#213;}
        .container{max-width:1200px;margin:0 auto;padding:16px}
        h1.section-title{text-align:center;color:var(--accent);margin:8px 0 24px 0;font-size:28px}
        .activities-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:18px}
        .card{background:var(--card);border-radius:12px;padding:18px;box-shadow:0 6px 18px rgba(0,0,0,0.08);display:flex;flex-direction:column;gap:8px}
        .card .head{display:flex;gap:12px;align-items:center}
        .card img{width:64px;height:64px;object-fit:cover;border-radius:8px;flex:0 0 64px;background:#eaf6ee;padding:6px}
        .card h3{margin:0;color:#0b3b2a;font-size:18px}
        .card .en-title{margin:0;color:var(--muted);font-size:13px;font-style:italic}
        .card .desc{color:#243;line-height:1.35;margin-top:6px;font-size:14px}
        .card .en-desc{color:#536;color:#556;margin-top:6px;font-size:13px;opacity:0.9}
        @media (max-width:600px){body{padding:12px}.container{padding:0}h1.section-title{font-size:20px}}
    </style>
</head>
<body>
    <div class="container">
        <h1 class="section-title">Напрями діяльності</h1>

        <section class="activities-grid" aria-label="Напрями діяльності">
            @foreach($activities as $activity)
                <article class="card">
                    <div class="head">
                        <img src="{{ asset($activity->image_path) }}" alt="{{ $activity->title_ua }}">
                        <div>
                            <h3>{{ $activity->title_ua }}</h3>
                            <div class="en-title">{{ $activity->title_en }}</div>
                        </div>
                    </div>

                    <div class="desc">{{ $activity->description_ua }}</div>
                    <div class="en-desc">{{ $activity->description_en }}</div>
                </article>
            @endforeach
        </section>
    </div>
</body>
</html>
