<?php

namespace Modules\Comment\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory()
    {
        return \Modules\Comment\Database\factories\CommentFactory::new();
    }


    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
