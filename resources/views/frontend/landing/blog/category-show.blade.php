@extends('layouts.frontend.master')

@section('content')
    <!-- Sub Category Grid Start -->
    @if (count($childCatergories) > 0)
        <section class="section mt-100" id="blog-grid">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-item" style="border-radius: 15px;">
                            <div class="blog-top" style="border-radius: 15px; border-bottom: 1px solid #d4d4d4;">
                                <a href="{{ url('blog/category/'.$category->category_slug) .'/detail' }}" class="blog-img-link">
                                    @if (!empty($category->category_image))
                                        <img src="{{ asset('uploads/img/category/'.$category->category_image) }}" class="img-fluid" style="border-radius: 0px;" alt="blog image">
                                    @else
                                        <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" class="img-fluid" style="border-radius: 0px;" alt="blog image">
                                    @endif
                                </a>
                            </div>
                            <div class="blog-body-show">
                                <h5>
                                    <a href="{{ url('blog/category/'.$category->category_slug .'/detail') }}">{{ $category->category_name }}</a>
                                </h5>
                                <p>@php echo html_entity_decode($category->short_desc); @endphp</p>
                            </div>
                        </div>
                    </div>
                    @foreach ($childCatergories as $category)
                        <div class="col-md-6 col-lg-4">
                            <div class="blog-item" style="border-radius: 15px;">
                                <div class="blog-top" style="border-radius: 15px; border-bottom: 1px solid #d4d4d4;">
                                    <a href="{{ url('blog/category/'.$category->category_slug) }}" class="blog-img-link">
                                        @if (!empty($category->category_image))
                                            <img src="{{ asset('uploads/img/category/'.$category->category_image) }}" class="img-fluid" style="border-radius: 0px;" alt="blog image">
                                        @else
                                            <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" class="img-fluid" style="border-radius: 0px;" alt="blog image">
                                        @endif
                                    </a>
                                </div>
                                <div class="blog-body-show">
                                    <h5>
                                        <a href="{{ url('blog/category/'.$category->category_slug) }}">{{ $category->category_name }}</a>
                                    </h5>
                                    <p>@php echo html_entity_decode($category->short_desc); @endphp</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="pagination-wrap">
                    {{ $childCatergories->links() }}
                </div>
            </div>
        </section>
    
    @endif
    <!-- Sub Category Grid End -->
    <!-- Blog Grid Start -->
    @if(count($blogs) > 0)
    <section class="space-line">
        <div class="container">
            <hr>
        </div>
    </section>
    <section class="section mt-100" id="blog-grid">
        <div class="container">
            <div class="row">
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
            <div class="pagination-wrap">
                {{ $blogs->links() }}
            </div>
        </div>
    </section>
    @endif
    <!-- Blog Grid End -->

@endsection
