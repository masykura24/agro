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
        'image' => '/src/img.jpg',
        'name' => 'Traktor',
        'price' => '100000',
        'kategori' => 'Sewa',
        'jumlah' => '1',
        'ket' => '',
        ]);

        Product::create([
            'image' => '/src/img.jpg',
            'name' => 'Penanaman',
            'price' => '100000',
            'kategori' => 'Jasa',
            'jumlah' => '7',
            'ket' => '',
        ]);

        Product::create([
            'image' => '/src/img.jpg',
            'name' => 'Mesin Pemanen',
            'price' => '23000',
            'kategori' => 'Sewa',
            'jumlah' => '1',
            'ket' => '',
        ]);
    }
}
