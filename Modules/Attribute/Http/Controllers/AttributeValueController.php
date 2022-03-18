<?php

namespace Modules\Attribute\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Attribute\Entities\Attribute;
use Illuminate\Contracts\Support\Renderable;
use Modules\Attribute\Entities\AttributeValue;
use Modules\Attribute\Actions\CreateAttributeValue;
use Modules\Attribute\Actions\DeleteAttributeValue;
use Modules\Attribute\Actions\UpdateAttributeValue;
use Modules\Attribute\Http\Requests\AttributeValueFormRequest;

class AttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Attribute $attribute, $attributeValue = null)
    {
        $values = $attribute->values;

        return view('attribute::value.index', compact(['attribute', 'values', 'attributeValue']));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('attribute::value.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(AttributeValueFormRequest $request)
    {
        $value = CreateAttributeValue::create($request);

        if ($value) {
            flashSuccess('Attribute Value Created Successfully');
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
    public function show(AttributeValue $value)
    {
        return view('attribute::value.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(AttributeValue $value)
    {
        return $this->index($value->attribute, $value);
    }

    /**
     * Update the specified resource in storage.
     * @param AttributeValueFormRequest $request
     * @param int $id
     * @return Renderable
     */
    public function update(AttributeValueFormRequest $request, AttributeValue $value)
    {
        $value = UpdateAttributeValue::update($request, $value);

        if ($value) {
            flashSuccess('Attribute Value Updated Successfully');
            return back();
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
    public function destroy(AttributeValue $value)
    {
        $value = DeleteAttributeValue::destroy($value);

        if ($value) {
            flashSuccess('Attribute Value Deleted Successfully');
            return back();
        } else {
            flashError();
            return back();
        }
    }
}
