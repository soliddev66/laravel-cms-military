@extends('layouts.frontend.master')

@section('content')
    <!-- Blog Single Start -->
    <section class="blog-single-section section" data-scroll-index="1">
        <div class="container">
            <span>
                <div class="col-md-12 col-lg-4 mb-2" style="float: left;">
                    <div class="blog-single-inner">
                        @if (!empty($category->category_image))
                            <img class="img-fluid" src="{{ asset('uploads/img/category/'.$category->category_image) }}" alt="blog image">
                        @else
                            <div class="blog-single-img">
                                <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" class="img-fluid" style="border-radius: 0px;" alt="blog image">
                            </div>
                        @endif
                    </div>
                </div>
                <h2 class="blog-single-title">{{ $category->category_name }}</h2>
                <p>@php echo html_entity_decode($category->desc); @endphp</p>     
            </span>
        </div>
    </section>
    <!-- Blog Single End -->
@endsection
