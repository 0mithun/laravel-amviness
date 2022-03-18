<?php

namespace Modules\Job\Actions;

class UpdateJob
{
    public static function update($request, $job)
    {
        $job->update($request->except(['thumbnail']));

        $image = $request->thumbnail;
        if ($image) {
            if ($job->thumbnail != 'backend/image/default-post.png') {
                deleteImage($job->thumbnail);
            }
            $url = uploadImage($image, 'job');
            $job->update(['thumbnail' => $url]);
        }

        return $job;
    }
}
