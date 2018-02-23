<?php $__env->startSection('administration-content'); ?>
    <p class="mb-8">
        <a class="btn bg-blue" href="<?php echo e(route('admin.channels.create')); ?>">
            New Channel <span class="glyphicon glyphicon-plus"></span>
        </a>
    </p>

    <table style="border-collapse: collapse">
        <thead class="bg-grey-lightest text-grey-darkest uppercase tracking-wide text-xs">
            <tr>
                <th class="p-4 border-b">Name</th>
                <th class="p-4 border-b">Slug</th>
                <th class="p-4 border-b">Description</th>
                <th class="p-4 border-b">Threads</th>
                <th class="p-4 border-b">Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $channels; $__env->addLoop($__currentLoopData); foreach ($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="border-b <?php echo e($channel->archived ? 'bg-red-lighter' : ''); ?>">
                    <td class="text-sm p-4 border-b"><?php echo e($channel->name); ?></td>
                    <td class="text-sm p-4 border-b"><?php echo e($channel->slug); ?></td>
                    <td class="text-sm p-4 border-b"><?php echo e($channel->description); ?></td>
                    <td class="text-sm p-4 border-b"><?php echo e($channel->threads_count); ?></td>
                    <td class="text-sm p-4 border-b">
                        <a href="<?php echo e(route('admin.channels.edit', $channel)); ?>" class="text-blue link text-sm">Edit</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td>Nothing here.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', array_except(get_defined_vars(), ['__data', '__path']))->render(); ?>