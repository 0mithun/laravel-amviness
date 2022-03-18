@extends('attribute::layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="card-header">
                    <h3 class="card-title" style="line-height: 36px;">Attribute Edit</h3>
                    <a href="{{ route('module.attributes.index') }}" class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="bg-white shadow-sm rounded py-3 px-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            @yield('tab-nav')
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        @yield('tab-content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
