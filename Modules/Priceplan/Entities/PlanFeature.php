<?php

namespace Modules\Priceplan\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlanFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'priceplan_id', 'name'
    ];

    protected static function newFactory()
    {
        return \Modules\Priceplan\Database\factories\PlanFeatureFactory::new();
    }

    public function priceplan()
    {
        return $this->belongsTo(Priceplan::class, 'priceplan_id');
    }
}
