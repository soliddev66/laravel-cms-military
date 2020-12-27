@extends('layouts.frontend.master')

@section('content')
    <!-- Blog Grid Start -->
    @if (count($categories) > 0)
        <section class="section" id="search-form">
            <div class="col-md-12 mt-4">
                <div class="container">
                    <div class="blog-sidebar">
                        <div class="blog-widgets blog-search-widgets">
                            <form action="{{ route('blog-page.search') }}" method="POST">
                                @csrf
                                <div class="blog-search-bar position-relative">
                                    <input type="text" name="search" placeholder="{{ __('frontend.search_here') }}" class="search-form-control" required>
                                    <button type="submit" class="blog-search-btn"><span class="search-text">Search</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section" id="blog-grid">
            <div class="container">
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-md-6 col-lg-4">
                            <div class="blog-item">
                                <div class="blog-top" >
                                    <a href="{{ url('blog/category/'.$category->category_slug) }}" class="blog-img-link">
                                        @if (!empty($category->category_image))
                                            <img src="{{ asset('uploads/img/category/'.$category->category_image) }}" class="img-fluid blog-img" alt="blog image">
                                        @else
                                            <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" class="img-fluid blog-img" style="border-radius: 0px;" alt="blog image">
                                        @endif
                                    </a>
                                </div>
                                <div class="blog-body">
                                    <h5 class="text-center">
                                        <a href="{{ url('blog/category/'.$category->category_slug) }}">{{ $category->category_name }}</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="pagination-wrap">
                    {{ $categories->links() }}
                </div>
            </div>
        </section>
     @else
        <section class="section" id="blog-grid">
            <div class="container">
                <div class="row justify-content-center">
                        <div class="col-xl-4 text-center mx-auto">
                            {{ __('frontend.updating') }}
                        </div>
                </div>
            </div>
        </section>
     @endif
    <!-- Blog Grid End -->

@endsection
