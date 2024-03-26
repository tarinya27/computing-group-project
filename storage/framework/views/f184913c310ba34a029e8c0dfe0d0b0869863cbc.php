<?php if(auth()->guard()->check()): ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" id="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e($settings->site_title ? $settings->site_title : config('app.name', 'Demo Parking')); ?>

        <?php echo $__env->yieldContent('title'); ?>
    </title>
    <!-- plugins:js -->
    <script src="<?php echo e(asset('assets/vendors/js/vendor.bundle.base.js')); ?>"></script>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/mdi/css/materialdesignicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/css/vendor.bundle.base.css')); ?>">
    <!-- endinject -->

    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/font-awesome/css/font-awesome.min.css')); ?>" />
    <!-- End plugin css for this page -->
    <!-- datatable css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/datatable/dataTables.bootstrap4.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/datatable/buttons.bootstrap4.min.css')); ?>" />

    <!-- sweet-alert2 css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/sweet-alert2/sweetalert2.min.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/datepicker/jquery.datetimepicker.min.css')); ?>" />

    <!-- Layout styles -->
    <link rel="stylesheet" href="<?php echo e(assetz('assets/css/main/style.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(assetz('css/site.css')); ?>" />

    <!--  select 2  -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/select2.min.css')); ?>" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?php echo e(asset($settings->favicon)); ?>" />
    <?php echo $__env->yieldPushContent('css'); ?>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link d-block" href="<?php echo e(url('/')); ?>">
                        <img class="sidebar-brand-logo" src="<?php echo e(asset($settings->logo)); ?>" alt="" />
                    </a>
                </li>
                <li class="pt-2 pb-1">
                    <span class="nav-item-head"><?php echo e(__('application.moto.the_best_parking_solution')); ?></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('home')); ?>">
                        <i class="mdi mdi-compass-outline menu-icon"></i>
                        <span class="menu-title"><?php echo e(__('application.menu.dashboard')); ?></span>
                    </a>
                </li>
                <?php if(Auth::user()->hasRole('admin')): ?>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-user-management" aria-expanded="false"
                        aria-controls="ui-user-management">
                        <i class="mdi mdi-account menu-icon"></i>
                        <span class="menu-title"><?php echo e(__('application.menu.user')); ?></span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-user-management">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('user.create')); ?>"><?php echo e(__('application.menu.add_user')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('user.list')); ?>"><?php echo e(__('application.menu.user_list')); ?>

                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-place-management" aria-expanded="false"
                        aria-controls="ui-place-management">
                        <i class="mdi mdi-wrap-disabled menu-icon"></i>
                        <span class="menu-title"><?php echo e(__('application.menu.place')); ?></span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-place-management">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('places.create')); ?>"><?php echo e(__('application.menu.add_place')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('places.index')); ?>"><?php echo e(__('application.menu.place_list')); ?></a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-category" aria-expanded="false"
                        aria-controls="ui-category">
                        <i class="mdi mdi-tag-multiple menu-icon"></i>
                        <span class="menu-title"><?php echo e(__('application.menu.category')); ?></span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-category">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('category.create')); ?>"><?php echo e(__('application.menu.add_category')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('category.index')); ?>"><?php echo e(__('application.menu.category_list')); ?></a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-floor" aria-expanded="false"
                        aria-controls="ui-floor">
                        <i class="mdi mdi-layers menu-icon"></i>
                        <span class="menu-title"><?php echo e(__('application.menu.floor')); ?></span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-floor">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('floors.create')); ?>"><?php echo e(__('application.menu.add_floor')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('floors.index')); ?>"><?php echo e(__('application.menu.floor_list')); ?></a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-tariff" aria-expanded="false"
                        aria-controls="ui-tariff">
                        <i class="mdi mdi mdi-cash-multiple menu-icon"></i>
                        <span class="menu-title"><?php echo e(__('application.menu.tariff')); ?></span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-tariff">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('tariff.create')); ?>"><?php echo e(__('application.menu.add_tariff')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('tariff.index')); ?>"><?php echo e(__('application.menu.tariff_list')); ?></a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-parking-setup" aria-expanded="false"
                        aria-controls="ui-parking-setup">
                        <i class="mdi mdi mdi-home-map-marker menu-icon"></i>
                        <span class="menu-title"><?php echo e(__('application.menu.parking_setup')); ?></span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-parking-setup">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('parking_settings.create')); ?>"><?php echo e(__('application.menu.add_slot')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('parking_settings.index')); ?>"><?php echo e(__('application.menu.slot_list')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('parking_settings.rfid_vehicles.create')); ?>"><?php echo e(__('application.menu.add_rfid_vehicles')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('parking_settings.rfid_vehicles.index')); ?>"><?php echo e(__('application.menu.rfid_vehicles_list')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('parking_settings.rfid_vehicles.endpoint')); ?>"><?php echo e(__('application.menu.rfid_endpoint')); ?></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php endif; ?>
                <?php if(Auth::user()->hasRole(['admin', 'operator'])): ?>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-parking" aria-expanded="false"
                        aria-controls="ui-parking">
                        <i class="mdi mdi-car menu-icon"></i>
                        <span class="menu-title"><?php echo e(__('application.menu.parking')); ?></span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-parking">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('parking.create')); ?>"><?php echo e(__('application.menu.add_parking')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('parking.index')); ?>"><?php echo e(__('application.menu.all_parking_list')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('parking.current_list')); ?>"><?php echo e(__('application.menu.currnetly_parking_list')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('parking.ended_list')); ?>"><?php echo e(__('application.menu.ended_parking_list')); ?></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php endif; ?>
                <?php if(Auth::user()->hasRole('admin')): ?>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-report" aria-expanded="false"
                        aria-controls="ui-report">
                        <i class="mdi mdi mdi-home-map-marker menu-icon"></i>
                        <span class="menu-title"><?php echo e(__('application.menu.reports')); ?></span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-report">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('reports.summary')); ?>"><?php echo e(__('application.menu.summary_report')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('reports.details_report')); ?>"><?php echo e(__('application.menu.details_report')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('reports.slots_report')); ?>"><?php echo e(__('application.menu.slots_report')); ?></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-setting" aria-expanded="false"
                        aria-controls="ui-setting">
                        <i class="mdi mdi-brightness-7 menu-icon"></i>
                        <span class="menu-title"><?php echo e(__('application.menu.settings')); ?></span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-setting">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('settings.create')); ?>"><?php echo e(__('application.menu.global_setting')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('activation.active_form')); ?>"><?php echo e(__('application.menu.activation')); ?></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-language" aria-expanded="false"
                        aria-controls="ui-language">
                        <i class="mdi mdi-translate menu-icon"></i>
                        <span class="menu-title"><?php echo e(__('application.menu.language')); ?></span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-language">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('languages.create')); ?>"><?php echo e(__('application.menu.add_language')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('languages.index')); ?>"><?php echo e(__('application.menu.all_language')); ?></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('user.profile')); ?>">
                        <i class="mdi mdi-ticket-account menu-icon"></i>
                        <span class="menu-title"><?php echo e(__('application.menu.my_profile')); ?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:window.history.go(-1);">
                        <i class="mdi mdi-chevron-double-left menu-icon"></i>
                        <span class="menu-title"><?php echo e(__('application.menu.go_back')); ?></span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="navbar-menu-wrapper d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-chevron-double-left"></span>
                    </button>
                    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                        <a class="navbar-brand brand-logo-mini" href="<?php echo e(route('home')); ?>"><img
                                src="<?php echo e(asset($settings->logo)); ?>" alt="logo" /></a>
                    </div>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown d-none">
                            <a class="nav-link" id="messageDropdown" href="#" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-email-outline"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-left navbar-dropdown preview-list"
                                aria-labelledby="messageDropdown">
                                <h6 class="p-3 mb-0 font-weight-semibold"><?php echo e(__('Messages')); ?></h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <img src="#" alt="image" alt="" class="profile-pic">
                                    </div>
                                    <div
                                        class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="preview-subject ellipsis mb-1 font-weight-normal">
                                            <?php echo e(__('Mark send you a message')); ?></h6>
                                        <p class="text-gray mb-0"> <?php echo e(__('1 minutes ago')); ?></p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <h6 class="p-3 mb-0 text-center text-primary font-13">4 new messages</h6>
                            </div>
                        </li>
                        <li class="nav-item dropdown ms-3 d-none">
                            <a class="nav-link" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                                <i class="mdi mdi-bell-outline"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-left navbar-dropdown preview-list"
                                aria-labelledby="notificationDropdown">
                                <h6 class="px-3 py-3 font-weight-semibold mb-0">Notifications</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-success">
                                            <i class="mdi mdi-calendar"></i>
                                        </div>
                                    </div>
                                    <div
                                        class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="preview-subject font-weight-normal mb-0">New order recieved</h6>
                                        <p class="text-gray ellipsis mb-0"> 45 sec ago </p>
                                    </div>
                                </a>

                                <div class="dropdown-divider"></div>
                                <h6 class="p-3 font-13 mb-0 text-primary text-center">View all notifications</h6>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item nav-profile dropdown d-none d-md-block">
                            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <div class="nav-profile-text"><i
                                        class="mdi mdi-account-circle mb-1 position-relative t-2"></i><span><?php echo e(auth()->user()->name); ?></span>
                                </div>
                            </a>
                            <div class="dropdown-menu center navbar-dropdown" aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('user.profile')); ?>">
                                    <i class="mdi mdi-account-box me-3"></i> <?php echo e(__('application.menu.profile')); ?>

                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" id="logOut">
                                    <i class="mdi mdi-logout-variant me-3"></i> <?php echo e(__('application.menu.logout')); ?>

                                </a>
                                <form id="logout-form" class="d-none" action="<?php echo e(route('logout')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper pb-0">

                    <!-- first row starts here -->
                    <?php	
						$msg = session('flashMsg') ?? $flashMsg ?? null;
						if ($msg) {
					?>
                    <div class="d-none flashMessage">
                        <div id="msgType"><?php echo e($msg['type']); ?></div>
                        <div id="msg"><?php echo e($msg['msg']); ?></div>
                    </div>
                    <?php
						}
					?>
                    <?php echo $__env->yieldContent('content'); ?>

                    <!-- content-wrapper ends -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>

        <!-- container-scroller -->
        <!--datatable-->
        <script src="<?php echo e(asset('assets/js/datatable/jquery.dataTables.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/datatable/dataTables.bootstrap4.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/datatable/dataTables.buttons.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/datatable/buttons.bootstrap4.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/datatable/buttons.html5.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/datatable/buttons.print.min.js')); ?>"></script>

        <!-- sweet-alert2 css -->
        <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/sweet-alert2/sweetalert2.min.css')); ?>" />

        <!-- Plugin js for this page -->
        <script src="<?php echo e(assetz('js/app.js')); ?>"></script>
        <script type="text/javascript">
            Ziggy.url = "<?php echo e(url('/')); ?>";
                <?php if($_SERVER['SERVER_PORT'] != 80 || $_SERVER['SERVER_PORT'] != 443): ?>
                    Ziggy.port = <?php echo e($_SERVER['SERVER_PORT']); ?>;
                <?php endif; ?>
        </script>
        <script src="<?php echo e(asset('assets/vendors/chart.js/Chart.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/jquery.cookie.js')); ?>" type="text/javascript"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="<?php echo e(asset('assets/js/off-canvas.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/hoverable-collapse.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/misc.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/select2.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/settings.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/todolist.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendors/datepicker/jquery.datetimepicker.full.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendors/sweet-alert2/sweetalert2.all.min.js')); ?>"></script>
        <script src="<?php echo e(assetz('js/site.js')); ?>"></script>
        <?php echo $__env->yieldPushContent('scripts'); ?>
        <!-- endinject -->
        <!-- End custom js for this page -->
        <script>
            const currentPath = '<?php echo e(request()->path()); ?>';
        </script>
</body>

</html>
<?php endif; ?>
<?php if(auth()->guard()->guest()): ?>
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e($settings->site_title ? $settings->site_title : config('app.name', 'dParking')); ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset($settings->favicon)); ?>">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(assetz('assets/css/style.css')); ?>" />
    <link href="<?php echo e(assetz('css/public_site.css')); ?>" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="nav-bg">
            <div class="container">
                <a class="m-0 navbar-brand p-0 color-white" href="<?php echo e(url('/')); ?>">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                        </li>
                        <?php else: ?>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" id="guest-log-out">
                                    <?php echo e(__('Logout')); ?>

                                </a>
                                <form id="logout-form" class="d-none" action="<?php echo e(route('logout')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
    <script src="<?php echo e(asset('js/login.js')); ?>"></script>
</body>

</html>
<?php endif; ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/dparking/resources/views/layouts/app.blade.php ENDPATH**/ ?>