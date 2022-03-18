@extends('admin.layouts.app')
@section('title') Product List | Admin @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Product List</h3>
                        <div>
                            <a href="{{ route('module.product.create') }}"
                                class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                    class="fas fa-plus"></i>&nbsp;Add Product</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                        role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row" class="text-center">
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="3%">SL</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="8%">Image</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                    width="35%">Title</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                    width="10%">Total Orders</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                    width="10%">Price</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                    width="17%">Category</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                    width="8%">Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                    width="12%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr id="category_id{{ $product->id }}" role="row" class="odd">
                                                    <td class="sorting_1 text-center">{{ $loop->index + 1 }}</td>
                                                    <td class="sorting_1 text-center" tabindex="0"><img width="60px"
                                                            height="60px" src="{{ asset($product->image) }}"
                                                            class="rounded" alt="Product Image"></td>


                                                    <td class="sorting_1 text-center" tabindex="0">{{ $product->title }}
                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        {{ $product->total_orders }}</td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        @if ($product->sale_price)
                                                            <strong>$</strong> {{ $product->sale_price }}
                                                            <del><strong>$</strong> {{ $product->price }}</del>
                                                        @else
                                                            <strong>$</strong> {{ $product->price }}
                                                        @endif
                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0"><a
                                                            href="{{ route('category.wise.product', $product->category_id) }}">{{ $product->category->name }}</a>
                                                    </td>
                                                    <td class="text-center">
                                                        <div>
                                                            <label class="switch ">
                                                                <input data-id="{{ $product->id }}" type="checkbox"
                                                                    class="success toggle-switch"
                                                                    {{ $product->status == 1 ? 'checked' : '' }}>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-info dropdown-toggle"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                Options
                                                            </button>
                                                            <ul class="dropdown-menu" x-placement="bottom-start"
                                                                style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                                                                <li>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('product.attributes.index', $product->id) }}">
                                                                        <i class="fas fa-plus text-primary"></i> Product
                                                                        Attribute
                                                                    </a>
                                                                </li>
                                                                <li><a class="dropdown-item"
                                                                        href="{{ route('module.product.gallery.index', $product->id) }}"><i
                                                                            class="fas fa-image text-info"></i> Product
                                                                        Gallery</a></li>
                                                                {{-- <li><a target="_blank" class="dropdown-item" href="{{ route('product.details',$product->slug) }}"><i class="fas fa-link text-dark"></i> Product Link</a></li> --}}
                                                                <li><a class="dropdown-item"
                                                                        href="{{ route('module.product.show', $product->id) }}"><i
                                                                            class="fas fa-eye text-success"></i> Product
                                                                        Details</a></li>
                                                                <li><a class="dropdown-item"
                                                                        href="{{ route('module.product.edit', $product->id) }}"><i
                                                                            class="fas fa-edit text-info"></i> Edit
                                                                        Product</a></li>
                                                                <li>
                                                                    <form
                                                                        action="{{ route('module.product.destroy', $product->id) }}"
                                                                        method="POST" class="d-inline">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button type="submit" class="dropdown-item"
                                                                            onclick="return confirm('Are you sure you want to delete this item?');">
                                                                            <i class="fas fa-trash text-danger"></i> Delete
                                                                            Product
                                                                        </button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 35px;
            height: 19px;
            /* width: 60px;
                                                            height: 34px; */
        }

        /* Hide default HTML checkbox */
        .switch input {
            display: none;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 15px;
            width: 15px;
            left: 3px;
            bottom: 2px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input.success:checked+.slider {
            background-color: #28a745;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(15px);
            -ms-transform: translateX(15px);
            transform: translateX(15px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

    </style>
@endsection

@section('script')
    <script src="{{ asset('backend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        $("#category_checkall").on("click", function() {
            if ($("input:checkbox").prop("checked")) {
                $("input:checkbox[name='single_category_checkbox']").prop("checked", true);
                $("#selected_item_delete").attr("disabled", false);
            } else {
                $("input:checkbox[name='single_category_checkbox']").prop("checked", false);
                $("#selected_item_delete").attr("disabled", true);
            }
        });

        $('.toggle-switch').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('product.status.change') }}',
                data: {
                    'status': status,
                    'id': id
                },
                success: function(response) {
                    toastr.success(response.message, 'Success');
                }
            });
        })
    </script>
@endsection
