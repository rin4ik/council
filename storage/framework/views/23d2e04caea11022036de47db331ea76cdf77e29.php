<?php echo e(csrf_field()); ?>

<div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name', $channel->name)); ?>" required>
</div>

<div class="form-group">
    <label for="description">Description:</label>
    <input type="text" class="form-control" id="description" name="description" value="<?php echo e(old('description', $channel->description)); ?>" required>
</div>
<div class="form-group">
        <label for="archived">Status:</label>        
    <select class="form-control" name="archived" id="archived">
        <option value="0" <?php echo e($channel->archived ? '' : 'selected'); ?>>Active</option>
        <option value="1" <?php echo e($channel->archived ? 'selected' : ''); ?>>Archived</option>
    </select>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary"><?php echo e($buttonText ?? 'Add Channel'); ?></button>
</div>

<?php if(count($errors)): ?>
    <ul class="alert alert-danger">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php endif; ?>