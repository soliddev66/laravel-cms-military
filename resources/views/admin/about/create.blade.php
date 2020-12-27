@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.about') }}</h4>
                @if (isset($about))
                    <form action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{ $about->title }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc">{{ __('content.desc') }} <span class="text-red">*</span></label>
                                    <textarea name="desc" class="form-control" id="desc" rows="3" required>{{ $about->desc }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="btn_name">{{ __('content.btn_name') }}</label>
                                    <input type="text" name="btn_name" class="form-control" id="btn_name" value="{{ $about->btn_name }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="btn_link">{{ __('content.btn_link') }}</label>
                                    <input type="text" name="btn_link" class="form-control" id="btn_link" value="{{ $about->btn_link }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="about_image">{{ __('content.image') }} ({{ __('content.size') }} 540 x 540) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="about_image" class="form-control-file" id="about_image">
                                    <small id="about_image" class="form-text text-muted">{{ __('content.recommended_size') }}</small>
                                </div>
                                <div class="height-card box-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-area text-center">
                                                <div class="media">
                                                    @if (!empty($about->about_image))
                                                        <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                            <img src="{{ asset('uploads/img/general/'.$about->about_image) }}" alt="about image" class="rounded w-25">
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
                    @else
                    <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                    <input type="text" name="title" class="form-control" id="title" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc">{{ __('content.desc') }} <span class="text-red">*</span></label>
                                    <textarea name="desc" class="form-control" id="desc" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="btn_name">{{ __('content.btn_name') }}</label>
                                    <input type="text" name="btn_name" class="form-control" id="btn_name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="btn_link">{{ __('content.btn_link') }}</label>
                                    <input type="text" name="btn_link" class="form-control" id="btn_link">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="about_image">{{ __('content.image') }} ({{ __('content.size') }} 540 x 540) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="about_image" class="form-control-file" id="about_image">
                                    <small id="about_image" class="form-text text-muted">{{ __('content.recommended_size') }}</small>
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

    <div class="row">
        <div class="col-12">
            <div class="card mb-30">
                <div class="card-body pb-0">
                    <div class="d-flex justify-content-between align-items-center mb-20">
                        <h6 class="card-title mb-0">{{ __('content.information_list') }}</h6>
                        <button type="button" class="btn btn-primary waves-effect waves-light float-right mb-3" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-lg">+ {{ __('content.add_info') }}</button>
                    </div>
                    <div class="table-responsive order-stats">
                        @if (count($info_lists) > 0)
                            <table id="basic-datatable"  class="table dt-responsive w-100">
                                <thead>
                                <tr>
                                    <th>{{ __('content.desc') }}</th>
                                    <th>{{ __('content.order') }}</th>
                                    <th class="custom-width-action">{{ __('content.action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($info_lists as $info_list)
                                    <tr>
                                        <td>{{ $info_list->desc }}</td>
                                        <td>{{ $info_list->order }}</td>
                                        <td>
                                            <div>
                                                <a href="{{ route('about.edit_info_list', $info_list->id) }}" class="mr-2">
                                                    <i class="fa fa-edit text-info font-18"></i>
                                                </a>
                                                <form class="d-inline-block" action="{{ route('about.destroy_info_list', $info_list->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <span data-toggle="modal" data-target="#deleteModel{{ $info_list->id }}">
                                                            <a type="button">
                                                            <i class="fa fa-trash text-danger font-18"></i>
                                                        </a>
                                                       </span>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="deleteModel{{ $info_list->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('content.delete') }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    {{ __('content.you_wont_be_able_to_revert_this') }}
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                                                    <button type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <p>{{ __('content.not_yet_created') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end row -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-modal="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 font-16" id="myLargeModalLabel">{{ __('content.add_new') }}</h5><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('about.store_info_list') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc">{{ __('content.desc') }} <span class="text-red">*</span></label>
                                    <input type="text" name="desc" class="form-control" id="desc" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="order">{{ __('content.order') }}</label>
                                    <input type="number" name="order" class="form-control" id="order" value="0" required>
                                </div>
                            </div>
                        </div>
                      <button type="submit" class="btn btn-sm btn-primary">{{ __('content.submit') }}</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


@endsection