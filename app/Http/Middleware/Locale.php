<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;

class Locale
{
    /**
     * @var string
     */
    public static $mainLanguage = 'en';

    /**
     * @var array
     */
    public static $languages = ['en', 'ru', 'uz', 'de'];


    /**
     * @param $request
     * @return |null
     */
    public static function getLocale()
    {
        $uri = Request::path();
        $segmentsURI = explode('/', $uri);

        if (!empty(current($segmentsURI)) && in_array(current($segmentsURI), self::$languages)) {

            return current($segmentsURI);

        }
        return null;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = self::getLocale();

        if($locale) App::setLocale($locale);

        else App::setLocale(self::$mainLanguage);

        return $next($request);
    }
}
