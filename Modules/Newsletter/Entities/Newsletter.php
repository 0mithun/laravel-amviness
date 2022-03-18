<?php

namespace Modules\Newsletter\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Newsletter extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
    ];

    protected static function newFactory()
    {
        return \Modules\Newsletter\Database\factories\NewsletterFactory::new();
    }
}
