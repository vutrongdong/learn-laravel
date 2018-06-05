<form action="<?php echo e(route('postForm')); ?>" method="post">
	<input type="text" name='HoTen'>
	<input type="text" name="tuoi">
	<input type="submit">
	<?php echo e(csrf_field()); ?>

</form>