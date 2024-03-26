<?php $__env->startSection('title', ' - User List'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid mb100">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <?php echo e(__('application.user.user_list')); ?>

                        <a class="btn btn-sm btn-info pull-right"
                            href="<?php echo e(route('user.create')); ?>"><?php echo e(__('application.user.create_new')); ?></a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="userDataTable" class="table table-borderd table-condenced w-100">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('application.table.serial')); ?></th>
                                        <th><?php echo e(__('application.user.name')); ?></th>
                                        <th><?php echo e(__('application.user.email_address')); ?></th>
                                        <th><?php echo e(__('application.user.role')); ?></th>
                                        <th><?php echo e(__('application.user.status')); ?></th>
                                        <th><?php echo e(__('application.table.option')); ?></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(assetz('js/user.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/dparking/resources/views/user/list.blade.php ENDPATH**/ ?>