<?php

namespace Modules\Job\Http\Controllers\Api;

use App\Actions\Job\CreateJob;
use App\Actions\Job\DeleteJob;
use App\Actions\Job\UpdateJob;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Modules\Job\Entities\Job;
use Modules\Job\Http\Requests\JobFormRequest;

class JobController extends Controller
{
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $jobs = Job::latest()->get();

        if ($jobs) {
            return responseSuccess($jobs);
        }else{
            return responseError();
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param JobFormRequest $request
     * @return Renderable
     */
    public function store(JobFormRequest $request)
    {
        $job = CreateJob::create($request);

        if ($job) {
            return responseSuccess($job);
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
        return view('job::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Job $job)
    {
        if ($job) {
            return responseSuccess($job);
        }else{
            return responseError();
        }
    }

    /**
     * Update the specified resource in storage.
     * @param JobFormRequest $request
     * @param int $id
     * @return Renderable
     */
    public function update(JobFormRequest $request, Job $job)
    {
        $job = UpdateJob::update($request, $job);

        if ($job) {
            return responseSuccess($job);
        }else{
            return responseError();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Job $job)
    {
        $job = DeleteJob::delete($job);

        if ($job) {
            return responseSuccess($job);
        }else{
            return responseError();
        }
    }
}
