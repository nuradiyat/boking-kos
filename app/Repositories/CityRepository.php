<?php

namespace app\Repositories;

use App\Interfaces\CityRepositoryInterface;
use App\Models\City;

class CityRepository implements CityRepositoryInterface
{
    // impelmen tasi biat kita buat repo terpisah dari controler atau logika
    // kita immpletassi kan  metdod public function getAllCities(); yang sudah kita
    // deklarasikan di citirepositryinterface
    public function getAllCities() {
        // kita ambil dari city all
        return City::all();
    }
}
