<?php

namespace Modules\Review\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Review\Entities\Review;
use Illuminate\Contracts\Support\Renderable;
use Modules\Review\Http\Requests\CreateReviewRequest;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::all();
        return view('review::index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('review::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateReviewRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateReviewRequest $request)
    {
        try {
            Review::create($request->validated());

            flashSuccess('Review Successful');
            return back();
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Review $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        return view('review::edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateReviewRequest $request
     * @param Review $review
     * @return \Illuminate\Http\Response
     */
    public function update(CreateReviewRequest $request, Review $review)
    {
        try {
            $review->update($request->validated());

            flashSuccess('Review Updated Successfully');
            return back();
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Review $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        try {
            $review->delete();

            flashSuccess('Review Deleted Successfully');
            return back();
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }
}
