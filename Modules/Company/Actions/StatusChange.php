<?php

namespace Modules\Company\Actions;

use Modules\Company\Entities\Company;

class StatusChange
{
    public static function status($request)
    {
        $company = Company::find($request->id);
        $company->status = $request->status;
        $company->save();
        return $company;
    }
}
