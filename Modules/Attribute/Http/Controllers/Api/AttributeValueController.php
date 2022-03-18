<?php

namespace Modules\Attribute\Http\Controllers\Api;

use App\Actions\Attribute\CreateAttributeValue;
use App\Actions\Attribute\DeleteAttributeValue;
use App\Actions\Attribute\UpdateAttributeValue;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Attribute\Entities\Attribute;
use Modules\Attribute\Entities\AttributeValue;
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

        $data = [$attribute, $values, $attributeValue];

        if ($data) {
            return responseSuccess($data);
        }else{
            return responseError();
        }
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
            return responseSuccess($value);
        }else{
            return responseError();
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
        $value = $this->index($value->attribute, $value);

        if ($value) {
            return responseSuccess($value);
        }else{
            return responseError();
        }
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
            return responseSuccess($value);
        }else{
            return responseError();
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
            return responseSuccess($value);
        }else{
            return responseError();
        }
    }
}
