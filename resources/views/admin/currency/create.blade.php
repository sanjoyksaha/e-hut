@extends('admin.layouts')

@section('title', 'Add Currency')

@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Add Currency</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Currency</li>
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
                        @can('currency-access')
                            <a href="{{ route('admin.currency.index') }}" class="btn btn-warning text-dark">
                                <i class="fas fa-list"></i>
                                Manage Currency
                            </a>
                        @endcan
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Currency</h4>
                            <form action="{{ route('admin.currency.store') }}" method="POST" class="form-horizontal">
                                @csrf
                                <div class="form-group row">
                                    <label for="country_name" class="col-sm-3 text-right control-label col-form-label">Country Name <sup class="text-danger">*</sup></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="country_name" class="form-control @error('country_name') is-invalid @enderror" id="country_name" placeholder="Country Name" value="{{ old('country_name') }}">
                                        @error('country_name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="currency_name" class="col-sm-3 text-right control-label col-form-label">Currency Name <sup class="text-danger">*</sup></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="currency_name" class="form-control @error('currency_name') is-invalid @enderror" id="name" placeholder="Currency Name" value="{{ old('currency_name') }}">
                                        @error('currency_name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="symbol" class="col-sm-3 text-right control-label col-form-label">Symbol <sup class="text-danger">*</sup></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="symbol" class="form-control @error('symbol') is-invalid @enderror" id="symbol" placeholder="Currency Symbol" value="{{ old('symbol') }}">
                                        @error('symbol')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="mt-2 offset-3">
                                        <a href="{{ route('admin.currency.index') }}" class="btn btn-warning text-dark">Back</a>
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
