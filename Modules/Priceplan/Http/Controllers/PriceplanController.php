<?php

namespace Modules\Priceplan\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Priceplan\Actions\StatusChange;
use Illuminate\Contracts\Support\Renderable;
use Modules\Priceplan\Actions\CreatePriceplan;
use Modules\Priceplan\Actions\DeletePriceplan;
use Modules\Priceplan\Actions\UpdatePriceplan;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\Priceplan\Entities\PlanFeature;
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
        return view('priceplan::index', compact('priceplans'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('priceplan::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param PriceplanFormRequest $request
     * @return Renderable
     */
    public function store(PriceplanFormRequest $request)
    {
        $priceplan = CreatePriceplan::create($request);

        // plan features store
        foreach ($request->features as $feature) {
            PlanFeature::create([
                'priceplan_id' => $priceplan->id,
                'name' => $feature,
            ]);
        }

        if ($priceplan) {
            flashSuccess('Priceplan Created Successfully');
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
        return view('priceplan::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Priceplan $priceplan)
    {
        return view('priceplan::edit', compact('priceplan'));
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
            flashSuccess('Priceplan Updated Successfully');
            return redirect(route('module.priceplan.index'));
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
    public function destroy(Priceplan $priceplan)
    {
        $priceplan = DeletePriceplan::delete($priceplan);

        if ($priceplan) {
            flashSuccess('Priceplan Deleted Successfully');
            return redirect(route('module.priceplan.index'));
        } else {
            flashError();
            return back();
        }
    }

    public function status_change(Request $request)
    {
        $priceplan = StatusChange::status($request);

        if ($priceplan) {
            if ($request->status == 1) {
                return response()->json(['message' => 'Priceplan Activated Successfully']);
            } else {
                return response()->json(['message' => 'Priceplan Inactivated Successfully']);
            }
        } else {
            flashError();
            return back();
        }
    }
}
