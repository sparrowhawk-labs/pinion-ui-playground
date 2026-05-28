<!DOCTYPE html>
@php
    // data-ja drives the JP font stack and is locked to locale=ja so end-users
    // never see a mismatched JA-script-but-Latin-fallback render.
    $htmlLocale = app()->getLocale();
    $dataJaAttr = $htmlLocale === 'ja' ? 'data-ja' : 'data-ja="off"';
@endphp
<html lang="{{ $htmlLocale }}" data-theme="light" data-tune="default" {!! $dataJaAttr !!}>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinion UI @yield('title')</title>

    {{-- SEO meta — canonical, hreflang alternates, Open Graph, Twitter Card.
         Per-page override: @section('description', '...') overrides the default.
         Per-page title is already handled via @section('title', '...'). --}}
    @php
        $seoUrl = url()->current();
        $seoBase = rtrim(config('app.url'), '/');
        $seoPath = request()->getPathInfo();
        $seoLocaleStrip = preg_replace('#^/(ja|en|zh-Hans|zh-Hant)(?=/|$)#', '', $seoPath);
        $seoIsLocalePage = $seoLocaleStrip !== $seoPath;
        $seoSlug = $seoIsLocalePage ? ($seoLocaleStrip ?: '') : '';
        $seoLocales = ['ja' => 'ja_JP', 'en' => 'en_US', 'zh-Hans' => 'zh_CN', 'zh-Hant' => 'zh_TW'];
        $seoOgLocale = $seoLocales[$htmlLocale] ?? 'en_US';
        $seoDefaultDesc = 'Pinion UI — Blade UI components for Laravel. Tailwind v4 + daisyUI v5 + Alpine.js. 46 anonymous components with 11-preset tune token system.';
    @endphp
    <meta name="description" content="@yield('description', $seoDefaultDesc)">
    <link rel="canonical" href="{{ $seoUrl }}">
    @if ($seoIsLocalePage)
        @foreach (array_keys($seoLocales) as $alt)
            <link rel="alternate" hreflang="{{ $alt }}" href="{{ $seoBase }}/{{ $alt }}{{ $seoSlug }}">
        @endforeach
        <link rel="alternate" hreflang="x-default" href="{{ $seoBase }}/ja{{ $seoSlug }}">
    @endif
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $seoUrl }}">
    <meta property="og:site_name" content="Pinion UI">
    <meta property="og:title" content="Pinion UI @yield('title')">
    <meta property="og:description" content="@yield('description', $seoDefaultDesc)">
    <meta property="og:locale" content="{{ $seoOgLocale }}">
    @foreach ($seoLocales as $alt => $altOg)
        @if ($alt !== $htmlLocale)
            <meta property="og:locale:alternate" content="{{ $altOg }}">
        @endif
    @endforeach
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Pinion UI @yield('title')">
    <meta name="twitter:description" content="@yield('description', $seoDefaultDesc)">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&family=Fredoka:wght@400;600&family=IBM+Plex+Sans:wght@400;500;600;700&family=Instrument+Sans:wght@400;500;700&family=Inter:wght@400;500;700&family=JetBrains+Mono:wght@400;500;700&family=Lora:ital,wght@0,400;0,500;0,700;1,400&family=M+PLUS+1+Code:wght@400;500;700&family=M+PLUS+1p:wght@400;500;700&family=Montserrat:wght@400;500;700;900&family=Noto+Sans+JP:wght@400;500;700&family=Nunito:wght@400;700;800&family=Outfit:wght@400;500;600;700&family=Playfair+Display:wght@400;700&family=Press+Start+2P&family=Quicksand:wght@400;500;700&family=Shippori+Mincho:wght@400;500;700&family=Space+Grotesk:wght@400;500;700&family=Space+Mono:wght@400;700&family=Zen+Maru+Gothic:wght@400;500;700&display=swap" rel="stylesheet">

    {{-- Restore theme/tune from localStorage before paint to avoid FOUC.
         data-ja is NOT in localStorage — it's server-rendered from locale above. --}}
    <script>
        (function () {
            var d = document.documentElement;
            var t = localStorage.getItem('pinion-theme');
            var u = localStorage.getItem('pinion-tune');
            if (t) d.setAttribute('data-theme', t);
            if (u) d.setAttribute('data-tune', u);
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-base-100 text-base-content min-h-screen" x-data="{
    theme: localStorage.getItem('pinion-theme') || 'light',
    tune: localStorage.getItem('pinion-tune') || 'default',
    ja: '{{ $htmlLocale }}' === 'ja',
    debug: localStorage.getItem('pinion-debug') === 'on',
    themes: ['pinion','light','dark','abyss','acid','aqua','autumn','black','bumblebee','business','caramellatte','cmyk','coffee','corporate','cupcake','cyberpunk','dim','dracula','emerald','fantasy','forest','garden','halloween','lemonade','lofi','luxury','night','nord','pastel','retro','silk','sunset','synthwave','valentine','winter','wireframe'],
    tunes: ['default','minimal','sharp','soft','playful','corporate','brutal','elegant','bold','pixel','tech'],
    setTheme(t) { this.theme = t; document.documentElement.setAttribute('data-theme', t); localStorage.setItem('pinion-theme', t); },
    setTune(t) { this.tune = t; document.documentElement.setAttribute('data-tune', t); localStorage.setItem('pinion-tune', t); },
    setJa(on) { this.ja = on; document.documentElement.setAttribute('data-ja', on ? '' : 'off'); },
    setDebug(on) { this.debug = on; localStorage.setItem('pinion-debug', on ? 'on' : 'off'); },
    // Debug mode mounts the same yielded content twice (lofi + night). The two
    // copies share name=... and id=... because the section is re-emitted
    // verbatim, so radios collide across panes (only one stays checked) and
    // labels link to the wrong input. Post-mount we suffix every name/id and
    // re-link label[for] within the pane — purely cosmetic in debug mode, no
    // impact on form submission semantics (this UI never POSTs).
    isolateDuplicates(root, suffix) {
        for (const el of root.querySelectorAll('input[name], select[name], textarea[name]')) {
            el.name = el.name + '__' + suffix;
        }
        const idMap = new Map();
        for (const el of root.querySelectorAll('[id]')) {
            const newId = el.id + '__' + suffix;
            idMap.set(el.id, newId);
            el.id = newId;
        }
        for (const el of root.querySelectorAll('label[for]')) {
            if (idMap.has(el.htmlFor)) el.htmlFor = idMap.get(el.htmlFor);
        }
        // Browser deduped same-name radios across the two panes at parse time —
        // by the time names are unique each radio is its own group, but the
        // unchecked side has already lost `.checked`. Restore from HTML's
        // `defaultChecked` (the parsed `checked` attribute) so each pane shows
        // the original state independently.
        for (const el of root.querySelectorAll('input[type=radio], input[type=checkbox]')) {
            el.checked = el.defaultChecked;
        }
    },
}">

    @php
        // Sidebar groups. Components are split by **whether they use Alpine.js**:
        //   - Static  → no x-data / no Alpine state. Pure Tailwind + daisyUI.
        //   - Dynamic → Alpine state (open/close, focus trap, char count, dismiss…).
        // Single source of truth for the sidebar.
        $navSections = [
            [
                'title' => 'pinion-ui',
                'subtitle' => 'Static',
                'badge' => null,
                'items' => [
                    ['slug' => '',           'label' => 'Overview'],
                    ['slug' => 'button',     'label' => 'Button'],
                    ['slug' => 'button-group', 'label' => 'Button Group'],
                    ['slug' => 'badge',      'label' => 'Badge'],
                    ['slug' => 'card',       'label' => 'Card'],
                    ['slug' => 'avatar',     'label' => 'Avatar'],
                    ['slug' => 'avatar-group', 'label' => 'Avatar Group'],
                    ['slug' => 'input',      'label' => 'Input'],
                    ['slug' => 'checkbox',   'label' => 'Checkbox'],
                    ['slug' => 'radio',      'label' => 'Radio'],
                    ['slug' => 'toggle',     'label' => 'Toggle'],
                    ['slug' => 'pagination', 'label' => 'Pagination'],
                    ['slug' => 'progress',   'label' => 'Progress'],
                    ['slug' => 'skeleton',   'label' => 'Skeleton'],
                    ['slug' => 'spinner',    'label' => 'Spinner'],
                    ['slug' => 'kbd',        'label' => 'Kbd'],
                    ['slug' => 'tooltip',    'label' => 'Tooltip'],
                    ['slug' => 'indicator',  'label' => 'Indicator'],
                    ['slug' => 'breadcrumb', 'label' => 'Breadcrumb'],
                    ['slug' => 'stat',       'label' => 'Stat'],
                    ['slug' => 'divider',    'label' => 'Divider'],
                    ['slug' => 'rating',     'label' => 'Rating'],
                    ['slug' => 'range-slider', 'label' => 'Range Slider'],
                    ['slug' => 'input-number', 'label' => 'Input Number'],
                    ['slug' => 'input-group',  'label' => 'Input Group'],
                    ['slug' => 'pin-input',    'label' => 'Pin Input'],
                    ['slug' => 'timeline',   'label' => 'Timeline'],
                    ['slug' => 'stepper',    'label' => 'Stepper'],
                ],
            ],
            [
                'title' => 'pinion-ui',
                'subtitle' => 'Dynamic',
                'badge' => 'Alpine',
                'items' => [
                    ['slug' => 'alert',               'label' => 'Alert'],
                    ['slug' => 'textarea',            'label' => 'Textarea'],
                    ['slug' => 'select',              'label' => 'Select'],
                    ['slug' => 'file-upload',         'label' => 'File Upload'],
                    ['slug' => 'notification-system', 'label' => 'Notification'],
                    ['slug' => 'table-scroll',        'label' => 'Table'],
                    ['slug' => 'dropdown',            'label' => 'Dropdown'],
                    ['slug' => 'popover',             'label' => 'Popover'],
                    ['slug' => 'modal',               'label' => 'Modal'],
                    ['slug' => 'tabs',                'label' => 'Tabs'],
                    ['slug' => 'accordion',           'label' => 'Accordion'],
                    ['slug' => 'collapse',            'label' => 'Collapse'],
                    ['slug' => 'sidebar',             'label' => 'Sidebar'],
                ],
            ],
            [
                'title' => 'pinion-icons',
                'subtitle' => null,
                'badge' => null,
                'items' => [
                    ['slug' => 'icons', 'label' => 'Icons'],
                ],
            ],
        ];
        // Strip the /{locale}/ prefix so $current matches the sidebar's slug
        // ('' for overview, 'button' for /ja/button, etc.). Without this strip
        // the active-link check would never match since slugs don't carry the
        // locale.
        $locale = app()->getLocale();
        $rawPath = request()->path();
        $current = ($rawPath === $locale) ? '' : preg_replace('#^' . preg_quote($locale, '#') . '/#', '', $rawPath);
    @endphp

    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <aside class="w-60 shrink-0 border-r border-base-300 bg-base-200/40 sticky top-0 h-screen overflow-y-auto">
            <div class="p-4 border-b border-base-300">
                <a href="/{{ $locale }}" class="text-sm font-bold text-primary">Pinion UI</a>
                <p class="text-xs text-base-content/50 mt-1">{{ __('playground.brand.subline') }}</p>
            </div>
            <nav class="p-2 flex flex-col gap-0.5">
                @foreach($navSections as $sectionIndex => $section)
                    <div class="{{ $sectionIndex > 0 ? 'mt-3' : '' }} px-3 pt-1 pb-1 flex items-baseline gap-1.5">
                        <span class="text-[10px] font-semibold uppercase tracking-wider text-base-content/40">{{ $section['title'] }}</span>
                        @if($section['subtitle'])
                            <span class="text-[10px] font-medium uppercase tracking-wider text-base-content/30">· {{ $section['subtitle'] }}</span>
                        @endif
                        @if($section['badge'])
                            <span class="ml-auto text-[9px] font-medium tracking-wide rounded bg-primary/10 text-primary px-1.5 py-0.5">{{ $section['badge'] }}</span>
                        @endif
                    </div>
                    @foreach($section['items'] as $item)
                        @php
                            $active = $current === $item['slug'];
                            $href = '/' . $locale . ($item['slug'] !== '' ? '/' . $item['slug'] : '');
                        @endphp
                        <a href="{{ $href }}"
                           class="block px-3 py-2 rounded text-sm transition-colors {{ $active ? 'bg-primary text-primary-content font-semibold' : 'text-base-content hover:bg-base-300' }}">
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                @endforeach
            </nav>
        </aside>

        {{-- Main --}}
        <div class="flex-1 min-w-0 flex flex-col">
            {{-- Sticky control bar --}}
            <div class="sticky top-0 z-50 bg-base-200 border-b border-base-300 px-4 py-3">
                <div class="flex flex-wrap items-center gap-4">
                    <div class="flex items-center gap-2">
                        <label class="text-xs font-medium text-base-content/60">Theme:</label>
                        <select x-model="theme" @change="setTheme($event.target.value)" class="text-xs bg-base-100 border border-base-300 rounded px-2 py-1 outline-none">
                            @foreach(['pinion','light','dark','abyss','acid','aqua','autumn','black','bumblebee','business','caramellatte','cmyk','coffee','corporate','cupcake','cyberpunk','dim','dracula','emerald','fantasy','forest','garden','halloween','lemonade','lofi','luxury','night','nord','pastel','retro','silk','sunset','synthwave','valentine','winter','wireframe'] as $t)
                                <option value="{{ $t }}">{{ $t }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-center gap-2">
                        <label class="text-xs font-medium text-base-content/60">Tune:</label>
                        <div class="flex flex-wrap gap-1">
                            <template x-for="t in tunes" :key="t">
                                <button @click="setTune(t)"
                                    :class="tune === t ? 'bg-primary text-primary-content' : 'bg-base-100 text-base-content hover:bg-base-300'"
                                    class="text-xs px-2 py-0.5 rounded border border-base-300 transition-colors cursor-pointer"
                                    x-text="t"></button>
                            </template>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <label class="text-xs font-medium text-base-content/60">Lang:</label>
                        <div class="flex flex-wrap gap-1">
                            @php
                                // Anchor-based switcher: each chip is /{loc}/{currentSlug}.
                                // No JS — server-rendered, copy-paste-safe, and crawled
                                // intact by spatie/laravel-export at build time.
                                $localeChips = [
                                    ['code' => 'ja',      'label' => '🇯🇵 JA'],
                                    ['code' => 'en',      'label' => '🇬🇧 EN'],
                                    ['code' => 'zh-Hans', 'label' => '🇨🇳 ZH-S'],
                                    ['code' => 'zh-Hant', 'label' => '🇹🇼 ZH-T'],
                                ];
                            @endphp
                            @foreach($localeChips as $chip)
                                @php
                                    $chipActive = $locale === $chip['code'];
                                    $chipHref = '/' . $chip['code'] . ($current !== '' ? '/' . $current : '');
                                @endphp
                                <a href="{{ $chipHref }}"
                                   class="text-xs px-2 py-0.5 rounded border border-base-300 transition-colors cursor-pointer {{ $chipActive ? 'bg-primary text-primary-content' : 'bg-base-100 text-base-content hover:bg-base-300' }}">{{ $chip['label'] }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <label class="text-xs font-medium text-base-content/60">Debug:</label>
                        <button @click="setDebug(!debug)"
                            :class="debug ? 'bg-primary text-primary-content' : 'bg-base-100 text-base-content hover:bg-base-300'"
                            class="text-xs px-2 py-0.5 rounded border border-base-300 transition-colors cursor-pointer"
                            :title="debug ? 'lofi / night 同時表示' : 'デバッグ表示 (lofi/night 2-カラム)'"
                            x-text="debug ? 'lofi/night' : 'off'"></button>
                    </div>
                </div>
            </div>

            {{-- Page content. Both branches use `<template x-if>` so only ONE pane
                 lives in the active DOM at a time — `x-show` keeps the others
                 mounted-but-display-none, which causes `@yield('content')` to render
                 the same form fields three times. Radio buttons sharing a `name`
                 across the duplicates collide (only one stays `checked`), and the
                 lofi/night `data-theme` ancestors override CSS variables on radios
                 in the supposedly-visible single pane. `<template x-if>` swaps the
                 actual DOM, eliminating both issues. --}}
            <template x-if="!debug">
                <main class="flex-1 px-6 lg:px-10 py-10 w-full">
                    <h1 class="text-3xl font-bold mb-2">@yield('heading')</h1>
                    @hasSection('subheading')
                        <p class="text-base-content/60 mb-8">@yield('subheading')</p>
                    @endif

                    @yield('content')
                </main>
            </template>

            {{-- Debug: side-by-side lofi (light) + night (dark). Each column
                 scopes its own data-theme, isolating daisyUI tokens. The navbar
                 stays on the user's chosen theme. --}}
            <template x-if="debug">
                <div class="flex-1 grid grid-cols-2 divide-x divide-base-300 min-h-[calc(100vh-3.5rem)]">
                    {{-- `:data-tune` is mirrored from the navbar's tune state because daisyUI's
                         `[data-theme=lofi]` block re-defines --radius-field / --radius-box / --border
                         on the inner main, which would otherwise overwrite the tune's values
                         inherited from <html>. Re-applying [data-tune] here lets tune.css win
                         the cascade inside each pane. --}}
                    <main data-theme="lofi" :data-tune="tune"
                          x-init="$nextTick(() => isolateDuplicates($el, 'lofi'))"
                          class="bg-base-100 text-base-content min-w-0 px-4 lg:px-6 py-8 overflow-x-auto">
                        <div class="text-[10px] uppercase tracking-wider text-base-content/50 mb-3 font-semibold">data-theme = lofi</div>
                        <h1 class="text-2xl font-bold mb-2">@yield('heading')</h1>
                        @hasSection('subheading')
                            <p class="text-base-content/60 mb-6 text-sm">@yield('subheading')</p>
                        @endif
                        @yield('content')
                    </main>
                    <main data-theme="night" :data-tune="tune"
                          x-init="$nextTick(() => isolateDuplicates($el, 'night'))"
                          class="bg-base-100 text-base-content min-w-0 px-4 lg:px-6 py-8 overflow-x-auto">
                        <div class="text-[10px] uppercase tracking-wider text-base-content/50 mb-3 font-semibold">data-theme = night</div>
                        <h1 class="text-2xl font-bold mb-2">@yield('heading')</h1>
                        @hasSection('subheading')
                            <p class="text-base-content/60 mb-6 text-sm">@yield('subheading')</p>
                        @endif
                        @yield('content')
                    </main>
                </div>
            </template>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
