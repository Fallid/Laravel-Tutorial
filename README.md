<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Chapter 1 - Database
Chapter 1 ini akan mempelajari bagaimana cara mengkonfigurasi sebuah database, seperti membuat migration, melakukan migration, mengatur db, dan lain-lain.

# Daftar Isi

1. [Migration](#migration)
    - [Membuat Migration](#membuat-migration)
    - [Menjalankan Migration](#menjalankan-migration)
    - [Metode Utama Migration](#metode-utama-migration)
    - [Example](#example)
2. [Seeding](#seeding)
    - [Konsep Dasar Seeding](#konsep-dasar-seeding)
    - [Membuat Seeding](#membuat-seeding)
    - [Example](#example-1)
3. [Faker](#faker)
4. [Mengupdate Data](#mengupdate-data)
5. [Kesimpulan](#kesimpulan)

## Migration
<div style="text-align:justify">
Migration di Laravel adalah fitur yang memungkinkan Anda untuk mengelola skema basis data dengan cara yang terstruktur dan mudah. Dengan menggunakan migration, Anda dapat membuat, mengubah, dan menghapus tabel dalam basis data menggunakan kode PHP, bukan dengan perintah SQL secara langsung. Ini sangat berguna untuk kolaborasi tim dan menjaga konsistensi skema basis data.
</div>

### Membuat Migration
```
php artisan make:migration create_examples_table
```
Command diatas merupakan cara membuat sebuah file migration baru yang terletak pada:
- Laravel-Tutorial
    - database
        - migrations
Saat membuat migration, pastikan penamaannya bersifat plural atau jamak. Contoh students, products, days. 
### Menjalankan Migration
```
php artisan migrate
```
Command yang digunakan untuk menjalankan migrasi 
```
php artisan migrate:rollback
```
Command ini akan menjalankan metode down() dari migration terakhir yang dijalankan.

```
php artisan migrate:status
```
Command ini untuk melihat status migration yang telah dijalankan 

### Metode Utama Migration

Setiap migration memiliki dua metode utama, yaitu:
```
up()
```
Digunakan untuk mendefinisikan perubahan yang akan diterapkan ke basis data, seperti membuat tabel atau menambahkan kolom.
```
down()
```
Digunakan untuk membatalkan perubahan yang dilakukan di metode up(), seperti menghapus tabel atau kolom.

### Example
```
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
```
Untuk migration lebih lengkapnya dapat membaca dokumentasi [ini](https://laravel.com/docs/12.x/migrations#tables)

## Seeding
<div style="text-align: justify">
Laravel seeding adalah fitur yang memungkinkan Anda untuk mengisi basis data dengan data awal (dummy data) secara otomatis. Ini sangat berguna untuk pengujian dan pengembangan, di mana Anda mungkin memerlukan data untuk menguji aplikasi Anda tanpa harus memasukkan data secara manual.
</div>

### Konsep Dasar Seeding
1. Tujuan:
    - Memudahkan pengembang untuk mengisi basis data dengan data yang diperlukan untuk pengujian.
    - Menghindari pengulangan proses pengisian data secara manual

2. Seeding vs Migration:
    - Migration: Digunakan untuk membuat dan mengubah struktur tabel dalam basis data.
    - Seeding: Digunakan untuk mengisi tabel dengan data.

### Membuat Seeding
```
php artisan make:seeder ExampleNamesTableSeeder
```
<div style="text-align:justify">
Command diatas bertujuan untuk membuat sebuah file seeder berdasarkan nama yang sudah ditentukan, untuk penamaan memiliki aturan yang sama seperti migration yaitu bersifat plural atau jamak. File seeder baru terletak pada:
</div>

- Laravel-Tutorial
    - database
        - seeders

### Menjalankan Seeding
```
php artisan db:seed --class=ExampleNamesTableSeeder
```
Command tersebut bertujuan untuk menjalankan seeder berdasarkan file tertentu

```
php artisan db:seed
```
Lalu untuk command ini bertujuan menjalankan semua seeder yang terdaftar di ```DatabaseSeeder.php```

### Example
#### ```ExampleNamesTableSeeder.php```
```
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExampleNamesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Product 1',
                'price' => 100,
                'description' => 'Description for Product 1',
            ],
            [
                'name' => 'Product 2',
                'price' => 200,
                'description' => 'Description for Product 2',
            ],
            [
                'name' => 'Product 3',
                'price' => 300,
                'description' => 'Description for Product 3',
            ],
        ]);
    }
}
```

#### ```DatabaseSeeder.php```
```
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

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call(ProductsSeeder::class);
    }
}
```

## Faker
<div style="text-align: justify">
Laravel Faker adalah library yang digunakan untuk menghasilkan data palsu (dummy data) secara otomatis. Ini sangat berguna dalam pengembangan aplikasi, terutama saat Anda perlu mengisi basis data dengan data yang realistis untuk pengujian atau pengembangan. Dengan Faker, Anda dapat menghasilkan berbagai jenis data, seperti nama, alamat, nomor telepon, dan banyak lagi.</div>

### Konsep Dasar Faker
1. Beragam Tipe Data:
    -   Faker Dapat menghasilkan berbagai tipe data, termasuk teks, angka, tanggal, email, dan lain-lain.
2. Kustomisasi:
    - Dapat menyesuaikan data yang dihasilkan sesuai dengan kebutuhan aplikasi yang dikembangkan.
3. Integrasi Dengan Seeder:
    - Faker sering digunakan bersama dengan seeder untuk mengisi basis data dengan data palsu.

### Installing
Untuk dapat menginstall Laravel Faker, perlu dipastikan bahwa versi php yang digunakan adalah PHP >= 7.4
```
composer require fakerphp/faker
```
Command diatas merupakan command untuk melakukan install _Laravel Faker_ menggunakan composer.

### Membuat Faker
#### 1. Membuat seeder
- Tutorial membuat seedar dapat dilihat pada [Membuat Seeder](#membuat-seeding).
#### 2. Implementasi Faker
```
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ExampleFakerSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID'); //Menggenerate data palsu dengan standar bahasa indonesia

        for ($i = 0; $i < 10; $i++) {
            DB::table('products')->insert([
                'names' => $faker->word,
                'stocks' => $faker->randomNumber(2), // Menghasilkan 2 digit angka.
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
```
#### 3. Menjalankan Seeder
- Tutorial menjalankan seeder dapat dilihat pada [Menjalankan Seeding](#menjalankan-seeding).

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
