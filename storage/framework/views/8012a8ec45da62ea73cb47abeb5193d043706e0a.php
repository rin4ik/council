<?php $__env->startSection('sidebar'); ?>
    <aside class="bg-grey-lightest p-6 pr-10 border-l border-r w-64">
        <div class="widget">
            <h4 class="widget-heading">Manage</h4>

            <ul class="list-reset text-sm">
                <li class="pb-3">
                    <a href="<?php echo e(route('admin.dashboard.index')); ?>" class="<?php echo e(Route::is('admin.dashboard.index') ? 'text-blue font-bold' : ''); ?>">Dashboard</a>
                </li>

                <li class="pb-3">
                    <a href="<?php echo e(route('admin.channels.index')); ?>" class="<?php echo e(Route::is('admin.channels.index') ? 'text-blue font-bold' : ''); ?>">Channels</a>
                </li>
            </ul>
        </div>
    </aside>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="py-6">
        <?php echo $__env->yieldContent('administration-content'); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>