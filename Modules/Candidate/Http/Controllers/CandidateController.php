<?php

namespace Modules\Candidate\Http\Controllers;

use Modules\Candidate\Entities\Candidate;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Candidate\Http\Requests\CandidateFormRequest;
use Modules\Candidate\Repositories\CandidateRepositories;

class CandidateController extends Controller
{
    public $user;
    protected $candidate;

    public function __construct(CandidateRepositories $candidate)
    {
        $this->candidate = $candidate;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = $this->candidate->all();
        return view('candidate::candidate.index', compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidate::candidate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CandidateFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CandidateFormRequest $request)
    {
        try {
            $candidate = $this->candidate->store($request);
            $this->storeSocialLinks($candidate, $request->only(['facebook', 'twitter', 'instagram', 'linkedin', 'youtube', 'pintarest']));

            flashSuccess('Candidate Created Successfully');
            return back();
        } catch (\Throwable $th) {
            flashError();
            return back();
        }
    }

    /**
     * Show the specified resource.
     *
     * @param string $username
     * @return \Illuminate\Http\Response
     */
    public function show(string $username)
    {
        $candidate = Candidate::with('social_link')->whereUsername($username)->firstOrFail();
        return view('candidate::candidate.show', compact('candidate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Candidate $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        $candidate = $candidate->load('social_link');
        return view('candidate::candidate.edit', compact('candidate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CandidateFormRequest $request
     * @param Candidate $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(CandidateFormRequest $request, Candidate $candidate)
    {
        try {
            $this->candidate->update($request, $candidate);
            $this->updateSocialLinks($candidate, $request->only(['facebook', 'twitter', 'instagram', 'linkedin', 'youtube', 'pintarest']));

            flashSuccess('Candidate Updated Successfully');
            return back();
        } catch (\Throwable $th) {
            flashError();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Candidate $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        try {
            $this->candidate->destroy($candidate);

            flashSuccess('Company Deleted Successfully');
            return back();
        } catch (\Throwable $th) {
            flashError();
            return back();
        }
    }

    /**
     * Status change list from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function status_change(Request $request)
    {
        try {
            $this->candidate->status($request);

            if ($request->status == 1) {
                return responseSuccess('Candidate Unblocked');
            } else {
                return responseSuccess('Candidate Blocked');
            }
        } catch (\Throwable $th) {
            return responseError();
        }
    }

    protected function storeSocialLinks($candidate, $request)
    {
        $candidate->social_link()->create($request);
    }

    protected function updateSocialLinks($candidate, $request)
    {
        $candidate->social_link()->update($request);
    }

    public function list_view_change()
    {
        session(['candidate_list_view' => request()->candidate_list_view]);
        return back();
    }
}
