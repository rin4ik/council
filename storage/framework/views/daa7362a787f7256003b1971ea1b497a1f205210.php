<?php $__env->startSection('administration-content'); ?>
    <p>You are on the administration dashboard.</p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>