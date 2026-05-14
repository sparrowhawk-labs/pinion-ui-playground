@extends('layouts.playground')

@section('title', '— Overview')
@section('heading', '')
@section('subheading', '')

@push('scripts')
<style>
    /* Hero owns its own headline — suppress the layout's empty <h1>/<p> stubs. */
    main > h1:empty,
    main > p:empty { display: none; }
</style>
@endpush

@section('content')
    {{-- ============================================================
         1. Hero band
         ============================================================ --}}
    <x-pn::section.hero
        variant="centered"
        size="xl"
        badge="v0.3.20"
        title="pinion-ui — 46 Blade components, LLM-native"
        subtitle="Tailwind v4 + daisyUI v5 + Alpine.js. Every component ships with an AGENTS.md-grade reference doc so AI agents can build with it correctly."
        bgClass="bg-gradient-to-br from-primary/10 via-base-100 to-accent/10"
    >
        <x-slot:actions>
            <x-button
                href="https://github.com/sparrowhawk-labs/pinion-ui"
                color="primary"
                size="lg"
                icon="code-square"
                iconRight="arrow-right"
            >View on GitHub</x-button>
            <x-button
                href="#components"
                appearance="ghost"
                size="lg"
                icon="widget"
            >Browse components</x-button>
        </x-slot:actions>

        <div class="flex flex-wrap items-center justify-center gap-2 pt-2">
            <x-badge appearance="dot" color="success">Production ready</x-badge>
            <x-badge appearance="soft" color="primary" icon="bolt">Single-import CSS</x-badge>
            <x-badge appearance="soft" color="accent" icon="magic-stick-3">10 Tune presets</x-badge>
            <x-badge appearance="outline" color="info" icon="palette">30+ daisyUI themes</x-badge>
        </div>
    </x-pn::section.hero>

    {{-- ============================================================
         2. Stat strip
         ============================================================ --}}
    <div class="mt-12 mb-16">
        <div class="stats shadow grid grid-cols-2 lg:grid-cols-4 w-full">
            <x-stat
                :wrapped="false"
                label="Components"
                value="46"
                desc="across 7 categories"
                valueColor="primary"
            >
                <x-i type="widget" class="w-8 h-8" />
            </x-stat>

            <x-stat
                :wrapped="false"
                label="Tune presets"
                value="10"
                desc="shape × space × font"
                valueColor="accent"
            >
                <x-i type="magic-stick-3" class="w-8 h-8" />
            </x-stat>

            <x-stat
                :wrapped="false"
                label="daisyUI themes"
                value="30+"
                desc="light · dark · all themed"
                valueColor="info"
            >
                <x-i type="palette" class="w-8 h-8" />
            </x-stat>

            <x-stat
                :wrapped="false"
                label="Solar icons"
                value="1,234"
                desc="pinion-icons v0.1.0"
                valueColor="success"
            >
                <x-i type="stars" class="w-8 h-8" />
            </x-stat>
        </div>
        <p class="text-xs text-base-content/50 text-right mt-2">
            Icon count from
            <a href="https://github.com/sparrowhawk-labs/pinion-icons" class="link link-hover text-primary">
                sparrowhawk-labs/pinion-icons →
            </a>
        </p>
    </div>

    {{-- ============================================================
         3. What's new
         ============================================================ --}}
    <section class="mb-16">
        <div class="flex items-baseline justify-between mb-element">
            <h2 class="text-2xl font-bold tracking-tight">What's new</h2>
            <a href="https://github.com/sparrowhawk-labs/pinion-ui/releases" class="text-sm link link-hover text-primary">
                All releases <x-i type="arrow-right" class="w-3.5 h-3.5 inline-block align-middle" />
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-element">
            <x-card appearance="bordered-top" color="primary" hoverable>
                <x-slot:header>
                    <div class="flex items-center gap-2">
                        <x-i type="bolt" class="w-6 h-6 text-primary" />
                        <span class="font-mono text-sm font-semibold">v0.3.17</span>
                        <x-badge size="xs" appearance="soft" color="primary">CSS</x-badge>
                    </div>
                </x-slot:header>
                <h3 class="font-semibold mb-1">Single-import preset</h3>
                <p class="text-sm text-base-content/70">
                    One <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">pinion-ui.css</code> import wires Tailwind v4, daisyUI v5, and the tune token system in your app.css.
                </p>
                <x-slot:footer>
                    <p class="text-xs text-base-content/40">Released — 2026-04</p>
                </x-slot:footer>
            </x-card>

            <x-card appearance="bordered-top" color="accent" hoverable>
                <x-slot:header>
                    <div class="flex items-center gap-2">
                        <x-i type="magic-stick-3" class="w-6 h-6 text-accent" />
                        <span class="font-mono text-sm font-semibold">v0.3.19</span>
                        <x-badge size="xs" appearance="soft" color="accent">Alpine</x-badge>
                    </div>
                </x-slot:header>
                <h3 class="font-semibold mb-1">Focus + collapse plugins</h3>
                <p class="text-sm text-base-content/70">
                    <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">ui:install</code> now auto-wires <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">@alpinejs/focus</code> and <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">@alpinejs/collapse</code> — modal focus-trap and accordion height animation just work.
                </p>
                <x-slot:footer>
                    <p class="text-xs text-base-content/40">Released — 2026-05</p>
                </x-slot:footer>
            </x-card>

            <x-card appearance="bordered-top" color="success" hoverable>
                <x-slot:header>
                    <div class="flex items-center gap-2">
                        <x-i type="tuning-2" class="w-6 h-6 text-success" />
                        <span class="font-mono text-sm font-semibold">v0.3.20</span>
                        <x-badge size="xs" appearance="soft" color="success">Polish</x-badge>
                    </div>
                </x-slot:header>
                <h3 class="font-semibold mb-1">Popover padding prop</h3>
                <p class="text-sm text-base-content/70">
                    New <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">padding</code> prop on <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">&lt;x-popover&gt;</code> so right-click context menus can hug their content tightly.
                </p>
                <x-slot:footer>
                    <p class="text-xs text-base-content/40">Released — 2026-05</p>
                </x-slot:footer>
            </x-card>
        </div>
    </section>

    {{-- ============================================================
         4. LLM-native showcase
         ============================================================ --}}
    <section class="mb-16">
        <h2 class="text-2xl font-bold tracking-tight mb-element">Built for AI agents</h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-element">
            <x-alert
                color="primary"
                appearance="bordered-left"
                icon="programming"
                title="AI agents code with pinion-ui correctly"
            >
                <ul class="space-y-2 mt-2 text-sm">
                    <li class="flex items-start gap-2">
                        <x-i type="check-circle" class="w-4 h-4 text-success mt-0.5 shrink-0" />
                        <span>Read <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">CLAUDE.md</code> once for project conventions</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <x-i type="check-circle" class="w-4 h-4 text-success mt-0.5 shrink-0" />
                        <span><code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">AGENTS.md</code> guides the per-component lookup workflow</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <x-i type="check-circle" class="w-4 h-4 text-success mt-0.5 shrink-0" />
                        <span>46 per-component reference docs under <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">reference/components/</code></span>
                    </li>
                    <li class="flex items-start gap-2">
                        <x-i type="check-circle" class="w-4 h-4 text-success mt-0.5 shrink-0" />
                        <span>Fresh-Laravel install verified — drop the package into any new app and it builds</span>
                    </li>
                </ul>
            </x-alert>

            <x-card appearance="elevated">
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <x-i type="rocket" class="w-5 h-5 text-primary" />
                            <h3 class="font-semibold">Install in 60 seconds</h3>
                        </div>
                        <x-badge size="xs" appearance="dot" color="success">Laravel 11 / 12</x-badge>
                    </div>
                </x-slot:header>

                <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code><span class="text-base-content/40"># 1. Require the package</span>
