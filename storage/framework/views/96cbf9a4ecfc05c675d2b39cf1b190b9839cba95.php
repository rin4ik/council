 <?php $__env->startComponent('profiles.activities.activity'); ?> <?php $__env->slot('heading'); ?>
<i id="heart" class="fa fa-thumbs-o-up" aria-hidden="true"></i>

<a href="<?php echo e($activ->subject->favorited->path()); ?>" style="
     margin-left:2px;">
	<?php echo e($profileUser->name); ?> favorited a reply.
</a>

<?php $__env->endSlot(); ?> <?php $__env->slot('date'); ?> <?php echo e($activ->subject->created_at->diffForHumans()); ?> <?php $__env->endSlot(); ?> <?php $__env->slot('body'); ?> <?php echo $activ->subject->favorited->body; ?> <?php $__env->endSlot(); ?> <?php echo $__env->renderComponent(); ?>