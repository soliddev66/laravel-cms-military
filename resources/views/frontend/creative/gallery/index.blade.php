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
                            <h1>{{ __('frontend.galleries') }}</h1>
                            <ul class="breadcrumb-links">
                                <li>
                                    <a  href="{{ url('/') }}">{{ __('frontend.home') }}</a>
                                </li>
                                <li class="active">
                                    {{ __('frontend.galleries') }}
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

        <!-- Portfolio Start -->
       @if (count($galleries) > 0)
               <section class="section portfolio-section pb-minus-70" data-scroll-index="1">
                   <div class="container">
                       <div class="row" id="galleryGrid">
                           @foreach ($galleries as $gallery)
                               <div class="col-md-6 col-lg-4">
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
                       <div class="pagination-wrap">
                           {{ $galleries->links() }}
                       </div>
                       <!-- .pagination-wrap -->
                   </div>
               </section>
           @else
            <section class="section blog" id="blog-grid">
                <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-4 text-center mx-auto">
                                {{ __('frontend.updating') }}
                            </div>
                        </div>
                </div>
            </section>
           @endif
    <!-- Portfolio End -->


    </main>
    <!-- Main End -->

@endsection
