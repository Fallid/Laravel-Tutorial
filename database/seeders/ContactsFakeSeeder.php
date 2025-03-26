<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ContactsFakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fakeContact = Faker::create('id_ID');
        for ($i=1; $i <= 10 ; $i++) {
            DB::table('contacts')->insert([
                'email' => $fakeContact->email,
                'phone' => $fakeContact->phoneNumber,
                'employee_id' => $i,
                'created_at' => $fakeContact->dateTime(),
                'updated_at' => $fakeContact->dateTime()
            ]);
        }
    }
}
