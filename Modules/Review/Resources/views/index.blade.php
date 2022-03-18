@extends('layouts.admin')
@section('title') Review List | Admin @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if (session()->has('message'))
                        <p class="alert alert-success">{{ session()->get('message') }}</p>
                    @endif
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Review List</h3>
                        <a href="{{ route('review.create') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-plus"></i>&nbsp;Add Review</a>
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
                                                    aria-sort="descending" width="20%">Name</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending">Comment</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="20%">Stars</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                    width="100px"> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $star = '<i class="fas fa-star" style="color:orange" aria-hidden="true"></i>';
                                            @endphp
                                            @foreach ($reviews as $review)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1 text-center" tabindex="0">{{ $review->name }}
                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0">{{ $review->comment }}
                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0">

                                                        @switch($ratings = $review->stars)
                                                            @case($ratings = 1)
                                                                {!! $star !!}
                                                            @break
                                                            @case($ratings = 2)
                                                                @for ($i = 0; $i < 2; $i++)
                                                                    {!! $star !!}
                                                                @endfor
                                                            @break
                                                            @case($ratings = 3) @for ($i = 0; $i < 3; $i++) @endfor
                                                                {!! $star !!}
                                                            @break
                                                            @case($ratings = 4)
                                                                @for ($i = 0; $i < 4; $i++)
                                                                    {!! $star !!}
                                                                @endfor
                                                            @break
                                                            @default
                                                                @for ($i = 0; $i < 5; $i++)
                                                                    {!! $star !!}
                                                                @endfor
                                                        @endswitch
                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        <a data-toggle="tooltip" data-placement="top" title="Edit Bed"
                                                            href="{{ route('review.edit', $review->id) }}"
                                                            class="btn bg-info"><i class="fas fa-edit"></i></a>
                                                        <form action="{{ route('review.destroy', $review->id) }}"
                                                            method="POST" class="d-inline">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button data-toggle="tooltip" data-placement="top"
                                                                title="Delete Bed"
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
    </script>
@endsection
