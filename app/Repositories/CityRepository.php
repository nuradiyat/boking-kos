<?php

namespace App\Repositories;

use App\Interfaces\CityRepositoryInterface;
use App\Models\City;

class CityRepository implements CityRepositoryInterface
{
    // impelmen tasi biat kita buat repo terpisah dari controler atau logika
    // kita immpletassi kan  metdod public function getAllCities(); yang sudah kita
    // deklarasikan di citirepositryinterface

    // fungsi ini itu kita buat di interface gitu
    public function getAllCities() {
        // kita ambil dari city all
        return City::all();
    }
}
