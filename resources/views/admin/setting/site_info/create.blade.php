@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.site_info') }}</h4>
                @if (isset($site_info))
                    <form action="{{ route('site-info.update', $site_info->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="short_desc">{{ __('content.short_desc') }}</label>
                                    <input type="text" name="short_desc" class="form-control" id="short_desc" value="{{ $site_info->short_desc }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="copyright">{{ __('content.copyright') }}</label>
                                    <input type="text" name="copyright" class="form-control" id="copyright" value="{{ $site_info->copyright }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
                    @else
                    <form action="{{ route('site-info.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="short_desc">{{ __('content.short_desc') }}</label>
                                    <input type="text" name="short_desc" class="form-control" id="short_desc">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="copyright">{{ __('content.copyright') }}</label>
                                    <input type="text" name="copyright" class="form-control" id="copyright">
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