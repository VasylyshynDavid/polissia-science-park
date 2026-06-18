<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вхід в адмін-панель</title>
    <style>:root{--dark:#042C22;--green:#0A4A33;--gold:#C7A84A;--cream:#F3EBDD}body{margin:0;min-height:100vh;display:grid;place-items:center;background:linear-gradient(135deg,var(--dark),var(--green));font-family:Inter,Arial,sans-serif}.box{width:min(430px,92vw);background:#fff;border-radius:18px;padding:26px;box-shadow:0 30px 70px rgba(0,0,0,.28)}img{display:block;max-width:220px;margin:0 auto 18px;border-radius:10px}h1{margin:0 0 18px;color:var(--green);text-align:center}label{display:block;font-weight:800;margin:12px 0 6px}input{width:100%;border:1px solid #d0d5dd;border-radius:10px;padding:11px 12px;font:inherit;box-sizing:border-box}.btn{width:100%;margin-top:18px;border:0;border-radius:10px;padding:12px 14px;background:var(--green);color:#fff;font-weight:800;cursor:pointer}.errors{background:#fff1f0;color:#a8071a;border-radius:10px;padding:10px;margin-bottom:12px}.remember{display:flex;align-items:center;gap:8px}.remember input{width:auto}</style>
</head>
<body>
    <form class="box" method="post" action="{{ route('admin.login.submit') }}">
        @csrf
        <img src="{{ asset('images/logo-science-park.png') }}" alt="Science Park">
        <h1>Адмін-панель</h1>
        @if($errors->any())<div class="errors">{{ $errors->first() }}</div>@endif
        <label>Email</label><input name="email" type="email" value="{{ old('email') }}" required autofocus>
        <label>Пароль</label><input name="password" type="password" required>
        <label class="remember"><input type="checkbox" name="remember" value="1"> Запамʼятати мене</label>
        <button class="btn" type="submit">Увійти</button>
    </form>
</body>
</html>
