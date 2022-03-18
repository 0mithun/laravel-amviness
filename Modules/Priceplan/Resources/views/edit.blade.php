@extends('layouts.admin')
@section('title') Edit Priceplan | Admin @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Edit Priceplan</h3>
                        <a href="{{ route('module.priceplan.index') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-arrow-left"></i>&nbsp;Back</a>
                    </div>
                    <div class="row pt-3 pb-4">
                        <div class="col-md-6 offset-md-3">
                            <form class="form-horizontal" action="{{ route('module.priceplan.update', $priceplan->id) }}"
                                method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Plan Type</label>
                                    <div class="col-sm-9">
                                        <select name="plan_type" id="plan_type" class="form-control">
                                            <option value="Yearly">Yearly</option>
                                            <option value="Monthly">Monthly</option>
                                        </select>
                                        @error('plan_type') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Level</label>

                                    <div class="col-sm-9">
                                        <select name="level" id="level" class="form-control">
                                            <option value="Basic">Basic</option>
                                            <option value="Entry">Entry</option>
                                            <option value="Intermidiate">Intermidiate</option>
                                            <option value="Expert">Expert</option>
                                        </select>
                                        @error('level') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Price</label>
                                    <div class="col-sm-9">
                                        <input value="{{ $priceplan->price }}" name="price" type="text"
                                            class="form-control @error('price') is-invalid @enderror"
                                            placeholder="Enter  price">
                                        @error('price') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Discount Price</label>
                                    <div class="col-sm-9">
                                        <input value="{{ $priceplan->discount_price }}" name="discount_price" type="text"
                                            class="form-control @error('discount_price') is-invalid @enderror"
                                            placeholder="Enter  price">
                                        @error('discount_price') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Short Description</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" name="short_description"
                                            placeholder="Write description of ... ">{{ $priceplan->short_description }}</textarea>
                                        @error('short_description') <span class="text-danger"
                                            style="font-size: 13px;"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Long Description</label>
                                    <div class="col-sm-9">
                                        <textarea id="editor2" type="text" class="form-control" name="long_description"
                                            placeholder="Write description of ... ">{{ $priceplan->long_description }}</textarea>
                                        @error('long_description') <span class="text-danger"
                                            style="font-size: 13px;"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-3">
                                        <label for="checkboxPrimary3">Recommonded</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="hidden" value="0" name="is_recommonded">
                                        <div class="icheck-success d-inline">
                                            <input {{ $priceplan->is_recommonded == 1 ? 'checked' : '' }} value="1"
                                                name="is_recommonded" type="checkbox" id="checkboxPrimary3">
                                            <label for="checkboxPrimary3"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-3 col-sm-4">
                                        <button type="submit" class="btn btn-success"><i
                                                class="fas fa-sync"></i>&nbsp;Update</button>
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
    <style>
        .ck-editor__editable_inline {
            min-height: 170px;
        }

    </style>
@endsection

@section('script')
    <script src="{{ asset('backend') }}/dist/js/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor2'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
