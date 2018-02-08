 <?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">

		<div class="col-md-8">

			<?php echo $__env->make('threads._list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default shadow">
				<div class="panel-heading " style=" text-align:center">
					Search
				</div>

				<div class="panel-body ">
					<form method="GET" action="/threads/search">
						<input type="text" style="box-sizing:inherit;margin-bottom	:12px;" placeholder="Search for something..." class="form-control"
						 name="q" id="">
						<button type="submit" class="btn smth shadow btn-link">
						<i class="	
						" style="-webkit-text-stroke: 1px white;height:1px;" aria-hidden="true"></i> SEARCH
							
						</button>
					</form>
				</div>

			</div>

			<!--/.Card content-->

			<?php if(count($trending)): ?>
			<div class="panel panel-default shadow">
				<div class="panel-heading" style="text-align:center">
					Trending Threads
				</div>

				<ul class="list-group">
					<?php $__currentLoopData = $trending; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thread): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

					<li class="list-group-item">
						<a href="<?php echo e(url($thread->path)); ?>">
							<p><?php echo e($thread->title); ?></p>
						</a>
					</li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>

			</div>
			<?php endif; ?>



		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>