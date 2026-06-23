<?php
    $isEn = ($currentLocale ?? 'uk') === 'en';
    $title = $isEn ? $news->title_en : $news->title_ua;
    $excerpt = $isEn ? $news->excerpt_en : $news->excerpt_ua;
?>

<article class="news-card">
    <?php if(!empty($news->image_path)): ?>
        <a href="<?php echo e(route('news.show', $news)); ?>" class="news-card-media">
            <img src="<?php echo e(asset($news->image_path)); ?>" alt="<?php echo e($title); ?>">
        </a>
    <?php endif; ?>

    <div class="news-card-body">
        <div class="news-card-meta">
            <div class="news-card-tags">
                <?php if($news->is_pinned): ?>
                    <span class="news-card-badge">
                        <?php echo e($isEn ? 'Pinned' : 'Закріплено'); ?>

                    </span>
                <?php endif; ?>

                <?php if($news->category): ?>
                    <a href="<?php echo e(route('news.index', ['category' => $news->category->slug])); ?>" class="news-card-category">
                        <?php echo e($isEn ? $news->category->name_en : $news->category->name_ua); ?>

                    </a>
                <?php endif; ?>
            </div>

            <time class="news-card-date">
                <?php echo e($news->published_at ? ($isEn ? $news->published_at->translatedFormat('F j, Y') : $news->published_at->translatedFormat('j F Y')) : ''); ?>

            </time>
        </div>

        <h3 class="news-card-title">
            <a href="<?php echo e(route('news.show', $news)); ?>"><?php echo e($title); ?></a>
        </h3>

        <p class="news-card-excerpt"><?php echo e($excerpt); ?></p>

        <div class="news-card-footer">
            <a href="<?php echo e(route('news.show', $news)); ?>" class="news-card-more">
                <?php echo e($isEn ? 'Read More →' : 'Читати далі →'); ?>

            </a>
        </div>
    </div>
</article>
<?php /**PATH C:\laragon\www\polissia-science-park\resources\views/partials/news-card.blade.php ENDPATH**/ ?>