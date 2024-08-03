<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductBadge extends Model
{
    protected $guarded = ['id'];

    // Define any relationships, accessors, or mutators here
    public function contents()
    {
        return $this->morphMany('App\Models\Content', 'contentable');
    }
}
