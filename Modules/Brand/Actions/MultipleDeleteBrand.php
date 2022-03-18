<?php

namespace Modules\Brand\Actions;

use Modules\Brand\Entities\Brand;

class MultipleDeleteBrand
{
    public static function delete($request)
    {
        return Brand::whereIn('id', $request->id)->delete();
    }
}
