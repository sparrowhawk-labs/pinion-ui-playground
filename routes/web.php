<?php

use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Locale-prefixed user-facing pages
|--------------------------------------------------------------------------
|
| Every visible page lives under /{locale}/... where locale ∈
| {ja, en, zh-Hans, zh-Hant}. The SetLocale middleware reads the
| route param and calls App::setLocale() so __() picks the right strings.
|
| Per-URL prefix makes the site fully CDN-cacheable: each (page x locale)
| combination is a distinct URL with its own cache key. spatie/laravel-export
| (dev tool) crawls all these combinations at build time and emits one HTML
| per URL into `dist/`, which deploys directly to S3 + CloudFront — no PHP
| runtime in production.
|
| Iframe demos and asset routes live OUTSIDE the locale prefix because they
| are not user-facing (the iframe demo is fixed-language; vendor-icons just
| serves raw SVG).
|
*/

Route::prefix('{locale}')
    ->where(['locale' => 'ja|en|zh-Hans|zh-Hant'])
    ->middleware(SetLocale::class)
    ->group(function () {
        Route::get('/',           fn () => view('pages.overview'))->name('overview');
        Route::get('/components', fn () => view('pages.components'))->name('components');
        Route::get('/button',     fn () => view('pages.button'))->name('button');
        Route::get('/button-group', fn () => view('pages.button-group'))->name('button-group');
        Route::get('/alert',      fn () => view('pages.alert'))->name('alert');
        Route::get('/badge',      fn () => view('pages.badge'))->name('badge');
        Route::get('/card',       fn () => view('pages.card'))->name('card');
        Route::get('/avatar',     fn () => view('pages.avatar'))->name('avatar');
        Route::get('/avatar-group', fn () => view('pages.avatar-group'))->name('avatar-group');
        Route::get('/input',      fn () => view('pages.input'))->name('input');
        Route::get('/textarea',   fn () => view('pages.textarea'))->name('textarea');
        Route::get('/select',     fn () => view('pages.select'))->name('select');
        Route::get('/checkbox',   fn () => view('pages.checkbox'))->name('checkbox');
        Route::get('/radio',      fn () => view('pages.radio'))->name('radio');
        Route::get('/toggle',     fn () => view('pages.toggle'))->name('toggle');
        Route::get('/file-upload', fn () => view('pages.file-upload'))->name('file-upload');
        Route::get('/pagination',  fn () => view('pages.pagination'))->name('pagination');
        Route::get('/notification-system', fn () => view('pages.notification-system'))->name('notification-system');
        Route::get('/table-scroll', fn () => view('pages.table-scroll'))->name('table-scroll');
        Route::get('/progress',   fn () => view('pages.progress'))->name('progress');
        Route::get('/skeleton',   fn () => view('pages.skeleton'))->name('skeleton');
        Route::get('/spinner',    fn () => view('pages.spinner'))->name('spinner');
        Route::get('/kbd',        fn () => view('pages.kbd'))->name('kbd');
        Route::get('/tooltip',    fn () => view('pages.tooltip'))->name('tooltip');
        Route::get('/indicator',  fn () => view('pages.indicator'))->name('indicator');
        Route::get('/breadcrumb', fn () => view('pages.breadcrumb'))->name('breadcrumb');
        Route::get('/stat',       fn () => view('pages.stat'))->name('stat');
        Route::get('/divider',    fn () => view('pages.divider'))->name('divider');
        Route::get('/rating',     fn () => view('pages.rating'))->name('rating');
        Route::get('/range-slider', fn () => view('pages.range-slider'))->name('range-slider');
        Route::get('/input-number', fn () => view('pages.input-number'))->name('input-number');
        Route::get('/input-group',  fn () => view('pages.input-group'))->name('input-group');
        Route::get('/pin-input',    fn () => view('pages.pin-input'))->name('pin-input');
        Route::get('/popover',      fn () => view('pages.popover'))->name('popover');
        Route::get('/stepper',      fn () => view('pages.stepper'))->name('stepper');
        Route::get('/timeline',   fn () => view('pages.timeline'))->name('timeline');
        Route::get('/dropdown',   fn () => view('pages.dropdown'))->name('dropdown');
        Route::get('/modal',      fn () => view('pages.modal'))->name('modal');
        Route::get('/tabs',       fn () => view('pages.tabs'))->name('tabs');
        Route::get('/accordion',  fn () => view('pages.accordion'))->name('accordion');
        Route::get('/collapse',   fn () => view('pages.collapse'))->name('collapse');
        Route::get('/sidebar',    fn () => view('pages.sidebar'))->name('sidebar');

        Route::get('/demo/sidebar-left',         fn () => view('pages.demo.sidebar-left'));
        Route::get('/demo/sidebar-right',        fn () => view('pages.demo.sidebar-right'));
        Route::get('/demo/sidebar-no-backdrop',  fn () => view('pages.demo.sidebar-no-backdrop'));
        Route::get('/demo/sidebar-with-content', fn () => view('pages.demo.sidebar-with-content'));

        Route::get('/icons', function () {
            $solarPath = config('icons.libraries.solar.path');
            $jsonPath = base_path(dirname($solarPath, 2) . '/icons.json');
            $meta = file_exists($jsonPath) ? json_decode(file_get_contents($jsonPath), true) : [];

            $listLib = function (string $lib): array {
                $p = config("icons.libraries.$lib.path");
                if (!$p) return [];
                $dir = base_path($p);
                if (!is_dir($dir)) return [];
                $names = [];
                foreach (glob($dir . '/*.svg') as $f) {
                    $stem = pathinfo($f, PATHINFO_FILENAME);
                    $stem = preg_replace('/-(?:bold-duotone|bold|broken|line-duotone|linear|outline)$/', '', $stem);
                    $names[$stem] = true;
                }
                return array_keys($names);
            };

            return view('pages.icons', [
                'icons' => $meta['icons'] ?? [],
                'variants' => $meta['variants'] ?? [],
                'total' => $meta['total'] ?? 0,
                'emojiNames' => $listLib('fluent-emoji'),
                'pixelNames' => $listLib('pixelarticons'),
            ]);
        })->name('icons');
    });

