@extends('admin.layouts.app')
@section('title') {{ __('msg.company') }} | {{ __('msg.admin') }} @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;"> {{ __('msg.editCompany') }} </h3>
                        <a href="{{ route('module.company.index') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-arrow-left"></i>&nbsp; {{ __('msg.back') }}</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('module.company.update', $company->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.name') }}</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" placeholder="Enter Company Name" value="{{ $company->name }}"
                                            required>
                                        @error('name') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.organizationtype') }}</label>
                                        <select name="organization_type" id=""
                                            class="form-control @error('organization_type') is-invalid @enderror">
                                            <option value="">Select an Option</option>
                                            <option {{ $company->organization_type == 'Private' ? 'selected' : '' }}
                                                value="Private">Private</option>
                                            <option {{ $company->organization_type == 'Public' ? 'selected' : '' }}
                                                value="Public">Public</option>
                                            <option {{ $company->organization_type == 'Government' ? 'selected' : '' }}
                                                value="Government">Government</option>
                                            <option {{ $company->organization_type == 'NGO' ? 'selected' : '' }}
                                                value="NGO">
                                                NGO
                                            </option>
                                            <option {{ $company->organization_type == 'Others' ? 'selected' : '' }}
                                                value="Others">Others</option>
                                            <option {{ $company->organization_type == 'Agencies' ? 'selected' : '' }}
                                                value="Agencies">Agencies</option>
                                        </select>
                                        @error('organization_type') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.category') }}</label>
                                        <select name="industry_type" id=""
                                            class="form-control select2bs4 @error('industry_type') is-invalid @enderror">
                                            @foreach ($categories as $key => $category)
                                                <option {{ $company->category_id == $category->id ? 'selected' : '' }}
                                                    value="{{ $category->name }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('industry_type') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- second row -->
                            <div class="row ">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.username') }}</label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                                            name="username" placeholder="Enter Company User Name"
                                            value="{{ $company->username }}" required>
                                        @error('username') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.email') }}</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" placeholder="Enter Company Email" value="{{ $company->email }}"
                                            required>
                                        @error('email') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.changepassword') }}</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" placeholder="Enter Company password">
                                        @error('password') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.changelogo') }}</label>
                                        <input type="file" class="form-control p-0 border-0 dropify" name="logo">
                                        @error('logo') <span class="d-block invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.changebanner') }}</label>
                                        <input type="file" class="form-control p-0 border-0 dropify" name="banner">
                                        @error('banner') <span class="d-block invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="change-visibility">Allow in search & listing?</label> <br>
                                        <input value="0" name="visibility" type="hidden" id="checkboxPrimary3">
                                        <div class="icheck-primary d-inline">
                                            <input value="1" name="visibility" type="checkbox" id="change-visibility"
                                                {{ $company->visibility == true ? 'checked' : '' }}>
                                            <label for="change-visibility">
                                                <span id="visibility-mgs">
                                                    {{ $company->visibility == true ? 'Yes, Profile is public now' : 'No, Profile is private now' }}
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fifth  -->
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.phone') }}</label>
                                        <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                            name="phone" placeholder="Enter Company phone" value="{{ $company->phone }}">
                                        @error('phone') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for=""> {{ __('msg.country') }} </label>
                                        <select name="country" id=""
                                            class="form-control @error('country') is-invalid @enderror">
                                            <option value="bd">Bangladesh</option>
                                        </select>

                                        @error('country') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for=""> {{ __('msg.city') }} </label>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror"
                                            name="city" placeholder="Enter Company City Name"
                                            value="{{ $company->city }}">
                                        @error('city') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- fourth row -->
                            <div class="row ">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for=""> {{ __('msg.bio') }} </label>
                                        <textarea name="bio" rows="5" class="form-control">{{ $company->bio }}</textarea>
                                        @error('bio') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.address') }}</label>
                                        <textarea name="address" rows="5" class="form-control"
                                            placeholder="Enter Company address">{{ $company->address }}</textarea>
                                        @error('address') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.mapaddress') }}</label>
                                        <input type="text" class="form-control @error('map_Address') is-invalid @enderror"
                                            name="map_Address" placeholder="Enter Company map_Address"
                                            value="{{ $company->map_Address }}">
                                        @error('map_Address') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('msg.establishedat') }} <span
                                                class="text-danger">(Format:
                                                Year/Month/Day)</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('established_at') is-invalid @enderror"
                                                id="reservation" value="{{ $company->established_at }}"
                                                name="established_at" placeholder="Select Established Date">

                                        </div>
                                        @error('established_at') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.website') }}</label>
                                        <input type="url" class="form-control @error('website') is-invalid @enderror"
                                            name="website" placeholder="Enter Company Website"
                                            value="{{ $company->website }}">
                                        @error('website') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.teamsize') }}</label>
                                        <input type="text" class="form-control @error('team_size') is-invalid @enderror"
                                            name="team_size" placeholder="Enter Company Team Size"
                                            value="{{ $company->team_size }}">
                                        @error('team_size') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for=""> {{ __('msg.facebook') }} </label>
                                        <input type="url" class="form-control @error('facebook') is-invalid @enderror"
                                            name="facebook" placeholder="Enter Company facebook link"
                                            value="{{ $company->social_link->facebook }}">
                                        @error('facebook') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.twitter') }}</label>
                                        <input type="url" class="form-control @error('instagram') is-invalid @enderror"
                                            name="twitter" placeholder="Enter Company twitter link"
                                            value="{{ $company->social_link->twitter }}">
                                        @error('instagram') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.instagram') }}</label>
                                        <input type="url" class="form-control @error('facebook') is-invalid @enderror"
                                            name="instagram" placeholder="Enter Company instagram link"
                                            value="{{ $company->social_link->instagram }}">
                                        @error('facebook') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.youtube') }}</label>
                                        <input type="url" class="form-control @error('youtube') is-invalid @enderror"
                                            name="youtube" placeholder="Enter Company youtube link"
                                            value="{{ $company->social_link->youtube }}">
                                        @error('youtube') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.linkedin') }}</label>
                                        <input type="url" class="form-control @error('linkedin') is-invalid @enderror"
                                            name="linkedin" placeholder="Enter Company linkedin link"
                                            value="{{ $company->social_link->linkedin }}">
                                        @error('linkedin') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.pinterest') }}</label>
                                        <input type="url" class="form-control @error('pintarest') is-invalid @enderror"
                                            name="pintarest" placeholder="Enter Company pintarest link"
                                            value="{{ $company->social_link->pintarest }}">
                                        @error('pintarest') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6 offset-3 text-center">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-plus"></i> {{ __('msg.update') }}
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
    <link rel="stylesheet" href="{{ asset('backend') }}/css/dropify.min.css" />
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
    <script src="{{ asset('backend') }}/js/dropify.min.js"></script>
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
        $('.dropify').dropify();
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
