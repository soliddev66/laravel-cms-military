@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.site_images') }}</h4>
                @if (isset($site_image))
                    <form action="{{ route('site-image.update', $site_image->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="favicon_image">{{ __('content.favicon_image') }} ({{ __('content.size') }} 128 x 128) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="favicon_image" class="form-control-file" id="favicon_image">
                                    <small id="favicon_image" class="form-text text-muted">{{ __('content.recommended_size') }}</small>
                                </div>
                                <div class="height-card box-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-area text-center">
                                                <div class="media">
                                                    @if (!empty($site_image->favicon_image))
                                                        <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                            <img src="{{ asset('uploads/img/general/'.$site_image->favicon_image) }}" alt="favicon image" class="rounded w-50">
                                                        </a>
                                                    @else
                                                        <a class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.not_yet_created') }}">
                                                            <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image" class="rounded w-25">
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                            <!--end card-body-->
                                        </div>
                                    </div>
                                    <!--end card-->
                                </div>
                                <!--end col-->
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="admin_logo_image">{{ __('content.admin_logo_image') }} ({{ __('content.size') }} 328 x 96) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="admin_logo_image" class="form-control-file" id="admin_logo_image">
                                    <small id="admin_logo_image" class="form-text text-muted">{{ __('content.recommended_size') }}</small>
                                </div>
                                <div class="height-card box-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-area text-center">
                                                <div class="media">
                                                    @if (!empty($site_image->admin_logo_image))
                                                        <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                            <img src="{{ asset('uploads/img/general/'.$site_image->admin_logo_image) }}" alt="logo image" class="rounded w-50">
                                                        </a>
                                                    @else
                                                        <a class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.not_yet_created') }}">
                                                                <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image" class="rounded w-25">
                                                            </a>
                                                    @endif
                                                </div>
                                            </div>
                                            <!--end card-body-->
                                        </div>
                                    </div>
                                    <!--end card-->
                                </div>
                                <!--end col-->
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="admin_small_logo_image">{{ __('content.admin_small_logo_image') }} ({{ __('content.size') }} 112 x 96) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="admin_small_logo_image" class="form-control-file" id="admin_small_logo_image">
                                    <small id="admin_small_logo_image" class="form-text text-muted">{{ __('content.recommended_size') }}</small>
                                </div>
                                <div class="height-card box-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-area text-center">
                                                <div class="media">
                                                    @if (!empty($site_image->admin_small_logo_image))
                                                        <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                            <img src="{{ asset('uploads/img/general/'.$site_image->admin_small_logo_image) }}" alt="logo image" class="rounded w-50">
                                                        </a>
                                                    @else
                                                       <a class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.not_yet_created') }}">
                                                                <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image" class="rounded w-25">
                                                            </a>
                                                    @endif
                                                </div>
                                            </div>
                                            <!--end card-body-->
                                        </div>
                                    </div>
                                    <!--end card-->
                                </div>
                                <!--end col-->
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="site_white_logo_image">{{ __('content.site_white_logo_image') }} ({{ __('content.size') }} 120 x 60) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="site_white_logo_image" class="form-control-file" id="site_white_logo_image">
                                    <small id="site_white_logo_image" class="form-text text-muted">{{ __('content.recommended_size') }}</small>
                                </div>
                                <div class="height-card box-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-area text-center">
                                                <div class="media">
                                                    @if (!empty($site_image->site_white_logo_image))
                                                        <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                            <img src="{{ asset('uploads/img/general/'.$site_image->site_white_logo_image) }}" alt="logo image" class="rounded w-50">
                                                        </a>
                                                    @else
                                                       <a class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.not_yet_created') }}">
                                                                <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image" class="rounded w-25">
                                                            </a>
                                                    @endif
                                                </div>
                                            </div>
                                            <!--end card-body-->
                                        </div>
                                    </div>
                                    <!--end card-->
                                </div>
                                <!--end col-->
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="site_colored_logo_image">{{ __('content.site_colored_logo_image') }} ({{ __('content.size') }} 120 x 60) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="site_colored_logo_image" class="form-control-file" id="site_colored_logo_image">
                                    <small id="site_colored_logo_image" class="form-text text-muted">{{ __('content.recommended_size') }}</small>
                                </div>
                                <div class="height-card box-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-area text-center">
                                                <div class="media">
                                                    @if (!empty($site_image->site_colored_logo_image))
                                                        <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                            <img src="{{ asset('uploads/img/general/'.$site_image->site_colored_logo_image) }}" alt="logo image" class="rounded w-50">
                                                        </a>
                                                    @else
                                                       <a class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.not_yet_created') }}">
                                                                <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image" class="rounded w-25">
                                                            </a>
                                                    @endif
                                                </div>
                                            </div>
                                            <!--end card-body-->
                                        </div>
                                    </div>
                                    <!--end card-->
                                </div>
                                <!--end col-->
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
                    @else
                    <form action="{{ route('site-image.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="favicon_image">{{ __('content.favicon_image') }} ({{ __('content.size') }} 128 x 128) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="favicon_image" class="form-control-file" id="favicon_image">
                                    <small id="favicon_image" class="form-text text-muted">{{ __('content.recommended_size') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="admin_logo_image">{{ __('content.admin_logo_image') }} ({{ __('content.size') }} 328 x 96) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="admin_logo_image" class="form-control-file" id="admin_logo_image">
                                    <small id="admin_logo_image" class="form-text text-muted">{{ __('content.recommended_size') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="admin_small_logo_image">{{ __('content.admin_small_logo_image') }} ({{ __('content.size') }} 112 x 96) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="admin_small_logo_image" class="form-control-file" id="admin_small_logo_image">
                                    <small id="admin_small_logo_image" class="form-text text-muted">{{ __('content.recommended_size') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="site_white_logo_image">{{ __('content.site_white_logo_image') }} ({{ __('content.size') }} 120 x 60) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="site_white_logo_image" class="form-control-file" id="site_white_logo_image">
                                    <small id="site_white_logo_image" class="form-text text-muted">{{ __('content.recommended_size') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="site_colored_logo_image">{{ __('content.site_colored_logo_image') }} ({{ __('content.size') }} 120 x 60) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="site_colored_logo_image" class="form-control-file" id="site_colored_logo_image">
                                    <small id="site_colored_logo_image" class="form-text text-muted">{{ __('content.recommended_size') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection