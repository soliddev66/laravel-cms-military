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
    <meta property="og:image" content="@if (!empty($general_site_image->favicon_image)){{ asset('uploads/img/general/'.$general_site_image->favicon_image) }} @endif">
    <meta itemprop="image" content="@if (!empty($general_site_image->favicon_image)){{ asset('uploads/img/general/'.$general_site_image->favicon_image) }} @endif">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="@if (!empty($general_site_image->favicon_image))){{ asset('uploads/assets/general/'.$general_site_image->favicon_image) }} @endif">
    <meta property="twitter:title" content="@if (isset($general_seo)){{ $general_seo->site_name }} @endif">
    <meta property="twitter:description" content="@if (isset($general_seo)){{ $general_seo->site_desc }} @endif">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{ __('frontend.home') }} @if (isset($general_seo)) - {{ $general_seo->site_name }} @endif</title>

@if (!empty($general_site_image->favicon_image))
    <!-- Favicon -->
        <link href="{{ asset('uplods/img/general/'.$general_site_image->favicon_image) }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('uploads/img/general/'.$general_site_image->favicon_image) }}" sizes="128x128" rel="shortcut icon" />
@else
    <!-- Favicon -->
        <link href="{{ asset('uplods/img/dummy/favicon.png') }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('uploads/img/dummy/favicon.png') }}" sizes="128x128" rel="shortcut icon" />
@endif

<!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/landing/fonts/font_awesome/css/all.css') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i&display=swap&subset=latin-ext" rel="stylesheet">

    <!-- FrameWorks -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/landing/css/frameworks.css') }}">

    <!-- Theme Css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/landing/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    @if ($homepage_version->color == 0)
        <link rel="stylesheet" href="{{ asset('assets/frontend/landing/css/color/default.css') }}">
    @elseif ($homepage_version->color == 1)
        <link rel="stylesheet" href="{{ asset('assets/frontend/landing/css/color/aqua.css') }}">
    @elseif ($homepage_version->color == 2)
        <link rel="stylesheet" href="{{ asset('assets/frontend/landing/css/color/blue.css') }}">
    @elseif ($homepage_version->color == 3)
        <link rel="stylesheet" href="{{ asset('assets/frontend/landing/css/color/fusion_red.css') }}">
    @elseif ($homepage_version->color == 4)
        <link rel="stylesheet" href="{{ asset('assets/frontend/landing/css/color/green.css') }}">
    @elseif ($homepage_version->color == 5)
        <link rel="stylesheet" href="{{ asset('assets/frontend/landing/css/color/olive_green.css') }}">
    @elseif ($homepage_version->color == 6)
        <link rel="stylesheet" href="{{ asset('assets/frontend/landing/css/color/orange.css') }}">
    @elseif ($homepage_version->color == 7)
        <link rel="stylesheet" href="{{ asset('assets/frontend/landing/css/color/pink.css') }}">
    @elseif ($homepage_version->color == 8)
        <link rel="stylesheet" href="{{ asset('assets/frontend/landing/css/color/purple.css') }}">
    @elseif ($homepage_version->color == 9)
        <link rel="stylesheet" href="{{ asset('assets/frontend/landing/css/color/red.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('assets/frontend/landing/css/color/yellow.css') }}">
    @endif

    <!-- Theme RTL Css -->
    @if (session()->has('language_direction_from_dropdown'))

        @if(session()->get('language_direction_from_dropdown') == 1)

            <link rel="stylesheet" href="{{ asset('assets/frontend/landing/css/rtl.css') }}">

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
<body @if (session()->has('language_direction_from_dropdown')) @if(session()->get('language_direction_from_dropdown') == 1)  class="rtl-mode" @endif @endif  data-spy="scroll" data-target="#fixedNavbar" data-offset="70">

