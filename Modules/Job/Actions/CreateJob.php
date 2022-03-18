<?php

namespace Modules\Job\Actions;

use Modules\Job\Entities\Job;

class CreateJob
{
    public static function create($request)
    {
        $job = Job::create($request->except(['thumbnail']));

        $image = $request->thumbnail;
        if ($image) {
            $url = uploadImage($image, 'job');
            $job->update(['thumbnail' => $url]);
        }

        return $job;
    }
}
