<?php if(session()->has('success')): ?>
<div class="container" style="margin-top: 25px">
    <div class="row">
	    <div class="col-md-12">
			<div class="alert alert-success alert-dismissible">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <?php echo session()->get('success'); ?>

			</div>
		</div>
	</div>
</div>
<?php endif; ?>

<?php if(session()->has('danger')): ?>
<div class="container" style="margin-top: 25px">
    <div class="row">
    	<div class="col-md-12">
			<div class="alert alert-danger alert-dismissible">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <?php echo session()->get('error'); ?>

			</div>
		</div>
	</div>
</div>
<?php endif; ?>

<?php if($errors->any()): ?>
<div class="container" style="margin-top: 25px">
    <div class="row">
    	<div class="col-md-12">
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<ul>
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li><?php echo e($error); ?></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\vpn\resources\views/errors/message.blade.php ENDPATH**/ ?>