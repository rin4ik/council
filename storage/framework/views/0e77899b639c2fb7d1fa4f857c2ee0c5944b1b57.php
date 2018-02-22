<?php echo $__env->renderWhen(auth()->check() && auth()->user()->confirmed, 'modals.new-thread', array_except(get_defined_vars(), ['__data', '__path'])); ?>
<?php echo $__env->make('modals.login', array_except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('modals.register', array_except(get_defined_vars(), ['__data', '__path']))->render(); ?>
