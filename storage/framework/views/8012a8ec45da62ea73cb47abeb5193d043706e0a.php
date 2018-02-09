<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">

            <div class="col-md-2">
                <a class="list-group-item caps" role="presentation" href="<?php echo e(route('admin.dashboard.index')); ?>">Dashboard</a> 
            
                    <a class="list-group-item caps" role="presentation" href="<?php echo e(route('admin.channels.index')); ?>">Channels</a></li>
               
            </div>

            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-body shadow">
                        <?php echo $__env->yieldContent('administration-content'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), ['__data', '__path']))->render(); ?>