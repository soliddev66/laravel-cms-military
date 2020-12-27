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
    <meta name="twitter:image" content="@if (!empty($general_site_image->favicon_image)){{ asset('uploads/img/general/'.$general_site_image->favicon_image) }} @endif">
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
    <!-- <link rel="stylesheet" href="{{ asset('assets/frontend/landing/css/style.css') }}"> -->

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
        <div class="container">
            <nav class="navbar navbar-expand-lg p-0">
                <a class="navbar-brand" href="{{ url('/') }}">
                    @if (!empty($general_site_image->site_white_logo_image))
                        <img src="{{ asset('uploads/img/general/'.$general_site_image->site_white_logo_image) }}" alt="Logo" class="img-fluid logo-transparent">
                    @else
                        <img src="{{ asset('uploads/common_dummy/logo-white.png') }}" alt="Logo" class="img-fluid logo-transparent">
                    @endif
                    @if (!empty($general_site_image->site_colored_logo_image))
                        <img src="{{ asset('uploads/img/general/'.$general_site_image->site_colored_logo_image) }}" alt="Logo" class="img-fluid logo-normal">
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
                <div class="collapse navbar-collapse main-menu justify-content-end" id="fixedNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-scroll-nav="1">{{ __('frontend.home') }}</a>
                        </li>
                        @if ($section_arr['about_section'] == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-scroll-nav="2">{{ __('frontend.about') }}</a>
                            </li>
                            @endif
                       @if ($section_arr['service_section'] == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-scroll-nav="3">{{ __('frontend.services') }}</a>
                            </li>
                           @endif
                        @if ($section_arr['price_section'] == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-scroll-nav="4">{{ __('frontend.pricing') }}</a>
                            </li>
                            @endif
                       @if ($section_arr['blog_section'] == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('blogs') }}">{{ __('frontend.blogs') }}</a>
                            </li>
                           @endif
                        @if ($section_arr['page_menu'] == 1)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="pageDropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ __('frontend.pages') }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="pageDropdownMenu">
                                    @foreach ($pages as $page)
                                        @if ($page->display_footer_menu != 1)
                                            <a class="dropdown-item" href="{{ url('page/'.$page->page_slug) }}">{{ $page->page_title }}</a>
                                        @endif
                                    @endforeach
                                    @php unset($page); @endphp
                                </div>
                            </li>
                            @endif
                        @if ($section_arr['contact_section'] == 1)
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#" data-scroll-nav="5">{{ __('frontend.contact') }}</a>
                            </li>
                            @endif
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
                        @isset ($external_url)
                           @if ($external_url->status == 1)
                            <li class="nav-item navbar-btn">
                                <a href="{{ $external_url->btn_link }}" class="default-button">
                                    {{ $external_url->btn_name }}
                                </a>
                            </li>
                            @endif
                        @endisset

                        <li class="nav-item">

                            <!-- Authentication -->
                            <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                <i class="fas fa-link" aria-hidden="true"></i>
                                {{ __('menu.logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- Header End -->

    <!-- Hero Start -->
    @if ($homepage_version->choose_version == 0)

        @if (isset($bg_image) || isset($fixed_content))
            <section id="home" class="jarallax" data-scroll-index="1" data-jarallax="" data-speed="0.6s" style="@if (isset($bg_image)) background-image: url({{ asset('uploads/img/general/'.$bg_image->background_image) }}); @else background-image: url({{ asset('uploads/common_dummy/1920x1080.jpg') }}); @endif">
                <div class="banner-wrap">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="banner-content">
                                    @if (isset($fixed_content))
                                        <h1 class="wow fadeInUp" data-wow-delay="0.1s">{{ $fixed_content->title }}</h1>
                                        <p class="wow fadeInUp" data-wow-delay="0.2s">{{ $fixed_content->desc }}</p>
                                        @if (!empty($fixed_content->btn_name))
                                            <div class="holder-link wow fadeInUp" data-wow-delay="0.3s">
                                                <a href="#" data-scroll-nav="7" class="default-button">{{ $fixed_content->btn_name }}</a>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 banner-right text-right wow fadeInUp" data-wow-delay="0.3s">
                                <div class="img-jump">
                                    @if (!empty($fixed_content->thumbnail_image))
                                        <img src="{{ asset('uploads/img/general/'.$fixed_content->thumbnail_image) }}" alt="App image" class="img-fluid">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="scroll-down-btn" data-scroll-nav="2">
                    <i class="fa fa-arrow-down"></i>
                </a>
            </section>
        @else
            <section id="home" class="jarallax" data-scroll-index="1" data-jarallax="" data-speed="0.6s" style="background-image: url({{ asset('uploads/common_dummy/1920x1080.jpg') }});">
                <div class="banner-wrap">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="banner-content">
                                    <h1 class="wow fadeInUp" data-wow-delay="0.1s">Increase your app performance</h1>
                                    <p class="wow fadeInUp" data-wow-delay="0.2s">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </p>
                                    <div class="holder-link wow fadeInUp" data-wow-delay="0.3s">
                                        <a href="#" data-scroll-nav="7" class="default-button">
                                            Download App
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 banner-right text-right wow fadeInUp" data-wow-delay="0.3s">
                                <div class="img-jump">
                                    <img src="{{ asset('uploads/common_dummy/375x670.jpg') }}" alt="App image" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="scroll-down-btn" data-scroll-nav="2">
                    <i class="fa fa-arrow-down"></i>
                </a>
            </section>
        @endif

    @elseif ($homepage_version->choose_version == 1)

        @if (count($sliders) || isset($fixed_content))
            <section class="hero-slider-wrap" id="heroSliderContainer" data-scroll-index="1">
                <div class="banner-wrap">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="banner-content">
                                    @if (isset($fixed_content))
                                        <h1 class="wow fadeInUp" data-wow-delay="0.1s">{{ $fixed_content->title }}</h1>
                                        <p class="wow fadeInUp" data-wow-delay="0.2s">{{ $fixed_content->desc }}</p>
                                    @endif
                                    @if (!empty($fixed_content->btn_name))
                                        <div class="holder-link wow fadeInUp" data-wow-delay="0.3s">
                                            <a href="#" data-scroll-nav="7" class="default-button">{{ $fixed_content->btn_name }}</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="scroll-down-btn" data-scroll-nav="2">
                    <i class="fa fa-arrow-down"></i>
                </a>
            </section>
        @else
            <section class="hero-slider-wrap" id="heroSliderContainer" data-scroll-index="1">
                <div class="banner-wrap">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="banner-content">
                                    <h1 class="wow fadeInUp" data-wow-delay="0.1s">Increase your app performance </h1>
                                    <p class="wow fadeInUp" data-wow-delay="0.2s">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </p>
                                    <div class="holder-link wow fadeInUp" data-wow-delay="0.3s">
                                        <a href="#" data-scroll-nav="7" class="default-button">
                                            Download App
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="scroll-down-btn" data-scroll-nav="2">
                    <i class="fa fa-arrow-down"></i>
                </a>
            </section>
    @endif

@elseif ($homepage_version->choose_version == 2)

        @if (isset($video) || isset($fixed_content))
            <section class="hero-video-wrap" id="heroVideo" data-scroll-index="1">
            <div id="video-background" class="player bg-overlay" data-property="{videoURL:'@if (isset($video)){{ $video->video_link }}@endif',containment:'.hero-video-wrap',showControls:false, autoPlay:true, loop:true, mute:true, startAt:0, opacity:1, quality:'default'}"></div>
            <div class="hero-overlay"></div>
            <div class="banner-wrap">
                <div class="container video-content">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="banner-content">
                               @if (isset($fixed_content))
                                    <h1 class="wow fadeInUp" data-wow-delay="0.1s">{{ $fixed_content->title }}</h1>
                                    <p class="wow fadeInUp" data-wow-delay="0.2s">{{ $fixed_content->desc }}</p>
                                   @endif
                               @if (!empty($fixed_content->btn_name))
                                       <div class="holder-link wow fadeInUp" data-wow-delay="0.3s">
                                           <a href="#" data-scroll-nav="7" class="default-button">{{ $fixed_content->btn_name }}</a>
                                       </div>
                                   @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#" class="scroll-down-btn" data-scroll-nav="2">
                <i class="fa fa-arrow-down"></i>
            </a>
        </section>
        @else
            <section class="hero-video-wrap" id="heroVideo" data-scroll-index="1">
                <div id="video-background" class="player bg-overlay" data-property="{videoURL:'https://www.youtube.com/watch?v=yI7UHzq_4XY',containment:'.hero-video-wrap',showControls:false, autoPlay:true, loop:true, mute:true, startAt:0, opacity:1, quality:'default'}"></div>
                <div class="hero-overlay"></div>
                <div class="banner-wrap">
                    <div class="container video-content">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="banner-content">
                                    <h1 class="wow fadeInUp" data-wow-delay="0.1s">Increase your app performance </h1>
                                    <p class="wow fadeInUp" data-wow-delay="0.2s">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </p>
                                    <div class="holder-link wow fadeInUp" data-wow-delay="0.3s">
                                        <a href="#" data-scroll-nav="7" class="default-button">
                                            Download App
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="scroll-down-btn" data-scroll-nav="2">
                    <i class="fa fa-arrow-down"></i>
                </a>
            </section>
    @endif

@elseif ($homepage_version->choose_version == 3)

@if (isset($bg_image) || isset($fixed_content))
            <section class="hero-ripless-banner" data-scroll-index="1" style="@if (isset($bg_image)) background-image: url({{ asset('uploads/img/general/'.$bg_image->background_image) }}); @else background-image: url({{ asset('uploads/common_dummy/1920x1080.jpg') }}); @endif">
                <div class="banner-wrap">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="banner-content">
                                   @isset ($fixed_content)
                                        <h1 class="wow fadeInUp" data-wow-delay="0.1s">{{ $fixed_content->title }}</h1>
                                        <p class="wow fadeInUp" data-wow-delay="0.2s">{{ $fixed_content->desc }}</p>
                                       @endisset
                                   @if(!empty($fixed_content->btn_name))
                                           <div class="holder-link wow fadeInUp" data-wow-delay="0.3s">
                                               <a href="#" data-scroll-nav="7" class="default-button">{{ $fixed_content->btn_name }}</a>
                                           </div>
                                       @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="scroll-down-btn" data-scroll-nav="2">
                    <i class="fa fa-arrow-down"></i>
                </a>
            </section>
        @else
            <section class="hero-ripless-banner" data-scroll-index="1" style="background-image: url({{ asset('uploads/common_dummy/1920x1080.jpg') }});">
                <div class="banner-wrap">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="banner-content">
                                    <h1 class="wow fadeInUp" data-wow-delay="0.1s">Increase your app performance </h1>
                                    <p class="wow fadeInUp" data-wow-delay="0.2s">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </p>
                                    <div class="holder-link wow fadeInUp" data-wow-delay="0.3s">
                                        <a href="#" data-scroll-nav="7" class="default-button">
                                            Download App
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="scroll-down-btn" data-scroll-nav="2">
                    <i class="fa fa-arrow-down"></i>
                </a>
            </section>
    @endif

@elseif ($homepage_version->choose_version == 4)

    @if (isset($bg_image) || isset($fixed_content))
            <section class="hero-particles-banner jarallax" data-jarallax="" data-speed="0.6s" data-scroll-index="1">
                <img src="@if (isset($bg_image)) {{ asset('uploads/img/general/'.$bg_image->background_image) }} @else {{ asset('uploads/common_dummy/1920x1080.jpg') }} @endif" alt="bg image" class="jarallax-img">
                <div id="heroparticles"></div>
                <div class="banner-wrap">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="banner-content">
                                   @isset($fixed_content)
                                        <h1 class="wow fadeInUp" data-wow-delay="0.1s">{{ $fixed_content->title }}</h1>
                                        <p class="wow fadeInUp" data-wow-delay="0.2s">{{ $fixed_content->desc }}</p>
                                       @endisset
                                   @if (!empty($fixed_content->btn_name))
                                           <div class="holder-link wow fadeInUp" data-wow-delay="0.3s">
                                               <a href="#" data-scroll-nav="7" class="default-button">{{ $fixed_content->btn_name }}</a>
                                           </div>
                                       @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="scroll-down-btn" data-scroll-nav="2">
                    <i class="fa fa-arrow-down"></i>
                </a>
            </section>
    @else
            <section class="hero-particles-banner jarallax" data-jarallax="" data-speed="0.6s" data-scroll-index="1">
                <img src="{{ asset('uploads/common_dummy/1920x1080.jpg') }}" alt="" class="jarallax-img">
                <div id="heroparticles"></div>
                <div class="banner-wrap">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="banner-content">
                                    <h1 class="wow fadeInUp" data-wow-delay="0.1s">Increase your app performance </h1>
                                    <p class="wow fadeInUp" data-wow-delay="0.2s">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </p>
                                    <div class="holder-link wow fadeInUp" data-wow-delay="0.3s">
                                        <a href="#" data-scroll-nav="7" class="default-button">
                                            Download App
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="scroll-down-btn" data-scroll-nav="2">
                    <i class="fa fa-arrow-down"></i>
                </a>
            </section>
    @endif

    @else

        @if (isset($bg_image) || isset($fixed_content))
            <section class="hero-glitch-banner" data-scroll-index="1">
                <div class="overlay-glitch"></div>
                <div class="banner-wrap">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="banner-content">
                                   @isset ($fixed_content)
                                        <h1 class="wow fadeInUp" data-wow-delay="0.1s">{{ $fixed_content->title }}</h1>
                                        <p class="wow fadeInUp" data-wow-delay="0.2s">{{ $fixed_content->desc }}</p>
                                       @endisset
                                   @if(!empty($fixed_content->btn_name))
                                           <div class="holder-link wow fadeInUp" data-wow-delay="0.3s">
                                               <a href="#" data-scroll-nav="7" class="default-button">{{ $fixed_content->btn_name }}</a>
                                           </div>
                                       @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="scroll-down-btn" data-scroll-nav="2">
                    <i class="fa fa-arrow-down"></i>
                </a>
                <div class="glitch-img" style="@if (isset($bg_image)) background-image: url({{ asset('uploads/img/general/'.$bg_image->background_image) }}); @else background-image: url({{ asset('uploads/common_dummy/1920x1080.jpg') }}); @endif"></div>
            </section>
        @else
            <section class="hero-glitch-banner" data-scroll-index="1">
                <div class="overlay-glitch"></div>
                <div class="banner-wrap">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="banner-content">
                                    <h1 class="wow fadeInUp" data-wow-delay="0.1s">Increase your app performance </h1>
                                    <p class="wow fadeInUp" data-wow-delay="0.2s">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </p>
                                    <div class="holder-link wow fadeInUp" data-wow-delay="0.3s">
                                        <a href="#" data-scroll-nav="7" class="default-button">
                                            Download App
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="scroll-down-btn" data-scroll-nav="2">
                    <i class="fa fa-arrow-down"></i>
                </a>
                <div class="glitch-img" style="background-image: url({{ asset('uploads/common_dummy/1920x1080.jpg') }});"></div>
            </section>
    @endif

@endif
    <!-- Hero End -->

    <!-- About App Start -->
    @if ($section_arr['about_section'] == 1)

        @isset ($about)
            <section class="section" id="about-app" data-scroll-index="2">
                <div class="container">
                    <div class="row align-items-center">
                        @if (!empty($about->about_image))
                            <div class="col-lg-6 about-image wow fadeInLeft" data-wow-delay="0.1s">
                                <div class="img-jump">
                                    <img class="img-fluid" src="{{ asset('uploads/img/general/'.$about->about_image) }}" alt="About image">
                                </div>
                            </div>
                        @endif
                        <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">
                            <div class="about-content-inner">
                                <h4>{{ $about->title }}</h4>
                                <p>{{ $about->desc }}</p>
                                @if (count($info_lists) > 0)
                                    <ul>
                                        @foreach ($info_lists as $info_list)
                                            <li>{{ $info_list->desc }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                @if (!empty($about->btn_name))
                                    <a href="@if (!empty($about->btn_link)) {{ $about->btn_link }} @else # @endif" class="primary-button">{{ $about->btn_name }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <section class="section" id="about-app" data-scroll-index="2">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 about-image wow fadeInLeft" data-wow-delay="0.1s">
                            <div class="img-jump">
                                <img class="img-fluid" src="{{ asset('uploads/common_dummy/540x540.jpg') }}" alt="About image">
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">
                            <div class="about-content-inner">
                                <h4>Discover the unique features</h4>
                                <p>
                                    Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content.
                                </p>
                                <p>
                                    Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content.
                                </p>
                                <ul>
                                    <li>Open login page</li>
                                    <li>Check the secure login option</li>
                                    <li>Login by entering your user information</li>
                                </ul>
                                <a href="#" class="primary-button">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endisset

    @endif
    <!-- About App End -->

    <!-- Services Start -->
    @if ($section_arr['service_section'] == 1)

        @if (isset($service_section) || count($services) > 0)
            <section class="section pb-minus-70" id="services" data-scroll-index="3">
                <div class="container">
                    @if (isset($service_section))
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="section-heading">
                                    @if (!empty($service_section->title)) <h2 class="section-title">{{ $service_section->title }}</h2> @endif
                                    @if (!empty($service_section->desc)) <p>{{ $service_section->desc }}</p> @endif
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        @php $i = 1; @endphp
                        @foreach ($services as $service)
                            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.{{ $i++ }}s">
                                <div class="services-item">
                                    @if (!empty($service->icon))
                                        <div class="services-icon">
                                            <i class="{{ $service->icon }}"></i>
                                        </div>
                                    @endif
                                    <div class="services-body">
                                        @if (!empty($service->title))  <h5>{{ $service->title }}</h5> @endif
                                        @if (!empty($service->desc)) <p>{{ $service->desc }}</p> @endif
                                    </div>
                                </div>
                            </div>
                            @if ($i > 2) @php $i = 1; @endphp @endif
                        @endforeach
                    </div>
                </div>
            </section>
        @else
            <section class="section pb-minus-70" id="services" data-scroll-index="3">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section-heading">
                                <h2 class="section-title">We Provide the Best Service</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci dolor fuga, magnam et sed quidem.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="services-item">
                                <div class="services-icon">
                                    <i class="fa fa-shield-alt"></i>
                                </div>
                                <div class="services-body">
                                    <h5>High Security</h5>
                                    <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="services-item">
                                <div class="services-icon">
                                    <i class="fa fa-bell"></i>
                                </div>
                                <div class="services-body">
                                    <h5>Notification</h5>
                                    <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="services-item">
                                <div class="services-icon">
                                    <i class="fas fa-money-check"></i>
                                </div>
                                <div class="services-body">
                                    <h5>Online Payment</h5>
                                    <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="services-item">
                                <div class="services-icon">
                                    <i class="fas fa-sync-alt"></i>
                                </div>
                                <div class="services-body">
                                    <h5>Free Update</h5>
                                    <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="services-item">
                                <div class="services-icon">
                                    <i class="fas fa-toggle-on"></i>
                                </div>
                                <div class="services-body">
                                    <h5>Menu Options</h5>
                                    <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="services-item">
                                <div class="services-icon">
                                    <i class="fas fa-envelope-open-text"></i>
                                </div>
                                <div class="services-body">
                                    <h5>Live Chat</h5>
                                    <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

    @endif
    <!-- Services End  -->

    <!-- Features Start -->
    @if ($section_arr['feature_section'] == 1)

        @if (isset($feature_section) || count($features) > 0)
            <section class="section" id="features">
                <div class="container">
                    @if (isset($feature_section))
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="section-heading">
                                    @if (!empty($feature_section->title)) <h2 class="section-title">{{ $feature_section->title }}</h2> @endif
                                    @if (!empty($feature_section->desc)) <p>{{ $feature_section->desc }}</p> @endif
                                </div>
                            </div>
                        </div>
                        @endif
                    <div class="row justify-content-center">
                        @if(!empty($feature_section->feature_image))
                            <div class="col-lg-6 features-image wow fadeInUp" data-wow-delay="0.1s">
                                <div class="img-jump">
                                    <img class="img-fluid" src="{{ asset('uploads/img/general/'.$feature_section->feature_image) }}" alt="features image">
                                </div>
                            </div>
                            @endif
                        <div class="@if(!empty($feature_section->feature_image)) col-lg-6 @else col-lg-12 @endif feautures-column">
                            @php $i = 0; @endphp
                        @foreach ($features as $feature)
                                <div class="feautures-box wow fadeInDown" data-wow-delay="0.{{ $i = $i + 2 }}s">
                                   @if (!empty($feature->icon))
                                        <div class="icon">
                                            <span class="{{ $feature->icon }}"></span>
                                        </div>
                                       @endif
                                    <div class="body">
                                        @if (!empty($feature->title)) <h6>{{ $feature->title }}</h6> @endif
                                        @if (!empty($feature->desc)) <p>{{ $feature->desc }}</p>@endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </section>
        @else
            <section class="section" id="features">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section-heading">
                                <h2 class="section-title">Extra Features</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci dolor fuga, magnam et sed quidem.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-6 features-image wow fadeInUp" data-wow-delay="0.1s">
                            <div class="img-jump">
                                <img class="img-fluid" src="{{ asset('uploads/common_dummy/540x540.jpg') }}" alt="Features tab image">
                            </div>
                        </div>
                        <div class="col-lg-6 feautures-column">
                            <div class="feautures-box wow fadeInDown" data-wow-delay="0.2s">
                                <div class="icon">
                                    <span class="fas fa-tablet-alt"></span>
                                </div>
                                <div class="body">
                                    <h6>Full Responsive</h6>
                                    <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                            <div class="feautures-box wow fadeInDown" data-wow-delay="0.5s">
                                <div class="icon">
                                    <span class="fas fa-adjust"></span>
                                </div>
                                <div class="body">
                                    <h6>Unlimited Color</h6>
                                    <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                            <div class="feautures-box wow fadeInDown" data-wow-delay="0.7s">
                                <div class="icon">
                                    <span class="fa fa-cogs"></span>
                                </div>
                                <div class="body">
                                    <h6>Easy Customize</h6>
                                    <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
    @endif

@endif
    <!-- Features End  -->

    <!-- Counter Start -->
    @if ($section_arr['counter_section'] == 1)

        @if (isset($counter_section) || count($counters) > 0)
            <section class="section pb-minus-70 jarallax" data-jarallax="" data-speed="0.6s" id="counters" style="@if (!empty($counter_section->counter_image)) background-image: url({{ asset('uploads/img/general/'.$counter_section->counter_image) }}); @endif">
                <div class="container">
                    @if (isset($counter_section))
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="section-heading white-section-text">
                                    @if (!empty($counter_section->title)) <h2 class="section-title">{{ $counter_section->title }}</h2> @endif
                                    @if (!empty($counter_section->desc)) <p>{{ $counter_section->desc }}</p> @endif
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        @php $i = 2; @endphp
                        @foreach ($counters as $counter)
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.{{ $i = $i +2 }}s">
                                <div class="counter-item">
                                    @if (!empty($counter->icon))
                                        <div class="counter-header">
                                            <i class="{{ $counter->icon }}"></i>
                                        </div>
                                    @endif
                                    <div class="counter-body">
                                        @if (!empty($counter->timer)) <h2 class="counter">{{ $counter->timer }}</h2> @endif
                                        @if (!empty($counter->desc)) <span>{{ $counter->desc }}</span> @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @else
            <section class="section pb-minus-70 jarallax" data-jarallax="" data-speed="0.6s" id="counters" style="background-image: url({{ asset('uploads/common_dummy/1920x1080.jpg') }});">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section-heading white-section-text">
                                <h2 class="section-title">Customers trusted us</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci dolor fuga, magnam et sed quidem.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="counter-item">
                                <div class="counter-header">
                                    <i class="mdi mdi-account-heart"></i>
                                </div>
                                <div class="counter-body">
                                    <h2 class="counter">1500</h2>
                                    <span>Customer</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.4s">
                            <div class="counter-item">
                                <div class="counter-header">
                                    <i class="mdi mdi-cloud-download"></i>
                                </div>
                                <div class="counter-body">
                                    <h2 class="counter">3000</h2>
                                    <span>Download</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.6s">
                            <div class="counter-item">
                                <div class="counter-header">
                                    <i class="mdi mdi-seal"></i>
                                </div>
                                <div class="counter-body">
                                    <h2 class="counter">1800</h2>
                                    <span>Awards</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6  col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.8s">
                            <div class="counter-item">
                                <div class="counter-header">
                                    <i class="mdi mdi-account-star"></i>
                                </div>
                                <div class="counter-body">
                                    <h2 class="counter">2500</h2>
                                    <span>Membership</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

    @endif
    <!-- Counter End -->

    <!-- How It Work Start -->
    @if ($section_arr['install_section'] == 1)

        @if (isset($install_section) || count($installs) > 0)
            <section id="how-it-work" class="section">
                <div class="container">
                    <div class="row align-items-center">
                       @if (!empty($install_section->install_image))
                            <div class="col-md-12 col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                                <div class="how-it-work-img">
                                    <img src="{{ asset('uploads/img/general/'.$install_section->install_image) }}"  alt="" class="img-fluid">
                                    @if(!empty($install_section->video_link))
                                        <div class="video-btn-wrap">
                                            <a href="{{ $install_section->video_link }}" class="video-button popup-youtube"><i class="fa fa-play"></i></a>
                                        </div>
                                        @endif
                                </div>
                            </div>
                           @endif
                        <div class="col-md-12 @if (!empty($install_section->install_image)) col-lg-6 @else col-lg-12 @endif">
                            <div class="how-it-works-inner">
                                @if (!empty($install_section->title)) <h4>{{ $install_section->title }}</h4> @endif
                                @if (!empty($install_section->desc)) <p>{{ $install_section->desc }}</p> @endif

                                @php $i = 2; @endphp
                                @foreach ($installs as $install)
                                        <div class="how-it-work-item wow fadeInDown" data-wow-delay="0.{{ $i = $i +2 }}s">
                                           @if (!empty($install->icon))
                                                <div class="how-it-work-icon">
                                                    <i class="{{ $install->icon }}"></i>
                                                </div>
                                               @endif
                                            <div class="how-it-work-body">
                                                @if (!empty($install->title))  <h6>{{ $install->title }}</h6> @endif
                                                @if (!empty($install->desc)) <p>{{ $install->desc }}</p> @endif
                                            </div>
                                        </div>
                                    @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <section id="how-it-work" class="section">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12 col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                            <div class="how-it-work-img">
                                <img src="{{ asset('uploads/common_dummy/650x650.jpg') }}"  alt="install image" class="img-fluid">
                                <div class="video-btn-wrap">
                                    <a href="https://www.youtube.com/watch?v=_2LLXnUdUIc" class="video-button popup-youtube"><i class="fa fa-play"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="how-it-works-inner">
                                <h4>How Application works and how to install ?</h4>
                                <p>
                                    Some quick example text to build on the card title and make up the
                                    bulk of the card's content. Some quick example text to build on the
                                    card title and
                                </p>
                                <div class="how-it-work-item wow fadeInDown" data-wow-delay="0.2s">
                                    <div class="how-it-work-icon">
                                        <i class="fa fa-download"></i>
                                    </div>
                                    <div class="how-it-work-body">
                                        <h6>Download App</h6>
                                        <p>
                                            Some quick example text to build on the card title and make up
                                            the bulk of the card's content.
                                        </p>
                                    </div>
                                </div>
                                <div class="how-it-work-item wow fadeInDown" data-wow-delay="0.4s">
                                    <div class="how-it-work-icon">
                                        <i class="fa fa-cogs"></i>
                                    </div>
                                    <div class="how-it-work-body">
                                        <h6>Install & Customize</h6>
                                        <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    @endif

        @endif
    <!-- How It Work End -->

    <!-- Screenshot Start -->
    @if ($section_arr['screenshot_section'] == 1)

        @if (isset($screenshot_section) || count($screenshots) > 0)
            <section id="screenshot" class="section">
                <div class="container">
                    @if (isset($screenshot_section))
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="section-heading">
                                    @if (!empty($screenshot_section->title))  <h2 class="section-title">{{ $screenshot_section->title }}</h2> @endif
                                    @if (!empty($screenshot_section->desc)) <p>{{ $screenshot_section->desc }}</p> @endif
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="screenshot-carousel owl-carousel owl-theme">
                                @foreach ($screenshots as $screenshot)
                                    <div class="item">
                                        <img src="{{ asset('uploads/img/screenshots/'.$screenshot->screenshot_image) }}" alt="app image" class="img-fluid">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <section id="screenshot" class="section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section-heading">
                                <h2 class="section-title">App Screenshots</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci dolor fuga, magnam et sed quidem.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="screenshot-carousel owl-carousel owl-theme">
                                <div class="item">
                                    <img src="{{ asset('uploads/common_dummy/350x640.jpg') }}" alt="screenshot image" class="img-fluid">
                                </div>
                                <div class="item">
                                    <img src="{{ asset('uploads/common_dummy/350x640.jpg') }}" alt="screenshot image" class="img-fluid">
                                </div>
                                <div class="item">
                                    <img src="{{ asset('uploads/common_dummy/350x640.jpg') }}" alt="screenshot image" class="img-fluid">
                                </div>
                                <div class="item">
                                    <img src="{{ asset('uploads/common_dummy/350x640.jpg') }}" alt="screenshot image" class="img-fluid">
                                </div>
                                <div class="item">
                                    <img src="{{ asset('uploads/common_dummy/350x640.jpg') }}" alt="screenshot image" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

    @endif
    <!-- Screenshot End -->

    <!-- Pricing Start -->
    @if ($section_arr['price_section'] == 1)

        @if (isset($price_section) || count($prices) > 0)
            <section id="pricing" class="section" data-scroll-index="4">
                <div class="container">
                   @if (isset($price_section))
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="section-heading">
                                    @if (!empty($price_section->title)) <h2 class="section-title">{{ $price_section->title }}</h2> @endif
                                    @if (!empty($price_section->desc)) <p>{{ $price_section->desc }}</p> @endif
                                </div>
                            </div>
                        </div>
                       @endif
                    <div class="pricing-carousel owl-carousel owl-theme">
                        @php $i = 0; @endphp
                        @foreach ($prices as $price)
                            @php
                                // Explode
                                 $str = $price->desc;
                                 $arr =  explode(";", $str);
                            @endphp
                            <div class="item">
                                <div class="price-table @if ($i == 1) active @endif">
                                    @if ($price->time == 1)
                                        <span class="price-badge">{{ __('frontend.monthly') }}</span>
                                        @else
                                        <span class="price-badge">{{ __('frontend.yearly') }}</span>
                                    @endif
                                    @if (!empty($price->title))
                                            <div class="price-title">
                                                <h6>{{ $price->title }}</h6>
                                            </div>
                                        @endif
                                   @if (!empty($price->icon))
                                            <div class="price-icon">
                                                <i class="{{ $price->icon }}"></i>
                                            </div>
                                       @endif
                                   @if (!empty($price->currency))
                                            <div class="price-text">
                                                <h2><sup>{{ $price->currency }}</sup>{{ $price->price }}</h2>
                                            </div>
                                       @endif
                                    <div class="price-list">
                                        <ul>
                                            @for ($i = 0; $i < count($arr); $i++)
                                                <li>{{ $arr[$i] }}</li>
                                            @endfor
                                        </ul>
                                    </div>
                                   @if (!empty($price->btn_name)) <a class="default-button" href="@if (!empty($price->btn_link)) {{ $price->btn_link }} @else # @endif">{{ $price->btn_name }}</a>  @endif
                                </div>
                            </div>

                            @php $i++; @endphp
                            @endforeach
                    </div>
                </div>
            </section>
            @else
            <section id="pricing" class="section" data-scroll-index="4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section-heading">
                                <h2 class="section-title">Choose best price <br>for you</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci dolor fuga, magnam et sed quidem.</p>
                            </div>
                        </div>
                    </div>
                    <div class="pricing-carousel owl-carousel owl-theme">
                        <div class="item">
                            <div class="price-table">
                                <span class="price-badge">Monthly</span>
                                <div class="price-title">
                                    <h6>Basic</h6>
                                </div>
                                <div class="price-icon">
                                    <i class="fa fa-paper-plane"></i>
                                </div>
                                <div class="price-text">
                                    <h2><sup><i class="fa fa-dollar-sign"></i></sup>39</h2>
                                </div>
                                <div class="price-list">
                                    <ul>
                                        <li>1 GB Space</li>
                                        <li>3 Domain Names</li>
                                        <li>15 Email Address</li>
                                        <li>Live Support</li>
                                    </ul>
                                </div>
                                <a class="default-button" href="#">Order Now</a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="price-table active">
                                <span class="price-badge">Monthly</span>
                                <div class="price-title">
                                    <h6>Premium</h6>
                                </div>
                                <div class="price-icon">
                                    <i class="fa fa-plane-departure"></i>
                                </div>
                                <div class="price-text">
                                    <h2><sup><i class="fa fa-dollar-sign"></i></sup>49</h2>
                                </div>
                                <div class="price-list">
                                    <ul>
                                        <li>5 GB Space</li>
                                        <li>6 Domain Names</li>
                                        <li>20 Email Address</li>
                                        <li>Live Support</li>
                                    </ul>
                                </div>
                                <a class="default-button" href="#">Order Now</a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="price-table">
                                <span class="price-badge">Monthly</span>
                                <div class="price-title">
                                    <h6>Business</h6>
                                </div>
                                <div class="price-icon">
                                    <i class="fa fa-industry"></i>
                                </div>
                                <div class="price-text">
                                    <h2><sup><i class="fa fa-dollar-sign"></i></sup>59</h2>
                                </div>
                                <div class="price-list">
                                    <ul>
                                        <li>20 GB Space</li>
                                        <li>Unlimited Traffic</li>
                                        <li>100 Email Address</li>
                                        <li>Live Support</li>
                                    </ul>
                                </div>
                                <a class="default-button" href="#">Order Now</a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="price-table">
                                <span class="price-badge">Monthly</span>
                                <div class="price-title">
                                    <h6>Ultimate</h6>
                                </div>
                                <div class="price-icon">
                                    <i class="fa fa-rocket"></i>
                                </div>
                                <div class="price-text">
                                    <h2><sup><i class="fa fa-dollar-sign"></i></sup>89</h2>
                                </div>
                                <div class="price-list">
                                    <ul>
                                        <li>2TB Space</li>
                                        <li>Unlimited Sites</li>
                                        <li>Unlimited Email</li>
                                        <li>Live Support</li>
                                    </ul>
                                </div>
                                <a class="default-button" href="#">Order Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endif

        @endif
    <!-- Pricing End -->

    <!-- Testimonial Section End -->
    @if ($section_arr['client_section'] == 1)

        @if (isset($testimonial_section) || count($testimonials) > 0)
            <section id="testimonials" class="section jarallax" data-jarallax="" data-speed="0.6s" style="@if (!empty($testimonial_section->testimonial_image)) background-image: url({{ asset('uploads/img/testimonials/'.$testimonial_section->testimonial_image) }}); @endif">
                <div class="container">
                    @if (isset($testimonial_section))
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="section-heading white-section-text">
                                    @if (!empty($testimonial_section->title)) <h2 class="section-title">{{ $testimonial_section->title }}</h2> @endif
                                    @if (!empty($testimonial_section->desc)) <p>{{ $testimonial_section->desc }}</p> @endif
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="testimonials-carousel owl-carousel owl-theme">
                        @foreach ($testimonials as $testimonial)
                            <div class="item">
                                <div class="testimonials-item">
                                   @if (!empty($testimonial->testimonial_image))
                                        <div class="testimonials-header">
                                            <img src="{{ asset('uploads/img/testimonials/'.$testimonial->testimonial_image) }}" alt="testimonials image" class="img-fluid">
                                        </div>
                                       @endif
                                    <div class="testimonials-body">
                                        @if (!empty($testimonial->name)) <h5>{{ $testimonial->name }}</h5> @endif
                                        @if (!empty($testimonial->job)) <span>{{ $testimonial->job }}</span> @endif
                                        @if (!empty($testimonial->desc)) <p>{{ $testimonial->desc }}</p> @endif
                                        <div class="testimonial-rating">
                                            @for ($i = 0; $i < $testimonial->star; $i++)
                                                <i class="fas fa-star"></i>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @else
            <section id="testimonials" class="section jarallax" data-jarallax="" data-speed="0.6s" style="background-image: url({{ asset('uploads/common_dummy/1920x1080.jpg') }});">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section-heading white-section-text">
                                <h2 class="section-title">What our clients say?</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci dolor fuga, magnam et sed quidem.</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonials-carousel owl-carousel owl-theme">
                        <div class="item">
                            <div class="testimonials-item">
                                <div class="testimonials-header">
                                    <img src="{{ asset('uploads/common_dummy/150x150.jpg') }}" alt="testimonials image" class="img-fluid">
                                </div>
                                <div class="testimonials-body">
                                    <h5>Matteo Vistocco</h5>
                                    <span>Customer</span>
                                    <p>
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                    </p>
                                    <div class="testimonial-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonials-item">
                                <div class="testimonials-header">
                                    <img src="{{ asset('uploads/common_dummy/150x150.jpg') }}" alt="testimonials image" class="img-fluid">
                                </div>
                                <div class="testimonials-body">
                                    <h5>Axel Eres</h5>
                                    <span>Customer</span>
                                    <p>
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                    </p>
                                    <div class="testimonial-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonials-item">
                                <div class="testimonials-header">
                                    <img src="{{ asset('uploads/common_dummy/150x150.jpg') }}" alt="testimonials image" class="img-fluid">
                                </div>
                                <div class="testimonials-body">
                                    <h5>Derick McKinney</h5>
                                    <span>Customer</span>
                                    <p>
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                    </p>
                                    <div class="testimonial-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonials-item">
                                <div class="testimonials-header">
                                    <img src="{{ asset('uploads/common_dummy/150x150.jpg') }}" alt="testimonials image" class="img-fluid">
                                </div>
                                <div class="testimonials-body">
                                    <h5>Axel Eres</h5>
                                    <span>Customer</span>
                                    <p>
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                    </p>
                                    <div class="testimonial-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @endif
    <!-- Testimonial Section End -->

    <!-- Team Start -->
    @if ($section_arr['team_section'] == 1)

        @if (isset($team_section) || count($teams) > 0)
            <section id="team" class="section">
                <div class="container">
                    @if (isset($team_section))
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="section-heading">
                                    @if (!empty($team_section->title)) <h2 class="section-title">{{ $team_section->title }}</h2> @endif
                                    @if (!empty($team_section->desc)) <p>{{ $team_section->desc }}</p> @endif
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="team-carousel owl-carousel owl-theme">
                        @foreach ($teams as $team)
                            <div class="item">
                                <div class="team-card">
                                    @if(!empty($team->team_image))
                                        <div class="team-img">
                                            <img class="img-fluid" src="{{ asset('uploads/img/teams/'.$team->team_image) }}" alt="team image">
                                        </div>
                                    @endif
                                    <div class="team-info">
                                        @if (!empty($team->name))  <h5>{{ $team->name }}</h5> @endif
                                        @if (!empty($team->job)) <span>{{ $team->job }}</span> @endif
                                    </div>
                                    <div class="team-social">
                                        @if (!empty($team->link_1))  <a href="@if (!empty($team->link_1)) @else # @endif"><i class="fab fa-facebook-f"></i></a> @endif
                                        @if (!empty($team->link_2))  <a href="@if (!empty($team->link_2)) @else # @endif"><i class="fab fa-twitter"></i></a> @endif
                                        @if (!empty($team->link_3))  <a href="@if (!empty($team->link_3)) @else # @endif"><i class="fab fa-instagram"></i></a> @endif
                                        @if (!empty($team->link_4))  <a href="@if (!empty($team->link_4)) @else # @endif"><i class="fab fa-linkedin"></i></a> @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @else
            <section id="team" class="section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section-heading">
                                <h2 class="section-title">Meet our expert <br> team</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci dolor fuga, magnam et sed quidem.</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-carousel owl-carousel owl-theme">
                        <div class="item">
                            <div class="team-card">
                                <div class="team-img">
                                    <img class="img-fluid" src="{{ asset('uploads/common_dummy/150x150.jpg') }}" alt="team image">
                                </div>
                                <div class="team-info">
                                    <h5>Deborah Brown</h5>
                                    <span>UI/UX Developer</span>
                                </div>
                                <div class="team-social">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="team-card">
                                <div class="team-img">
                                    <img class="img-fluid" src="{{ asset('uploads/common_dummy/150x150.jpg') }}" alt="team image">
                                </div>
                                <div class="team-info">
                                    <h5>Olivia Dunham</h5>
                                    <span>Software Engineer</span>
                                </div>
                                <div class="team-social">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="team-card">
                                <div class="team-img">
                                    <img class="img-fluid" src="{{ asset('uploads/common_dummy/150x150.jpg') }}" alt="team image">
                                </div>
                                <div class="team-info">
                                    <h5>Alen Walker</h5>
                                    <span>App Developer</span>
                                </div>
                                <div class="team-social">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="team-card">
                                <div class="team-img">
                                    <img class="img-fluid" src="{{ asset('uploads/common_dummy/150x150.jpg') }}" alt="team image">
                                </div>
                                <div class="team-info">
                                    <h5>Olivia Dunham</h5>
                                    <span>Software Engineer</span>
                                </div>
                                <div class="team-social">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

    @endif
    <!-- Team End -->


    <!-- Faq Start -->
    @if ($section_arr['faq_section'] == 1)

        @if (isset($faq_section) || count($faqs) > 0)
            <section id="faq" class="section">
                <div class="container">
                    @if (isset($faq_section))
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="section-heading">
                                    @if (!empty($faq_section->title)) <h2 class="section-title">{{ $faq_section->title }}</h2> @endif
                                    @if (!empty($faq_section->desc)) <p>{{ $faq_section->desc }}</p> @endif
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        @if (!empty($faq_section->faq_image))
                            <div class="col-lg-6 faq-image  wow fadeInLeft" data-wow-delay="0s">
                                <img src="{{ asset('uploads/img/general/'.$faq_section->faq_image) }}" alt="Faq image" class="img-fluid">
                            </div>
                        @endif
                        <div class="@if (!empty($faq_section->faq_image)) col-lg-6 @else col-lg-12 @endif wow fadeInUp" data-wow-delay="0.2s">
                            <div class="accordion-wrap" id="faqAccordion">
                                @php $i = 1; @endphp
                                @foreach ($faqs as $faq)
                                    <div class="accordion-item">
                                        <div class="accordion-item-header" id="accordionHeading-{{ $i }}">
                                            <a href="#" data-toggle="collapse" data-target="#accordionItem-{{ $i }}" aria-expanded="false" aria-controls="accordionHeading-{{ $i }}">
                                                <i class="fas fa-question"></i>{{ $faq->question }}
                                            </a>
                                        </div>
                                        <div id="accordionItem-{{ $i }}" class="collapse"  data-parent="#faqAccordion" aria-labelledby="accordionHeading-{{ $i }}">
                                            <div class="accordion-body">
                                                <p>{{ $faq->answer }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @php $i++; @endphp
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <section id="faq" class="section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section-heading">
                                <h2 class="section-title">Frequently Asked <br> Questions</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci dolor fuga, magnam et sed quidem.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 faq-image  wow fadeInLeft" data-wow-delay="0s">
                            <img src="{{ asset('uploads/common_dummy/540x540.jpg') }}" alt="Faq image" class="img-fluid">
                        </div>
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="accordion-wrap" id="faqAccordion">
                                <div class="accordion-item">
                                    <div class="accordion-item-header" id="accordionHeading-1">
                                        <a href="#" data-toggle="collapse" data-target="#accordionItem-1" aria-expanded="false" aria-controls="accordionHeading-1">
                                            <i class="fas fa-question"></i>How Can I End The Service ?
                                        </a>
                                    </div>
                                    <div id="accordionItem-1" class="collapse"  data-parent="#faqAccordion" aria-labelledby="accordionHeading-1">
                                        <div class="accordion-body">
                                            <p>
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-item-header" id="accordionHeader-2">
                                        <a href="#" data-toggle="collapse" data-target="#accordionItem-2" aria-expanded="false" aria-controls="accordionItem-2">
                                            <i class="fas fa-question"></i>Who Can See My Profile ?
                                        </a>
                                    </div>
                                    <div id="accordionItem-2" class="collapse" data-parent="#faqAccordion" aria-labelledby="accordionHeader-2">
                                        <div class="accordion-body">
                                            <p>
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-item-header" id="accordionHeader-3">
                                        <a href="#" data-toggle="collapse" data-target="#accordionItem-3" aria-expanded="false" aria-controls="accordionItem-3">
                                            <i class="fas fa-question"></i>How Can I End The Service ?
                                        </a>
                                    </div>
                                    <div id="accordionItem-3" class="collapse" data-parent="#faqAccordion" aria-labelledby="accordionHeader-3">
                                        <div class="accordion-body">
                                            <p>
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-item-header" id="accordionHeader-3">
                                        <a href="#" data-toggle="collapse" data-target="#accordionItem-4" aria-expanded="false" aria-controls="accordionItem-4">
                                            <i class="fas fa-question"></i>Who can see my profile ?
                                        </a>
                                    </div>
                                    <div id="accordionItem-4" class="collapse" data-parent="#faqAccordion" aria-labelledby="accordionHeader-4">
                                        <div class="accordion-body">
                                            <p>
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-item-header" id="accordionHeader-5">
                                        <a href="#" data-toggle="collapse" data-target="#accordionItem-5" aria-expanded="false" aria-controls="accordionItem-5">
                                            <i class="fas fa-question"></i>Who can see my profile ?
                                        </a>
                                    </div>
                                    <div id="accordionItem-5" class="collapse" data-parent="#faqAccordion" aria-labelledby="accordionHeadem-5">
                                        <div class="accordion-body">
                                            <p>
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-item-header" id="accordionHeader-6">
                                        <a href="#" data-toggle="collapse" data-target="#accordionItem-6" aria-expanded="false" aria-controls="accordionItem-6">
                                            <i class="fas fa-question"></i>Who Can See My Profile ?
                                        </a>
                                    </div>
                                    <div id="accordionItem-6" class="collapse" data-parent="#faqAccordion" aria-labelledby="accordionHeader-6">
                                        <div class="accordion-body">
                                            <p>
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

    @endif
    <!-- Faq End -->

    <!-- Latest Blog Start -->
    @if ($section_arr['blog_section'] == 1)

        @if (count($recent_posts) > 0)
            <section class="section" id="latestblog">
                <div class="container">
                    @if (isset($blog_section))
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="section-heading">
                                    @if (!empty($blog_section->title)) <h2 class="section-title">{{ $blog_section->title }}</h2> @endif
                                    @if (!empty($blog_section->desc)) <p>{{ $blog_section->desc }}</p> @endif
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="team-carousel owl-carousel owl-theme">
                        @foreach ($recent_posts as $recent_post)
                            <div class="item">
                                <div class="blog-item">
                                    <div class="blog-top">
                                        <a href="{{ url('blog/'.$recent_post->slug) }}" class="blog-img-link">
                                            @if (!empty($recent_post->blog_image))
                                                <img src="{{ asset('uploads/img/blogs/'.$recent_post->blog_image) }}" class="img-fluid" alt="blog image">
                                            @else
                                                <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" class="img-fluid" alt="blog image">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="blog-body">
                                        <div class="blog-meta">
                                            <a href="{{ url('blog/'.$recent_post->slug) }}"><i class="far fa-user mr-2"></i>@if (!empty($recent_post->author)) {{ $recent_post->author }} @else {{ __('frontend.admin') }} @endif</a>
                                            <a href="{{ url('blog/'.$recent_post->slug) }}"><i class="far fa-clock mr-2"></i>{{ Carbon\Carbon::parse($recent_post->created_at)->isoFormat('DD') }} {{ Carbon\Carbon::parse($recent_post->created_at)->isoFormat('MMMM') }} {{ Carbon\Carbon::parse($recent_post->created_at)->isoFormat('GGGG') }}</a>
                                        </div>
                                        <h5>
                                            <a href="{{ url('blog/'.$recent_post->slug) }}">{{ $recent_post->title }}</a>
                                        </h5>
                                        @if (!empty($recent_post->short_desc)) <p>{{ $recent_post->short_desc }}</p> @endif
                                        <a href="{{ url('blog/'.$recent_post->slug) }}" class="default-link">{{ __('frontend.read_more') }} <i class="ml-2 fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @else
            <section class="section" id="latestblog">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section-heading">
                                <h2 class="section-title">Latest Blog</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci dolor fuga, magnam et sed quidem.</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-carousel owl-carousel owl-theme">
                        <div class="item">
                            <div class="blog-item">
                                <div class="blog-top">
                                    <a href="#" class="blog-img-link">
                                        <img src="{{ asset('uploads/common_dummy/775x575.jpg') }}" alt="blog image" class="img-fluid">
                                    </a>
                                </div>
                                <div class="blog-body">
                                    <div class="blog-meta">
                                        <a href="#"><i class="far fa-user mr-2"></i>Mark Wilson</a>
                                        <a href="#"><i class="far fa-clock mr-2"></i>July 15</a>
                                    </div>
                                    <h5>
                                        <a href="#">Good UI/UX Trend Design.</a>
                                    </h5>
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    </p>
                                    <a href="#" class="default-link">Read More <i class="ml-2 fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="blog-item">
                                <div class="blog-top">
                                    <a href="#" class="blog-img-link">
                                        <img src="{{ asset('uploads/common_dummy/775x575.jpg') }}" alt="blog image" class="img-fluid">
                                    </a>
                                </div>
                                <div class="blog-body">
                                    <div class="blog-meta">
                                        <a href="#"><i class="far fa-user mr-2"></i>Albert Gregory</a>
                                        <a href="#"><i class="far fa-clock mr-2"></i>March 20</a>
                                    </div>
                                    <h5>
                                        <a href="#">10 UI design trends for 2020</a>
                                    </h5>
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    </p>
                                    <a href="#" class="default-link">Read More <i class="ml-2 fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="blog-item">
                                <div class="blog-top">
                                    <a href="#" class="blog-img-link">
                                        <img src="{{ asset('uploads/common_dummy/775x575.jpg') }}" alt="blog image" class="img-fluid">
                                    </a>
                                </div>
                                <div class="blog-body">
                                    <div class="blog-meta">
                                        <a href="#"><i class="far fa-user mr-2"></i>Michael Cally</a>
                                        <a href="#"><i class="far fa-clock mr-2"></i>Aqust 08</a>
                                    </div>
                                    <h5>
                                        <a href="#">Program bug solutions and support.</a>
                                    </h5>
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    </p>
                                    <a href="#" class="default-link">Read More <i class="ml-2 fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="blog-item">
                                <div class="blog-top">
                                    <a href="#" class="blog-img-link">
                                        <img src="{{ asset('uploads/common_dummy/775x575.jpg') }}" alt="blog image" class="img-fluid">
                                    </a>
                                </div>
                                <div class="blog-body">
                                    <div class="blog-meta">
                                        <a href="#"><i class="far fa-user mr-2"></i>Mark Wilson</a>
                                        <a href="#"><i class="far fa-clock mr-2"></i>July 05</a>
                                    </div>
                                    <h5>
                                        <a href="#">free ui design & icon packs.</a>
                                    </h5>
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    </p>
                                    <a href="#" class="default-link">Read More <i class="ml-2 fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

    @endif
    <!-- Latest Blog End -->

    <!-- Contact Start -->
    @if ($section_arr['contact_section'] == 1)

       @if (isset($contact_section) || count($contacts) > 0)
            <section id="contact" class="section pb-0" data-scroll-index="5">
                <div class="container">
                    @if (isset($contact_section))
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="section-heading">
                                    @if (!empty($contact_section->title)) <h2 class="section-title">{{ $contact_section->title }}</h2> @endif
                                    @if (!empty($contact_section->desc)) <p>{{ $contact_section->desc }}</p> @endif
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="contact-form-wrap">
                        <div class="row">
                           @if (count($contacts) > 0)
                                <div class="col-lg-4">
                                    <div class="contact-info-wrap">
                                        @foreach ($contacts as $contact)
                                            <div class="contact-info-box">
                                                @if (!empty($contact->icon))
                                                    <div class="icon">
                                                        <span class="{{ $contact->icon }}"></span>
                                                    </div>
                                                    @endif
                                                <div class="body">
                                                    @if (!empty($contact->title)) <h5>{{ $contact->title }}</h5> @endif
                                                    @if (!empty($contact->desc)) <p>{{ $contact->desc }}</p> @endif
                                                </div>
                                            </div>
                                            @endforeach
                                        @php unset($contact); @endphp
                                    </div>
                                </div>
                               @endif
                            <div class="col-md-12 @if (count($contacts) >0) col-lg-8 @else col-lg-12 @endif @if (empty($contact_section->map_iframe)) custom-mb-100 @endif">
                                <!-- Include Alert Blade -->
                                @include('admin.alert.alert')

                                <form action="{{ route('message.store') }}" method="POST">
                                    @csrf

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="contact-form-group">
                                                <input type="text" class="form-input" name="name" id="contactName" placeholder="{{ __('frontend.your_name') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="contact-form-group">
                                                <input type="text" class="form-input" name="email" id="contactEmail" placeholder="{{ __('frontend.your_email') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="contact-form-group">
                                                <input type="text" class="form-input" name="subject" id="contactSubject" placeholder="{{ __('frontend.subject') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="contact-form-group">
                                                <textarea name="message" id="contactMessage" class="form-input" placeholder="{{ __('frontend.your_message') }}" cols="20" rows="10" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="contact-btn-left custom-form">
                                                <button type="submit"  class="primary-button border-none">{{ __('frontend.send_message') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @if (!empty($contact_section->map_iframe))
                            <div id="google-map">
                                <iframe src="{{ $contact_section->map_iframe }}" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        @endif
                </div>
            </section>
           @else
            <section id="contact" class="section pb-0" data-scroll-index="5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section-heading">
                                <h2 class="section-title">Get in Touch</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci dolor fuga, magnam et sed quidem.</p>
                            </div>
                        </div>
                    </div>
                    <div class="contact-form-wrap">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="contact-info-wrap">
                                    <div class="contact-info-box">
                                        <div class="icon">
                                            <span class="fa fa-envelope"></span>
                                        </div>
                                        <div class="body">
                                            <h5>Email</h5>
                                            <p>info@jj.com</p>
                                            <p>example.com</p>
                                        </div>
                                    </div>
                                    <div class="contact-info-box">
                                        <div class="icon">
                                            <span class="fa fa-phone"></span>
                                        </div>
                                        <div class="body">
                                            <h5>Address</h5>
                                            <p>221b Baker Street, Londra</p>
                                        </div>
                                    </div>
                                    <div class="contact-info-box">
                                        <div class="icon">
                                            <span class="fa fa-phone"></span>
                                        </div>
                                        <div class="body">
                                            <h5>Call us</h5>
                                            <p>+968 9582-1620</p>
                                            <p>+968 9582-1620</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-8">
                                <form id="contactForm">
                                    <div class="contact-alerts">
                                        <div class="empty-form" style="display: none;"><span>Please Fill Required Fields</span></div>
                                        <div class="email-invalid" style="display: none;"><span>Email is invalid</span></div>
                                        <div class="success-form"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="contact-form-group">
                                                <input type="text" class="form-input" name="contact_name" id="contactName" placeholder="Your Name *">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="contact-form-group">
                                                <input type="text" class="form-input" name="contact_email" id="contactEmail" placeholder="Your Email *">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="contact-form-group">
                                                <input type="text" class="form-input" name="contact_subject" id="contactSubject" placeholder="Subject *">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="contact-form-group">
                                                <textarea name="contact_message" id="contactMessage" class="form-input" placeholder="Your Message *" cols="20" rows="10"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="contact-btn-left custom-form">
                                                <button type="submit" id="contactBtn" class="primary-button border-none">Send Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="google-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12184.582728040408!2d28.838011!3d40.228063!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x43366635e46033e8!2zR8O2csO8a2xlIENhbSBCYWxrb24!5e0!3m2!1str!2str!4v1594565117044!5m2!1str!2str" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </section>
           @endif

        @endif
    <!-- Contact End -->


    <!-- Download Start -->
    @if ($section_arr['app_section'] == 1)

        @if (isset($app_section) || count($apps) > 0)
        <section id="subscribe-form" class="section" data-scroll-index="7">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="@if (count($apps) > 2) col-lg-12 @else col-lg-6 @endif">
                        @if (!empty($app_section->title))
                            <div class="section-heading">
                                <h2 class="text-white">{{ $app_section->title }}</h2>
                            </div>
                            @endif
                            <div class="download-box text-center">
                                <div class="holder-link">
                                    @foreach ($apps as $app)
                                        <a href="@if (!empty($app->link)) {{ $app->link }} @else # @endif" class="mr-3">
                                            <img class="img-fluid" src="{{ asset('uploads/img/general/'.$app->app_image) }}" alt="Android image">
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>
            @else
            <section id="subscribe-form" class="section" data-scroll-index="7">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section-heading">
                                <h2 class="text-white"><span class="counter">8500</span> + People Trusted Subscribe to us</h2>
                            </div>
                            <div class="download-box text-center">
                                <div class="holder-link">
                                    <a href="#" class="mr-3">
                                        <img class="img-fluid" src="{{ asset('uploads/common_dummy/android-download.png') }}" alt="Android image">
                                    </a>
                                    <a href="#">
                                        <img class="img-fluid" src="{{ asset('uploads/common_dummy/apple-download.png') }}" alt="Iphone image">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    @endif

@endif
        <!-- Download End -->

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
                                                <a href="#" data-scroll-nav="2">{{ __('frontend.about') }}</a>
                                            </li>
                                        @endif
                                        @if ($section_arr['service_section'] == 1)
                                            <li>
                                                <a href="#" data-scroll-nav="3">{{ __('frontend.services') }}</a>
                                            </li>
                                        @endif
                                        @if ($section_arr['price_section'] == 1)
                                            <li>
                                                <a href="#" data-scroll-nav="4">{{ __('frontend.pricing') }}</a>
                                            </li>
                                        @endif
                                        @if ($section_arr['blog_section'] == 1)
                                            <li>
                                                <a  href="{{ url('blogs') }}">{{ __('frontend.blogs') }}</a>
                                            </li>
                                        @endif
                                        @if($section_arr['contact_section'] == 1)
                                            <li>
                                                <a href="#" data-scroll-nav="5">{{ __('frontend.contact') }}</a>
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
<script src="{{ asset('assets/frontend/landing/js/plugins.js') }}"></script>

@if($homepage_version->choose_version == 4)
    <script src="{{ asset('assets/frontend/landing/js/particles.js') }}" defer></script>
@endif

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




<!-- Vegas Slider  -->
@if (count($sliders) > 0)

    <script>
        jQuery(document).ready(function() {
            jQuery("#heroSliderContainer").vegas({
                slides: [
                        @foreach ($sliders as $slide)

                        @if (count($sliders) == 1)

                    {
                        src: "{{ asset('uploads/img/sliders/'.$slide->slider_image) }}"
                    },
                    {
                        src: "{{ asset('uploads/img/sliders/'.$slide->slider_image) }}"
                    },

                        @endif

                    {
                        src: "{{ asset('uploads/img/sliders/'.$slide->slider_image) }}"
                    },

                    @endforeach
                ],
                overlay: true,
                transition: 'fade2',
                animation: 'kenburnsUpLeft'
            });
        });
    </script>

    @else

    <script>
        jQuery(document).ready(function() {
            jQuery("#heroSliderContainer").vegas({
                slides: [

                    {
                        src: "{{ asset('uploads/common_dummy/1920x1080.jpg') }}"
                    },

                    {
                        src: "{{ asset('uploads/common_dummy/1920x1080.jpg') }}"
                    },

                ],
                overlay: true,
                transition: 'fade2',
                animation: 'kenburnsUpLeft'
            });
        });
    </script>

    @endif

<!-- Youtube Video -->
@if (isset($video))
    <script>
        jQuery(document).ready(function() {
            jQuery("#video-background").mb_YTPlayer();
        });
    </script>
    @endif

</body>
</html>