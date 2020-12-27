@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.add_page') }}</h4>
                    <form action="{{ route('page.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image">{{ __('content.image') }} ({{ __('content.size') }} 1920 x 750)(.svg, .png, .jpg, .jpeg)</label>
                                    <input id="image" name="breadcrumb_image" type="file" class="form-control-file">
                                    <small id="image" class="form-text text-muted">{{ __('content.recommended_size') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                    <input id="title" name="page_title" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="summernote">{{ __('content.desc') }} <span class="text-red">*</span></label>
                                    <textarea id="summernote" name="desc" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="display_footer_menu">{{ __('content.display_footer_menu') }} </label>
                                    <select class="form-control" name="display_footer_menu" id="display_footer_menu">
                                        <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="1">{{ __('content.yes') }}</option>
                                        <option value="0">{{ __('content.no') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="status">{{ __('content.status') }} </label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="1">{{ __('content.enable') }}</option>
                                        <option value="0">{{ __('content.disable') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="order">{{ __('content.order') }}</label>
                                    <input type="number" name="order" class="form-control" id="order" value="0" required>
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