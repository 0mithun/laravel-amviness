@extends('layouts.admin')
@section('title') Create Priceplan | Admin @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Create Feature </h3>
                        <a href="{{ route('module.priceplan.index') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-arrow-left"></i>&nbsp;Back</a>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('feature.priceplan.store',$priceplan_id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-8 offset-1">
                                        <label class="col-sm-6 col-form-label">Plan Feature</label>
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
    
                                    <div class="col-6 offset-1">
                                        <div class="form-group row">
                                            <div class="offset-sm-3 col-sm-4">
                                                <button type="submit" class="btn btn-success"><i
                                                        class="fas fa-plus"></i>&nbsp;Add
                                                    Feature</button>
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
                            <button onclick="remove_single_field()" id="remove_item" class="btn btn-danger text-light"><i class="fas fa-times"></i>
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
