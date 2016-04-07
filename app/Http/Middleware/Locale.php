<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class Locale {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $language = Session::has('language') ? Session::get('language') : Config::get('app.locale');
        App::setLocale($language);
        $languages = [
            'lt' => 'lt_LT',
            'en' => 'en_EN'
        ];
        setlocale(LC_TIME, $languages[$language]);
        return $next($request);
    }

}