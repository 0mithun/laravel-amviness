<?php

namespace Modules\Team\Repositories;

use Modules\Team\Actions\CreateTeam;
use Modules\Team\Actions\DeleteTeam;
use Modules\Team\Actions\SortingTeam;
use Modules\Team\Actions\UpdateTeam;
use Modules\Team\Entities\Team;

class TeamRepositories implements TeamInterface
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        return Team::oldest('order')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Object $request
     */
    public function store(Object $request)
    {
        return CreateTeam::create($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Object $request
     * @param Object $data
     * @return \Illuminate\Http\Response
     */
    public function update(Object $request, Object $data)
    {
        return UpdateTeam::update($request, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Object $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Object $data)
    {
        return DeleteTeam::delete($data);
    }

    /**
     * update sorting from storage.
     *
     * @param Object $request
     * @return \Illuminate\Http\Response
     */
    public function updateOrder(Object $request)
    {
        return SortingTeam::sort($request);
    }
}
