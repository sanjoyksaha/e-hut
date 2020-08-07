@extends('admin.layouts')

@section('title', 'Edit Coupon')

@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Edit Coupon</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Coupon</li>
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
                        @can('coupon-create')
                            <a href="{{ route('admin.coupon.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i>
                                Add Coupon
                            </a>
                        @endcan
                        @can('coupon-access')
                            <a href="{{ route('admin.coupon.index') }}" class="btn btn-warning text-dark">
                                <i class="fas fa-list"></i>
                                Manage Coupon
                            </a>
                        @endcan
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Coupon</h4>
                            <form action="{{ route('admin.coupon.update', $coupon->slug) }}" method="POST" class="form-horizontal">
                                @csrf
                                @method('PATCH')
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 text-right control-label col-form-label">Coupon Name <sup class="text-danger">*</sup></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Coupon Name" value="{{ old('name') ?? $coupon->name }}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="code" class="col-sm-3 text-right control-label col-form-label">Code <sup class="text-danger">*</sup></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="code" placeholder="Coupon Code" value="{{ old('code') ?? $coupon->code }}">
                                        @error('code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="from_date" class="col-sm-3 text-right control-label col-form-label">From Date <sup class="text-danger">*</sup></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="from_date" class="form-control @error('from_date') is-invalid @enderror" id="from_date" placeholder="From Date" value="{{ old('from_date') ?? $coupon->from_date }}">
                                        @error('from_date')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="to_date" class="col-sm-3 text-right control-label col-form-label">To Date <sup class="text-danger">*</sup></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="to_date" class="form-control @error('to_date') is-invalid @enderror" id="to_date" placeholder="To Date" value="{{ old('to_date') ?? $coupon->to_date }}">
                                        @error('to_date')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="discount" class="col-sm-3 text-right control-label col-form-label">Discount(in percent "%") <sup class="text-danger">*</sup></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="discount" class="form-control @error('discount') is-invalid @enderror" id="discount" placeholder="Discount" value="{{ old('discount') ?? $coupon->discount }}">
                                        @error('discount')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-3 text-right control-label col-form-label">Status <sup class="text-danger">*</sup></label>
                                    <div class="col-sm-9">
                                        <select name="status" id="status" class="select2 form-control">
                                            <option value="">Select One</option>
                                            <option value="1" {{ $coupon->status == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $coupon->status == 0 ? 'selected' : '' }}>Inactive</option>
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
                                        <a href="{{ route('admin.coupon.index') }}" class="btn btn-warning text-dark">Back</a>
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
