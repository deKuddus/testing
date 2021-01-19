<?php $__env->startSection('content'); ?>
<div class="card" style="margin-bottom: 25px;">
    <div class="card-header bg-info text-white" style="cursor: pointer;">
        <h4>
            <?php if(isOptionPermitted('manage-ticket/tickets','create')): ?>
               <a class="btn btn-danger" style="float: right" href="<?php echo e(url('manage-ticket/tickets/create')); ?>"><i class=" fa fa-plus"></i>&nbsp;Create Tickets</a>
            <?php endif; ?>

        	<strong ><?php echo e($pageTitle); ?></strong>

        </h4>
    </div>
    <div class="card-body">
        <span id="datatable-export-file-name" style="display: none;"><?php echo e($pageTitle); ?></span>
        <table class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Reseller Name</th>
                    <th>Ticket Option</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Image</th>
                    <th>Ticket Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php if(isset($data)): ?>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="tr-<?php echo e($values->id); ?>">
                    <td style="width: 2%"><?php echo e($key+1); ?></td>
                    <td><a href="#"><?php echo e($values->reseller->name); ?></a></td>
                    <td><?php echo e($values->ticket_option); ?></td>
                    <td><?php echo e($values->name); ?></td>
                    <td><?php echo e($values->email); ?></td>
                    <td><?php echo e($values->subject); ?></td>
                   <td class="text-center">
                        <img src="<?php echo e(showImage($values,'ticket')); ?>" style="height: 50px">
                    </td>
                    
                    <td><?php if($values->status=='1'): ?> <a class="btn btn-success btn-sm">Solved</a> <?php else: ?> <a class="btn btn-warning btn-sm">Pending</a> <?php endif; ?></td>
                    <td class="text-center" style="width: 15%">
                        <a class="btn btn-sm btn-info" title="Show Full Message" href="<?php echo e(route('tickets.show',$values->id)); ?>"><i class="fa fa-eye text-white"></i></a>
                        <?php echo $__env->make('layouts.crudButtons',[
                            'text' => 'Tickets',
                            'object' => $values,
                            'link' => 'manage-ticket/tickets'
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
<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vpn\Modules/Reseller\Resources/views/ticket/index.blade.php ENDPATH**/ ?>