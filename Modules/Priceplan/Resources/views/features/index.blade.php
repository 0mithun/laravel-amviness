@extends('layouts.admin')
@section('title') Priceplan List | Admin @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Create Priceplan Feature</h3>
                        <a href="{{ route('feature.priceplan.create', $priceplan->id) }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-plus"></i>&nbsp;Add Priceplan</a>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('feature.priceplan.store', $priceplan->id) }}"
                            method="POST">
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
                                                                role="alert"><strong>{{ $message }}</strong></span>
                                                        @enderror
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
                                            <div class="col-sm-4 test-center">
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
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Priceplan Feature List</h3>
                    </div>
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                        role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row" class="text-center">
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                    width="5%"> Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                    Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                    width="10px"> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($priceplan->planfeatures as $key => $feature)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        {{ $key + 1 }}
                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        {{ $feature->name }}
                                                    </td>
                                                    <td>
                                                        <form
                                                            action="{{ route('feature.priceplan.destroy', $feature->id) }}"
                                                            method="POST" class="d-inline">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button data-toggle="tooltip" data-placement="top"
                                                                title="Delete Plan"
                                                                onclick="return confirm('Are you sure you want to delete this item?');"
                                                                class="btn bg-danger"><i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>

                                                    {{-- <td class="sorting_1 text-center" tabindex="0">
                                                        <a data-toggle="tooltip" data-placement="top" title="Edit Plan"
                                                            href="{{ route('module.priceplan.feature', $feature->id) }}"
                                                            class="btn bg-primary"><i class="fas fa-cog"></i></a>
                                                        <form
                                                            action="{{ route('module.priceplan.destroy', $feature->id) }}"
                                                            method="POST" class="d-inline">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button data-toggle="tooltip" data-placement="top"
                                                                title="Delete Plan"
                                                                onclick="return confirm('Are you sure you want to delete this item?');"
                                                                class="btn bg-danger"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </td> --}}
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

@section('script')
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
        $('.toggle-switch').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('priceplan.status.change') }}',
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
                            <button onclick="remove_single_field()" id="remove_item" class="btn btn-danger text-light"><i class="fas fa-times"></i></button>
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
