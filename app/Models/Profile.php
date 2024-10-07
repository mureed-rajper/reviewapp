<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'lname',
        'age',
        'city',
        'skill',
        'education',
        'date_of_birth',
        'img',
        'user_id',
    ];

    public $timestamps = false;
}


