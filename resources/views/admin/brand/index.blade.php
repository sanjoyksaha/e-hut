@extends('admin.layouts')

@section('title', 'Brand')

@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Brands</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Brand</li>
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
                        @can('brand-create')
                            <a href="{{ route('admin.brand.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i>
                                Add Brand
                            </a>
                        @endcan
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="float-left">Brands</h5>
                            @can('brand-delete')
                                <button class="btn btn-danger btn-sm float-right" id="massDelete">Delete Selected</button>
                            @endcan
                        </div>
                        <div class="card-body custom_datatable">
                            <table class="table table-bordered table-responsive-md" id="data_table" style="width: 100%">
                                <thead>
                                <tr>
                                    @can('brand-delete')
                                        <th>
                                            <input type="checkbox" id="select_all" >
                                        </th>
                                    @endcan
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone No</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($brands as $key => $brand)
                                    <tr>
                                        @can('brand-delete')
                                            <td>
                                                <input type="checkbox" name="id[]" value="{{ $brand->id }}" class="all_check">
                                            </td>
                                        @endcan
                                        <td>{{ ++$key }}</td>
                                        <td>
                                            <a href="{{ route('admin.brand.show', $brand->slug) }}">
                                                <img src="{{ asset('storage/media/brand/'.$brand->image) }}" alt="" style="width: 60px; height: 60px;">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.brand.show', $brand->slug) }}" class="text-dark">{{ $brand->name }}</a>
                                        </td>
                                        <td>{{ $brand->email }}</td>
                                        <td>{{ $brand->phone_no }}</td>
                                        <td>
                                            @if($brand->status == 1)
                                                <form action="{{ route('admin.brand.inactive', $brand->slug) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="badge badge-pill badge-success btn-badge">Active</button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin.brand.active', $brand->slug) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="badge badge-pill badge-danger btn-badge">Inactive</button>
                                                </form>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.brand.show', $brand->slug) }}" class="btn btn-warning btn-sm">Show</a>
                                            @can('brand-edit')
                                                <a href="{{ route('admin.brand.edit', $brand->slug) }}" class="btn btn-info btn-sm">Edit</a>
                                            @endcan
                                            @can('brand-delete')
                                                <form action="{{ route('admin.brand.destroy', $brand->slug) }}" method="POST" onsubmit="return confirm('You want delete this data, Sure?')" style="display: inline-block;">
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
            @can('brand-delete')
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
                    if(check === true){
                        let join_selected_values = ids.join(",");
                        $.ajax({
                            url: '/admin/brand-massDelete',
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
