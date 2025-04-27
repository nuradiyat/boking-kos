<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    //
    use HasFactory, SoftDeletes;

    // fungsi sebagai kolom mana aja yang bisa kita isi nama 
    // harus seuai dengan atribut arau fild migration
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
