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
2. [Faker](#faker)
3. [Menambahkan Data](#menambahkan-data)
4. [Mengupdate Data](#mengupdate-data)
5. [Kesimpulan](#kesimpulan)

## Migration
Migration di Laravel adalah fitur yang memungkinkan Anda untuk mengelola skema basis data dengan cara yang terstruktur dan mudah. Dengan menggunakan migration, Anda dapat membuat, mengubah, dan menghapus tabel dalam basis data menggunakan kode PHP, bukan dengan perintah SQL secara langsung. Ini sangat berguna untuk kolaborasi tim dan menjaga konsistensi skema basis data.
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

## Faker

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
