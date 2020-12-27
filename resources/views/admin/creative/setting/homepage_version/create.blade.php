@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.homepage_versions') }}</h4>
                    <form action="{{ route('homepage-version.update', $homepage_version->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <div class="hiddenradio">
                                    <label>
                                        <input type="radio" name="choose_version" value="0" {{ ($homepage_version->choose_version == 0)? "checked" : "" }}>
                                        <img class="img-fluid shadow" src="{{ asset('uploads/creative/img/dummy/demo-1.png') }}" alt="version image">
                                    </label>
                                    <span>{{ __('Static') }}</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="hiddenradio">
                                    <label>
                                        <input type="radio" name="choose_version" value="1" {{ ($homepage_version->choose_version == 1)? "checked" : "" }}>
                                        <img class="img-fluid shadow" src="{{ asset('uploads/creative/img/dummy/demo-2.png') }}" alt="version image">
                                    </label>
                                    <span>{{ __('Slider') }}</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="hiddenradio">
                                    <label>
                                        <input type="radio" name="choose_version" value="2" {{ ($homepage_version->choose_version == 2)? "checked" : "" }}>
                                        <img class="img-fluid shadow" src="{{ asset('uploads/creative/img/dummy/demo-3.png') }}" alt="light image">
                                    </label>
                                    <span>{{ __('Video') }}</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="hiddenradio">
                                    <label>
                                        <input type="radio" name="choose_version" value="3" {{ ($homepage_version->choose_version == 3)? "checked" : "" }}>
                                        <img class="img-fluid shadow" src="{{ asset('uploads/creative/img/dummy/demo-4.png') }}" alt="light image">
                                    </label>
                                    <span>{{ __('Ripples') }}</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="hiddenradio">
                                    <label>
                                        <input type="radio" name="choose_version" value="4" {{ ($homepage_version->choose_version == 4)? "checked" : "" }}>
                                        <img class="img-fluid shadow" src="{{ asset('uploads/creative/img/dummy/demo-5.png') }}" alt="light image">
                                    </label>
                                    <span>{{ __('Particles') }}</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="hiddenradio">
                                    <label>
                                        <input type="radio" name="choose_version" value="5" {{ ($homepage_version->choose_version == 5)? "checked" : "" }}>
                                        <img class="img-fluid shadow" src="{{ asset('uploads/creative/img/dummy/demo-6.png') }}" alt="light image">
                                    </label>
                                    <span>{{ __('Glitch') }}</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="hiddenradio">
                                    <div class="text-center">
                                        <label>
                                            <input type="radio" name="color" value="0" {{ ($homepage_version->color == 0)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-default-2 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color" value="1" {{ ($homepage_version->color == 1)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-1 mr-2 fas fa-tint"></i>                                                </label>
                                        <label>
                                            <input type="radio" name="color" value="2" {{ ($homepage_version->color == 2)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-2 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color" value="3" {{ ($homepage_version->color == 3)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-3 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color" value="4" {{ ($homepage_version->color == 4)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-4 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color" value="5" {{ ($homepage_version->color == 5)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-5 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color" value="6" {{ ($homepage_version->color == 6)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-6 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color" value="7" {{ ($homepage_version->color == 7)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-7 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color" value="8" {{ ($homepage_version->color == 8)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-8 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color" value="9" {{ ($homepage_version->color == 9)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-9 mr-2 fas fa-tint"></i>
                                        </label>
                                        <label>
                                            <input type="radio" name="color" value="10" {{ ($homepage_version->color == 10)? "checked" : "" }}>
                                            <i class="custom-font-size custom-color-10 fas fa-tint"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-20">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.choose_version') }}</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection