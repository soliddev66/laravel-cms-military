@extends('layouts.frontend.master')

@section('content')

    <!-- Blog Grid Section Start -->
    @if (count($blogs) > 0)
        <section class="section mt-100" id="blog-grid">
            <div class="container">
                <div class="row justify-content-center">
                    @foreach ($blogs as $blog)
                        <div class="col-md-6 col-lg-4">
                            <div class="blog-item">
                                <div class="blog-top">
                                    <a href="{{ url('blog/'.$blog->slug) }}" class="blog-img-link">
                                        @if (!empty($blog->blog_image))
                                            <img src="{{ asset('uploads/img/blogs/'.$blog->blog_image) }}" class="img-fluid" alt="blog image">
                                        @else
                                            <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" class="img-fluid" alt="blog image">
                                        @endif
                                    </a>
                                </div>
                                <div class="blog-body">
                                    <div class="blog-meta">
                                        <a href="{{ url('blog/'.$blog->slug) }}"><i class="far fa-user mr-2"></i>@if (!empty($blog->author)) {{ $blog->author }} @else {{ __('frontend.admin') }} @endif</a>
                                        <a href="{{ url('blog/'.$blog->slug) }}"><i class="far fa-clock mr-2"></i>{{ Carbon\Carbon::parse($blog->created_at)->isoFormat('DD') }} {{ Carbon\Carbon::parse($blog->created_at)->isoFormat('MMMM') }} {{ Carbon\Carbon::parse($blog->created_at)->isoFormat('GGGG') }}</a>
                                    </div>
                                    <h5>
                                        <a href="{{ url('blog/'.$blog->slug) }}">{{ $blog->title }}</a>
                                    </h5>
                                    @if (!empty($blog->short_desc)) <p>{{ $blog->short_desc }}</p> @endif
                                    <a href="{{ url('blog/'.$blog->slug) }}" class="default-link">{{ __('frontend.read_more') }} <i class="ml-2 fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @else
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                       <div class="blog-sidebar">
                           <div class="blog-widgets">
                               <h5 class="inner-header-title">{{ __('frontend.nothing_found') }}</h5>
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
        </section>
        @endif
    <!-- Blog Grid Section End -->

@endsection