<div class="page-wrapper">

    <!-- Header Start -->
    <header class="header fixed-top">
        <div class="container container-btm-border">
            <nav class="navbar navbar-expand-lg p-0 bg-white">
                <a class="navbar-logo" href="{{ url('/') }}">
                    @if (!empty($general_site_image->site_white_logo_image))
                        <img src="{{ asset('uploads/img/general/'.$general_site_image->site_white_logo_image) }}" alt="Logo" class="img-fluid logo-transparent">
                    @else
                        <img src="{{ asset('uploads/common_dummy/logo.png') }}" alt="Logo" class="img-fluid logo-transparent" style="width: 90px; height: 70px">
                    @endif
                    @if (!empty($general_site_image->site_colored_logo_image))
                        <img src="{{ asset('uploads/img/general/'.$general_site_image->site_colored_logo_image) }}" alt="Logo" class="img-fluid logo-normal">
                    @else
                        <img src="{{ asset('uploads/common_dummy/logo.png') }}" alt="Logo" class="img-fluid logo-normal" style="width: 90px; height: 70px">
                    @endif
                    <!-- <img src="{{ asset('assets/frontend/img/logo.png') }}" alt="Logo" class="img-fluid logo-transparent" style="width: 90px; height: 70px"> -->
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#fixedNavbar" aria-controls="fixedNavbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="togler-icon-inner">
                            <span class="line-1"></span>
                            <span class="line-2"></span>
                            <span class="line-3"></span>
                        </span>
                </button>
                <div class="collapse navbar-collapse main-menu justify-content-end" id="fixedNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="blogDropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span>{{ $username }}</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="blogDropdownMenu">     
                                    <a href="{{ route('change.password') }}" class="dropdown-item">Change Password</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('menu.logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                        </li>
                        
                        @if (count($display_dropdowns) > 0)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="blogDropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="fas fa-globe"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="blogDropdownMenu">
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

</div>

<a href="#" data-scroll-goto="1" class="scroll-top-btn"><i class="fa fa-arrow-up"></i></a>
<!-- Scroll Top Btn -->

@if (isset($quick_access_button))

    @if ($quick_access_button->status == 1 && $quick_access_button->status_phone == 1)

        @if ($quick_access_button->contact == "fas fa-envelope")
            <a href="mailto:{{ $quick_access_button->email_or_phone }}" class="whatsapp-btn"><i class="{{ $quick_access_button->contact }}"></i></a>
        @else
            <a href="tel:{{ $quick_access_button->email_or_phone }}" class="whatsapp-btn"><i class="{{ $quick_access_button->contact }}"></i></a>
        @endif
        <!-- Whatsapp Btn -->

        <a href="{{ $quick_access_button->link }}" class="facebook-btn"><i class="{{ $quick_access_button->social_media }}"></i></a>
        <!-- Facebook Btn -->

    @elseif ($quick_access_button->status == 1 && $quick_access_button->status_phone == 0)

        <a href="{{ $quick_access_button->link }}" class="whatsapp-btn"><i class="{{ $quick_access_button->social_media }}"></i></a>
        <!-- Whatsapp Btn -->

    @elseif ($quick_access_button->status == 0 && $quick_access_button->status_phone == 1)

        @if ($quick_access_button->contact == "fas fa-envelope")
            <a href="mailto:{{ $quick_access_button->email_or_phone }}" class="whatsapp-btn"><i class="{{ $quick_access_button->contact }}"></i></a>
        @else
            <a href="tel:{{ $quick_access_button->email_or_phone }}" class="whatsapp-btn"><i class="{{ $quick_access_button->contact }}"></i></a>
        @endif
        <!-- Whatsapp Btn -->
    @endif


@endif

<!-- Preloader Start-->
@if ($section_arr['preloader'] == 1)
    <div class="preloader-wrap">
        <div class="preloader-inner">
            <div id="loader"></div>
        </div>
    </div>
@endif
<!-- Preloader End-->



<!-- Scripts -->
<script src="{{ asset('assets/frontend/landing/js/jquery.js') }}"></script>
<script src="{{ asset('assets/frontend/landing/js/plugins.js') }}" defer></script>

@if (session()->has('language_direction_from_dropdown'))

    @if(session()->get('language_direction_from_dropdown') == 1)

        <!-- Theme Main Js  -->
        <script src="{{ asset('assets/frontend/landing/js/rtl.js') }}"></script>

    @endif

    @if(session()->get('language_direction_from_dropdown') == 0)

        <!-- Theme Main Js  -->
        <script src="{{ asset('assets/frontend/landing/js/main.js') }}" defer></script>

    @endif

@else

    <!-- Theme Main Js  -->
    <script src="{{ asset('assets/frontend/landing/js/main.js') }}" defer></script>

@endif



</body>
</html>