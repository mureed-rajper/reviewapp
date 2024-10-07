<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashbook extends Model
{
    use HasFactory;

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    protected $fillable = [
        'title',
        'author',
        'description',
        'book_img',
        'status',
        'create_at',
        'update_at',
    ];
}
