@extends('admin.layouts')

@section('title', 'Permissions')

@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Permissions</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Permissions</li>
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
                        @can('permission-create')
                            <a href="{{ route('admin.permission.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i>
                                Add Permission
                            </a>
                        @endcan
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="float-left">Permissions</h5>
                            @can('permission-delete')
                                <button class="btn btn-danger btn-sm float-right" id="massDelete">Delete Selected</button>
                            @endcan
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-responsive-md" id="data_table">
                                <thead>
                                <tr>
                                    @can('permission-delete')
                                        <th>
                                            <input type="checkbox" id="select_all" >
                                        </th>
                                    @endcan
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($permissions as $key => $permission)
                                    <tr>
                                        @can('permission-delete')
                                            <td>
                                                <input type="checkbox" name="id[]" value="{{ $permission->slug }}" class="all_check">
                                            </td>
                                        @endcan
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $permission->title }}</td>
                                        <td>{{ $permission->slug }}</td>
                                        <td>
                                            @can('permission-edit')
                                                <a href="{{ route('admin.permission.edit', $permission->slug) }}" class="btn btn-info btn-sm">Edit</a>
                                            @endcan
                                            @can('permission-delete')
                                                <form action="{{ route('admin.permission.destroy', $permission->slug) }}" method="POST" onsubmit="return confirm('You want delete this data, Sure?')" style="display: inline-block;">
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
        @can('permission-delete')
        //Multiple Delete
        $('#massDelete').on('click', function(){
            let slugs = [];
            $('.all_check:checked').each(function(){
                slugs.push($(this).attr('value'));
            });
            if(slugs.length <= 0)
            {
                alert('There is no row selected.');
            } else {
                let check = confirm("Please Confirm Are You sure that you want to delete this rows?");
                if(check == true){
                    let join_selected_values = slugs.join(",");
                    $.ajax({
                        url: '/admin/permission-massDelete',
                        type: 'delete',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: { "slugs" : join_selected_values },
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
                    // $.each(slugs, function( index, value ) {
                    //     $('table tr').filter("[data-row-id='" + value + "']").remove();
                    // });
                }
            }
        });
        @endcan
    });
</script>
@endpush
