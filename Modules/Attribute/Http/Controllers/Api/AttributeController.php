<?php

namespace Modules\Attribute\Http\Controllers\Api;

use App\Actions\Attribute\CreateAttribute;
use App\Actions\Attribute\DeleteAttribute;
use App\Actions\Attribute\UpdateAttribute;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Modules\Attribute\Entities\Attribute;
use Modules\Attribute\Http\Requests\AttributeFormRequest;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $attributes = Attribute::latest()->get();

        if ($attributes) {
            return responseSuccess($attributes);
        }else{
            return responseError();
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param AttributeFormRequest $request
     * @return Renderable
     */
    public function store(AttributeFormRequest $request)
    {
        $attribute = CreateAttribute::create($request);

        if ($attribute) {
            return responseSuccess($attribute);
        }else{
            return responseError();
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Attribute $attribute)
    {
        return view('attribute::attribute.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Attribute $attribute)
    {
        if ($attribute) {
            return responseSuccess($attribute->load('values'));
        }else{
            return responseError();
        }
    }

    /**
     * Update the specified resource in storage.
     * @param AttributeFormRequest $request
     * @param int $id
     * @return Renderable
     */
    public function update(AttributeFormRequest $request, Attribute $attribute)
    {
        $attribute = UpdateAttribute::update($request, $attribute);

        if ($attribute) {
            return responseSuccess($attribute);
        }else{
            return responseError();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Attribute $attribute)
    {
        $attribute = DeleteAttribute::destroy($attribute);

        if ($attribute) {
            return responseSuccess($attribute);
        }else{
            return responseError();
        }
    }
}
