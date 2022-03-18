<?php

namespace Modules\Job\Actions;

class DeleteJob
{
    public static function delete($job)
    {
        if ($job->thumbnail != 'backend/image/default-post.png') {
            deleteImage($job->thumbnail);
        }
        return $job->delete();
    }
}
