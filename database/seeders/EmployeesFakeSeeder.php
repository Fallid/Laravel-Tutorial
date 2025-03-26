<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class EmployeesFakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fakeEmployee = Faker::create('id_ID');

        for ($i = 0; $i < 10; $i++) {
            DB::table('employees')->insert([
                'name' => $fakeEmployee->name,
                'division' => $fakeEmployee->randomElement(['Marketing', 'CEO', 'IT']),
                'position' => $fakeEmployee->randomElement(['sales', 'hr', 'manajer']),
                'created_at' => $fakeEmployee->dateTime(),
                'updated_at' => $fakeEmployee->dateTime()
            ]);
        }
    }
}
