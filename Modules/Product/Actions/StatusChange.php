<?php

namespace Modules\Product\Actions;

use Modules\Product\Entities\Product;

class StatusChange
{
    public static function status($request)
    {
        $product = Product::find($request->id);
        $product->status = $request->status;
        $product->save();

        return $product;
    }
}
