<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function dashbook(){
        return $this->belongsTo(Dashbook::class);
    }

    public $fillable = [
        'review',
        'rating',
        'user_id',
        'dashbook_id',
        'status',
    ];
}
