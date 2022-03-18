@extends('layouts.admin')
@section('title') Create Faq | Admin @endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="line-height: 36px;">Create Banner</h3>
                    <a href="{{ route('module.banner.create') }}" class="btn bg-success float-right d-flex align-items-center justify-content-center"><i class="fas fa-plus"></i>&nbsp;Create</a>
                    <a href="{{ route('module.faq.index') }}" class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
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
                                                aria-sort="descending" width="5%">SL</th>
                                            <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="Rendering engine: activate to sort column ascending"
                                                aria-sort="descending" width="5%">Image</th>
                                            <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="Rendering engine: activate to sort column ascending"
                                                aria-sort="descending" width="30%">Short Description</th>
                                            <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="Rendering engine: activate to sort column ascending"
                                                aria-sort="descending" width="15%">Title</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                width="100px"> Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($banners as $key => $banner)
                                    <tbody>
                                            <td>{{ $key+1 }}</td>
                                            <td class="sorting_1 text-center" tabindex="0"><img width="50px"
                                                height="50px" class="rounded" src="{{ asset($banner->image) }}"
                                                alt=""></td>
                                            <td>{{ $banner->sub_title }}</td>
                                            <td> {{ $banner->title }} </td>
                                        </tbody>
                                        @endforeach
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
<style>
    .ck-editor__editable_inline {
        min-height: 170px;
    }
</style>
<link rel="stylesheet" href="{{ asset('backend') }}/css/dropify.min.css" />
@endsection

@section('script')
<script src="{{ asset('backend') }}/dist/js/ckeditor.js"></script>
<script src="{{ asset('backend') }}/js/dropify.min.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor2'))
        .catch(error => {
            console.error(error);
    });
    $('.dropify').dropify();
</script>
@endsection
