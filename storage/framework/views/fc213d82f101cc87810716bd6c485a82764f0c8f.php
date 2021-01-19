<?php
	$url=this_url();
	$links=explode('/',$url);
?>

<?php if(isset($links[0]) && getModule($links[0])): ?>
	<li class="breadcrumb-item"><?php echo e(getModule($links[0])->name); ?></li>
<?php endif; ?>

<?php if(isset($links[1])): ?>
	<?php if(getMenu($links[1])): ?>
		<li class="breadcrumb-item active"><a href="<?php echo e(url($links[0].'/'.$links[1])); ?>"><?php echo e(getMenu($links[1])->name); ?></a></li>
	<?php elseif(getSubmenu($links[1])): ?>
		<li class="breadcrumb-item"><?php echo e(getSubmenu($links[1])->menu->name); ?></li>
		<li class="breadcrumb-item active"><a href="<?php echo e(url($links[0].'/'.$links[1])); ?>"><?php echo e(getSubmenu($links[1])->name); ?></a></li>
	<?php endif; ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\vpn\resources\views/layouts/where.blade.php ENDPATH**/ ?>