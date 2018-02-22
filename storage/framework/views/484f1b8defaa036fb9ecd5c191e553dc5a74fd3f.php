<nav class="text-xs py-3 pt-6 text-grey rounded rounded-b-none">
    <ol class="list-reset flex">
        <li>
            <?php if(Route::is('threads') && empty(Request::query())): ?>
               <strong class="text-black">
                    All Threads </strong> 
            <?php else: ?>
                <a href="<?php echo e(route('threads')); ?>" class="text-black">All Threads</a>
            <?php endif; ?>
        </li>

        <?php if(Route::is('search.show')): ?>
            <li><span class="mx-2">&#10095;</span></li>
            <li>Search</li>
        <?php endif; ?>

        <?php if(Route::is('channels')): ?>
            <li><span class="mx-2 text-red-light" >&#10095;</span></li>
            <li class="text-grey-darkest"><?php echo e(ucwords($channel->name)); ?></li>
        <?php endif; ?>

        <?php if(request()->has('popular')): ?>
            <li><span class="mx-2 text-red-light">&#10095;</span></li>
            <li class="text-grey-darkest">Popular</li>
        <?php endif; ?>

        <?php if(request()->has('unanswered')): ?>
            <li><span class="mx-2 text-red-light">&#10095;</span></li>
            <li class="text-grey-darkest">Unanswered</li>
        <?php endif; ?>

        <?php if(Route::is('threads.show')): ?>
            <li><span class="mx-2 text-red-light">&#10095;</span></li>
            <li>
                <a href="<?php echo e(route('channels', $thread->channel)); ?>" class="text-black">
                    <?php echo e(ucwords($thread->channel->name)); ?>

                </a>
            </li>

            <li><span class="mx-2 text-red-light">&#10095;</span></li>
            <li class="text-grey-darkest"><?php echo e($thread->title); ?></li>
        <?php endif; ?>
    </ol>
</nav>
