<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Chapter 3 - Relations

<div style='text-align:justify'>
Mengidentifikasi dan memahami berbagai jenis relasi yang tersedia, termasuk <span style='font-weight:bold'> One to One, One to Many, Many to Many, Has Many Through, dan Polymorphic Relations</span>. Selanjutnya, mempelajari cara mengimplementasikan relasi ini dalam model Laravel, termasuk penggunaan metode yang disediakan oleh Eloquent ORM untuk memudahkan pengelolaan data.</div> <br>

# Daftar Isi

1.  [One to One Relation](#one-to-one-relation)
    -   [Membuat One to One Relationship](#membuat-one-to-one-relationship)
    -   [Implementasi One to One Relationship](#implementasi-one-to-one-relationship)
2. [One to Many Relation]()

## One to One Relation

<div style='text-align:justify'>
One-to-One Relationship adalah jenis relasi di mana satu entitas berhubungan dengan tepat satu entitas lainnya. Dalam konteks basis data, ini berarti <span style='font-weight:bold'>satu baris dalam satu tabel berhubungan dengan satu baris dalam tabel lain</span>. Dokumentasi lengkap dapat dilihat pada <a href='https://laravel.com/docs/12.x/eloquent-relationships#one-to-one'>link ini</a>.</div>

### Membuat One to One Relationship

1. Membuat dua Migration Database.

```
php artisan make:migration ExampleCreateTable
```

2. Pada saat membuat salah satu table pastikan untuk membuat `primary key` dan `foreign key`.

```
 Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('phone');
            $table->foreignId('employee_id')->constrained('employees');
            $table->timestamps();
        });
```

3. Membuat model pada tabel-tabel yang sudah dibuat.

```
php artisan make:model ExampleModel
```

### Implementasi One to One Relationship

1. Menggunakan method `hasOne` pada tabel utama untuk dapat mengakses data pada tabel lainnya.

```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public function contact(){
        return $this->hasOne(Contact::class);
    }
}
```

Dengan begitu tabel `Employee` dapat mengakses data pada tabel `Contact`.

2. Menggunankan `belongsTo` pada tabel yang direlasikan (contact) agar tabel `contact` dapat mengakses data pada tabel `Employee`

```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
```

## One to Many Relation
<div style='text-align:justify'>
One-to-Many Relationship adalah jenis relasi di mana satu entitas berhubungan dengan lebih dari satu entitas lainnya. Dalam konteks basis data, ini berarti <span style='font-weight:bold'>satu baris dalam satu tabel berhubungan dengan lebih dari satu baris dalam tabel lain</span>. Dokumentasi lengkap dapat dilihat pada <a href='https://laravel.com/docs/12.x/eloquent-relationships#one-to-many'>link ini</a> dan dokumentasi tentang Eloquent ORM dapat dilihat pada <a href='https://laravel.com/docs/12.x/eloquent'>link ini</a>.</div>

### Membuat One to Many Relationship
Cara pembuatan ```One to Many Relation``` memiliki cara yang sama dengan [One to One Relation](#membuat-one-to-one-relationship).

### Implementasi One to Many Relationship
1. Menggunakan method ```hasMany()``` pada tabel utama agar dapat melakukan relasi ke banyak data.
```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    public function products(){
        return $this->hasMany(Product::class);
    }
}
```

2. Menggunakan method ```belongsTo()``` sebagai invers agar tabel relasi dapat mengakses balik data tabel utama.
```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function store(){
        return $this->belongsTo(Store::class);
    }
}
```
3. Membuat ```Eloquent ORM``` pada controller berguna untuk melakukan query pada data.
```
class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stores = Store::with('products')->get();
        return view('store', ['stores' => $stores]);
    }
}
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
