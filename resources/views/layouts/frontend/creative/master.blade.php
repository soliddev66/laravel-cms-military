<!DOCTYPE html>
<html dir="@if (session()->has('language_direction_from_dropdown')) @if(session()->get('language_direction_from_dropdown') == 1) {{ __('rtl') }} @else {{ __('ltr') }} @endif @else {{ __('ltr') }} @endif" lang="@if (session()->has('language_code_from_dropdown')){{ str_replace('_', '-', session()->get('language_code_from_dropdown')) }}@else{{ str_replace('_', '-',   $language->language_code) }}@endif">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="@if (isset($general_seo)){{ $general_seo->site_name }} @endif">
    <meta name="description" content="@if (isset($general_seo)){{ $general_seo->site_desc }} @endif">
    <meta name="keywords" content="@if (isset($general_seo)){{ $general_seo->site_keywords }} @endif">
    <meta name="author" content="elsecolor">
    <meta property="fb:app_id" content="@if (isset($general_seo)){{ $general_seo->fb_app_id }} @endif">
    <meta property="og:title" content="@if (isset($general_seo)){{ $general_seo->site_name }} @endif">
    <meta property="og:url" content="@if (isset($general_seo)){{ url()->current() }} @endif">
    <meta property="og:description" content="@if (isset($general_seo)){{ $general_seo->site_desc }} @endif">
    <meta property="og:image" content="@if (!empty($general_site_images->favicon_image)){{ asset('uploads/creative/img/general/'.$general_site_images->favicon_image) }} @endif">
    <meta itemprop="image" content="@if (!empty($general_site_images->favicon_image)){{ asset('uploads/creative/img/general/'.$general_site_images->favicon_image) }} @endif">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="@if (!empty($general_site_images->favicon_image))){{ asset('uploads/creative/img/general/'.$general_site_images->favicon_image) }} @endif">
    <meta property="twitter:title" content="@if (isset($general_seo)){{ $general_seo->site_name }} @endif">
    <meta property="twitter:description" content="@if (isset($general_seo)){{ $general_seo->site_desc }} @endif">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{ __('frontend.home') }} @if (isset($general_seo)) - {{ $general_seo->site_name }} @endif</title>

    @if (!empty($general_site_images->favicon_image))
    <!-- Favicon -->
        <link href="{{ asset('uplods/creative/img/general/'.$general_site_images->favicon_image) }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('uploads/creative/img/general/'.$general_site_images->favicon_image) }}" sizes="128x128" rel="shortcut icon" />
    @else
        <!-- Favicon -->
            <link href="{{ asset('uplods/creative/img/dummy/favicon.png') }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
            <link href="{{ asset('uploads/creative/img/dummy/favicon.png') }}" sizes="128x128" rel="shortcut icon" />
    @endif

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/creative/fonts/font_awesome/css/all.css') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap&subset=latin-ext" rel="stylesheet">

    <!-- FrameWorks -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/creative/css/frameworks.css') }}">

    <!-- Theme Main Js -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/creative/css/style.css') }}">

    @if ($homepage_version->color == 0)
        <link rel="stylesheet" href="{{ asset('assets/frontend/creative/css/color/default.css') }}">
    @elseif ($homepage_version->color == 1)
        <link rel="stylesheet" href="{{ asset('assets/frontend/creative/css/color/aqua.css') }}">
    @elseif ($homepage_version->color == 2)
        <link rel="stylesheet" href="{{ asset('assets/frontend/creative/css/color/blue.css') }}">
    @elseif ($homepage_version->color == 3)
        <link rel="stylesheet" href="{{ asset('assets/frontend/creative/css/color/fusion_red.css') }}">
    @elseif ($homepage_version->color == 4)
        <link rel="stylesheet" href="{{ asset('assets/frontend/creative/css/color/green.css') }}">
    @elseif ($homepage_version->color == 5)
        <link rel="stylesheet" href="{{ asset('assets/frontend/creative/css/color/olive_green.css') }}">
    @elseif ($homepage_version->color == 6)
        <link rel="stylesheet" href="{{ asset('assets/frontend/creative/css/color/orange.css') }}">
    @elseif ($homepage_version->color == 7)
        <link rel="stylesheet" href="{{ asset('assets/frontend/creative/css/color/pink.css') }}">
    @elseif ($homepage_version->color == 8)
        <link rel="stylesheet" href="{{ asset('assets/frontend/creative/css/color/purple.css') }}">
    @elseif ($homepage_version->color == 9)
        <link rel="stylesheet" href="{{ asset('assets/frontend/creative/css/color/red.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('assets/frontend/creative/css/color/yellow.css') }}">
    @endif

    <!-- Theme RTL Css -->
    @if (session()->has('language_direction_from_dropdown'))

        @if(session()->get('language_direction_from_dropdown') == 1)
            <link rel="stylesheet" href="{{ asset('assets/frontend/creative/css/rtl.css') }}">
        @endif

    @endif

    @if (isset($google_analytic))
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $google_analytic->google_analytic }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '{{ $google_analytic->google_analytic }}');
        </script>
    @endif

