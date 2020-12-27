
@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex justify-content-between align-items-center mb-20">
                        <h6 class="card-title mb-0">{{ __('content.services') }}</h6>
                        <div>
                            <button type="button" class="btn btn-primary  mb-3 mr-2" data-toggle="modal" data-target="#serviceSectionModal">{{ __('content.section_title') }}</button>
                            <a href="{{ url('admin/service/create') }}" class="btn btn-primary mb-3">+ {{ __('content.add_service') }}</a>
                        </div>
                    </div>

                    @if (count($services) > 0)
                        <table id="basic-datatable" class="table table-striped dt-responsive w-100">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{ __('content.image') }}</th>
                                <th>{{ __('content.item') }}</th>
                                <th>{{ __('content.icon') }}</th>
                                <th>{{ __('content.title') }}</th>
                                <th>{{ __('content.short_desc') }}</th>
                                <th>{{ __('content.status') }}</th>
                                <th>{{ __('content.order') }}</th>
                                <th class="custom-width-action">{{ __('content.action') }}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $i = 1; @endphp
                            @foreach ($services as $service)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>
                                        @if (!empty($service->service_image))
                                            <img class="image-size img-fluid" src="{{ asset('uploads/creative/img/services/'.$service->service_image) }}" alt="service image">
                                        @else
                                            <img class="image-size img-fluid" src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/service-detail/create',$service->id) }}" class="btn btn-primary">+ {{ __('content.add_service_item') }}</a>
                                    </td>
                                    <td><i class="{{ $service->icon }}"></i> {{ $service->icon }}</td>
                                    <td>{{ $service->title }}</td>
                                    <td>{{ $service->short_desc }}</td>
                                    <td>
                                        @if ($service->status == 0)
                                            <span class="badge badge-pill badge-danger">{{ __('content.disable') }}</span>
                                        @else
                                            <span class="badge badge-pill badge-success">{{ __('content.enable') }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $service->order }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('service.edit', $service->id) }}" class="mr-2">
                                                <i class="fa fa-edit text-info font-18"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#deleteModal{{ $service->id }}">
                                                <i class="fa fa-trash text-danger font-18"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="serviceModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="serviceModalCenterTitle">{{ __('content.delete') }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                {{ __('content.you_wont_be_able_to_revert_this') }}
                                            </div>
                                            <div class="modal-footer">
                                                <form class="d-inline-block" action="{{ route('service.destroy', $service->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                                    <button type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <span>{{ __('content.not_yet_created') }}</span>
                    @endif

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div><!-- end row-->
    <div class="modal fade" id="serviceSectionModal" tabindex="-1" role="dialog" aria-labelledby="serviceSectionModalLabel" aria-modal="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 font-16" id="serviceSectionModalLabel">{{ __('content.section_title') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    @if (isset($service_section))
                        <form action="{{ route('service-section.update', $service_section->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">{{ __('content.title') }}</label>
                                        <input type="text" name="title" class="form-control" id="title" value="{{ $service_section->title }}">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">{{ __('content.submit') }}</button>
                        </form>
                    @else
                        <form action="{{ route('service-section.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">{{ __('content.title') }}</label>
                                        <input type="text" name="title" class="form-control" id="title">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">{{ __('content.submit') }}</button>
                        </form>
                    @endif
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection