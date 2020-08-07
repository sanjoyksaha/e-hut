@extends('admin.layouts')

@section('title', 'Add Coupon')

@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Add Coupon</h4>
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
                        @can('coupon-access')
                            <a href="{{ route('admin.coupon.index') }}" class="btn btn-warning text-dark">
                                <i class="fas fa-list"></i>
                                Manage Coupon
                            </a>
                        @endcan
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Coupon</h4>
                            <form action="{{ route('admin.coupon.store') }}" method="POST" class="form-horizontal">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 text-right control-label col-form-label">Coupon Name <sup class="text-danger">*</sup></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Coupon Name" value="{{ old('name') }}">
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
                                        <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="code" placeholder="Coupon Code" value="{{ old('code') }}">
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
                                        <input type="date" name="from_date" class="form-control @error('from_date') is-invalid @enderror" id="from_date" placeholder="From Date" value="{{ old('from_date') }}">
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
                                        <input type="date" name="to_date" class="form-control @error('to_date') is-invalid @enderror" id="to_date" placeholder="To Date" value="{{ old('to_date') }}">
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
                                        <input type="number" name="discount" class="form-control @error('discount') is-invalid @enderror" id="discount" placeholder="Discount" value="{{ old('discount') }}">
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
                                        <select name="status" id="status" class="select2 form-control @error('status') is-invalid @enderror">
                                            <option value="">Select One</option>
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
                                        <a href="{{ route('admin.coupon.index') }}" class="btn btn-warning text-dark">Back</a>
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
