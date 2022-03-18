<?php

namespace Modules\Attribute\Actions;

class UpdateAttributeValue
{
    public static function update($request, $value)
    {
        return $value->update($request->all());
    }
}
