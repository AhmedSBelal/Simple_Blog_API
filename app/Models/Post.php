<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];

    function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    function comment() {
        return $this->hasMany(Comment::class, 'post_id');
    }

    function like() {
        return $this->hasMany(Like::class, 'post_id');
    }

}
