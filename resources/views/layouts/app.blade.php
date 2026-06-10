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
