<?php

namespace Modules\Company\Entities;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory()
    {
        return \Modules\Company\Database\factories\CompanyFactory::new();
    }

    public function setPasswordAttribute($param)
    {
        $this->attributes['password'] = bcrypt($param);
    }

    public function social_link()
    {
        return $this->hasOne(CompanySocialLink::class, 'company_id')->withDefault();
    }
}
