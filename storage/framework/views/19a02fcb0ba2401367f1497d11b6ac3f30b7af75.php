<?php $__env->startComponent('profiles.activities.activity'); ?>
    <?php $__env->slot('heading'); ?>
        <?php echo e($profileUser->username); ?> published
        <a href="<?php echo e($activity->subject->path()); ?>"><?php echo e($activity->subject->title); ?></a>
    <?php $__env->endSlot(); ?>

    <?php $__env->slot('body'); ?>
        <?php echo $activity->subject->body; ?>

    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
