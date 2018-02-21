<div class="border-l border-r p-6 bg-white w-48">
    <div class="widget">
        <h4 class="widget-heading">Channels</h4>

        <ul class="list-reset">
            <?php $__currentLoopData = $channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="text-xs pb-3 flex">
                    <span class="rounded-full h-3 w-3 mr-2" style="background: <?php echo e($channel->color); ?>"></span>

                    <a href="<?php echo e(route('channels', $channel)); ?>" class="link">
                        <?php echo e(ucwords($channel->name)); ?>

                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
