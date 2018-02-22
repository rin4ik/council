<?php if (auth()->check()): ?>
    <modal name="new-thread" height="auto" transition="slide" v-cloak>
        <form method="POST" action="/threads" class="p-6 py-8">
            <?php echo e(csrf_field()); ?>


            <div class="flex mb-6 -mx-4">
                <div class="flex-1 px-4">
                    <label for="title" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">Title</label>
                    <input type="text" class="w-full p-2 leading-normal" id="title" name="title" value="<?php echo e(old('title')); ?>" required>
                </div>

                <div class="flex-1 px-4">
                    <label for="channel_id" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">Channel</label>

                    <select name="channel_id" id="channel_id" class="block appearance-none w-full bg-white rounded-none border border-grey-light text-grey-darker py-2 px-4 leading-normal pr-8" required>
                        <option value="">Choose One...</option>

                        <?php $__currentLoopData = $channels; $__env->addLoop($__currentLoopData); foreach ($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($channel->id); ?>" <?php echo e(old('channel_id') == $channel->id ? 'selected' : ''); ?>>
                                <?php echo e($channel->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            <div class="mb-6">
                <wysiwyg name="body"></wysiwyg>
            </div>

            <div class="mb-6">
                <div class="g-recaptcha" data-sitekey="<?php echo e(config('services.recaptcha.key')); ?>"></div>
            </div>

            <div class="flex justify-end">
                <a href="#" class="btn mr-4 hover:bg-red" @click="$modal.hide('new-thread')">Cancel</a>
                <button type="submit" class="btn bg-green hover:bg-green-dark">Publish</button>
            </div>

            <?php if (count($errors)): ?>
                <ul class="alert alert-danger">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach ($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
        </form>
    </modal>
<?php endif; ?>
