<?php $__env->startSection('content'); ?>
<div class="card" style="margin-bottom: 25px;">
    <div class="card-header bg-info text-white" style="cursor: pointer;">
        <h4>
        	<strong>Admins</strong>
            
            <?php if(isOptionPermitted('setups/admins','create')): ?>
        	   <a class="btn btn-success btn-sm" style="float: right" onclick="Show('New Admin','<?php echo e(url('setups/admins/create')); ?>')"><i class=" fa fa-plus"></i>&nbsp;New Admin</a>
            <?php endif; ?>
        </h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2 offset-md-5">
                <select class="form-control select2bs4" name="role_id" id="role_id" onchange="openLink('<?php echo e(url('setups/admins')); ?>/'+$('#role_id').val())">
                        <option value="0">All User Roles</option>
                        <?php if(isset($roles[0])): ?>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($role->id); ?>" <?php echo e($role_id==$role->id ? 'selected' : ''); ?>><?php echo e($role->name); ?></option>
                        </optgroup>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </select>
            </div>
        </div>
    </div>
    <div class="card-body">
        <span id="datatable-export-file-name" style="display: none;">Admins</span>
        <table class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>User Role</th>
                    <th>Gender</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php if(isset($admins[0])): ?>
            <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="tr-<?php echo e($admin->id); ?>">
                    <td style="width: 2%"><?php echo e($key+1); ?></td>
                    <td><?php echo e($admin->name); ?></td>
                    <td><?php echo e($admin->email); ?></td>
                    <td><?php echo e($admin->username); ?></td>
                    <td><?php echo e($admin->role ? $admin->role->name : ''); ?></td>
                    <td><?php echo e(genders()[$admin->gender]); ?></td>
                    <td class="text-center">
                        <img src="<?php echo e(adminImage($admin)); ?>" style="height: 50px">
                    </td>
                    <td class="text-center" style="width: 15%">
                        <div class="btn-group">
                            <?php if($admin->status=="1"): ?>
                                <a class="btn btn-sm btn-success"><i class="fa fa-check text-white"></i></a>
                            <?php else: ?>
                                <a class="btn btn-sm btn-danger"><i class="fa fa-ban text-white"></i></a>
                            <?php endif; ?>

                            <?php if($admin->id != auth()->user()->id): ?>
                                <?php if(isOptionPermitted('setups/admins','edit')): ?>
                                    <a class="btn btn-sm btn-info" onclick="Show('Edit Admin','<?php echo e(url('setups/admins/'.$admin->id.'/edit')); ?>')"><i class="fa fa-edit text-white"></i></a>
                                <?php endif; ?>

                                <?php if(isOptionPermitted('setups/admins','delete')): ?>
                                    <a class="btn btn-sm btn-danger" onclick="Delete('<?php echo e($admin->id); ?>','<?php echo e(url('setups/admins')); ?>')"><i class="fa fa-trash text-white"></i></a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\vpn\Modules/Setups\Resources/views/admins/index.blade.php ENDPATH**/ ?>