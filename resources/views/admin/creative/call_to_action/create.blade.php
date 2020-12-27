@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.call_to_action') }}</h4>
                @if (isset($call_to_action))
                    <form action="{{ route('call-to-action.update', $call_to_action->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }}</label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{ $call_to_action->title }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc">{{ __('content.desc') }}</label>
                                    <textarea name="desc" class="form-control" id="desc" rows="3">{{ $call_to_action->desc }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="action_image">{{ __('content.image') }} ({{ __('content.size') }} 1920 x 950) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="action_image" class="form-control-file" id="action_image">
                                    <small id="action_image" class="form-text text-muted">{{ __('content.recommended_size') }}</small>
                                </div>
                                <div class="height-card box-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-area text-center">
                                                <div class="media">
                                                        <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                            <img src="{{ asset('uploads/creative/img/general/'.$call_to_action->action_image) }}" alt="action image" class="rounded w-25">
                                                        </a>
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
                    <form action="{{ route('call-to-action.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }}</label>
                                    <input type="text" name="title" class="form-control" id="title">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc">{{ __('content.desc') }}</label>
                                    <textarea name="desc" class="form-control" id="desc" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="action_image">{{ __('content.image') }} ({{ __('content.size') }} 1920 x 950) (.svg, .jpg, .jpeg, .png) <span class="text-red">*</span></label>
                                    <input type="file" name="action_image" class="form-control-file" id="action_image" required>
                                    <small id="action_image" class="form-text text-muted">{{ __('content.recommended_size') }}</small>
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