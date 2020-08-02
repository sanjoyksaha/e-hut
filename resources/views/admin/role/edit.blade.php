@extends('admin.layouts')

@section('title', 'Edit Role')

@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Edit Role</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Roles</li>
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
                        @can('role-create')
                            <a href="{{ route('admin.role.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i>
                                Add Role
                            </a>
                        @endcan
                        @can('role-access')
                            <a href="{{ route('admin.role.index') }}" class="btn btn-warning text-dark">
                                <i class="fas fa-list"></i>
                                Manage Role
                            </a>
                        @endcan
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Role</h4>
                            <form action="{{ route('admin.role.update',$role->slug) }}" method="POST" class="form-horizontal">
                                @csrf
                                @method('PATCH')
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 text-right control-label col-form-label">Role Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Role Name" value="{{ old('name') ?? $role->name }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-12 col-sm-12 text-light text-center bg-primary my-3 py-3">
                                        <span class="float-left">
                                            <input type="checkbox" id="select_all">
                                        </span>
                                        Permissions
                                    </label>
                                    @foreach($permissions as $permission)
                                        <div class="col-md-3 col-sm-3 col-6" >
                                            <div class="form-check">
                                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" @if($role->permissions->pluck('id')->contains($permission->id)) checked @endif class="all_check @error('permissions') is-invalid @enderror">
                                                <label for="">{{ $permission->title }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                    @error('permissions')
                                        <span class="invalid-feedback" role="alert" style="display: block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="border-top">
                                    <div class="mt-2 offset-3">
                                        <a href="{{ route('admin.role.index') }}" class="btn btn-warning text-dark">Back</a>
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
