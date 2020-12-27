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
                            <h1>{{ $service->title }}</h1>
                            <ul class="breadcrumb-links">
                                <li>
                                    <a  href="{{ url('/') }}">{{ __('frontend.home') }}</a>
                                </li>
                                <li class="active">
                                    {{ $service->title }}
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
                        @if (!empty($service->service_image)) <img src="{{ asset('uploads/creative/img/services/'.$service->service_image) }}" alt="Services detail image" class="service-thumb-img img-fluid"> @endif
                        <div class="services-details-text">
                            <h2>{{ $service->title }}</h2>
                            <p>@php echo html_entity_decode($service->desc); @endphp</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="project-details">
                            <h5 class="inner-header-title">{{ __('frontend.service_details') }}</h5>
                            <ul class="project-info">
                              @foreach ($service_details as $service_detail)
                                    <li class="d-flex justify-content-between">
                                        <b>{{ $service_detail->title }}</b>
                                        <span>{{ $service_detail->desc }}</span>
                                    </li>
                                  @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <!-- Main End -->


@endsection
