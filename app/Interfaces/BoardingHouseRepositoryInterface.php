<?php
// kita ambil fungsi apa saja dari model city
namespace App\Interfaces;

interface BoardingHouseRepositoryInterface
{
    // public function getAllCategory();
    // kita buat duludefult nya null
    public function getAllBoardingHouses($search = null, $city = null, $category = null);

    // public function getPopularBoardingRumah();

    public function getPopularBoardingHouses($limit = 5);

    public function getBoardingHouseByCitySlug($slug);

    public function getBoardingHouseByCategorySlug($slug);
    
    public function getBoardingHouseBySlug($slug);
}


