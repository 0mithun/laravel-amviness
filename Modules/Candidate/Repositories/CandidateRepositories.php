<?php

namespace Modules\Candidate\Repositories;

use Modules\Candidate\Entities\Candidate;
use Modules\Candidate\Actions\CreateCandidate;
use Modules\Candidate\Actions\DeleteCandidate;
use Modules\Candidate\Actions\StatusChange;
use Modules\Candidate\Actions\UpdateCandidate;

class CandidateRepositories implements CandidateInterface
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function all()
    {
        return Candidate::latest('id')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CandidateFormRequest $request
     * @return Response
     */
    public function store(object $data)
    {
        return CreateCandidate::create($data);
    }

    /**
     * Update a newly created resource in storage.
     *
     * @param object $request
     * @param object $data
     * @return Response
     */
    public function update(object $request, object $data)
    {
        return  UpdateCandidate::update($request, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param object $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(object $candidate)
    {
        return DeleteCandidate::delete($candidate);
    }

    /**
     *  Status change list from storage.
     *
     * @param object $data
     * @return Response
     */
    public function status(object $data)
    {
        return StatusChange::status($data);
    }
}
