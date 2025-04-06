<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {

        // dd($user->roles()->whereIn('role', $roles)->exists());
        if (Auth::check()) {
            $auth = Auth::user();
            $user = User::findOrFail($auth->id);
            if ($user->roles()->whereIn('role', $roles)->exists()) {
                return $next($request);
            }
        }else{
            return Redirect('login');
        }
        abort(403);
    }
}
