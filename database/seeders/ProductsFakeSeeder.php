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

        for ($i=0; $i < 5; $i++) {
            DB::table('products')->insert([
                'names'=> $fakeProduct->name,
                'stocks' => $fakeProduct->randomNumber(2),
                'description'=>$fakeProduct->text(150),
                'created_at'=>$fakeProduct->dateTime,
                'updated_at'=>$fakeProduct->dateTime,
            ]);
        }
    }
}
