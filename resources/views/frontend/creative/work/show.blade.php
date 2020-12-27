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
                            <h1>{{ $work->title }}</h1>
                            <ul class="breadcrumb-links">
                                <li>
                                    <a  href="{{ url('/') }}">{{ __('frontend.home') }}</a>
                                </li>
                                <li class="active">
                                    {{ $work->title }}
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

        <!-- Portfolio Single Section Start -->
        <section class="portfolio-single-section section" data-scroll-index="1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        @if (count($work_sliders) > 0)
                            <div class="portfolio-carousel owl-carousel owl-theme">
                               @foreach ($work_sliders as $work_slider)
                                    <div class="item">
                                        <img src="{{ asset('uploads/creative/img/works/sliders/'.$work_slider->slider_image) }}" alt="work image" class="img-fluid">
                                    </div>
                                   @endforeach
                            </div>
                            @endif
                        <div class="portolio-details-text">
                            <h2>{{ $work->title }}</h2>
                            <p>@php echo html_entity_decode($work->desc); @endphp</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="project-details">
                            <h5 class="inner-header-title">{{ __('frontend.work_details') }}</h5>
                            <ul class="project-info">
                                @foreach ($work_details as $work_detail)
                                    <li class="d-flex justify-content-between">
                                        <b>{{ $work_detail->title }}</b>
                                        <span>{{ $work_detail->desc }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio Single Section End -->

    </main>
    <!-- Main End -->


@endsection
