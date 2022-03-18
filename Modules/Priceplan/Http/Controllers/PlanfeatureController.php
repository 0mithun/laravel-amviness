<?php

namespace Modules\Priceplan\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Priceplan\Actions\SortingPriceplan;
use Modules\Priceplan\Entities\PlanFeature;
use Modules\Priceplan\Entities\Priceplan;

class PlanfeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Priceplan $priceplan)
    {
        $priceplan->load('planfeatures');
        return view('priceplan::features.index', compact('priceplan'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($priceplan_id)
    {
        // return $priceplan = Priceplan::all();
        return view('priceplan::features.create', compact('priceplan_id'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $priceplan_id)
    {
        // dd("kljgklgh");
        foreach ($request->features as $feature) {
            PlanFeature::create([
                'priceplan_id' => $priceplan_id,
                'name' => $feature,
            ]);
        }
        return redirect()->back();
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
    public function edit($id)
    {
        return view('priceplan::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(PlanFeature $feature)
    {
        $feature->delete();
        return redirect()->back();
    }



    public function updateOrder(Request $request)
    {
        $priceplan = SortingPriceplan::sort($request);

        if ($priceplan) {
            return response()->json(['message' => 'Priceplan Sorted Successfully!']);
        } else {
            flashError();
            return back();
        }
    }
}
