@extends('admin.layouts.app')
@section('title') Portfolio List | Admin @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Portfolio List</h3>
                        <a href="{{ route('module.portfolio.create') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-plus"></i>&nbsp;Add Portfolio</a>
                        <button onclick="return confirm('Are you sure you want to delete selected items?');"
                            id="selected_item_delete" class="btn btn-danger mr-3 float-right"><i
                                class="fas fa-trash"></i></button>
                    </div>
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                        role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row" class="text-center">
                                                <th width="2%" style="position: unset;padding-right:10px;"><input
                                                        id="category_checkall" name="multiple_category" type="checkbox">
                                                </th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="10%">Image</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="25%">Name</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="50%">Description</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                    width="13%"> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($portfolios as $portfolio)
                                                <tr id="item_id{{ $portfolio->id }}" role="row" class="odd">
                                                    <td><input onchange="checked_count()" id="single_checkbox_category"
                                                            name="single_category_checkbox" value="{{ $portfolio->id }}"
                                                            type="checkbox"></td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        @if ($portfolio->image)
                                                            <img style="object-fit: cover" class="rounded" height="60px"
                                                                width="60px" src=" {{ asset($portfolio->image) }}"
                                                                alt="user image">
                                                        @else
                                                            <img style="object-fit: cover" class="rounded"
                                                                src="{{ asset('backend/image/default.png') }}"
                                                                height="60px" width="60px" alt="user image">
                                                        @endif
                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0">{{ $portfolio->name }}
                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0">{!! $portfolio->description !!}
                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        <a data-toggle="tooltip" data-placement="top" title="Edit Portfolio"
                                                            href="{{ route('module.portfolio.edit', $portfolio->id) }}"
                                                            class="btn bg-info"><i class="fas fa-edit"></i></a>
                                                        <form
                                                            action="{{ route('module.portfolio.destroy', $portfolio->id) }}"
                                                            method="POST" class="d-inline">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button data-toggle="tooltip" data-placement="top"
                                                                title="Delete Portfolio"
                                                                onclick="return confirm('Are you sure you want to delete this item?');"
                                                                class="btn bg-danger"><i class="fas fa-trash"></i></button>
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

        $("#selected_item_delete").attr("disabled", true);
        $("#category_checkall").on("click", function() {
            if ($("input:checkbox").prop("checked")) {
                $("input:checkbox[name='single_category_checkbox']").prop("checked", true);
                $("#selected_item_delete").attr("disabled", false);
            } else {
                $("input:checkbox[name='single_category_checkbox']").prop("checked", false);
                $("#selected_item_delete").attr("disabled", true);
            }
        });

        function checked_count() {
            var checked_length = $(":checkbox:checked").length
            if (checked_length != 0) {
                $("#selected_item_delete").attr("disabled", false);

                $('#selected_item_delete').click(function(e) {
                    e.preventDefault();
                    var ids = [];
                    $('input:checked[name="single_category_checkbox"]:checked').each(function() {
                        ids.push($(this).val());
                    });

                    $.ajax({
                        url: '{{ route('module.portfolio.multiple.destroy') }}',
                        type: 'DELETE',
                        data: {
                            id: ids,
                        },
                        success: function(response) {
                            $.each(ids, function(key, val) {
                                $('#item_id' + val).remove();
                            })
                            toastr.success(response.message, 'Success');
                            $("#selected_item_delete").attr("disabled", true);
                        }
                    })
                });
            } else {
                $("#selected_item_delete").attr("disabled", true);
            }
        }
    </script>
@endsection