</head>
<body @if (session()->has('language_direction_from_dropdown')) @if(session()->get('language_direction_from_dropdown') == 1)  class="rtl" @endif @endif>

<div class="page-wrapper">

    <!-- Header Start -->
    <header class="header fixed-top white-navbar">
        <div class="container">
            <nav class="navbar navbar-expand-lg p-0">
                <a class="navbar-brand" href="{{ url('/') }}">
                    @if (!empty($general_site_image->site_white_logo_image))
                        <img src="{{ asset('uploads/creative/img/general/'.$general_site_image->site_white_logo_image) }}" alt="Logo" class="img-fluid logo-transparent">
                    @else
                        <img src="{{ asset('uploads/common_dummy/logo-white.png') }}" alt="Logo" class="img-fluid logo-transparent">
                    @endif
                    @if (!empty($general_site_image->site_colored_logo_image))
                        <img src="{{ asset('uploads/creative/img/general/'.$general_site_image->site_colored_logo_image) }}" alt="Logo" class="img-fluid logo-normal">
                    @else
                        <img src="{{ asset('uploads/common_dummy/logo-black.png') }}" alt="Logo" class="img-fluid logo-normal">
                    @endif
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#fixedNavbar" aria-controls="fixedNavbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="togler-icon-inner">
                        <span class="line-1"></span>
                        <span class="line-2"></span>
                        <span class="line-3"></span>
                        </span>
                </button>
                <button class="login-btn-toggle login-btn-mobile" data-toggle="modal" data-target="#loginForm"><i class=" fa fa-sign-in-alt"></i></button>
                <div class="collapse navbar-collapse main-menu justify-content-end" id="fixedNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ url('/') }}">{{ __('frontend.back_to_home') }}</a>
                        </li>
                        @if (count($display_dropdowns) > 0)
                            <li class="nav-item lang-btn-resp dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="langDropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="fas fa-globe"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="langDropdownMenu">
                                    @foreach ($display_dropdowns as $display_dropdown)
                                        <a href="{{ url('language/set-locale/'.$display_dropdown->id) }}" class="dropdown-item">{{ $display_dropdown->language_name }}</a>
                                    @endforeach
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- Header End -->


@yield('content')



