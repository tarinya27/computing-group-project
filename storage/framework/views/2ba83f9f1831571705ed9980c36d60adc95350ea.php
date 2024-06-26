<?php $__env->startSection('content'); ?>
<div id="login-page">
    <div class="container-fluid vh-100">
        <div class="align-content-center h-100 justify-content-center row">
            <div class="col-lg-3 col-sm-12 py-4">
                <div class="login-card bg-light card shadow-lg">
                    <div class="card-header f20 font-weight-bold text-center"><?php echo e(__('application.login.admin_login')); ?></div>

                    <div class="card-body">
                        <form method="POST" id="loginForm" action="<?php echo e(route('login')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="form-group">
                                <label for="email" class="col-form-label text-md-right"><?php echo e(__('application.login.email_address')); ?></label>
                                <input id="email" type="email"
                                    class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email"
                                    value="<?php echo e(old('email') ? old('email') : (env('DEMO', false) ? env('ADMIN_EMAIL', NULL) : '')); ?>" placeholder="<?php echo e(__('application.login.email_address')); ?>" required autofocus>
                                <?php if($errors->has('email')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="password" class="text-md-right"><?php echo e(__('application.login.password')); ?></label>
                                <input id="password" type="password" value="<?php echo e(env('DEMO', false) ? env('ADMIN_PASSWORD', NULL) : ''); ?>" placeholder="*****"
                                    class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password"
                                    required>

                                <?php if($errors->has('password')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input m-1" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                    <label class="form-check-label" for="remember">
                                        <?php echo e(__('application.login.remember_me')); ?>

                                    </label>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="col-12 f18 btn btn-car">
                                    <?php echo e(__('application.login.login')); ?>

                                </button>
                                <?php if(env('DEMO', false)): ?>
                                <div class="pt-2 text-center text-danger"><?php echo e(__('application.login.just_click_the_above_button_to_login')); ?></div>
                                <div class="pt-3 text-center">
                                    <div class="btn btn-outline-twitter btn-xs btn-credential" data-email="<?php echo e(env('ADMIN_EMAIL', NULL)); ?>" data-password="<?php echo e(env('ADMIN_PASSWORD', NULL)); ?>">Admin Credential</div>
                                    <div class="btn btn-outline-twitter btn-xs btn-credential" data-email="<?php echo e(env('OPERATOR_EMAIL', NULL)); ?>" data-password="<?php echo e(env('OPERATOR_PASSWORD', NULL)); ?>">Operator Credential</div>
                                </div>
                                <?php endif; ?>

                                <?php if(Route::has('password.request')): ?>
                                <a class="btn btn-link text-car pl-lg-0 pt-3" href="<?php echo e(route('password.request')); ?>">
                                    <?php echo e(__('application.login.forgot_your_password')); ?>

                                </a>
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sysgator/park.systechsolution.us/resources/views/auth/login.blade.php ENDPATH**/ ?>