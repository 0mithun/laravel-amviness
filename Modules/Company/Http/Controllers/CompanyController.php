<?php

namespace Modules\Company\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Company\Entities\Company;
use Illuminate\Support\Facades\Auth;
use Modules\Category\Entities\Category;
use Modules\Company\Http\Requests\CompanyFormRequest;
use Modules\Company\Repositories\CompanyRepositories;

class CompanyController extends Controller
{
    public $user;
    protected $company;

    public function __construct(CompanyRepositories $company)
    {
        $this->company = $company;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = $this->company->all();
        return view('company::index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('company::create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CompanyFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyFormRequest $request)
    {
        try {
            $company = $this->company->store($request);
            $this->storeSocialLinks($company, $request->only(['facebook', 'twitter', 'instagram', 'linkedin', 'youtube', 'pintarest']));

            flashSuccess('Company Created Successfully');
            return back();
        } catch (\Throwable $th) {
            flashError();
            return back();
        }
    }

    /**
     * Show the specified resource.
     * @param string $username
     * @return \Illuminate\Http\Response
     */
    public function show(string $username)
    {
        $company = Company::with('social_link')->whereUsername($username)->firstOrFail();
        return view('company::show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $categories = Category::all();
        $company = $company->load('social_link');

        return view('company::edit', compact('company', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param CompanyFormRequest $request
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyFormRequest $request, Company $company)
    {
        try {
            $this->company->update($request, $company);
            $this->updateSocialLinks($company, $request->only(['facebook', 'twitter', 'instagram', 'linkedin', 'youtube', 'pintarest']));

            flashSuccess('Company Updated Successfully');
            return back();
        } catch (\Throwable $th) {
            flashError();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        try {
            $this->company->destroy($company);

            flashSuccess('Company Deleted Successfully');
            return back();
        } catch (\Throwable $th) {
            flashError();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function status_change(Request $request)
    {
        try {
            $this->company->status($request);

            if ($request->status == 1) {
                return responseSuccess('Company Unblocked');
            } else {
                return responseSuccess('Company Blocked');
            }
        } catch (\Throwable $th) {
            return responseError();
        }
    }

    protected function storeSocialLinks($company, $request)
    {
        $company->social_link()->create($request);
    }

    protected function updateSocialLinks($company, $request)
    {
        $company->social_link()->update($request);
    }

    public function list_view_change()
    {
        session(['company_list_view' => request()->company_list_view]);
        return back();
    }
}
