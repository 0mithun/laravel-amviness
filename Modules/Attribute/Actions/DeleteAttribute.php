<?php

namespace Modules\Attribute\Actions;

class DeleteAttribute
{
    public static function destroy($attribute)
    {
        return $attribute->delete();
    }
}
