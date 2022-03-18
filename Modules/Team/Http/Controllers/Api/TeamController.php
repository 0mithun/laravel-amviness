<?php

namespace Modules\Team\Http\Controllers\Api;

use App\Actions\Team\CreateTeam;
use App\Actions\Team\DeleteTeam;
use App\Actions\Team\SortingTeam;
use App\Actions\Team\UpdateTeam;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Team\Entities\Team;
use Modules\Team\Http\Requests\TeamFormRequest;

class TeamController extends Controller
{
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $teams = Team::orderBy('order', 'ASC')->get();

        if ($teams) {
            return responseSuccess($teams);
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
        return view('team::team.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param TeamFormRequest $request
     * @return Renderable
     */
    public function store(TeamFormRequest $request)
    {
        $team = CreateTeam::create($request);

        if ($team) {
            return responseSuccess($team);
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
        return view('team::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Team $team)
    {
        if ($team) {
            return responseSuccess($team);
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
    public function update(TeamFormRequest $request, Team $team)
    {
        $team = UpdateTeam::update($request, $team);

        if ($team) {
            return responseSuccess($team);
        }else{
            return responseError();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Team $team)
    {
        $team = DeleteTeam::delete($team);

        if ($team) {
            return responseSuccess($team);
        }else{
            return responseError();
        }
    }

    public function updateOrder(Request $request)
    {
        $team = SortingTeam::sort($request);

        if ($team) {
            return responseSuccess($team);
        }else{
            return responseError();
        }
    }
}
