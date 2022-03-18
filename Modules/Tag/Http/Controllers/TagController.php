<?php

namespace Modules\Tag\Http\Controllers;


use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Modules\Tag\Entities\Tag;
use Illuminate\Routing\Controller;
use Modules\Tag\Actions\CreateTag;
use Modules\Tag\Actions\DeleteTag;
use Modules\Tag\Actions\UpdateTag;
use Modules\Tag\Actions\MultipleDeleteTag;
use Illuminate\Contracts\Support\Renderable;
use Modules\Tag\Http\Requests\TagFormRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;

class TagController extends Controller
{
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $tags = Tag::latest()->get();
        return view('tag::index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('tag::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(TagFormRequest $request)
    {
        $tag = CreateTag::create($request);

        if ($tag) {
            flashSuccess('Tag Added Successfully');
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
        return view('tag::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Tag $tag)
    {
        return view('tag::edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(TagFormRequest $request, Tag $tag)
    {
        $tag = UpdateTag::update($request, $tag);

        if ($tag) {
            flashSuccess('Tag Updated Successfully');
            return redirect(route('module.tag.index'));
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
    public function destroy(Tag $tag)
    {
        $tag = DeleteTag::delete($tag);

        if ($tag) {
            flashSuccess('Tag Deleted Successfully');
            return back();
        } else {
            flashError();
            return back();
        }
    }

    public function multipleDestroy(Request $request)
    {
        $tag = MultipleDeleteTag::delete($request);

        if ($tag) {
            return response()->json(['message' => 'Selected Tag Items Deleted Successfully!']);
        } else {
            flashError();
            return back();
        }
    }
}
