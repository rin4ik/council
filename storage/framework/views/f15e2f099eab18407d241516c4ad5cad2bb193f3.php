
<modal name="update-thread" height="auto" v-cloak>
    <div class=" p-6 py-8">
        <div class="mb-6 -mx-4">
            <div class="px-4 mb-6">
                <input type="text" class="w-full p-2 leading-normal" v-model="form.title">
                <span class="text-xs text-red" v-if="errors.title" v-text="errors.title[0]"></span>
            </div>

            <div class="px-4 mb-6">
                <wysiwyg v-model="form.body"></wysiwyg>
                <span class="text-xs text-red" v-if="errors.body" v-text="errors.body[0]"></span>
            </div>

            <div class="flex justify-between px-4">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $thread)): ?>
                    <form action="<?php echo e($thread->path()); ?>" method="POST" class="ml-a">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('DELETE')); ?>


                        <button type="submit" class="btn bg-red-light hover:bg-red">Delete Thread</button>
                    </form>
                <?php endif; ?>

                <div>
                    <button class="btn mr-2 hover:bg-red" @click="resetForm">Cancel</button>
                    <button class="btn bg-blue" @click="update">Update</button>
                </div>
            </div>
        </div>
    </div>
</modal>



<div class="">
    <div class="flex">
        <img src="<?php echo e($thread->creator->avatar_path); ?>"
             alt="<?php echo e($thread->creator->username); ?>"
             width="36"
             height="36"
             class="mr-1 rounded-full">

        <div class="flex-1 border-b border-grey-lighter pb-8 ml-4">
            <h1 class="text-blue mb-2 text-2xl font-normal -mt-1" v-text="title"></h1>

            <p class="text-xs text-grey-darker mb-4">
                Posted by <a href="<?php echo e(route('profile', $thread->creator)); ?>" class="text-red-light no-underline">
                    <?php echo e($thread->creator->username); ?> (<?php echo e($thread->creator->reputation); ?> XP)
                </a>

                <span v-if="! editing" v-cloak>
                    <span v-if="(authorize('isAdmin') || authorize('owns', thread))">
                        <a href="#" class="text-blue-darkest uppercase pl-2 ml-2 border-l border-green-lighter" @click.prevent="editing = true">Edit</a>

                        <span v-if="authorize('isAdmin')" v-cloak>
                            <a href="#" class="no-underline pl-2 ml-2 border-l border-purple-lighter uppercase" :class="locked ? 'font-bold text-red' : ''" @click.prevent="toggleLock" v-text="locked ? 'Unlock' : 'Lock'"></a>
                            <a href="#" class="no-underline pl-2 ml-2 border-l border-purple-lighter uppercase" :class="pinned ? 'font-bold text-red' : ''" @click.prevent="togglePin" v-text="pinned ? 'Unpin' : 'Pin'"></a>
                        </span>
                    </span>

                    <subscribe-button :active="<?php echo e(json_encode($thread->isSubscribedTo)); ?>" v-if="signedIn"></subscribe-button>
                </span>
            </p>

            <highlight :content="body"></highlight>
        </div>
    </div>
</div>
