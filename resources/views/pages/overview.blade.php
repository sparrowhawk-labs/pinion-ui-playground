@extends('layouts.playground', ['noSidebar' => true])

@section('title', '— Components')
@section('heading', '')
@section('subheading', '')

@push('scripts')
<style>
    /* Catalog owns its own page chrome — suppress the layout's empty <h1>/<p>. */
    main > h1:empty,
    main > p:empty { display: none; }
</style>
@endpush

@section('content')
@php
    use Illuminate\Support\Facades\Route;

    $locale = app()->getLocale();

    /*
     * Catalog sections mirror the sidebar groupings but live as a single
     * source of truth here so the catalog grid renders without depending on
     * the sidebar layout (which is suppressed on this page). Whenever the
     * sidebar's `$navSections` changes, this list should be kept in sync —
     * a small price for the clean preline-style grid the LP wants.
     *
     * Each item is a (slug, label, hint) tuple. `hint` is the lookup key in
     * `playground.subheading.*` and is automatically localised. Slug is
     * the URL fragment, prefixed with /{locale}/ on render.
     */
    $catalogSections = [
        [
            'title'    => 'pinion-ui',
            'subtitle' => __('playground.catalog.section.static'),
            'badge'    => null,
            'items'    => [
                ['slug' => 'button',          'label' => 'Button'],
                ['slug' => 'button-group',    'label' => 'Button Group'],
                ['slug' => 'badge',           'label' => 'Badge'],
                ['slug' => 'card',            'label' => 'Card'],
                ['slug' => 'avatar',          'label' => 'Avatar'],
                ['slug' => 'avatar-group',    'label' => 'Avatar Group'],
                ['slug' => 'input',           'label' => 'Input'],
                ['slug' => 'checkbox',        'label' => 'Checkbox'],
                ['slug' => 'radio',           'label' => 'Radio'],
                ['slug' => 'toggle',          'label' => 'Toggle'],
                ['slug' => 'pagination',      'label' => 'Pagination'],
                ['slug' => 'progress',        'label' => 'Progress'],
                ['slug' => 'skeleton',        'label' => 'Skeleton'],
                ['slug' => 'spinner',         'label' => 'Spinner'],
                ['slug' => 'kbd',             'label' => 'Kbd'],
                ['slug' => 'tooltip',         'label' => 'Tooltip'],
                ['slug' => 'indicator',       'label' => 'Indicator'],
                ['slug' => 'breadcrumb',      'label' => 'Breadcrumb'],
                ['slug' => 'stat',            'label' => 'Stat'],
                ['slug' => 'divider',         'label' => 'Divider'],
                ['slug' => 'rating',          'label' => 'Rating'],
                ['slug' => 'range-slider',    'label' => 'Range Slider'],
                ['slug' => 'input-number',    'label' => 'Input Number'],
                ['slug' => 'input-group',     'label' => 'Input Group'],
                ['slug' => 'pin-input',       'label' => 'Pin Input'],
                ['slug' => 'timeline',        'label' => 'Timeline'],
                ['slug' => 'stepper',         'label' => 'Stepper'],
            ],
        ],
        [
            'title'    => 'pinion-ui',
            'subtitle' => __('playground.catalog.section.dynamic'),
            'badge'    => 'Alpine',
            'items'    => [
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
            'title'    => 'pinion-icons',
            'subtitle' => __('playground.catalog.section.icons'),
            'badge'    => null,
            'items'    => [
                ['slug' => 'icons', 'label' => 'Icons'],
            ],
        ],
    ];
@endphp

{{-- Catalog body. The layout's <main> is now bare full-width (so any future
     section bg won't clip at the edges), so this page provides its own
     max-w + padding here. Backgrounds outside this wrapper stay edge-to-edge,
     content inside stays aligned with the navbar's max-w-7xl. --}}
<div class="max-w-7xl mx-auto w-full px-6 lg:px-10 py-10">
    {{-- Catalog header --}}
    <header class="mb-10">
        <h1 class="text-4xl lg:text-5xl font-extrabold tracking-tight mb-3">{{ __('playground.catalog.title') }}</h1>
        <p class="text-base-content/65 max-w-2xl leading-relaxed">{{ __('playground.catalog.subtitle') }}</p>
    </header>

    @foreach ($catalogSections as $section)
        <section class="mb-12">
            {{-- Section header — mirrors the sidebar's group header styling
                 (eyebrow stack) so visual language stays consistent between
                 LP / catalog / component pages. --}}
            <div class="flex items-baseline gap-2 mb-5 pb-3 border-b border-base-300">
                <h2 class="text-sm font-bold uppercase tracking-wider text-base-content/70">{{ $section['title'] }}</h2>
                @if ($section['subtitle'])
                    <span class="text-sm font-medium uppercase tracking-wider text-base-content/40">· {{ $section['subtitle'] }}</span>
                @endif
                @if ($section['badge'])
                    <span class="text-[10px] font-medium tracking-wide rounded bg-primary/10 text-primary px-2 py-0.5">{{ $section['badge'] }}</span>
                @endif
                <span class="ml-auto text-xs font-mono text-base-content/40">{{ count($section['items']) }}</span>
            </div>

            {{-- Card grid. 2 columns on md, 3 on lg, 4 on xl — preline-style
                 dense overview. Each card is a full-bleed <a> so the whole
                 surface is clickable. --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3">
                @foreach ($section['items'] as $item)
                    @php
                        $href = '/' . $locale . '/' . $item['slug'];
                        $hint = trim(strip_tags((string) __('playground.subheading.' . $item['slug'])));
                        // __() returns the key itself when missing — guard so the
                        // card doesn't render a "playground.subheading.foo" stub.
                        if ($hint === 'playground.subheading.' . $item['slug']) {
                            $hint = '';
                        }
                    @endphp
                    <a href="{{ $href }}"
                       class="group relative flex flex-col gap-2 rounded-[var(--radius-box)] border border-base-300 bg-base-100 p-4 transition-all hover:border-primary/60 hover:bg-base-200/40 hover:-translate-y-0.5 hover:shadow-sm">
                        <div class="flex items-start justify-between gap-3">
                            <h3 class="text-base font-semibold text-base-content group-hover:text-primary transition-colors">{{ $item['label'] }}</h3>
                            <span class="shrink-0 mt-0.5 text-base-content/30 group-hover:text-primary transition-colors" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                    <path fill-rule="evenodd" d="M3 10a.75.75 0 0 1 .75-.75h10.638L10.23 5.29a.75.75 0 1 1 1.04-1.08l5.5 5.25a.75.75 0 0 1 0 1.08l-5.5 5.25a.75.75 0 1 1-1.04-1.08l4.158-3.96H3.75A.75.75 0 0 1 3 10Z" clip-rule="evenodd"/>
                                </svg>
                            </span>
                        </div>
                        @if ($hint !== '')
                            <p class="text-xs text-base-content/55 leading-snug line-clamp-3">{{ $hint }}</p>
                        @endif
                        <span class="text-[10px] font-mono text-base-content/30 uppercase tracking-wider mt-auto">/{{ $item['slug'] }}</span>
                    </a>
                @endforeach
            </div>
        </section>
    @endforeach
</div>
@endsection
