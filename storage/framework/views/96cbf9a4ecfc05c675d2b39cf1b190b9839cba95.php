<?php $__env->startComponent('profiles.activities.activity'); ?>
    <?php $__env->slot('heading'); ?>
        <a href="<?php echo e($activity->subject->favorited->path()); ?>">
            <?php echo e($profileUser->username); ?> favorited a reply.
        </a>
    <?php $__env->endSlot(); ?>

    <?php $__env->slot('body'); ?>
        <?php echo $activity->subject->favorited->body; ?>

    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
