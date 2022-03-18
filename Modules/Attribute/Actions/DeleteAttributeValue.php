<?php

namespace Modules\Attribute\Actions;

class DeleteAttributeValue
{
    public static function destroy($value)
    {
        return $value->delete();
    }
}
