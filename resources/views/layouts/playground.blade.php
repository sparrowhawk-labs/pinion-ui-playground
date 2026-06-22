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
         Description cascade (best → fallback):
           1. @section('description', '...') if the page sets one explicitly
           2. @section('subheading', '...') — already locale-aware via __()
              on 42 component pages, so each locale gets a unique description
           3. Generic locale-agnostic default. --}}
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

        // Read both sections without consuming them — they are still rendered
        // in the page body via @yield('subheading') / @yield('description').
        $seoPageDesc = trim(strip_tags((string) $__env->yieldContent('description')));
        $seoPageSub  = trim(strip_tags((string) $__env->yieldContent('subheading')));
        $seoDescription = $seoPageDesc !== ''
            ? $seoPageDesc
            : ($seoPageSub !== '' ? $seoPageSub : $seoDefaultDesc);
    @endphp
    <meta name="description" content="{{ $seoDescription }}">
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
    <meta property="og:description" content="{{ $seoDescription }}">
    <meta property="og:locale" content="{{ $seoOgLocale }}">
    @foreach ($seoLocales as $alt => $altOg)
        @if ($alt !== $htmlLocale)
            <meta property="og:locale:alternate" content="{{ $altOg }}">
        @endif
    @endforeach
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Pinion UI @yield('title')">
    <meta name="twitter:description" content="{{ $seoDescription }}">

    {{-- JSON-LD structured data (WebSite + Organization). Site-level — emitted
         on every page; sufficient to give Google rich-result context for the
         brand and the multi-language scope. Per-page SoftwareSourceCode markup
         can be layered later if individual components warrant it.
         NOTE: built as a PHP array + json_encode so Blade doesn't mistake the
         schema.org "@context" / "@graph" / "@type" / "@id" prefixes for
         Blade directives (they'd compile to nothing and emit broken PHP). --}}
    @php
        $seoJsonLd = [
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'WebSite',
                    '@id' => $seoBase . '/#website',
                    'url' => $seoBase . '/',
                    'name' => 'Pinion UI',
                    'description' => 'Blade UI components for Laravel — Tailwind v4 + daisyUI v5 + Alpine.js, 46 anonymous components, 11-preset tune token system.',
                    'inLanguage' => ['ja', 'en', 'zh-Hans', 'zh-Hant'],
                    'publisher' => ['@id' => 'https://sparrowhawk-labs.dev/#org'],
                ],
                [
                    '@type' => 'Organization',
                    '@id' => 'https://sparrowhawk-labs.dev/#org',
                    'name' => 'Sparrowhawk Labs',
                    'url' => 'https://sparrowhawk-labs.dev/',
                    'sameAs' => [
                        'https://github.com/sparrowhawk-labs',
                        'https://packagist.org/packages/sparrowhawk-labs/',
                    ],
                ],
            ],
        ];
    @endphp
    <script type="application/ld+json">{!! json_encode($seoJsonLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- v2 tune fonts (all 11). Old playful/elegant/bold fonts (Fredoka/Lora/Montserrat/Outfit) dropped; added Source Serif 4, Hanken Grotesk, Caveat, Patrick Hand, Yomogi, Zen Kurenaido. --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Instrument+Sans:wght@400;500;600&family=IBM+Plex+Sans:wght@300;400;500;600;700&family=IBM+Plex+Mono:wght@400;500&family=JetBrains+Mono:wght@400;500;700&family=Space+Grotesk:wght@400;500;700&family=Space+Mono:wght@400;700&family=Playfair+Display:wght@400;500;600;700;800&family=Source+Serif+4:opsz,wght@8..60,400;8..60,600&family=Hanken+Grotesk:wght@300;400;500;600&family=Quicksand:wght@400;500;600;700&family=Nunito:wght@400;600;700;800&family=Caveat:wght@400;500;600;700&family=Patrick+Hand&family=Press+Start+2P&family=Noto+Sans+JP:wght@400;500;700&family=Shippori+Mincho:wght@400;500;700&family=Zen+Maru+Gothic:wght@400;500;700&family=Yomogi&family=Zen+Kurenaido&family=M+PLUS+1p:wght@400;500;700&family=M+PLUS+1+Code:wght@400;500;700&display=swap" rel="stylesheet">

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
    themeOpen: false,
    tuneOpen: false,
    themes: ['pinion','light','dark','abyss','acid','aqua','autumn','black','bumblebee','business','caramellatte','cmyk','coffee','corporate','cupcake','cyberpunk','dim','dracula','emerald','fantasy','forest','garden','halloween','lemonade','lofi','luxury','night','nord','pastel','retro','silk','sunset','synthwave','valentine','winter','wireframe'],
    tunes: ['default','minimal','sharp','corporate','tech','brutal','editorial','luxury','soft','pixel','draft'],
    setTheme(t) { this.theme = t; document.documentElement.setAttribute('data-theme', t); localStorage.setItem('pinion-theme', t); this.themeOpen = false; },
    setTune(t) { this.tune = t; document.documentElement.setAttribute('data-tune', t); localStorage.setItem('pinion-tune', t); this.tuneOpen = false; },
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
                'title' => 'Tune v2',
                'subtitle' => 'review',
                'badge' => null,
                'items' => [
                    ['slug' => 'tune-lab', 'label' => 'Tune Lab'],
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
        {{-- Sidebar — suppressed on the LP root and the components catalog
             (preline-style grid IS the navigation there). Pages that want
             a sidebar-less layout pass `noSidebar => true` via @extends
             arguments. --}}
        @unless ($noSidebar ?? false)
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
        @endunless

        {{-- Main --}}
        <div class="flex-1 min-w-0 flex flex-col">
            {{-- Sticky control bar. Outer div carries the bg + border so it
                 spans full width and the colour doesn't cut off at any
                 viewport size. Inner div is max-w-7xl mx-auto so the nav
                 items line up with the page content below — backgrounds are
                 always full-width, content is always constrained. Horizontal
                 padding (px-6 lg:px-10) MUST match the LP hero's
                 `.tune-hero` padding and the catalog wrapper's padding, or
                 the first nav item and the first content character won't
                 share an X position at the same viewport. --}}
            <div class="sticky top-0 z-50 bg-base-100 border-b border-base-300 px-6 lg:px-10 py-3 w-full">
                <div class="flex flex-wrap items-center gap-4 max-w-7xl mx-auto w-full">
                    {{-- Brand on the far left. Always visible across LP /
                         catalog / per-component pages so the top-bar is
                         self-sufficient even when the sidebar is hidden. --}}
                    <a href="/{{ $locale }}" class="text-sm font-bold text-primary tracking-tight">Pinion UI</a>
                    {{-- Theme — custom Alpine dropdown. Each row's swatch sits
                         inside a pill whose own bg comes from the theme's
                         base-100 (via inline data-theme cascading the CSS
                         variables down). That way a dark theme like dracula
                         renders the pill on its own dark surface — the three
                         primary / secondary / accent dots stand out against
                         the theme's intended page colour instead of looking
                         like a dark blob sitting on the white dropdown row.
                         The previous design had no swatch container, which
                         made dark themes' base-100 swatch read as an
                         unrefined "hole" on the white dropdown background. --}}
                    <div class="flex items-center gap-2 relative" @click.outside="themeOpen = false" @keydown.escape.window="themeOpen = false">
                        <label class="text-xs font-medium text-base-content/60">Theme:</label>
                        <button @click="themeOpen = !themeOpen"
                                class="text-xs px-2 py-1 rounded border border-base-300 bg-base-100 hover:bg-base-200 transition-colors flex items-center gap-1.5 cursor-pointer"
                                :aria-expanded="themeOpen">
                            <span :data-theme="theme" class="inline-flex shrink-0 items-center gap-1 px-1.5 py-0.5 rounded bg-base-100 border border-base-content/20">
                                <span class="size-2 rounded-full bg-primary"></span>
                                <span class="size-2 rounded-full bg-secondary"></span>
                                <span class="size-2 rounded-full bg-accent"></span>
                            </span>
                            <span x-text="theme"></span>
                            <svg class="size-3 text-base-content/50" :class="themeOpen ? 'rotate-180' : ''" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 011.06 0L10 11.94l3.72-3.72a.75.75 0 111.06 1.06l-4.25 4.25a.75.75 0 01-1.06 0L5.22 9.28a.75.75 0 010-1.06z" clip-rule="evenodd"/></svg>
                        </button>
                        <ul x-show="themeOpen" x-cloak x-transition.opacity.duration.100ms
                            class="absolute top-full left-0 mt-1 z-50 w-60 max-h-80 overflow-y-auto rounded-md border border-base-300 bg-base-100 shadow-lg py-1"
                            role="listbox">
                            <template x-for="t in themes" :key="t">
                                <li>
                                    <button @click="setTheme(t)"
                                            class="flex items-center gap-2.5 w-full px-3 py-1.5 text-xs hover:bg-base-200 transition-colors text-left"
                                            :class="theme === t ? 'bg-base-200 font-semibold' : ''"
                                            role="option"
                                            :aria-selected="theme === t">
                                        <span :data-theme="t" class="inline-flex shrink-0 items-center gap-1 px-2 py-1.5 rounded-md bg-base-100 border border-base-content/20">
                                            <span class="size-2 rounded-full bg-primary"></span>
                                            <span class="size-2 rounded-full bg-secondary"></span>
                                            <span class="size-2 rounded-full bg-accent"></span>
                                        </span>
                                        <span x-text="t"></span>
                                        <svg x-show="theme === t" class="ml-auto size-3 text-primary" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.704 5.29a1 1 0 01.006 1.414l-7.5 7.6a1 1 0 01-1.42.005l-3.5-3.5a1 1 0 011.414-1.414l2.79 2.79 6.794-6.886a1 1 0 011.416-.009z" clip-rule="evenodd"/></svg>
                                    </button>
                                </li>
                            </template>
                        </ul>
                    </div>

                    {{-- Tune — custom Alpine dropdown. Each row carries data-tune
                         so its --font-heading resolves to the tune's actual
                         display font; the preview row reads in that font, so
                         the typographic difference between 'pixel' / 'elegant' /
                         'brutal' etc. is visible at a glance instead of being
                         lost behind generic system-font row labels. --}}
                    <div class="flex items-center gap-2 relative" @click.outside="tuneOpen = false" @keydown.escape.window="tuneOpen = false">
                        <label class="text-xs font-medium text-base-content/60">Tune:</label>
                        <button @click="tuneOpen = !tuneOpen"
                                class="text-xs px-2 py-1 rounded border border-base-300 bg-base-100 hover:bg-base-200 transition-colors flex items-center gap-1.5 cursor-pointer"
                                :aria-expanded="tuneOpen">
                            <span :data-tune="tune" style="font-family: var(--font-heading);" class="leading-none" x-text="tune"></span>
                            <svg class="size-3 text-base-content/50" :class="tuneOpen ? 'rotate-180' : ''" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 011.06 0L10 11.94l3.72-3.72a.75.75 0 111.06 1.06l-4.25 4.25a.75.75 0 01-1.06 0L5.22 9.28a.75.75 0 010-1.06z" clip-rule="evenodd"/></svg>
                        </button>
                        <ul x-show="tuneOpen" x-cloak x-transition.opacity.duration.100ms
                            class="absolute top-full left-0 mt-1 z-50 w-60 max-h-96 overflow-y-auto rounded-md border border-base-300 bg-base-100 shadow-lg py-1"
                            role="listbox">
                            <template x-for="t in tunes" :key="t">
                                <li>
                                    <button @click="setTune(t)"
                                            class="flex items-center gap-2 w-full px-3 py-2 hover:bg-base-200 transition-colors text-left"
                                            :class="tune === t ? 'bg-base-200' : ''"
                                            role="option"
                                            :aria-selected="tune === t">
                                        <span :data-tune="t" style="font-family: var(--font-heading); font-weight: var(--font-weight-heading, 700);" class="text-sm leading-none" x-text="'Aa ' + t"></span>
                                        <svg x-show="tune === t" class="ml-auto size-3 text-primary" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.704 5.29a1 1 0 01.006 1.414l-7.5 7.6a1 1 0 01-1.42.005l-3.5-3.5a1 1 0 011.414-1.414l2.79 2.79 6.794-6.886a1 1 0 011.416-.009z" clip-rule="evenodd"/></svg>
                                    </button>
                                </li>
                            </template>
                        </ul>
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
                    {{-- Components catalog link — pushed to the far right via
                         ml-auto so the brand and the primary call-to-action
                         (browse the catalog) bookend the control row. --}}
                    <a href="/{{ $locale }}/overview"
                       class="ml-auto text-xs font-medium px-2.5 py-1 rounded border border-base-300 transition-colors {{ $current === 'overview' ? 'bg-primary text-primary-content border-primary' : 'bg-base-100 text-base-content hover:bg-base-200' }}">{{ __('playground.nav.components') }}</a>
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
                {{-- Main wrapper. When the sidebar is shown (component docs),
                     padding lives here for the consistent doc-page look.
                     When the sidebar is hidden (LP / catalog), this is bare
                     full-width so each page can have a full-width section
                     background (hero gradient etc.) AND constrain its inner
                     content with its own max-w-7xl wrapper. --}}
                <main class="flex-1 w-full {{ ($noSidebar ?? false) ? '' : 'px-6 lg:px-10 py-10' }}">
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
