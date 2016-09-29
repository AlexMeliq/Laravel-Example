<?php

namespace App\Http\Middleware;

use App\User;
use Bican\Roles\Models\Role;
use Closure;
use Illuminate\Support\Facades\Auth;


class Roles
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
        if(Auth::user())
        {
            $user = Auth::user()->id;
            $userd = User::find($user);
            if ($userd->is('admin')){
                return $next($request);
            }
        }
        return redirect()->action('PostController@index');
    }
}
