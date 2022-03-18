@extends('layouts.admin')
@section('title')  {{ __('msg.create') }} {{ __('msg.company') }} | {{ __('msg.admin') }} @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;"> {{ __('msg.create') }} {{ __('msg.company') }} </h3>
                        <a href="{{ route('module.company.index') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-arrow-left"></i>&nbsp; {{ __('msg.back') }}</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('module.company.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for=""> {{ __('msg.name') }} <span class="text-danger" >*</span> </label>
                                        <input type="text"  class="form-control @error('name') is-invalid @enderror"
                                            name="name" placeholder="Enter Company Name" value="{{ old('name') }}" required>
                                        @error('name') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.organizationtype') }} <span class="text-danger" >*</span></label>
                                        <select class="form-control select2bs4" name="organization_type" id=""
                                            class="form-control @error('organization_type') is-invalid @enderror">
                                            <option value="">Select an Option</option>
                                            <option {{ old('organization_type') == 'Private' ? 'selected' : '' }}
                                                value="Private">Private</option>
                                            <option {{ old('organization_type') == 'Public' ? 'selected' : '' }}
                                                value="Public">Public</option>
                                            <option {{ old('organization_type') == 'Government' ? 'selected' : '' }}
                                                value="Government">Government</option>
                                            <option {{ old('organization_type') == 'NGO' ? 'selected' : '' }} value="NGO">
                                                NGO
                                            </option>
                                            <option {{ old('organization_type') == 'Others' ? 'selected' : '' }}
                                                value="Others">Others</option>
                                            <option {{ old('organization_type') == 'Agencies' ? 'selected' : '' }}
                                                value="Agencies">Agencies</option>
                                        </select>
                                        @error('organization_type') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- second row -->
                            <div class="row ">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.category') }} <span class="text-danger" >*</span></label>
                                        <select name="industry_type" id=""
                                            class="form-control select2bs4 @error('industry_type') is-invalid @enderror">
                                            @foreach ($categories as $key =>$category)
                                                <option value="{{ $category->name}}"> {{ $category->name}} </option>
                                            @endforeach
                                        </select>
                                        @error('industry_type') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.username') }} <span class="text-danger" >*</span></label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                                            name="username" placeholder="Enter Company User Name"
                                            value="{{ old('username') }}" required>
                                        @error('username') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.email') }} <span class="text-danger" >*</span></label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" placeholder="Enter Company Email" value="{{ old('email') }}" required>
                                        @error('email') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for=""> {{ __('msg.password') }} <span class="text-danger" >*</span> </label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" placeholder="Enter Company password"
                                            value="{{ old('password') }}" required>
                                        @error('password') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6 offset-3 text-center">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-plus"></i> {{ __('msg.create') }} {{ __('msg.company') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('style')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }
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
@stop

@section('script')
    <script src="{{ asset('backend') }}/js/moment.min.js"></script>
    <script src="{{ asset('backend') }}/js/bootstrap-datetimepicker.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/select2/js/select2.full.min.js"></script>
    <script>
        $('#reservation').datetimepicker({
            format: 'YYYY-MM-DD',
        });

        $('#change-visibility').change(function() {
            var value = $(this).prop('checked') == true ? 1 : 0;
            if (value == 1) {
                $('#visibility-mgs').html('Yes, Profile is public now')
            } else {
                $('#visibility-mgs').html('No, Profile is private now')
            }
        })
    </script>
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
@stop
