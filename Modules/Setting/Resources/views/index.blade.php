@extends('layouts.admin')
@section('title') Website Settings | Admin @endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="line-height: 36px;">Website Settings</h3>
                </div>
                <div class="card-body">
                    <div class="row pt-3 pb-4">
                        <div class="col-md-8 offset-md-2 mb-50 mt-20">
                            <form enctype="multipart/form-data" method="POST"
                                action="{{ route('module.setting.update', $settings->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label class="form-check-label">Website Title</label>
                                        <input required value="{{ $settings->title }}" name="title" type="text"
                                            class="form-control @error('title') is-invalid @enderror"
                                            placeholder="Enter Title">
                                        @error('title') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                    <div class="col-6 form-group">
                                        <label class="form-check-label">Website Sub Title</label>
                                        <input required value="{{ $settings->sub_title }}" name="sub_title" type="text"
                                            class="form-control @error('sub_title') is-invalid @enderror"
                                            placeholder="Enter Sub Title">
                                        @error('sub_title') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="form-check-label">Facebook</label>
                                        <input required value="{{ $settings->facebook }}" name="facebook" type="text"
                                            class="form-control @error('facebook') is-invalid @enderror"
                                            placeholder="Enter facebook">
                                        @error('facebook') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="form-check-label">Twitter</label>
                                        <input required value="{{ $settings->twitter }}" name="twitter" type="text"
                                            class="form-control @error('twitter') is-invalid @enderror"
                                            placeholder="Enter twitter">
                                        @error('twitter') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="form-check-label">Pinterest</label>
                                        <input required value="{{ $settings->pinterest }}" name="pinterest" type="text"
                                            class="form-control @error('pinterest') is-invalid @enderror"
                                            placeholder="Enter pinterest">
                                        @error('pinterest') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="form-check-label">Youtube</label>
                                        <input required value="{{ $settings->youtube }}" name="youtube" type="text"
                                            class="form-control @error('youtube') is-invalid @enderror"
                                            placeholder="Enter youtube">
                                        @error('facebook') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="form-check-label">Email</label>
                                        <input required value="{{ $settings->email }}" name="email" type="text"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Enter email">
                                        @error('email') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="form-check-label">Phone</label>
                                        <input required value="{{ $settings->phone }}" name="phone" type="text"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            placeholder="Enter phone">
                                        @error('phone') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="form-check-label">Address</label>
                                        <input required value="{{ $settings->address }}" name="address" type="text"
                                            class="form-control @error('address') is-invalid @enderror"
                                            placeholder="Enter address">
                                        @error('address') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="form-check-label">Fax</label>
                                        <input required value="{{ $settings->fax }}" name="fax" type="text"
                                            class="form-control @error('fax') is-invalid @enderror"
                                            placeholder="Enter fax">
                                        @error('fax') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                    {{-- <div class="col-6">
                                        <label class="form-check-label">Header Script</label>
                                        <textarea class="form-control @error('header_resource') is-invalid @enderror"
                                            row="3" name="header_resource" id="" cols="30"
                                            rows="10">{{ $settings->header_resource }}</textarea>
                                        @error('header_resource') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                    <div class="col-6 form-group">
                                        <label class="form-check-label">Footer Script</label>
                                        <textarea class="form-control @error('footer_resource') is-invalid @enderror"
                                            row="3" name="footer_resource" id="" cols="30"
                                            rows="10">{{ $settings->footer_resource }}</textarea>
                                        @error('footer_resource') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div> --}}
                                    <div class="col-6 form-group">
                                        <br>
                                        <label>Favicon</label>

                                        <input name="favicon" data-max-file-size="2M"
                                            onchange="document.getElementById('favicon').src = window.URL.createObjectURL(this.files[0])"
                                            id="favicon" type="file"
                                            class="form-control fav_dropify @error('favicon') is-invalid @enderror"
                                            placeholder="Enter Favicon">
                                        @error('favicon') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                    <div class="col-6 form-group">
                                        <br>
                                        <label>Logo</label>
                                        <input name="logo" type="file" data-max-file-size="2M"
                                            class="form-control logo_dropify @error('logo') is-invalid @enderror"
                                            placeholder="Enter logo"
                                            onchange="document.getElementById('logo').src = window.URL.createObjectURL(this.files[0])"
                                            id="logo">
                                        @error('logo') <span class="invalid-feedback"
                                            role="a lert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                    <div class="col-6 form-group">
                                        <button class="btn btn-success" type="submit">Update</button>
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
    <link rel="stylesheet" href="{{ asset('backend') }}/css/dropify.min.css" />
@stop

@section('script')
    <script src="{{ asset('backend') }}/js/dropify.min.js"></script>
    <script>
        $('.fav_dropify').dropify();
        $('.logo_dropify').dropify();
    </script>
@stop
