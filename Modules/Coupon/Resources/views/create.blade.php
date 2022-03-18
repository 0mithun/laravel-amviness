@extends('layouts.admin')
@section('title') Create Coupon | Admin @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    @if (session()->has('message'))
                        <p class="alert alert-success">{{ session()->get('message') }} <button class="close"
                                data-dismiss="alert">&times;</button></p>
                    @endif

                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Create Coupon</h3>
                        <a href="{{ route('coupon.index') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-arrow-left"></i>&nbsp;Back</a>
                    </div>
                    <div class="row pt-3 pb-4">
                        <div class="col-md-6 offset-md-3">
                            <form class="form-horizontal" action="{{ route('coupon.store') }}" method="POST">
                                @csrf

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Coupon Code</label>
                                    <div class="col-sm-9">
                                        <a href="#" onclick="randCode()">Generate Random Code</a>

                                        <input value="{{ old('code') }}" name="code" type="text"
                                            class="form-control @error('code') is-invalid @enderror"
                                            placeholder="Enter Coupon Code">
                                        @error('code') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Max Use</label>
                                    <div class="col-sm-9">
                                        <input value="{{ old('max_use') }}" name="max_use" type="number"
                                            class="form-control @error('max_use') is-invalid @enderror"
                                            placeholder="Enter Max Use">
                                        @error('max_use') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Discount</label>
                                    <div class="col-sm-9">
                                        <input value="{{ old('discount') }}" name="discount" type="number"
                                            class="form-control @error('discount') is-invalid @enderror"
                                            placeholder="Enter Discount">
                                        @error('discount') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Expire Date</label>
                                    <div class="col-sm-9">
                                        <input value="{{ old('expire_date') }}" name="expire_date" type="date"
                                            class="form-control @error('expire_date') is-invalid @enderror"
                                            placeholder="Enter Discount">
                                        @error('expire_date') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Type</label>
                                    <div class="col-sm-9">
                                        <div class="icheck-success d-inline">
                                            <input name="type" type="radio" id="parcentage" value="Percentage"
                                                {{ old('type') == 'Percentage' ? 'checked' : '' }}>
                                            <label for="parcentage">
                                                Percentage
                                            </label>
                                        </div>
                                        &nbsp;
                                        &nbsp;
                                        <div class="icheck-success d-inline">
                                            <input name="type" type="radio" id="number" value="Number"
                                                {{ old('type') == 'Number' ? 'checked' : '' }}>
                                            <label for="number">
                                                Number
                                            </label>
                                        </div>
                                        @error('type') <span class="invalid-feedback d-block"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-3 col-sm-4">
                                        <button type="submit" class="btn btn-success"><i
                                                class="fas fa-plus"></i>&nbsp;Create</button>
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

@section('script')
    <script>
        function randCode() {
            let r = Math.random().toString(36).substring(7);
            $("input[name=code]").val(r);
        }
    </script>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
@endsection
