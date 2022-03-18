@extends('admin.layouts.app')
@section('title') {{ __('msg.create') }} | {{ __('msg.admin') }} @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Product Add</h3>
                        <a href="{{ route('module.product.index') }}" class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i class="fas fa-arrow-left"></i>&nbsp;{{ __('msg.back') }}</a>
                    </div>
                    <div class="row pt-3 pb-4">
                        <div class="col-md-10 offset-md-1">
                            <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('module.product.store') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-6 form-group">
                                        <label for="Product Title" class="form-check-label">Name</label>
                                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Title" required>
                                        @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="Product SKU" class="form-check-label">Email</label>
                                        <input name="sku" type="number" class="form-control @error('sku') is-invalid @enderror" placeholder="Sku">
                                        @error('sku') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                    <div class="col-4 form-group">
                                        <label for="Product Price" class="form-check-label">Phone Number</label>
                                        <input name="price" type="number" class="form-control @error('price') is-invalid @enderror" placeholder="Price" required>
                                        @error('price') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="Product Description" class="form-check-label">Address</label>
                                        <textarea id="editor3" type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                                                  placeholder="Write description... ">{{ old('description') }}</textarea>
                                        @error('description') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                    <div class="form-group pl-2">
                                        <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Save</button>
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
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <style>
        .select2-results__option[aria-selected=true] {
            display: none;
        }
        .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice {
            color: #fff;
            border: 1px solid #fff;
            background: #007bff;
            border-radius: 30px;
        }
        .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice__remove {
            color: #fff;
        }
        .ck-editor__editable_inline {
            min-height: 170px;
        }
    </style>
@endsection

@section('script')
    <script src="{{ asset('backend') }}/plugins/select2/js/select2.full.min.js"></script>
    <script src="{{ asset('backend') }}/dist/js/ckeditor.js"></script>
    <script>
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        $('.select2s4').select2({
            theme: 'bootstrap4'
        })
        $('.select2ds4').select2({
            theme: 'bootstrap4'
        })
        $('.select2ds4').select2({
            theme: 'bootstrap4'
        })
        ClassicEditor
            .create(document.querySelector('#editor2'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor3'))
            .catch(error => {
                console.error(error);
            });

    </script>
@endsection
