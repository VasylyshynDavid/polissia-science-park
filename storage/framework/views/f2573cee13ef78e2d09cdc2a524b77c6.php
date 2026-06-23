<?php
    $isEn = ($currentLocale ?? 'uk') === 'en';
?>

<div class="activities-grid">
    <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <article id="activity-<?php echo e($activity->id); ?>" class="card activity-card">
            <div style="display:flex;justify-content:center;margin-bottom:12px">
                <div class="icon-circle">
                    <img src="<?php echo e(asset($activity->image_path)); ?>"
                         alt="<?php echo e($isEn ? $activity->title_en : $activity->title_ua); ?>"
                         class="activity-icon-img">
                </div>
            </div>

            <h3 class="activity-title"><?php echo e($isEn ? $activity->title_en : $activity->title_ua); ?></h3>
            <p class="desc" style="min-height:56px;font-size:14px"><?php echo e($isEn ? $activity->description_en : $activity->description_ua); ?></p>
        </article>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH C:\laragon\www\polissia-science-park\resources\views/partials/activities-grid.blade.php ENDPATH**/ ?>