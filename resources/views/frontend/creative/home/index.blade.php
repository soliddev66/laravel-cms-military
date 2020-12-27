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
    <meta property="og:image" content="@if (!empty($general_site_image->favicon_image)){{ asset('uploads/creative/img/general/'.$general_site_image->favicon_image) }} @endif">
    <meta itemprop="image" content="@if (!empty($general_site_image->favicon_image)){{ asset('uploads/creative/img/general/'.$general_site_image->favicon_image) }} @endif">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="@if (!empty($general_site_image->favicon_image))){{ asset('uploads/creative/img/general/'.$general_site_image->favicon_image) }} @endif">
    <meta property="twitter:title" content="@if (isset($general_seo)){{ $general_seo->site_name }} @endif">
    <meta property="twitter:description" content="@if (isset($general_seo)){{ $general_seo->site_desc }} @endif">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{ __('frontend.home') }} @if (isset($general_seo)) - {{ $general_seo->site_name }} @endif</title>

    @if (!empty($general_site_image->favicon_image))
    <!-- Favicon -->
        <link href="{{ asset('uplods/creative/img/general/'.$general_site_image->favicon_image) }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('uploads/creative/img/general/'.$general_site_image->favicon_image) }}" sizes="128x128" rel="shortcut icon" />
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
                            <a class="nav-link menu-link" href="#" data-scroll-nav="1">{{ __('frontend.home') }}</a>
                        </li>
                        @if ($section_arr['about_section'] == 1)
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#" data-scroll-nav="2">{{ __('frontend.about') }}</a>
                        </li>
                        @endif
                        @if ($section_arr['service_section'] == 1)
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#" data-scroll-nav="3">{{ __('frontend.services') }}</a>
                        </li>
                        @endif
                        @if ($section_arr['work_section'] == 1)
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#" data-scroll-nav="4">{{ __('frontend.portfolio') }}</a>
                        </li>
                        @endif
                        @if ($section_arr['blog_section'] == 1)
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="{{ url('blogs') }}">{{ __('frontend.blogs') }}</a>
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
                        <li class="nav-item login-btn-resp">
                            <a href="{{ url('login') }}" class="login-btn-toggle nav-link">
                                <i class=" fa fa-sign-in-alt"></i>
                            </a>
                        </li>
                        @isset ($external_url)
                            @if ($external_url->status == 1)
                                <li class="nav-item navbar-btn-resp d-flex align-items-center">
                                    <a href="{{ $external_url->btn_link }}" class="default-button">
                                        {{ $external_url->btn_name }} <i class="fa fa-arrow-right ml-3"></i>
                                    </a>
                                </li>
                            @endif
                        @endisset
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- Header End -->

    <!-- Main Start -->
    <main class="site-main" id="mainWrapper">

        <!-- Hero Section Start -->
    @if ($homepage_version->choose_version == 0)

        @if (isset($bg_image) || isset($fixed_content))
                <section class="hero-section flex-box-center" data-bg-image-path="@if (isset($bg_image)) {{ asset('uploads/creative/img/general/'.$bg_image->background_image) }} @else {{ asset('uploads/common_dummy/1920x1080.jpg') }} @endif" data-scroll-index="1">
                    <div class="container">
                        <div class="row hero-row justify-content-center align-items-center">
                            <div class="col-lg-7 col-xl-6">
                                <div class="hero-section-inner text-center wow fadeInUp" data-wow-delay="0.1s">
                                   @if (count($general_socials) > 0)
                                        <div class="hero-social">
                                           @foreach ($general_socials as $general_social)
                                                <a href="@if (!empty($general_social->link)) {{ $general_social->link }} @else # @endif">
                                                    <i class="{{ $general_social->social_media }}"></i>
                                                </a>
                                            @endforeach
                                        </div>
                                       @endif
                                       @if (!empty($fixed_content->title)) <h6 class="hero-sup-title">{{ $fixed_content->title }}</h6> @endif
                                       @if (!empty($fixed_content->animated_desc)) <h1 class="hero-title"><span id="typed-text"></span></h1> @endif
                                       <div class="btn-group">
                                        <a href="#" data-scroll-nav="5" class="default-button">{{ __('frontend.contact_us') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .container -->
                    <a href="#" data-scroll-nav="2" class="scroll-down-btn wow zoomIn">
                        <i class="fa fa-arrow-down"></i>
                    </a>
                    <!-- .scroll-down-btn -->
                </section>
            @else
                <section class="hero-section flex-box-center" data-bg-image-path="{{ asset('uploads/common_dummy/1920x1080.jpg') }}" data-scroll-index="1">
                    <div class="container">
                        <div class="row hero-row justify-content-center align-items-center">
                            <div class="col-lg-7 col-xl-6">
                                <div class="hero-section-inner text-center wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="hero-social">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div>
                                    <h6 class="hero-sup-title">Hi I'm Jonathan</h6>
                                    <h1 class="hero-title">Web <span id="typed-text"></span></h1>
                                    <div class="btn-group">
                                        <a href="#" data-scroll-nav="5" class="default-button">Contact Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .container -->
                    <a href="#" data-scroll-nav="2" class="scroll-down-btn wow zoomIn">
                        <i class="fa fa-arrow-down"></i>
                    </a>
                    <!-- .scroll-down-btn -->
                </section>
        @endif

        @elseif ($homepage_version->choose_version == 1)

        @if (count($sliders) > 0 || isset($fixed_content))
                <section class="hero-section jarallax flex-box-center hero-slider-wrap" id="heroSliderContainer" data-scroll-index="1">
                    <div class="container h-100">
                        <div class="row hero-row h-100 justify-content-center align-items-center">
                            <div class="col-lg-7 col-xl-6">
                                <div class="hero-section-inner text-center wow fadeInUp" data-wow-delay="0.1s">
                                    @if (count($general_socials) > 0)
                                        <div class="hero-social">
                                            @foreach ($general_socials as $general_social)
                                                <a href="@if (!empty($general_social->link)) {{ $general_social->link }} @else # @endif">
                                                    <i class="{{ $general_social->social_media }}"></i>
                                                </a>
                                            @endforeach
                                        </div>
                                    @endif
                                        @if (!empty($fixed_content->title)) <h6 class="hero-sup-title">{{ $fixed_content->title }}</h6> @endif
                                        @if (!empty($fixed_content->animated_desc)) <h1 class="hero-title"><span id="typed-text"></span></h1> @endif
                                    <div class="btn-group">
                                        <a href="#" class="default-button" data-scroll-nav="7">{{ __('frontend.contact_us') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .container -->
                    <a href="#" data-scroll-nav="2" class="scroll-down-btn wow zoomIn">
                        <i class="fa fa-arrow-down"></i>
                    </a>
                    <!-- .scroll-down-btn -->
                </section>
            @else
                <section class="hero-section jarallax flex-box-center hero-slider-wrap" id="heroSliderContainer" data-scroll-index="1">
                    <div class="container h-100">
                        <div class="row hero-row h-100 justify-content-center align-items-center">
                            <div class="col-lg-7 col-xl-6">
                                <div class="hero-section-inner text-center wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="hero-social">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div>
                                    <h6 class="hero-sup-title">Hi I'm Jonathan</h6>
                                    <h1 class="hero-title">Web <span id="typed-text"></span></h1>
                                    <div class="btn-group">
                                        <a href="#" class="default-button" data-scroll-nav="7">Contact Me</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .container -->
                    <a href="#" data-scroll-nav="2" class="scroll-down-btn wow zoomIn">
                        <i class="fa fa-arrow-down"></i>
                    </a>
                    <!-- .scroll-down-btn -->
                </section>
        @endif

        @elseif ($homepage_version->choose_version == 2)

        @if (isset($video) || isset($fixed_content))
                <section class="hero-section flex-box-center hero_video" data-scroll-index="1">
                    <div id="video-background" class="player bg-overlay" data-property="{videoURL:'@if (isset($video)){{ $video->video_link }}@endif',containment:'.hero_video',showControls:false, autoPlay:true, loop:true, mute:true, startAt:0, opacity:1, quality:'default'}"></div>
                    <div class="hero-overlay"></div>
                    <div class="container video-content">
                        <div class="row hero-row justify-content-center align-items-center">
                            <div class="col-lg-7 col-xl-6">
                                <div class="hero-section-inner text-center wow fadeInUp" data-wow-delay="0.1s">
                                    @if (count($general_socials) > 0)
                                        <div class="hero-social">
                                            @foreach ($general_socials as $general_social)
                                                <a href="@if (!empty($general_social->link)) {{ $general_social->link }} @else # @endif">
                                                    <i class="{{ $general_social->social_media }}"></i>
                                                </a>
                                            @endforeach
                                        </div>
                                    @endif
                                    @if (!empty($fixed_content->title)) <h6 class="hero-sup-title">{{ $fixed_content->title }}</h6> @endif
                                    @if (!empty($fixed_content->animated_desc)) <h1 class="hero-title"><span id="typed-text"></span></h1> @endif
                                    <div class="btn-group">
                                        <a href="#" class="default-button" data-scroll-nav="7">{{ __('frontend.contact_us') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .container -->
                    <a href="#" data-scroll-nav="2" class="scroll-down-btn wow zoomIn">
                        <i class="fa fa-arrow-down"></i>
                    </a>
                    <!-- .scroll-down-btn -->
                </section>
            @else
                <section class="hero-section flex-box-center hero_video" data-scroll-index="1">
                    <div id="video-background" class="player bg-overlay" data-property="{videoURL:'https://www.youtube.com/watch?v=yI7UHzq_4XY',containment:'.hero_video',showControls:false, autoPlay:true, loop:true, mute:true, startAt:0, opacity:1, quality:'default'}"></div>
                    <div class="hero-overlay"></div>
                    <div class="container video-content">
                        <div class="row hero-row justify-content-center align-items-center">
                            <div class="col-lg-7 col-xl-6">
                                <div class="hero-section-inner text-center wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="hero-social">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div>
                                    <h6 class="hero-sup-title">Hi I'm Jonathan</h6>
                                    <h1 class="hero-title">Web <span id="typed-text"></span></h1>
                                    <div class="btn-group">
                                        <a href="#" class="default-button" data-scroll-nav="7">Contact Me</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--// .row //-->
                    </div>
                    <!--// .container //-->
                    <a href="#" data-scroll-nav="2" class="scroll-down-btn wow zoomIn">
                        <i class="fa fa-arrow-down"></i>
                    </a>
                    <!--// .scroll-down-btn //-->
                </section>
        @endif

        @elseif ($homepage_version->choose_version == 3)

        @if (isset($bg_image) || isset($fixed_content))
                <section class="hero-section flex-box-center hero-ripless-banner" style="@if (isset($bg_image)) background-image: url({{ asset('uploads/creative/img/general/'.$bg_image->background_image) }}); @else background-image: url({{ asset('uploads/common_dummy/1920x1080.jpg') }}); @endif" data-scroll-index="1">
                    <div class="container">
                        <div class="row hero-row justify-content-center align-items-center">
                            <div class="col-lg-7 col-xl-6">
                                <div class="hero-section-inner text-center wow fadeInUp" data-wow-delay="0.1s">
                                    @if (count($general_socials) > 0)
                                        <div class="hero-social">
                                            @foreach ($general_socials as $general_social)
                                                <a href="@if (!empty($general_social->link)) {{ $general_social->link }} @else # @endif">
                                                    <i class="{{ $general_social->social_media }}"></i>
                                                </a>
                                            @endforeach
                                        </div>
                                    @endif
                                    @if (!empty($fixed_content->title)) <h6 class="hero-sup-title">{{ $fixed_content->title }}</h6> @endif
                                    @if (!empty($fixed_content->animated_desc)) <h1 class="hero-title"><span id="typed-text"></span></h1> @endif
                                    <div class="btn-group">
                                        <a href="#" class="default-button" data-scroll-nav="7">{{ __('frontend.contact_us') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .container -->
                    <a href="#" data-scroll-nav="2" class="scroll-down-btn wow zoomIn">
                        <i class="fa fa-arrow-down"></i>
                    </a>
                    <!-- .scroll-down-btn -->
                </section>
            @else
                <section class="hero-section flex-box-center hero-ripless-banner" style="background-image: url({{ asset('uploads/common_dummy/1920x1080.jpg') }});" data-scroll-index="1">
                    <div class="container">
                        <div class="row hero-row justify-content-center align-items-center">
                            <div class="col-lg-7 col-xl-6">
                                <div class="hero-section-inner text-center wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="hero-social">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div>
                                    <h6 class="hero-sup-title">Hi I'm Jonathan</h6>
                                    <h1 class="hero-title">Web <span id="typed-text"></span></h1>
                                    <div class="btn-group">
                                        <a href="#" class="default-button" data-scroll-nav="7">Contact Me</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .container -->
                    <a href="#" data-scroll-nav="2" class="scroll-down-btn wow zoomIn">
                        <i class="fa fa-arrow-down"></i>
                    </a>
                    <!-- .scroll-down-btn -->
                </section>
        @endif

        @elseif ($homepage_version->choose_version == 4)

        @if (isset($bg_image) || isset($fixed_content))
                <section class="hero-section flex-box-center" data-bg-image-path="@if (isset($bg_image)) {{ asset('uploads/creative/img/general/'.$bg_image->background_image) }} @else {{ asset('uploads/common_dummy/1920x1080.jpg') }} @endif" data-scroll-index="1">
                    <div id="heroparticles"></div>
                    <div class="container">
                        <div class="row hero-row justify-content-center align-items-center">
                            <div class="col-lg-7 col-xl-6">
                                <div class="hero-section-inner text-center wow fadeInUp" data-wow-delay="0.1s">
                                    @if (count($general_socials) > 0)
                                        <div class="hero-social">
                                            @foreach ($general_socials as $general_social)
                                                <a href="@if (!empty($general_social->link)) {{ $general_social->link }} @else # @endif">
                                                    <i class="{{ $general_social->social_media }}"></i>
                                                </a>
                                            @endforeach
                                        </div>
                                    @endif
                                    @if (!empty($fixed_content->title)) <h6 class="hero-sup-title">{{ $fixed_content->title }}</h6> @endif
                                    @if (!empty($fixed_content->animated_desc)) <h1 class="hero-title"><span id="typed-text"></span></h1> @endif
                                    <div class="btn-group">
                                        <a href="#" class="default-button" data-scroll-nav="7">{{ __('frontend.contact_us') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .container -->
                    <a href="#" data-scroll-nav="2" class="scroll-down-btn wow zoomIn">
                        <i class="fa fa-arrow-down"></i>
                    </a>
                    <!-- .scroll-down-btn -->
                </section>
        @else
                <section class="hero-section flex-box-center" data-bg-image-path="{{ asset('uploads/common_dummy/1920x1080.jpg') }}" data-scroll-index="1">
                    <div id="heroparticles"></div>
                    <div class="container">
                        <div class="row hero-row justify-content-center align-items-center">
                            <div class="col-lg-7 col-xl-6">
                                <div class="hero-section-inner text-center wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="hero-social">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div>
                                    <h6 class="hero-sup-title">Hi I'm Jonathan</h6>
                                    <h1 class="hero-title">Web <span id="typed-text"></span></h1>
                                    <div class="btn-group">
                                        <a href="#" class="default-button" data-scroll-nav="7">Contact Me</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .container -->
                    <a href="#" data-scroll-nav="2" class="scroll-down-btn wow zoomIn">
                        <i class="fa fa-arrow-down"></i>
                    </a>
                    <!-- .scroll-down-btn -->
                </section>
        @endif

        @else

        @if (isset($bg_image) || isset($fixed_content))
                <section class="hero-section flex-box-center glitch-img-banner" data-scroll-index="1">
                    <div class="overlay-glitch"></div>
                    <div class="container">
                        <div class="row hero-row justify-content-center align-items-center">
                            <div class="col-lg-7 col-xl-6">
                                <div class="hero-section-inner text-center wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="hero-social">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div>
                                    <h6 class="hero-sup-title">Hi I'm Jonathan</h6>
                                    <h1 class="hero-title">Web <span id="typed-text"></span></h1>
                                    <div class="btn-group">
                                        <a href="#" class="default-button" data-scroll-nav="7">Contact Me</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .container -->
                    <a href="#" data-scroll-nav="2" class="scroll-down-btn wow zoomIn">
                        <i class="fa fa-arrow-down"></i>
                    </a>
                    <!-- .scroll-down-btn -->
                    <div class="glitch-img" data-bg-image-path="@if (isset($bg_image)) {{ asset('uploads/creative/img/general/'.$bg_image->background_image) }} @else {{ asset('uploads/common_dummy/1920x1080.jpg') }} @endif"></div>
                </section>
        @else
                <section class="hero-section flex-box-center glitch-img-banner" data-scroll-index="1">
                    <div class="overlay-glitch"></div>
                    <div class="container">
                        <div class="row hero-row justify-content-center align-items-center">
                            <div class="col-lg-7 col-xl-6">
                                <div class="hero-section-inner text-center wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="hero-social">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div>
                                    <h6 class="hero-sup-title">Hi I'm Jonathan</h6>
                                    <h1 class="hero-title">Web <span id="typed-text"></span></h1>
                                    <div class="btn-group">
                                        <a href="#" class="default-button" data-scroll-nav="7">Contact Me</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .container -->
                    <a href="#" data-scroll-nav="2" class="scroll-down-btn wow zoomIn">
                        <i class="fa fa-arrow-down"></i>
                    </a>
                    <!-- .scroll-down-btn -->
                    <div class="glitch-img" data-bg-image-path="{{ asset('uploads/common_dummy/1920x1080.jpg') }}"></div>
                </section>
        @endif

           @endif
    <!-- Hero Section End -->

        <!-- About Me Start -->
        @if ($section_arr['about_section'] == 1)
            @if (isset($about) || count($info_lists) > 0)
                <section id="about" class="about section" data-scroll-index="2">
                    <div class="container">
                        <div class="row justify-content-between">
                           @if (!empty($about->about_image))
                                <div class="col-lg-6 about-left-col">
                                    <div class="about-left-inner">
                                        <img src="{{ asset('uploads/creative/img/general/'.$about->about_image) }}" alt="About image" class="img-fluid">
                                    @if (!empty($about->video_link)) <a href="{{ $about->video_link }}" class="about-video-btn popup-youtube"><i class="fa fa-play"></i></a> @endif
                                    </div>
                                </div>
                               @endif
                            <div class="@if (!empty($about->about_image)) col-lg-6 @else col-lg-12 @endif col-md-12">
                                <div class="about-inner">

                                    @if (!empty($about->top_title)) <h6 class="about-sub-title">{{ $about->top_title }}</h6> @endif
                                    @if (!empty($about->title))
                                            @php
                                                // Explode
                                                 $str = $about->title;
                                                 $arr =  explode(" ", $str);
                                            @endphp
                                            <h4 class="about-title">
                                                @for ($i = 0; $i < count($arr); $i++)
                                                    @if ($i == 0  )
                                                        <b>{{ $arr[0] }}</b>
                                                    @else
                                                        {{ $arr[$i] }}
                                                    @endif
                                                @endfor
                                            </h4>
                                        @endif
                                    @if (!empty($about->desc)) <p class="about-text">{{ $about->desc }}</p> @endif
                                    @if (count($info_lists) > 0)
                                            <div class="about-list">
                                                @foreach($info_lists as $info_list)
                                                <div class="about-details-item">
                                                    <b>{{ $info_list->title }}</b>
                                                    <span>{{ $info_list->desc }}</span>
                                                </div>
                                                    @endforeach
                                            </div>
                                        @endif
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .container -->
                </section>
            @else
                <section class="about section" data-scroll-index="2">
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col-lg-6 about-left-col">
                                <div class="about-left-inner">
                                    <img src="{{ asset('uploads/common_dummy/520x610.jpg') }}" alt="About image" class="img-fluid">
                                    <a href="https://www.youtube.com/watch?v=yTHTo28hwTQ" class="about-video-btn popup-youtube"><i class="fa fa-play"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="about-inner">
                                    <h6 class="about-sub-title">My name is Jonathan William.</h6>
                                    <h4 class="about-title">Im Front<span>&</span>Back End <b>Developer</b></h4>
                                    <p class="about-text">
                                        It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                    </p>
                                    <div class="about-list">
                                        <div class="about-details-item">
                                            <b>Full Name</b>
                                            <span>Jonathan William</span>
                                        </div>
                                        <div class="about-details-item">
                                            <b>Age</b>
                                            <span>28</span>
                                        </div>
                                        <div class="about-details-item">
                                            <b>Phone</b>
                                            <span>+ 123 456 78 92</span>
                                        </div>
                                        <div class="about-details-item">
                                            <b>Email</b>
                                            <span>example@hotmail.com</span>
                                        </div>
                                        <div class="about-details-item">
                                            <b>Address</b>
                                            <span>48 Creekside Road Centereach</span>
                                        </div>
                                        <div class="about-details-item">
                                            <b>Country</b>
                                            <span>United Kingdom</span>
                                        </div>
                                        <div class="about-details-item">
                                            <b>Web Site</b>
                                            <span>https://elsecolor.com/</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .container -->
                </section>
        @endif
    @endif
        <!-- About Me End -->

        <!-- Skills Start -->
        @if ($section_arr['skill_section'] == 1)

            @if (isset($skill_section) || count($skills) > 0)
                <section class="section  pb-minus-70 skills-section">
                    <div class="container">
                       @if (!empty($skill_section->title))
                            <div class="row justify-content-center">
                                <div class="col-lg-8 col-xl-7">
                                    @php
                                        // Explode
                                         $str = $skill_section->title;
                                         $arr =  explode(" ", $str);
                                    @endphp
                                    <div class="section-heading">
                                        <h2 class="section-title">
                                            @for ($i = 0; $i < count($arr); $i++)
                                                @if ($i == 0  )
                                                    {{ $arr[0] }}
                                                @else
                                                    <span>{{ $arr[$i] }} </span>
                                                @endif
                                            @endfor
                                        </h2>
                                    </div>

                                </div>
                            </div>
                           @endif
                        @if (count($skills) > 0)
                               <div class="row">
                                   @php $i = 1; @endphp
                                   @foreach ($skills as $skill)
                                       <div class="col-md-6 col-lg-6 custom-mb-30">
                                           <div class="skills-inner skills-inner-mb-resp">
                                               <div class="skills-progress-wrap">
                                                   <div class="skills-item clearfix wow fadeInUp" data-wow-duration="{{ $i++ }}s">
                                                       <div class="skills-item-text">
                                                           <h6>{{ $skill->title }}<span class="skill-percent"></span></h6>
                                                       </div>
                                                       <div class="skills-progress-bar">
                                                           <div class="skills-progress-value slideInLeft wow" data-percent="{{ $skill->percent_rate }}" data-wow-delay="0.2s"></div>
                                                       </div>
                                                   </div>
                                               </div>

                                           </div>
                                       </div>
                                   @endforeach
                               </div>
                               <!-- .row -->
                            @endif
                    </div>
                    <!-- .container -->
                </section>
            @else
                <section class="section skills-section">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 col-xl-7">
                                <div class="section-heading">
                                    <h2 class="section-title">My<span>Skills</span></h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="skills-inner skills-inner-mb-resp">
                                    <div class="skills-progress-wrap">
                                        <div class="skills-item clearfix wow fadeInUp" data-wow-duration="1.5s">
                                            <div class="skills-item-text">
                                                <h6>Html5 & Css3<span class="skill-percent"></span></h6>
                                            </div>
                                            <div class="skills-progress-bar">
                                                <div class="skills-progress-value slideInLeft wow" data-percent="80" data-wow-delay="0.2s"></div>
                                            </div>
                                        </div>
                                        <div class="skills-item clearfix wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".2s">
                                            <div class="skills-item-text">
                                                <h6>Sass & Angular Js<span class="skill-percent"></span></h6>
                                            </div>
                                            <div class="skills-progress-bar">
                                                <div class="skills-progress-value slideInLeft wow" data-percent="70" data-wow-delay="0.2s"></div>
                                            </div>
                                        </div>
                                        <div class="skills-item clearfix wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
                                            <div class="skills-item-text">
                                                <h6>jQuery & Javascript <span class="skill-percent"></span></h6>
                                            </div>
                                            <div class="skills-progress-bar">
                                                <div class="skills-progress-value slideInLeft wow" data-percent="75" data-wow-delay="0.2s"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="skills-inner">
                                    <div class="skills-progress-wrap">
                                        <div class="skills-item clearfix wow fadeInUp" data-wow-duration="1.5s">
                                            <div class="skills-item-text">
                                                <h6>Photoshop & Illustrator<span class="skill-percent"></span></h6>
                                            </div>
                                            <div class="skills-progress-bar">
                                                <div class="skills-progress-value slideInLeft wow" data-percent="90" data-wow-delay="0.2s"></div>
                                            </div>
                                        </div>
                                        <div class="skills-item clearfix wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".2s">
                                            <div class="skills-item-text">
                                                <h6>Php & ASP.NET<span class="skill-percent"></span></h6>
                                            </div>
                                            <div class="skills-progress-bar">
                                                <div class="skills-progress-value slideInLeft wow" data-percent="70" data-wow-delay="0.2s"></div>
                                            </div>
                                        </div>
                                        <div class="skills-item clearfix wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
                                            <div class="skills-item-text">
                                                <h6>Bootstrap & Gulp Js <span class="skill-percent"></span></h6>
                                            </div>
                                            <div class="skills-progress-bar">
                                                <div class="skills-progress-value slideInLeft wow" data-percent="85" data-wow-delay="0.2s"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--// .row //-->
                    </div>
                    <!--// .container //-->
                </section>
        @endif

            @endif
        <!-- Skills End -->

        <!-- Counters Start -->
        @if ($section_arr['counter_section'] == 1)

            @if (count($counters) > 0)
                <section class="counters-wrap border-top-line border-bottom-line section">
                    <div class="container">
                        <div class="row">
                           @foreach ($counters as $counter)
                                <div class="col-md-6 col-lg-3 col-sm-6 counter-item wow fadeInLeft @if (count($counters) > 4) custom-mb-30 @endif" data-wow-duration="1.5s">
                                    <div class="counter-body">
                                        <span class="counter">{{ $counter->timer }}</span>
                                        <h5>{{ $counter->desc }}</h5>
                                    </div>
                                </div>
                               @endforeach
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .container -->
                </section>
            @else
                <section class="counters-wrap border-top-line border-bottom-line section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-lg-3 col-sm-6 counter-item wow fadeInLeft" data-wow-duration="1.5s">
                                <div class="counter-body">
                                    <span class="counter">1800</span>
                                    <h5>Happy Clients</h5>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 col-sm-6 counter-item wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".1s">
                                <div class="counter-body">
                                    <span class="counter">1450</span>
                                    <h5>Awards Won</h5>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 col-sm-6 counter-item wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".1s">
                                <div class="counter-body">
                                    <span class="counter">1500</span>
                                    <h5>Projects</h5>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 col-sm-6 counter-item wow fadeInRight" data-wow-duration="1.5s" data-wow-delay=".3s">
                                <div class="counter-body">
                                    <span class="counter">2500</span>
                                    <h5>Received Jobs</h5>
                                </div>
                            </div>
                        </div>
                        <!--// .row //-->
                    </div>
                    <!--// .container //-->
                </section>
        @endif

            @endif
        <!-- Counters End -->

        <!-- My Services Start -->
        @if ($section_arr['service_section'] == 1)

            @if (isset($service_section) || count($services) > 0)
                <section id="services" class="services section pb-minus-70" data-scroll-index="3">
                    <div class="container">
                        @if (!empty($service_section->title))
                            <div class="row align-items-center justify-content-center">
                                <div class="col-md-7">
                                    @php
                                        // Explode
                                         $str = $service_section->title;
                                         $arr =  explode(" ", $str);
                                    @endphp
                                    <div class="section-heading">
                                        <h2 class="section-title">
                                            @for ($i = 0; $i < count($arr); $i++)
                                                @if ($i == 0  )
                                                    {{ $arr[0] }}
                                                @else
                                                    <span>{{ $arr[$i] }} </span>
                                                @endif
                                            @endfor
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!-- .row -->
                            <div class="row">
                                @php $i = 0; @endphp
                                @foreach ($services as $service)
                                    <div class="col-md-6 col-lg-4 col-sm-12 services-item-resp wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".{{ $i+2 }}s">
                                        <div class="services-box">
                                            <div class="services-icon">
                                                @if (!empty($service->icon)) <i class="{{ $service->icon }}"></i> @endif
                                                <div class="services-icon-shape-wrap">
                                                    <div class="services-icon-shape"></div>
                                                    <div class="services-icon-shape"></div>
                                                </div>
                                            </div>
                                            <div class="services-box-body">
                                                <h5>{{ $service->title }}</h5>
                                                @if (!empty($service->short_desc)) <p>{{ $service->short_desc }}</p> @endif
                                                <a href="{{ url('service/'.$service->slug) }}" class="default-button">{{ __('frontend.read_more') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($i == 4)
                                        @php  $i = 0; @endphp
                                    @endif
                                @endforeach
                            </div>
                            <!-- .row -->
                    </div>
                    <!-- .container -->
                </section>
            @else
                <section class="services section pb-minus-70" data-scroll-index="3">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7">
                                <div class="section-heading">
                                    <h2 class="section-title">My<span>Services</span></h2>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                        <div class="row">
                            <div class="col-md-6 col-lg-4 col-sm-12 services-item-resp wow fadeInUp" data-wow-duration="1.5s">
                                <div class="services-box">
                                    <div class="services-icon">
                                        <i class="fas fa-vector-square"></i>
                                        <div class="services-icon-shape-wrap">
                                            <div class="services-icon-shape"></div>
                                            <div class="services-icon-shape"></div>
                                        </div>
                                    </div>
                                    <div class="services-box-body">
                                        <h5>Logo Design</h5>
                                        <p>
                                            It is a long established fact that a reader will be distracted by the readable content of a page.
                                        </p>
                                        <a href="#" class="default-button">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 col-sm-12 services-item-resp wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".2s">
                                <div class="services-box">
                                    <div class="services-icon">
                                        <i class="fas fa-layer-group"></i>
                                        <div class="services-icon-shape-wrap">
                                            <div class="services-icon-shape"></div>
                                            <div class="services-icon-shape"></div>
                                        </div>
                                    </div>
                                    <div class="services-box-body">
                                        <h5>UI/UX Design</h5>
                                        <p>
                                            It is a long established fact that a reader will be distracted by the readable content of a page.
                                        </p>
                                        <a href="#" class="default-button">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 col-sm-12 services-item-resp wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".4s">
                                <div class="services-box">
                                    <div class="services-icon">
                                        <i class="far fa-lightbulb"></i>
                                        <div class="services-icon-shape-wrap">
                                            <div class="services-icon-shape"></div>
                                            <div class="services-icon-shape"></div>
                                        </div>
                                    </div>
                                    <div class="services-box-body">
                                        <h5>Search Optimization</h5>
                                        <p>
                                            It is a long established fact that a reader will be distracted by the readable content of a page.
                                        </p>
                                        <a href="#" class="default-button">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 col-sm-12 services-item-resp wow fadeInUp" data-wow-duration="1.5s">
                                <div class="services-box">
                                    <div class="services-icon">
                                        <i class="fas fa-pencil-ruler"></i>
                                        <div class="services-icon-shape-wrap">
                                            <div class="services-icon-shape"></div>
                                            <div class="services-icon-shape"></div>
                                        </div>
                                    </div>
                                    <div class="services-box-body">
                                        <h5>Web Design</h5>
                                        <p>
                                            It is a long established fact that a reader will be distracted by the readable content of a page.
                                        </p>
                                        <a href="#" class="default-button">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 col-sm-12 services-item-resp wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".2s">
                                <div class="services-box">
                                    <div class="services-box-body">
                                        <div class="services-icon">
                                            <i class="fas fa-bullhorn"></i>
                                            <div class="services-icon-shape-wrap">
                                                <div class="services-icon-shape"></div>
                                                <div class="services-icon-shape"></div>
                                            </div>
                                        </div>
                                        <h5>Digital Marketing</h5>
                                        <p>
                                            It is a long established fact that a reader will be distracted by the readable content of a page.
                                        </p>
                                        <a href="#" class="default-button">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 col-sm-12 services-item-resp wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".4s">
                                <div class="services-box">
                                    <div class="services-box-body">
                                        <div class="services-icon">
                                            <i class="fas fa-tablet-alt"></i>
                                            <div class="services-icon-shape-wrap">
                                                <div class="services-icon-shape"></div>
                                                <div class="services-icon-shape"></div>
                                            </div>
                                        </div>
                                        <h5>Responsive Design</h5>
                                        <p>
                                            It is a long established fact that a reader will be distracted by the readable content of a page.
                                        </p>
                                        <a href="#" class="default-button">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .container -->
                </section>
        @endif

            @endif
        <!-- My Services End -->

        <!-- Portfolio Start -->
        @if ($section_arr['work_section'] == 1)

            @if (isset($work_section) || count($works) > 0)
                <section class="section portfolio-section" data-scroll-index="4">
                    <div class="container">
                      @if (isset($work_section))
                            <div class="row align-items-center justify-content-center">
                                <div class="col-md-7">
                                    @php
                                        // Explode
                                         $str = $work_section->title;
                                         $arr =  explode(" ", $str);
                                    @endphp
                                    <div class="section-heading">
                                        <h2 class="section-title">
                                            @for ($i = 0; $i < count($arr); $i++)
                                                @if ($i == 0  )
                                                    {{ $arr[0] }}
                                                @else
                                                    <span>{{ $arr[$i] }} </span>
                                                @endif
                                            @endfor
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <!-- .row -->
                        @endif


                        <div class="portfolio-filter-wrap">
                            <div class="portfolio-filter">
                                <a href="#0" data-gallery-filter="*" class="current">{{ __('frontend.all') }}</a>
                                @foreach ($grouped_work_categories as $category)
                                    <a href="#0" data-gallery-filter=".{{ $category[0]->work_category_slug }}">{{ $category[0]->category_name }}</a>
                                @endforeach
                            </div>
                        </div>
                        <!-- .row -->
                        <div class="portfolio-gallery portfolio-grid row">
                            @foreach ($works as $work)
                                <div class="col-md-6 col-lg-4 glry-item col-sm-12 {{ $work->creative_category->work_category_slug }}">
                                    @if (!empty($work->thumbnail_image))
                                    <div class="portfolio-item-img">
                                            <img src="{{ asset('uploads/creative/img/works/'.$work->thumbnail_image) }}" alt="Portfolio Img" class="img-fluid portfolio-img">
                                            <div class="portfolio-buttons">
                                                <a href="{{ asset('uploads/creative/img/works/'.$work->thumbnail_image) }}" class="portfolio-zoom-link">
                                                    <span></span>
                                                    <span></span>
                                                </a>
                                            </div>
                                    </div>
                                    @endif
                                    <div class="portfolio-detail-text @if (empty($work->thumbnail_image)) mt-0 @endif">
                                        <h6 class="portfolio-detail-title"><a href="{{url('work/'.$work->work_slug)}}">{{ $work->title }}</a></h6>
                                        <span>{{ $work->creative_category->category_name }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .container -->
                </section>
            @else
                <section class="section portfolio-section" data-scroll-index="4">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7">
                                <div class="section-heading">
                                    <h2 class="section-title">My<span>Works</span></h2>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                        <div class="portfolio-filter-wrap">
                            <div class="portfolio-filter">
                                <a href="#0" data-gallery-filter="*" class="current">All</a>
                                <a href="#0" data-gallery-filter=".web">Web</a>
                                <a href="#0" data-gallery-filter=".logo">Logo</a>
                                <a href="#0" data-gallery-filter=".branding">Branding</a>
                            </div>
                        </div>
                        <!-- .row -->
                        <div class="portfolio-gallery portfolio-grid row">
                            <div class="col-md-6 col-lg-4 glry-item col-sm-12 web">
                                <div class="portfolio-item-img">
                                    <img src="{{ asset('uploads/common_dummy/600x600.jpg') }}" alt="Portfolio Img" class="img-fluid portfolio-img">
                                    <div class="portfolio-buttons">
                                        <a href="{{ asset('uploads/common_dummy/600x600.jpg') }}" class="portfolio-zoom-link">
                                            <span></span>
                                            <span></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="portfolio-detail-text">
                                    <h6 class="portfolio-detail-title"><a href="#">Web Design</a></h6>
                                    <span>Web</span>
                                </div>
                                <ul class="portfolio-item-share">
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="like-btn">
                                        <form action="" method="GET">
                                            <button type="submit"><i class="fa fa-heart"></i></button>
                                            <span>1000</span>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-lg-4 glry-item col-sm-12 web">
                                <div class="portfolio-item-img">
                                    <img src="{{ asset('uploads/common_dummy/600x600.jpg') }}" alt="Portfolio Img" class="img-fluid portfolio-img">
                                    <div class="portfolio-buttons">
                                        <a href="{{ asset('uploads/common_dummy/600x600.jpg') }}" class="portfolio-zoom-link">
                                            <span></span>
                                            <span></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="portfolio-detail-text">
                                    <h6 class="portfolio-detail-title"><a href="#">Web Design</a></h6>
                                    <span>Web</span>
                                </div>
                                <ul class="portfolio-item-share">
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="like-btn">
                                        <button type="submit"><i class="fa fa-heart"></i></button>
                                        <span>1000</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-lg-4 glry-item col-sm-12 logo">
                                <div class="portfolio-item-img">
                                    <img src="{{ asset('uploads/common_dummy/600x600.jpg') }}" alt="Portfolio Img" class="img-fluid portfolio-img">
                                    <div class="portfolio-buttons">
                                        <a href="{{ asset('uploads/common_dummy/600x600.jpg') }}" class="portfolio-zoom-link">
                                            <span></span>
                                            <span></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="portfolio-detail-text">
                                    <h6 class="portfolio-detail-title"><a href="#">Logo Design</a></h6>
                                    <span>Logo</span>
                                </div>
                                <ul class="portfolio-item-share">
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="like-btn">
                                        <button type="submit"><i class="fa fa-heart"></i></button>
                                        <span>1000</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-lg-4 glry-item col-sm-12 branding">
                                <div class="portfolio-item-img">
                                    <img src="{{ asset('uploads/common_dummy/600x600.jpg') }}" alt="Portfolio Img" class="img-fluid portfolio-img">
                                    <div class="portfolio-buttons">
                                        <a href="{{ asset('uploads/common_dummy/600x600.jpg') }}" class="portfolio-zoom-link">
                                            <span></span>
                                            <span></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="portfolio-detail-text">
                                    <h6 class="portfolio-detail-title"><a href="#">Brand Design</a></h6>
                                    <span>Branding</span>
                                </div>
                                <ul class="portfolio-item-share">
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="like-btn">
                                        <button type="submit"><i class="fa fa-heart"></i></button>
                                        <span>1000</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-lg-4 glry-item col-sm-12 branding">
                                <div class="portfolio-item-img">
                                    <img src="{{ asset('uploads/common_dummy/600x600.jpg') }}" alt="Portfolio Img" class="img-fluid portfolio-img">
                                    <div class="portfolio-buttons">
                                        <a href="{{ asset('uploads/common_dummy/600x600.jpg') }}" class="portfolio-zoom-link">
                                            <span></span>
                                            <span></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="portfolio-detail-text">
                                    <h6 class="portfolio-detail-title"><a href="#">Brand Design</a></h6>
                                    <span>Branding</span>
                                </div>
                                <ul class="portfolio-item-share">
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="like-btn">
                                        <button type="submit"><i class="fa fa-heart"></i></button>
                                        <span>1000</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-lg-4 glry-item col-sm-12 branding">
                                <div class="portfolio-item-img">
                                    <img src="{{ asset('uploads/common_dummy/600x600.jpg') }}" alt="Portfolio Img" class="img-fluid portfolio-img">
                                    <div class="portfolio-buttons">
                                        <a href="{{ asset('uploads/common_dummy/600x600.jpg') }}" class="portfolio-zoom-link">
                                            <span></span>
                                            <span></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="portfolio-detail-text">
                                    <h6 class="portfolio-detail-title"><a href="#">Brand Design</a></h6>
                                    <span>Branding</span>
                                </div>
                                <ul class="portfolio-item-share">
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="like-btn">
                                        <button type="submit"><i class="fa fa-heart"></i></button>
                                        <span>1000</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-lg-4 glry-item col-sm-12 web">
                                <div class="portfolio-item-img">
                                    <img src="{{ asset('uploads/common_dummy/600x600.jpg') }}" alt="Portfolio Img" class="img-fluid portfolio-img">
                                    <div class="portfolio-buttons">
                                        <a href="{{ asset('uploads/common_dummy/600x600.jpg') }}" class="portfolio-zoom-link">
                                            <span></span>
                                            <span></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="portfolio-detail-text">
                                    <h6 class="portfolio-detail-title"><a href="#">Web Design</a></h6>
                                    <span>Web Design</span>
                                </div>
                                <ul class="portfolio-item-share">
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="like-btn">
                                        <button type="submit"><i class="fa fa-heart"></i></button>
                                        <span>1000</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-lg-4 glry-item col-sm-12 logo">
                                <div class="portfolio-item-img">
                                    <img src="{{ asset('uploads/common_dummy/600x600.jpg') }}" alt="Portfolio Img" class="img-fluid portfolio-img">
                                    <div class="portfolio-buttons">
                                        <a href="{{ asset('uploads/common_dummy/600x600.jpg') }}" class="portfolio-zoom-link">
                                            <span></span>
                                            <span></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="portfolio-detail-text">
                                    <h6 class="portfolio-detail-title"><a href="#">Logo Design</a></h6>
                                    <span>Logo</span>
                                </div>
                                <ul class="portfolio-item-share">
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="like-btn">
                                        <button type="submit"><i class="fa fa-heart"></i></button>
                                        <span>1000</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-lg-4 glry-item col-sm-12 logo">
                                <div class="portfolio-item-img">
                                    <img src="{{ asset('uploads/common_dummy/600x600.jpg') }}" alt="Portfolio Img" class="img-fluid portfolio-img">
                                    <div class="portfolio-buttons">
                                        <a href="{{ asset('uploads/common_dummy/600x600.jpg') }}" class="portfolio-zoom-link">
                                            <span></span>
                                            <span></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="portfolio-detail-text">
                                    <h6 class="portfolio-detail-title"><a href="#">Logo Design</a></h6>
                                    <span>Logo</span>
                                </div>
                                <ul class="portfolio-item-share">
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="like-btn">
                                        <button type="submit"><i class="fa fa-heart"></i></button>
                                        <span>1000</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .container -->
                </section>
            @endif

            @endif
        <!-- Portfolio End -->

        <!-- Banner Start -->
        @if ($section_arr['call_to_action_section'] == 1)

            @isset($call_to_action_section)
                <div class="banner-wrap section bg-jarallax-overlay" data-bg-image-path="{{ asset('uploads/creative/img/general/'.$call_to_action_section->action_image) }}">
                    <div class="container">
                        <div class="row align-items-center justify-content-center text-center">
                            <div class="col-lg-7 col-md-12 col-sm-12">
                                <div class="banner-inner">
                                    @if (!empty($call_to_action_section->title))
                                        @php
                                            // Explode
                                             $str = $call_to_action_section->title;
                                             $arr =  explode(" ", $str);
                                        @endphp
                                        <h4 class="banner-title wow fadeInUp" data-wow-duration="1.5s">
                                            @for ($i = 0; $i < count($arr); $i++)
                                                @if ($arr[$i] != end($arr))
                                                    {{ $arr[$i] }}
                                                @else
                                                    <span>{{ $arr[$i] }}</span>
                                                @endif
                                            @endfor
                                        </h4>
                                    @endif
                                    @if (!empty($call_to_action_section->desc)) <p class="banner-text wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".1s">{{ $call_to_action_section->desc }}</p> @endif
                                    <a href="#" data-scroll-nav="5" class="default-button wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".2s">{{ __('frontend.contact_us') }}</a>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .container -->
                </div>
            @else
                <div class="banner-wrap section bg-jarallax-overlay" data-bg-image-path="{{ asset('uploads/common_dummy/1920x950.jpg') }}">
                    <div class="container">
                        <div class="row align-items-center justify-content-center text-center">
                            <div class="col-lg-7 col-md-12 col-sm-12">
                                <div class="banner-inner">
                                    <h4 class="banner-title wow fadeInUp" data-wow-duration="1.5s">Do you need a new <span>project?</span></h4>
                                    <p class="banner-text wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".1s">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                    </p>
                                    <a href="#" data-scroll-nav="5" class="default-button wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".2s">Hire Me</a>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .container -->
                </div>
        @endisset

            @endif
        <!-- Banner End -->

        <!--Testimonials Start -->
        @if ($section_arr['client_section'] == "1")

            @if (isset($testimonial_section) || count($testimonials) > 0)
                <section class="section testimonials">
                    <div class="container">
                        @if (!empty($testimonial_section->title))
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7">
                                @php
                                    // Explode
                                     $str = $testimonial_section->title;
                                     $arr =  explode(" ", $str);
                                @endphp
                                <div class="section-heading">
                                    <h2 class="section-title">
                                        @for ($i = 0; $i < count($arr); $i++)
                                            @if ($i == 0  )
                                                {{ $arr[0] }}
                                            @else
                                                <span>{{ $arr[$i] }} </span>
                                            @endif
                                        @endfor
                                    </h2>
                                </div>
                            </div>
                        </div>
                            <!-- .row -->
                        @endif
                        @if (count($testimonials) > 0)
                                <div class="testimonials-carousel owl-carousel owl-theme wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".2s">
                                   @foreach ($testimonials as $testimonial)
                                        <div class="item">
                                            <div class="testimonial-item text-center clearfix">
                                                @if (!empty($testimonial->testimonial_image))
                                                    <div class="testimonial-img">
                                                        <img src="{{ asset('uploads/creative/img/testimonials/'.$testimonial->testimonial_image) }}" alt="Clients image" class="img-fluid">
                                                    </div>
                                                    @endif
                                                <div class="testimonial-item-body">
                                                    <div class="testimonial-details">
                                                        @if (!empty($testimonial->name)) <h5>{{ $testimonial->name }}</h5> @endif
                                                        @if (!empty($testimonial->job)) <span>{{ $testimonial->job }}</span> @endif
                                                    </div>
                                                    @if (!empty($testimonial->desc))
                                                        <blockquote class="testimonial-text">
                                                            <q>{{ $testimonial->desc }}</q>
                                                        </blockquote>
                                                    @endif
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
                                <!-- .testimonials-carousel -->
                            @endif
                    </div>
                    <!-- .container -->
                </section>
            @else
                <section class="section testimonials">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7">
                                <div class="section-heading">
                                    <h2 class="section-title">My<span>Clients</span></h2>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                        <div class="testimonials-carousel owl-carousel owl-theme wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".2s">
                            <div class="item">
                                <div class="testimonial-item text-center clearfix">
                                    <div class="testimonial-img">
                                        <img src="{{ asset('uploads/common_dummy/150x150.jpg') }}" alt="Clients image" class="img-fluid">
                                    </div>
                                    <div class="testimonial-item-body">
                                        <div class="testimonial-details">
                                            <h5>James Marty</h5>
                                            <span>UI Designer</span>
                                        </div>
                                        <blockquote class="testimonial-text">
                                            <q>
                                                It is a long established fact that a reader will be distracted by the readable content
                                                of a page when looking at its layout.
                                            </q>
                                        </blockquote>
                                        <div class="testimonial-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimonial-item clearfix">
                                    <div class="testimonial-img">
                                        <img src="{{ asset('uploads/common_dummy/150x150.jpg') }}" alt="Clients image" class="img-fluid">
                                    </div>
                                    <div class="testimonial-item-body">
                                        <div class="testimonial-details">
                                            <h5>Louis Hansel</h5>
                                            <span>Graphic Designer</span>
                                        </div>
                                        <blockquote class="testimonial-text">
                                            <q>
                                                It is a long established fact that a reader will be distracted by the readable content
                                                of a page when looking at its layout.
                                            </q>
                                        </blockquote>
                                        <div class="testimonial-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimonial-item clearfix">
                                    <div class="testimonial-img">
                                        <img src="{{ asset('uploads/common_dummy/150x150.jpg') }}" alt="Clients image" class="img-fluid">
                                    </div>
                                    <div class="testimonial-item-body">
                                        <div class="testimonial-details">
                                            <h5>Carlos Macias</h5>
                                            <span>Visual Designer</span>
                                        </div>
                                        <blockquote class="testimonial-text">
                                            <q>
                                                It is a long established fact that a reader will be distracted by the readable content
                                                of a page when looking at its layout.
                                            </q>
                                        </blockquote>
                                        <div class="testimonial-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimonial-item clearfix">
                                    <div class="testimonial-img">
                                        <img src="{{ asset('uploads/common_dummy/150x150.jpg') }}" alt="Clients image" class="img-fluid">
                                    </div>
                                    <div class="testimonial-item-body">
                                        <div class="testimonial-details">
                                            <h5>Michael James</h5>
                                            <span>Visual Designer</span>
                                        </div>
                                        <blockquote class="testimonial-text">
                                            <q>
                                                It is a long established fact that a reader will be distracted by the readable content
                                                of a page when looking at its layout.
                                            </q>
                                        </blockquote>
                                        <div class="testimonial-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .testimonials-carousel -->
                    </div>
                    <!-- .container -->
                </section>
        @endif

    @endif
        <!-- Testimonials End -->

        <!-- My Projects Start -->
        @if ($section_arr['gallery_section'] == 1)

            @if (isset($gallery_section) || count($galleries) > 0)
                <section class="section" id="my-gallery">
                    @if (!empty($gallery_section->title))
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 col-md-10">
                                    @php
                                        // Explode
                                         $str = $gallery_section->title;
                                         $arr =  explode(" ", $str);
                                    @endphp
                                    <div class="section-heading">
                                        <h2 class="section-title">
                                            @for ($i = 0; $i < count($arr); $i++)
                                                @if ($i == 0  )
                                                    {{ $arr[0] }}
                                                @else
                                                    <span>{{ $arr[$i] }} </span>
                                                @endif
                                            @endfor
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                        <div class="my-projects-carousel owl-carousel owl-theme" id="galleryGrid">
                            @foreach ($galleries as $gallery)
                                <div class="item">
                                    <div class="projects-item">
                                        <div class="projects-inner">
                                            <div class="img-wrap">
                                                <img src="{{ asset('uploads/creative/img/galleries/'.$gallery->gallery_image) }}" alt="gallery image" class="img-fluid">
                                            </div>
                                            <div class="projects-zoom">
                                                <a href="{{ asset('uploads/creative/img/galleries/'.$gallery->gallery_image) }}" class="portfolio-zoom-link">
                                                    <span></span>
                                                    <span></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                        </div>
                    @if (count($galleries) > 3)
                            <div class="text-center mt-4">
                                <a href="{{ url('gallery') }}" class="default-button">{{ __('frontend.view_more') }}</a>
                            </div>
                        @endif
                </section>
            @else
                <section class="section" id="my-gallery">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7 col-md-10">
                                <div class="section-heading">
                                    <h2 class="section-title">My <span>Gallery</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-projects-carousel owl-carousel owl-theme" id="galleryGrid">
                        <div class="item">
                            <div class="projects-item">
                                <div class="projects-inner">
                                    <div class="img-wrap">
                                        <img src="{{ asset('uploads/common_dummy/600x650.jpg') }}" alt="Projects image" class="img-fluid">
                                    </div>
                                    <div class="projects-zoom">
                                        <a href="{{ asset('uploads/common_dummy/600x650.jpg') }}" class="portfolio-zoom-link">
                                            <span></span>
                                            <span></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="projects-item">
                                <div class="projects-inner">
                                    <div class="img-wrap">
                                        <img src="{{ asset('uploads/common_dummy/600x650.jpg') }}" alt="Projects image" class="img-fluid">
                                    </div>
                                    <div class="projects-zoom">
                                        <a href="{{ asset('uploads/common_dummy/600x650.jpg') }}" class="portfolio-zoom-link">
                                            <span></span>
                                            <span></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="projects-item">
                                <div class="projects-inner">
                                    <div class="img-wrap">
                                        <img src="{{ asset('uploads/common_dummy/600x650.jpg') }}" alt="Projects image" class="img-fluid">
                                    </div>
                                    <div class="projects-zoom">
                                        <a href="{{ asset('uploads/common_dummy/600x650.jpg') }}" class="portfolio-zoom-link">
                                            <span></span>
                                            <span></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="projects-item">
                                <div class="projects-inner">
                                    <div class="img-wrap">
                                        <img src="{{ asset('uploads/common_dummy/600x650.jpg') }}" alt="Projects image" class="img-fluid">
                                    </div>
                                    <div class="projects-zoom">
                                        <a href="{{ asset('uploads/common_dummy/600x650.jpg') }}" class="portfolio-zoom-link">
                                            <span></span>
                                            <span></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="projects-item">
                                <div class="projects-inner">
                                    <div class="img-wrap">
                                        <img src="{{ asset('uploads/common_dummy/600x650.jpg') }}" alt="Projects image" class="img-fluid">
                                    </div>
                                    <div class="projects-zoom">
                                        <a href="{{ asset('uploads/common_dummy/600x650.jpg') }}" class="portfolio-zoom-link">
                                            <span></span>
                                            <span></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="#" class="default-button">View More</a>
                    </div>
                </section>
        @endif

    @endif
        <!-- Our Projects End -->

        <!-- My Team Start -->
        @if ($section_arr['team_section'] == 1)

            @if (isset($team_section) || count($teams) > 0)
                <section class="section my-team">
                    <div class="container">
                        @if (!empty($team_section->title))
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7">
                                @php
                                    // Explode
                                     $str = $team_section->title;
                                     $arr =  explode(" ", $str);
                                @endphp
                                <div class="section-heading">
                                    <h2 class="section-title">
                                        @for ($i = 0; $i < count($arr); $i++)
                                            @if ($i == 0  )
                                                {{ $arr[0] }}
                                            @else
                                                <span>{{ $arr[$i] }} </span>
                                            @endif
                                        @endfor
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                        @endif
                        <div class="row justify-content-center">
                            @php $i = 1; @endphp
                        @foreach ($teams as $team)
                                <div class="col-md-6 col-sm-12 col-lg-4 team-card-resp wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".{{ $i++ }}s">
                                    <div class="team-card">
                                        <div class="team-img">
                                            @if (!empty($team->team_image)) <img src="{{ asset('uploads/creative/img/teams/'.$team->team_image) }}" class="img-fluid" alt="Team image"> @endif
                                            <div class="team-social">
                                                @if (!empty($team->link_1))  <a href="@if (!empty($team->link_1)) @else # @endif"><i class="fab fa-facebook-f"></i></a> @endif
                                                @if (!empty($team->link_2))  <a href="@if (!empty($team->link_2)) @else # @endif"><i class="fab fa-twitter"></i></a> @endif
                                                @if (!empty($team->link_3))  <a href="@if (!empty($team->link_3)) @else # @endif"><i class="fab fa-instagram"></i></a> @endif
                                                @if (!empty($team->link_4))  <a href="@if (!empty($team->link_4)) @else # @endif"><i class="fab fa-linkedin"></i></a> @endif
                                            </div>
                                        </div>
                                        <div class="team-body">
                                            @if (!empty($team->name)) <h5>{{ $team->name }}</h5> @endif
                                            @if (!empty($team->job)) <span>{{ $team->job }}</span> @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .container -->
                </section>
            @else
                <section class="section my-team">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7">
                                <div class="section-heading">
                                    <h2 class="section-title">My<span>Team</span></h2>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-sm-12 col-lg-4 team-card-resp wow fadeInLeft" data-wow-duration="1.5s">
                                <div class="team-card">
                                    <div class="team-img">
                                        <img src="{{ asset('uploads/common_dummy/600x600.jpg') }}" class="img-fluid" alt="Team image">
                                        <div class="team-social">
                                            <a href="#0"><i class="fab fa-facebook-f"></i></a>
                                            <a href="#0"><i class="fab fa-twitter"></i></a>
                                            <a href="#0"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                    <div class="team-body">
                                        <h5>Andrea Dibitonto</h5>
                                        <span>Web Designer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-4 team-card-resp wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".2s">
                                <div class="team-card">
                                    <div class="team-img">
                                        <img src="{{ asset('uploads/common_dummy/600x600.jpg') }}" class="img-fluid" alt="Team image">
                                        <div class="team-social">
                                            <a href="#0"><i class="fab fa-facebook-f"></i></a>
                                            <a href="#0"><i class="fab fa-twitter"></i></a>
                                            <a href="#0"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                    <div class="team-body">
                                        <h5>Brooke Cagle</h5>
                                        <span>UI/UX Designer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-4 team-card-resp wow fadeInRight" data-wow-duration="1.5s" data-wow-delay=".3s">
                                <div class="team-card">
                                    <div class="team-img">
                                        <img src="{{ asset('uploads/common_dummy/600x600.jpg') }}" class="img-fluid" alt="Team image">
                                        <div class="team-social">
                                            <a href="#0"><i class="fab fa-facebook-f"></i></a>
                                            <a href="#0"><i class="fab fa-twitter"></i></a>
                                            <a href="#0"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                    <div class="team-body">
                                        <h5>Jeremy McKnight</h5>
                                        <span>Project Supervisor</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .container -->
                </section>
        @endif

        @endif
        <!-- My Team End -->

        <!-- Pricing Start -->
        @if ($section_arr['price_section'] == 1)

            @if (isset($price_section) || count($monthly_prices) > 0 || count($annualy_prices) > 0)
                <section id="pricing" class="section pricing">
                    <div class="container">
                        @if (!empty($price_section->title))
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-7">
                                @php
                                    // Explode
                                     $str = $price_section->title;
                                     $arr =  explode(" ", $str);
                                @endphp
                                <div class="section-heading">
                                    <h2 class="section-title">
                                        @for ($i = 0; $i < count($arr); $i++)
                                            @if ($i == 0  )
                                                {{ $arr[0] }}
                                            @else
                                                <span>{{ $arr[$i] }} </span>
                                            @endif
                                        @endfor
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                        @endif
                        <div class="row justify-content-center text-center">
                            <div class="col-lg-7">
                                <div class="price-toggle-wrap clearfix">
                                    @if (count($monthly_prices) > 0) <a href="#0" class="active">{{ __('frontend.monthly') }}</a> @endif
                                    @if (count($annualy_prices) > 0) <a href="#0" class="mr-0">{{ __('frontend.annualy') }}</a> @endif
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                        <div class="pricing-tab-content-wrap">
                            @if (count($monthly_prices) > 0)
                                <div class="pricing-tab-content active">
                                    <div class="row justify-content-center">
                                       @foreach ($monthly_prices as $monthly_price)
                                            <div class="col-md-6 col-lg-4 price-table-resp">
                                                <div class="price-table">
                                                    @if (!empty($monthly_price->title))
                                                        <div class="price-text">
                                                            <span>{{ $monthly_price->title }}</span>
                                                        </div>
                                                    @endif
                                                    @if (!empty($monthly_price->icon))
                                                            <div class="price-icon">
                                                                <i class="{{ $monthly_price->icon }}"></i>
                                                                <div class="price-icon-shape-wrap">
                                                                    <div class="price-icon-shape"></div>
                                                                    <div class="price-icon-shape"></div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                   @if (!empty($monthly_price->price))
                                                            <div class="price-value">
                                                                <b>{{ $monthly_price->currency }}{{$monthly_price->price}}</b>
                                                                <span>/{{ __('frontend.monthly') }}</span>
                                                            </div>
                                                       @endif
                                                    @if (!empty($monthly_price->desc))
                                                            @php
                                                                // Explode
                                                                 $str = $monthly_price->desc;
                                                                 $arr =  explode(";", $str);
                                                            @endphp
                                                            <ul class="price-list">
                                                                @for ($i = 0; $i < count($arr); $i++)
                                                                    <li>{{ $arr[$i] }}</li>
                                                                @endfor
                                                            </ul>
                                                        @endif
                                                  @if (!empty($monthly_price->btn_name))
                                                            <div class="price-footer">
                                                                <a href="@if (!empty($monthly_price->btn_link)) {{ $monthly_price->btn_link }} @else # @endif" class="default-button">{{ $monthly_price->btn_name }}</a>
                                                            </div>
                                                        @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- .row -->
                                </div>
                                @endif
                            @if (count($annualy_prices) > 0)
                                    <div class="pricing-tab-content">
                                        <div class="row justify-content-center">
                                            @foreach ($annualy_prices as $annualy_price)
                                                <div class="col-md-6 col-lg-4 price-table-resp">
                                                    <div class="price-table">
                                                        @if (!empty($annualy_price->title))
                                                            <div class="price-text">
                                                                <span>{{ $annualy_price->title }}</span>
                                                            </div>
                                                        @endif
                                                        @if (!empty($annualy_price->icon))
                                                            <div class="price-icon">
                                                                <i class="{{ $annualy_price->icon }}"></i>
                                                                <div class="price-icon-shape-wrap">
                                                                    <div class="price-icon-shape"></div>
                                                                    <div class="price-icon-shape"></div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if (!empty($annualy_price->price))
                                                            <div class="price-value">
                                                                <b>{{ $annualy_price->currency }}{{$annualy_price->price}}</b>
                                                                <span>/{{ __('frontend.annualy') }}</span>
                                                            </div>
                                                        @endif
                                                        @if (!empty($annualy_price->desc))
                                                            @php
                                                                // Explode
                                                                 $str = $annualy_price->desc;
                                                                 $arr =  explode(";", $str);
                                                            @endphp
                                                            <ul class="price-list">
                                                                @for ($i = 0; $i < count($arr); $i++)
                                                                    <li>{{ $arr[$i] }}</li>
                                                                @endfor
                                                            </ul>
                                                        @endif
                                                        @if (!empty($annualy_price->btn_name))
                                                            <div class="price-footer">
                                                                <a href="@if (!empty($annualy_price->btn_link)) {{ $annualy_price->btn_link }} @else # @endif" class="default-button">{{ $monthly_price->btn_name }}</a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- .row -->
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- .container -->
                </section>
            @else
                <section class="section pricing">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-7">
                                <div class="section-heading">
                                    <h2 class="section-title">My<span>Pricing</span></h2>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                        <div class="row justify-content-center text-center">
                            <div class="col-lg-7">
                                <div class="price-toggle-wrap clearfix">
                                    <a href="#0" class="active">Monthly</a>
                                    <a href="#0" class="mr-0">Annualy</a>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                        <div class="pricing-tab-content-wrap">
                            <div class="pricing-tab-content active">
                                <div class="row justify-content-center">
                                    <div class="col-md-6 col-lg-4 price-table-resp">
                                        <div class="price-table">
                                            <div class="price-text">
                                                <span>Basic</span>
                                            </div>
                                            <div class="price-icon">
                                                <i class="fas fa-chart-pie"></i>
                                                <div class="price-icon-shape-wrap">
                                                    <div class="price-icon-shape"></div>
                                                    <div class="price-icon-shape"></div>
                                                </div>
                                            </div>
                                            <div class="price-value">
                                                <b>$39</b>
                                                <span>/Monthly</span>
                                            </div>
                                            <ul class="price-list">
                                                <li>1 Gb Diskspace</li>
                                                <li>10 Gb Bandwith</li>
                                                <li>2 Email Adress</li>
                                                <li>WordPress Installs</li>
                                                <li>Private Support</li>
                                            </ul>
                                            <div class="price-footer">
                                                <a href="#0" class="default-button">Sign Up</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 price-table-resp">
                                        <div class="price-table">
                                            <div class="price-text">
                                                <span>Premium</span>
                                            </div>
                                            <div class="price-icon">
                                                <i class="fas fa-chart-line"></i>
                                                <div class="price-icon-shape-wrap">
                                                    <div class="price-icon-shape"></div>
                                                    <div class="price-icon-shape"></div>
                                                </div>
                                            </div>
                                            <div class="price-value">
                                                <b>$49</b>
                                                <span>/Monthly</span>
                                            </div>
                                            <ul class="price-list">
                                                <li>5 Gb Diskspace</li>
                                                <li>50 Gb Bandwith</li>
                                                <li>4 Email Adress</li>
                                                <li>WordPress Installs</li>
                                                <li>Private Support</li>
                                            </ul>
                                            <div class="price-footer">
                                                <a href="#0" class="default-button">Sign Up</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 price-table-resp">
                                        <div class="price-table">
                                            <div class="price-text">
                                                <span>Business</span>
                                            </div>
                                            <div class="price-icon">
                                                <i class="fas fa-city"></i>
                                                <div class="price-icon-shape-wrap">
                                                    <div class="price-icon-shape"></div>
                                                    <div class="price-icon-shape"></div>
                                                </div>
                                            </div>
                                            <div class="price-value">
                                                <b>$59</b>
                                                <span>/Monthly</span>
                                            </div>
                                            <ul class="price-list">
                                                <li>20 Gb Diskspace</li>
                                                <li>100 Gb Bandwith</li>
                                                <li>10 Email Adress</li>
                                                <li>WordPress Installs</li>
                                                <li>Private Support</li>
                                            </ul>
                                            <div class="price-footer">
                                                <a href="#0" class="default-button">Sign Up</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- .row -->
                            </div>
                            <div class="pricing-tab-content">
                                <div class="row justify-content-center">
                                    <div class="col-md-6 col-lg-4 price-table-resp">
                                        <div class="price-table">
                                            <div class="price-text">
                                                <span>Basic</span>
                                            </div>
                                            <div class="price-icon">
                                                <i class="fas fa-chart-pie"></i>
                                                <div class="price-icon-shape-wrap">
                                                    <div class="price-icon-shape"></div>
                                                    <div class="price-icon-shape"></div>
                                                </div>
                                            </div>
                                            <div class="price-value">
                                                <b>$39</b>
                                                <span>/Annualy</span>
                                            </div>
                                            <ul class="price-list">
                                                <li>1 Gb Diskspace</li>
                                                <li>10 Gb Bandwith</li>
                                                <li>2 Email Adress</li>
                                                <li>WordPress Installs</li>
                                                <li>Private Support</li>
                                            </ul>
                                            <div class="price-footer">
                                                <a href="#0" class="default-button">Sign Up</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 price-table-resp">
                                        <div class="price-table">
                                            <div class="price-text">
                                                <span>Premium</span>
                                            </div>
                                            <div class="price-icon">
                                                <i class="fas fa-chart-line"></i>
                                                <div class="price-icon-shape-wrap">
                                                    <div class="price-icon-shape"></div>
                                                    <div class="price-icon-shape"></div>
                                                </div>
                                            </div>
                                            <div class="price-value">
                                                <b>$49</b>
                                                <span>/Annualy</span>
                                            </div>
                                            <ul class="price-list">
                                                <li>5 Gb Diskspace</li>
                                                <li>50 Gb Bandwith</li>
                                                <li>4 Email Adress</li>
                                                <li>WordPress Installs</li>
                                                <li>Private Support</li>
                                            </ul>
                                            <div class="price-footer">
                                                <a href="#0" class="default-button">Sign Up</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 price-table-resp">
                                        <div class="price-table">
                                            <div class="price-text">
                                                <span>Business</span>
                                            </div>
                                            <div class="price-icon">
                                                <i class="fas fa-city"></i>
                                                <div class="price-icon-shape-wrap">
                                                    <div class="price-icon-shape"></div>
                                                    <div class="price-icon-shape"></div>
                                                </div>
                                            </div>
                                            <div class="price-value">
                                                <b>$59</b>
                                                <span>/Annualy</span>
                                            </div>
                                            <ul class="price-list">
                                                <li>20 Gb Diskspace</li>
                                                <li>100 Gb Bandwith</li>
                                                <li>10 Email Adress</li>
                                                <li>WordPress Installs</li>
                                                <li>Private Support</li>
                                            </ul>
                                            <div class="price-footer">
                                                <a href="#0" class="default-button">Sign Up</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- .row -->
                            </div>
                        </div>
                    </div>
                    <!-- .container -->
                </section>
        @endif

        @endif
        <!-- Pricing End -->

        <!-- Latest Blog Start -->
        @if ($section_arr['blog_section'] == 1)

            @if (isset($blog_section) || count($recent_posts) > 0)
                <section class="section blog">
                    <div class="container">
                        @if (!empty($blog_section->title))
                            <div class="row align-items-center justify-content-center">
                                <div class="col-lg-7">
                                    @php
                                        // Explode
                                         $str = $blog_section->title;
                                         $arr =  explode(" ", $str);
                                    @endphp
                                    <div class="section-heading">
                                        <h2 class="section-title">
                                            @for ($i = 0; $i < count($arr); $i++)
                                                @if ($i == 0  )
                                                    {{ $arr[0] }}
                                                @else
                                                    <span>{{ $arr[$i] }} </span>
                                                @endif
                                            @endfor
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <!-- .row -->
                        @endif
                        <div class="latest-blog-slider owl-carousel owl-theme">
                            @foreach ($recent_posts as $recent_post)
                                <div class="item">
                                    <div class="blog-item">
                                        <div class="blog-img">
                                            <a href="{{ url('blog/'.$recent_post->slug) }}">
                                                @if (!empty($recent_post->blog_image))
                                                    <img src="{{ asset('uploads/creative/img/blogs/'.$recent_post->blog_image) }}" class="img-fluid round-item" alt="blog image" >
                                                @else
                                                    <img src="{{ asset('uploads/creative/img/dummy/no-image.jpg') }}" class="img-fluid round-item" alt="blog image">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="blog-inner">
                                            <div class="blog-meta d-flex align-items-center">
                                                <i class="fa fa-calendar-alt"></i>
                                                <span>{{ Carbon\Carbon::parse($recent_post->created_at)->isoFormat('DD') }} {{ Carbon\Carbon::parse($recent_post->created_at)->isoFormat('MMMM') }} {{ Carbon\Carbon::parse($recent_post->created_at)->isoFormat('GGGG') }}</span>
                                            </div>
                                            <h5 class="blog-title">
                                                <a href="{{ url('blog/'.$recent_post->slug) }}">{{ $recent_post->title }}</a>
                                            </h5>
                                            @if (!empty($recent_post->short_desc)) <p class="blog-desc"> {{ $recent_post->short_desc }}</p> @endif
                                            <div class="blog-item-footer d-flex align-items-center justify-content-between">
                                                <div class="blog-small-img">
                                                    <span><i class="far fa-user mr-2"></i>@if (!empty($recent_post->author)) {{ $recent_post->author }} @else {{ __('frontend.admin') }} @endif</span>
                                                </div>
                                                <a href="{{ url('blog/'.$recent_post->slug) }}" class="blog-more-link">{{ __('frontend.read_more') }} <i class="fa fa-angle-right ml-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if (count($recent_posts) > 5)
                                <div class="text-center mt-4">
                                    <a href="{{ url('blogs') }}" class="default-button">{{ __('frontend.view_more') }}</a>
                                </div>
                            @endif
                    </div>
                </section>
        @else
                <section class="section blog">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-7">
                                <div class="section-heading">
                                    <h2 class="section-title">Latest<span>Blog</span></h2>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->
                        <div class="latest-blog-slider owl-carousel owl-theme">
                            <div class="item">
                                <div class="blog-item">
                                    <div class="blog-img">
                                        <a href="#">
                                            <img src="{{ asset('uploads/common_dummy/775x575.jpg') }}" alt="Blog image" class="img-fluid round-item">
                                        </a>
                                    </div>
                                    <div class="blog-inner">
                                        <div class="blog-meta d-flex align-items-center">
                                            <i class="fa fa-calendar-alt"></i>
                                            <span>14 Aqust, 2020</span>
                                        </div>
                                        <h5 class="blog-title">
                                            <a href="#">Best UI&UX design examples</a>
                                        </h5>
                                        <p class="blog-desc">
                                            It is a long established fact that a reader will be distracted by the.
                                        </p>
                                        <div class="blog-item-footer d-flex align-items-center justify-content-between">
                                            <div class="blog-small-img">
                                                <span><i class="far fa-user mr-2"></i> Alex Bolt</span>
                                            </div>
                                            <a href="#" class="blog-more-link">Read More <i class="fa fa-angle-right ml-2"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="blog-item">
                                    <div class="blog-img">
                                        <a href="#">
                                            <img src="{{ asset('uploads/common_dummy/775x575.jpg') }}" alt="Blog image" class="img-fluid round-item">
                                        </a>
                                    </div>
                                    <div class="blog-inner">
                                        <div class="blog-meta d-flex align-items-center">
                                            <i class="fa fa-calendar-alt"></i>
                                            <span>22 May, 2020</span>
                                        </div>
                                        <h5 class="blog-title">
                                            <a href="#">Good UI/UX trend design.</a>
                                        </h5>
                                        <p class="blog-desc">
                                            It is a long established fact that a reader will be distracted by the.
                                        </p>
                                        <div class="blog-item-footer d-flex align-items-center justify-content-between">
                                            <div class="blog-small-img">
                                                <span><i class="far fa-user mr-2"></i>Joe Dann</span>
                                            </div>
                                            <a href="#" class="blog-more-link">Read More <i class="fa fa-angle-right ml-2"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="blog-item">
                                    <div class="blog-img">
                                        <a href="#">
                                            <img src="{{ asset('uploads/common_dummy/775x575.jpg') }}" alt="Blog image" class="img-fluid round-item">
                                        </a>
                                    </div>
                                    <div class="blog-inner">
                                        <div class="blog-meta d-flex align-items-center">
                                            <i class="fa fa-calendar-alt"></i>
                                            <span>15 June, 2020</span>
                                        </div>
                                        <h5 class="blog-title">
                                            <a href="#">Best Logo & Brand Design.</a>
                                        </h5>
                                        <p class="blog-desc">
                                            It is a long established fact that a reader will be distracted by the.
                                        </p>
                                        <div class="blog-item-footer d-flex align-items-center justify-content-between">
                                            <div class="blog-small-img">
                                                <span><i class="far fa-user mr-2"></i>John Doe</span>
                                            </div>
                                            <a href="#" class="blog-more-link">Read More <i class="fa fa-angle-right ml-2"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="blog-item">
                                    <div class="blog-img">
                                        <a href="#">
                                            <img src="{{ asset('uploads/common_dummy/775x575.jpg') }}" alt="Blog image" class="img-fluid round-item">
                                        </a>
                                    </div>
                                    <div class="blog-inner">
                                        <div class="blog-meta d-flex align-items-center">
                                            <i class="fa fa-calendar-alt"></i>
                                            <span>11 October, 2020</span>
                                        </div>
                                        <h5 class="blog-title">
                                            <a href="#">App & Business Solutions.</a>
                                        </h5>
                                        <p class="blog-desc">
                                            It is a long established fact that a reader will be distracted by the.
                                        </p>
                                        <div class="blog-item-footer d-flex align-items-center justify-content-between">
                                            <div class="blog-small-img">
                                                <span><i class="far fa-user mr-2"></i>Joe Dann</span>
                                            </div>
                                            <a href="#" class="blog-more-link">Read More <i class="fa fa-angle-right ml-2"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <a href="#" class="default-button">View More</a>
                        </div>
                    </div>
                </section>
        @endif

            @endif
        <!-- Latest Blog End -->

       @if ($section_arr['contact_section'] == 1)

           @if (isset($contact_section) || count($contacts) > 0)
            <!-- Contact Me Start -->
                <section id="contact" class="contact section" data-scroll-index="5">
                    @if (isset($contact_section))
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-7">
                                @php
                                    // Explode
                                     $str = $contact_section->title;
                                     $arr =  explode(" ", $str);
                                @endphp
                                <div class="section-heading">
                                    <h2 class="section-title">
                                        @for ($i = 0; $i < count($arr); $i++)
                                            @if ($i == 0  )
                                                {{ $arr[0] }}
                                            @else
                                                <span>{{ $arr[$i] }} </span>
                                            @endif
                                        @endfor
                                    </h2>
                                </div>
                            </div>
                        </div>
                        @endif
                    <div class="container">
                        <div class="row">
                           @if (count($contacts) > 0)
                                <div class="col-md-12 col-lg-6 col-xl-5 contact-info-wrap wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".1s">
                                    <div class="row">
                                       @foreach ($contacts as $contact)
                                            <div class="col-md-12 contact-info-item-mb">
                                                <div class="contact-info-item">
                                                    @if (!empty($contact->icon))
                                                    <div class="contact-info-icon">
                                                        <i class="{{ $contact->icon }}"></i>
                                                    </div>
                                                    @endif
                                                    <div class="contact-info-body">
                                                        @if (!empty($contact->title)) <h6>{{ $contact->title }}</h6> @endif
                                                        @if (!empty($contact->desc)) <p>{{ $contact->desc }}</p> @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- .row -->
                               @endif
                            <div class="@if (count($contacts) >0) col-xl-7 @else col-lg-12 @endif col-md-12  wow fadeInRight" data-wow-duration="1.5s" data-wow-delay=".2s">
                                <!-- Include Alert Blade -->
                                @include('admin.alert.alert')

                                <form id="contactForm" action="{{ route('message.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="contact-form-group">
                                                <input type="text" class="form-input" name="name" id="contactName" placeholder="{{ __('frontend.your_name') }}" required>
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="contact-form-group">
                                                <input type="text" class="form-input" name="email" id="contactEmail" placeholder="{{ __('frontend.your_email') }}" required>
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="contact-form-group">
                                                <input type="text" class="form-input" name="subject" id="contactSubject" placeholder="{{ __('frontend.subject') }}" required>
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="contact-form-group">
                                                <textarea name="message" id="contactMessage" class="form-input contact-text-area" placeholder="{{ __('frontend.your_message') }}"  cols="20" rows="4" required></textarea>
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="contact-btn-wrap">
                                                <button type="submit" id="contactBtn" class="default-button">{{ __('frontend.send_message') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Contact Me End -->

                <!-- Google Map Start -->
                @if (!empty($contact_section->map_iframe))
                    <section id="google-map">
                        <div class="container">
                            <iframe src="{{ $contact_section->map_iframe }}" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </section>
                @endif
            <!-- Google Map End -->
            @else
                <!-- Contact Me Start -->
                <section class="contact section" data-scroll-index="5">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-7">
                            <div class="section-heading">
                                <h2 class="section-title">Contact<span>Me</span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-lg-6 col-xl-5 contact-info-wrap wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".1s">
                                <div class="row">
                                    <div class="col-md-12 contact-info-item-mb">
                                        <div class="contact-info-item">
                                            <div class="contact-info-icon">
                                                <i class="fa fa-map-marker-alt"></i>
                                            </div>
                                            <div class="contact-info-body">
                                                <h6>Address</h6>
                                                <p>48 Creekside Road Centereach,33371</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 contact-info-item-mb">
                                        <div class="contact-info-item">
                                            <div class="contact-info-icon">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                            <div class="contact-info-body">
                                                <h6>E-mail</h6>
                                                <p>example@gmail.com</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 contact-info-item-mb">
                                        <div class="contact-info-item">
                                            <div class="contact-info-icon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <div class="contact-info-body">
                                                <h6>Phone</h6>
                                                <p>+02 - 123 456 78 9</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--// .row //-->
                            <div class="col-lg-6 col-md-12 col-xl-7 wow fadeInRight" data-wow-duration="1.5s" data-wow-delay=".2s">
                                <form id="contactForm">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="contact-form-group">
                                                <input type="text" class="form-input" name="contact_name" id="contactName" placeholder="Your Name *">
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="contact-form-group">
                                                <input type="text" class="form-input" name="contact_email" id="contactEmail" placeholder="Your Email *">
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="contact-form-group">
                                                <input type="text" class="form-input" name="contact_subject" id="contactSubject" placeholder="Subject *">
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="contact-form-group">
                                                <textarea name="contact_message" id="contactMessage" class="form-input contact-text-area" placeholder="Your Message *" cols="20" rows="4"></textarea>
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="contact-btn-wrap">
                                                <button type="submit" id="contactBtn" class="default-button">Send Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Contact Me End -->

                <!-- Google Map Start -->
                <section id="google-map">
                    <div class="container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48274.48839431932!2d-73.1156437127091!3d40.86846101173346!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e847634742ac1b%3A0x522af6f8fa7c05b1!2sCentereach%2C%20New%20York%2C%20Amerika%20Birle%C5%9Fik%20Devletleri!5e0!3m2!1str!2str!4v1602965799707!5m2!1str!2str" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </section>
                <!-- Google Map End -->
               @endif

           @endif


    </main>
    <!-- Main Area End -->

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
                        <p class="copyright-text">© Copyright.<span id="fullYearCopyright"></span> Design with By AipThemes</p>
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
<script src="{{ asset('assets/frontend/creative/js/typed.js') }}"></script>
<script src="{{ asset('assets/frontend/creative/js/plugins.js') }}"></script>
@if ($homepage_version->choose_version == 4)
    <script src="{{ asset('assets/frontend/creative/js/particles.js') }}" defer></script>

@endif

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

<!-- Typed Text Js  -->
@if ($homepage_version->choose_version == 0 || $homepage_version->choose_version == 2 || $homepage_version->choose_version == 3 || $homepage_version->choose_version == 4 || $homepage_version->choose_version == 5)
    @if (!empty($fixed_content->animated_desc))
        <script>
            var animated_text = JSON.parse('{!! json_encode($fixed_content->animated_desc) !!}');
            var animated_text_array = animated_text.split(",");

            var options = {
                strings: animated_text_array,
                typeSpeed: 40,
                backSpeed: 40,
                loop: true
            }
            var typed = new Typed("#typed-text", options);
        </script>
    @else
        <script>
            var options = {
                strings: ["Designer", "Developer"],
                typeSpeed: 40,
                backSpeed: 40,
                loop: true
            }
            var typed = new Typed("#typed-text", options);
        </script>
    @endif
    @endif

<!-- Vegas Slider  -->
@if ($homepage_version->choose_version == 1)

    @if (count($sliders) > 0)
        <script>
            jQuery(document).ready(function() {
                jQuery("#heroSliderContainer").vegas({
                    slides: [
                            @foreach ($sliders as $slide)

                            @if (count($sliders) == 1)

                        {
                            src: "{{ asset('uploads/creative/img/sliders/'.$slide->slider_image) }}"
                        },
                        {
                            src: "{{ asset('uploads/creative/img/sliders/'.$slide->slider_image) }}"
                        },

                            @endif

                        {
                            src: "{{ asset('uploads/creative/img/sliders/'.$slide->slider_image) }}"
                        },

                        @endforeach
                    ],
                    overlay: true,
                    transition: 'fade2',
                    animation: 'kenburnsUpLeft'
                });

               @if (!empty($fixed_content->animated_desc))
                var animated_text = JSON.parse('{!! json_encode($fixed_content->animated_desc) !!}');
                var animated_text_array = animated_text.split(",");

                var options = {
                    strings: animated_text_array,
                    typeSpeed: 40,
                    backSpeed: 40,
                    loop: true
                }
                var typed = new Typed("#typed-text", options);
                @endif
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

                var options = {
                    strings: ["Designer", "Developer"],
                    typeSpeed: 40,
                    backSpeed: 40,
                    loop: true
                }
                var typed = new Typed("#typed-text", options);
            });
        </script>
    @endif

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