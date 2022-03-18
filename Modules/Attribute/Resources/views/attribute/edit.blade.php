@extends('attribute::layouts.tab')

@section('title') Attribute Edit | Admin @endsection
@section('tab-nav')
    <a href="{{ route('module.attributes.edit', $attribute->id) }}" class="nav-link bg-primary text-white">General</a>
    <a href="{{ route('module.attribute.value.index', $attribute->id) }}" class="nav-link">Attribute Value</a>
@endsection

@section('tab-content')
    <div class="card shadow-sm card-primary">
        <div class="card-header">
            Attribute Information
        </div>
        <div class="card-body">
            <form class="form-horizontal" action="{{ route('module.attributes.update', $attribute->id) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Attribute Name</label>
                    <div class="col-sm-9">
                        <input value="{{ $attribute->name }}" name="name" type="text"
                            class="form-control @error('name') is-invalid @enderror" placeholder="Enter Attribute Name">
                        @error('name') <span class="invalid-feedback"
                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Code</label>
                    <div class="col-sm-9">
                        <input value="{{ $attribute->code }}" name="code" type="text"
                            class="form-control @error('code') is-invalid @enderror" placeholder="Enter Attribute Code">
                        @error('code') <span class="invalid-feedback"
                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Frontend Type</label>
                    <div class="col-sm-9">
                        <select name="frontend_type" id="frontend_type"
                            class="form-control @error('frontend_type') is-invalid @enderror">
                            <option value="select" @if ($attribute->frontend_type == 'select') selected @endif>Select Box</option>
                            <option value="radio" @if ($attribute->frontend_type == 'radio') selected @endif>Radio Button</option>
                            <option value="text" @if ($attribute->frontend_type == 'text') selected @endif>Text Field</option>
                            <option value="text_area" @if ($attribute->frontend_type == 'text_area') selected @endif>Text Area</option>
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
                                <input value="0" name="is_required" type="hidden">
                                <div class="icheck-success d-inline">
                                    <input name="is_required" type="checkbox" id="requiredd" @if ($attribute->is_required) checked @endif>
                                    <label for="requiredd">
                                        Required
                                    </label>
                                </div>
                            </div>
                            <div class="col-3">
                                <input value="0" name="is_filterable" type="hidden">
                                <div class="icheck-success d-inline">
                                    <input name="is_filterable" type="checkbox" id="filterablee" @if ($attribute->is_filterable) checked @endif>
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
                        <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i>&nbsp;Update
                            Attribute</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
@endsection
