<?php

namespace Modules\Job\Http\Controllers;


use Illuminate\Http\Request;
use Modules\Job\Entities\Job;
use Illuminate\Routing\Controller;
use Modules\Job\Actions\CreateJob;
use Modules\Job\Actions\DeleteJob;
use Modules\Job\Actions\UpdateJob;
use Modules\Category\Entities\Category;
use Illuminate\Contracts\Support\Renderable;
use Modules\Job\Http\Requests\JobFormRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;

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
        return view('job::index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $categories = Category::all(['id', 'name']);
        return view('job::create', compact('categories'));
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
            flashSuccess('Job Created Successfully');
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
        return view('job::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Job $job)
    {
        $categories = Category::all(['id', 'name']);
        return view('job::edit', compact('job', 'categories'));
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
            flashSuccess('Job Updated Successfully');
            return redirect(route('module.job.index'));
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
    public function destroy(Job $job)
    {
        $job = DeleteJob::delete($job);

        if ($job) {
            flashSuccess('Job Deleted Successfully');
            return redirect(route('module.job.index'));
        } else {
            flashError();
            return back();
        }
    }
}
