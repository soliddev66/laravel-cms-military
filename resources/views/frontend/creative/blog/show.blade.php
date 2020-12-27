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
                            <h1>{{ $blog->title }}</h1>
                            <ul class="breadcrumb-links">
                                <li>
                                    <a  href="{{ url('/') }}">{{ __('frontend.home') }}</a>
                                </li>
                                <li class="active">
                                    {{ $blog->title }}
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

        <!-- Blog Single Section Start -->
        <section class="blog-single-section section" data-scroll-index="1">

            <div class="container">
                <!-- Include Alert Blade -->
                @include('admin.alert.alert')

                <div class="blog-single-inner">
                    <div class="row">
                        <div class="col-md-12 col-lg-8">
                            @if (!empty($blog->blog_image))
                                    <img class="img-fluid round-item blog-single-img" src="{{ asset('uploads/creative/img/blogs/'.$blog->blog_image) }}" alt="blog image">
                            @endif
                            <h2 class="blog-single-title">{{ $blog->title }}</h2>
                            <div class="blog-links">
                                <span><i class="far fa-user"></i>{{ __('frontend.by') }} @if (!empty($blog->author)) {{ $blog->author }} @else {{ __('frontend.admin') }} @endif</span>
                                <span><i class="far fa-clock"></i>{{ Carbon\Carbon::parse($blog->created_at)->isoFormat('DD') }} {{ Carbon\Carbon::parse($blog->created_at)->isoFormat('MMMM') }} {{ Carbon\Carbon::parse($blog->created_at)->isoFormat('GGGG') }}</span>
                                <span><i class="far fa-eye"></i>{{ $blog->view }}</span>
                            </div>
                                <p>@php echo html_entity_decode($blog->desc); @endphp</p>
                                <div class="comment-block-mt">
                                    @if (count($comments) > 0)
                                        <h5 class="inner-header-title">{{ __('frontend.comments') }} <span>({{ count($comments) }})</span></h5>
                                    @endif
                                    <div class="comments-wrap">
                                        @foreach ($comments as $comment)
                                            <div class="comments-item-wrap">
                                                <div class="comments-item">
                                                    <i class="fas fa-user font-72 mr-4"></i>
                                                    <div class="media-body">
                                                        <div class="comment-header">
                                                            <h6>{{ $comment->name }}</h6>
                                                            <a href="#" class="comments-reply-btn" data-scroll-nav="2">
                                                                <i class="fa fa-reply"></i>{{ __('frontend.reply') }}
                                                            </a>
                                                        </div>
                                                        <p>{{ $comment->comment }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div  data-scroll-index="2" class="leave-comment-wrapper @if (count($comments) > 0) comment-block-mt @endif">
                                    <h5 class="inner-header-title">{{ __('frontend.leave_a_comment') }}</h5>
                                    <form  action="{{ route('comment.store') }}" method="POST">
                                        @csrf
                                        <input name="creative_blog_id" type="hidden" value="{{ Crypt::encrypt($blog->id) }}">
                                        <input name="page" type="hidden" value="{{ Crypt::encrypt(98) }}">
                                        <div class="row">
                                            <div class="comment-form-group col-md-12">
                                                <input type="text" name="name" class="comment-form-control" placeholder="{{ __('frontend.your_name') }}" required="">
                                            </div>
                                            <div class="comment-form-group col-md-12">
                                                <textarea class="comment-form-control text-area" name="comment" cols="30" rows="5" placeholder="{{ __('frontend.your_comment') }}" required></textarea>
                                            </div>
                                            <div class="comment-form-group mb-0 col-md-12">
                                                <button type="submit" class="default-button">
                                                    {{ __('frontend.send_message') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="blog-sidebar">
                                <div class="blog-widgets">
                                    <h5 class="inner-header-title">{{ __('frontend.search') }}</h5>
                                    <form action="{{ route('blog-page.search') }}" method="POST">
                                        @csrf
                                        <div class="blog-search-bar position-relative">
                                            <input type="text" name="search" placeholder="{{ __('frontend.search_here') }}" class="search-form-control" required>
                                            <button type="submit" class="blog-search-btn"><span class="fa fa-search"></span></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="blog-widgets">
                                    <h5 class="inner-header-title">{{ __('frontend.categories') }}</h5>
                                    <ul class="blog-category-list clearfix">
                                        <li>
                                            <a href="{{ url('blogs') }}">{{ __('frontend.all') }}</a>
                                        </li>
                                        @foreach ($blog_count_categories as $blog_count_category)
                                            <li>
                                                <a href="{{ url('blog/category/'.$blog_count_category->category->category_slug) }}">{{$blog_count_category->category->category_name }}<span class="category-count">({{ $blog_count_category->category_count }})</span></a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="blog-widgets">
                                    <h5 class="inner-header-title">{{ __('frontend.recent_posts') }}</h5>
                                    @foreach ($recent_posts as $recent_post)
                                        <div class="recent-post-item clearfix">
                                            @if (!empty($recent_post->blog_image))
                                                <div class="recent-post-img mr-3">
                                                    <a href="{{ url('blog/'.$recent_post->slug) }}">
                                                        <img src="{{ asset('uploads/creative/img/blogs/'.$recent_post->blog_image) }}" class="img-fluid image-size-70" alt="blog image">
                                                    </a>
                                                </div>
                                            @else
                                                <div class="recent-post-img mr-3">
                                                    <a href="{{ url('blog/'.$recent_post->slug) }}">
                                                        <img src="{{ asset('uploads/creative/img/dummy/no-image.jpg') }}" class="img-fluid image-size-70"  alt="blog image">
                                                    </a>
                                                </div>
                                            @endif

                                            <div class="recent-post-body">
                                                <a href="{{ url('blog/'.$recent_post->slug) }}">
                                                    <h6 class="recent-post-title">{{ $recent_post->title }}</h6>
                                                </a>
                                                <p class="recent-post-date"><i class="far fa-clock"></i>{{ Carbon\Carbon::parse($recent_post->created_at)->isoFormat('DD') }} {{ Carbon\Carbon::parse($recent_post->created_at)->isoFormat('MMMM') }} {{ Carbon\Carbon::parse($recent_post->created_at)->isoFormat('GGGG') }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @if (!empty($blog->tag))
                                    <div class="blog-widgets tag-widgets">
                                        <h5 class="inner-header-title">{{ __('frontend.tags') }}</h5>
                                        @php
                                            $str = $blog->tag;
                                            $array_tags = explode(",",$str);
                                        @endphp
                                        <ul class="blog-tags clearfix">
                                            @foreach ($array_tags as $tag)
                                                <li>
                                                    <a href="#">{{ $tag }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                    <!-- .row -->
                </div>
            </div>
            <!-- .container -->
        </section>
        <!-- Blog Single Section End -->

    </main>
    <!-- Main End -->




@endsection
