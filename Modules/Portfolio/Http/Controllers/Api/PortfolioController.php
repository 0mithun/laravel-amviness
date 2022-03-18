<?php

namespace Modules\Portfolio\Http\Controllers\Api;

use App\Actions\Portfolio\CreatePortfolio;
use App\Actions\Portfolio\DeletePortfolio;
use App\Actions\Portfolio\MultipleDeletePortfolio;
use App\Actions\Portfolio\UpdatePortfolio;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Portfolio\Entities\Portfolio;
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

        if ($portfolios) {
            return responseSuccess($portfolios);
        }else{
            return responseError();
        }
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
            return responseSuccess($portfolio);
        }else{
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
        return view('portfolio::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Portfolio $portfolio)
    {
        if ($portfolio) {
            return responseSuccess($portfolio);
        }else{
            return responseError();
        }
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
            return responseSuccess($portfolio);
        }else{
            return responseError();
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
            return responseSuccess($portfolio);
        }else{
            return responseError();
        }
    }

    public function multipleDestroy(Request $request){
        $portfolio = MultipleDeletePortfolio::delete($request);

        if ($portfolio) {
            return responseSuccess($portfolio);
        }else{
            return responseError();
        }
    }
}
