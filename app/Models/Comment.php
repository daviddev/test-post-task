<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['post_id', 'user_id', 'text'];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
