@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.edit_price') }}</h4>
                    <form action="{{ route('price.update', $price->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="icon" class="d-block">{{ __('content.icon') }}</label>
                                    <div class="btn-group">
                                        <input type="hidden" name="icon" class="form-control" id="icon" value="{{ $price->icon }}">
                                        <button type="button" class="btn btn-primary iconpicker-component"><i id="icon-value" class="{{ $price->icon }} iconpicker-component"></i></button>
                                        <button type="button" id="iconPickerBtn" class="icp icp-dd btn btn-primary dropdown-toggle iconpicker-component" data-selected="fa-car" data-toggle="dropdown">
                                            <span class="caret"></span>
                                        </button>
                                        <div class="dropdown-menu"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }}</label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{ $price->title }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="currency">{{ __('content.currency') }}</label>
                                    <input type="text" name="currency" class="form-control" id="currency" value="{{ $price->currency }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="price">{{ __('content.price') }}</label>
                                    <input type="text" name="price" class="form-control" id="price" value="{{ $price->price }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="time">{{ __('content.time') }}</label>
                                    <select name="time" class="form-control" id="time">
                                        <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="1" {{ $price->time === 1 ? 'selected' : '' }}>{{ __('content.monthly') }}</option>
                                        <option value="0" {{ $price->time === 0 ? 'selected' : '' }}>{{ __('content.yearly') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc">{{ __('content.desc') }}</label>
                                    <textarea type="text" name="desc" class="form-control" id="desc">{{ $price->desc }}</textarea>
                                    <small id="desc" class="form-text text-muted">{{ __('content.please_take_with_features_semicolon') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="btn_name">{{ __('content.btn_name') }}</label>
                                    <input type="text" name="btn_name" class="form-control" id="btn_name" value="{{ $price->btn_name }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="btn_link">{{ __('content.btn_link') }}</label>
                                    <input type="text" name="btn_link" class="form-control" id="btn_link" value="{{ $price->btn_link }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="order">{{ __('content.order') }}</label>
                                    <input type="number" name="order" class="form-control" id="order" value="{{ $price->order }}" required>
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