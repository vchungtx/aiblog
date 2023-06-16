<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Translatable;

class PromptCategory extends Model
{
    use Translatable;

    protected $translatable = ['slug', 'name'];

    protected $table = 'prompt_categories';

    protected $fillable = ['slug', 'name'];

    public function prompts()
    {
        return $this->hasMany(Prompt::class, )
            ->orderBy('created_at', 'DESC');
    }

    public function parentId()
    {
        return $this->belongsTo(self::class);
    }
}
