<?php
    $isEn = ($currentLocale ?? 'uk') === 'en';
?>

<?php if(isset($opportunities) && count($opportunities)): ?>
    <div class="opportunities-grid">
        <?php $__currentLoopData = $opportunities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opportunity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="opportunity-card opportunity-home">
                <div class="opportunity-icon-wrap">
                    <img src="<?php echo e(asset($opportunity->image_path)); ?>"
                         alt="<?php echo e($isEn ? $opportunity->description_en : $opportunity->description_ua); ?>"
                         class="opportunity-icon-img">
                </div>

                <div class="ua-text"><?php echo e($isEn ? $opportunity->description_en : $opportunity->description_ua); ?></div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php else: ?>
    <p style="text-align:center;color:#F3EBDD"><?php echo e($isEn ? 'No opportunities available.' : 'Можливості відсутні.'); ?></p>
<?php endif; ?>
<?php /**PATH C:\laragon\www\polissia-science-park\resources\views/partials/opportunities-grid.blade.php ENDPATH**/ ?>