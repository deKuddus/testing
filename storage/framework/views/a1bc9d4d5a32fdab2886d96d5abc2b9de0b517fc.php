<div class="btn-group">
	<?php if($object->status=="1"): ?>
		<a class="btn btn-sm btn-success"><i class="fa fa-check text-white"></i></a>
	<?php else: ?>
		<a class="btn btn-sm btn-danger"><i class="fa fa-ban text-white"></i></a>
	<?php endif; ?>
	
	<?php if(isOptionPermitted($link,'edit')): ?>
		<a class="btn btn-sm btn-info" onclick="Show('Edit <?php echo e($text); ?>','<?php echo e(url($link.'/'.$object->id.'/edit')); ?>')"><i class="fa fa-edit text-white"></i></a>
	<?php endif; ?>
	
	<?php if(isOptionPermitted($link,'delete')): ?>
		<a class="btn btn-sm btn-danger" onclick="Delete('<?php echo e($object->id); ?>','<?php echo e(url($link)); ?>')"><i class="fa fa-trash text-white"></i></a>
	<?php endif; ?>
</div><?php /**PATH D:\my-project\vpn\resources\views/layouts/crudButtons.blade.php ENDPATH**/ ?>