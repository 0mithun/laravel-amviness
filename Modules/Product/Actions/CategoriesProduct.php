<?php

namespace Modules\Product\Actions;

use Modules\Product\Entities\Product;

class CategoriesProduct
{
    public static function get($category)
    {
        return Product::where('category_id', $category->id)->get();
    }
}
