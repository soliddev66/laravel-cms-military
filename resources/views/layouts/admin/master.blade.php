<!DOCTYPE html>
<html dir="@if (session()->has('language_direction_from_dropdown')) @if(session()->get('language_direction_from_dropdown') == 1) {{ __('rtl') }} @else {{ __('ltr') }} @endif @else {{ __('ltr') }} @endif" lang="@if (session()->has('language_code_from_dropdown')){{ str_replace('_', '-', session()->get('language_code_from_dropdown')) }}@else{{ str_replace('_', '-',   $language->language_code) }}@endif">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Required meta tags -->

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->

    @if (isset($general_site_image))

        @if ($theme->choose_theme == 0)
            @if (!empty($general_site_image->favicon_image))
                <link href="{{ asset('uploads/img/general/'.$general_site_image->favicon_image) }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
                <link href="{{ asset('uploads/img/general/'.$general_site_image->favicon_image) }}" sizes="128x128" rel="shortcut icon" />
            @endif
        @else
            @if (!empty($general_site_image->favicon_image))
                <link href="{{ asset('uploads/creative/img/general/'.$general_site_image->favicon_image) }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
                <link href="{{ asset('uploads/creative/img/general/'.$general_site_image->favicon_image) }}" sizes="128x128" rel="shortcut icon" />
            @endif
        @endif

    @else

        <link href="{{ asset('uploads/img/dummy/favicon.png') }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('uploads/img/dummy/favicon.png') }}" sizes="128x128" rel="shortcut icon" />

    @endif

<!-- Fonts -->
    <link href="{{ asset('assets/admin/side_menu/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/side_menu/vendor/fontawesome-free/css/fontawesome-iconpicker.min.css') }}" rel="stylesheet">


    <!-- Master Stylesheet CSS -->
    @if (session()->has('language_direction_from_dropdown'))

        @if(session()->get('language_direction_from_dropdown') == 1)

            <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/version_rtl/style.css') }}">

        @endif

        @if(session()->get('language_direction_from_dropdown') == 0)

            <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/style.css') }}">

        @endif

    @else

        <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/style.css') }}">

@endif

    <!-- Lihtbox CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/css/default-assets/new/ekko-lightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/css/default-assets/new/lightbox.min.css') }}">

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/css/default-assets/datatables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/css/default-assets/responsive.bootstrap4.css') }}">

    <!-- Summernote Css -->
    <link href="{{ asset('assets/admin/side_menu/css/summernote-bs4.min.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/admin/side_menu/js/jquery.min.js') }}"></script>


</head>

<body  @if (session()->has('language_direction_from_dropdown')) @if(session()->get('language_direction_from_dropdown') == 1)  class="rtl-version" @endif @endif >
<!-- Preloader -->
@if ($section_arr['preloader'] == 1)
    <div id="preloader-area">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    @endif
<!-- Preloader -->

<!-- ======================================
******* Main Page Wrapper **********
======================================= -->

