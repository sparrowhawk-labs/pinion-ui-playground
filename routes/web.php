<?php

use Illuminate\Support\Facades\Route;

Route::get('/',       fn () => view('pages.overview'))->name('overview');
Route::get('/button', fn () => view('pages.button'))->name('button');
Route::get('/alert',  fn () => view('pages.alert'))->name('alert');
Route::get('/badge',  fn () => view('pages.badge'))->name('badge');
Route::get('/card',   fn () => view('pages.card'))->name('card');
Route::get('/avatar', fn () => view('pages.avatar'))->name('avatar');
Route::get('/input',    fn () => view('pages.input'))->name('input');
Route::get('/textarea', fn () => view('pages.textarea'))->name('textarea');
Route::get('/select',   fn () => view('pages.select'))->name('select');
Route::get('/checkbox', fn () => view('pages.checkbox'))->name('checkbox');
Route::get('/radio',    fn () => view('pages.radio'))->name('radio');
Route::get('/toggle',   fn () => view('pages.toggle'))->name('toggle');
Route::get('/file-upload', fn () => view('pages.file-upload'))->name('file-upload');

Route::get('/icons', function () {
    $solarPath = config('icons.libraries.solar.path');
    $jsonPath = base_path(dirname($solarPath, 2) . '/icons.json');
    $meta = file_exists($jsonPath) ? json_decode(file_get_contents($jsonPath), true) : [];

    // Enumerate icon names available in emoji/pixel libraries (file stem, no variant suffix).
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

// Serve raw SVGs from any registered library so the icon browser can use <img src>.
// Synthetic-variant fallback: if `{name}-{variant}.svg` is missing, strip the variant
// suffix and try `{name}.svg` — lets emoji/pixel libraries respond to variant tabs
// without storing separate per-variant assets.
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
