<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    // impelmen tasi biat kita buat repo terpisah dari controler atau logika
    // kita immpletassi kan  metdod public function getAllCities(); yang sudah kita
    // deklarasikan di citirepositryinterface
    public function getAllCategories() {
        // kita ambil dari Category all
        return Category::all();
    }

    // Method getCategoryBySlug($slug) mengambil satu kategori berdasarkan slug yang diberikan
    public function getCategoryBySlug($slug) {
        // Category Model Eloquent yang mewakili tabel categories di database, digunakan untuk melakukan query data kategori.
        // where('slug', $slug) where('slug', $slug) adalah query builder yang menambahkan kondisi filter untuk mencari baris (record) di tabel categories yang kolom slug-nya sama dengan nilai variabel $slug.
        // $slug 	Variabel PHP yang berisi nilai slug yang ingin dicari, biasanya didapat dari parameter fungsi atau URL.
        // first() Method Eloquent untuk mengambil satu baris pertama hasil query sebagai objek model Category, atau null jika tidak ada data yang cocok.
        return Category::where('slug', $slug)->first();
    }
}
