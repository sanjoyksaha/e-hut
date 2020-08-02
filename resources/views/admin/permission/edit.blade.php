@extends('admin.layouts')

@section('title', 'Edit Permission')

@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Edit Permission</h4>
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
                    <div class="buttons mb-3">
                        @can('permission-create')
                            <a href="{{ route('admin.permission.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i>
                                Add Permission
                            </a>
                        @endcan
                        @can('permission-access')
                            <a href="{{ route('admin.permission.index') }}" class="btn btn-warning text-dark">
                                <i class="fas fa-list"></i>
                                Manage Permission
                            </a>
                        @endcan
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Permission</h4>
                            <form action="{{ route('admin.permission.update',$permission->slug) }}" method="POST" class="form-horizontal">
                                @csrf
                                @method('PATCH')
                                <div class="form-group row">
                                    <label for="title" class="col-sm-3 text-right control-label col-form-label">Permission Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Permission Title" value="{{ old('title') ?? $permission->title }}">
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="mt-2 offset-3">
                                        <a href="{{ route('admin.permission.index') }}" class="btn btn-warning text-dark">Back</a>
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
