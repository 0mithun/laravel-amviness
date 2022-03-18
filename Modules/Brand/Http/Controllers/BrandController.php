<?php

namespace Modules\Brand\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Brand\Entities\Brand;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Brand\Http\Requests\BrandFormRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\Brand\Repositories\BrandRepositories;

class BrandController extends Controller
{
    use ValidatesRequests;

    protected $brand;
    public function __construct(BrandRepositories $brand)
    {
        $this->brand = $brand;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = $this->brand->all();
        return view('brand::index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BrandFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandFormRequest $request)
    {
        try {
            $this->brand->store($request);

            flashSuccess('Brand Added Successfully');
            return back();
        } catch (\Throwable $th) {
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
        return view('brand::show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('brand::edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BrandFormRequest $request
     * @param Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function update(BrandFormRequest $request, Brand $brand)
    {
        try {
            $this->brand->update($request, $brand);

            flashSuccess('Brand Updated Successfully');
            return redirect(route('module.brand.index'));
        } catch (\Throwable $th) {
            flashError();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        try {
            $this->brand->destroy($brand);

            flashSuccess('Brand Deleted Successfully');
            return redirect(route('module.brand.index'));
        } catch (\Throwable $th) {
            flashError();
            return back();
        }
    }

    /**
     * Remove multiple resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function multipleDestroy(Request $request)
    {
        try {
            $this->brand->multipleDestroy($request);

            return responseSuccess('Selected Brand Items Deleted Successfully!');
        } catch (\Throwable $th) {
            return responseError();
        }
    }
}
