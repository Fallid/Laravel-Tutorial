<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Chapter 2 - Model, Controller, View, and Routing
Mempelajari pengertian, konsep dasar, penggunaan, dan contoh terhadap model, controller, view, dan routing.

# Daftar Isi
1. [Model](#model)
    - [Konsep Dasar Model](#konsep-dasar-model)
    - [Membuat Model](#membuat-model)
    - [Example](#example)
2. [Controller](#controller)
    - [Konsep Dasar Controller]()

## Model
<div style='text-align:justify'>
Model di Laravel adalah representasi dari tabel dalam basis data. Model berfungsi sebagai lapisan antara aplikasi dan basis data, memungkinkan Anda untuk berinteraksi dengan data menggunakan objek PHP. Dengan menggunakan model, Anda dapat melakukan operasi CRUD (Create, Read, Update, Delete) dengan lebih mudah dan terstruktur.
</div>

### Konsep Dasar Model
1. ```Eloquent ORM```: Laravel menggunakan ```Eloquent ORM``` yang memungkinkan developer untuk berinteraksi dengan basis data menggunakan syntax yang clean.
2. ```Relasi```: Memungkinkan untuk mendefinisikan relasi antar tabel, seperti ```one-to-one```, ```one-to-many```, dan ```many-to-many```.
3. ```Mutators dan Accessors```: Dapat mengubah nilai atribut saat menyimpan ke database (mutator) atau saat mengambil data (accessors)
4. ```Scopes```: Dapat mendefinisikan query yang sering digunakan sebagai metode dalam model.

### Membuat Model
```
php artisan make:model ExampleNameModel
```
Command diatas bertujuan untuk membuat file model baru dengan nama ExampleNameModel, file model tersebut terletak pada:
- Laravel-Tutorial
    - app
        - models

Perlu diperhatikan untuk penamaan model harus bersifat singular atau tunggal, seperti student, product, day.

### Example
```
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'description'];
}
```
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
