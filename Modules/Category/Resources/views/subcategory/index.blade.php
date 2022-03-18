@php
    $user = x-admin.sidebar-dropdown)->user();
@endphp

@extends('admin.layouts.app')

@section('title') {{ __('msg.subcategoryedit') }} List | Admin  @endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('module.subcategory.create') }}" class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i class="fas fa-plus"></i>&nbsp;{{ __('msg.addsubCategory') }}</a>
                    <h3 class="card-title" style="line-height: 36px;">{{ __('msg.addsubCategory') }}</h3>
                    <!-- @if ($user->can('category.create')) -->
                    <a href="{{ route('module.subcategory.create') }}" class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i class="fas fa-plus"></i>&nbsp;{{ __('msg.addsubCategory') }}</a>
                    <!-- @endif -->
                    <!-- @if ($user->can('category.delete')) -->
                    <button id="selected_item_delete" onclick="return confirm('Are you sure you want to delete selected items?');" class="btn btn-danger mr-3 float-right d-flex align-items-center justify-content-center"><i class="fas fa-trash"></i>&nbsp;Delete Selected Item</button>
                    <!-- @endif -->
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
                                            <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="10%"> {{ __('msg.image') }} </th>
                                            <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending" width="40%">{{ __('msg.subcategory') }} {{ __('msg.name') }}</th>
                                            <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending" width="40%">{{ __('msg.category') }} {{ __('msg.name') }}</th>
                                            {{-- @if ($user->can('category.edit') || $user->can('category.delete')) --}}
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" width="18%"> {{ __('msg.action') }}</th>
                                            {{-- @endif --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sub_categories as $subcategory)
                                            <tr id="subcategory_id{{$subcategory->id}}" role="row" class="odd">
                                                <td><input onchange="checked_count()" id="single_checkbox_category" name="single_category_checkbox" value="{{ $subcategory->id }}" type="checkbox"></td>
                                                <td class="sorting_1 text-center" tabindex="0">
                                                    <img src="{{ asset($subcategory->image) }}" height="50px"
                                                        width="50px" alt="image">
                                                </td>
                                                <td class="sorting_1 text-center" tabindex="0">{{ $subcategory->name }}</td>
                                                <td class="sorting_1 text-center" tabindex="0">{{ $subcategory->category->name }}</td>
                                                {{-- @if ($user->can('category.edit') || $user->can('category.delete')) --}}
                                                <td class="sorting_1 text-center" tabindex="0">
                                                    {{-- @if ($user->can('category.edit')) --}}
                                                    <a data-toggle="tooltip" data-placement="top" title="Edit SubCategory" href="{{ route('module.subcategory.edit', $subcategory->id) }}" class="btn bg-info"><i class="fas fa-edit"></i></a>
                                                    {{-- @endif --}}
                                                    <form action="{{ route('module.subcategory.destroy', $subcategory->id) }}" method="POST" class="d-inline">
                                                        @method('DELETE')
                                                        @csrf
                                                        {{-- @if ($user->can('category.delete')) --}}
                                                        <button data-toggle="tooltip" data-placement="top" title="Delete SubCategory" onclick="return confirm('Are you sure you want to delete this item?');" class="btn bg-danger"><i class="fas fa-trash"></i></button>
                                                        {{-- @endif --}}
                                                    </form>
                                                </td>
                                                {{-- @endif --}}
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
                        url:'{{ route("module.subcategory.multiple.destroy") }}',
                        type:'DELETE',
                        data:{
                            id:ids,
                        },
                        success:function(response){
                            $.each(ids,function(key,val){
                                $('#subcategory_id'+val).remove();
                            })
                            toastr.success(response.message,'Success');
                        }
                    })
                });
            }else{
                $("#selected_item_delete").attr("disabled", true);
            }
        }
      </script>
@endsection
