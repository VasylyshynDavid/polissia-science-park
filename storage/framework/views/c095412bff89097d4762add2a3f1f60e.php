<?php
    $isEn = ($currentLocale ?? 'uk') === 'en';
    $activeQ = $q ?? request('q', '');
    $activeCategory = $category ?? request('category');
    $activeYear = $year ?? request('year');
    $hasFilters = filled($activeQ) || filled($activeCategory) || filled($activeYear);
?>

<?php $__env->startSection('title', $isEn ? 'News — Science Park Polissia University' : 'Новини — Поліський науковий парк'); ?>

<?php $__env->startSection('meta_description', $isEn 
    ? 'Latest news, events, and achievements from Science Park Polissia University. Stay informed about innovations, projects, and sustainable development initiatives.' 
    : 'Останні новини, події та досягнення Поліського наукового парку. Інновації, проєкти та ініціативи сталого розвитку.'); ?>

<?php $__env->startSection('canonical', route('news.index')); ?>

<?php $__env->startSection('og_title', $isEn ? 'News — Science Park Polissia University' : 'Новини — Поліський науковий парк'); ?>

<?php $__env->startSection('og_description', $isEn 
    ? 'Latest news, events, and achievements from Science Park Polissia University.' 
    : 'Останні новини, події та досягнення Поліського наукового парку.'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container news-index" style="padding-top:30px">
        <h1 class="section-title" style="margin-top:0"><?php echo e($isEn ? 'News' : 'Новини'); ?></h1>

        <form method="get" action="<?php echo e(route('news.index')); ?>" role="search" style="display:flex;gap:12px;flex-wrap:wrap;margin-bottom:18px;align-items:center;background:#ffffff;padding:16px;border-radius:12px;box-shadow:0 6px 18px rgba(18,36,24,0.04)">
            <label for="news-search-q" style="position:absolute;left:-9999px"><?php echo e($isEn ? 'Search news' : 'Пошук новин'); ?></label>
            <input id="news-search-q" type="search" name="q" value="<?php echo e($activeQ); ?>" placeholder="<?php echo e($isEn ? 'Search by title, description or text' : 'Пошук за заголовком, описом або текстом'); ?>" autocomplete="off" style="padding:10px 14px;border-radius:8px;border:1px solid #e6efe8;min-width:240px;flex:1;font-family:Inter,sans-serif;font-size:15px">

            <label for="news-search-category" style="position:absolute;left:-9999px"><?php echo e($isEn ? 'Category' : 'Категорія'); ?></label>
            <select id="news-search-category" name="category" style="padding:10px 14px;border-radius:8px;border:1px solid #e6efe8;font-family:Inter,sans-serif;font-size:15px;background:#fff;color:var(--text)">
                <option value=""><?php echo e($isEn ? 'All Categories' : 'Всі категорії'); ?></option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cat->slug); ?>" <?php if((string) $activeCategory === (string) $cat->slug): echo 'selected'; endif; ?>><?php echo e($isEn ? $cat->name_en : $cat->name_ua); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <label for="news-search-year" style="position:absolute;left:-9999px"><?php echo e($isEn ? 'Publication year' : 'Рік публікації'); ?></label>
            <select id="news-search-year" name="year" style="padding:10px 14px;border-radius:8px;border:1px solid #e6efe8;font-family:Inter,sans-serif;font-size:15px;background:#fff;color:var(--text)">
                <option value=""><?php echo e($isEn ? 'All Years' : 'Усі роки'); ?></option>
                <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $y): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($y); ?>" <?php if((string) $activeYear === (string) $y): echo 'selected'; endif; ?>><?php echo e($y); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <button class="btn" type="submit" style="background:var(--green);color:#fff;padding:10px 20px;font-size:15px"><?php echo e($isEn ? 'Search' : 'Знайти'); ?></button>
            <?php if($hasFilters): ?>
                <a href="<?php echo e(route('news.index')); ?>" class="btn" style="background:#e6efe8;color:var(--text);padding:10px 20px;font-size:15px;text-decoration:none"><?php echo e($isEn ? 'Reset' : 'Скинути'); ?></a>
            <?php endif; ?>
        </form>

        <?php if($hasFilters): ?>
            <div style="margin-bottom:18px;color:var(--muted);font-size:15px">
                <?php echo e($isEn ? 'Found' : 'Знайдено'); ?>: <strong><?php echo e($news->total()); ?></strong>
            </div>
        <?php endif; ?>

        <div style="margin-bottom:28px;display:flex;gap:10px;flex-wrap:wrap">
            <a href="<?php echo e(route('news.index', request()->except(['category', 'page']))); ?>"
               class="btn category-btn <?php echo e(empty($activeCategory) ? 'active' : ''); ?>"
               style="background: <?php echo e(empty($activeCategory) ? 'var(--green)' : '#ffffff'); ?>; color: <?php echo e(empty($activeCategory) ? '#ffffff' : 'var(--green)'); ?>; border:1px solid var(--green);font-size:14px;padding:6px 14px;text-decoration:none">
                <?php echo e($isEn ? 'All' : 'Усі'); ?>

            </a>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('news.index', array_merge(request()->except(['category', 'page']), ['category' => $cat->slug]))); ?>"
                   class="btn category-btn <?php echo e(((string) $activeCategory === (string) $cat->slug) ? 'active' : ''); ?>"
                   style="background: <?php echo e(((string) $activeCategory === (string) $cat->slug) ? 'var(--green)' : '#ffffff'); ?>; color: <?php echo e(((string) $activeCategory === (string) $cat->slug) ? '#ffffff' : 'var(--green)'); ?>; border:1px solid var(--green);font-size:14px;padding:6px 14px;text-decoration:none">
                    <?php echo e($isEn ? $cat->name_en : $cat->name_ua); ?>

                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php if($news->count()): ?>
            <div class="news-list-grid">
                <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('partials.news-card', ['news' => $n], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div style="margin-top:30px;text-align:center"><?php echo e($news->links()); ?></div>
        <?php else: ?>
            <div style="padding:40px 24px;background:var(--card);border-radius:12px;box-shadow:0 6px 18px rgba(18,36,24,0.06);text-align:center;font-size:18px;color:var(--muted)">
                <?php echo e($isEn ? 'No news found. Try changing your search query or filters.' : 'Новин не знайдено. Спробуйте змінити пошуковий запит або фільтри.'); ?>

            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\polissia-science-park\resources\views/news/index.blade.php ENDPATH**/ ?>