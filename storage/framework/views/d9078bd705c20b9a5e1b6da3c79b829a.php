<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('build/images/ahpc logo png.png')); ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('build/images/ahpc logo png.png')); ?>" alt="" width="60%">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('build/images/ahpc logo png.png')); ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('build/images/ahpc logo png.png')); ?>" alt="" width="60%">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span><?php echo app('translator')->get('translation.menu'); ?></span></li>
                <li class="nav-item">
                    
                    <a class="nav-link menu-link" href="/dashboard">
                        <i class="las la-tachometer-alt"></i> <span><?php echo app('translator')->get('translation.dashboards'); ?></span>
                    </a>
                    
                </li> <!-- end Dashboard Menu -->
                <?php if(\Auth::user()->role_id == 1): ?>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php echo e(route('institute')); ?>">
                        <i class='bx bxs-bank'></i> <span><?php echo app('translator')->get('Institutions'); ?></span>
                    </a>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span><?php echo app('translator')->get('About'); ?></span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPages" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                        <i class="las la-pager"></i> <span><?php echo app('translator')->get('About'); ?></span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPages">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/disciplines" class="nav-link"><?php echo app('translator')->get('Disciplines'); ?></a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="#Council" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="Council"><?php echo app('translator')->get('Council'); ?>
                                </a>
                                <div class="collapse menu-dropdown" id="Council">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link"><?php echo app('translator')->get('Patron'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link"><?php echo app('translator')->get('Chairman'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link"><?php echo app('translator')->get('Member'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link"><?php echo app('translator')->get('Staff'); ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </li> -->
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php echo e(route('overseas')); ?>" role="button">
                        <i class='bx bxs-school'></i> <span><?php echo app('translator')->get('Overseas AHPs'); ?></span>
                    </a>
                </li>
                
                <li class="nav-item">
                 <a class="nav-link menu-link" href="/ahpc">
                    <i class="bx bxs-school"></i> <span>AHPs</span>
                </a>
                </li>
                
                
                <li class="nav-item d-none">
                    <a class="nav-link menu-link" href="#student" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="student">
                        <i class='bx bxs-group'></i> <span><?php echo app('translator')->get('Students'); ?></span>
                    </a>
                    <div class="collapse menu-dropdown" id="student">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link"><?php echo app('translator')->get('Pre-Graduation'); ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link"><?php echo app('translator')->get('Graduation'); ?></a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item d-none">
                    <a class="nav-link menu-link" href="#sidebarCharts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCharts">
                        <i class='bx bxs-buildings'></i> <span><?php echo app('translator')->get('Affiliations'); ?></span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarCharts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#accreditation" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="accreditation"><?php echo app('translator')->get('Accreditation'); ?>
                                </a>
                                <div class="collapse menu-dropdown" id="accreditation">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link"><?php echo app('translator')->get('Landon Councils'); ?></a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link"><?php echo app('translator')->get('Coordinations'); ?></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    
                    <a class="nav-link menu-link" href="<?php echo e(route('users')); ?>">
                        <i class="las la-tachometer-alt"></i> <span>Users</span>
                    </a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php echo e(route('settings')); ?>">
                        <i class="las la-tachometer-alt"></i> <span>Setting</span>
                    </a>
                </li> 

                <!--<li class="nav-item">-->
                <!--    <a href="#Council" class="nav-link" data-bs-toggle="collapse" role="button"><?php echo app('translator')->get('Setting'); ?>-->
                <!--    </a>-->
                <!--    <div class="collapse menu-dropdown" id="Council">-->
                <!--        <ul class="nav nav-sm flex-column">-->
                <!--            <li class="nav-item">-->
                <!--                <a href="#" class="nav-link"><?php echo app('translator')->get('Patron'); ?></a>-->
                <!--            </li>-->
                <!--            <li class="nav-item">-->
                <!--                <a href="#" class="nav-link"><?php echo app('translator')->get('Chairman'); ?></a>-->
                <!--            </li>-->
                <!--            <li class="nav-item">-->
                <!--                <a href="#" class="nav-link"><?php echo app('translator')->get('Member'); ?></a>-->
                <!--            </li>-->
                <!--            <li class="nav-item">-->
                <!--                <a href="#" class="nav-link"><?php echo app('translator')->get('Staff'); ?></a>-->
                <!--            </li>-->
                <!--        </ul>-->
                <!--    </div>-->
                <!--</li>-->
                <?php endif; ?>
               
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
<?php /**PATH /home/admin/public_html/ahpc.smarttechnologyhouse.net/resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>