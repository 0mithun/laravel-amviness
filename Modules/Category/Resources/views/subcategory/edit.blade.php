@extends('admin.layouts.app')
@section('title') {{ __('msg.subcategoryedit') }} | Admin @endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="line-height: 36px;">{{ __('msg.subcategoryedit') }}</h3>
                    <a href="{{ route('module.subcategory.index') }}" class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
                </div>
                <div class="row pt-3 pb-4">
                    <div class="col-md-6 offset-md-3">
                        <form class="form-horizontal" action="{{ route('module.subcategory.update',$subcategory->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group row mb-15">
                                <label  class="col-sm-3 form-label">{{ __('msg.category') }} {{ __('msg.name') }}</label>
                                <div class="col-sm-9">
                                    <select name="category_id" class="select2bs4 @error('category_id') is-invalid @enderror" style="width: 100%;">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option {{ $subcategory->category_id == $category->id ? 'selected' : ''}} value="{{ $category->id }}" >{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('msg.subcategory') }} {{ __('msg.name') }}</label>
                                <div class="col-sm-9">
                                    <input value="{{ $subcategory->name }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter SubCategory Name" required>
                                    @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-3 col-sm-4">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i>&nbsp;{{ __('msg.updatesubcategory') }}</button>
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
  <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <style>
    .select2-results__option[aria-selected=true] {
        display: none;
    }
    .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice {
        color: #fff;
        border: 1px solid #fff;
        background: #007bff;
        border-radius: 30px;
    }
    .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice__remove {
        color: #fff;
    }
  </style>
@endsection

@section('script')
<script src="{{ asset('backend') }}/plugins/select2/js/select2.full.min.js"></script>
<script>
    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
</script>
@endsection
