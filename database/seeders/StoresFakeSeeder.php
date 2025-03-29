<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class StoresFakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fakeStore = Faker::create('id_ID');
        for ($i=0; $i < 3; $i++) {
            DB::table('stores')->insert([
                'name_store' => $fakeStore->domainName,
                'address' => $fakeStore->address,
                'created_at' => $fakeStore->dateTime,
                'updated_at' => $fakeStore->dateTime
            ]);
        }
    }
}
