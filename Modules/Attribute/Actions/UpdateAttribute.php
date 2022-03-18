<?php

namespace Modules\Attribute\Actions;

class UpdateAttribute
{
    public static function update($request, $attribute)
    {
        $attribute->update($request->except(['is_filterable', 'is_required']));

        if ($request->is_filterable == 'on') {
            $attribute->is_filterable = true;
        } else {
            $attribute->is_filterable = false;
        }

        if ($request->is_required == 'on') {
            $attribute->is_required = true;
        } else {
            $attribute->is_required = false;
        }

        $attribute->save();

        return $attribute;
    }
}
