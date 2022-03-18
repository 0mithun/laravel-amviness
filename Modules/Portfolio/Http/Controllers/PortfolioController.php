<?php

namespace Modules\Portfolio\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Portfolio\Entities\Portfolio;
use Illuminate\Contracts\Support\Renderable;
use Modules\Portfolio\Actions\CreatePortfolio;
use Modules\Portfolio\Actions\DeletePortfolio;
use Modules\Portfolio\Actions\UpdatePortfolio;
use Modules\Portfolio\Actions\MultipleDeletePortfolio;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\Portfolio\Http\Requests\PortfolioFormRequest;

class PortfolioController extends Controller
{
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $portfolios = Portfolio::latest()->get();
        return view('portfolio::index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('portfolio::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param PortfolioFormRequest $request
     * @return Renderable
     */
    public function store(PortfolioFormRequest $request)
    {
        $portfolio = CreatePortfolio::create($request);

        if ($portfolio) {
            flashSuccess('Portfolio Added Successfully');
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
        return view('portfolio::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Portfolio $portfolio)
    {
        return view('portfolio::edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(PortfolioFormRequest $request, Portfolio $portfolio)
    {
        $portfolio = UpdatePortfolio::update($request, $portfolio);

        if ($portfolio) {
            flashSuccess('Portfolio Updated Successfully');
            return redirect(route('module.portfolio.index'));
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
    public function destroy(Portfolio $portfolio)
    {
        $portfolio = DeletePortfolio::delete($portfolio);

        if ($portfolio) {
            flashSuccess('Portfolio Deleted Successfully');
            return back();
        } else {
            flashError();
            return back();
        }
    }

    public function multipleDestroy(Request $request)
    {
        $portfolio = MultipleDeletePortfolio::delete($request);

        if ($portfolio) {
            return response()->json(['message' => 'Selected Portfolio Items Deleted Successfully!']);
        } else {
            flashError();
            return back();
        }
    }
}
