<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = session('locale', $request->cookie('locale', config('app.locale', 'uk')));
        if (!in_array($locale, ['uk', 'en'], true)) {
            $locale = 'uk';
        }

        App::setLocale($locale);
        Carbon::setLocale($locale);
        View::share('currentLocale', $locale);

        return $next($request);
    }
}
