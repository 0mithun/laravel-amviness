<?php

namespace Modules\Candidate\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Candidate extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory()
    {
        return \Modules\Candidate\Database\factories\CandidateFactory::new();
    }

    public function setPasswordAttribute($param)
    {
        $this->attributes['password'] = bcrypt($param);
    }

    function social_link()
    {
        return $this->hasOne(CandidateSocialLink::class);
    }
}
