<?php

use App\Models\Setting;
use Modules\Language\Entities\Language;
use Modules\Wishlist\Entities\Wishlist;

function setting()
{
    return Setting::first();
}

function languages()
{
    return Language::all();
}



/**
 * user permission check
 *
 * @param string $permission
 * @return boolean
 */
function userCan($permission)
{
    return auth('admin')->user()->can($permission);
}



function checkWishlisted(int $product_id): Bool
{
    $exist = Wishlist::where('product_id', $product_id)->whereUserId(auth()->id())->first();

    if ($exist) {
        return true;
    } else {
        return false;
    }
}
