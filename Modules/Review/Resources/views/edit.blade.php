@extends('layouts.admin')
@section('title') Create Reivew | Admin @endsection
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    @if (session()->has('message'))
                        <p class="alert alert-success">{{ session()->get('message') }}</p>
                    @endif

                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Create Review</h3>
                        <a href="{{ route('review.index') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-arrow-left"></i>&nbsp;Back</a>
                    </div>
                    <div class="row pt-3 pb-4">
                        <div class="col-md-6 offset-md-3">
                            <form class="form-horizontal" action="{{ route('review.update', $review->id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')

                                <input type="hidden" id="rated" value="{{ $review->rating }}">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input value="{{ $review->name }}" name="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Enter Name">
                                        @error('name') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Comment</label>

                                    <div class="col-sm-9">
                                        <textarea name="comment" placeholder="Enter Comment"
                                            class="form-control @error('comment') is-invalid @enderror">{{ $review->comment }}</textarea>
                                        @error('comment') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Star</label>
                                    <div id="rateYo"></div>
                                    <input type="hidden" name="stars" id="rating"
                                        class="form-control @error('rating') is-invalid @enderror">
                                    @error('rating') <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span> @enderror
                                </div>

                                <div class="form-group row">
                                    <div class="offset-sm-3 col-sm-4">
                                        <button type="submit" class="btn btn-success"><i
                                                class="fas fa-plus"></i>&nbsp;Update</button>
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

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#rateYo").rateYo({
                starWidth: '30px',
                fullStar: true,
                mormalFill: 'yellow',
                ratedFill: 'orange',
                rating: {{ $review->stars }},
                onSet: function(rating, rateYoInstance) {
                    $('#rating').val(rating);
                }
            });
        });
    </script>
@endsection
