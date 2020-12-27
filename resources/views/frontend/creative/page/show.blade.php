@extends('layouts.frontend.creative.master')

@section('content')



    <!-- Main Start -->
    <main class="site-main" id="mainWrapper">

        <!-- Breadcrumb Section Start -->
        <section class="breadcrumb-section section" data-bg-image-path=" @if($page->breadcrumb_image != '')  {{ asset('uploads/img/general/'.$page->breadcrumb_image) }}
    @elseif (isset($breadcrumb)) {{ asset('uploads/creative/img/general/'.$breadcrumb->breadcrumb_image) }}
    @else {{ asset('uploads/common_dummy/1920x750.jpg') }}
    @endif">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="breadcrumb-inner text-center">
                            <h1>{{ $page->page_title }}</h1>
                            <ul class="breadcrumb-links">
                                <li>
                                    <a  href="{{ url('/') }}">{{ __('frontend.home') }}</a>
                                </li>
                                <li class="active">
                                    {{ $page->page_title }}
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
                    <div class="col-lg-12">
                        <div class="services-details-text">
                            <h2>{{ $page->page_title }}</h2>
                            <p>@php echo html_entity_decode($page->desc); @endphp</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <!-- Main End -->


@endsection
