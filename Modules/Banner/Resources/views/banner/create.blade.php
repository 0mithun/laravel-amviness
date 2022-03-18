@extends('layouts.admin')
@section('title') Create Faq | Admin @endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="line-height: 36px;">Create Faq</h3>
                    <a href="{{ route('module.banner.index') }}" class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
                </div>
                <div class="row pt-3 pb-4">
                    <div class="col-md-6 offset-md-3">
                        <form class="form-horizontal" action="{{ route('module.banner.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input value="{{ old('title') }}" name="title" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Enter banner title">
                                    @error('title') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Sub Title</label>
                                <div class="col-sm-9">
                                    <input value="{{ old('sub_title') }}" name="sub_title" type="text" class="form-control @error('sub_title') is-invalid @enderror" placeholder="Enter banner sub title">
                                    @error('sub_title') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('msg.image') }}</label>
                                <div class="col-sm-9">
                                    <input name="image" type="file"
                                        class="form-control dropify @error('image') is-invalid @enderror"
                                        style="border:none;padding-left:0;">
                                    @error('image') <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="offset-sm-3 col-sm-4">
                                    <button type="submit" class="btn btn-success">&nbsp;Add Banner</button>
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
