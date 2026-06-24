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
        $localeSessionVersion = 'uk-default-2026-06-24';

        $localeFromQuery = $request->query('locale');

        if (in_array($localeFromQuery, $allowedLocales, true)) {
            $locale = $localeFromQuery;
            session([
                'locale' => $locale,
                'locale_session_version' => $localeSessionVersion,
            ]);
        } elseif (session('locale_session_version') === $localeSessionVersion) {
            $locale = session('locale', 'uk');
        } else {
            // Ukrainian is the required primary language. Ignore stale EN cookies/sessions
            // from previous local testing so the home page opens in Ukrainian by default.
            $locale = 'uk';
            session([
                'locale' => 'uk',
                'locale_session_version' => $localeSessionVersion,
            ]);
            cookie()->queue(cookie()->forget('locale'));
        }

        if (!in_array($locale, $allowedLocales, true)) {
            $locale = 'uk';
            session(['locale' => 'uk']);
        }

        if ($locale === 'uk') {
            cookie()->queue(cookie()->forget('locale'));
        } else {
            cookie()->queue(cookie('locale', 'en', 60 * 24));
        }

        App::setLocale($locale);
        Carbon::setLocale($locale);
        View::share('currentLocale', $locale);

        return $next($request);
    }
}
