@extends('admin.layouts.app')
@section('title') Edit Post | Admin @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Edit Post</h3>
                        <a href="{{ route('module.post.index') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-arrow-left"></i>&nbsp;Back</a>
                    </div>
                    <div class="row justify-content-center pt-3 pb-4">
                        <div class="col-md-6 px-5">
                            <form class="form-horizontal" action="{{ route('module.post.update', $post->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Title</label>
                                    <div class="col-sm-9">
                                        <input value="{{ $post->title }}" name="title" type="text"
                                            class="form-control @error('title') is-invalid @enderror"
                                            placeholder="Enter Blog Title">
                                        @error('title') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Categoty</label>
                                    <div class="col-sm-9">
                                        <select name="category_id"
                                            class="select2bs4 @error('category_id') is-invalid @enderror"
                                            style="width: 100%;">
                                            @foreach ($categories as $category)
                                                <option {{ $post->category_id == $category->id ? 'selected' : '' }}
                                                    value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tag</label>
                                    <div class="col-sm-9">
                                        <select name="tags[]" class="select2bs4 @error('tags') is-invalid @enderror"
                                            style="width: 100%;" multiple data-placeholder="Select Tag">
                                            @foreach ($tags as $tag)
                                                @foreach ($post->tags as $postTag)
                                                    <option {{ $tag->id == $postTag->id ? 'selected' : '' }}
                                                        value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                        @error('tags') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Short Description</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" name="short_description" rows="3"
                                            placeholder="Write short description of post... ">{{ $post->short_description }}</textarea>
                                        @error('short_description') <span class="text-danger"
                                                style="font-size: 13px;"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea id="editor2" type="text" class="form-control" name="description"
                                            placeholder="Write description of post... ">{{ $post->description }}</textarea>
                                        @error('description') <span class="text-danger"
                                                style="font-size: 13px;"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9 text-center">
                                        <button type="submit" class="btn btn-success"><i
                                                class="fas fa-plus"></i>&nbsp;Update Post</button>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-3 text-center">
                            <label class="form-lebel mb-5">Thumbnail Image</label> <br>
                            @if ($post->image && file_exists($post->image))
                                <img width="300px" height="300px" id="image" class="img-fluid"
                                    src="{{ asset($post->image) }}" alt="image"
                                    style="border: 1px solid #adb5bd;margin: 0 auto;padding: 3px;">
                            @else
                                <img width="300px" height="300px" id="image" class="img-fluid"
                                    src="{{ asset('backend/image/default-post.png') }}" alt="image"
                                    style="border: 1px solid #adb5bd;margin: 0 auto;padding: 3px;">
                            @endif
                            <div class="upload-btn-wrapper mt-3">
                                <input name="image"
                                    onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                                    id="hiddenImgInput" type="file" hidden />
                                <button onclick="$('#hiddenImgInput').click()" class="btn btn-info" type="button">Choose an
                                    image</button>
                            </div>
                            @error('image') <span class="invalid-feedback d-block"
                                role="alert"><strong>{{ $message }}</strong></span> @enderror
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
        .ck-editor__editable_inline {
            min-height: 170px;
        }

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
    <script src="{{ asset('backend') }}/dist/js/ckeditor.js"></script>
    <script>
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        ClassicEditor
            .create(document.querySelector('#editor2'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
