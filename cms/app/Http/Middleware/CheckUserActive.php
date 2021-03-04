<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserActive
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
        if (auth()->user()->status == 0) {
                return redirect()->route('viewprofile', ['id' => auth()->user()->id]);
        }
        if (auth()->user()->status == 2) {
            if(auth()->user()->role_id==0){
                return redirect()->route('login');
            }

            if(auth()->user()->role_id==1){
                return redirect()->route('logins');
            }
            if(auth()->user()->role_id==2){
                return redirect()->route('logins');
            }
        }
        return $next($request);
    }
}
