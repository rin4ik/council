<?php echo e(csrf_field()); ?>

<div class="mb-4">
    <label for="name" class="tracking-wide uppercase text-grey-dark text-xs block pb-2">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name', $channel->name)); ?>" required>
</div>

<div class="mb-4">
    <label for="description" class="tracking-wide uppercase text-grey-dark text-xs block pb-2">Description</label>
    <input type="text" class="form-control" id="description" name="description" value="<?php echo e(old('description', $channel->description)); ?>" required>
</div>

<div class="mb-4">
    <label for="archived" class="tracking-wide uppercase text-grey-dark text-xs block pb-2">Status</label>

    <select name="archived" id="archived" class="form-control">
        <option value="0" <?php echo e(old('archived', $channel->archived) ? '' : 'selected'); ?>>Active</option>
        <option value="1" <?php echo e(old('archived', $channel->archived) ? 'selected' : ''); ?>>Archived</option>
    </select>
</div>

<div class="mb-4">
    <button type="submit" class="btn bg-blue"><?php echo e($buttonText ?? 'Add Channel'); ?></button>
</div>

<?php if(count($errors)): ?>
    <ul class="alert alert-danger">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php endif; ?>
