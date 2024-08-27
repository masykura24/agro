<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'nama' => 'Mesin Pemanen',
            'gambar' => '/src/img.jpg',
            'harga' => '23000',
            'kategori' => 'sewa',
            'jumlah' => '1',
            'deskripsi' => '',
        ]);
    }
}
