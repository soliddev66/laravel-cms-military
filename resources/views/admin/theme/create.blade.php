@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.themes') }}</h4>
                    <form action="{{ route('theme.update', $theme->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="hiddenradio">
                                    <label>
                                        <input type="radio" name="choose_theme" value="0" {{ ($theme->choose_theme == 0)? "checked" : "" }}>
                                        <img class="img-fluid shadow" src="{{ asset('uploads/img/dummy/theme1.jpg') }}" alt="theme image">
                                    </label>
                                    <span>{{ __('Landing') }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="hiddenradio">
                                    <label>
                                        <input type="radio" name="choose_theme" value="1" {{ ($theme->choose_theme == 1)? "checked" : "" }}>
                                        <img class="img-fluid shadow" src="{{ asset('uploads/img/dummy/theme2.jpg') }}" alt="theme image">
                                    </label>
                                    <span>{{ __('Creative') }}</span>
                                </div>
                            </div>
                            <div class="col-md-12 mt-20">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.choose_theme') }}</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection