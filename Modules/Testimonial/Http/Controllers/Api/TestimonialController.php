<?php

namespace Modules\Testimonial\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Actions\Testimonial\CreateTestimonial;
use App\Actions\Testimonial\DeleteTestimonial;
use App\Actions\Testimonial\UpdateTestimonial;
use Modules\Testimonial\Entities\Testimonial;
use Modules\Testimonial\Http\Requests\TestimonialFormRequest;

class TestimonialController extends Controller
{
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $testimonials = Testimonial::latest()->get();

        if ($testimonials) {
            return responseSuccess($testimonials);
        }else{
            return responseError();
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(TestimonialFormRequest $request)
    {
        $testimonial = CreateTestimonial::create($request);

        if ($testimonial) {
            return responseSuccess($testimonial);
        }else{
            return responseError();
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('testimonial::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Testimonial $testimonial)
    {
        if ($testimonial) {
            return responseSuccess($testimonial);
        }else{
            return responseError();
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(TestimonialFormRequest $request, Testimonial $testimonial)
    {
        $testimonial = UpdateTestimonial::update($request, $testimonial);

        if ($testimonial) {
            return responseSuccess($testimonial);
        }else{
            return responseError();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial = DeleteTestimonial::delete($testimonial);

        if ($testimonial) {
            return responseSuccess($testimonial);
        }else{
            return responseError();
        }
    }
}
