<?php

namespace Modules\Team\Actions;

class DeleteTeam
{
    public static function delete($team)
    {
        if (file_exists($team->image)) {
            @unlink($team->image);
        }
        return $team->delete();
    }
}
