<?php

namespace Modules\Job\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Job extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory()
    {
        return \Modules\Job\Database\factories\JobFactory::new();
    }

    /**
     * Set the job name.
     * Set the job slug.
     *
     * @param  string  $value
     * @return void
     */
    public function setTitleAttribute($name)
    {
        $this->attributes['title'] = $name;
        $this->attributes['slug'] = Str::slug($name);
    }
}
