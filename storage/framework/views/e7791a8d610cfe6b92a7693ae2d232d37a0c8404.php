<?php $__env->startSection('content'); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-xl-8 stretch-card grid-margin">
			<div class="card">
				<div class="card-body">
					<div class="d-flex justify-content-between flex-wrap mb-3">
						<div>
							<div class="card-title mb-0"><?php echo e(__('application.dashboard.month_wise_collection')); ?></div>
							<span class="font-10 font-weight-semibold text-muted"><?php echo e($data['lineChart']['dateFrom'].' -
								'.$data['lineChart']['dateTo']); ?></span>
						</div>
						<div>
							<div class="d-flex flex-wrap pt-2 justify-content-between sales-header-right">
								<div class="d-flex me-3 mt-2 mt-sm-0">
									<button type="button" class="btn btn-social-icon btn-outline-sales profit">
										<i class="mdi mdi-cash text-info"></i>
									</button>
									<div class="ps-2">
										<h4 class="mb-0 font-weight-semibold head-count"> <?php echo e($data['lineChart']['totalAmount']); ?> </h4>
										<span class="font-10 font-weight-semibold text-muted"><?php echo e(__('application.dashboard.total')); ?> <?php echo e($data['lineChart']['dateFrom'].' - '.$data['lineChart']['dateTo']); ?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="line-chart-wrapper">
						<canvas id="linechart" height="80"></canvas>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 grid-margin">
			<div class="card stretch-card mb-3 <?php echo e(auth()->user()->hasRole('admin') ? '' : 'd-none'); ?>">
				<div
					class="card-body <?php echo e(auth()->user()->hasRole('admin') ? 'dashboard-right-card' : 'dashboard-right-sm-card'); ?> d-flex flex-wrap justify-content-between">
					<form class="w-100" id="placeChangeForm" action="" method="get">
						<div class="form-group mb-0 w-100">
							<label for="status"
								class="col-form-label f-12 fw-bold pb-2 pt-0 text-md-right text-primary"><?php echo e(__('application.dashboard.change_place')); ?></label>
							<select name="place_id" id="place_id" class="form-control">
								<option value="">All place</option>
								<?php $__currentLoopData = $data['places']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $place): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option <?php echo e(app('request')->input('place_id') == $place->id ? 'selected' : ''); ?> value="<?php echo e($place->id); ?>"><?php echo e($place->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
					</form>
				</div>
			</div>
			<div class="card stretch-card mb-3">
				<div
					class="card-body <?php echo e(auth()->user()->hasRole('admin') ? 'dashboard-right-card' : 'dashboard-right-sm-card'); ?> d-flex flex-wrap justify-content-between">
					<div>
						<h4 class="font-weight-semibold mb-1 text-success"> <?php echo e(__('application.dashboard.daily_collection')); ?> </h4>
						<h6 class="text-muted"><?php echo e(now()->format('d F Y')); ?></h6>
					</div>
					<h3 class="text-success font-weight-bold"><?php echo e($data['today_amount']); ?></h3>
				</div>
			</div>
			<div class="card stretch-card mb-3">
				<div
					class="card-body <?php echo e(auth()->user()->hasRole('admin') ? 'dashboard-right-card' : 'dashboard-right-sm-card'); ?> d-flex flex-wrap justify-content-between">
					<div>
						<h4 class="font-weight-semibold mb-1 text-behance"> <?php echo e(__('application.dashboard.monthly_collection')); ?> </h4>
						<h6 class="text-muted"><?php echo e(now()->format('F Y')); ?></h6>
					</div>
					<h3 class="text-behance font-weight-bold"><?php echo e($data['this_month_amount']); ?></h3>
				</div>
			</div>
			<div class="card mt-3">
				<div
					class="card-body <?php echo e(auth()->user()->hasRole('admin') ? 'dashboard-right-card' : 'dashboard-right-sm-card'); ?> d-flex flex-wrap justify-content-between">
					<div>
						<h4 class="font-weight-semibold mb-1 text-facebook"> <?php echo e(__('application.dashboard.yearly_collection')); ?> </h4>
						<h6 class="text-muted"><?php echo e(now()->format('Y')); ?></h6>
					</div>
					<h3 class="text-facebook font-weight-bold"><?php echo e($data['this_year_amount']); ?></h3>
				</div>
			</div>
		</div>
		<div class="col-xl-4 grid-margin">
			<div class="card stretch-card mb-3">
				<div class="card-body dashboard-left-card d-flex flex-wrap justify-content-between">
					<div>
						<h4 class="font-weight-semibold mb-1 text-success"> <?php echo e(__('application.dashboard.total_slots')); ?> </h4>
						<h6 class="text-muted"><?php echo e(__('application.dashboard.slots_in_all_category')); ?></h6>
					</div>
					<h3 class="text-success font-weight-bold"><?php echo e($data['total_slots']); ?></h3>
				</div>
			</div>
			<div class="card stretch-card mb-3">
				<div class="card-body dashboard-left-card d-flex flex-wrap justify-content-between">
					<div>
						<h4 class="font-weight-semibold mb-1 text-behance"><?php echo e(__('application.dashboard.currently_parking')); ?></h4>
						<h6 class="text-muted"><?php echo e(__('application.dashboard.booked_slots')); ?></h6>
					</div>
					<h3 class="text-behance font-weight-bold"><?php echo e($data['currently_parking']); ?></h3>
				</div>
			</div>
			<div class="card mt-3">
				<div class="card-body dashboard-left-card d-flex flex-wrap justify-content-between">
					<div>
						<h4 class="font-weight-semibold mb-1 text-facebook"> <?php echo e(__('application.dashboard.available_slots')); ?> </h4>
						<h6 class="text-muted"><?php echo e(__('application.dashboard.currently_available')); ?></h6>
					</div>
					<h3 class="text-facebook font-weight-bold"><?php echo e($data['total_slots'] - $data['currently_parking']); ?>

					</h3>
				</div>
			</div>
		</div>
		<div class="col-xl-8 stretch-card grid-margin">
			<div class="card">
				<div class="card-body">
					<div class="d-flex justify-content-between flex-wrap mb-3">
						<div>
							<div class="card-title mb-0"><?php echo e(__('application.dashboard.slots')); ?></div>
							<span class="font-10 font-weight-semibold text-muted"><?php echo e(__('application.dashboard.total_allocation')); ?> <?php echo e($data['total_slots']); ?></span>
						</div>
						<div>
							<div class="d-flex flex-wrap pt-2 justify-content-between sales-header-right">
								<div class="d-flex me-5">
									<div class="ps-2">
										<h4 class="mb-0 font-weight-semibold head-count free-box bg-available"></h4>
										<span class="font-10 font-weight-semibold text-muted"><?php echo e(__('application.dashboard.available')); ?></span>
									</div>
								</div>
								<div class="d-flex me-3 mt-2 mt-sm-0">
									<div class="ps-2">
										<h4 class="mb-0 font-weight-semibold head-count free-box bg-booked"></h4>
										<span class="font-10 font-weight-semibold text-muted"><?php echo e(__('application.dashboard.booked')); ?></span>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="bar-chart-wrapper">
						<canvas id="barchart" height="80"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
	var barChartLabel = <?php echo json_encode($data['barChart']['labels'], 15, 512) ?>;
	var lineChartAvailableData = <?php echo json_encode($data['barChart']['availableData'], 15, 512) ?>;
	var lineChartBookedData = <?php echo json_encode($data['barChart']['bookedData'], 15, 512) ?>;
	var lineChartLabel = <?php echo json_encode($data['lineChart']['labels'], 15, 512) ?>;
	var lineChartData = <?php echo json_encode($data['lineChart']['data'], 15, 512) ?>;
</script>
<script src="<?php echo e(assetz('js/custom/dashboard/home.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/dparking/resources/views/home.blade.php ENDPATH**/ ?>