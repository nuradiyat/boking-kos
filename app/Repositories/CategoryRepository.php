<?php

namespace app\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;
use PhpParser\Node\Expr\FuncCall;

class CategoryRepository implements CategoryRepositoryInterface
{
    // impelmen tasi biat kita buat repo terpisah dari controler atau logika
    // kita immpletassi kan  metdod public function getAllCities(); yang sudah kita
    // deklarasikan di citirepositryinterface
    public function getAllCategories() {
        // kita ambil dari Category all
        return Category::all();
    }
}
