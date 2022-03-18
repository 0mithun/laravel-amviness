@extends('layouts.admin')
@section('title') Product Edit | Admin @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Product Edit</h3>
                        <a href="{{ route('module.product.index') }}" class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
                    </div>
                    <div class="row pt-3 pb-4">
                        <div class="col-md-10 offset-md-1">
                            <form enctype="multipart/form-data" method="POST" action="{{ route('module.product.update',$product->id) }}">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Title <span class="text-danger">*</span></label>
                                            <input  value="{{ $product->title }}" name="title" type="text"  class="form-control @error('title') is-invalid @enderror" placeholder="Title">
                                            @error('title') <span class="invalid-feedback"  role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <label class="form-label">Current Image</label><br>
                                        <img width="70px" height="70px" src="{{ asset($product->image) }}" alt="Product Image">
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label">Image <span class="text-danger">*</span></label>
                                            <input name="image" type="file" class="form-control @error('image') is-invalid @enderror" style="border: none">
                                            @error('image') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                            <label class="form-label">Category</label>
                                            <select  id="category_id" name="category_id" class="select2ds4 @error('category_id') is-invalid @enderror" style="width: 100%;">
                                                @foreach ($categories as $category)
                                                    <option {{ $product->category_id == $category->id ? "selected" : "" }} value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label">Price <span class="text-danger">*</span></label>
                                            <input  value="{{ $product->price }}" name="price" type="number" class="form-control @error('price') is-invalid @enderror" placeholder="Price">
                                            @error('price') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label">Sale Price</label>
                                            <input value="{{ $product->sale_price }}" name="sale_price" type="number" class="form-control @error('sale_price') is-invalid @enderror"placeholder="Sell price">
                                            @error('sale_price') <span class="invalid-feedback"  role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Brand</label>
                                            <select name="brand_id" class="select2ds4 @error('brand_id') is-invalid @enderror" style="width: 100%;">
                                                @foreach ($brands as $brand)
                                                    <option {{ $product->brand_id == $brand->id ? "selected" : "" }} value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('brand_id') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label">Sold Count Number</label>
                                            <input value="{{ $product->total_orders }}" name="total_orders" type="number" class="form-control @error('total_orders') is-invalid @enderror" placeholder="Random Count Number">
                                            @error('total_orders') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label">Favourite Count Number</label>
                                            <input value="{{ $product->total_favourites }}" name="total_favourites" type="number" class="form-control @error('total_favourites') is-invalid @enderror"placeholder="Random Count Number">
                                            @error('total_favourites') <span class="invalid-feedback"  role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label">SKU <span class="text-danger">*</span></label>
                                            <input value="{{ $product->sku }}" name="sku" type="number"  class="form-control @error('sku') is-invalid @enderror" placeholder="SKU" value="{{ $product->sku }}">
                                            @error('sku') <span class="invalid-feedback"  role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label">Status</label>
                                            <select name="status" class="form-control" style="width: 100%;">
                                                <option {{ $product->status == 1 ? 'selected':'' }} value="1">Active</option>
                                                <option {{ $product->status == 0 ? 'selected':'' }} value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label">Handling Time</label>
                                            <input value="{{ $product->handling_time }}" name="handling_time" type="number" class="form-control @error('handling_time') is-invalid @enderror">
                                            @error('handling_time') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label">Shipping Cost</label>
                                            <input value="{{ $product->shipping_cost }}" name="shipping_cost" type="number" class="form-control @error('shipping_cost') is-invalid @enderror">
                                            @error('shipping_cost') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Short Description</label>
                                            <textarea id="editor1" type="text" class="form-control" name="short_description" rows="5" placeholder="Short Description">{{ $product->short_description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Long Description</label>
                                            <textarea id="editor2" type="text" class="form-control" name="long_description" rows="5" placeholder="Long Description">{{ $product->long_description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6 offset-3 text-center">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-sync"></i> Update Product
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
