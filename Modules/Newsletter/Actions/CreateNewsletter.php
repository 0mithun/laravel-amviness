<?php

namespace Modules\Newsletter\Actions;

use Carbon\Carbon;
use Modules\Newsletter\Entities\Newsletter;

class CreateNewsletter
{
    public static function create($request)
    {

        return $newsletter = Newsletter::create($request->all());
    }
}
