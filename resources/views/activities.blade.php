<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Напрями діяльності - Поліський науковий парк</title>
    <style>
        body {
            background-color: #042C22; /* Темно-зелений фірмовий фон */
            font-family: Arial, sans-serif;
            padding: 40px;
        }
        
        .section-title {
            color: #C7A84A; /* Золотий заголовок */
            text-align: center;
            font-size: 2.5em;
            margin-bottom: 40px;
        }

        /* МАГІЯ СІТКИ: 5 колонок */
        .activities-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
            max-width: 1400px;
            margin: 0 auto; /* Відцентрувати сітку */
        }

        /* БІЛІ КАРТКИ З МАКЕТА */
        .card {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 25px 20px;
            color: #333; /* Темний текст всередині */
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
            display: flex;
            flex-direction: column;
        }

        .card h3 { 
            margin-top: 0; 
            color: #042C22; /* Темно-зелені заголовки в картці */
            font-size: 1.1em;
            margin-bottom: 5px;
        }
        
        .card .en-title { 
            font-style: italic; 
            color: #888; 
            font-size: 0.85em; 
            margin-top: 0;
            margin-bottom: 15px;
        }

        .card p { 
            font-size: 0.9em; 
            line-height: 1.4;
            margin-bottom: 5px;
        }
        
        .card .en-desc {
            font-style: italic;
            color: #666;
            font-size: 0.85em;
        }
    </style>
</head>
<body>

    <h2 class="section-title">Напрями діяльності</h2>

    <div class="activities-grid">
        @foreach($activities as $activity)
            <div class="card">
                <div style="display:flex;align-items:center;gap:12px;margin-bottom:12px;">
                    <img src="/{{ $activity->image_path }}" alt="icon" style="width:56px;height:56px;border-radius:8px;background:#E8F6F0;padding:8px;"/>
                    <div>
                        <h3>{{ $activity->title_ua }}</h3>
                        <div class="en-title">{{ $activity->title_en }}</div>
                    </div>
                </div>

                <p style="margin-bottom:8px;">{{ $activity->description_ua }}</p>
                <div class="en-desc">{{ $activity->description_en }}</div>
            </div>
        @endforeach
    </div>

</body>
</html>
