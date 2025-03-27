<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductsFakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fakeProduct = Faker::create('id_ID');
        for ($i=0; $i < 10 ; $i++) {
            DB::table('products')->insert([
                'name' => $fakeProduct->userName,
                'stock' => $fakeProduct->randomNumber(2),
                'description' => $fakeProduct->text(100),
                'store_id' => 2,
                'created_at' => $fakeProduct->dateTime,
                'updated_at' => $fakeProduct->dateTime,
            ]);
        }
    }
}
