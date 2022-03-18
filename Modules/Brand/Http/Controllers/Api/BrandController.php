<?php

namespace Modules\Brand\Http\Controllers\Api;

use App\Actions\Brand\CreateBrand;
use App\Actions\Brand\DeleteBrand;
use App\Actions\Brand\MultipleDeleteBrand;
use App\Actions\Brand\UpdateBrand;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Brand\Entities\Brand;
use Illuminate\Support\Str;
use Modules\Brand\Actions\CreateBrand as ActionsCreateBrand;
use Modules\Brand\Actions\DeleteBrand as ActionsDeleteBrand;
use Modules\Brand\Actions\MultipleDeleteBrand as ActionsMultipleDeleteBrand;
use Modules\Brand\Actions\UpdateBrand as ActionsUpdateBrand;
use Modules\Brand\Http\Requests\BrandFormRequest;

class BrandController extends Controller
{
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // return  $brands = Brand::latest()->get();

        try {
            $data = Brand::latest()->get();
            return sendSuccessResponse($data);
        } catch (QueryException $e) {
            return sendErrorResponse("Something went wrong", $e->getMessage(), 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param BrandFormRequest $request
     * @return Renderable
     */
    public function store(BrandFormRequest $request)
    {
        $brand = ActionsCreateBrand::create($request);

        if ($brand) {
            return responseSuccess($brand);
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
        return view('brand::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Brand $brand)
    {
        if ($brand) {
            return responseSuccess($brand);
        } else {
            return responseError();
        }
    }

    /**
     * Update the specified resource in storage.
     * @param BrandFormRequest $request
     * @param int $id
     * @return Renderable
     */
    public function update(BrandFormRequest $request, Brand $brand)
    {
        $brand =  ActionsUpdateBrand::update($request, $brand);

        if ($brand) {
            return responseSuccess($brand);
        } else {
            return responseError();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Brand $brand)
    {
        $brand = ActionsDeleteBrand::delete($brand);

        if ($brand) {
            return responseSuccess($brand);
        } else {
            return responseError();
        }
    }

    public function multipleDestroy(Request $request)
    {
        $brand = ActionsMultipleDeleteBrand::delete($request);

        if ($brand) {
            return responseSuccess($brand);
        } else {
            return responseError();
        }
    }
}