<div class="main-container-wrapper">
    <!-- Top bar area -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            @if ($theme->choose_theme == 0)

            @if (isset($general_site_image))

                @if (!empty($general_site_image->admin_logo_image))
                    <a class="navbar-brand brand-logo mr-5" href="{{ url('dashboard') }}">
                        <img src="{{ asset('uploads/img/general/'.$general_site_image->admin_logo_image) }}" class="mr-2" alt="logo" />
                    </a>
                @endif

                @if (!empty($general_site_image->admin_small_logo_image))
                    <a class="navbar-brand brand-logo-mini" href="{{ url('dashboard') }}">
                        <img src="{{ asset('uploads/img/general/'.$general_site_image->admin_small_logo_image) }}" alt="logo" />
                    </a>
                @endif

            @endif
            @else
            @if (isset($general_site_image))

                @if (!empty($general_site_image->admin_logo_image))
                    <a class="navbar-brand brand-logo mr-5" href="{{ url('dashboard') }}">
                        <img src="{{ asset('uploads/creative/img/general/'.$general_site_image->admin_logo_image) }}" class="mr-2" alt="logo" />
                    </a>
                @endif

                @if (!empty($general_site_image->admin_small_logo_image))
                    <a class="navbar-brand brand-logo-mini" href="{{ url('dashboard') }}">
                        <img src="{{ asset('uploads/creative/img/general/'.$general_site_image->admin_small_logo_image) }}" alt="logo" />
                    </a>
                @endif

            @endif
            @endif

        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>
            <ul class="navbar-nav mr-lg-2">
                <li class="nav-item d-none d-md-block">
                    <span class="badge badge-primary">
                    {{ __('menu.data_language') }}: {{ $data_language->language_name }} <i class="fas fa-hand-point-right ml-1"></i>

                    </span>
                </li>
                <li  class="nav-item dropdown dropdown-animate">
                    <a href="#" class="count-indicator"  data-toggle="modal" data-target="#processedLanguageModal">
                        <i class="fas fa-globe-europe"></i>
                    </a>
                </li>
            </ul>
            <ul class="top-navbar-area navbar-nav navbar-nav-right">
                <li  class="nav-item dropdown dropdown-animate">
                    <a href="{{ url('/') }}" class="badge badge-primary d-none d-md-block">
                        @if ($theme->choose_theme == 0)
                            Landing Site
                            @else
                            Creative Site
                        @endif
                    </a>
                </li>

                @if (count($display_dropdowns) > 0)
                    <li class="nav-item dropdown dropdown-animate">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                            @if (session()->has('language_name_from_dropdown')) {{ session()->get('language_name_from_dropdown') }} @else {{ $language->language_name }} @endif<i class="arrow_carrot-down"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">{{ __('content.languages') }}</p>

                            @foreach ($display_dropdowns as $display_dropdown)
                                <a href="{{ url('language/set-locale/'.$display_dropdown->id) }}" class="dropdown-item preview-item d-flex align-items-center">{{ $display_dropdown->language_name }}</a>
                                @endforeach

                        </div>
                    </li>
                    @endif

                <li class="nav-item dropdown dropdown-animate">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="far fa-bell"></i>
                        @if (count($general_unread_message_count) > 0 || count($general_unread_comment_count) > 0)
                        <span class="count"></span>
                            @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">{{ __('menu.notifications') }}</p>
                        <a href="{{ url('admin/message') }}" class="dropdown-item preview-item d-flex align-items-center">
                            <div class="notification-thumbnail">
                                <div class="preview-icon bg-primary">
                                    <i class="ti-info-alt mx-0"></i>
                                </div>
                            </div>
                            <div class="notification-item-content">
                                <h6>{{ __('menu.messages') }}</h6>
                                <p class="mb-0">
                                    {{ count($general_unread_message_count) }}
                                </p>
                            </div>
                        </a>

                        <a href="{{ url('admin/comment') }}" class="dropdown-item preview-item d-flex align-items-center">
                            <div class="notification-thumbnail">
                                <div class="preview-icon bg-success">
                                    <i class="ti-info-alt mx-0"></i>
                                </div>
                            </div>
                            <div class="notification-item-content">
                                <h6>{{ __('content.comments') }}</h6>
                                <p class="mb-0">
                                    {{ count($general_unread_comment_count) }}
                                </p>
                            </div>
                        </a>

                    </div>
                </li>

                <li class="nav-item nav-profile dropdown dropdown-animate">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        @if(Auth::user()->profile_photo_path != null)
                            <img src="{{ asset('uploads/img/profile/'.Auth::user()->profile_photo_path) }}" class="img-profile rounded-circle" alt="profile image">
                        @else
                            <img src="{{ asset('uploads/img/dummy/128x128.png') }}" class="img-profile rounded-circle" alt="profile image">
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown profile-top" aria-labelledby="profileDropdown">
                        <a href="{{ url('admin/profile/edit') }}" class="dropdown-item"><i class="fas fa-user profile-icon" aria-hidden="true"></i> {{ __('menu.profile') }}</a>
                        <a href="{{ url('admin/profile/change-password') }}" class="dropdown-item"><i class="fas fa-unlock-alt profile-icon" aria-hidden="true"></i> {{ __('menu.change_password') }}</a>

                        <!-- Authentication -->
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fas fa-link profile-icon" aria-hidden="true"></i>
                            {{ __('menu.logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-xl-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="ti-layout-grid2"></span>
            </button>
        </div>
    </nav>

    <div class="container-fluid page-body-wrapper">
        <!-- Side Menu area -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="fas fa-th-large menu-icon"></i>
                        <span class="menu-title">{{ __('menu.dashboard') }}</span>
                    </a>
                </li>
                @if ($section_arr['blog_section'] == 1)
                    <li class="nav-item {{ (request()->is('admin/blog') ||
                                        request()->is('admin/blog/create') ||
                                        request()->is('admin/blog/*/edit') ||
                                        request()->is('admin/category/create') ||
                                        request()->is('admin/category/*/edit')) ? 'active' : '' }}">
                        <a class="nav-link" data-toggle="collapse" href="#blogs" aria-expanded="false" aria-controls="blogs">
                            <i class="fab fa-blogger-b menu-icon"></i>
                            <span class="menu-title">{{ __('menu.blogs') }}</span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse {{ (request()->is('admin/blog') ||
                                            request()->is('admin/blog/create') ||
                                            request()->is('admin/blog/*/edit') ||
                                            request()->is('admin/category/create') ||
                                            request()->is('admin/category/*/edit')) ? 'show' : '' }}" id="blogs">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/category/create') ||
                                                                        request()->is('admin/category/*/edit')) ? 'active' : '' }}" href="{{ url('admin/category/create') }}">{{ __('menu.categories') }}</a></li>
                                <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/blog') ||
                                                                        request()->is('admin/blog/create') ||
                                                                        request()->is('admin/blog/*/edit')) ? 'active' : '' }}" href="{{ url('admin/blog') }}">{{ __('menu.blogs') }}</a></li>
                            </ul>
                        </div>
                    </li>
                @endif
                
                @if (Auth::user()->type != 2)
                    @if ($theme->choose_theme == 0)

                        <li class="nav-item {{ (request()->is('admin/fixed-content/create') ||
                                                request()->is('admin/background-image/create') ||
                                                request()->is('admin/slider/create') ||
                                                request()->is('admin/slider/*/edit') ||
                                                request()->is('admin/video/create')) ? 'active' : '' }}">
                            <a class="nav-link" data-toggle="collapse" href="#advanced" aria-expanded="false" aria-controls="advanced">
                                <i class="fas fa-photo-video menu-icon"></i>
                                <span class="menu-title">{{ __('menu.banner') }}</span>
                                <i class="ti-angle-right"></i>
                            </a>
                            <div class="collapse {{ (request()->is('admin/fixed-content/create') ||
                                                    request()->is('admin/background-image/create') ||
                                                    request()->is('admin/slider/create') ||
                                                    request()->is('admin/slider/*/edit') ||
                                                    request()->is('admin/video/create')) ? 'show' : '' }}" id="advanced">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/fixed-content/create')) ? 'active' : '' }}" href="{{ url('admin/fixed-content/create') }}"> {{ __('menu.fixed_content') }}</a></li>
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/background-image/create')) ? 'active' : '' }}" href="{{ url('admin/background-image/create') }}">{{ __('menu.background_image') }}</a></li>
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/slider/create') || request()->is('admin/slider/*/edit')) ? 'active' : '' }}" href="{{ url('admin/slider/create') }}">{{ __('menu.sliders') }}</a></li>
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/video/create')) ? 'active' : '' }}" href="{{ url('admin/video/create') }}">{{ __('menu.video') }}</a></li>
                                </ul>
                            </div>
                        </li>
                        @if ($section_arr['about_section'] == 1)
                            <li class="nav-item {{ (request()->is('admin/about/create') ||
                                                request()->is('admin/info-list/*/edit')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('admin/about/create') }}">
                                    <i class="fas fa-address-card menu-icon"></i>
                                    <span class="menu-title">{{ __('menu.about') }}</span>
                                </a>
                            </li>
                        @endif
                        @if ($section_arr['service_section'] == 1)
                            <li class="nav-item {{ (request()->is('admin/service/create') ||
                                                request()->is('admin/service/*/edit')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('admin/service/create') }}">
                                    <i class="fas fa-people-carry menu-icon"></i>
                                    <span class="menu-title">{{ __('menu.services') }}</span>
                                </a>
                            </li>
                        @endif
                        @if ($section_arr['feature_section'] == 1)
                            <li class="nav-item {{ (request()->is('admin/feature/create') ||
                                                request()->is('admin/feature/*/edit')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('admin/feature/create') }}">
                                    <i class="fas fa-puzzle-piece menu-icon"></i>
                                    <span class="menu-title">{{ __('menu.features') }}</span>
                                </a>
                            </li>
                        @endif
                        @if ($section_arr['counter_section'] == 1)
                            <li class="nav-item {{ (request()->is('admin/counter/create') ||
                                                request()->is('admin/counter/*/edit')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('admin/counter/create') }}">
                                    <i class="fas fa-clock menu-icon"></i>
                                    <span class="menu-title">{{ __('menu.counters') }}</span>
                                </a>
                            </li>
                        @endif
                        @if ($section_arr['install_section'] == 1)
                            <li class="nav-item {{ (request()->is('admin/how-to-install/create') ||
                                                request()->is('admin/how-to-install/*/edit')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('admin/how-to-install/create') }}">
                                    <i class="fas fa-upload menu-icon"></i>
                                    <span class="menu-title">{{ __('menu.how_to_install') }}</span>
                                </a>
                            </li>
                        @endif
                        @if ($section_arr['screenshot_section'] == 1)
                            <li class="nav-item {{ (request()->is('admin/screenshot/create') ||
                                                request()->is('admin/screenshot/*/edit')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('admin/screenshot/create') }}">
                                    <i class="fas fa-image menu-icon"></i>
                                    <span class="menu-title">{{ __('menu.screenshots') }}</span>
                                </a>
                            </li>
                        @endif
                        @if ($section_arr['price_section'] == 1)
                            <li class="nav-item {{ (request()->is('admin/price/create') ||
                                                request()->is('admin/price/*/edit')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('admin/price/create') }}">
                                    <i class="fas fa-money-bill menu-icon"></i>
                                    <span class="menu-title">{{ __('menu.prices') }}</span>
                                </a>
                            </li>
                        @endif
                        @if ($section_arr['client_section'] == 1)
                            <li class="nav-item {{ (request()->is('admin/testimonial/create') ||
                                                request()->is('admin/testimonial/*/edit')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('admin/testimonial/create') }}">
                                    <i class="fas fa-comment-alt menu-icon"></i>
                                    <span class="menu-title">{{ __('menu.testimonials') }}</span>
                                </a>
                            </li>
                        @endif
                        @if ($section_arr['team_section'] == 1)
                            <li class="nav-item {{ (request()->is('admin/team/create') ||
                                                request()->is('admin/team/*/edit')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('admin/team/create') }}">
                                    <i class="fas fa-users menu-icon"></i>
                                    <span class="menu-title">{{ __('menu.teams') }}</span>
                                </a>
                            </li>
                        @endif
                        @if ($section_arr['faq_section'] == 1)
                            <li class="nav-item {{ (request()->is('admin/faq/create') ||
                                                request()->is('admin/faq/*/edit')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('admin/faq/create') }}">
                                    <i class="fas fa-question-circle menu-icon"></i>
                                    <span class="menu-title">{{ __('menu.faqs') }}</span>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item {{ (request()->is('admin/contact/create') ||
                                                request()->is('admin/contact/*/edit') ||
                                                request()->is('admin/quick-access/create') ||
                                                request()->is('admin/message') ||
                                                request()->is('admin/social/create') ||
                                                request()->is('admin/social/*/edit')) ? 'active' : '' }}">
                            <a class="nav-link" data-toggle="collapse" href="#contact" aria-expanded="false" aria-controls="contact">
                                <i class="fas fa-map-marked menu-icon"></i>
                                <span class="menu-title">{{ __('menu.contact') }}</span>
                                <i class="ti-angle-right"></i>
                            </a>
                            <div class="collapse {{ (request()->is('admin/contact/create') ||
                                                    request()->is('admin/contact/*/edit') ||
                                                    request()->is('admin/quick-access/create') ||
                                                    request()->is('admin/message') ||
                                                    request()->is('admin/social/create') ||
                                                    request()->is('admin/social/*/edit')) ? 'show' : '' }}" id="contact">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/contact/create') ||
                                                                                request()->is('admin/contact/*/edit')) ? 'active' : '' }}" href="{{ url('admin/contact/create') }}">{{ __('menu.contact_info') }}</a></li>
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/social/create') ||
                                                                                request()->is('admin/social/*/edit')) ? 'active' : '' }}" href="{{ url('admin/social/create') }}">{{ __('menu.socials') }}</a></li>
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/quick-access/create')) ? 'active' : '' }}" href="{{ url('admin/quick-access/create') }}">{{ __('menu.quick_access_buttons') }}</a></li>
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/message')) ? 'active' : '' }}" href="{{ url('admin/message') }}">{{ __('menu.messages') }}</a></li>
                                </ul>
                            </div>
                        </li>
                        @if ($section_arr['app_section'] == 1)
                            <li class="nav-item {{ (request()->is('admin/app/create') ||
                                                request()->is('admin/app/*/edit')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('admin/app/create') }}">
                                    <i class="fa fa-desktop menu-icon"></i>
                                    <span class="menu-title">{{ __('menu.apps') }}</span>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item {{ (request()->is('admin/page') ||
                                                request()->is('admin/page/create') ||
                                                request()->is('admin/page/*/edit')) ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('admin/page') }}">
                                <i class="fas fa-file-alt menu-icon"></i>
                                <span class="menu-title">{{ __('menu.pages') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ (request()->is('admin/site-info/create') ||
                                                request()->is('admin/site-image/create') ||
                                                request()->is('admin/homepage-version/create') ||
                                                request()->is('admin/external-url/create') ||
                                                request()->is('admin/breadcrumb/create') ||
                                                request()->is('admin/section/create') ||
                                                request()->is('admin/color/create') ||
                                                request()->is('admin/google-analytic/create') ||
                                                request()->is('admin/seo/create')) ? 'active' : '' }}">
                            <a class="nav-link" data-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="settings">
                                <i class="fas fa-fw fa-cog menu-icon"></i>
                                <span class="menu-title">{{ __('menu.settings') }}</span>
                                <i class="ti-angle-right"></i>
                            </a>
                            <div class="collapse {{ (request()->is('admin/site-info/create') ||
                                                    request()->is('admin/site-image/create') ||
                                                    request()->is('admin/homepage-version/create') ||
                                                    request()->is('admin/external-url/create') ||
                                                    request()->is('admin/breadcrumb/create') ||
                                                    request()->is('admin/section/create') ||
                                                    request()->is('admin/color/create') ||
                                                    request()->is('admin/google-analytic/create') ||
                                                    request()->is('admin/seo/create')) ? 'show' : '' }}" id="settings">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/site-info/create')) ? 'active' : '' }}" href="{{ url('admin/site-info/create') }}">{{ __('menu.site_info') }}</a></li>
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/site-image/create')) ? 'active' : '' }}" href="{{ url('admin/site-image/create') }}">{{ __('menu.site_images') }}</a></li>
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/homepage-version/create')) ? 'active' : '' }}" href="{{ url('admin/homepage-version/create') }}">{{ __('menu.homepage_versions') }}</a></li>
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/google-analytic/create')) ? 'active' : '' }}" href="{{ url('admin/google-analytic/create') }}">{{ __('menu.google_analytic') }}</a></li>
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/external-url/create')) ? 'active' : '' }}" href="{{ url('admin/external-url/create') }}">{{ __('menu.external_url') }}</a></li>
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/breadcrumb/create')) ? 'active' : '' }}" href="{{ url('admin/breadcrumb/create') }}">{{ __('menu.breadcrumb') }}</a></li>
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/section/create')) ? 'active' : '' }}" href="{{ url('admin/section/create') }}">{{ __('menu.sections') }}</a></li>
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/seo/create')) ? 'active' : '' }}" href="{{ url('admin/seo/create') }}">{{ __('menu.seo') }}</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item {{ (request()->is('admin/user/management')) ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('admin/user/management') }}">
                                <i class="fas fa-user-shield menu-icon"></i>
                                <span class="menu-title">{{ __('menu.user_management') }}</span>
                            </a>
                        </li>

                    @else
                        <li class="nav-item {{ (request()->is('admin/fixed-content/create') ||
                                                request()->is('admin/background-image/create') ||
                                                request()->is('admin/slider/create') ||
                                                request()->is('admin/slider/*/edit') ||
                                                request()->is('admin/video/create')) ? 'active' : '' }}">
                            <a class="nav-link" data-toggle="collapse" href="#advanced" aria-expanded="false" aria-controls="advanced">
                                <i class="fas fa-photo-video menu-icon"></i>
                                <span class="menu-title">{{ __('menu.banner') }}</span>
                                <i class="ti-angle-right"></i>
                            </a>
                            <div class="collapse {{ (request()->is('admin/fixed-content/create') ||
                                                    request()->is('admin/background-image/create') ||
                                                    request()->is('admin/slider/create') ||
                                                    request()->is('admin/slider/*/edit') ||
                                                    request()->is('admin/video/create')) ? 'show' : '' }}" id="advanced">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/fixed-content/create')) ? 'active' : '' }}" href="{{ url('admin/fixed-content/create') }}"> {{ __('menu.fixed_content') }}</a></li>
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/background-image/create')) ? 'active' : '' }}" href="{{ url('admin/background-image/create') }}">{{ __('menu.background_image') }}</a></li>
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/slider/create') || request()->is('admin/slider/*/edit')) ? 'active' : '' }}" href="{{ url('admin/slider/create') }}">{{ __('menu.sliders') }}</a></li>
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/video/create')) ? 'active' : '' }}" href="{{ url('admin/video/create') }}">{{ __('menu.video') }}</a></li>
                                </ul>
                            </div>
                        </li>
                        @if ($section_arr['about_section'] == 1)
                            <li class="nav-item {{ (request()->is('admin/about/create') ||
                                                request()->is('admin/info-list/*/edit')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('admin/about/create') }}">
                                    <i class="fas fa-address-card menu-icon"></i>
                                    <span class="menu-title">{{ __('menu.about') }}</span>
                                </a>
                            </li>
                        @endif
                        @if ($section_arr['skill_section'] == 1)
                                <li class="nav-item {{ (request()->is('admin/skill/create') ||
                                                    request()->is('admin/skill/*/edit')) ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('admin/skill/create') }}">
                                        <i class="fas fa-toolbox menu-icon"></i>
                                        <span class="menu-title">{{ __('content.skills') }}</span>
                                    </a>
                                </li>
                            @endif
                        @if ($section_arr['counter_section'] == 1)
                                <li class="nav-item {{ (request()->is('admin/counter/create') ||
                                                    request()->is('admin/counter/*/edit')) ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('admin/counter/create') }}">
                                        <i class="fas fa-clock menu-icon"></i>
                                        <span class="menu-title">{{ __('content.counters') }}</span>
                                    </a>
                                </li>
                            @endif
                        @if ($section_arr['service_section'] == 1)
                                <li class="nav-item {{ (request()->is('admin/service') ||
                                                    request()->is('admin/service/create') ||
                                                    request()->is('admin/service/*/edit') ||
                                                    request()->is('admin/service-detail/create/*') ||
                                                    request()->is('admin/service-detail/*/*/edit')) ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('admin/service') }}">
                                        <i class="fas fa-people-carry menu-icon"></i>
                                        <span class="menu-title">{{ __('content.services') }}</span>
                                    </a>
                                </li>
                            @endif
                        @if ($section_arr['work_section'] == 1)
                                <li class="nav-item  {{ (request()->is('admin/work') ||
                                                    request()->is('admin/work/create') ||
                                                    request()->is('admin/work/*/edit') ||
                                                    request()->is('admin/work-detail/create/*') ||
                                                    request()->is('admin/work-detail/*/*/edit') ||
                                                    request()->is('admin/work-slider/create/*') ||
                                                    request()->is('admin/work-slider/*/*/edit') ||
                                                    request()->is('admin/work-category/create') ||
                                                    request()->is('admin/work-category/*/edit')) ? 'active' : '' }}">
                                    <a class="nav-link" data-toggle="collapse" href="#works" aria-expanded="false" aria-controls="works">
                                        <i class="fas fa-briefcase menu-icon"></i>
                                        <span class="menu-title">{{ __('menu.works') }}</span>
                                        <i class="ti-angle-right"></i>
                                    </a>
                                    <div class="collapse  {{ (request()->is('admin/work') ||
                                                        request()->is('admin/work/create') ||
                                                        request()->is('admin/work/*/edit') ||
                                                        request()->is('admin/work-detail/create/*') ||
                                                        request()->is('admin/work-detail/*/*/edit') ||
                                                        request()->is('admin/work-slider/create/*') ||
                                                        request()->is('admin/work-slider/*/*/edit') ||
                                                        request()->is('admin/work-category/create') ||
                                                        request()->is('admin/work-category/*/edit')) ? 'show' : '' }}" id="works">
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/work-category/create') ||
                                                                                    request()->is('admin/work-category/*/edit')) ? 'active' : '' }}" href="{{ url('admin/work-category/create') }}">{{ __('menu.categories') }}</a></li>
                                            <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/work') ||
                                                                                    request()->is('admin/work/create') ||
                                                                                    request()->is('admin/work/*/edit') ||
                                                                                    request()->is('admin/work-slider/create/*') ||
                                                                                    request()->is('admin/work-slider/*/*/edit') ||
                                                                                    request()->is('admin/work-detail/*/*/edit') ||
                                                                                    request()->is('admin/work-detail/create/*')) ? 'active' : '' }}" href="{{ url('admin/work') }}">{{ __('menu.works') }}</a></li>
                                        </ul>
                                    </div>
                                </li>
                            @endif
                            @if ($section_arr['call_to_action_section'] == 1)
                                <li class="nav-item  {{ (request()->is('admin/call-to-action/create')) ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('admin/call-to-action/create') }}">
                                        <i class="fas fa-bullhorn menu-icon"></i>
                                        <span class="menu-title">{{ __('menu.call_to_action') }}</span>
                                    </a>
                                </li>
                                @endif
                        @if ($section_arr['client_section'] == 1)
                            <li class="nav-item {{ (request()->is('admin/testimonial/create') ||
                                                request()->is('admin/testimonial/*/edit')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('admin/testimonial/create') }}">
                                    <i class="fas fa-comment-alt menu-icon"></i>
                                    <span class="menu-title">{{ __('menu.testimonials') }}</span>
                                </a>
                            </li>
                        @endif
                        @if ($section_arr['gallery_section'] == 1)
                            <li class="nav-item  {{ (request()->is('admin/gallery/create') ||
                                                request()->is('admin/gallery/*/edit')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('admin/gallery/create') }}">
                                    <i class="fas fa-images menu-icon"></i>
                                    <span class="menu-title">{{ __('menu.galleries') }}</span>
                                </a>
                            </li>
                            @endif
                        @if ($section_arr['team_section'] == 1)
                            <li class="nav-item {{ (request()->is('admin/team/create') ||
                                                request()->is('admin/team/*/edit')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('admin/team/create') }}">
                                    <i class="fas fa-users menu-icon"></i>
                                    <span class="menu-title">{{ __('menu.teams') }}</span>
                                </a>
                            </li>
                        @endif
                        @if ($section_arr['price_section'] == 1)
                            <li class="nav-item {{ (request()->is('admin/price/create') ||
                                                    request()->is('admin/price/*/edit')) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('admin/price/create') }}">
                                    <i class="fas fa-money-bill menu-icon"></i>
                                    <span class="menu-title">{{ __('menu.prices') }}</span>
                                </a>
                            </li>
                        @endif
                        @if ($section_arr['blog_section'] == 1)
                            <li class="nav-item {{ (request()->is('admin/blog') ||
                                                    request()->is('admin/blog/create') ||
                                                    request()->is('admin/blog/*/edit') ||
                                                    request()->is('admin/blog-category/create') ||
                                                    request()->is('admin/blog-category/*/edit')) ? 'active' : '' }}">
                                <a class="nav-link" data-toggle="collapse" href="#blogs" aria-expanded="false" aria-controls="blogs">
                                    <i class="fab fa-blogger-b menu-icon"></i>
                                    <span class="menu-title">{{ __('menu.blogs') }}</span>
                                    <i class="ti-angle-right"></i>
                                </a>
                                <div class="collapse {{ (request()->is('admin/blog') ||
                                                        request()->is('admin/blog/create') ||
                                                        request()->is('admin/blog/*/edit') ||
                                                        request()->is('admin/blog-category/create') ||
                                                        request()->is('admin/blog-category/*/edit')) ? 'show' : '' }}" id="blogs">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/blog-category/create') ||
                                                                                    request()->is('admin/blog-category/*/edit')) ? 'active' : '' }}" href="{{ url('admin/blog-category/create') }}">{{ __('menu.categories') }}</a></li>
                                        <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/blog') ||
                                                                                    request()->is('admin/blog/create') ||
                                                                                    request()->is('admin/blog/*/edit')) ? 'active' : '' }}" href="{{ url('admin/blog') }}">{{ __('menu.blogs') }}</a></li>
                                    </ul>
                                </div>
                            </li>
                        @endif
                       
                        <li class="nav-item {{ (request()->is('admin/contact/create') ||
                                                request()->is('admin/contact/*/edit') ||
                                                request()->is('admin/quick-access/create') ||
                                                request()->is('admin/message') ||
                                                request()->is('admin/social/create') ||
                                                request()->is('admin/social/*/edit')) ? 'active' : '' }}">
                            <a class="nav-link" data-toggle="collapse" href="#contact" aria-expanded="false" aria-controls="contact">
                                <i class="fas fa-map-marked menu-icon"></i>
                                <span class="menu-title">{{ __('menu.contact') }}</span>
                                <i class="ti-angle-right"></i>
                            </a>
                            <div class="collapse {{ (request()->is('admin/contact/create') ||
                                                    request()->is('admin/contact/*/edit') ||
                                                    request()->is('admin/quick-access/create') ||
                                                    request()->is('admin/message') ||
                                                    request()->is('admin/social/create') ||
                                                    request()->is('admin/social/*/edit')) ? 'show' : '' }}" id="contact">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/contact/create') ||
                                                                                request()->is('admin/contact/*/edit')) ? 'active' : '' }}" href="{{ url('admin/contact/create') }}">{{ __('menu.contact_info') }}</a></li>
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/social/create') ||
                                                                                request()->is('admin/social/*/edit')) ? 'active' : '' }}" href="{{ url('admin/social/create') }}">{{ __('menu.socials') }}</a></li>
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/quick-access/create')) ? 'active' : '' }}" href="{{ url('admin/quick-access/create') }}">{{ __('menu.quick_access_buttons') }}</a></li>
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/message')) ? 'active' : '' }}" href="{{ url('admin/message') }}">{{ __('menu.messages') }}</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item {{ (request()->is('admin/page') ||
                                                request()->is('admin/page/create') ||
                                                request()->is('admin/page/*/edit')) ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('admin/page') }}">
                                <i class="fas fa-file-alt menu-icon"></i>
                                <span class="menu-title">{{ __('menu.pages') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ (request()->is('admin/site-info/create') ||
                                                request()->is('admin/site-image/create') ||
                                                request()->is('admin/homepage-version/create') ||
                                                request()->is('admin/external-url/create') ||
                                                request()->is('admin/breadcrumb/create') ||
                                                request()->is('admin/section/create') ||
                                                request()->is('admin/color/create') ||
                                                request()->is('admin/google-analytic/create') ||
                                                request()->is('admin/seo/create')) ? 'active' : '' }}">
                            <a class="nav-link" data-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="settings">
                                <i class="fas fa-fw fa-cog menu-icon"></i>
                                <span class="menu-title">{{ __('menu.settings') }}</span>
                                <i class="ti-angle-right"></i>
                            </a>
                            <div class="collapse {{ (request()->is('admin/site-info/create') ||
                                                    request()->is('admin/site-image/create') ||
                                                    request()->is('admin/homepage-version/create') ||
                                                    request()->is('admin/external-url/create') ||
                                                    request()->is('admin/breadcrumb/create') ||
                                                    request()->is('admin/section/create') ||
                                                    request()->is('admin/color/create') ||
                                                    request()->is('admin/google-analytic/create') ||
                                                    request()->is('admin/seo/create')) ? 'show' : '' }}" id="settings">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/site-info/create')) ? 'active' : '' }}" href="{{ url('admin/site-info/create') }}">{{ __('menu.site_info') }}</a></li>
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/site-image/create')) ? 'active' : '' }}" href="{{ url('admin/site-image/create') }}">{{ __('menu.site_images') }}</a></li>
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/homepage-version/create')) ? 'active' : '' }}" href="{{ url('admin/homepage-version/create') }}">{{ __('menu.homepage_versions') }}</a></li>
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/google-analytic/create')) ? 'active' : '' }}" href="{{ url('admin/google-analytic/create') }}">{{ __('menu.google_analytic') }}</a></li>
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/external-url/create')) ? 'active' : '' }}" href="{{ url('admin/external-url/create') }}">{{ __('menu.external_url') }}</a></li>
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/breadcrumb/create')) ? 'active' : '' }}" href="{{ url('admin/breadcrumb/create') }}">{{ __('menu.breadcrumb') }}</a></li>
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/section/create')) ? 'active' : '' }}" href="{{ url('admin/section/create') }}">{{ __('menu.sections') }}</a></li>
                                    <li class="nav-item"> <a class="nav-link {{ (request()->is('admin/seo/create')) ? 'active' : '' }}" href="{{ url('admin/seo/create') }}">{{ __('menu.seo') }}</a></li>
                                </ul>
                            </div>
                        </li>
                    @endif

                    <li class="nav-item {{ (request()->is('admin/theme/create')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/theme/create') }}">
                            <i class="fas fa-palette menu-icon"></i>
                            <span class="menu-title">{{ __('menu.themes') }}</span>
                        </a>
                    </li>
                    <li class="nav-item  {{ (request()->is('admin/language/create') ||
                                                request()->is('admin/language/*/edit') ||
                                                request()->is('admin/language-keyword-for-adminpanel/create/*') ||
                                                request()->is('admin/language/*/edit') ||
                                                request()->is('admin/language/*/edit')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/language/create') }}">
                            <i class="fas fa-language menu-icon"></i>
                            <span class="menu-title">{{ __('menu.languages') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin/clear-cache')) ? 'active' : '' }} ">
                        <a class="nav-link" href="{{ url('admin/clear-cache') }}">
                            <i class="fab fa-cloudscale menu-icon"></i>
                            <span class="menu-title">{{ __('menu.optimizer') }}</span>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="processedLanguageModal" tabindex="-1" role="dialog" aria-labelledby="processedLanguageModalLabel" aria-modal="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 font-16" id="processedLanguageModalLabel">{{ __('content.which_language') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('language.update_processed_language') }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="language_id">{{ __('content.languages') }}</label>
                                    <select class="form-control" name="language_id" id="language_id" required>
                                        @foreach ($languages as $lang)
                                            <option value="{{ $lang->id }}" {{ $lang->status == 1 ? 'selected' : '' }}>{{ $lang->language_name }}</option>
                                        @endforeach
                                            @php unset($lang); @endphp
                                    </select>
                                    <small id="language_id" class="form-text text-muted">{{ __('content.reminding') }}</small>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('content.submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</div>


<!-- Plugins Js -->
<script src="{{ asset('assets/admin/side_menu/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/bundle.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/default-assets/fullscreen.js') }}"></script>

<!-- Active JS -->
<script src="{{ asset('assets/admin/side_menu/js/canvas.js') }}" defer></script>
<script src="{{ asset('assets/admin/side_menu/js/collapse.js') }}" defer></script>
<script src="{{ asset('assets/admin/side_menu/js/settings.js') }}" defer></script>
<script src="{{ asset('assets/admin/side_menu/js/template.js') }}" defer></script>
<script src="{{ asset('assets/admin/side_menu/js/default-assets/active.js') }}" defer></script>

@isset ($galleries)
    <!-- Lightbox JS -->
    <script src="{{ asset('assets/admin/side_menu/js/default-assets/ekko-lightbox.min.js') }}" defer></script>
    <script src="{{ asset('assets/admin/side_menu/js/default-assets/lightbox.min.js') }}" defer></script>
    <script src="{{ asset('assets/admin/side_menu/js/default-assets/light-box-active.js') }}" defer></script>
@endif

    <!-- Datatable JS -->
    <script src="{{ asset('assets/admin/side_menu/js/default-assets/jquery.datatables.min.js') }}" defer></script>
    <script src="{{ asset('assets/admin/side_menu/js/default-assets/datatables.bootstrap4.js') }}" defer></script>
    <script src="{{ asset('assets/admin/side_menu/js/default-assets/datatable-responsive.min.js') }}" defer></script>
    <script src="{{ asset('assets/admin/side_menu/js/default-assets/responsive.bootstrap4.min.js') }}" defer></script>
    <script src="{{ asset('assets/admin/side_menu/js/default-assets/demo.datatable-init.js') }}" defer></script>


<!-- Summernote scripts -->
<script src="{{ asset('assets/admin/side_menu/js/summernote-bs4.min.js') }}"></script>
<script>
    $('#summernote').summernote({
        placeholder: '{{ __('content.desc') }}',
        tabsize: 2,
        height: 100
    });
</script>

<!-- Custom JS -->
<script src="{{ asset('assets/admin/side_menu/js/custom.js') }}"></script>

<!-- Icon Picker JS -->
<script src="{{ asset('assets/admin/side_menu/vendor/fontawesome-free/js/fontawesome-iconpicker.min.js') }}"> </script>


</body>

</html>