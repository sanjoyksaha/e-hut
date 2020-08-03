@extends('admin.layouts')

@section('title', 'Edit Category')

@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Edit Category</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                    <div class="buttons mb-3">
                        @can('category-create')
                            <a href="{{ route('admin.category.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i>
                                Add Category
                            </a>
                        @endcan
                        @can('category-access')
                            <a href="{{ route('admin.category.index') }}" class="btn btn-warning text-dark">
                                <i class="fas fa-list"></i>
                                Manage Category
                            </a>
                        @endcan
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Category</h4>
                            <form action="{{ route('admin.category.update', $category->slug) }}" method="POST"  enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                @method('PATCH')
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 text-right control-label col-form-label">Category Name <sup class="text-danger">*</sup></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Category Name" value="{{ old('name') ?? $category->name }}">
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
                                        <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">
                                            {{ $category->description }}
                                        </textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="image" class="col-sm-3 text-right control-label col-form-label">Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" value="{{ old('image') }}">
                                        <img src="{{ asset('storage/media/category/'.$category->image) }}" alt="" style="width: 100px; height: 100px;">
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sub_categories" class="col-sm-3 text-right control-label col-form-label">Sub Category <sup class="text-danger">*</sup>
{{--                                        <span class="btn btn-info btn-sm select-all">Select all</span>--}}
{{--                                        <span class="btn btn-danger btn-sm deselect-all">Deselect all</span>--}}
                                    </label>
                                    <div class="col-sm-9">
                                        <select name="sub_categories[]" id="sub_categories" class="select2 select-multiple form-control @error('sub_categories') is-invalid @enderror" multiple="multiple">
                                            @foreach($sub_categories as $sub_category)
                                                <option value="{{ $sub_category->id }}" {{ $category->subCategories->pluck('id')->contains($sub_category->id) ? 'selected' : '' }}>{{ $sub_category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('sub_categories')
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
                                            <option value="1" {{ $category->status == 1 ? 'selected' : ''}}>Active</option>
                                            <option value="0" {{ $category->status == 0 ? 'selected' : ''}}>Inactive</option>
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
                                        <a href="{{ route('admin.category.index') }}" class="btn btn-warning text-dark">Back</a>
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

