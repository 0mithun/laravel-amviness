@php
$user = auth()->user();
@endphp

@extends('layouts.admin')

@section('title') Comment | Admin @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Comment List</h3>
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
                                                    aria-sort="descending" width="15%">Name</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="50%">Body</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach ($faqs as $faq)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1 text-center" tabindex="0">{{ $faq->name }}</td>
                                                <td class="sorting_1 text-center" tabindex="0">{!! $faq->description !!}</td>
                                                <td class="sorting_1 text-center" tabindex="0">{{ $faq->created_at->diffForHumans() }}</td>
                                                @if ($user->can('faq.edit') || $user->can('faq.delete'))
                                                <td class="sorting_1 text-center" tabindex="0">
                                                    @if ($user->can('faq.edit'))
                                                    <a data-toggle="tooltip" data-placement="top" title="Edit Job" href="{{ route('module.faq.edit', $faq->id) }}" class="btn bg-info"><i class="fas fa-edit"></i></a>
                                                    @endif
                                                    <form action="{{ route('module.faq.destroy', $faq->id) }}" method="POST" class="d-inline">
                                                        @method('DELETE')
                                                        @csrf
                                                        @if ($user->can('faq.delete'))
                                                        <button data-toggle="tooltip" data-placement="top" title="Delete Job" onclick="return confirm('Are you sure you want to delete this item?');" class="btn bg-danger"><i class="fas fa-trash"></i></button>
                                                        @endif
                                                    </form>
                                                </td>
                                                @endif
                                            </tr>
                                        @endforeach --}}
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
    </script>
@endsection
