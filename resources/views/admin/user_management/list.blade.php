@extends('layouts.admin.master')

@section('content')


    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-20">
                        <h6 class="card-title mb-0">{{ __('User Management') }}</h6>
                    </div>

                    @if (count($users) > 0)
                        <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{ __('User') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Permission Type') }}</th>
                                <th class="custom-width-action">{{ __('content.action') }}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $i = 1; @endphp
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>
                                    @if($user->profile_photo_path != null)
                                        <img src="{{ asset('uploads/img/profile/'.$user->profile_photo_path) }}" class="img-profile rounded-circle" style="width: 15%;" alt="profile image">
                                    @else
                                        <img src="{{ asset('uploads/img/dummy/128x128.png') }}" class="img-profile rounded-circle" style="width: 15%;" alt="profile image">
                                    @endif
                                        {{ $user->name }}
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->type == 3)
                                            <span class="badge badge-danger">{{ __('Super Admin') }}</span>
                                        @elseif($user->type == 2)
                                            <span class="badge badge-success">{{ __('Admin') }}</span>
                                        @else
                                            <span class="badge badge-success">{{ __('User') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div>
                                            <a href="{{ route('user.management.edit', $user->id) }}" class="mr-2">
                                                <i class="fa fa-edit text-info font-18"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#deleteModel{{ $user->id }}">
                                                <i class="fa fa-trash text-danger font-18"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade" id="deleteModel{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                <form class="d-inline-block" action="{{ route('user.management.destroy', $user->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                                <button type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal -->
                                
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
    <!-- /.modal -->
    <script>
        $(document).ready(function() {
            $('#users_table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "user/management",
                    "type": "POST",
                    "data":{ _token: token},
                    success: function (data) {
                        console.log(data);
                    },
                    error: function(error) {
                        console.log('Error: ' + error);
                    }
                },
            });

        });
    </script>

@endsection
