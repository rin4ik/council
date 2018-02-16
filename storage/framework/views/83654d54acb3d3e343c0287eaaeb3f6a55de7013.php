<?php $__env->startSection('administration-content'); ?>

        <p><a class="btn btn-sm btn-default" href="<?php echo e(route('admin.channels.create')); ?>">New Channel <span class="glyphicon glyphicon-plus"></span></a></p>
    
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>Description</th>
                <th>Threads</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="<?php echo e($channel->archived?'danger':''); ?>">
                    <td><?php echo e($channel->name); ?></td>
                    <td><?php echo e($channel->slug); ?></td>
                    <td><?php echo e($channel->description); ?></td>
                    <td><?php echo e($channel->threads_count); ?></td>
                                        <td>
                                           <a href="<?php echo e(route('admin.channels.edit', ['channel' => $channel->slug])); ?>" class="btn btn-default btn-xs">Edit</a>
                                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td>Nothing <here class=""></here></td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>