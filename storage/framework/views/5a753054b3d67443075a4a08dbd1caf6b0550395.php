<?php $__empty_1 = true; $__currentLoopData = $threads; $__env->addLoop($__currentLoopData); foreach ($__currentLoopData as $thread): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<div class="panel panel-default shadow">
	<div class="panel-heading" style="padding: 0px;
padding-left: 10px; padding-right:10px;">
		<div class="level">
			<h4 class="flex" style="margin: 6px; padding:4px; padding-left:0">
				<a href="<?php echo e($thread->path()); ?>">
			
					<?php if (auth()->check() && $thread->hasUpdatesFor(auth()->user())): ?>
					<p style="font-size:16px; margin: 5px;  color:rgb(16, 16, 16)"><?php echo e($thread->title); ?></p>
					<?php else: ?>
					<p style="font-size:16px;margin: 5px; color:rgb(80, 90, 96)"><?php echo e($thread->title); ?></p>
					<?php endif; ?>
				</a>

			</h4>
			<a href="<?php echo e($thread->path()); ?>" style="
                font-size: 15px;color:rgb(50, 50, 50)">
				<span><?php echo e($thread->replies_count); ?> <?php echo e(str_plural('reply', $thread->replies_count)); ?></span>
			</a>
			<?php if ($thread->pinned): ?>
			<span class="glyphicon glyphicon-pushpin pin" aria-hidden="true"></span>
											   <?php endif; ?>
		</div>

	</div>

	<div class="panel-body">
		<div class="body" style="margin: 5px;padding-left:2px"><?php echo $thread->body; ?></div>
		<div class="level" style="padding: 0;margin: 5px; background-color: white; float:right; padding-top:10px">
			posted by
			<a href="/profiles/<?php echo e($thread->creator->name); ?>" style="margin-left:3px;margin-right:3px ">
				<?php echo e($thread->creator->name); ?></a>
			<?php echo e($thread->created_at->diffForHumans()); ?>

		</div>
	</div>
	<div class="panel-footer" style="background-color:white">
		<?php echo e($thread->visits); ?> <?php echo e(str_plural('Visit', $thread->visits)); ?>

	</div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<p>There no relevant results at this time</p>
<?php endif; ?> <?php echo e($threads->render()); ?>