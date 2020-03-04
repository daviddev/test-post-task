<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'title', 'content'];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'post_id','id');
    }
}
