<?php

namespace Modules\Category\Actions;

use Modules\Category\Entities\SubCategory;

class CreateSubCategory
{
    public static function create($request)
    {
        // return SubCategory::create($request->all());
        $category = SubCategory::create($request->except(['image']));

        $image = $request->image;
        if ($image) {
            $url = uploadImage($image, 'category');
            $category->update(['image' => $url]);
        }

        return $category;
    }
}
