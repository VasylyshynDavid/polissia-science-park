<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Carbon;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $allowedLocales = ['uk', 'en'];

        $localeFromQuery = $request->query('locale');

        if (in_array($localeFromQuery, $allowedLocales, true)) {
            $locale = $localeFromQuery;
            session(['locale' => $locale]);

            if ($locale === 'uk') {
                cookie()->queue(cookie()->forget('locale'));
            } else {
                cookie()->queue(cookie('locale', 'en', 60 * 24));
            }
        } else {
            $locale = session('locale')
                ?? $request->cookie('locale')
                ?? config('app.locale', 'uk');
        }

        if (!in_array($locale, $allowedLocales, true)) {
            $locale = 'uk';
        }

        App::setLocale($locale);
        Carbon::setLocale($locale);
        View::share('currentLocale', $locale);

        return $next($request);
    }
}
