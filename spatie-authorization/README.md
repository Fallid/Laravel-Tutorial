<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Spatie Authorization
This project implement Spatie-Permission from how to setup the package untill how to using it.
### Required System
* VS-Code or etc.
* XAMPP
* Composer
* MySql

### Steps setup spatie-permission
* cd spatie-authorization
* composer require laravel/breeze --dev
* php artisan breeze:install
* php artisan migrate
* composer require spatie/laravel-permission
* php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
* php artisan optimize:clear
* php artisan migrate
### Implement spatie-permission
* add spatie HasRole trait to User model(s). You can see it at [User.php](https://github.com/Fallid/Laravel-Tutorial/blob/master/spatie-authorization/app/Models/User.php)
* register package middleware aliases for easy reference. you can see it at [app.php](https://github.com/Fallid/Laravel-Tutorial/blob/master/spatie-authorization/bootstrap/app.php)
* create database seeder for roles. you can see it at [RolesSeeder.php](https://github.com/Fallid/Laravel-Tutorial/blob/master/spatie-authorization/database/seeders/RolesSeeder.php)
* create database seeder for admin. you can see it at [AdminSeeder.php](https://github.com/Fallid/Laravel-Tutorial/blob/master/spatie-authorization/database/seeders/AdminSeeder.php)
* create database seeder for users. you can see it at [UsersSeeder.php](https://github.com/Fallid/Laravel-Tutorial/blob/master/spatie-authorization/database/seeders/UsersSeeder.php)
* after finish create database seeder, you can migrate it using php artisan migrate:fresh --seed

### Blade Directives
* create view dashboard for admin. example file [admin.blade.php](https://github.com/Fallid/Laravel-Tutorial/blob/master/spatie-authorization/resources/views/layouts/admin.blade.php),  [index.blade.php](https://github.com/Fallid/Laravel-Tutorial/blob/master/spatie-authorization/resources/views/admin/index.blade.php), and [AdminLayout.php](https://github.com/Fallid/Laravel-Tutorial/blob/master/spatie-authorization/app/View/Components/AdminLayout.php)
* create view for user. example file [dashboard.blade.php](https://github.com/Fallid/Laravel-Tutorial/blob/master/spatie-authorization/resources/views/dashboard.blade.php), and [AppLayout.php](https://github.com/Fallid/Laravel-Tutorial/blob/master/spatie-authorization/app/View/Components/AppLayout.php)
* add permission directives using Roles(). For the example [navigation.blade.php](https://github.com/Fallid/Laravel-Tutorial/blob/master/spatie-authorization/resources/views/livewire/layout/navigation.blade.php), 
* create route for admin and user. You can see it at [web.php](https://github.com/Fallid/Laravel-Tutorial/blob/master/spatie-authorization/routes/web.php)
* php artisan route:list to list route that has been created.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
