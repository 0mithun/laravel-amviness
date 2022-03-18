<?php

namespace Modules\Product\Actions;

use Modules\Category\Entities\SubCategory;

class SubcategoryList
{
    public static function get($request)
    {
        return SubCategory::where('category_id', $request->category_id)->select('id', 'name')->get();
    }
}
