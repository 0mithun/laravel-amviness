<?php

namespace Modules\Priceplan\Actions;

use Modules\Priceplan\Entities\Priceplan;

class StatusChange
{
    public static function status($request)
    {
        $priceplan = Priceplan::find($request->id);
        $priceplan->status = $request->status;
        $priceplan->save();

        return $priceplan;
    }
}
