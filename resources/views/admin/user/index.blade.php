@extends('admin.layouts')

@section('title', 'Users')

@push('css')
    <style>

    </style>
@endpush

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Users</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Users</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @include('admin.partial.message')
                <div class="buttons mb-3">
                    @can('user-create')
                        <a href="{{ route('admin.admin_users.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i>
                            Add Admin Users
                        </a>
                    @endcan
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="float-left">Users</h5>
                        @can('user-delete')
                            <button class="btn btn-danger btn-sm float-right" id="massDelete">Delete Selected</button>
                        @endcan
                    </div>
                    <div class="card-body custom_datatable">
                        <table class="table table-bordered table-responsive-md" id="data_table">
                            <thead>
                            <tr>
                            @can('user-delete')
                                <th>
                                    <input type="checkbox" id="select_all" >
                                </th>
                            @endcan
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($admin_users as $key => $admin_user)
                                <tr>
                                @can('user-delete')
                                    <td>
                                        <input type="checkbox" name="id[]" value="{{ $admin_user->id }}" class="all_check">
                                    </td>
                                @endcan
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $admin_user->name }}</td>
                                    <td>{{ $admin_user->email }}</td>
                                    <td>
                                        @foreach($admin_user->roles as $role)
                                            <span class="badge badge-pill badge-primary">{{ $role->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if($admin_user->status == 1)
                                            <form action="{{ route('admin.admin_users.inactive', $admin_user->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="badge badge-pill badge-success btn-badge">Active</button>
                                            </form>
                                        @else
                                            <form action="{{ route('admin.admin_users.active', $admin_user->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="badge badge-pill badge-danger btn-badge">Inactive</button>
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                    @can('user-edit')
                                        <a href="{{ route('admin.admin_users.edit', $admin_user->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    @endcan
                                    @can('user-delete')
                                        <form action="{{ route('admin.admin_users.destroy', $admin_user->id) }}" method="POST" onsubmit="return confirm('You want delete this data, Sure?')" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        @can('user-delete')
        //Multiple Delete
        $('#massDelete').on('click', function(){
            let ids = [];
            $('.all_check:checked').each(function(){
                ids.push($(this).attr('value'));
            });
            if(ids.length <= 0)
            {
                alert('There is no row selected.');
            } else {
                let check = confirm("Please Confirm Are You sure that you want to delete this rows?");
                if(check == true){
                    let join_selected_values = ids.join(",");
                    $.ajax({
                        url: '/admin/admin_users-massDelete',
                        type: 'delete',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: { "ids" : join_selected_values },
                        success: function (data) {
                            $(".all_check:checked").each(function() {
                                $(this).parents("tr").remove();
                            });
                            window.location.reload(true);
                        },
                        error: function (data) {
                            console.log(data);
                        }
                    });
                }
            }
        });
        @endcan
    });
</script>
@endpush
