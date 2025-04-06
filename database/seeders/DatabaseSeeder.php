<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(EmployeesFakeSeeder::class);
        $this->call(ContactsFakeSeeder::class);
        $this->call(StoresFakeSeeder::class);
        $this->call(ProductsFakeSeeder::class);
        $this->call(ActivityFakeSeeder::class);
        $this->call(ActivityEmployeeFakeSeeder::class);
        $this->call(RolesFakeSeeder::class);
        $this->call(UsersFakeSeeder::class);
        $this->call(RoleUserFakeSeeder::class);
    }
}
