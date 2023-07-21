<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Tag extends Model
{
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tag')
            ->published()
            ->orderBy('created_at', 'DESC');
    }

    public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$this->slug) {
            $this->slug = Str::slug($this->name);
        }

        return parent::save();
    }
}
