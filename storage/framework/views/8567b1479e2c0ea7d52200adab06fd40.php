<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Адмін-панель'); ?> — Science Park CMS</title>
    <style>
        :root{--dark:#042C22;--green:#0A4A33;--gold:#C7A84A;--cream:#F3EBDD;--bg:#F8F8F4;--text:#1F2937;--danger:#b42318;--muted:#667085}
        *{box-sizing:border-box}body{margin:0;background:var(--bg);font-family:Inter,Arial,sans-serif;color:var(--text)}a{color:inherit}.admin-shell{display:grid;grid-template-columns:280px 1fr;min-height:100vh}.sidebar{background:var(--dark);color:#fff;padding:22px;position:sticky;top:0;height:100vh;overflow:auto}.brand{display:flex;align-items:center;gap:12px;margin-bottom:22px}.brand img{width:94px;height:auto;border-radius:8px}.brand div{font-weight:800;color:var(--cream);line-height:1.2}.nav{display:grid;gap:8px}.nav a,.nav button{display:block;width:100%;border:0;background:transparent;text-align:left;color:#fff;text-decoration:none;padding:11px 12px;border-radius:10px;font-weight:700;cursor:pointer}.nav a:hover,.nav a.active,.nav button:hover{background:rgba(255,255,255,.09);color:var(--cream)}.content{padding:28px}.topbar{display:flex;align-items:center;justify-content:space-between;gap:12px;margin-bottom:22px}.topbar h1{margin:0;font-size:32px;color:var(--green)}.card{background:#fff;border-radius:16px;padding:18px;box-shadow:0 12px 30px rgba(4,44,34,.08);margin-bottom:18px}.grid{display:grid;gap:16px}.grid-2{grid-template-columns:repeat(2,minmax(0,1fr))}.grid-4{grid-template-columns:repeat(4,minmax(0,1fr))}.stat{border-left:4px solid var(--gold)}.stat b{font-size:30px;color:var(--green)}.stat span{display:block;color:var(--muted);margin-top:4px}.btn{display:inline-flex;align-items:center;gap:8px;border:0;border-radius:10px;padding:10px 14px;background:var(--green);color:#fff;text-decoration:none;font-weight:800;cursor:pointer}.btn.secondary{background:#fff;color:var(--green);border:1px solid rgba(10,74,51,.18)}.btn.gold{background:var(--gold);color:var(--dark)}.btn.danger{background:var(--danger)}.table-wrap{overflow:auto}.table{width:100%;border-collapse:collapse}.table th,.table td{padding:12px;border-bottom:1px solid #edf0ed;text-align:left;vertical-align:top}.table th{font-size:13px;text-transform:uppercase;color:var(--muted);letter-spacing:.05em}.badge{display:inline-block;border-radius:999px;padding:5px 10px;font-weight:800;font-size:12px}.badge.ok{background:#e7f5ec;color:#067647}.badge.off{background:#f2f4f7;color:#475467}.badge.warn{background:#fff3cd;color:#7a5b00}.form{display:grid;gap:14px}.field label{display:block;font-weight:800;margin-bottom:6px;color:#344054}.field input,.field textarea,.field select{width:100%;border:1px solid #d0d5dd;border-radius:10px;padding:10px 12px;font:inherit;background:#fff}.field textarea{min-height:110px;resize:vertical}.help{font-size:13px;color:var(--muted);margin-top:4px}.errors{background:#fff1f0;border:1px solid #ffccc7;color:#a8071a;border-radius:12px;padding:12px;margin-bottom:16px}.success{background:#ecfdf3;border:1px solid #abefc6;color:#067647;border-radius:12px;padding:12px;margin-bottom:16px}.actions{display:flex;gap:8px;flex-wrap:wrap}.thumb{width:90px;height:62px;object-fit:cover;border-radius:8px;background:#eef2ee}.checkbox{display:flex;gap:8px;align-items:center}.checkbox input{width:auto}.gallery{display:grid;grid-template-columns:repeat(auto-fill,minmax(150px,1fr));gap:12px}.gallery-item{border:1px solid #eaecf0;border-radius:12px;padding:8px}.gallery-item img{width:100%;height:95px;object-fit:cover;border-radius:8px}@media(max-width:900px){.admin-shell{grid-template-columns:1fr}.sidebar{position:static;height:auto}.grid-2,.grid-4{grid-template-columns:1fr}.content{padding:16px}.topbar{align-items:flex-start;flex-direction:column}}
    </style>
</head>
<body>
    <div class="admin-shell">
        <aside class="sidebar">
            <div class="brand">
                <img src="<?php echo e(asset('images/logo-science-park-monogram.png')); ?>" alt="Science Park">
                <div>Science Park<br>CMS</div>
            </div>
            <nav class="nav">
                <a href="<?php echo e(route('home', ['locale' => 'uk'])); ?>" target="_blank">Публічний сайт</a>
                <a href="<?php echo e(route('admin.dashboard')); ?>">Панель</a>
                <a href="<?php echo e(route('admin.sliders.index')); ?>">Слайдер</a>
                <a href="<?php echo e(route('admin.activities.index')); ?>">Напрями діяльності</a>
                <a href="<?php echo e(route('admin.opportunities.index')); ?>">Наші можливості</a>
                <a href="<?php echo e(route('admin.news.index')); ?>">Новини</a>
                <a href="<?php echo e(route('admin.categories.index')); ?>">Категорії новин</a>
                <form method="post" action="<?php echo e(route('admin.logout')); ?>"><?php echo csrf_field(); ?><button type="submit">Вийти</button></form>
            </nav>
        </aside>
        <main class="content">
            <?php if(session('success')): ?><div class="success"><?php echo e(session('success')); ?></div><?php endif; ?>
            <?php if($errors->any()): ?>
                <div class="errors"><b>Перевірте поля:</b><ul><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul></div>
            <?php endif; ?>
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</body>
</html>
<?php /**PATH C:\laragon\www\polissia-science-park\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>