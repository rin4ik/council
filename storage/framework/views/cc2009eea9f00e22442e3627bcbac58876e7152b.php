<aside class="bg-grey-lightest p-6 pr-10 border-l border-r w-64">
    <?php echo $__env->yieldContent('sidebar-top'); ?>

    <div class="widget border-b-0">
        <?php if(auth()->check()): ?>
            <button class="btn bg-red-light hover:bg-red-dark" @click="$modal.show('new-thread')">Add New Thread</button>
        <?php else: ?>
            <button class="btn bg-red-light hover:bg-red-dark w-full tracking-wide" @click="$modal.show('login')">Log In To Post</button>
        <?php endif; ?>
    </div>

    <div class="widget">
        <h4 class="widget-heading">Browse</h4>

        <ul class="list-reset text-sm">
            <li class="pb-3">
                <a href="/threads" class="flex items-center text-grey-darkest hover:text-red-light hover:font-bold <?php echo e(Request::is('threads') && ! Request::query() ? 'text-red' : ''); ?>">
                    <?php echo $__env->make('svgs.icons.all-threads', ['class' => 'mr-3 text-blue-darkest'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    All Threads
                </a>
            </li>

            <?php if(auth()->check()): ?>
                <li class="pb-3">
                    <a href="/threads?by=<?php echo e(auth()->user()->username); ?>"
                       class="flex items-center text-grey-darkest hover:text-red-light hover:font-bold  <?php echo e(Request::query('by') ? 'text-red ' : ''); ?>"
                    >
                        <img src="<?php echo e(auth()->user()->avatar_path); ?>"
                             alt="<?php echo e(auth()->user()->username); ?>"
                             class="w-4 h-4 mr-3 bg-blue-darkest rounded-full p-1">

                        My Threads
                    </a>
                </li>
            <?php endif; ?>

            <li class="pb-3">
                <a href="/threads?popular=1" class="flex items-center text-grey-darkest hover:text-red-light hover:font-bold <?php echo e(Request::query('popular') ? 'text-red ' : ''); ?>">
                    <?php echo $__env->make('svgs.icons.star', ['class' => 'mr-3 text-blue-darkest'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    Popular Threads
                </a>
            </li>

            <li>
                <a href="/threads?unanswered=1" class="flex items-center text-grey-darkest hover:text-red-light hover:font-bold <?php echo e(Request::query('unanswered') ? 'text-red ' : ''); ?>">
                    <?php echo $__env->make('svgs.icons.question', ['class' => 'mr-3 text-blue-darkest'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    Unanswered Threads
                </a>
            </li>
        </ul>
    </div>

    <?php if(count($trending)): ?>
        <div class="widget">
            <h4 class="widget-heading">Trending</h4>

            <ul class="list-reset">
                <?php $__currentLoopData = $trending; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thread): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="pb-3 text-sm">
                        <a href="<?php echo e(url($thread->path)); ?>" class="hover:text-red-light no-underline text-grey-darkest">
                            <?php echo e($thread->title); ?>

                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
</aside>
