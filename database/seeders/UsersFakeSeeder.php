<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersFakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fakeUser = Faker::create('id_ID');
        for ($i=0; $i < 5; $i++) {
            DB::table('users')->insert([
                'name' => $fakeUser->name,
                'email' => $fakeUser->email,
                'email_verified_at' => $fakeUser->dateTime(),
                'password' => Hash::make('password'),
                'created_at' => $fakeUser->dateTime(),
                'updated_at' => $fakeUser->dateTime()
            ]);
        }
    }
}
