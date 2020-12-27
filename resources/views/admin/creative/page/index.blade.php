@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-20">
                        <h6 class="card-title mb-0">{{ __('content.pages') }}</h6>
                        <div>
                            <a href="{{ url('admin/page/create') }}" class="btn btn-primary float-right mb-3">+ {{ __('content.add_page') }}</a>
                        </div>
                    </div>

                    @if (count($pages) > 0)
                        <table id="basic-datatable" class="table table-striped dt-responsive w-100">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{ __('content.title') }}</th>
                                <th>{{ __('content.order') }}</th>
                                <th>{{ __('content.status') }}</th>
                                <th>{{ __('content.display_footer_menu') }}</th>
                                <th class="custom-width-action">{{ __('content.action') }}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $i = 1; @endphp
                            @foreach ($pages as $page)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $page->page_title }}</td>
                                    <td>{{ $page->order }}</td>
                                    <td>
                                        @if ($page->status == 0)
                                            <span class="badge badge-pill badge-danger">{{ __('content.disable') }}</span>
                                        @else
                                            <span class="badge badge-pill badge-success">{{ __('content.enable') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($page->display_footer_menu == 0)
                                            <span class="badge badge-pill badge-danger">{{ __('content.no') }}</span>
                                        @else
                                            <span class="badge badge-pill badge-success">{{ __('content.yes') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div>
                                            <a href="{{ route('page.edit', $page->id) }}" class="mr-2">
                                                <i class="fa fa-edit text-info font-18"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#deleteModal{{ $page->id }}">
                                                <i class="fa fa-trash text-danger font-18"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{ $page->id }}" tabindex="-1" role="dialog" aria-labelledby="blogModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="blogModalCenterTitle">{{ __('content.delete') }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                {{ __('content.you_wont_be_able_to_revert_this') }}
                                            </div>
                                            <div class="modal-footer">
                                                <form class="d-inline-block" action="{{ route('page.destroy', $page->id) }}" method="POST">
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
@endsection