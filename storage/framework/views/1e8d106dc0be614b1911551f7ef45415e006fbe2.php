<?php if($paginator->hasPages()): ?>
    <div class="text-center">
        <ul class="inline-flex w-48 list-reset border py-2 mt-4 mb-8 rounded">
            
            <?php if($paginator->onFirstPage()): ?>
                <li class="disabled flex-1 border-r"><span>&laquo;</span></li>
            <?php else: ?>
                <li class="flex-1 border-r"><a href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev" class="text-blue font-bold">&laquo;</a></li>
            <?php endif; ?>

            
            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <?php if(is_string($element)): ?>
                    <li class="disabled flex-1 border-r"><span><?php echo e($element); ?></span></li>
                <?php endif; ?>

                
                <?php if(is_array($element)): ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page == $paginator->currentPage()): ?>
                            <li class="active flex-1 font-bold border-r"><span><?php echo e($page); ?></span></li>
                        <?php else: ?>
                            <li class="flex-1 font-bold border-r"><a href="<?php echo e($url); ?>" class="text-blue"><?php echo e($page); ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
            <?php if($paginator->hasMorePages()): ?>
                <li class="flex-1"><a href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next" class="text-blue font-bold">&raquo;</a></li>
            <?php else: ?>
                <li class="disabled flex-1"><span>&raquo;</span></li>
            <?php endif; ?>
    </ul>
    </div>
<?php endif; ?>
