@extends('admin.layouts')

@section('title', 'Category')

@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Categories</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Category</li>
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
                        @can('category-create')
                            <a href="{{ route('admin.category.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i>
                                Add Category
                            </a>
                        @endcan
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="float-left">Categories</h5>
                            @can('category-delete')
                                <button class="btn btn-danger btn-sm float-right" id="massDelete">Delete Selected</button>
                            @endcan
                        </div>
                        <div class="card-body custom_datatable">
                            <table class="table table-bordered table-responsive-md" id="data_table" style="width: 100%">
                                <thead>
                                <tr>
                                    @can('category-delete')
                                        <th>
                                            <input type="checkbox" id="select_all" >
                                        </th>
                                    @endcan
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Sub Categories</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $key => $category)
                                    <tr>
                                        @can('category-delete')
                                            <td>
                                                <input type="checkbox" name="id[]" value="{{ $category->id }}" class="all_check">
                                            </td>
                                        @endcan
                                        <td>{{ ++$key }}</td>
                                        <td>
                                            <img src="{{ asset('storage/media/category/'.$category->image) }}" alt="" style="width: 60px; height: 60px;">
                                        </td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            @foreach($category->subCategories as $subCategory)
                                                <span class="badge badge-pill badge-primary">{{ $subCategory->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($category->status == 1)
                                                <form action="{{ route('admin.category.inactive', $category->slug) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="badge badge-pill badge-success btn-badge">Active</button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin.category.active', $category->slug) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="badge badge-pill badge-danger btn-badge">Inactive</button>
                                                </form>
                                            @endif
                                        </td>
                                        <td>
                                            @can('category-edit')
                                                <a href="{{ route('admin.category.edit', $category->slug) }}" class="btn btn-info btn-sm">Edit</a>
                                            @endcan
                                            @can('category-delete')
                                                <form action="{{ route('admin.category.destroy', $category->slug) }}" method="POST" onsubmit="return confirm('You want delete this data, Sure?')" style="display: inline-block;">
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
            @can('category-delete')
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
                            url: '/admin/category-massDelete',
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

