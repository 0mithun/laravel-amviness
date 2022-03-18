<?php

namespace Modules\Newsletter\Actions;

use Carbon\Carbon;

class UpdateNewsletter
{
    public static function update($request, $newsletter)
    {
        $newsletter->update($request->all());
        return $newsletter;
    }
}
