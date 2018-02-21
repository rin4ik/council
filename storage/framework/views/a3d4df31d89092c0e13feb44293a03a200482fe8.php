<?php $__env->startSection('head'); ?>
    <link rel="stylesheet" href="/css/vendor/jquery.atwho.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <thread-view :thread="<?php echo e($thread); ?>" inline-template>
        <div>
            <?php echo $__env->make('breadcrumbs', array_except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="py-6 leading-normal">
                <?php echo $__env->make('threads._question', array_except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <replies @added="repliesCount++" @removed="repliesCount--"></replies>
            </div>
        </div>
    </thread-view>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), ['__data', '__path']))->render(); ?>