<?php $__env->startSection('title','Панель керування'); ?>
<?php $__env->startSection('content'); ?>
<div class="topbar"><h1>Панель керування</h1><a class="btn secondary" href="<?php echo e(route('home')); ?>" target="_blank">Переглянути сайт</a></div>
<div class="grid grid-4">
    <div class="card stat"><b><?php echo e($activeSlidesCount); ?>/10</b><span>Активні слайди</span></div>
    <div class="card stat"><b><?php echo e($activeActivitiesCount); ?>/10</b><span>Активні напрями</span></div>
    <div class="card stat"><b><?php echo e($activeOpportunitiesCount); ?>/10</b><span>Активні можливості</span></div>
    <div class="card stat"><b><?php echo e($publishedNewsCount); ?></b><span>Опубліковані новини</span></div>
</div>
<div class="card">
    <h2>Відповідність ТЗ</h2>
    <ul>
        <li>Слайдер: додавання, редагування, видалення, сортування, максимум 10 активних.</li>
        <li>Напрями діяльності: CRUD, приховування, SVG/PNG іконки, ліміти 60/180 символів, максимум 10 активних.</li>
        <li>Можливості: CRUD, приховування, SVG/PNG іконки, ліміт 120 символів, максимум 10 активних.</li>
        <li>Новини: категорії, SEO URL, головне фото, галерея до 10 фото, закріплення, архів, відкладена публікація.</li>
    </ul>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\polissia-science-park\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>