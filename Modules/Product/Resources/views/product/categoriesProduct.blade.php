@extends('admin.layouts.app')
@section('title') Category Wise Products | Admin  @endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header text-dark d-flex justify-content-between align-items-center">
                <h5 class="d-inline mb-0">Category Information</h5>
                <div class="ml-auto">
                    <a href="{{ route('module.product.index') }}" class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i class="fas fa-arrow-left"></i>&nbsp;Back to Products</a>
                </div>
              </div>

              <div class="card-body">
                <table class="table table-bordered  text-center mb-3">
                  <thead class="text-dark">
                    <tr>
                      <th width="30%">Image</th>
                      <th width="50%">Category</th>
                      <th width="20%">Total Product</th>
                    </tr>
                  </thead>
                  <tbody>
                        <tr>
                            <td class="sorting_1 text-center" tabindex="0">
                                <img width="65px" height="65px" src="{{ asset($category->image) }}" alt="">
                            </td>
                            <td class="text-center">{{ $category->name }}</td>
                            <td class="text-center">{{ count($products) }} Products</td>
                        </tr>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="line-height: 36px;">Category Wise Products</h3>
                    <a href="{{ route('module.product.create') }}" class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i class="fas fa-plus"></i>&nbsp;Add Product</a>
                    <button id="selected_item_delete" onclick="return confirm('Are you sure you want to delete selected items?');" class="btn btn-danger mr-3 float-right d-flex align-items-center justify-content-center"><i class="fas fa-trash"></i>&nbsp;Delete Selected Item</button>
                </div>
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                    role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row" class="text-center">
                                            <th width="2%" style="position: unset;padding-right:10px;"><input id="category_checkall" name="multiple_category" type="checkbox"></th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending" width="5%">Image</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" width="35%">Title</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" width="10%">Price</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" width="10%">Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" width="23%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($products as $product)
                                            <tr id="category_id{{$product->id}}" role="row" class="odd">
                                                <td><input onchange="checked_count()" id="single_checkbox_category" name="single_category_checkbox" value="{{ $product->id }}" type="checkbox" class="form-control"></td>
                                                <td class="sorting_1 text-center" tabindex="0"><img width="50px" height="50px" src="{{ asset($product->image) }}" alt="Product Image"></td>
                                                <td class="sorting_1 text-center" tabindex="0">{{ $product->title }}</td>
                                                <td class="sorting_1 text-center" tabindex="0">
                                                    @if ($product->sale_price)
                                                        <strong>$</strong> {{ $product->sale_price }} <del><strong>$</strong> {{ $product->price }}</del>
                                                    @else
                                                    <strong>$</strong> {{ $product->price }}
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <div>
                                                    <label class="switch ">
                                                        <input data-id="{{ $product->id }}" id="toggle-switch" type="checkbox" class="success" {{ $product->status == 1 ? 'checked':'' }}>
                                                        <span class="slider round"></span>
                                                    </label>
                                                    </div>
                                                </td>
                                                <td class="sorting_1 text-center" tabindex="0">
                                                    <a data-toggle="tooltip" data-placement="top" title="Add Product Attribute" href="{{ route('product.attributes.index', $product->id) }}" class="btn btn-sm bg-primary "><i class="fas fa-plus"></i></a>
                                                    <a data-toggle="tooltip" data-placement="top" title="Edit Product" href="{{ route('module.product.edit', $product->id) }}" class="btn btn-sm bg-info "><i class="fas fa-edit"></i></a>
                                                    <a data-toggle="tooltip" data-placement="top" title="Show Product Details" href="{{ route('module.product.show', $product->id) }}" class="btn btn-sm bg-gradient-indigo "><i class="fas fa-eye"></i></a>
                                                    <a data-toggle="tooltip" data-placement="top" title="Add Product Gallery" href="{{ route('module.product.gallery.index', $product->id) }}" class="btn btn-sm bg-teal "><i class="fas fa-images"></i></a>
                                                    <form action="{{ route('module.product.destroy', $product->id) }}" method="POST" class="d-inline">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button data-toggle="tooltip" data-placement="top" title="Delete Product" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm bg-danger "><i class="fas fa-trash"></i></button>
                                                    </form>
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
        .switch input {display:none;}
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
        input.success:checked + .slider {
            background-color: #28a745;
        }
        input:checked + .slider:before {
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
        $(function () {
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

        $("#selected_item_delete").attr("disabled", true);
        $("#category_checkall").on("click", function () {
            if ($("input:checkbox").prop("checked")) {
                $("input:checkbox[name='single_category_checkbox']").prop("checked", true);
                $("#selected_item_delete").attr("disabled", false);
            } else {
                $("input:checkbox[name='single_category_checkbox']").prop("checked", false);
                $("#selected_item_delete").attr("disabled", true);
            }
        });

        function checked_count(){
            var checked_length = $(":checkbox:checked").length
            if(checked_length != 0){
                $("#selected_item_delete").attr("disabled", false);

                $('#selected_item_delete').click(function(e){
                    e.preventDefault();
                    var ids = [];
                    $('input:checked[name="single_category_checkbox"]:checked').each(function(){
                        ids.push($(this).val());
                    });

                    $.ajax({
                        url:'{{ route("module.product.multiple.destroy") }}',
                        type:'DELETE',
                        data:{
                            id:ids,
                        },
                        success:function(response){
                            $.each(ids,function(key,val){
                                $('#category_id'+val).remove();
                            })
                            toastr.success(response.message,'Success');
                        }
                    })
                });
            }else{
                $("#selected_item_delete").attr("disabled", true);
            }
        }

        $("#category_checkall").on("click", function () {
            if ($("input:checkbox").prop("checked")) {
                $("input:checkbox[name='single_category_checkbox']").prop("checked", true);
                $("#selected_item_delete").attr("disabled", false);
            } else {
                $("input:checkbox[name='single_category_checkbox']").prop("checked", false);
                $("#selected_item_delete").attr("disabled", true);
            }
        });

        $('#toggle-switch').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route("product.status.change") }}',
                data: {'status': status, 'id': id},
                success: function(response){
                    toastr.success(response.message,'Success');
                }
            });
        })
      </script>
@endsection