composer require sparrowhawk-labs/pinion-ui

<span class="text-base-content/40"># 2. Install assets + AGENTS.md scaffolding</span>
php artisan ui:install --ai

<span class="text-base-content/40"># 3. Build &amp; run</span>
npm run build &amp;&amp; php artisan serve</code></pre>

                <x-slot:footer>
                    <div class="flex items-center justify-between">
                        <p class="text-xs text-base-content/60">
                            <x-i type="info-circle" class="w-3.5 h-3.5 inline-block align-middle" />
                            <code class="text-xs">--ai</code> drops <code class="text-xs">CLAUDE.md</code> + <code class="text-xs">AGENTS.md</code> in your repo root.
                        </p>
                        <x-button
                            size="sm"
                            appearance="soft"
                            color="primary"
                            icon="file-text"
                            href="https://github.com/sparrowhawk-labs/pinion-ui/blob/main/AGENTS.md"
                        >AGENTS.md</x-button>
                    </div>
                </x-slot:footer>
            </x-card>
        </div>
    </section>

    {{-- ============================================================
         5. Component preview grid
         ============================================================ --}}
    <section id="components" class="mb-16 scroll-mt-24">
        <div class="flex items-baseline justify-between mb-element">
            <h2 class="text-2xl font-bold tracking-tight">Components — a live taste</h2>
            <span class="text-sm text-base-content/60">9 of 46 — pick anything from the sidebar for the full matrix</span>
        </div>

        @php
            $previews = [
                ['name' => 'button',       'category' => 'Form',         'title' => 'Button',       'href' => '/button'],
                ['name' => 'badge',        'category' => 'Data display', 'title' => 'Badge',        'href' => '/badge'],
                ['name' => 'input',        'category' => 'Form',         'title' => 'Input',        'href' => '/input'],
                ['name' => 'modal',        'category' => 'Overlay',      'title' => 'Modal',        'href' => '/modal'],
                ['name' => 'stepper',      'category' => 'Section',      'title' => 'Stepper',      'href' => '/stepper'],
                ['name' => 'rating',       'category' => 'Form',         'title' => 'Rating',       'href' => '/rating'],
                ['name' => 'toggle',       'category' => 'Form',         'title' => 'Toggle',       'href' => '/toggle'],
                ['name' => 'input-number', 'category' => 'Form',         'title' => 'Input Number', 'href' => '/input-number'],
                ['name' => 'tooltip',      'category' => 'Overlay',      'title' => 'Tooltip',      'href' => '/tooltip'],
            ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-element">
            {{-- 1. Button --}}
            <x-card hoverable appearance="default">
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] uppercase tracking-wider text-base-content/50 font-semibold">{{ $previews[0]['category'] }}</span>
                        <code class="text-xs font-mono">&lt;x-{{ $previews[0]['name'] }}&gt;</code>
                    </div>
                </x-slot:header>

                <h3 class="font-semibold mb-3">{{ $previews[0]['title'] }}</h3>
                <div class="flex flex-wrap gap-2">
                    <x-button size="sm">Primary</x-button>
                    <x-button size="sm" color="secondary">Secondary</x-button>
                    <x-button size="sm" appearance="outline" color="accent">Outline</x-button>
                    <x-button size="sm" appearance="soft" color="success" icon="check-circle">OK</x-button>
                </div>

                <x-slot:footer>
                    <a href="https://github.com/sparrowhawk-labs/pinion-ui/blob/main/reference/components/{{ $previews[0]['name'] }}.md"
                       class="text-xs link link-hover text-primary">reference/components/{{ $previews[0]['name'] }}.md →</a>
                </x-slot:footer>
            </x-card>

            {{-- 2. Badge --}}
            <x-card hoverable appearance="default">
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] uppercase tracking-wider text-base-content/50 font-semibold">{{ $previews[1]['category'] }}</span>
                        <code class="text-xs font-mono">&lt;x-{{ $previews[1]['name'] }}&gt;</code>
                    </div>
                </x-slot:header>

                <h3 class="font-semibold mb-3">{{ $previews[1]['title'] }}</h3>
                <div class="flex flex-wrap gap-2 items-center">
                    <x-badge color="primary">primary</x-badge>
                    <x-badge color="success" appearance="solid">solid</x-badge>
                    <x-badge color="warning" appearance="outline">outline</x-badge>
                    <x-badge color="error" appearance="dot">dot</x-badge>
                    <x-badge color="accent" pill icon="star">pill</x-badge>
                </div>

                <x-slot:footer>
                    <a href="https://github.com/sparrowhawk-labs/pinion-ui/blob/main/reference/components/{{ $previews[1]['name'] }}.md"
                       class="text-xs link link-hover text-primary">reference/components/{{ $previews[1]['name'] }}.md →</a>
                </x-slot:footer>
            </x-card>

            {{-- 3. Input (floating label) --}}
            <x-card hoverable appearance="default">
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] uppercase tracking-wider text-base-content/50 font-semibold">{{ $previews[2]['category'] }}</span>
                        <code class="text-xs font-mono">&lt;x-{{ $previews[2]['name'] }}&gt;</code>
                    </div>
                </x-slot:header>

                <h3 class="font-semibold mb-3">{{ $previews[2]['title'] }}</h3>
                <x-input
                    name="overview_email"
                    type="email"
                    label="Email"
                    floating
                    iconLeft="letter"
                    hint="floating label · iconLeft prop"
                    placeholder="you@example.com"
                />

                <x-slot:footer>
                    <a href="https://github.com/sparrowhawk-labs/pinion-ui/blob/main/reference/components/{{ $previews[2]['name'] }}.md"
                       class="text-xs link link-hover text-primary">reference/components/{{ $previews[2]['name'] }}.md →</a>
                </x-slot:footer>
            </x-card>

            {{-- 4. Modal --}}
            <x-card hoverable appearance="default">
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] uppercase tracking-wider text-base-content/50 font-semibold">{{ $previews[3]['category'] }}</span>
                        <code class="text-xs font-mono">&lt;x-{{ $previews[3]['name'] }}&gt;</code>
                    </div>
                </x-slot:header>

                <h3 class="font-semibold mb-3">{{ $previews[3]['title'] }}</h3>
                <p class="text-sm text-base-content/70 mb-3">Alpine-driven dialog with focus trap, ESC + backdrop dismiss.</p>
                <x-modal title="Welcome to pinion-ui" size="md">
                    <x-slot:trigger>
                        <x-button size="sm" color="primary" icon="rocket">Open modal</x-button>
                    </x-slot:trigger>
                    <p class="text-sm text-base-content/80">
                        46 components, all themable, all documented for AI agents. Press <kbd class="kbd kbd-sm">Esc</kbd> or click outside to close.
                    </p>
                    <x-slot:actions>
                        <x-button appearance="ghost" x-on:click="open = false">Close</x-button>
                        <x-button color="primary" x-on:click="open = false">Got it</x-button>
                    </x-slot:actions>
                </x-modal>

                <x-slot:footer>
                    <a href="https://github.com/sparrowhawk-labs/pinion-ui/blob/main/reference/components/{{ $previews[3]['name'] }}.md"
                       class="text-xs link link-hover text-primary">reference/components/{{ $previews[3]['name'] }}.md →</a>
                </x-slot:footer>
            </x-card>

            {{-- 5. Stepper --}}
            <x-card hoverable appearance="default">
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] uppercase tracking-wider text-base-content/50 font-semibold">{{ $previews[4]['category'] }}</span>
                        <code class="text-xs font-mono">&lt;x-{{ $previews[4]['name'] }}&gt;</code>
                    </div>
                </x-slot:header>

                <h3 class="font-semibold mb-3">{{ $previews[4]['title'] }}</h3>
                <x-stepper :items="[
                    ['label' => 'Plan',    'state' => 'done'],
                    ['label' => 'Build',   'state' => 'current'],
                    ['label' => 'Ship',    'state' => 'upcoming'],
                ]" />

                <x-slot:footer>
                    <a href="https://github.com/sparrowhawk-labs/pinion-ui/blob/main/reference/components/{{ $previews[4]['name'] }}.md"
                       class="text-xs link link-hover text-primary">reference/components/{{ $previews[4]['name'] }}.md →</a>
                </x-slot:footer>
            </x-card>

            {{-- 6. Rating --}}
            <x-card hoverable appearance="default">
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] uppercase tracking-wider text-base-content/50 font-semibold">{{ $previews[5]['category'] }}</span>
                        <code class="text-xs font-mono">&lt;x-{{ $previews[5]['name'] }}&gt;</code>
                    </div>
                </x-slot:header>

                <h3 class="font-semibold mb-3">{{ $previews[5]['title'] }}</h3>
                <div class="space-y-2">
                    <div class="flex items-center gap-3">
                        <span class="text-xs text-base-content/60 w-20">stars</span>
                        <x-rating name="overview_rating_1" :value="4" />
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-xs text-base-content/60 w-20">half · heart</span>
                        <x-rating name="overview_rating_2" :value="3.5" half shape="heart" color="error" />
                    </div>
                </div>

                <x-slot:footer>
                    <a href="https://github.com/sparrowhawk-labs/pinion-ui/blob/main/reference/components/{{ $previews[5]['name'] }}.md"
                       class="text-xs link link-hover text-primary">reference/components/{{ $previews[5]['name'] }}.md →</a>
                </x-slot:footer>
            </x-card>

            {{-- 7. Toggle --}}
            <x-card hoverable appearance="default">
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] uppercase tracking-wider text-base-content/50 font-semibold">{{ $previews[6]['category'] }}</span>
                        <code class="text-xs font-mono">&lt;x-{{ $previews[6]['name'] }}&gt;</code>
                    </div>
                </x-slot:header>

                <h3 class="font-semibold mb-3">{{ $previews[6]['title'] }}</h3>
                <div class="space-y-3">
                    <x-toggle name="overview_toggle_1" label="Email notifications" checked stateLabel />
                    <x-toggle name="overview_toggle_2" label="Dark mode" appearance="soft" color="accent" />
                </div>

                <x-slot:footer>
                    <a href="https://github.com/sparrowhawk-labs/pinion-ui/blob/main/reference/components/{{ $previews[6]['name'] }}.md"
                       class="text-xs link link-hover text-primary">reference/components/{{ $previews[6]['name'] }}.md →</a>
                </x-slot:footer>
            </x-card>

            {{-- 8. Input Number --}}
            <x-card hoverable appearance="default">
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] uppercase tracking-wider text-base-content/50 font-semibold">{{ $previews[7]['category'] }}</span>
                        <code class="text-xs font-mono">&lt;x-{{ $previews[7]['name'] }}&gt;</code>
                    </div>
                </x-slot:header>

                <h3 class="font-semibold mb-3">{{ $previews[7]['title'] }}</h3>
                <x-input-number
                    name="overview_qty"
                    label="Quantity"
                    :value="3"
                    :min="0"
                    :max="20"
                    hint="Alpine-driven ± with bound clamping"
                />

                <x-slot:footer>
                    <a href="https://github.com/sparrowhawk-labs/pinion-ui/blob/main/reference/components/{{ $previews[7]['name'] }}.md"
                       class="text-xs link link-hover text-primary">reference/components/{{ $previews[7]['name'] }}.md →</a>
                </x-slot:footer>
            </x-card>

            {{-- 9. Tooltip --}}
            <x-card hoverable appearance="default">
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] uppercase tracking-wider text-base-content/50 font-semibold">{{ $previews[8]['category'] }}</span>
                        <code class="text-xs font-mono">&lt;x-{{ $previews[8]['name'] }}&gt;</code>
                    </div>
                </x-slot:header>

                <h3 class="font-semibold mb-3">{{ $previews[8]['title'] }}</h3>
                <p class="text-sm text-base-content/70 mb-3">Hover any button below:</p>
                <div class="flex flex-wrap gap-2">
                    <x-tooltip text="Default light surface" position="top">
                        <x-button size="sm" appearance="soft">light</x-button>
                    </x-tooltip>
                    <x-tooltip text="Stock dark bubble" color="neutral" position="top">
                        <x-button size="sm">neutral</x-button>
                    </x-tooltip>
                    <x-tooltip text="Semantic colour" color="success" position="top">
                        <x-button size="sm" color="success">success</x-button>
                    </x-tooltip>
                </div>

                <x-slot:footer>
                    <a href="https://github.com/sparrowhawk-labs/pinion-ui/blob/main/reference/components/{{ $previews[8]['name'] }}.md"
                       class="text-xs link link-hover text-primary">reference/components/{{ $previews[8]['name'] }}.md →</a>
                </x-slot:footer>
            </x-card>
        </div>
    </section>

    {{-- ============================================================
         6. Tune preset showcase
         ============================================================ --}}
    <section class="mb-16">
        <div class="flex items-baseline justify-between mb-element">
            <h2 class="text-2xl font-bold tracking-tight">Tune presets</h2>
            <span class="text-sm text-base-content/60">shape · spacing · font — swap with the navbar control above</span>
        </div>

        <p class="text-sm text-base-content/60 mb-element">
            Each tune is one CSS attribute (<code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">data-tune="…"</code>) on <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">&lt;html&gt;</code>. Browsers cascade tune tokens from the nearest ancestor, so each preview card below can demo a different tune locally.
        </p>

        @php
            $tunes = [
                ['name' => 'default',   'desc' => 'Sensible defaults — Inter, mid radius, comfortable spacing.'],
                ['name' => 'sharp',     'desc' => 'Square corners, tighter spacing, no-nonsense.'],
                ['name' => 'soft',      'desc' => 'Generous radii, plush spacing, friendlier reads.'],
                ['name' => 'playful',   'desc' => 'Rounded shapes, Fredoka display, looser space.'],
                ['name' => 'corporate', 'desc' => 'Restrained radii, IBM Plex, tighter line height.'],
                ['name' => 'brutal',    'desc' => 'Zero radius, thick borders, raw and direct.'],
                ['name' => 'elegant',   'desc' => 'Lora serif accents, calm proportions, editorial.'],
                ['name' => 'bold',      'desc' => 'Heavier weights, larger headings, prominent feel.'],
                ['name' => 'pixel',     'desc' => 'Press Start 2P, blocky borders, retro arcade.'],
                ['name' => 'tech',      'desc' => 'JetBrains Mono, neon accents, dev-tool aesthetic.'],
            ];
        @endphp

        <div class="overflow-x-auto -mx-2 px-2 pb-4">
            <div class="flex gap-element snap-x snap-mandatory" style="min-width: 100%;">
                @foreach($tunes as $tune)
                    <div data-tune="{{ $tune['name'] }}" class="snap-start shrink-0 w-64">
                        <x-card hoverable appearance="default" class="h-full">
                            <x-slot:header>
                                <div class="flex items-center justify-between">
                                    <code class="text-xs font-mono text-primary font-semibold">{{ $tune['name'] }}</code>
                                    <x-i type="magic-stick-3" class="w-4 h-4 text-base-content/40" />
                                </div>
                            </x-slot:header>

                            <p class="text-xs text-base-content/70 mb-3 min-h-[3em]">{{ $tune['desc'] }}</p>

                            <div class="flex flex-wrap gap-1.5 items-center">
                                <x-button size="xs" color="primary">Aa</x-button>
                                <x-button size="xs" appearance="outline" color="primary">Btn</x-button>
                                <x-badge size="xs" color="primary">{{ $tune['name'] }}</x-badge>
                            </div>
                        </x-card>
                    </div>
                @endforeach
            </div>
        </div>

        <p class="text-xs text-base-content/40 mt-3">
            <x-i type="info-circle" class="w-3.5 h-3.5 inline-block align-middle" />
            Tune tokens cascade by CSS variable inheritance — set <code class="text-xs">data-tune</code> on any ancestor and descendants inherit. Use the navbar control to flip the whole page.
        </p>
    </section>

    {{-- ============================================================
         7. Links footer
         ============================================================ --}}
    <x-divider />

    <section class="my-16">
        <div class="text-center">
            <h2 class="text-xl font-bold tracking-tight mb-2">Ready to build?</h2>
            <p class="text-sm text-base-content/60 mb-element">Grab the package, scan the components, ship UI.</p>

            <div class="flex flex-wrap items-center justify-center gap-2">
                <x-button
                    appearance="ghost"
                    icon="code-square"
                    iconRight="alt-arrow-right"
                    href="https://github.com/sparrowhawk-labs/pinion-ui"
                >GitHub</x-button>
                <x-button
                    appearance="ghost"
                    icon="download"
                    iconRight="alt-arrow-right"
                    href="https://packagist.org/packages/sparrowhawk-labs/pinion-ui"
                >Packagist</x-button>
                <x-button
                    appearance="ghost"
                    icon="earth"
                    iconRight="alt-arrow-right"
                    href="https://sparrowhawk-labs.dev"
                >sparrowhawk-labs.dev</x-button>
                <x-button
                    appearance="ghost"
                    icon="stars"
                    iconRight="alt-arrow-right"
                    href="https://github.com/sparrowhawk-labs/pinion-icons"
                >pinion-icons</x-button>
            </div>

            <p class="text-xs text-base-content/40 mt-element">
                MIT licensed · built with <x-i type="heart" class="w-3.5 h-3.5 inline-block align-middle text-error" /> by sparrowhawk-labs
            </p>
        </div>
    </section>
@endsection
