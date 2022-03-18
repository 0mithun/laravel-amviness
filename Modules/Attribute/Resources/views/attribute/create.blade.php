@extends('attribute::layouts.master')

@section('title') Attribute Add | Admin @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Create Attribute</h3>
                        <a href="{{ route('module.attributes.index') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-arrow-left"></i>&nbsp;Back</a>
                    </div>
                    <div class="row pt-3 pb-4">
                        <div class="col-md-6 offset-md-3">
                            <form class="form-horizontal" action="{{ route('module.attributes.store') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input value="{{ old('name') }}" name="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Enter Attribute Name">
                                        @error('name') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Code</label>
                                    <div class="col-sm-9">
                                        <input value="{{ old('code') }}" name="code" type="text"
                                            class="form-control @error('code') is-invalid @enderror"
                                            placeholder="Enter Attribute Code">
                                        @error('code') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Frontend Type</label>
                                    <div class="col-sm-9">
                                        <select name="frontend_type" id="type"
                                            class="form-control @error('frontend_type') is-invalid @enderror">
                                            <option value="select">Select Box</option>
                                            <option value="radio">Radio Button</option>
                                            <option value="text">Text Field</option>
                                            <option value="text_area">Text Area</option>
                                        </select>
                                        @error('frontend_type') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="icheck-success d-inline">
                                                    <input name="is_required" type="checkbox" id="requiredd">
                                                    <label for="requiredd">
                                                        Required
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="icheck-success d-inline">
                                                    <input name="is_filterable" type="checkbox" id="filterablee">
                                                    <label for="filterablee">
                                                        Filterable
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-3 col-sm-4">
                                        <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Add
                                            Attribute</button>
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

@section('style')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
@endsection
