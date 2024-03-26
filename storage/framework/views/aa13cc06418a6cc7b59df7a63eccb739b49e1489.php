<?php $__env->startSection('title', ' - Unauthorized'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid vh-100">
    <div class="align-content-center bg-light h-100 justify-content-center row">
        <div class="col-lg-6 tc">
        	<p class="mt50 f26 fwb">404 not found</p>
			<p class = "f26 fwb"> ~ Page not found ~ </ p>
			<p class = "f16 elHSM l15">
			Thank you for accessing the site. <br>
			The page you are looking for may have been moved or deleted.
			</p>			
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/dparking/resources/views/errors/404.blade.php ENDPATH**/ ?>