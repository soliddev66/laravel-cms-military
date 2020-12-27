@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <div class="row">
        @if ($theme->choose_theme == 0)

            <div class="col-12 col-sm-6 col-xl">
                <!-- Card -->
                <div class="card box-margin">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <!-- Title -->
                                <h6 class="text-uppercase font-14">{{ __('content.blogs') }}</h6>

                                <!-- Heading -->
                                <span class="font-24 text-dark mb-0">
                                 @if ($blogs_count == 0) 0 @else {{ $blogs_count }} @endif
                                </span>
                            </div>

                            <div class="col-auto">
                                <!-- Icon -->
                                <div class="icon">
                                    <i class="fab fa-blogger-b font-46 text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl">
                <!-- Card -->
                <div class="card box-margin">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <!-- Title -->
                                <h6 class="font-14 text-uppercase">
                                    {{ __('content.sections') }}
                                </h6>
                                <!-- Heading -->
                                <a href="{{ url('admin/section/create') }}">
                                <span class="font-24 text-dark mb-0">
                                    {{ __('content.show') }} / {{ __('content.hide') }}
                                </span>
                                </a>
                            </div>
                            <div class="col-auto">
                                <!-- Icon -->
                                <div class="icon">
                                    <i class="fas fa-puzzle-piece font-46 text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl">
                <!-- Card -->
                <div class="card box-margin">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <!-- Title -->
                                <h6 class="font-14 text-uppercase">
                                    {{ __('content.homepage_versions') }}
                                </h6>
                                <div class="row align-items-center no-gutters">
                                    <div class="col-auto">
                                        <!-- Heading -->
                                        <a href="{{ url('admin/homepage-version/create') }}">
                                        <span class="font-24 text-dark mr-2">
                                            {{ __('content.show') }}
                                        </span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-auto">
                                <!-- Icon -->
                                <div class="icon">
                                    <i class="fas fa-home font-46 text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl">
                <!-- Card -->
                <div class="card box-margin">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <!-- Title -->
                                <h6 class="font-14 text-uppercase">
                                    {{ __('content.themes') }}
                                </h6>
                                <!-- Heading -->
                                <a href="{{ url('admin/theme/create') }}">
                                <span class="font-24 text-dark">
                                    {{ __('content.choose_theme') }}
                                 </span>
                                </a>
                            </div>
                            <div class="col-auto">
                                <!-- Icon -->
                                <div class="icon">
                                    <i class="fas fa-palette font-46 text-red"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @else

            <div class="col-md-4">
                <!-- Card -->
                <div class="card box-margin">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <!-- Title -->
                                <h6 class="text-uppercase font-14">{{ __('content.blogs') }}</h6>

                                <!-- Heading -->
                                <span class="font-24 text-dark mb-0">
                                 @if ($creative_blogs_count == 0) 0 @else {{ $creative_blogs_count }} @endif
                                </span>
                            </div>

                            <div class="col-auto">
                                <!-- Icon -->
                                <div class="icon">
                                    <i class="fab fa-blogger-b font-46 text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <!-- Card -->
                <div class="card box-margin">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <!-- Title -->
                                <h6 class="text-uppercase font-14">{{ __('content.services') }}</h6>

                                <!-- Heading -->
                                <span class="font-24 text-dark mb-0">
                                 @if ($creative_services_count == 0) 0 @else {{ $creative_services_count }} @endif
                                </span>
                            </div>

                            <div class="col-auto">
                                <!-- Icon -->
                                <div class="icon">
                                    <i class="fas fa-people-carry font-46 text-secondary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <!-- Card -->
                <div class="card box-margin">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <!-- Title -->
                                <h6 class="text-uppercase font-14">{{ __('content.works') }}</h6>

                                <!-- Heading -->
                                <span class="font-24 text-dark mb-0">
                                 @if ($creative_works_count == 0) 0 @else {{ $creative_works_count }} @endif
                                </span>
                            </div>

                            <div class="col-auto">
                                <!-- Icon -->
                                <div class="icon">
                                    <i class="fas fa-briefcase font-46 text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <!-- Card -->
                <div class="card box-margin">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <!-- Title -->
                                <h6 class="font-14 text-uppercase">
                                    {{ __('content.sections') }}
                                </h6>
                                <!-- Heading -->
                                <a href="{{ url('admin/section/create') }}">
                                <span class="font-24 text-dark mb-0">
                                    {{ __('content.show') }} / {{ __('content.hide') }}
                                </span>
                                </a>
                            </div>
                            <div class="col-auto">
                                <!-- Icon -->
                                <div class="icon">
                                    <i class="fas fa-puzzle-piece font-46 text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <!-- Card -->
                <div class="card box-margin">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <!-- Title -->
                                <h6 class="font-14 text-uppercase">
                                    {{ __('content.homepage_versions') }}
                                </h6>
                                <div class="row align-items-center no-gutters">
                                    <div class="col-auto">
                                        <!-- Heading -->
                                        <a href="{{ url('admin/homepage-version/create') }}">
                                        <span class="font-24 text-dark mr-2">
                                            {{ __('content.show') }}
                                        </span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-auto">
                                <!-- Icon -->
                                <div class="icon">
                                    <i class="fas fa-home font-46 text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <!-- Card -->
                <div class="card box-margin">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <!-- Title -->
                                <h6 class="font-14 text-uppercase">
                                    {{ __('content.themes') }}
                                </h6>
                                <!-- Heading -->
                                <a href="{{ url('admin/theme/create') }}">
                                <span class="font-24 text-dark">
                                    {{ __('content.choose_theme') }}
                                 </span>
                                </a>
                            </div>
                            <div class="col-auto">
                                <!-- Icon -->
                                <div class="icon">
                                    <i class="fas fa-palette font-46 text-red"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endif

    </div>
    <!-- / .row -->

@endsection