<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;

use Closure;

class CheckSeller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = Auth::id();
        $user = User::findOrFail($id);
        $admin = Role::where('name', '=', 'Seller')->get();

        if ($user->role == $admin[0]->id) {
            return $next($request);
        }

        return redirect('home');
    }
}
