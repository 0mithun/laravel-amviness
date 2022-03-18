@extends('admin.layouts.app')

@section('title') {{ __('msg.companylist') }} | Admin @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;"> {{ __('msg.companylist') }} </h3>
                        <a href="{{ route('module.company.create') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-plus"></i>&nbsp; {{ __('msg.addcompany') }} </a>


                        <form action="{{ route('module.company.listing.change') }}" method="post"
                            id="comapny_list_view_form">
                            @csrf
                            @if (session('company_list_view'))
                                <input type="hidden" name="company_list_view" value="0">
                            @else
                                <input type="hidden" name="company_list_view" value="1">
                            @endif
                        </form>
                        <a onclick="$('#comapny_list_view_form').submit()"
                            class="btn btn-lg {{ session('company_list_view') ? 'bg-primary text-light' : 'bg-secondary text-light' }}  float-right d-flex align-items-center justify-content-center mr-2 "
                            href="javascript:void(0)" role="button"
                            title="{{ session('company_list_view') ? 'List View' : 'Card View' }}">
                            <i class="fas fa-list-ul"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        @if (session('company_list_view'))
                            <div class="row">
                                @foreach ($companies as $company)
                                    <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch flex-column">
                                        <div class="card bg-light d-flex flex-fill">
                                            <div class="card-header text-muted border-bottom-0">
                                                {{-- Digital Strategist --}}
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h2 class="lead"><b>{{ $company->name }}</b></h2>
                                                        <p class="text-muted text-sm"><b>About: </b>
                                                            {{ Str::limit($company->bio, 50) }} </p>
                                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                                            <li class="small"><span class="fa-li"><i
                                                                        class="fas fa-lg fa-user"></i></span>
                                                                <b>Username:</b>{{ $company->username }}
                                                            </li>
                                                            <li class="small"><span class="fa-li"><i
                                                                        class="fas fa-envelope"></i></span><b>Email:</b>{{ $company->email }}
                                                            </li>
                                                            <li class="small"><span class="fa-li"><i
                                                                        class="fas fa-phone"></i></span><b>Phone:</b>{{ $company->phone }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-5 text-center">
                                                        <img src="{{ asset($company->logo) }}" alt="user-avatar"
                                                            class="rounded img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-right  d-inline">
                                                    <a href="{{ route('module.company.show', $company->username) }}"
                                                        class="btn btn-sm btn-success">
                                                        <i class="fas fa-eye"></i> Show
                                                    </a>
                                                    <a href="{{ route('module.company.edit', $company->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="fas fa-user"></i> Edit
                                                    </a>
                                                    <form action="{{ route('module.company.destroy', $company->id) }}"
                                                        method="POST" class="d-inline">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit"
                                                            onclick="return confirm('Are you sure you want to delete this item?');"
                                                            class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                    <a href="#">
                                                        <label class="switch ">
                                                            <input data-id="{{ $company->id }}" type="checkbox"
                                                                class="success toggle-switch"
                                                                {{ $company->status == 1 ? 'checked' : '' }}>
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                            role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr role="row" class="text-center">
                                                    <th class="sorting_desc" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Rendering engine: activate to sort column ascending"
                                                        aria-sort="descending" width="3%"> {{ __('msg.sl') }} </th>
                                                    <th class="sorting_desc" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Rendering engine: activate to sort column ascending"
                                                        aria-sort="descending" width="10%">{{ __('msg.logo') }}</th>
                                                    <th class="sorting_desc" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Rendering engine: activate to sort column ascending"
                                                        aria-sort="descending">{{ __('msg.name') }}</th>
                                                    <th class="sorting_desc" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Rendering engine: activate to sort column ascending"
                                                        aria-sort="descending">{{ __('msg.type') }}</th>
                                                    <th class="sorting_desc" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Rendering engine: activate to sort column ascending"
                                                        aria-sort="descending">{{ __('msg.country') }}</th>
                                                    <th class="sorting_desc" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Rendering engine: activate to sort column ascending"
                                                        aria-sort="descending" width="10%"> {{ __('msg.ststus') }} </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                        colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending"
                                                        width="130px"> {{ __('msg.action') }} </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($companies as $index => $company)
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1 text-center">{{ $loop->index + 1 }}</td>
                                                        <td class="sorting_1 text-center">
                                                            <img class="rounded" src="{{ asset($company->logo) }}" alt=""
                                                                width="80px">
                                                        </td>
                                                        <td class="sorting_1 text-center">{{ $company->name }}</td>
                                                        <td class="sorting_1 text-center">
                                                            {{ $company->organization_type }}
                                                        </td>
                                                        <td class="sorting_1 text-center">{{ $company->country }}</td>
                                                        <td class="text-center">
                                                            <div>
                                                                <label class="switch ">
                                                                    <input data-id="{{ $company->id }}" type="checkbox"
                                                                        class="success toggle-switch"
                                                                        {{ $company->status == 1 ? 'checked' : '' }}>
                                                                    <span class="slider round"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <th class="sorting_1 text-center">
                                                            <a data-toggle="tooltip" data-placement="top"
                                                                title="Show Company"
                                                                href="{{ route('module.company.show', $company->username) }}"
                                                                class="btn bg-success"><i class="fas fa-eye"></i></a>
                                                            <a data-toggle="tooltip" data-placement="top"
                                                                title="Edit Company"
                                                                href="{{ route('module.company.edit', $company->id) }}"
                                                                class="btn bg-info"><i class="fas fa-edit"></i></a>
                                                            <form
                                                                action="{{ route('module.company.destroy', $company->id) }}"
                                                                method="POST" class="d-inline">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button data-toggle="tooltip" data-placement="top"
                                                                    title="Delete company"
                                                                    onclick="return confirm('Are you sure you want to delete this item?');"
                                                                    class="btn bg-danger"><i
                                                                        class="fas fa-trash"></i></button>
                                                            </form>
                                                        </th>
                                                    </tr>

                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 35px;
            height: 19px;
            /* width: 60px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        height: 34px; */
        }

        /* Hide default HTML checkbox */
        .switch input {
            display: none;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 15px;
            width: 15px;
            left: 3px;
            bottom: 2px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input.success:checked+.slider {
            background-color: #28a745;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(15px);
            -ms-transform: translateX(15px);
            transform: translateX(15px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

    </style>
@endsection

@section('script')
    <script src="{{ asset('backend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
        $('.toggle-switch').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('company.status.change') }}',
                data: {
                    'status': status,
                    'id': id
                },
                success: function(response) {
                    toastr.success(response.message, 'Success');
                }
            });
        })
    </script>
@endsection
