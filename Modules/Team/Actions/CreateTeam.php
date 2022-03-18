<?php

namespace Modules\Team\Actions;

use Modules\Team\Entities\Team;

class CreateTeam
{
    public static function create($request)
    {
        $team = Team::create($request->all());

        $image = $request->image;
        if ($image) {
            $url = uploadImage($image, 'team');
            $team->update(['image' => $url]);
        }

        return $team;
    }
}