/*
|--------------------------------------------------------------------------
| Non-localised routes
|--------------------------------------------------------------------------
| - Root `/` redirects to the JA homepage (default locale).
| - Iframe demo targets live at fixed paths (loaded inside <iframe>; not
|   user-navigable; locale-agnostic).
| - Vendor icon proxy serves raw SVGs to the icon browser.
*/

Route::get('/', fn () => redirect('/ja'));

Route::get('/_demo-lp',  fn () => view('_demo-lp'))->name('_demo-lp');
Route::get('/_demo-app', fn () => view('_demo-app'))->name('_demo-app');

Route::get('/vendor-icons/{library}/{file}', function (string $library, string $file) {
    if (!preg_match('/^[a-z0-9\-]+\.svg$/i', $file)) {
        abort(404);
    }
    $libraryPath = config('icons.libraries.' . $library . '.path');
    if (!$libraryPath) {
        abort(404);
    }

    $path = base_path($libraryPath . '/' . $file);
    if (!file_exists($path)) {
        $stripped = preg_replace('/-(?:bold-duotone|bold|broken|line-duotone|linear|outline)\.svg$/', '.svg', $file);
        if ($stripped !== $file) {
            $path = base_path($libraryPath . '/' . $stripped);
        }
        if (!file_exists($path)) {
            abort(404);
        }
    }

    $svg = file_get_contents($path);
    if (!str_contains($svg, 'xmlns=')) {
        $svg = preg_replace('/<svg\b/', '<svg xmlns="http://www.w3.org/2000/svg"', $svg, 1);
    }
    return response($svg, 200, [
        'Content-Type' => 'image/svg+xml',
        'Cache-Control' => 'public, max-age=3600',
    ]);
})->where('file', '.*');

/*
|--------------------------------------------------------------------------
| sitemap.xml
|--------------------------------------------------------------------------
|
| Enumerated from the locale-prefixed route group above so adding a new
| component page automatically lands in the sitemap on the next export.
| Each <url> includes <xhtml:link rel="alternate"> for every locale +
| x-default (= ja) so Google can serve the right language per visitor.
| Iframe demos (/_demo-app, /_demo-lp) and asset routes are excluded.
|
*/
Route::get('/sitemap.xml', function () {
    $locales = ['ja', 'en', 'zh-Hans', 'zh-Hant'];
    $base    = rtrim(config('app.url'), '/');

    $slugs = [];
    foreach (Route::getRoutes() as $r) {
        $uri = $r->uri();
        if (str_starts_with($uri, '{locale}')) {
            $slug = trim(substr($uri, strlen('{locale}')), '/');
            // Skip component sub-demos (/demo/*) — they're noindex'd in their
            // layout and don't deserve sitemap presence either.
            if (str_starts_with($slug, 'demo/')) {
                continue;
            }
            $slugs[$slug] = true;
        }
    }

    $xml  = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n";
    foreach (array_keys($slugs) as $slug) {
        $tail = $slug === '' ? '' : ('/' . $slug);
        foreach ($locales as $loc) {
            $xml .= "  <url>\n";
            $xml .= "    <loc>{$base}/{$loc}{$tail}</loc>\n";
            foreach ($locales as $alt) {
                $xml .= "    <xhtml:link rel=\"alternate\" hreflang=\"{$alt}\" href=\"{$base}/{$alt}{$tail}\"/>\n";
            }
            $xml .= "    <xhtml:link rel=\"alternate\" hreflang=\"x-default\" href=\"{$base}/ja{$tail}\"/>\n";
            $xml .= "  </url>\n";
        }
    }
    $xml .= '</urlset>' . "\n";

    return response($xml, 200, ['Content-Type' => 'application/xml']);
});
