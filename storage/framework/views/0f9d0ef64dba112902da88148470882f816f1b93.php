<?php
	$links = explode('/',this_url());
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #222d32">
    
    <a href="<?php echo e(url('/')); ?>" class="brand-link" style="background: #05376d;color: white">
      <h4>VPN <?php echo e(strtoupper(auth::user()->role->name)); ?></h4>
    </a>

    <div class="sidebar half-a-second">
        <nav class="mt-2">
		  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		  <?php
		    $permissions = json_decode(auth()->user()->role->permissions);
		    $modules = false;
		    if(isset($permissions->modules) && is_array($permissions->modules)){
		    	$modules = \Modules\Setups\Entities\Module::where('status',1)
		    			->whereIn('id',$permissions->modules)
		    			->orderBy('serial','asc')
		    			->orderBy('name','asc')
		    			->get();
		    }
		  ?>

		  <?php if($modules && isset($modules[0])): ?>
		  <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		    <li class="nav-item has-treeview <?php echo e(isset($links[0]) && $module->route == $links[0] ? 'menu-open' : 'menu-open'); ?>">
		      <a style="cursor: pointer;color: white" class="nav-link">
		        <i class="nav-icon <?php echo e((!empty($module->icon) ? $module->icon : 'fas fa-chart-pie')); ?>"></i>
		        <p>
		          <?php echo e($module->name); ?>

		          <i class="right fas fa-angle-left"></i>
		        </p>
		      </a>
		      <?php
		        $menus = false;
		        if(is_array($permissions->menu)){
			      	$menus = \Modules\Setups\Entities\Menu::where(['module_id'=>$module->id,'status'=>1])
			    			->whereIn('id',$permissions->menu)
			    			->orderBy('serial','asc')
			    			->orderBy('name','asc')
			    			->get();
			    }
		      ?>
		      <?php if($menus && isset($menus[0])): ?>
		      <ul class="nav nav-treeview">
		        <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	            <?php
		            $submenus = false;
		            if(is_array($permissions->submenu)){
		            	$submenus = \Modules\Setups\Entities\Submenu::where(['menu_id'=>$menu->id,'status'=>1])
				    			->whereIn('id',$permissions->submenu)
				    			->orderBy('serial','asc')
				    			->orderBy('name','asc')
				    			->get();
		            }

		            $open = false;
		            if($submenus && isset($links[1]) && $submenus->where('route',$links[1])->count() > 0){
		            	$open = true;
		            }
		        ?>

		          <li class="nav-item <?php echo e((isset($menu->submenu[0])) ? 'has-treeview' : ''); ?>  <?php echo e($open ? 'menu-open' : ''); ?>">
		          <a <?php if($menu->route!='#'): ?> href="<?php echo e(url('/'.$module->route.'/'.$menu->route)); ?>" <?php else: ?> style="cursor: pointer;" <?php endif; ?> class="nav-link <?php echo e(isset($links[1]) && $links[1] == $menu->route ? 'bg-primary text-white text-bold' : ''); ?>">
		          	&nbsp;&nbsp;
		            <i class="nav-icon <?php echo e((!empty($menu->icon) ? $menu->icon : 'far fa-circle')); ?>"></i>
		            <p>
		              <?php echo e($menu->name); ?>

		              <?php echo (isset($menu->submenu[0])) ? '<i class="right fas fa-angle-left"></i>' : ''; ?>

		            </p>
		          </a>
		          <?php if($submenus && isset($submenus[0])): ?>
		          <ul class="nav nav-treeview">
		            <?php $__currentLoopData = $submenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		              <li class="nav-item">
		              <a href="<?php echo e(url('/'.$module->route.'/'.$submenu->route)); ?>" class="nav-link <?php echo e(isset($links[1]) && $links[1] == $submenu->route ? 'bg-primary text-white text-bold' : ''); ?>">
		              	&nbsp;&nbsp;&nbsp;&nbsp;
		                <i class="nav-icon <?php echo e((!empty($submenu->icon) ? $submenu->icon : 'far fa-dot-circle')); ?>"></i>
		                <p><?php echo e($submenu->name); ?></p>
		              </a>
		            </li>
		            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		          </ul>
		          <?php endif; ?>
		        </li>
		        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		      </ul>
		      <?php endif; ?>
		    </li>
		  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		  <?php endif; ?>
		    
		  </ul>
		</nav>
    </div>
    
  </aside><?php /**PATH C:\xampp\htdocs\vpn\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>