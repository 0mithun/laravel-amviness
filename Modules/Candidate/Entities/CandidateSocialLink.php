<?php

namespace Modules\Candidate\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CandidateSocialLink extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected static function newFactory()
    // {
    //     return \Modules\Candidate\Database\factories\CandidateSocialLinkFactory::new();
    // }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id');
    }
}
