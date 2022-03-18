<?php

namespace Modules\Attribute\Actions;

use Modules\Attribute\Entities\Attribute;

class CreateAttribute
{
    public static function create($request)
    {
        $attribute = Attribute::create($request->except(['is_filterable', 'is_required']));

        if ($request->is_filterable == 'on') {
            $attribute->is_filterable = true;
        }

        if ($request->is_required == 'on') {
            $attribute->is_required = true;
        }

        $attribute->save();

        return $attribute;
    }
}
