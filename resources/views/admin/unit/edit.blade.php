@extends('admin.layouts')

@section('title', 'Edit Unit')

@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Edit Unit</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Unit</li>
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
                        @can('unit-create')
                            <a href="{{ route('admin.unit.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i>
                                Add Unit
                            </a>
                        @endcan
                        @can('unit-access')
                            <a href="{{ route('admin.unit.index') }}" class="btn btn-warning text-dark">
                                <i class="fas fa-list"></i>
                                Manage Unit
                            </a>
                        @endcan
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Unit</h4>
                            <form action="{{ route('admin.unit.update', $unit->slug) }}" method="POST"  enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                @method('PATCH')
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 text-right control-label col-form-label">Unit Name <sup class="text-danger">*</sup></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Child Sub Category Name" value="{{ old('name') ?? $unit->name }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="mt-2 offset-3">
                                        <a href="{{ route('admin.unit.index') }}" class="btn btn-warning text-dark">Back</a>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
