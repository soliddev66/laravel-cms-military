@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.edit_category') }}</h4>
                    <form action="{{ route('blog-category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="category_name">{{ __('content.category_name') }} <span class="text-red">*</span></label>
                                    <input type="text" name="category_name" class="form-control" id="category_name" value="{{ $category->category_name }}">
                                </div>
                            </div>
                            @if( $parentCategories->count() != null )
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="parent_id" class="col-form-label">{{ __('Parent Category') }}</label>
                                        <select name="parent_id" class="form-control" id="parent_id">
                                            <option value="{{$category->parent_id}}" selected>{{ $parentCategoryName }}</option>
                                            {!! generateCategories($parentCategories)!!} 
                                        </select>
                                    </div>
                                </div>
                            @else
                                <input type="text" name="parent_id" class="form-control" value="0" hidden>
                            @endif

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="short_desc">{{ __('content.short_desc') }}</label>
                                    <textarea id="short_desc" name="short_desc" class="form-control">{{ $category->short_desc }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="summernote">{{ __('content.description') }}<span class="text-red">*</span></label>
                                    <textarea id="summernote" name="desc" class="form-control">@php echo html_entity_decode($category->desc); @endphp</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="order">{{ __('content.order') }}</label>
                                    <input type="number" name="order" class="form-control" id="order" value="{{ $category->order }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status" class="col-form-label">{{ __('content.status') }}</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="1" {{ $category->status === 1 ? 'selected' : '' }}>{{ __('content.enable') }}</option>
                                        <option value="0" {{ $category->status === 0 ? 'selected' : '' }}>{{ __('content.disable') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="category_image">{{ __('content.image') }} ({{ __('content.size') }} 775 x 575) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="category_image" class="form-control-file" id="category_image">
                                    <small id="category_image" class="form-text text-muted">{{ __('content.recommended_size') }}</small>
                                </div>
                                <div class="height-card box-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-area text-center">
                                                <div class="media">
                                                    @if (!empty($category->category_image))
                                                        <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                            <img src="{{ asset('uploads/img/category/'.$category->category_image) }}" alt="category image" class="rounded w-25">
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
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection