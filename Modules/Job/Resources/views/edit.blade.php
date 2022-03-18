@extends('layouts.admin')
@section('title') Edit Job | Admin @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Edit Job</h3>
                        <a href="{{ route('module.job.index') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-arrow-left"></i>&nbsp;Back</a>
                    </div>
                    <div class="row pt-3 pb-4">
                        <div class="col-md-10 offset-md-1">
                            <form class="form-horizontal" action="{{ route('module.job.update', $job->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Title <span class="text-danger">*</span></label>
                                            <input value="{{ $job->title }}" name="title" type="text"
                                                class="form-control @error('title') is-invalid @enderror"
                                                placeholder="Title">
                                            @error('title') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label ">Current Image</label><br>
                                            <img height="100px" width="100px" class="img-fluid"
                                                src="{{ asset($job->thumbnail) }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label ">New Thumbnail Image</label>
                                            <input name="thumbnail" type="file"
                                                class="form-control @error('thumbnail') is-invalid @enderror"
                                                style="border: none;padding-left:0;">
                                            @error('thumbnail') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Category <span class="text-danger">*</span></label>
                                            <select name="category_id"
                                                class="form-control @error('category_id') is-invalid @enderror">
                                                @foreach ($categories as $category)
                                                    <option {{ $job->category_id == $category->id ? 'selected' : '' }}
                                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Company <span class="text-danger">*</span></label>
                                            <input value="1" name="company_id" type="text"
                                                class="form-control @error('title') is-invalid @enderror"
                                                placeholder="Title">
                                            @error('company_id') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Phone <span class="text-danger">*</span></label>
                                            <input value="{{ $job->phone }}" name="phone" type="text"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                placeholder="Enter Phone">
                                            @error('phone') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Email <span class="text-danger">*</span></label>
                                            <input value="{{ $job->email }}" name="email" type="text"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Enter Email">
                                            @error('email') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Website Link <span
                                                    class="text-danger">*</span></label>
                                            <input value="{{ $job->website_link }}" name="website_link" type="text"
                                                class="form-control @error('website_link') is-invalid @enderror"
                                                placeholder="Enter Website Link">
                                            @error('website_link') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Map Address <span class="text-danger">*</span></label>
                                            <input value="{{ $job->map_address }}" name="map_address" type="text"
                                                class="form-control @error('map_address') is-invalid @enderror"
                                                placeholder="Enter Map address">
                                            @error('map_address') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label">Job Type <span class="text-danger">*</span></label>
                                            <select name="job_type" class="form-control">
                                                <option {{ $job->job_type == 'Full Time' ? 'selected' : '' }}
                                                    value="Full Time">Full Time</option>
                                                <option {{ $job->job_type == 'Half Time' ? 'selected' : '' }}
                                                    value="Half Time">Half Time</option>
                                                <option {{ $job->job_type == 'Remote' ? 'selected' : '' }}
                                                    value="Remote">
                                                    Remote</option>
                                            </select>
                                            @error('job_type') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label">Salary Range <span
                                                    class="text-danger">*</span></label>
                                            <input value="{{ $job->salary_range }}" name="salary_range" type="text"
                                                class="form-control @error('salary_range') is-invalid @enderror"
                                                placeholder="Enter Salary Ranger">
                                            @error('salary_range') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label">Education <span class="text-danger">*</span></label>
                                            <input value="{{ $job->education }}" name="education" type="text"
                                                class="form-control @error('education') is-invalid @enderror"
                                                placeholder="Education">
                                            @error('education') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label">Experience <span class="text-danger">*</span></label>
                                            <input value="{{ $job->experience }}" name="experience" type="text"
                                                class="form-control @error('experience') is-invalid @enderror"
                                                placeholder="Experience">
                                            @error('experience') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Gender <span class="text-danger">*</span></label>
                                            <select name="gender" id="" class="form-control">
                                                <option {{ $job->gender == 'Both' ? 'selected' : '' }} value="Both">Both
                                                </option>
                                                <option {{ $job->gender == 'Male' ? 'selected' : '' }} value="Male">Male
                                                </option>
                                                <option {{ $job->gender == 'Female' ? 'selected' : '' }} value="Female">
                                                    Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Expired At <span class="text-danger">(Format:
                                                    Year/Month/Day)</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('expired_at') is-invalid @enderror"
                                                    id="reservation" value="{{ $job->expired_at }}" name="expired_at"
                                                    placeholder="Select Event Date">
                                                @error('expired_at') <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Address</label>
                                            <textarea type="text" class="form-control" name="address" rows="5"
                                                placeholder="Address">{{ $job->address }}</textarea>
                                            @error('address') <span class="invalid-feedback d-block"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label">Short Description</label>
                                            <textarea type="text" class="form-control" name="short_description" rows="5"
                                                placeholder="Short Description">{{ $job->short_description }}</textarea>
                                            @error('short_description') <span class="invalid-feedback d-block"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Long Description</label>
                                            <textarea id="editor2" type="text" class="form-control" name="long_description"
                                                rows="12"
                                                placeholder="Long Description">{{ $job->long_description }}</textarea>
                                            @error('long_description') <span class="invalid-feedback d-block"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6 offset-3 text-center">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-plus"></i> Update Job
                                        </button>
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
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/css/bootstrap-datetimepicker.min.css">
    <style>
        .ck-editor__editable_inline {
            min-height: 250px;
        }

    </style>
@endsection

@section('script')
    <script src="{{ asset('backend') }}/dist/js/ckeditor.js"></script>
    <script src="{{ asset('backend') }}/js/moment.min.js"></script>
    <script src="{{ asset('backend') }}/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor2'))
            .catch(error => {
                console.error(error);
            });

        $('#reservation').datetimepicker({
            format: 'YYYY-MM-DD',
        });
    </script>
@endsection
