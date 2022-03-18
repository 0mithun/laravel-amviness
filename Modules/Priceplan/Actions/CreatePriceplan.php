<?php

namespace Modules\Priceplan\Actions;

use Modules\Priceplan\Entities\Priceplan;

class CreatePriceplan
{
    public static function create($request)
    {
        return Priceplan::create($request->except(['features']));
    }
}
