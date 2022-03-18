<?php

namespace Modules\Newsletter\Http\Controllers\Api;

use App\Actions\Newsletter\CreateNewsletter;
use App\Actions\Newsletter\DeleteNewsletter;
use App\Actions\Newsletter\UpdateNewsletter;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Modules\Newsletter\Entities\Newsletter;
use Modules\Newsletter\Http\Requests\NewsletterFormRequest;

class NewsletterController extends Controller
{
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $newsletters = Newsletter::latest()->get();

        if ($newsletters) {
            return responseSuccess($newsletters);
        } else {
            return responseError();
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param NewsletterFormRequest $request
     * @return Renderable
     */
    public function store(NewsletterFormRequest $request)
    {
        $newsletter = CreateNewsletter::create($request);

        if ($newsletter) {
            return responseSuccess($newsletter);
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
        return view('newsletter::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Newsletter $newsletter)
    {
        if ($newsletter) {
            return responseSuccess($newsletter);
        } else {
            return responseError();
        }
    }

    /**
     * Update the specified resource in storage.
     * @paraFormRequest $request
     * @param int $id
     * @return Renderable
     */
    public function update(NewsletterFormRequest $request, Newsletter $newsletter)
    {
        $newsletter = UpdateNewsletter::update($request, $newsletter);

        if ($newsletter) {
            return responseSuccess($newsletter);
        } else {
            return responseError();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Newsletter $newsletter)
    {
        $newsletter = DeleteNewsletter::delete($newsletter);

        if ($newsletter) {
            return responseSuccess($newsletter);
        } else {
            return responseError();
        }
    }
}
