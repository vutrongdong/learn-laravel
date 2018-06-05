<form action="<?php echo e(route('postFile')); ?>" method="post" enctype="multipart/form-data">
	<input type="file" name= 'MyFile'>
	<input type="submit">
	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
</form>