<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;


class Comment extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function replyTo()
    {
        return $this->belongsTo(self::class);
    }

    public function scopeRoot(Builder $query)
    {
        return $query->whereNull('reply_to');
    }

    public function userId()
    {
        return $this->belongsTo(Voyager::modelClass('User'), 'user_id', 'id');
    }

    public function replies()
    {
        return $this->hasMany(self::class, 'reply_to')

            ->orderBy('created_at', 'DESC');
    }
}
