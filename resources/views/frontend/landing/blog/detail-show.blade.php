@extends('layouts.frontend.master')

@section('content')

    <!-- Blog Single Start -->
    <section class="blog-single-section section" data-scroll-index="1">
        <div class="container">
            <span>
                <div class="col-md-12 col-lg-4 mb-2" style="float: left;">
                    <div class="blog-single-inner">
                        @if (!empty($blog->blog_image))
                                <img class="img-fluid" style="float: left;" src="{{ asset('uploads/img/blogs/'.$blog->blog_image) }}" alt="blog image">
                        @else
                                <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" class="img-fluid" style="border-radius: 0px;" alt="blog image">
                        @endif
                    </div>
                </div>
                
                <h2 class="blog-single-title">{{ $blog->title }}</h2>
                <div class="blog-meta">
                    <span><i class="far fa-user"></i>{{ __('frontend.by') }} @if (!empty($blog->author)) {{ $blog->author }} @else {{ __('frontend.admin') }} @endif </span>
                    <span><i class="far fa-clock"></i>{{ Carbon\Carbon::parse($blog->created_at)->isoFormat('DD') }} {{ Carbon\Carbon::parse($blog->created_at)->isoFormat('MMMM') }} {{ Carbon\Carbon::parse($blog->created_at)->isoFormat('GGGG') }} </span>
                    <span><i class="far fa-eye"></i>{{ $blog->view }}</span>
                </div>
                <p>@php echo html_entity_decode($blog->desc); @endphp</p>   
            </span>
        </div>
    </section>
    <!-- Blog Single End -->



@endsection
