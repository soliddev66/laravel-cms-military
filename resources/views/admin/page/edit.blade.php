@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.edit_page') }}</h4>
                    <form action="{{ route('page.update', $page->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                    <input id="title" name="page_title" type="text" class="form-control" value="{{ $page->page_title }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="summernote">{{ __('content.description') }}<span class="text-red">*</span></label>
                                    <textarea id="summernote" name="desc" class="form-control">@php echo html_entity_decode($page->desc); @endphp</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="display_footer_menu" class="col-form-label">{{ __('content.display_footer_menu') }}</label>
                                    <select class="form-control" name="display_footer_menu" id="status">
                                        <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="1" {{ $page->display_footer_menu === 1 ? 'selected' : '' }}>{{ __('content.yes') }}</option>
                                        <option value="0" {{ $page->display_footer_menu === 0 ? 'selected' : '' }}>{{ __('content.no') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status" class="col-form-label">{{ __('content.status') }}</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="1" {{ $page->status === 1 ? 'selected' : '' }}>{{ __('content.enable') }}</option>
                                        <option value="0" {{ $page->status === 0 ? 'selected' : '' }}>{{ __('content.disable') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="breadcrumb_image">{{ __('content.image') }} ({{ __('content.size') }} 1920 x 750) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="breadcrumb_image" class="form-control-file" id="breadcrumb_image">
                                    <small id="breadcrumb_image" class="form-text text-muted">{{ __('content.recommended_size') }}</small>
                                </div>
                                <div class="height-card box-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-area text-center">
                                                <div class="media">
                                                    @if (!empty($page->breadcrumb_image))
                                                        <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                            <img src="{{ asset('uploads/img/general/'.$page->breadcrumb_image) }}" alt="breadcrumb image" class="rounded w-25">
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
                                    <label for="order">{{ __('content.order') }}</label>
                                    <input type="number" name="order" class="form-control" id="order" value="{{ $page->order }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection