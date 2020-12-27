@extends('layouts.frontend.creative.master')

@section('content')


    <!-- Main Start -->
    <main class="site-main" id="mainWrapper">

        <!-- Breadcrumb Section Start -->
        <section class="breadcrumb-section section" data-bg-image-path="@if (isset($breadcrumb)) {{ asset('uploads/creative/img/general/'.$breadcrumb->breadcrumb_image) }}
        @else {{ asset('uploads/common_dummy/1920x750.jpg') }}
        @endif">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="breadcrumb-inner text-center">
                            <h1>{{ __('frontend.search_results') }}</h1>
                            <ul class="breadcrumb-links">
                                <li>
                                    <a  href="{{ url('/') }}">{{ __('frontend.home') }}</a>
                                </li>
                                <li class="active">
                                    {{ __('frontend.search_results') }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- Breadcrumb Section end -->

        <!-- Blog Single Section Start -->
        @if (count($blogs) > 0)
            <section class="section blog" data-scroll-index="1">
                <div class="container">
                    <div class="row justify-content-center">
                        @foreach ($blogs as $blog)
                            <div class="col-md-6 col-lg-4 blog-grid-item wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".2s">
                                <div class="blog-item">
                                    <div class="blog-img">
                                        <a href="{{ url('blog/'.$blog->slug) }}">
                                            @if (!empty($blog->blog_image))
                                                <img src="{{ asset('uploads/creative/img/blogs/'.$blog->blog_image) }}" class="img-fluid round-item" alt="blog image" >
                                            @else
                                                <img src="{{ asset('uploads/creative/img/dummy/no-image.jpg') }}" class="img-fluid round-item" alt="blog image">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="blog-inner">
                                        <div class="blog-meta d-flex align-items-center">
                                            <i class="fa fa-calendar-alt"></i>
                                            <span>{{ Carbon\Carbon::parse($blog->created_at)->isoFormat('DD') }} {{ Carbon\Carbon::parse($blog->created_at)->isoFormat('MMMM') }} {{ Carbon\Carbon::parse($blog->created_at)->isoFormat('GGGG') }}</span>
                                        </div>
                                        <h5 class="blog-title">
                                            <a href="{{ url('blog/'.$blog->slug) }}">{{ $blog->title }}</a>
                                        </h5>
                                        @if (!empty($blog->short_desc)) <p class="blog-desc"> {{ $blog->short_desc }}</p> @endif
                                        <div class="blog-item-footer d-flex align-items-center justify-content-between">
                                            <div class="blog-small-img">
                                                <span><i class="far fa-user mr-2"></i>@if (!empty($blog->author)) {{ $blog->author }} @else {{ __('frontend.admin') }} @endif</span>
                                            </div>
                                            <a href="{{ url('blog/'.$blog->slug) }}" class="blog-more-link">{{ __('frontend.read_more') }} <i class="fa fa-angle-right ml-2"></i></a>
                                        </div>
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
        <!-- Blog Single Section Start -->
            <section class="blog-single-section section" data-scroll-index="1">

                <div class="container">

                    <div class="blog-single-inner">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="blog-sidebar">
                                    <div class="blog-widgets">
                                        <h5 class="inner-header-title">{{ __('frontend.search') }}</h5>
                                        <form action="{{ route('blog-page.search') }}" method="POST">
                                            @csrf
                                            <div class="blog-search-bar position-relative">
                                                <input type="text" name="search" placeholder="{{ __('frontend.search_here') }}" class="search-form-control" required>
                                                <button type="submit" class="blog-search-btn"><span class="fa fa-search"></span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- .row -->
                    </div>
                </div>
                <!-- .container -->
            </section>
            <!-- Blog Single Section End -->
    @endif
        <!-- Blog Single Section End -->

    </main>
    <!-- Main End -->

@endsection
