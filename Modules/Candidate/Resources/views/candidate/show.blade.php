@extends('layouts.admin')
@section('title') {{ __('msg.candidate') }} | {{ __('msg.admin') }} @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">View <b>{{ $candidate->name }}'s</b> Details
                        </h3>
                        <a href="{{ route('module.candidate.index') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-arrow-left"></i>&nbsp;{{ __('msg.back') }}</a>
                    </div>
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="width:25%">
                                            {{ __('msg.name') }} :
                                        </th>
                                        <td>{{ $candidate->name }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:25%">
                                            {{ __('msg.username') }} :
                                        </th>
                                        <td>{{ $candidate->username }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:25%">
                                            {{ __('msg.email') }} :
                                        </th>
                                        <td>{{ $candidate->email }}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:25%">
                                            {{ __('msg.website') }} :
                                        </th>
                                        <td><span class="badge badge-info">{{ $candidate->website }}</span></td>
                                    </tr>
                                    <tr>
                                        <th style="width:25%">
                                            {{ __('msg.education') }} :
                                        </th>
                                        <td>{{ $candidate->education }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:25%">
                                            {{ __('msg.experience') }} :
                                        </th>
                                        <td>{{ $candidate->experience }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:25%">
                                            {{ __('msg.profession') }} :
                                        </th>
                                        <td>{{ $candidate->profession }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:25%">
                                            {{ __('msg.visibility') }}:
                                        </th>
                                        <td>{{ $candidate->visibility }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:25%">
                                            {{ __('msg.country') }} :
                                        </th>
                                        <td>{{ $candidate->country }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:25%">
                                            {{ __('msg.city') }} :
                                        </th>
                                        <td>{{ $candidate->city }}</td>
                                    </tr>

                                    <tr>
                                        <th style="width:25%">
                                            {{ __('msg.address') }} :
                                        </th>
                                        <td>{{ $candidate->address }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:25%">
                                            {{ __('msg.mapaddress') }} :
                                        </th>
                                        <td>{{ $candidate->map_Address }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:25%">
                                            {{ __('msg.phone') }} :
                                        </th>
                                        <td>{{ $candidate->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:25%">
                                            {{ __('msg.bio') }} :
                                        </th>
                                        <td>{{ $candidate->bio }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width:25%">
                                            {{ __('msg.avater') }} :
                                        </th>
                                        <td><img src="{{ asset($candidate->avatar) }}" alt="" width="100px"></td>
                                    </tr>
                                    <tr>
                                        <th style="width:25%">
                                            {{ __('msg.file') }} :
                                        </th>
                                        <td><img src="{{ asset($candidate->file) }}" alt="" width="200px"></td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('msg.facebook') }} : </th>
                                        <td>{{ $candidate->social_link->facebook ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('msg.twitter') }} : </th>
                                        <td>{{ $candidate->social_link->twitter ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('msg.linkedin') }} : </th>
                                        <td>{{ $candidate->social_link->linkedin ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('msg.instagram') }} : </th>
                                        <td>{{ $candidate->social_link->instagram ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('msg.pinterest') }} : </th>
                                        <td>{{ $candidate->social_link->pintarest ?? '' }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
