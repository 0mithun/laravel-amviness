<?php

namespace Modules\Candidate\Actions;

use Modules\Candidate\Entities\Candidate;

class StatusChange
{
    public static function status($request)
    {
        $company = Candidate::find($request->id);
        $company->status = $request->status;
        $company->save();

        return $company;
    }
}
