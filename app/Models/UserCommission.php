<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCommission extends Model
{
    use HasFactory;

    protected $fillable = [
        // Add your fillable fields here
    ];

    public static $sources = [
        // Define your sources here
    ];

    // Add other necessary model methods and properties
}
