<?php

namespace Modules\Priceplan\Actions;

class DeletePriceplan
{
    public static function delete($priceplan)
    {
        return $priceplan->delete();
    }
}
