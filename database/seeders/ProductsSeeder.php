<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'names' => 'Product 1',
                'stocks' => 100,
            ],
            [
                'names' => 'Product 2',
                'stocks' => 200,
            ],
            [
                'names' => 'Product 3',
                'stocks' => 300,
            ],
            [
                'names' => 'Product 4',
                'stocks' => 400,
            ],
        ]);
    }
}
