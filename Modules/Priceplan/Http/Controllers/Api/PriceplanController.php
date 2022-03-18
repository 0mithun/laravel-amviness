<?php

namespace Modules\Priceplan\Http\Controllers\Api;

use App\Actions\Priceplan\CreatePriceplan;
use App\Actions\Priceplan\DeletePriceplan;
use App\Actions\Priceplan\UpdatePriceplan;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Modules\Priceplan\Entities\Priceplan;
use Modules\Priceplan\Http\Requests\PriceplanFormRequest;

class PriceplanController extends Controller
{
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $priceplans = Priceplan::latest()->get();

        if ($priceplans) {
            return responseSuccess($priceplans);
        } else {
            return responseError();
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param PriceplanFormRequest $request
     * @return Renderable
     */
    public function store(PriceplanFormRequest $request)
    {
        $priceplan = CreatePriceplan::create($request);

        if ($priceplan) {
            return responseSuccess($priceplan);
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
        return view('priceplan::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Priceplan $priceplan)
    {
        if ($priceplan) {
            return responseSuccess($priceplan);
        } else {
            return responseError();
        }
    }

    /**
     * Update the specified resource in storage.
     * @param PriceplanFormRequest $request
     * @param int $id
     * @return Renderable
     */
    public function update(PriceplanFormRequest $request, Priceplan $priceplan)
    {
        $priceplan = UpdatePriceplan::update($request, $priceplan);

        if ($priceplan) {
            return responseSuccess($priceplan);
        } else {
            return responseError();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Priceplan $priceplan)
    {
        $priceplan = DeletePriceplan::delete($priceplan);

        if ($priceplan) {
            return responseSuccess($priceplan);
        } else {
            return responseError();
        }
    }
}
