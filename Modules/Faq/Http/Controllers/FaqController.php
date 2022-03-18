<?php

namespace Modules\Faq\Http\Controllers;

use App\Actions\Faq\CreateFaq;
use Modules\Faq\Entities\Faq;
use Illuminate\Routing\Controller;
use Modules\Faq\Actions\DeleteFaq;
use Modules\Faq\Actions\UpdateFaq;
use Illuminate\Contracts\Support\Renderable;
use Modules\Faq\Http\Requests\FaqFormRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;

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
        return view('faq::index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('faq::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param FaqFormRequest $request
     * @return Renderable
     */
    public function store(FaqFormRequest $request)
    {
        $faq = Faq::create($request->all());

        if ($faq) {
            flashSuccess('Faq Created Successfully');
            return back();
        } else {
            flashError();
            return back();
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
        return view('faq::edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     * @param FaqFormRequest $request
     * @param int $id
     * @return Renderable
     */
    public function update(FaqFormRequest $request, Faq $faq)
    {
        $faq = UpdateFaq::update($request, $faq);

        if ($faq) {
            flashSuccess('Faq Updated Successfully');
            return redirect(route('module.faq.index'));
        } else {
            flashError();
            return back();
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
            flashSuccess('Faq Deleted Successfully');
            return redirect(route('module.faq.index'));
        } else {
            flashError();
            return back();
        }
    }
}
