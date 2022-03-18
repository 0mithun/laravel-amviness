<?php

namespace Modules\Company\Entities;

use COM;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanySocialLink extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // protected static function newFactory()
    // {
    //     return \Modules\Company\Database\factories\CompanySocialLinkFactory::new();
    // }
}
