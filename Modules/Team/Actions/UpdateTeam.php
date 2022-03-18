<?php

namespace Modules\Team\Actions;

class UpdateTeam
{
    public static function update($request, $team)
    {
        $team->update($request->all());

        $image = $request->image;
        if ($image) {
            $url = uploadImage($image, 'team');
            $team->update(['image' => $url]);
        }

        return $team;
    }
}
