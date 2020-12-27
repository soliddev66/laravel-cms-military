@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.edit_testimonial') }}</h4>
                    <form action="{{ route('testimonial.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">{{ __('content.name') }}</label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{ $testimonial->name }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="job">{{ __('content.job') }}</label>
                                    <input type="text" name="job" class="form-control" id="job" value="{{ $testimonial->job }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc">{{ __('content.desc') }}</label>
                                    <textarea type="text" name="desc" class="form-control" id="desc" required>{{ $testimonial->desc }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="star" class="col-form-label">{{ __('content.star') }}</label>
                                    <select class="form-control" name="star" id="star">
                                        <option value="5" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="1" {{ $testimonial->status === 1 ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ $testimonial->status === 2 ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ $testimonial->status === 3 ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ $testimonial->status === 4 ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ $testimonial->status === 5 ? 'selected' : '' }}>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="order">{{ __('content.order') }}</label>
                                    <input type="number" name="order" class="form-control" id="order" value="{{ $testimonial->order }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="testimonial_image">{{ __('content.image') }} ({{ __('content.size') }} 150 x 150) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="testimonial_image" class="form-control-file" id="testimonial_image">
                                    <small id="testimonial_image" class="form-text text-muted">{{ __('content.recommended_size') }}</small>
                                </div>
                                <div class="height-card box-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-area text-center">
                                                <div class="media">
                                                    @if (!empty($testimonial->testimonial_image))
                                                        <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                            <img src="{{ asset('uploads/creative/img/testimonials/'.$testimonial->testimonial_image) }}" alt="testimonial image" class="rounded w-25">
                                                        </a>
                                                    @else
                                                        <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
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