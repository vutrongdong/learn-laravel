<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="ÙT-8">
	<title>Laravel</title>
	
	<link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
<?php echo $__env->make('layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div id="content">
		<h1>Khóa Học</h1>
		
		<?php echo $__env->yieldContent('noidung'); ?>
	</div>
<?php echo $__env->make('layout.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>