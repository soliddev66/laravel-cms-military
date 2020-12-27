@extends('layouts.admin.master')

@section('content')


    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.profile') }}</h4>
                <form  action="{{ route('user.management.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                @if (!empty($user->profile_photo_path))
                                    <img src="{{ asset('uploads/img/profile/'.$user->profile_photo_path) }}" class="img-fluid image-size rounded-circle mt-3" alt="profile image">
                                @else
                                    <img src="{{ asset('uploads/img/dummy/128x128.png') }}" class="img-fluid image-size rounded-circle mt-3" alt="profile image">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">{{ __('content.name') }} : <span>{{ $user->name }}</span> </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">{{ __('content.email') }} : <span>{{ $user->email }}</span> </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="type" class="col-form-label">{{ __('Permission Type') }}</label>
                                <select class="form-control" name="type" id="permission_type">
                                    <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                    <option value="1" {{ $user->type == 1 ? 'selected' : '' }}>{{ __('User') }}</option>
                                    <option value="2" {{ $user->type == 2 ? 'selected' : '' }}>{{ __('Admin') }}</option>
                                    <option value="3" {{ $user->type == 3 ? 'selected' : '' }}>{{ __('Super Admin') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                {{ __('content.submit') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
