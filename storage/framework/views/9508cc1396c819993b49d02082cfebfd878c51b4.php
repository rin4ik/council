<nav class="bg-blue-darkest py-3">
    <div class="container mx-auto flex justify-between items-center text-blue-lightest pl-6">
        <div>
            <h1 class="font-normal text-2xl">
                <a href="/" class="text-blue-lightest flex items-center">
                    <?php echo $__env->make('svgs.logo', ['class' => 'mr-2'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo e(config('app.name', 'Council')); ?>

                </a>
            </h1>
        </div>

        <div class="flex" v-cloak>
            <div class="search-wrap rounded-full bg-blue-darkest w-10 cursor-pointer h-10 flex items-center justify-center mr-4 relative" @mouseover="search" @mouseout="searching = false">
                <form method="GET" action="/threads/search" v-show="searching">
                    <input type="text"
                           placeholder="Search for something..."
                           name="q"
                           ref="search"
                           class="search-input absolute pin-r pin-t h-full rounded bg-red-light border-none pl-6 pr-10 text-white">
                           <button type="submit">s</button>
                </form>

                <?php echo $__env->make('svgs.icons.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>

            <?php if(auth()->check()): ?>
                <user-notifications></user-notifications>

                
                <div>
                    <dropdown>
                        <div  slot="heading"
                             class="rounded-full bg-blue-darkest w-10 h-10 flex items-center justify-center cursor-pointer relative z-10"
                        >
                            <img src="<?php echo e(auth()->user()->avatar_path); ?>"
                                 alt="<?php echo e(auth()->user()->username); ?>"
                                 class="relative z-10 w-8  rounded-full">
                        </div>

                        <template class="bg-red-light" slot="links">
                            <li class="text-sm  pb-3">
                                <a class="link" href="<?php echo e(route('profile', Auth::user())); ?>">My Profile</a>
                            </li>

                            <?php if(Auth::user()->isAdmin()): ?>
                                <li class="text-sm pb-3">
                                    <a class="link" href="<?php echo e(route('admin.dashboard.index')); ?>">Admin</a>
                                </li>
                            <?php endif; ?>

                            <li class="text-sm">
                                <logout-button route="<?php echo e(route('logout')); ?>" class="link">Logout</logout-button>
                            </li>
                        </template>
                    </dropdown>
                </div>
            <?php endif; ?>
        </div>
    </div>
</nav>
