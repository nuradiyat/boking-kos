<?php 

namespace App\Repositories;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Models\BoardingHouse;
use Filament\Forms\Components\Builder;
// use Illuminate\Database\Eloquent\Builder;

class BoardingHouseRepository implements BoardingHouseRepositoryInterface
{
    public function getAllBoardingHouses($search = null, $city = null, $category = null)
    {
        $query = BoardingHouse::query();

        // ketika search di isis maka dia akan di jalakan
        if ($search) {
            $query->where('name', 'like', '%' . $search .  '%');
        }

        // jika city di isi dia akan mencari berdasar slug city
        if ($city) {
            $query->whereHas('city', function (Builder $query) use ($city) {
                $query->where('slug', $city);
            });
        }
        
        // jika category di isi dia akan mencari berdasar slug dari category
        if ($category) {
            $query->whereHas('category', function (Builder $query) use ($category) {
                $query->where('slug', $category);
            });
        }

        return $query->get();
    }

    // limit ini digunakan untuk kita ngambil popular nya 5
    public function getPopularBoardingHouses($limit = 5)
    {
        return BoardingHouse::withCount('transactions')->orderBy('transactions_count', 'desc')->take($limit)->get();
    }

    // punya sebuah halama dia akan menampilkan kota kota by slu jadi akan menampilkan kos kos san bersarkan kota
    public function getBoardingHouseByCitySlug($slug)
    {
        return BoardingHouse::whereHas('city', function (Builder $query) use ($slug) {
            $query->where('slug', $slug);
        })->get();
    }
    
    // punya sebuah halama dia akan menampilkan kota category by slu dia akan menampilkan koskosan berdasarkan category
    public function getBoardingHouseByCategorySlug($slug)
    {
        return BoardingHouse::whereHas('category', function (Builder $query) use ($slug) {
            $query->where('slug', $slug);
        })->get();
        
    }

    // misal kita pengen liat detail nya ketiika kita klick dia akan mencari bersarkan slugnya
    public function getBoardingHouseBySlug($slug)
    {
        return BoardingHouse::where('slug', $slug)->first();
    }

    // public function getPopularBoardingRumah() 
    // {
    //     return BoardingHouse::all();
    // }

    // selanjutnya kita daftar kan reposiry dan interface 
    // di bagian reposri tori service provide
}