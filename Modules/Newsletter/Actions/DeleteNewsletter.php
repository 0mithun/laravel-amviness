<?php

namespace Modules\Newsletter\Actions;

class DeleteNewsletter
{
    public static function delete($newsletter)
    {
        return $newsletter->delete();
    }
}
