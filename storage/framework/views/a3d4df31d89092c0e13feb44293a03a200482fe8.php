 <?php $__env->startSection('header'); ?>
<link rel="stylesheet" href="/css/vendor/jquery.atwho.css"> <?php $__env->stopSection(); ?> <?php $__env->startSection('content'); ?>
<thread-view :thread="<?php echo e($thread); ?>" inline-template>
	<div class="container">
		<div class="row">
			<div class="col-md-8" v-cloak>
				<?php echo $__env->make('threads._question', array_except(get_defined_vars(), ['__data', '__path']))->render(); ?>

				<replies @added="repliesCount++" @removed="repliesCount--"></replies>
			</div>
			<div class="col-md-4" v-cloak>

				<div class="panel panel-default shadow">
					<img src="<?php echo e(asset('img/tab.jpg')); ?>" class="shadow" alt="" width="358px" style="position:inherit">
					<div class="panel-body">

						<p>
							This thread was published <?php echo e($thread->created_at->diffForHumans()); ?> by
							<a href="<?php echo e(route('profile', $thread->creator)); ?>"><?php echo e($thread->creator->name); ?></a>, and currently has
							<span v-text="repliesCount"></span> <?php echo e(str_plural('comment', $thread->replies_count)); ?>

						</p>

						<p>
							<subscribe-button v-if="signedIn" :active="<?php echo e(json_encode($thread->isSubscribedTo)); ?>"></subscribe-button>
							<button v-if="authorize('isAdmin')" class="btn btn-danger" @click="toggleLock" v-text="locked? 'UNLOCK'   : 'LOCK'">
							</button>
							<button class="btn btn-default"
							                                        v-if="authorize('isAdmin')"
							                                        @click="togglePin"
							                                       v-text="pinned ? 'UNPIN' : 'PIN'"></button>

						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</thread-view>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), ['__data', '__path']))->render(); ?>