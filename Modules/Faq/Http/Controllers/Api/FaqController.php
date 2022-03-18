<?php

namespace Modules\Faq\Http\Controllers\Api;

use App\Actions\Faq\CreateFaq;
use App\Actions\Faq\UpdateFaq;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Modules\Faq\Actions\DeleteFaq;
use Modules\Faq\Entities\Faq;
use Modules\Faq\Http\Requests\FaqFormRequest;

class FaqController extends Controller
{
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $faqs = Faq::latest()->get();

        if ($faqs) {
            return responseSuccess($faqs);
        } else {
            return responseError();
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param FaqFormRequest $request
     * @return Renderable
     */
    public function store(FaqFormRequest $request)
    {
        $faq = CreateFaq::create($request);

        if ($faq) {
            return responseSuccess($faq);
        } else {
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
        return view('faq::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Faq $faq)
    {
        if ($faq) {
            return responseSuccess($faq);
        } else {
            return responseError();
        }
    }

    /**
     * Update the specified resource in storage.
     * @param faqFormRequest $request
     * @param int $id
     * @return Renderable
     */
    public function update(FaqFormRequest $request, Faq $faq)
    {
        $faq = UpdateFaq::update($request, $faq);

        if ($faq) {
            return responseSuccess($faq);
        } else {
            return responseError();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Faq $faq)
    {
        $faq = DeleteFaq::delete($faq);

        if ($faq) {
            return responseSuccess($faq);
        } else {
            return responseError();
        }
    }
}
