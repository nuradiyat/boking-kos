<?php
// kita ambil fungsi apa saja dari model city
namespace App\Interfaces;

interface CategoryRepositoryInterface
{
    // public function getAllCategory();
    public function getAllCategories();

    public function getCategoryBySlug($slug);
}


