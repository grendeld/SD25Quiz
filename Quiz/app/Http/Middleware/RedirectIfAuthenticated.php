<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = ['students','instructors','admins'])
    {
        //dd($guard);
        if(is_array($guard)){
            foreach( $guard as $g){
                if (Auth::guard($g)->check()) {
                    $temp = $g;
                }
            }
        }
        else
        {
            if (Auth::guard($guard)->check()) {
                    $temp = $guard;
                }
        }
        
        if(isset($temp))
        {
            switch($temp){
                    case 'students':
                        return redirect('/StudentHome');
                        break;
                    case 'instructors':
                        return redirect('/instructorHome');
                        break;
                    case 'admins':
                    return redirect('/adminHome');
                        break;
                }
        }
        
     
        return $next($request);
    }
}