<!-- Footer Start -->
    @if ($section_arr['footer_section'] == 1)

        @if (isset($general_site_info) || count($general_socials) > 0 || count($pages) > 0 || count($contacts) > 0)
            <footer class="footer">
                <div class="footer-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-lg-3 footer-widget-resp">
                                <div class="footer-widget">
                                    <h6 class="footer-title">{{ __('frontend.about_us') }}</h6>
                                    @if (!empty($general_site_info->short_desc)) <p class="footer-desc">{{ $general_site_info->short_desc }}</p> @endif
                                    <div class="footer-social-links">
                                        @foreach ($general_socials as $general_social)
                                            <a href="@if (!empty($general_social->link)) {{ $general_social->link }} @else # @endif" class="mb-2">
                                                <i class="{{ $general_social->social_media }}"></i>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 footer-widget-resp">
                                <div class="footer-widget footer-widget-pl">
                                    <h6 class="footer-title">{{ __('frontend.links') }}</h6>
                                    <ul class="footer-links">
                                        @if ($section_arr['about_section'] == 1)
                                            <li>
                                                <a href="{{ url('/#about') }}">{{ __('frontend.about') }}</a>
                                            </li>
                                        @endif
                                        @if ($section_arr['service_section'] == 1)
                                            <li>
                                                <a href="{{ url('/#services') }}">{{ __('frontend.services') }}</a>
                                            </li>
                                        @endif
                                        @if ($section_arr['price_section'] == 1)
                                            <li>
                                                <a href="{{ url('/#pricing') }}">{{ __('frontend.pricing') }}</a>
                                            </li>
                                        @endif
                                        @if ($section_arr['blog_section'] == 1)
                                            <li>
                                                <a  href="{{ url('blogs') }}">{{ __('frontend.blogs') }}</a>
                                            </li>
                                        @endif
                                        @if($section_arr['contact_section'] == 1)
                                            <li>
                                                <a href="{{ url('/#contact') }}">{{ __('frontend.contact') }}</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 footer-widget-resp">
                                <div class="footer-widget">
                                    <h6 class="footer-title">{{ __('frontend.help') }}</h6>
                                    <ul class="footer-links">
                                        @foreach ($pages as $page)
                                            @if ($page->display_footer_menu == 1)
                                                <li>
                                                    <a href="{{ url('page/'.$page->page_slug) }}">{{ $page->page_title }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 footer-widget-resp">
                                <div class="footer-widget">
                                    <h6 class="footer-title">{{ __('frontend.contact_info') }}</h6>
                                    <div class="footer-contact-info-wrap">
                                        <ul class="footer-contact-info-list">
                                            @foreach ($contacts as $contact)
                                                <li>
                                                    @if (!empty($contact->icon)) <i class="{{ $contact->icon }}"></i> @endif
                                                    @if (!empty($contact->desc)) <span>{{ $contact->desc }}</span> @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <div class="container">
                        <p class="copyright-text">© {{ __('frontend.copyright') }} <span id="fullYearCopyright"></span>. @if (!empty($general_site_info->copyright)) {{ $general_site_info->copyright }} @endif</p>
                    </div>
                </div>
            </footer>
        @else
            <footer class="footer">
                <div class="footer-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-lg-3 footer-widget-resp">
                                <div class="footer-widget">
                                    <h6 class="footer-title">About Us</h6>
                                    <p class="footer-desc">
                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.
                                    </p>
                                    <div class="footer-social-links">
                                        <a href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fab fa-dribbble"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 footer-widget-resp">
                                <div class="footer-widget footer-widget-pl">
                                    <h6 class="footer-title">Links</h6>
                                    <ul class="footer-links">
                                        <li>
                                            <a href="#">Home</a>
                                        </li>
                                        <li>
                                            <a href="#">Services</a>
                                        </li>
                                        <li>
                                            <a href="#">Pricing</a>
                                        </li>
                                        <li>
                                            <a href="#">Blog</a>
                                        </li>
                                        <li>
                                            <a href="#">Clients</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 footer-widget-resp">
                                <div class="footer-widget">
                                    <h6 class="footer-title">Help</h6>
                                    <ul class="footer-links">
                                        <li>
                                            <a href="#">Privacy Policy</a>
                                        </li>
                                        <li>
                                            <a href="#">404 Page</a>
                                        </li>
                                        <li>
                                            <a href="#">Documentation</a>
                                        </li>
                                        <li>
                                            <a href="#">Blog Single</a>
                                        </li>
                                        <li>
                                            <a href="#">Support Policy</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 footer-widget-resp">
                                <div class="footer-widget">
                                    <h6 class="footer-title">Contact Info</h6>
                                    <div class="footer-contact-info-wrap">
                                        <ul class="footer-contact-info-list">
                                            <li>
                                                <i class="fa fa-map-marker-alt"></i>
                                                <span>221b Baker Street, Londra</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-phone"></i>
                                                <span>+02 - 123 456 78 9</span>
                                            </li>
                                            <li>
                                                <i class="fa fa-envelope"></i>
                                                <span>example@gmail.com</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <div class="container">
                        <p class="copyright-text">© Copyright.<span id="fullYearCopyright"></span> Design with By ElseColor</p>
                    </div>
                </div>
            </footer>

    @endif

@endif
<!-- Footer End -->

    @if (isset($quick_access_button))

        @if ($quick_access_button->status == 1 && $quick_access_button->status_phone == 1)

            @if ($quick_access_button->contact == "fas fa-envelope")
                <a href="mailto:{{ $quick_access_button->email_or_phone }}" class="facebook-link-btn"><i class="{{ $quick_access_button->contact }}"></i></a>
            @else
                <a href="tel:{{ $quick_access_button->email_or_phone }}" class="facebook-link-btn"><i class="{{ $quick_access_button->contact }}"></i></a>
            @endif
        <!-- Whatsapp Btn -->

            <a href="{{ $quick_access_button->link }}" class="whatsapp-link-btn"><i class="{{ $quick_access_button->social_media }}"></i></a>
            <!-- Facebook Btn -->

        @elseif ($quick_access_button->status == 1 && $quick_access_button->status_phone == 0)

            <a href="{{ $quick_access_button->link }}" class="facebook-link-btn"><i class="{{ $quick_access_button->social_media }}"></i></a>
            <!-- Whatsapp Btn -->

        @elseif ($quick_access_button->status == 0 && $quick_access_button->status_phone == 1)

            @if ($quick_access_button->contact == "fas fa-envelope")
                <a href="mailto:{{ $quick_access_button->email_or_phone }}" class="facebook-link-btn"><i class="{{ $quick_access_button->contact }}"></i></a>
            @else
                <a href="tel:{{ $quick_access_button->email_or_phone }}" class="facebook-link-btn"><i class="{{ $quick_access_button->contact }}"></i></a>
            @endif
        <!-- Whatsapp Btn -->
        @endif

    @endif

<!-- Back To Top Start -->
    <a href="#" class="scroll-top-btn" data-scroll-goto="1">
        <span class="fa fa-arrow-up"></span>
    </a>
    <!-- Back To Top End -->

    <!-- Preloader Start-->
    @if ($section_arr['preloader'] == 1)
        <div class="preloader-wrap">
            <div id="loader"></div>
        </div>
@endif
<!-- Preloader  End-->

</div>
<!-- Page Wrapper End -->



<!-- Scripts -->
<script src="{{ asset('assets/frontend/creative/js/jquery.js') }}"></script>
<script src="{{ asset('assets/frontend/creative/js/plugins.js') }}"></script>

<!-- Theme Main Js  -->
<!-- Theme Main Js  -->
@if (session()->has('language_direction_from_dropdown'))

    @if(session()->get('language_direction_from_dropdown') == 1)

        <!-- Theme Main Js  -->
        <script src="{{ asset('assets/frontend/creative/js/rtl.js') }}"></script>

    @endif

    @if(session()->get('language_direction_from_dropdown') == 0)

        <!-- Theme Main Js  -->
        <script src="{{ asset('assets/frontend/creative/js/main.js') }}" defer></script>

    @endif

@else

    <!-- Theme Main Js  -->
    <script src="{{ asset('assets/frontend/creative/js/main.js') }}" defer></script>

@endif


</body>
</html>