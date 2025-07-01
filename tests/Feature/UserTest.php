<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Database\Seeders\RolesFakeSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

uses(RefreshDatabase::class);
describe('User Registration feature test', function () {
    beforeEach(function(){
        // ----- Arrange -----
        $this->seed(RolesFakeSeeder::class);
    });
    test('user can access to endpoint register', function (){
        // ----- ACT -----
        $response = $this->get('/register');

        // ----- Assert -----
        $response->assertOk();

    })->group('authentication', 'registration');

    test('a user can register an account', function () {
        // ----- Arrange -----
        $memberRole = Role::where('role', 'member')->first();
        // find member role that has been created
        $userData = [
            'name' => 'User Dummy',
            'email' => 'user.dummy@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'role' => $memberRole->id
        ];
        // request data to post into endpoint /register (the request must same with form in view)

        // ----- Act -----
        $response = $this->post('/register', $userData);
        // post the data into endpoint

        // ----- Assert -----
        $response->assertRedirect('/home');
        // expect after sending data and success must redirect to home

        $this->assertDatabaseHas('users', [
            'email' => 'user.dummy@example.com',
        ]);
        // expect the database has the data that has been posted

        $this->assertAuthenticated();
        // expect the user are logged
        $this->assertCredentials([
            'email' => 'user.dummy@example.com',
            'password' => 'password123'
        ]);
        // expect the data login are matches in database

        $user = User::where('email', 'user.dummy@example.com')->first();
        expect($user)->not->toBeNull();
        expect($user->name)->toBe('User Dummy');
        expect($user->email)->toBe('user.dummy@example.com');
        expect(Hash::check('password123', (string) $user->password))->toBeTrue();
        expect($user->roles->first()->role)->toBe('member');
        expect($user->roles)->toHaveCount(1);
        // expect the specification data of user
    })->group('authentication', 'registration');
});
