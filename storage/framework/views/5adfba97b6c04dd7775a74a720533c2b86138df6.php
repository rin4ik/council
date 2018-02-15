<?php $__env->startSection('administration-content'); ?>
    <form method="POST" action="<?php echo e(route('admin.channels.store')); ?>">
        <?php echo $__env->make('admin.channels._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>