 <?php $__env->startComponent('profiles.activities.activity'); ?> <?php $__env->slot('heading'); ?>
<i class="glyphicon glyphicon-share-alt" aria-hidden="true" style="margin-right:2px;"> </i>


<?php echo e($profileUser->name); ?> replied to
<a href="<?php echo e($activ->subject->thread->path()); ?>"><?php echo e($activ->subject->thread->title); ?></a>

<?php $__env->endSlot(); ?> <?php $__env->slot('date'); ?> <?php echo e($activ->subject->created_at->diffForHumans()); ?> <?php $__env->endSlot(); ?> <?php $__env->slot('body'); ?> <?php echo $activ->subject->body; ?> <?php $__env->endSlot(); ?> <?php echo $__env->renderComponent(); ?>