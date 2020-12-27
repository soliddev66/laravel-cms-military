@extends('layouts.frontend.master')

@section('content')

    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section jarallax" data-scroll-index="1" data-speed="0.5s" data-jarallax style="
    @if($page->breadcrumb_image != '')  background-image: url('{{ asset('uploads/img/general/'.$page->breadcrumb_image) }}');
    @elseif (isset($breadcrumb)) background-image: url('{{ asset('uploads/img/general/'.$breadcrumb->breadcrumb_image) }}');
    @else background-image: url('{{ asset('uploads/common_dummy/1920x750.jpg') }}');
    @endif">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h1 class="bread-crumb-title">{{ $page->page_title }}</h1>
                <ul class="breadcrumb-links">
                    <li class="breadcrumb-link"><a  href="{{ url('/') }}">{{ __('frontend.home') }}</a></li>
                    <li class="active">{{ $page->page_title }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Single Start -->
    <section class="blog-single-section section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="blog-single-inner">
                            <p>@php echo html_entity_decode($page->desc); @endphp</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Single End -->

@endsection
