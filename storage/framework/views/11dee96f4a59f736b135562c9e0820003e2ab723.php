<?php $__env->startSection('noidung'); ?>
<h2>Laravel</h2>







<?php echo e(isset($tenkhoahoc) ? $tenkhoahoc : 'không tồn tại biến khóa học '); ?>

<br>

<?php
$mang = array('php','laravel','javascript');
 ?>
 
 <?php if(!empty($mang)): ?>
	 <?php $__currentLoopData = $mang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php echo e($value); ?>

	 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php else: ?>
	<?php echo e('mảng rỗng '); ?>

 <?php endif; ?>
<br>

<?php $__empty_1 = true; $__currentLoopData = $mang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

	
	
	<?php if($value == 'laravel') break; ?>
	<?php echo e($value); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
	{{'mảng rỗng '}
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>