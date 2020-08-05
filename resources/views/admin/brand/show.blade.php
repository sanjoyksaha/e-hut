@extends('admin.layouts')

@section('title', 'Brand Details')

@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Brand Details</h4>
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
                    <div class="buttons mb-3">
                        @can('brand-create')
                            <a href="{{ route('admin.brand.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i>
                                Add Brand
                            </a>
                        @endcan
                        @can('brand-access')
                            <a href="{{ route('admin.brand.index') }}" class="btn btn-warning text-dark">
                                <i class="fas fa-list"></i>
                                Manage Brand
                            </a>
                        @endcan
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title m-b-0">Brand Details</h4>
                        </div>
                        <div class="comment-widgets scrollable ps-container ps-theme-default" data-ps-id="09c5afd0-c5f8-0c13-a7cd-6d50fb8ead82">
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row m-t-0">
                                <div class="p-2">
                                    <img src="{{ asset('storage/media/brand/'.$brand->image) }}" alt="user" width="50" class="rounded-circle">
                                </div>
                                <div class="comment-text w-100">
                                    <h4 class="font-medium">{{ $brand->name }}</h4>
                                    <div class="comment-footer">
                                        <p>Email: {{ $brand->email }}</p>
                                        <p>Phone Number: {{ $brand->phone_no }}</p>
                                        <p>Website: {{ $brand->website }}</p>
                                        <p>Address: {{ $brand->address }}</p>
                                        <p>
                                            Status:  @if($brand->status == 1)
                                                    <button type="submit" class="badge badge-pill badge-success btn-badge">Active</button>
                                                @else
                                                    <button type="submit" class="badge badge-pill badge-danger btn-badge">Inactive</button>
                                                @endif
                                        </p>
                                        <a href="{{ route('admin.brand.index') }}" type="button" class="btn btn-warning btn-sm">Back</a>
                                        @can('brand-edit')
                                            <a href="{{ route('admin.brand.edit', $brand->slug) }}" class="btn btn-info btn-sm">Edit</a>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
