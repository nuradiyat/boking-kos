<?php

namespace App\Http\Controllers;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\CityRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    private CityRepositoryInterface $cityRepository;
    private CategoryRepositoryInterface $categoryRepository;
    private BoardingHouseRepositoryInterface $boardingHouseRepository;

    public function __construct(
        CityRepositoryInterface $cityRepository,
        CategoryRepositoryInterface $categoryRepository,
        BoardingHouseRepositoryInterface $boardingHouseRepository
    ) {
        $this->cityRepository = $cityRepository;
        $this->categoryRepository = $categoryRepository;
        $this->boardingHouseRepository = $boardingHouseRepository;
    }

    // kita akan nge return view home nyas
    public function index() {

        // kita ambil datanya karena kita pake repositori patenr
        // kita panggil repositorinya
        $categories = $this->categoryRepository->getAllCategories();
        // bukan karena dia fungsi popular dia cuma bisa akases popular disini kan dia manggil tabel nya 
        // y berrarti dia bisa akses semua atribut atau fild nya juga sama aja ka $boardingHousea = $this->boardingHouseRepository->getAllBoardingHouses();
        $popularBoardingHouses = $this->boardingHouseRepository->getPopularBoardingHouses();
        $cities = $this->cityRepository->getAllCities();
        $boardingHouses = $this->boardingHouseRepository->getAllBoardingHouses();
        // lalu kita lempar varibel ini ke dalam se buah view seperti ini caranya
        // kita bisa menggunakan compact kita panggil varibel $categories
        return view('pages.home', compact('categories', 'popularBoardingHouses', 'cities', 'boardingHouses'));
    }
}
