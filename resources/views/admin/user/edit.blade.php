@extends('admin.layouts')

@section('title', 'Edit User')

@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Edit User</h4>
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
                    <div class="buttons mb-3">
                        @can('user-create')
                            <a href="{{ route('admin.admin_users.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i>
                                Add Admin Users
                            </a>
                        @endcan
                        @can('user-access')
                            <a href="{{ route('admin.admin_users.index') }}" class="btn btn-warning text-dark">
                                <i class="fas fa-list"></i>
                                Manage Admin Users
                            </a>
                        @endcan
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit User</h4>
                            <form action="{{ route('admin.admin_users.update', $admin_user->id) }}" method="POST" class="form-horizontal">
                                @csrf
                                @method('PATCH')
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 text-right control-label col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Role Name" value="{{ old('name') ?? $admin_user->name }}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Role Name" value="{{ old('email') ?? $admin_user->email }}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" value="{{ old('password') }}">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-3 text-right control-label col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                            <option value="">Select Status</option>
                                            <option value="1" {{ $admin_user->status == 1 ? 'selected' : ''}}>Active</option>
                                            <option value="0" {{ $admin_user->status == 0 ? 'selected' : ''}}>Inactive</option>
                                        </select>
                                        @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 text-right control-label col-form-label">Roles</label>
                                    <div class="col-sm-9">
                                        @foreach($roles as $role)
                                            <div class="custom-control mr-sm-2">
                                                <input type="checkbox" name="roles[]" value="{{ $role->id }}" @if($admin_user->roles->pluck('id')->contains($role->id)) checked @endif class=" @error('roles') is-invalid @enderror" id="roles">
                                                <label for="roles">{{ $role->name }}</label>
                                            </div>
                                        @endforeach
                                        @error('roles')
                                        <span class="invalid-feedback" role="alert" style="display: block;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="mt-2 offset-3">
                                        <a href="{{ route('admin.admin_users.index') }}" class="btn btn-warning text-dark">Back</a>
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
