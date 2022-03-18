<?php

namespace Modules\Company\Repositories;

use Illuminate\Http\Request;
use Modules\Company\Entities\Company;
use Modules\Company\Actions\CreateCompany;
use Modules\Company\Actions\DeleteCompany;
use Modules\Company\Actions\UpdateCompany;
use Modules\Company\Actions\StatusChange;

class CompanyRepositories implements CompanyInterface
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function all()
    {
        return Company::latest('id')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param object $data
     * @return \Illuminate\Http\Response
     */
    public function store(object $data)
    {
        return CreateCompany::create($data);
    }

    /**
     * Update the specified resource in storage.
     * @param object $request
     * @param object $data
     * @return \Illuminate\Http\Response
     */
    public function update(object $request, object $data)
    {
        return UpdateCompany::update($data, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param object $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(object $company)
    {
        return DeleteCompany::delete($company);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param object $request
     * @return \Illuminate\Http\Response
     */
    public function status(object $request)
    {
        return  StatusChange::status($request);
    }
}
