<?php

namespace Modules\Candidate\Actions;

use Modules\Candidate\Entities\Candidate;

class CreateCandidate
{
    public static function create($request)
    {
        $Candidate = Candidate::create($request->except(['avatar', 'file', 'facebook', 'twitter', 'instagram', 'linkedin', 'youtube', 'pintarest']));

        $avatar = $request->avatar;
        if ($avatar) {
            $url = uploadImage($avatar, 'candidate/avatar');
            $Candidate->update(['avatar' => $url]);
        }

        $file = $request->file;
        if ($file) {
            $url = uploadImage($file, 'candidate/file');
            $Candidate->update(['file' => $url]);
        }
        return $Candidate;
    }
}
