<?php $__empty_1 = true; $__currentLoopData = $threads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thread): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="flex <?php echo e($loop->last ? '' : 'mb-6 pb-4'); ?>">
        <div class="mr-4">
            <img src="<?php echo e($thread->creator->avatar_path); ?>"
                     alt="<?php echo e($thread->creator->username); ?>"
                     class="w-8 h-8 border-solid rounded-full ">
        </div>

        <div class="flex-1 <?php echo e($loop->last ? '' : 'border-b border-blue-lightest'); ?>">
            <h3 class="text-xl font-normal mb-2 tracking-tight">
                <a href="<?php echo e($thread->path()); ?>" class="text-blue">
                    <?php if($thread->pinned): ?>
                        Pinned:
                    <?php endif; ?>

                    <?php if(auth()->check() && $thread->hasUpdatesFor(auth()->user())): ?>
                        <strong class="text  text-blue-darker mb-4">
                            <?php echo e($thread->title); ?>

                        </strong>
                    <?php else: ?>
                    <span class="text  text-blue-darker mb-4">
                        <?php echo e($thread->title); ?>

                        
                    </span>
                    <?php endif; ?>
                </a>
            </h3>

            <p class="text-2xs text-grey-darkest mb-4">
                Posted By: <a href="<?php echo e(route('profile', $thread->creator)); ?>" class="text-red-light"><?php echo e($thread->creator->username); ?></a>
            </p>

            <thread-view :thread="<?php echo e($thread); ?>" inline-template class="mb-6 text-grey-darkest leading-loose pr-8">
                <highlight :content="body"></highlight>
            </thread-view>

            <div class="flex items-center text-xs mb-6">
                <a class="btn bg-grey-lighter hover:bg-red-light text-grey-darkest py-2 px-3 mr-4 text-2xs flex items-center" href="/threads/<?php echo e($thread->channel->slug); ?>">
                    <span class="rounded-full h-2 w-2 mr-2 hover:bg-white" style="background: <?php echo e($thread->channel->color); ?>"></span>

                    <?php echo e(ucwords($thread->channel->name)); ?>

                </a>

                <span class="mr-2 flex items-center text-grey-darker text-2xs font-semibold mr-4">
                    <?php echo $__env->make('svgs.icons.eye', ['class' => 'mr-2'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo e($thread->visits); ?> visits
                </span>

                <a href="<?php echo e($thread->path()); ?>" class="mr-2 flex items-center text-grey-darker text-2xs font-semibold">
                    <?php echo $__env->make('svgs.icons.book', ['class' => 'mr-2'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo e($thread->replies_count); ?> <?php echo e(str_plural('reply', $thread->replies_count)); ?>

                </a>

                <a class="btn ml-auto is-outlined hover:bg-red-light text-grey-darkest py-2 text-xs" href="<?php echo e($thread->path()); ?>">read more</a>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <p>There are no relevant results at this time.</p>
<?php endif; ?>
