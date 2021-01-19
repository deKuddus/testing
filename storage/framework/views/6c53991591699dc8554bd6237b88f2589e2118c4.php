<?php $__env->startSection('content'); ?>
<div class="card" style="margin-bottom: 25px;">
    <div class="card-header bg-success text-white" style="cursor: pointer;">
        <h4>
        	<strong>Users</strong>

            <?php if(isOptionPermitted('manage-pin/customers','create')): ?>
        	   <a class="btn btn-danger btn-mini" style="float: right" href="<?php echo e(url('manage-pin/customers/create')); ?>"><i class=" fa fa-plus"></i>&nbsp;New Users</a>
            <?php endif; ?>
        </h4>
    </div>
    <div class="card-body">
        <span id="datatable-export-file-name" style="display: none;">Users</span>
        <table class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Reseller</th>
                    <th>Pacakge</th>
                    <th>Payment</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>User Name</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    
                   
                    <th>Billing System</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php if(isset($data)): ?>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="tr-<?php echo e($values->id); ?>">
                    <td style="width: 2%"><?php echo e($key+1); ?></td>
                    <td><?php echo e(isset($values->reseller_id)?$values->admin($values->reseller_id):auth()->user()->name); ?></td>
                    <td><?php echo e(isset($values->package_id)?$values->package->title:''); ?></td>
                    <td>
                        <?php if($values->billing_status=='unpaid'): ?>
                         <a href="#" class="btn btn-danger" title="unpaid">Un Paid</a>
                         <?php elseif($values->billing_status=='paid'): ?>
                         <a href="#" class="btn btn-success" title="paid">Paid</a>
                         <?php else: ?>
                         <a href="#" class="btn btn-warning" title="Not Assign">Not Assign</a>
                         <?php endif; ?>
                    </td>
                    <td><?php echo e($values->name); ?></td>
                    <td><?php echo e($values->email); ?></td>
                    <td><?php echo e($values->username); ?></td>
                    <td><?php echo e($values->mobile); ?></td>
                    <td><?php echo e($values->address); ?></td>
                    
                    
                    <td><?php echo e($values->billing_system); ?> Month</td>
                    <td class="text-center" style="width: 15%">
                        <?php echo $__env->make('layouts.crudButtons',[
                            'text' => 'Users',
                            'object' => $values,
                            'link' => 'manage-pin/customers'
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\my-project\vpn\Modules/Customer\Resources/views/users/index.blade.php ENDPATH**/ ?>