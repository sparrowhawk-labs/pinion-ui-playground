<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Pulls the `{locale}` route segment off the URL and pushes it into
     * Laravel's locale state so `__()` resolves to the right translations.
     *
     * The route group already constrains valid locales via `->where(...)`,
     * so any value reaching here is one of: ja, en, zh-Hans, zh-Hant.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->route('locale');
        if ($locale) {
            App::setLocale($locale);
        }
        return $next($request);
    }
}
