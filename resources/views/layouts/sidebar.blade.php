<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/ahpc logo png.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/ahpc logo png.png') }}" alt="" width="60%">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/ahpc logo png.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/ahpc logo png.png') }}" alt="" width="60%">
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
                <li class="menu-title"><span>@lang('translation.menu')</span></li>
                <li class="nav-item">
                    {{-- <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards"> --}}
                    <a class="nav-link menu-link" href="/dashboard">
                        <i class="las la-tachometer-alt"></i> <span>@lang('translation.dashboards')</span>
                    </a>
                    {{-- <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="dashboard" class="nav-link">@lang('Super-Admin')</a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-analytics" class="nav-link">@lang('translation.analytics')</a>
                            </li>


                            <li class="nav-item">
                                <a href="dashboard-job" class="nav-link">@lang('translation.job')</a>
                            </li>
                        </ul>
                    </div> --}}
                </li> <!-- end Dashboard Menu -->
                @if(\Auth::user()->role_id == 1)
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('institute') }}">
                        <i class='bx bxs-bank'></i> <span>@lang('Institutions')</span>
                    </a>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span>@lang('About')</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPages" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                        <i class="las la-pager"></i> <span>@lang('About')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPages">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/disciplines" class="nav-link">@lang('Disciplines')</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="#Council" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="Council">@lang('Council')
                                </a>
                                <div class="collapse menu-dropdown" id="Council">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">@lang('Patron')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">@lang('Chairman')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">@lang('Member')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">@lang('Staff')</a>
                                        </li>
                                    </ul>
                                </div>
                            </li> -->
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('overseas') }}" role="button">
                        <i class='bx bxs-school'></i> <span>@lang('Overseas AHPs')</span>
                    </a>
                </li>

                <li class="nav-item">
                 <a class="nav-link menu-link" href="/ahpc">
                    <i class="bx bxs-school"></i> <span>AHPs</span>
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('users') }}">
                    <i class="las la-tachometer-alt"></i> <span>Users</span>
                </a>
            </li>
                <li class="nav-item d-none">
                    <a class="nav-link menu-link" href="#student" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="student">
                        <i class='bx bxs-group'></i> <span>@lang('Students')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="student">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link">@lang('Pre-Graduation')</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">@lang('Graduation')</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item d-none">
                    <a class="nav-link menu-link" href="#sidebarCharts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCharts">
                        <i class='bx bxs-buildings'></i> <span>@lang('Affiliations')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarCharts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#accreditation" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="accreditation">@lang('Accreditation')
                                </a>
                                <div class="collapse menu-dropdown" id="accreditation">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">@lang('Landon Councils')</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">@lang('Coordinations')</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    {{-- <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards"> --}}

                </li>
                 <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('institutes.show') }}">
                        <i class="las la-tachometer-alt"></i> <span>Institute</span>
                    </a>

                    <a class="nav-link menu-link" href="{{ route('overseas.show') }}">
                        <i class="las la-tachometer-alt"></i> <span>Overseas</span>
                    </a>

                    <a class="nav-link menu-link" href="{{ route('polices.show') }}">
                        <i class="las la-tachometer-alt"></i> <span>Policy Category</span>
                    </a>
                    <a class="nav-link menu-link" href="{{ route('pages.show') }}">
                        <i class="las la-tachometer-alt"></i> <span>Pages</span>
                    </a>
                    <a class="nav-link menu-link" href="{{ route('blog.show') }}">
                        <i class="las la-tachometer-alt"></i> <span>Blogs</span>
                    </a>

                </li>

                <!--<li class="nav-item">-->
                <!--    <a href="#Council" class="nav-link" data-bs-toggle="collapse" role="button">@lang('Setting')-->
                <!--    </a>-->
                <!--    <div class="collapse menu-dropdown" id="Council">-->
                <!--        <ul class="nav nav-sm flex-column">-->
                <!--            <li class="nav-item">-->
                <!--                <a href="#" class="nav-link">@lang('Patron')</a>-->
                <!--            </li>-->
                <!--            <li class="nav-item">-->
                <!--                <a href="#" class="nav-link">@lang('Chairman')</a>-->
                <!--            </li>-->
                <!--            <li class="nav-item">-->
                <!--                <a href="#" class="nav-link">@lang('Member')</a>-->
                <!--            </li>-->
                <!--            <li class="nav-item">-->
                <!--                <a href="#" class="nav-link">@lang('Staff')</a>-->
                <!--            </li>-->
                <!--        </ul>-->
                <!--    </div>-->
                <!--</li>-->
                @endif

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
