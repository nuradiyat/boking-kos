<?php
// kita ambil fungsi apa saja dari model city
namespace App\Interfaces;

// Sesuaikan dengan namma filenya CityRepositoryInterface
interface CityRepositoryInterface
{
    // kita deklarasikan fungsi apa saja kita hanya akan mngemabil
    public function getAllCities();

    public function getCityBySlug($slug);

}


