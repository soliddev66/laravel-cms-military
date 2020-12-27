@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.fixed_content') }}</h4>
                @if (isset($fixed_content))
                    <form action="{{ route('fixed-content.update', $fixed_content->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{ $fixed_content->title }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc">{{ __('content.desc') }} <span class="text-red">*</span></label>
                                    <textarea name="desc" class="form-control" id="desc" rows="3" required>{{ $fixed_content->desc }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="btn_name">{{ __('content.btn_name') }}</label>
                                    <input type="text" name="btn_name" class="form-control" id="btn_name" value="{{ $fixed_content->btn_name }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="thumbnail_image">{{ __('content.thumbnail') }} ({{ __('content.size') }} 375 x 670) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="thumbnail_image" class="form-control-file" id="thumbnail_image">
                                    <small id="thumbnail_image" class="form-text text-muted">{{ __('content.recommended_size') }}</small>
                                </div>
                                <div class="height-card box-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-area text-center">
                                                <div class="media">
                                                    @if(!empty($fixed_content->thumbnail_image))
                                                        <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}"><img src="{{ asset('uploads/img/general/'.$fixed_content->thumbnail_image) }}" alt="banner image" class="rounded w-25"> </a>
                                                    @else
                                                        <a class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.not_yet_created') }}"><img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image" class="rounded w-25"> </a>
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
                    <form action="{{ route('fixed-content.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                    <input type="text" name="title" class="form-control" id="title" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc">{{ __('content.desc') }} <span class="text-red">*</span></label>
                                    <textarea name="desc" class="form-control" id="desc" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="btn_name">{{ __('content.btn_name') }}</label>
                                    <input type="text" name="btn_name" class="form-control" id="btn_name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="thumbnail_image">{{ __('content.thumbnail') }} ({{ __('content.size') }} 375 x 670) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="thumbnail_image" class="form-control-file" id="thumbnail_image">
                                    <small id="thumbnail_image" class="form-text text-muted">{{ __('content.recommended_size') }}</small>
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