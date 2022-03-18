@extends('admin.layouts.app')
@section('title') Product Details | Admin @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Product Details</h3>
                        <a href="{{ route('module.product.index') }}" class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i class="fas fa-arrow-left"></i>&nbsp;Product List</a>
                    </div>
                    <div class="row m-2">
                        <div class="col-md-4">
                            <h5><strong>Thumbnail</strong></h5>
                            <img src="{{ asset($product->image) }}" alt="image" class="image-fluid" height="450px" width="450px">
                        </div>
                        <div class="col-md-8">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <tbody>
                                    <tr class="mb-5">
                                        <th width="50%">Title</th>
                                        <td width="50%">{{ $product->title }}</td>
                                    </tr>
                                    <tr class="mb-5">
                                        <th width="50%">Category Name</th>
                                        <td width="50%">{{ $product->category->name }}</td>
                                    </tr>

                                    <tr class="mb-5">
                                        <th width="50%">Price</th>
                                        <td width="50%">{{ $product->price }}</td>
                                    </tr>
                                    <tr class="mb-5">
                                        <th width="50%">Selling Price</th>
                                        <td width="50%">{{ $product->sale_price }}</td>
                                    </tr>
                                    <tr class="mb-5">
                                        <th width="50%">Stock Quantity</th>
                                        <td width="50%">{{ $product->quantity }}</td>
                                    </tr>
                                    <tr class="mb-5">
                                        <th width="50%">Delivery Time</th>
                                        <td width="50%">{{ $product->handling_time }}</td>
                                    </tr>
                                    <tr class="mb-5">
                                        <th width="50%">Shipping Cost</th>
                                        <td width="50%">{{ $product->shipping_cost }}</td>
                                    </tr>
                                    <tr class="mb-5">
                                        <th width="50%">Total Orders</th>
                                        <td width="50%">{{ $product->total_orders }}</td>
                                    </tr>
                                    {{-- <tr>
                                        <th width="50%">Product Link</th>
                                        <td width="50%"><a href="{{ route('product.details',$product->slug) }}" class="btn-link">{{ route('product.details',$product->slug) }}</a></td>
                                    </tr> --}}
                                    <tr class="mb-5">
                                        <th width="50%">Short Description</th>
                                        <td width="50%">{!! $product->short_description  !!}</td>
                                    </tr>
                                    <tr class="mb-5">
                                        <th width="50%">Long Description</th>
                                        <td width="50%">{!! $product->long_description  !!}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Created At</th>
                                        <td width="50%">{{ Carbon\Carbon::parse($product->created_at)->format('d M,Y ') }}({{ $product->created_at->diffForHumans() }})</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Updated At</th>
                                        <td width="50%">{{ Carbon\Carbon::parse($product->updated_at)->format('d M,Y ') }}({{ $product->updated_at->diffForHumans() }})</td>
                                    </tr>
                                </tbody>
                            </table>
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
