@extends('layouts.admin')
@section('title') {{ __('msg.candidate') }} | {{ __('msg.admin') }} @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;"> {{ __('msg.candidate') }} </h3>
                        <a href="{{ route('module.candidate.index') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-arrow-left"></i>&nbsp; {{ __('msg.back') }}</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('module.candidate.update', $candidate->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row ">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for=""> {{ __('msg.name') }} </label>
                                        <input type="name" class="form-control @error('name') is-invalid @enderror"
                                            name="name" placeholder="Enter Candidate name" value="{{ $candidate->name }}">
                                        @error('name') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.username') }}</label>
                                        <input type="text"  class="form-control @error('username') is-invalid @enderror"
                                            name="username" placeholder="Enter Candidate User Name"
                                            value="{{ $candidate->username }}">
                                        @error('username') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.email') }}</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" placeholder="Enter Candidate Email"
                                            value="{{ $candidate->email }}">
                                        @error('email') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>

                            </div>

                            <!-- second row -->
                            <div class="row mt-2">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.changepassword') }}</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" placeholder="Enter Candidate password">
                                        @error('password') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.phone') }}</label>
                                        <input type="tel"  class="form-control @error('phone') is-invalid @enderror"
                                            name="phone" placeholder="Enter Candidate phone"
                                            value="{{ $candidate->phone }}">
                                        @error('phone') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.profession') }}</label>
                                        <input type="text"  class="form-control @error('profession') is-invalid @enderror"
                                            name="profession" placeholder="Enter candidate profession"
                                            value="{{ $candidate->profession }}">
                                        @error('profession') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.avater') }}</label>
                                        <input type="file" class="form-control border-0 p-0 dropify" name="avatar">
                                        @error('avatar') <span class="text-danger">
                                            <strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.file') }}</label>
                                        <input type="file" class="form-control border-0 p-0 dropify" name="file">
                                        @error('file') <span class="text-danger">
                                            <strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="change-visibility">Allow in search & listing?</label> <br>
                                        <input value="0" name="visibility" type="hidden" id="checkboxPrimary3">
                                        <div class="icheck-primary d-inline">
                                            <input value="1" name="visibility" type="checkbox" id="change-visibility"
                                                {{ $candidate->visibility == true ? 'checked' : '' }}>
                                            <label for="change-visibility">
                                                <span id="visibility-mgs">
                                                    {{ $candidate->visibility == true ? 'Yes, Profile is public now' : 'No, Profile is private now' }}
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.website') }}</label>
                                        <input type="url"  class="form-control @error('website') is-invalid @enderror"
                                            name="website" placeholder="Enter Candidate Website"
                                            value="{{ $candidate->website }}">
                                        @error('website') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.education') }}</label>
                                        <input type="text"  class="form-control @error('education') is-invalid @enderror"
                                            name="education" placeholder="Enter candidate education"
                                            value="{{ $candidate->education }}">
                                        @error('education') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror

                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.experience') }}</label>
                                        <input type="text"  class="form-control @error('experience') is-invalid @enderror"
                                            name="experience" placeholder="Enter candidate experience"
                                            value="{{ $candidate->experience }}">
                                        @error('experience') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror

                                    </div>
                                </div>
                            </div>

                            <!-- fourth row -->
                            <div class="row ">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.bio') }}</label>
                                        <textarea name="bio" rows="5"
                                            class="form-control">{{ $candidate->bio }}</textarea>
                                        @error('bio') <span class="invalid-feedback d-block"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.address') }}</label>
                                        <textarea name="address" rows="5" class="form-control"
                                            placeholder="Enter Candidate address">{{ $candidate->address }}</textarea>
                                        @error('address') <span class="invalid-feedback d-block"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- Fifth  -->
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.mapaddress') }}</label>
                                        <input type="text"  class="form-control @error('map_Address') is-invalid @enderror"
                                            name="map_Address" placeholder="Enter Candidate map_Address"
                                            value="{{ $candidate->map_Address }}">
                                        @error('map_Address') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.country') }}</label>
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
                                        <label for="">{{ __('msg.city') }}</label>
                                        <input type="text"  class="form-control @error('city') is-invalid @enderror"
                                            name="city" placeholder="Enter Candidate City Name"
                                            value="{{ $candidate->city }}">
                                        @error('city') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for=""> {{ __('msg.facebook') }} </label>
                                        <input type="url"  class="form-control @error('facebook') is-invalid @enderror"
                                            name="facebook" placeholder="Enter Candidate facebook link"
                                            value="{{ $candidate->social_link->facebook }}">
                                        @error('facebook') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.twitter') }}</label>
                                        <input type="url"  class="form-control @error('instagram') is-invalid @enderror"
                                            name="twitter" placeholder="Enter Candidate twitter link"
                                            value="{{ $candidate->social_link->twitter }}">
                                        @error('instagram') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.instagram') }}</label>
                                        <input type="url"  class="form-control @error('facebook') is-invalid @enderror"
                                            name="instagram" placeholder="Enter Candidate instagram link"
                                            value="{{ $candidate->social_link->instagram }}">
                                        @error('facebook') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.youtube') }}</label>
                                        <input type="url"  class="form-control @error('youtube') is-invalid @enderror"
                                            name="youtube" placeholder="Enter Candidate youtube link"
                                            value="{{ $candidate->social_link->youtube }}">
                                        @error('youtube') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.linkedin') }}</label>
                                        <input type="url" class="form-control @error('linkedin') is-invalid @enderror"
                                            name="linkedin" placeholder="Enter Candidate linkedin link"
                                            value="{{ $candidate->social_link->linkedin }}">
                                        @error('linkedin') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.pinterest') }}</label>
                                        <input type="url" class="form-control @error('pintarest') is-invalid @enderror"
                                            name="pintarest" placeholder="Enter Candidate pintarest link"
                                            value="{{ $candidate->social_link->pintarest }}">
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
    <link rel="stylesheet" href="{{ asset('backend') }}/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/css/dropify.min.css" />
@stop

@section('script')
    <script src="{{ asset('backend') }}/js/moment.min.js"></script>
    <script src="{{ asset('backend') }}/js/bootstrap-datetimepicker.min.js"></script>
    <script src="{{ asset('backend') }}/js/dropify.min.js"></script>
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
@stop
