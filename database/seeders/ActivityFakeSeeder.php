<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ActivityFakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fakeActivity = Faker::create('id_ID');
        for ($i=0; $i < 3; $i++) {
            DB::table('activities')->insert([
                'name'=>$fakeActivity->text(50),
                'created_at'=>$fakeActivity->dateTime,
                'updated_at'=>$fakeActivity->dateTime
            ]);
        }
    }
}
