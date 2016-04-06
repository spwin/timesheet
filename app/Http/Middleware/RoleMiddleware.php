<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RoleMiddleware
{
    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        switch($role){
            case 'advanced' :
                if ($request->user()->role != 'admin' && $request->user()->role != 'manager') {
                    return Redirect::action('DefaultController@index');
                }
                break;
            default :
                if ($request->user()->role != $role) {
                    return Redirect::action('DefaultController@index');
                }
                break;
        }
        return $next($request);
    }

}