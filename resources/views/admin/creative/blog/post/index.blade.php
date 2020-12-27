@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-20">
                        <h6 class="card-title mb-0">{{ __('content.blogs') }}</h6>
                        <div>
                            <button type="button" class="btn btn-primary  mb-3 mr-2" data-toggle="modal" data-target="#blogSectionModal">{{ __('content.section_title') }}</button>
                            <a href="{{ url('admin/blog/create') }}" class="btn btn-primary float-right mb-3">+ {{ __('content.add_blog') }}</a>
                        </div>
                    </div>

                    @if (count($blogs) > 0)
                        <table id="basic-datatable" class="table table-striped dt-responsive w-100">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{ __('content.image') }}</th>
                                <th>{{ __('content.title') }}</th>
                                <th>{{ __('content.category') }}</th>
                                <th>{{ __('content.post_date') }}</th>
                                <th>{{ __('content.view') }}</th>
                                <th>{{ __('content.status') }}</th>
                                <th class="custom-width-action">{{ __('content.action') }}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $i = 1; @endphp
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>
                                        @if (!empty($blog->blog_image))
                                            <img class="image-size img-fluid" src="{{ asset('uploads/creative/img/blogs/'.$blog->blog_image) }}" alt="blog image">
                                        @else
                                            <img class="image-size img-fluid" src="{{ asset('uploads/creative/img/dummy/no-image.jpg') }}" alt="no image">
                                        @endif
                                    </td>
                                    <td>{{ $blog->title }}</td>
                                    <td><span class="badge badge-pill badge-dark">@if (isset($blog->category->category_name)) {{ $blog->category->category_name }} @else {{ $blog->category_name }} @endif</span></td>
                                    <td>{{ Carbon\Carbon::parse($blog->created_at)->format('d.m.Y') }}</td>
                                    <td>{{ $blog->view }}</td>
                                    <td>
                                        @if ($blog->status == 0)
                                            <span class="badge badge-pill badge-danger">{{ __('content.disable') }}</span>
                                        @else
                                            <span class="badge badge-pill badge-success">{{ __('content.enable') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div>
                                            <a href="{{ route('blog.edit', $blog->id) }}" class="mr-2">
                                                <i class="fa fa-edit text-info font-18"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#deleteModal{{ $blog->id }}">
                                                <i class="fa fa-trash text-danger font-18"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{ $blog->id }}" tabindex="-1" role="dialog" aria-labelledby="blogModalCenterTitle" aria-hidden="true">
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
                                                <form class="d-inline-block" action="{{ route('blog.destroy', $blog->id) }}" method="POST">
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
    <div class="modal fade" id="blogSectionModal" tabindex="-1" role="dialog" aria-labelledby="blogSectionModalLabel" aria-modal="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 font-16" id="blogSectionModalLabel">{{ __('content.section_title') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    @if (isset($blog_section))
                        <form action="{{ route('blog-section.update', $blog_section->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">{{ __('content.title') }}</label>
                                        <input type="text" name="title" class="form-control" id="title" value="{{ $blog_section->title }}">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">{{ __('content.submit') }}</button>
                        </form>
                    @else
                        <form action="{{ route('blog-section.store') }}" method="POST">
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