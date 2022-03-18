<?php

namespace Modules\Coupon\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coupon extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected static function newFactory()
    {
        return \Modules\Coupon\Database\factories\CouponFactory::new();
    }

    public function setNameAttribute($value)
    {
        $this->attributes['code']           = $value;
        $this->attributes['max_use']        = $value;
        $this->attributes['discount']       = $value;
        $this->attributes['expire_date']    = $value;
        $this->attributes['type']           = $value;
    }
}
