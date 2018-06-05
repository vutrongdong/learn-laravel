<?php $__env->startSection('noidung'); ?>
<h2>PHP</h2>
<?php echo $tenkhoahoc; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>