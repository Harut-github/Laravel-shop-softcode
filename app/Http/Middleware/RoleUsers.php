<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class RoleUsers
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
       $user =  Auth::user();
        if(!$user->isAdmin()){
            session()->flash('warning','you do not have status');
            return redirect()->route('/login');
        }
        return $next($request);
    }
}
