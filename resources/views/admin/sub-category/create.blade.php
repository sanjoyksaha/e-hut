@extends('admin.layouts')

@section('title', 'Add Sub Category')

@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Add Sub Category</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Sub Category</li>
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
                        @can('subcategory-access')
                            <a href="{{ route('admin.sub-category.index') }}" class="btn btn-warning text-dark">
                                <i class="fas fa-list"></i>
                                Manage Sub Category
                            </a>
                        @endcan
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Sub Category</h4>
                            <form action="{{ route('admin.sub-category.store') }}" method="POST"  enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 text-right control-label col-form-label">Sub Category Name <sup class="text-danger">*</sup></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Sub Category Name" value="{{ old('name') }}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-sm-3 text-right control-label col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea name="description" id="description" cols="30" rows="10" class="form-control">
                                            {{ old('description') }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="image" class="col-sm-3 text-right control-label col-form-label">Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="image" class="form-control" id="image" value="{{ old('image') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="child_sub_categories" class="col-sm-3 text-right control-label col-form-label">Child Sub Category <sup class="text-danger">*</sup>
                                    </label>
                                    <div class="col-sm-9">
                                        <select name="child_sub_categories[]" id="child_sub_categories" class="form-control select2 @error('child_sub_categories') is-invalid @enderror" multiple="multiple">
                                            @foreach($child_sub_categories as $child_sub_category)
                                                <option value="{{ $child_sub_category->id }}">{{ $child_sub_category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('child_sub_categories')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-3 text-right control-label col-form-label">Status <sup class="text-danger">*</sup></label>
                                    <div class="col-sm-9">
                                        <select name="status" id="status" class="select2 form-control @error('status') is-invalid @enderror">
                                            <option value="">Select Status</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="mt-2 offset-3">
                                        <a href="{{ route('admin.sub-category.index') }}" class="btn btn-warning text-dark">Back</a>
                                        <button type="submit" class="btn btn-success">Add</button>
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
