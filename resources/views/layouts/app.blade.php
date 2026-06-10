<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Поліський науковий парк')</title>
    <style>
        :root{
            --bg: #f7faf7;
            --card: #ffffff;
            --accent: #2d6a4f;
            --muted: #6b6b6b;
            --container: 1200px;
        }
        html,body{height:100%;}
        body{margin:0;font-family:Arial,Helvetica,sans-serif;background:var(--bg);color:#123;padding-bottom:40px}
        .container{max-width:var(--container);margin:0 auto;padding:20px}
        header{background:transparent;padding:14px 0}
        .site-brand{font-weight:700;color:var(--accent);font-size:18px}
        nav{display:flex;gap:16px;align-items:center}
        a{color:inherit;text-decoration:none}
        .btn{display:inline-block;padding:8px 14px;border-radius:8px;background:var(--accent);color:#fff}
        footer{padding:24px 0;color:#456;text-align:center}
        /* Activities / cards shared styles (used by home and /activities) */
        .section-title{
            font-size:1.35rem;
            color:var(--accent);
            margin:36px 0 16px;
            text-align:center;
            font-weight:700;
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
            font-size:1.05rem;
            color:var(--accent);
            line-height:1.15;
        }

        .card .en-title{
            display:block;
            font-size:.9rem;
            color:var(--muted);
            margin-top:4px;
            font-weight:600;
        }

        .card .desc{
            margin-top:10px;
            color:#234;
            font-size:.95rem;
            line-height:1.45;
            flex:1 1 auto;
        }

        .card .en-desc{
            display:block;
            margin-top:8px;
            color:var(--muted);
            font-size:.88rem;
        }
    </style>
    @yield('head')
</head>
<body>
    <header>
        <div class="container" style="display:flex;align-items:center;justify-content:space-between;">
            <div class="site-brand">Науковий парк «Поліський університет»</div>
            <nav>
                <a href="#">Новини</a>
                <a href="#about">Про нас</a>
                <a href="#activities">Напрями діяльності</a>
                <a href="#opportunities">Наші можливості</a>
                <a href="#contacts">Контакти</a>
                <div style="width:8px"></div>
                <div style="padding:6px 8px;border-radius:6px;background:#e9f4ec;color:var(--accent);font-weight:600">UA / EN</div>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <small>© Поліський науковий парк — об'єднуємо науку, освіту та бізнес для розвитку регіону.</small>
        </div>
    </footer>
</body>
</html>
