@extends('admin.layouts')

@section('title', 'Supplier Details')

@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Supplier Details</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Supplier</li>
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
                        @can('supplier-create')
                            <a href="{{ route('admin.supplier.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i>
                                Add Supplier
                            </a>
                        @endcan
                        @can('supplier-access')
                            <a href="{{ route('admin.supplier.index') }}" class="btn btn-warning text-dark">
                                <i class="fas fa-list"></i>
                                Manage Supplier
                            </a>
                        @endcan
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title m-b-0">Supplier Details</h4>
                        </div>
                        <div class="comment-widgets scrollable ps-container ps-theme-default" data-ps-id="09c5afd0-c5f8-0c13-a7cd-6d50fb8ead82">
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row m-t-0">
                                <div class="p-2">
                                    <img src="{{ asset('storage/media/supplier/'.$supplier->image) }}" alt="user" width="50" class="rounded-circle">
                                </div>
                                <div class="comment-text w-100">
                                    <h4 class="font-medium">{{ $supplier->name }}</h4>
                                    <div class="comment-footer">
                                        <p>Email: {{ $supplier->email }}</p>
                                        <p>Phone Number: {{ $supplier->phone_no }}</p>
                                        <p>Website: {{ $supplier->website }}</p>
                                        <p>Address: {{ $supplier->address }}</p>
                                        <p>
                                            Status:  @if($supplier->status == 1)
                                                    <button type="submit" class="badge badge-pill badge-success btn-badge">Active</button>
                                                @else
                                                    <button type="submit" class="badge badge-pill badge-danger btn-badge">Inactive</button>
                                                @endif
                                        </p>
                                        <a href="{{ route('admin.supplier.index') }}" type="button" class="btn btn-warning btn-sm">Back</a>
                                        @can('supplier-edit')
                                            <a href="{{ route('admin.supplier.edit', $supplier->slug) }}" class="btn btn-info btn-sm">Edit</a>
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
