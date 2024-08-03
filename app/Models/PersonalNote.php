<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalNote extends Model
{
    protected $fillable = ['file_id', 'user_id', 'note', 'created_at', 'updated_at'];

    public function file()
    {
        return $this->belongsTo(File::class, 'file_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
