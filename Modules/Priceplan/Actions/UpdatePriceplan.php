<?php

namespace Modules\Priceplan\Actions;

class UpdatePriceplan
{
    public static function update($request, $priceplan)
    {
        $priceplan->update($request->all());
        return $priceplan;
    }
}
