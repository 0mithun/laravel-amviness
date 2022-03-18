@extends('layouts.admin')
@section('title') Edit faq | Admin @endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="line-height: 36px;">Edit faq</h3>
                    <a href="{{ route('module.faq.index') }}" class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
                </div>
                <div class="row pt-3 pb-4">
                    <div class="col-md-6 offset-md-3">
                        <form class="form-horizontal" action="{{ route('module.faq.update',$faq->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">faq Title</label>
                                <div class="col-sm-9">
                                    <input value="{{ $faq->name }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter faq name">
                                    @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">faq Description</label>
                                <div class="col-sm-9">
                                    <textarea id="editor2" type="text" class="form-control" name="description" placeholder="Write description of faq... ">{{ $faq->description }}</textarea>
                                    @error('description') <span class="text-danger" style="font-size: 13px;"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-3 col-sm-4">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i>&nbsp;Update Faq</button>
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
<style>
    .ck-editor__editable_inline {
        min-height: 170px;
    }
</style>
@endsection

@section('script')
<script src="{{ asset('backend') }}/dist/js/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor2'))
        .catch(error => {
            console.error(error);
    });
</script>
@endsection
