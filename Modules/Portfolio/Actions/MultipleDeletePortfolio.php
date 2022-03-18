<?php

namespace Modules\Portfolio\Actions;

use Modules\Portfolio\Entities\Portfolio;

class MultipleDeletePortfolio
{
    public static function delete($request)
    {
        return Portfolio::whereIn('id', $request->id)->delete();
    }
}
