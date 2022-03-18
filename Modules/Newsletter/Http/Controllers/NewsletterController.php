<?php

namespace Modules\Newsletter\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Newsletter\Entities\Newsletter;
use Illuminate\Contracts\Support\Renderable;
use Modules\Newsletter\Actions\CreateNewsletter;
use Modules\Newsletter\Actions\DeleteNewsletter;
use Modules\Newsletter\Actions\UpdateNewsletter;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
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
        return view('newsletter::index', compact('newsletters'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
        return view('newsletter::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param NewsletterFormRequest $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $newslatter = Newsletter::create($request->all());
        return back();


        // return $request;
        $newsletter = CreateNewsletter::create($request);

        if ($newsletter) {
            flashSuccess('Newsletter Created Successfully');
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
        return view('newsletter::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Newsletter $newsletter)
    {
        return view('newsletter::edit', compact('newsletter'));
    }

    /**
     * Update the specified resource in storage.
     * @param NewsletterFormRequest $request
     * @param int $id
     * @return Renderable
     */
    public function update(NewsletterFormRequest $request, Newsletter $newsletter)
    {
        $newsletter = UpdateNewsletter::update($request, $newsletter);

        if ($newsletter) {
            flashSuccess('newsletter Updated Successfully');
            return redirect(route('module.newsletter.index'));
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
    public function destroy(Newsletter $newsletter)
    {
        $newsletter = DeleteNewsletter::delete($newsletter);

        if ($newsletter) {
            flashSuccess('Newsletter Deleted Successfully');
            return redirect(route('module.newsletter.index'));
        } else {
            flashError();
            return back();
        }
    }
}
