<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check() && Auth::user()->user_type=='admin')
        {
            return $next($request);
        }
        else
        {
            abort(403);
        }
        // $adminRole = Auth::user()->roles()->pluck('name');
        // if($adminRole->contains('admin'))
        // {
        //     return $next($request);
        // }
        
        
    }
}
