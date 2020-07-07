<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function favorite()
    {
        return $this->hasMany(FavoritePost::class, 'post_id', 'id');
    }
}
