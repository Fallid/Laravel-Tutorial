<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class RoleUserFakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fakeRoleUser = Faker::create('id_ID');
        for ($i=0; $i < 5; $i++) {
            DB::table('role_user')->insert([
                'role_id' => $fakeRoleUser->numberBetween(1,3),
                'user_id' => $fakeRoleUser->numberBetween(1,5)
            ]);
        }
    }
}
