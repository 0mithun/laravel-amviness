@extends('admin.layouts.app')
@section('title') {{ __('msg.candidate') }} {{ __('msg.create') }} | {{ __('msg.admin') }} @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">{{ __('msg.create') }} {{ __('msg.candidate') }}</h3>
                        <a href="{{ route('module.candidate.index') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-arrow-left"></i>&nbsp; {{ __('msg.back') }}</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('module.candidate.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row ">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for=""> {{ __('msg.name') }} <span class="text-danger" >*</span> </label>
                                        <input type="name" class="form-control @error('name') is-invalid @enderror"
                                            name="name" placeholder="Enter Candidate name" value="{{ old('name') }}" required>
                                        @error('name') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.username') }} <span class="text-danger" >*</span></label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                                            name="username" placeholder="Enter Candidate User Name"
                                            value="{{ old('username') }}" required>
                                        @error('username') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- second row -->
                            <div class="row mt-2">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.password') }} <span class="text-danger" >*</span> </label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" placeholder="Enter Candidate password"
                                            value="{{ old('password') }}" required>
                                        @error('password') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.email') }} <span class="text-danger" >*</span> </label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" placeholder="Enter Candidate Email" value="{{ old('email') }}" required>
                                        @error('email') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.phone') }}  </label>
                                        <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                            name="phone" placeholder="Enter Candidate phone" value="{{ old('phone') }}" required>
                                        @error('phone') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>

                                <div class="col-6" value="{{ old('profession') }}">
                                    <div class="form-group">
                                        <label for="">{{ __('msg.profession') }}</label>
                                        <input type="text" class="form-control @error('profession') is-invalid @enderror"
                                            name="profession" placeholder="Enter candidate profession" required>
                                        @error('profession') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-6 offset-3 text-center">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-plus"></i> {{ __('msg.create') }} {{ __('msg.candidate') }}
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
@stop

@section('script')
    <script src="{{ asset('backend') }}/js/moment.min.js"></script>
    <script src="{{ asset('backend') }}/js/bootstrap-datetimepicker.min.js"></script>
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
@stop
