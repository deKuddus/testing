<?php $__env->startSection('content'); ?>
<div class="card" style="margin-bottom: 25px;">
	<div class="card-header bg-success text-white" style="cursor: pointer;">
		<h4>
			<strong>New Users</strong>
			<a class="btn btn-danger btn-sm" style="float: right" href="<?php echo e(url('manage-pin/customers')); ?>">Go Back</a>
		</h4>
	</div>
	<div class="card-body">

		<?php echo Form::open(['route' => 'customers.store',  'files'=> true, 'id'=>'create-form', 'class' => 'form-horizontal']); ?>


			<?php echo $__env->make('customer::users._form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<?php echo Form::close(); ?>


	</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\my-project\vpn\Modules/Customer\Resources/views/users/create.blade.php ENDPATH**/ ?>