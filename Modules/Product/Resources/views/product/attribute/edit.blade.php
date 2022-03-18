@extends('admin.layouts.app')
@section('title') Product Attribute @endsection
@section('breadcrumbs')
<div class="row mb-2 mt-4">
    <div class="col-sm-6">
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Product Attribute</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title" style="line-height: 35px;">Product Attribute</h5>
                    <a href="{{ route('module.product.index',$product_attribute->product_id) }}" class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i class="fas fa-arrow-left"></i>&nbsp;Back to Product Attributes</a>
                </div>
                <div class="card-body">

                    <form action="{{ route('module.product.update',$product_attribute->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                      <div id="multiple_img_part">
                            <div class="row justify-content-center mb-10">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Product Attribute</label>
                                        <select id="attribute_id" onchange="fetch_attribute_option()" name="attribute_id" class="select2bs4 @error('attribute_id') is-invalid @enderror" style="width: 100%;">
                                            @foreach ($attributes as $attribute)
                                                <option {{ $attribute->id == $product_attribute->attribute_id ? "selected" : "" }} value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('attribute_id') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Attributes Options  <span class="text-danger">*</span></label>
                                        <select id="attribute_option" name="attribute_option_id" class="select2bs4 @error('attribute_option_id') is-invalid @enderror" style="width: 100%;">
                                            @foreach ($attribute_options as $attribute_option)
                                                <option {{ $attribute_option->id == $product_attribute->attribute_option_id ? "selected" : "" }} value="{{ $attribute_option->id }}">{{$attribute_option->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('attribute_option_id') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="form-label">Price</label>
                                        <input value="{{  $product_attribute->price }}" name="price" type="number" class="form-control @error('price') is-invalid @enderror" placeholder="Price">
                                        @error('price') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="form-label">Stock</label>
                                        <input value="{{  $product_attribute->stock }}" name="stock" type="number" class="form-control @error('price') is-invalid @enderror" placeholder="Stock">
                                        @error('stock') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-10  justify-content-center">
                                <div class="col-4"></div>
                                <div class="col-4 text-center">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Save Attributes</button>
                                </div>
                                <div class="col-4"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
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
    </style>
@endsection

@section('script')
    <script src="{{ asset('backend') }}/plugins/select2/js/select2.full.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.select2bs4').select2({
        theme: 'bootstrap4'
    });

    $("#remove_subcat").hide();

    function fetch_attribute_option() {
        var id = $('#attribute_id').val();

        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{ route('fetch.attributes.value') }}",
            data: {
                id:id,
            },
            success: function (data) {
                $('#attribute_option').empty();
                $.each(data.options, function (index, option) {
                    $('#attribute_option').append('<option value="' + option.id + '">' + option.name + '</option>');
                });
            },
        })
    };

    </script>
@endsection

