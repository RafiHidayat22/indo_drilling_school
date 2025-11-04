<?php if($paginator->hasPages()): ?>
<div class="flex items-center justify-between">
    <div class="text-sm text-slate-600">
        Menampilkan <span class="font-semibold"><?php echo e($paginator->firstItem()); ?></span> sampai <span class="font-semibold"><?php echo e($paginator->lastItem()); ?></span> dari <span class="font-semibold"><?php echo e($paginator->total()); ?></span> artikel
    </div>
    <div class="flex space-x-2">
        
        <?php if($paginator->onFirstPage()): ?>
        <span class="px-3 py-2 bg-slate-100 text-slate-400 rounded-lg cursor-not-allowed pagination-btn">Previous</span>
        <?php else: ?>
        <a href="<?php echo e($paginator->previousPageUrl()); ?>" class="px-3 py-2 bg-slate-100 text-slate-700 rounded-lg hover:bg-slate-200 pagination-btn">Previous</a>
        <?php endif; ?>

        
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(is_string($element)): ?>
        <span class="px-4 py-2 bg-slate-100 text-slate-500 rounded-lg"><?php echo e($element); ?></span>
        <?php endif; ?>

        <?php if(is_array($element)): ?>
        <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($page == $paginator->currentPage()): ?>
        <span class="px-4 py-2 bg-purple-600 text-white rounded-lg font-medium pagination-btn active"><?php echo e($page); ?></span>
        <?php else: ?>
        <a href="<?php echo e($url); ?>" class="px-4 py-2 bg-slate-100 text-slate-700 rounded-lg hover:bg-slate-200 pagination-btn"><?php echo e($page); ?></a>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <?php if($paginator->hasMorePages()): ?>
        <a href="<?php echo e($paginator->nextPageUrl()); ?>" class="px-3 py-2 bg-slate-100 text-slate-700 rounded-lg hover:bg-slate-200 pagination-btn">Next</a>
        <?php else: ?>
        <span class="px-3 py-2 bg-slate-100 text-slate-400 rounded-lg cursor-not-allowed pagination-btn">Next</span>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?><?php /**PATH D:\laragon\www\indo_drilling_school\resources\views/pagination/custom.blade.php ENDPATH**/ ?>