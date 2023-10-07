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

                        {{-- gallery --}}
                        <div class="nav-item">
                            <a class="nav-link " id="gallery-menu" href="{{ route('admin.gallery.index') }}" data-placement="left">
                                <i class="bi-image nav-icon"></i>
                                <span class="nav-link-title">{{ Str::headline('galeri') }}</span>
                            </a>
                        </div>
                        {{-- END gallery --}}

                        {{-- news --}}
                        <div class="nav-item">
                            <a class="nav-link " id="news-menu" href="{{ route('admin.news.index') }}" data-placement="left">
                                <i class="bi-newspaper nav-icon"></i>
                                <span class="nav-link-title">{{ Str::headline('news') }}</span>
                            </a>
                        </div>
                        {{-- END news --}}

                        {{-- history --}}
                        <div class="nav-item">
                            <a class="nav-link " id="history-menu" href="{{ route('admin.history.index') }}" data-placement="left">
                                <i class="bi-clock nav-icon"></i>
                                <span class="nav-link-title">{{ Str::headline('history') }}</span>
                            </a>
                        </div>
                        {{-- END history --}}

                        {{-- USER --}}
                        <div class="nav-item">
                            <a class="nav-link " id="family-menu" href="{{ route('admin.family.index') }}" data-placement="left">
                                <i class="bi-people nav-icon"></i>
                                <span class="nav-link-title">{{ Str::headline('keluarga') }}</span>
                            </a>
                        </div>
                        {{-- END USER --}}

                        {{-- USER --}}
                        <div class="nav-item">
                            <a class="nav-link " id="user-menu" href="{{ route('admin.user.index') }}" data-placement="left">
                                <i class="bi-person nav-icon"></i>
                                <span class="nav-link-title">{{ Str::headline('user') }}</span>
                            </a>
                        </div>
                        {{-- END USER --}}

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
