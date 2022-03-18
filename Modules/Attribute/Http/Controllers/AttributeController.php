<?php

namespace Modules\Attribute\Http\Controllers;


use Illuminate\Routing\Controller;
use Modules\Attribute\Entities\Attribute;
use Illuminate\Contracts\Support\Renderable;
use Modules\Attribute\Actions\EditAttribute;
use Modules\Attribute\Actions\CreateAttribute;
use Modules\Attribute\Actions\DeleteAttribute;
use Modules\Attribute\Actions\UpdateAttribute;
use Modules\Attribute\Http\Requests\AttributeFormRequest;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $attributes = Attribute::latest()->paginate(20);

        return view('attribute::attribute.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('attribute::attribute.create');
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
            flashSuccess('Attribute Added Successfully!');
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
        $values = EditAttribute::edit($attribute);

        return view('attribute::attribute.edit', compact(['attribute', 'values']));
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
            flashSuccess('Attribute Updated Successfully!');
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
    public function destroy(Attribute $attribute)
    {
        $attribute = DeleteAttribute::destroy($attribute);

        if ($attribute) {
            flashSuccess('Attribute Deleted Successfully!');
            return back();
        } else {
            flashError();
            return back();
        }
    }
}
