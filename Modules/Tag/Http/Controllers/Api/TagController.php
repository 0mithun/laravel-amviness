<?php

namespace Modules\Tag\Http\Controllers\Api;

use App\Actions\Tag\CreateTag;
use App\Actions\Tag\DeleteTag;
use App\Actions\Tag\MultipleDeleteTag;
use App\Actions\Tag\UpdateTag;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Tag\Entities\Tag;
use Modules\Tag\Http\Requests\TagFormRequest;

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

        if ($tags) {
            return responseSuccess($tags);
        }else{
            return responseError();
        }
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
            return responseSuccess($tag);
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
        return view('tag::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Tag $tag)
    {
        if ($tag) {
            return responseSuccess($tag);
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
    public function update(TagFormRequest $request, Tag $tag)
    {
        $tag = UpdateTag::update($request, $tag);

        if ($tag) {
            return responseSuccess($tag);
        }else{
            return responseError();
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
            return responseSuccess($tag);
        }else{
            return responseError();
        }
    }

    public function multipleDestroy(Request $request){
        $tag = MultipleDeleteTag::delete($request);

        if ($tag) {
            return responseSuccess($tag);
        }else{
            return responseError();
        }
    }
}
