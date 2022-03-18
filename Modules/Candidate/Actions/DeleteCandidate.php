<?php

namespace Modules\Candidate\Actions;

class DeleteCandidate
{
    public static function delete($candidate)
    {
        $logo = $candidate->logo;
        $banner = $candidate->banner;

        if ($candidate->delete()) {
            deleteImage($logo);
            deleteImage($banner);
        }

        return true;
    }
}
