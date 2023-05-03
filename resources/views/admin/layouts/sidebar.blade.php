@php
    $general = App\Models\General::first();
@endphp
<aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-white  ">
    <div class="navbar-vertical-container">
        <div class="navbar-vertical-footer-offset">
            <!-- Logo -->

            <a class="navbar-brand" href="{{ route('admin.home.index') }}" aria-label="Front">
                <img class="navbar-brand-logo" src="{{ asset('storage/' . $general->logo) }}" alt="Logo" data-hs-theme-appearance="default">
                <img class="navbar-brand-logo" src="{{ asset('storage/' . $general->logo_white) }}" alt="Logo" data-hs-theme-appearance="dark">
                <img class="navbar-brand-logo-mini" src="{{ asset('storage/' . $general->logo_short) }}" alt="Logo" data-hs-theme-appearance="default">
                <img class="navbar-brand-logo-mini" src="{{ asset('storage/' . $general->logo_short_white) }}" alt="Logo" data-hs-theme-appearance="dark">
            </a>

            <!-- End Logo -->

            <!-- Navbar Vertical Toggle -->
            <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
                <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
                <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
            </button>

            <!-- End Navbar Vertical Toggle -->

            <!-- Content -->
            <div class="navbar-vertical-content">
                <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">
                    {{-- DASHBOARD --}}
                    <div class="nav-item">
                        <a class="nav-link " id="home-menu" href="{{ route('admin.home.index') }}" data-placement="left">
                            <i class="total-visitors-page-views-chart-container-house-door nav-icon"></i>
                            <span class="nav-link-title">{{ Str::headline('Dashboard') }}</span>
                        </a>
                    </div>
                    {{-- END DASHBOARD --}}

                    <span class="dropdown-header mt-4">Pages</span>
                    <small class="total-visitors-page-views-chart-container-three-dots nav-subtitle-replacer"></small>

                    <!-- Collapse -->
                    <div class="navbar-nav nav-compact">

                    </div>
                    <div id="navbarVerticalMenuPagesMenu">
                        {{-- GENERAL --}}
                        <div class="nav-item">
                            <a class="nav-link " id="general-menu" href="{{ route('admin.general.index') }}" data-placement="left">
                                <i class="bi-gear nav-icon"></i>
                                <span class="nav-link-title">{{ Str::headline('general') }}</span>
                            </a>
                        </div>
                        {{-- END GENERAL --}}

                        <!-- STUCTURE -->
                        {{-- <div class="nav-item">
                            <a class="nav-link " id="structure-menu" href="{{ route('admin.structure.index') }}" data-placement="left">
                                <i class="bi-diagram-3 nav-icon"></i>
                                <span class="nav-link-title">{{ Str::headline('struktur') }}</span>
                            </a>
                        </div> --}}
                        <!-- STUCTURE -->

                        <!-- PRODUCT -->
                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle " id="product-menu-parent" href="#product-menu-childs" role="button" data-bs-toggle="collapse" data-bs-target="#product-menu-childs" aria-expanded="false" aria-controls="product-menu-childs">
                                <i class="bi-bag nav-icon"></i>
                                <span class="nav-link-title">{{ Str::headline('produk') }}</span>
                            </a>

                            <div id="product-menu-childs" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                                <a class="nav-link " href="{{ route('admin.product-category.index') }}" id="product-category-menu">{{ Str::headline('kategori') }}</a>
                                <a class="nav-link " href="{{ route('admin.product.index') }}" id="product-menu">{{ Str::headline('daftar produk') }}</a>
                            </div>
                        </div>
                        <!-- PRODUCT -->

                        {{-- TRAINING --}}
                        <div class="nav-item">
                            <a class="nav-link " id="training-menu" href="{{ route('admin.training.index') }}" data-placement="left">
                                <i class="bi-mortarboard nav-icon"></i>
                                <span class="nav-link-title">{{ Str::headline('pelatihan') }}</span>
                            </a>
                        </div>
                        {{-- END TRAINING --}}

                        <!-- BLOG -->
                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle " id="blog-menu-parent" href="#blog-menu-childs" role="button" data-bs-toggle="collapse" data-bs-target="#blog-menu-childs" aria-expanded="false" aria-controls="blog-menu-childs">
                                <i class="bi-newspaper nav-icon"></i>
                                <span class="nav-link-title">{{ Str::headline('blog') }}</span>
                            </a>

                            <div id="blog-menu-childs" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                                <a class="nav-link " href="{{ route('admin.blog-category.index') }}" id="blog-category-menu">{{ Str::headline('kategori') }}</a>
                                <a class="nav-link " href="{{ route('admin.blog.index') }}" id="blog-menu">{{ Str::headline('daftar blog') }}</a>
                            </div>
                        </div>
                        <!-- BLOG -->

                        <!-- ACTIVITY -->
                        <div class="nav-item">
                            <a class="nav-link " id="activity-menu" href="{{ route('admin.activity.index') }}" data-placement="left">
                                <i class="bi-clipboard-pulse nav-icon"></i>
                                <span class="nav-link-title">{{ Str::headline('kegiatan') }}</span>
                            </a>
                        </div>
                        <!-- ACTIVITY -->

                        <!-- ACTIVITY -->
                        <div class="nav-item">
                            <a class="nav-link " id="activity-menu" href="{{ route('admin.tutorial.index') }}" data-placement="left">
                                <i class="bi-camera-video nav-icon"></i>
                                <span class="nav-link-title">{{ Str::headline('E-learning') }}</span>
                            </a>
                        </div>
                        <!-- ACTIVITY -->

                        {{-- USER --}}
                        <div class="nav-item">
                            <a class="nav-link " id="user-menu" href="{{ route('admin.user.index') }}" data-placement="left">
                                <i class="bi-people nav-icon"></i>
                                <span class="nav-link-title">{{ Str::headline('user') }}</span>
                            </a>
                        </div>
                        {{-- END USER --}}

                        {{-- PAGE --}}
                        <div class="nav-item">
                            <a class="nav-link " id="page-menu" href="{{ route('admin.page.index') }}" data-placement="left">
                                <i class="bi-layout-text-sidebar nav-icon"></i>
                                <span class="nav-link-title">{{ Str::headline('halaman') }}</span>
                            </a>
                        </div>
                        {{-- END PAGE --}}

                    </div>
                    <!-- End Collapse -->
                </div>

            </div>
            <!-- End Content -->

            <!-- Footer -->
            <div class="navbar-vertical-footer">
                <ul class="navbar-vertical-footer-list">
                    <li class="navbar-vertical-footer-list-item">
                        <!-- Style Switcher -->
                        <div class="dropdown dropup">
                            <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="selectThemeDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>

                            </button>

                            <div class="dropdown-menu navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectThemeDropdown">
                                <a class="dropdown-item" href="#" data-icon="bi-moon-stars" data-value="auto">
                                    <i class="bi-moon-stars me-2"></i>
                                    <span class="text-truncate" title="Auto (system default)">Auto (system
                                        default)</span>
                                </a>
                                <a class="dropdown-item" href="#" data-icon="bi-brightness-high" data-value="default">
                                    <i class="bi-brightness-high me-2"></i>
                                    <span class="text-truncate" title="Default (light mode)">Default (light
                                        mode)</span>
                                </a>
                                <a class="dropdown-item active" href="#" data-icon="bi-moon" data-value="dark">
                                    <i class="bi-moon me-2"></i>
                                    <span class="text-truncate" title="Dark">Dark</span>
                                </a>
                            </div>
                        </div>

                        <!-- End Style Switcher -->
                    </li>
                </ul>
            </div>
            <!-- End Footer -->
        </div>
    </div>
</aside>
