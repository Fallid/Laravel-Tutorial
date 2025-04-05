<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    public function edit()
    {
        $user = Auth::user();
        return view('update_password', ['user' => $user]);
    }

    public function update(Request $request)
    {
        // first way to update password (not recomended)
        // $user = Auth::user();
        // $user->update(['password' => Hash::make($request->new_password)]);

        // second way to update password
        $request->validate([
            'new_password' => ['required', 'min:8', 'confirmed']
        ]);
        $userID = Auth::id();
        User::findOrFail($userID)->update([['password' => Hash::make($request->new_password)]]);

        $request->session()->flash('Authentication','Update Password Successfully');

        return Redirect::back();
    }
}
