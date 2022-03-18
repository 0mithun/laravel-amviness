<?php

namespace Modules\Attribute\Actions;

use Modules\Attribute\Entities\AttributeValue;

class EditAttribute
{
    public static function edit($attribute)
    {
        return AttributeValue::where('attribute_id', $attribute->id)->latest()->get();
    }
}
