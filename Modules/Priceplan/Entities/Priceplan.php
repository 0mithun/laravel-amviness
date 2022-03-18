<?php

namespace Modules\Priceplan\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Priceplan extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory()
    {
        return \Modules\Priceplan\Database\factories\PriceplanFactory::new();
    }

    public function planfeatures()
    {
        return $this->hasMany(PlanFeature::class, 'priceplan_id');
    }
}
