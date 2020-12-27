@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.edit_team') }}</h4>
                    <form action="{{ route('team.update', $team->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">{{ __('content.name') }}</label>
                                    <input type="text" name="name" class="form-control" value="{{ $team->name }}" id="name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="job">{{ __('content.job') }}</label>
                                    <input type="text" name="job" class="form-control" value="{{ $team->job }}" id="job">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="link_1">Facebook</label>
                                    <input type="text" name="link_1" class="form-control" value="{{ $team->link_1 }}" id="link_1">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="link_2">Twitter</label>
                                    <input type="text" name="link_2" class="form-control" value="{{ $team->link_2 }}" id="link_2">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="link_3">Instagram</label>
                                    <input type="text" name="link_3" class="form-control" value="{{ $team->link_3 }}" id="link_3">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="link_4">Linkedin</label>
                                    <input type="text" name="link_4" class="form-control" value="{{ $team->link_4 }}" id="link_4">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="order">{{ __('content.order') }}</label>
                                    <input type="number" name="order" class="form-control" id="order" value="{{ $team->order }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="team_image">{{ __('content.image') }} ({{ __('content.size') }} 600 x 600) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="team_image" class="form-control-file" id="team_image">
                                    <small id="team_image" class="form-text text-muted">{{ __('content.recommended_size') }}</small>
                                </div>
                                <div class="height-card box-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-area text-center">
                                                <div class="media">
                                                       @if (!empty($team->team_image))
                                                        <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                            <img src="{{ asset('uploads/creative/img/teams/'.$team->team_image) }}" alt="team image" class="rounded w-25">
                                                        </a>
                                                           @else
                                                        <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                            <img src="{{ asset('uploads/creative/img/dummy/no-image.jpg') }}" alt="no image" class="rounded w-25">
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