@extends('admin.layouts.app')
@section('title') Create Priceplan | Admin @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Create Priceplan</h3>
                        <a href="{{ route('module.priceplan.index') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-arrow-left"></i>&nbsp;Back</a>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('module.priceplan.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-6 offset-1">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Plan Type</label>
                                        <div class="col-sm-9">
                                            <select name="plan_type" id="plan_type" class="form-control">
                                                <option {{ old('plan_type') == 'Yearly' ? 'selected' : '' }}
                                                    value="Yearly">
                                                    Yearly</option>
                                                <option {{ old('plan_type') == 'Monthly' ? 'selected' : '' }}
                                                    value="Monthly">
                                                    Monthly</option>
                                            </select>
                                            @error('plan_type') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Level</label>

                                        <div class="col-sm-9">
                                            <select name="level" id="level" class="form-control">
                                                <option {{ old('level') === 'Basic' ? 'selected' : '' }} value="Basic">
                                                    Basic
                                                </option>
                                                <option {{ old('level') === 'Entry' ? 'selected' : '' }} value="Entry">
                                                    Entry
                                                </option>
                                                <option {{ old('level') === 'Intermidiate' ? 'selected' : '' }}
                                                    value="Intermidiate">Intermidiate</option>
                                                <option {{ old('level') === 'Expert' ? 'selected' : '' }} value="Expert">
                                                    Expert
                                                </option>
                                            </select>
                                            @error('level') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Price</label>
                                        <div class="col-sm-9">
                                            <input value="{{ old('price') }}" name="price" type="text"
                                                class="form-control @error('price') is-invalid @enderror"
                                                placeholder="Enter Priceplan price">
                                            @error('price') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Discount Price</label>
                                        <div class="col-sm-9">
                                            <input value="{{ old('discount_price') }}" name="discount_price" type="text"
                                                class="form-control @error('discount_price') is-invalid @enderror"
                                                placeholder="Enter Priceplan price">
                                            @error('discount_price') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Short Description</label>
                                        <div class="col-sm-9">
                                            <textarea rows="3" value="{{ old('short_description') }}"
                                                name="short_description" type="text"
                                                class="form-control @error('short_description') is-invalid @enderror"
                                                placeholder="Enter Priceplan price"></textarea>
                                            @error('short_description') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Long Description</label>
                                        <div class="col-sm-9">
                                            <textarea id="editor2" type="text" class="form-control" name="long_description"
                                                placeholder="Write long_description of Priceplan... ">{{ old('long_description') }}</textarea>
                                            @error('long_description') <span class="text-danger"
                                                    style="font-size: 13px;"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-3">
                                            <label for="checkboxPrimary3">Recommonded</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="icheck-success d-inline">
                                                <input {{ old('is_recommonded') == 1 ? 'checked' : '' }} value="1"
                                                    name="is_recommonded" type="checkbox" id="checkboxPrimary3">
                                                <label for="checkboxPrimary3"></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-3 col-sm-4">
                                            <button type="submit" class="btn btn-success"><i
                                                    class="fas fa-plus"></i>&nbsp;Add
                                                Priceplan</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 offset-1">
                                    <label class="col-sm-3 col-form-label">Plan Feature</label>
                                    <div id="multiple_feature_part">
                                        <div class="row mb-10">
                                            <div class="col-10">
                                                <div class="form-group">
                                                    <input name="features[]" type="text"
                                                        class="form-control @error('productfeatures') is-invalid @enderror"
                                                        placeholder="Enter Feature">
                                                    @error('productfeatures')<span class="invalid-feedback"
                                                        role="alert"><strong>{{ $message }}</strong></span> @enderror
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <a role="button" onclick="add_features_field()"
                                                    class="btn bg-primary text-light"><i class="fas fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <input id="count_feature" type="hidden" value="1"> --}}

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

        var count = $('#count_feature').val();

        function add_features_field() {
            // if (count <= 5) {
            $("#multiple_feature_part").append(`
                    <div class="row mb-10" id="divv">
                        <div class="col-10">
                            <div class="form-group">
                                <input name="features[]" type="text" class="form-control" placeholder="Enter Feature Name">
                            </div>
                        </div>
                        <div class="col-2">
                            <button onclick="remove_single_field()" id="remove_item" class="btn btn-danger text-light"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                `);
            // count++;
            // }
        }

        // function remove_single_field() {
        //     count--;
        // }

        $(document).on("click", "#remove_item", function() {
            $(this).parent().parent('div').remove();
        });
    </script>
@endsection
