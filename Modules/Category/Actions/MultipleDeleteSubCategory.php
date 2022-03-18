<?php

namespace Modules\Category\Actions;

use Modules\Category\Entities\SubCategory;

class MultipleDeleteSubCategory
{
    public static function delete($request)
    {
        return SubCategory::whereIn('id', $request->id)->delete();
    }
}
