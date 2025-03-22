<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersFakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $usersFaker = Faker::create('id_ID');
      for ($i=0; $i < 10; $i++) {
        DB::table('users')->insert([
           'name' => $usersFaker->name,
           'email' => $usersFaker->email,
           'email_verified_at' => $usersFaker->dateTime(),
           'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
      }
    }
}
