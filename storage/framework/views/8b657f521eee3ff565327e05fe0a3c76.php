<section id="latest-news" class="latest-news-section">
    <div class="latest-news-head" style="display:flex;align-items:center;justify-content:space-between">
        <h3 style="margin:0;font-family:Montserrat, sans-serif;font-weight:700;color:var(--green);text-transform:uppercase"><?php echo e(($currentLocale ?? 'uk') === 'en' ? 'LATEST NEWS' : 'ОСТАННІ НОВИНИ'); ?></h3>
        <a href="<?php echo e(route('news.index')); ?>" style="color:var(--green);font-weight:600;text-decoration:none"><?php echo e(($currentLocale ?? 'uk') === 'en' ? 'All News →' : 'Усі новини →'); ?></a>
    </div>

    <div class="activities-grid" style="margin-top:12px;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:18px">
        <?php $__currentLoopData = $latestNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('partials.news-card-mini', ['item' => $n], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<?php /**PATH C:\laragon\www\polissia-science-park\resources\views/partials/home-news.blade.php ENDPATH**/ ?>