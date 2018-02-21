<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('breadcrumbs', array_except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="pt-6">
        <?php echo $__env->make('threads._list', array_except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo e($threads->render()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), ['__data', '__path']))->render(); ?>