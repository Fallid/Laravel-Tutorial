<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ActivityEmployeeFakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fakeData = Faker::create('id_ID');
        for ($i = 0; $i < 20; $i++) {
            DB::table('activity_employee')->insert([
                'activity_id' => $fakeData->numberBetween(1,3),
                'employee_id' => $fakeData->numberBetween(1,10),
                'created_at' => $fakeData->dateTime,
                'updated_at' => $fakeData->dateTime
            ]);
        }
    }
}
