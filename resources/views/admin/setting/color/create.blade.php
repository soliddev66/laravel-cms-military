@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.color') }}</h4>

                    @if (isset($color))
                        <form action="{{ route('color.update', $color->id) }}" method="POST">
                            @method('PUT')
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="color">{{ __('content.color_code') }}</label>
                                        <input id="color" type="color"  name="color_code" value="{{ $color->color_code }}" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('content.submit') }}
                                    </button>

                                    <a href="#" data-toggle="modal" data-target="#deleteModel{{ $color->id }}">
                                        <button type="button" class="btn btn-danger margin-left-10">
                                            {{ __('content.ready_color_option') }}
                                        </button>
                                    </a>

                                </div>
                            </div>
                        </form>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModel{{ $color->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('content.delete') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        {{ __('content.this_color_option_will_be_deleted') }}
                                    </div>
                                    <div class="modal-footer">
                                        <form class="d-inline-block" action="{{ route('color.destroy', $color->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                            <button type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <form  action="{{ route('color.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="color">{{ __('content.color_code') }}</label>
                                        <input id="color" type="color"  name="color_code" value="#265bfb" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success">
                                         {{ __('content.submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif

            </div>
        </div>
    </div>
    <!-- end row -->

@endsection