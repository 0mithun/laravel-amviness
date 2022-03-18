<?php

namespace Modules\Team\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Team\Entities\Team;
use Illuminate\Routing\Controller;
use Modules\Team\Http\Requests\TeamFormRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\Team\Repositories\TeamRepositories;

class TeamController extends Controller
{
    use ValidatesRequests;

    protected $team;
    public function __construct(TeamRepositories $team)
    {
        $this->team = $team;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = $this->team->all();
        return view('team::index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('team::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TeamFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamFormRequest $request)
    {
        try {
            $this->team->store($request);

            flashSuccess('Team Member Added Successfully');
            return back();
        } catch (\Throwable $th) {
            flashError();
            return back();
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('team::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('team::edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TeamFormRequest $request
     * @param Team $team
     * @return \Illuminate\Http\Response
     */
    public function update(TeamFormRequest $request, Team $team)
    {
        try {
            $this->team->update($request, $team);

            flashSuccess('Team Member Updated Successfully');
            return redirect(route('module.team.index'));
        } catch (\Throwable $th) {
            flashError();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Team $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        try {
            $this->team->destroy($team);

            flashSuccess('Team Member Deleted Successfully');
            return back();
        } catch (\Throwable $th) {
            flashError();
            return back();
        }
    }

    /**
     * update sorting from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateOrder(Request $request)
    {
        try {
            $this->team->updateOrder($request);
            return responseSuccess('Team Sorted Successfully!');
        } catch (\Throwable $th) {
            return responseError();
        }
    }
}
