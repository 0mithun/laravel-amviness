@extends('admin.layouts.app')
@section('title') Create Product | Admin @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Create Product</h3>
                        <a href="{{ route('module.product.index') }}" class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
                    </div>
                    <div class="row pt-3 pb-4">
                        <div class="col-md-10 offset-md-1">
                            <form enctype="multipart/form-data" action="{{ route('module.product.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Title <span class="text-danger">*</span></label>
                                            <input  value="{{ old('title') }}" name="title" type="text"  class="form-control @error('title') is-invalid @enderror" placeholder="Title">
                                            @error('title') <span class="invalid-feedback"  role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="Product Title" class="form-label ">Image</label>
                                            <input  name="image" type="file" class="form-control @error('image') is-invalid @enderror" style="border: none;padding-left:0;">
                                            @error('image') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                            <label class="form-label">Category</label>
                                            <select name="category_id" class="select2ds4 @error('category_id') is-invalid @enderror" style="width: 100%;">
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option {{ old('category_id') == $category->id ? "selected" : "" }} value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label">Price <span class="text-danger">*</span></label>
                                            <input  value="{{ old('price') }}" name="price" type="number" class="form-control @error('price') is-invalid @enderror" placeholder="Price">
                                            @error('price') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label">Sale Price</label>
                                            <input value="{{ old('sale_price') }}" name="sale_price" type="number" class="form-control @error('sale_price') is-invalid @enderror"placeholder="Sell price">
                                            @error('sale_price') <span class="invalid-feedback"  role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Brand</label>
                                            <select name="brand_id" class="select2ds4 @error('brand_id') is-invalid @enderror" style="width: 100%;">
                                                <option value="">Select Brand</option>
                                                @foreach ($brands as $brand)
                                                    <option {{ old('brand_id') == $brand->id ? "selected" : "" }} value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('brand_id') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label">Sold Count Number</label>
                                            <input value="{{ old('total_orders') }}" name="total_orders" type="number" class="form-control @error('total_orders') is-invalid @enderror" placeholder="Random Count Number">
                                            @error('total_orders') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label">Favourite Count Number</label>
                                            <input value="{{ old('total_favourites') }}" name="total_favourites" type="number" class="form-control @error('total_favourites') is-invalid @enderror"placeholder="Random Count Number">
                                            @error('total_favourites') <span class="invalid-feedback"  role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label">SKU <span class="text-danger">*</span></label>
                                            <input value="{{ old('sku') }}" name="sku" type="number"  class="form-control @error('sku') is-invalid @enderror" placeholder="SKU" value="{{ old('sku') }}">
                                            @error('sku') <span class="invalid-feedback"  role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label">Status</label>
                                            <select name="status" class="form-control" style="width: 100%;">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label">Delivery Time</label>
                                            <input value="{{ old('handling_time') }}" name="handling_time" type="number" class="form-control @error('handling_time') is-invalid @enderror" placeholder="Delivery Time">
                                            @error('handling_time') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label">Shipping Cost</label>
                                            <input value="{{ old('shipping_cost') }}" name="shipping_cost" type="number" class="form-control @error('shipping_cost') is-invalid @enderror" placeholder="Shipping Cost">
                                            @error('shipping_cost') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Short Description</label>
                                            <textarea id="editor1" type="text" class="form-control" name="short_description" rows="5" placeholder="Short Description">{{ old('short_description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Long Description</label>
                                            <textarea id="editor2" type="text" class="form-control" name="long_description" rows="5" placeholder="Long Description">{{ old('long_description') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6 offset-3 text-center">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-plus"></i> Add New Product
                                        </button>
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
        $('.select2ds4').select2({
            theme: 'bootstrap4'
        })
        ClassicEditor
            .create(document.querySelector('#editor2'))
            .catch(error => {
                console.error(error);
        });
        ClassicEditor
            .create(document.querySelector('#editor1'))
            .catch(error => {
                console.error(error);
        });
    </script>
@endsection
