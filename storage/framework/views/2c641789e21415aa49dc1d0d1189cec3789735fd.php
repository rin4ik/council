 <?php $__env->startSection('content'); ?> <?php $__env->startSection('header'); ?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php $__env->stopSection(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default shadow">
				<div class="panel-heading">Create a New Thread</div>

				<div class="panel-body">
					<?php if (auth()->guard()->check()): ?>

					<form method="POST" action="/threads">
						<?php echo e(csrf_field()); ?>


						<div class="form-group">
							<label for="channel_id"> Choose a channel:</label>
							<select name="channel_id" id="channel_id" class="form-control" required>
								<option value="">choose one...</option>
								<?php $__currentLoopData = $channels; $__env->addLoop($__currentLoopData); foreach ($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($channel->id); ?>" <?php echo e(old('channel_id') == $channel->id ? 'selected' : ''); ?>><?php echo e($channel->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
							<div class="form-group <?php echo e($errors->has('channel_id') ? ' has-error' : ''); ?>">
								<p class="text-danger"><?php echo e($errors->first('channel_id')); ?></p>
							</div>
						</div>
						<div class="form-group">

							<label class="active" for="title">Title:</label>
							<input type="text" class="form-control" id="title" style="box-sizing:inherit" placeholder="Add a title" name="title" value="<?php echo e(old('title')); ?>"
							 required>
							<p class="text-danger"><?php echo e($errors->first('title')); ?></p>

						</div>
						<div class="form-group">
							<label for="body"> Body:</label>
							<wysiwyg name="body"></wysiwyg>
							<div class="form-group<?php echo e($errors->has('body') ? ' has-error' : ''); ?>">
								<p class="text-danger"><?php echo e($errors->first('body')); ?></p>
							</div>
						</div>
						<div class="g-recaptcha" data-sitekey="<?php echo e(config('services.recaptcha.key')); ?>"></div>
						<div class="form-group<?php echo e($errors->has('g-recaptcha-response') ? ' has-error' : ''); ?>">
							<p class="text-danger"><?php echo e($errors->first('g-recaptcha-response')); ?></p>
						</div>
						<div class="form-group">
							<button type="submit" class="btn caps btn-primary ">Publish</button>

						</div>
					</form>

					<?php endif; ?> <?php if (auth()->guard()->guest()): ?>
					<p class="text-center">Please
						<a href="<?php echo e(route('login')); ?>">sign in</a> to create a new thread</p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), ['__data', '__path']))->render(); ?>