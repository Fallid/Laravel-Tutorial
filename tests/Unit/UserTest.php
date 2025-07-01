<?php

namespace Tests\Unit;

use App\Models\Role;
use App\Models\User;
use Database\Seeders\RolesFakeSeeder;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

/**
 * @group authentication
 */

uses(TestCase::class, RefreshDatabase::class);

describe('User role unit tests', function () {

    beforeEach(function () {
        // ----- Arrange -----
        $this->seed(RolesFakeSeeder::class);
        $this->user = User::factory()->create();
    });

    test('is administrator return true if user has admin role', function () {
        // ----- Arrange -----
        $adminRole = Role::where('role', 'admin')->first();
        // find the admin role that has been created

        // ----- ACT -----
        $this->user->roles()->attach($adminRole);
        // assign admin role to current user

        // ----- Assert -----
        expect($this->user->isAdministrator())->toBeTrue();
        expect($this->user->roles->first()->role)->toBe('admin');
        expect($this->user->roles)->toHaveCount(1);
        // expect the current user has role admin and its true
    })->group('authentication', 'roles');

    test('is administrator return false and is guest return true if user has guest role', function () {
        // ----- Arrange -----
        $guestRole = Role::where('role', 'guest')->first();

        // ----- ACT -----
        $this->user->roles()->attach($guestRole);

        // ----- Asssert -----
        expect($this->user->isAdministrator())->toBeFalse();
        expect($this->user->isGuest())->toBeTrue();
        expect($this->user->roles)->toHaveCount(1);
        expect($this->user->roles->first()->role)->not->toBe('admin');
        expect($this->user->roles->first()->role)->not->toBe('member');
        expect($this->user->roles->first()->role)->toBe('guest');
    })->group('authentication', 'roles');

    test('is administrator return false and is member return true if user has member role', function () {
        // ----- Arrange -----
        $memberRole = Role::where('role', 'member')->first();

        // ----- ACT -----
        $this->user->roles()->attach($memberRole);

        // ----- Assert -----
        expect($this->user->isAdministrator())->toBeFalse();
        expect($this->user->isMember())->toBeTrue();
        expect($this->user->roles)->toHaveCount(1);
        expect($this->user->roles->first()->role)->not->toBe('admin');
        expect($this->user->roles->first()->role)->not->toBe('guest');
        expect($this->user->roles->first()->role)->toBe('member');
    })->group('authentication', 'roles');
});

describe('User registration unit test', function () {
    beforeEach(function () {
        // ----- Arrange -----
        $this->seed(RolesFakeSeeder::class);
        $this->user = User::factory()->create([
            'name' => 'User Admin',
            'email' => 'user.admin@test.com',
            'password' => Hash::make('12345678')
        ]);
    });

    test('can create an account with role admin', function () {
        // ----- Arrange -----
        $adminRole = Role::where('role', 'admin')->first();
        // find adminRole that has been created

        // ----- ACT -----
        $this->user->roles()->attach($adminRole);
        // assign the admin role to current user

        // ----- Assert -----
        expect($this->user->name)->toBe('User Admin');
        expect($this->user->email)->toBe('user.admin@test.com');
        expect(Hash::check('12345678', $this->user->password))->toBeTrue();
        // expect the specific account has been created

        expect($this->user->roles)->toHaveCount(1);
        expect($this->user->roles->first()->role)->toBe('admin');
        // expect the role is admin and only have one

        $this->assertDatabaseHas('role_user', [
            'user_id' => $this->user->id,
            'role_id' => $adminRole->id
        ]);
        $this->assertDatabaseHas('users', [
            'email' => 'user.admin@test.com'
        ]);
        // expect the data already save in database
    })->group('authentication', 'registration');

    test('can create an account with more than 1 role', function () {
        // ----- Arrange -----
        $adminRole = Role::where('role', 'admin')->first();
        $memberRole = Role::where('role', 'member')->first();

        // ----- ACT -----
        $this->user->roles()->attach([$adminRole->id, $memberRole->id]);
        // assign the roles into current user

        // ----- Assert -----
        expect($this->user->roles)->toHaveCount(2);
        expect($this->user->roles->pluck('role'))->toContain('admin', 'member');
        // expect the current user has multiple roles (admin and member) also make sure the roles only 2

        $this->assertDatabaseHas('role_user',[
            'user_id' => $this->user->id,
            'role_id' => $adminRole->id
        ]);
        $this->assertDatabaseHas('role_user',[
            'user_id' => $this->user->id,
            'role_id' => $memberRole->id
        ]);
        // expect the data save in database and attach to correct user
    })->group('authentication', 'registration');
});
