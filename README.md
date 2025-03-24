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
    - [Konsep Dasar Controller](#konsep-dasar-controller)
    - [Membuat Controller](#membuat-controller)
    - [Example](#example-1)
3. [View](#view)
    - [Konsep Dasar View](#konsep-dasar-view)
    - [Membuat View](#membuat-view)
    - [Example](#example-2)
4. [Routing]()

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

## Controller
<div style="text-align:justify">Controller di Laravel adalah komponen yang bertanggung jawab untuk menangani logika aplikasi. Mereka berfungsi sebagai penghubung antara model dan tampilan (view). Controller mengelola permintaan HTTP, memproses data, dan mengembalikan respons yang sesuai. Dengan menggunakan controller, Anda dapat memisahkan logika aplikasi dari logika tampilan, sehingga membuat kode lebih terstruktur dan mudah dikelola.</div>

### Konsep Dasar Controller
1. ```Organisasi Kode```: Controller membantu mengoraganisasi kode dengan memisahkan logika aplikasi dari view (tampilan).
2. ```Routing```: Controller dapat digunakan untuk menangani rute yang lebih kompleks dan mengelola beberapa metode dalam satu kelas.
3. ```Depedency Injection```: Laravel mendukung depedency Injection, yang memungkinkan untuk menyuntikkan depedency ke dalam controller.
4. ```Resource Controller```: Mengelola CRUD (Create, Read, Update, Delete) secara otomatis.
5. ```Single Action Controller```: Mengelola satu aksi atau metode.

### Membuat Controller
```
php artisan make:controller ExampleNameController
```
Command tersebut bertujuan untuk membuat file controller baru yang terletak pada:
- Laravel-Tutorial
    - app
        - Http
            - Controllers

Untuk penamaan file controller sama dengan model, yaitu bersifat singular atau tunggal.

### Example
```
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ExampleNameController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
}
```

## View
<div style="text-align:justify">
View di Laravel adalah komponen yang bertanggung jawab untuk menampilkan data kepada pengguna. View biasanya berisi HTML dan dapat menggunakan Blade, templating engine yang disediakan oleh Laravel, untuk membuat tampilan yang dinamis dan interaktif. Dengan menggunakan view, Anda dapat memisahkan logika presentasi dari logika aplikasi, sehingga membuat kode lebih terstruktur dan mudah dikelola. Dokumentasi lengkap tentang View dapat dilihat pada <a href="https://laravel.com/docs/12.x/views#main-content">link ini</a>.
</div>

### Konsep Dasar View
1. ```Blade Templating Engine```: Memungkinkan untuk menggunakan sintaks yang bersih dan sederhana untuk membuat tampilan, didasari dengan HTML serta memungkinkan untuk menggunakan sintaks PHP.
2. ```Penggunaan Layout```: Dapat membuat layout dasar yang bisa digunakan kembali di berbagai view, sehingga menghindari pengulangan kode.
3. ```Pengiriman Data ke View```: Dapat mengirimkan data dari controller ke view menggunakan memthod ```view()```.

### Membuat view
```
php artisan make:view ExampleNameView
```
Command tersebut befungsi untuk membuat file view baru dengan format filenya adalah ```blade (ExampleNameView.blade.php)```, serta terletak pada:
- Laravel-Tutorial
    - resources
        - views

### Example
```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
</head>
<body>
    <h1>Product List</h1>
    <ul>
        @foreach ($products as $product)
            <li>{{ $product['name'] }} - ${{ $product['price'] }}</li>
        @endforeach
    </ul>
</body>
</html>
```

## Routing
<div style='text-align:justify'>Routing di Laravel adalah cara untuk mendefinisikan jalur (URL) yang dapat diakses oleh aplikasi Anda. Routing menghubungkan URL yang diminta oleh pengguna dengan fungsi atau controller yang akan menangani permintaan tersebut. Dengan routing, Anda dapat mengatur bagaimana aplikasi Anda merespons permintaan HTTP (GET, POST, PUT, DELETE, dll.). Dokumentasi lengkap tentang Routing dapat dilihat pada <a href='https://laravel.com/docs/12.x/routing'>link ini</a>.
</div>

### Konsep Dasar Routing
1. ```Definisi Route Method```: Dapat mendefinisikan route untuk berbagai metode HTTP seperti ```GET, HEAD, POST, PUT, PATCH, DEL```.
2. ```Paramater Dinamis```: Mendukung paramater dinamis dalam URL, memungkinkan untuk menangkap data dari URL.
3. ```Middleware```: Untuk menangani autentikasi, logging, dan hal lainnya.
4. ```Grouping```: Dapat mengelompokkan rute untuk mengatur dan menerapkan middleware secara bersamaan.

### Struktur Dasar Routing
Terdapat 3 jenis file API yang terletak pada:
- Laravel-Tutorial
    - routes
        - ```api.php```
        - ```console.php```
        - ```web.php```

3 jenis file tersebut memiliki fungsinya masing-masing, diantaranya:
- ```api.php```: digunakan untuk mendefinisikan routing yang berhubungan dengan API. Rute di sini biasanya digunakan untuk aplikasi yang berkomunikasi dengan frontend atau aplikasi lain melalui API.  
    Rute di sini **menggunakan middleware** api, yang **tidak menyertakan session** state dan CSRF protection, sehingga lebih ringan dan cepat untuk permintaan API.

- ```console.php```: File ini digunakan untuk mendefinisikan rute yang berhubungan dengan perintah Artisan. Ini memungkinkan Anda untuk menambahkan perintah kustom yang dapat dijalankan melalui command line.
    Rute di sini **tidak berhubungan** dengan HTTP, tetapi lebih kepada perintah yang dapat **dieksekusi di terminal**.

- ```web.php```: File ini digunakan untuk mendefinisikan routing yang berhubungan dengan aplikasi web. Ini mencakup semua rute yang akan diakses melalui browser.
    Rute di sini biasanya menggunakan middleware web, yang menyediakan fitur seperti session state, CSRF protection, dan cookie encryption.

### Example
- api.php
```
Route::get('/products', 'ProductController@index');
Route::post('/products', 'ProductController@store');
```

- console.php
```
Artisan::command('greet {name}', function ($name) {
    $this->info("Hello, $name");
});
```

- web.php
```
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

// atau jika menggunakan controller

Route::get('product/{id}', [ProductController::class, 'show']); //show merupakan method yang ada pada controller
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
