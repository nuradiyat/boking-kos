<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'image',
        'name',
        'slug',
    ];

    public function boardingHouses() 
    {
        // sesuai kan dengan nama model
        return $this->hasMany(BoardingHouse::class);
    }
}
