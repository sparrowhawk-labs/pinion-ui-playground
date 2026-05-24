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
    {{-- ================================================================
         1. Tune Hero — the merged opener (iteration 3)
         ================================================================
         Two columns, 35 : 65 on lg+. LEFT (narrow): Hero copy + typographic
         tune selector stacked. RIGHT (wide): browser-chrome iframe at ~85%
         scale so the demo reads as a real app screen, not a thumbnail.

         Hero copy leads with the two selling points: TUNE (a switchable
         shape × spacing × font axis) + AI NATIVE (AGENTS.md-grade docs for
         every component). "46 components" is a stat below, not the pitch.

         The iframe loads `/_demo-app` (same-origin). Hover on a tune sets
         `data-tune` on the iframe's documentElement only (preview, no
         reload). Click commits via setTune() — drives the navbar chip
         strip + localStorage.

         Hero height capped around 80vh / 600px so the whole opener fits in
         one eyeful. Iframe content crops below — top portion (top bar +
         KPI strip + start of chart) is the recognizable surface; a bottom
         fade-mask softens the crop.
         ================================================================ --}}
    @php
        // Per-tune display font for the typographic selector list.
        // Stack mirrors what tune.css resolves to so the in-list specimen
        // reads as a faithful preview of the tune's own type voice.
        $tunesHero = [
            ['name' => 'default',   'label' => 'Default',   'font' => '"Inter", system-ui, sans-serif',                        'style' => '',                       'meta' => 'Inter · neutral'],
            ['name' => 'sharp',     'label' => 'Sharp',     'font' => '"Instrument Sans", ui-sans-serif, sans-serif',          'style' => 'font-weight:600;letter-spacing:-0.01em;', 'meta' => 'Instrument · 0 radius'],
            ['name' => 'soft',      'label' => 'Soft',      'font' => '"Quicksand", ui-sans-serif, sans-serif',                'style' => 'font-weight:600;',       'meta' => 'Quicksand · pillows'],
            ['name' => 'playful',   'label' => 'Playful',   'font' => '"Fredoka", ui-sans-serif, sans-serif',                  'style' => 'font-weight:600;',       'meta' => 'Fredoka · cheerful'],
            ['name' => 'corporate', 'label' => 'Corporate', 'font' => '"Libre Franklin", ui-sans-serif, sans-serif',           'style' => 'font-weight:700;letter-spacing:-0.005em;', 'meta' => 'Libre · trustworthy'],
            ['name' => 'brutal',    'label' => 'Brutal',    'font' => '"Space Grotesk", ui-sans-serif, sans-serif',            'style' => 'font-weight:700;text-transform:uppercase;letter-spacing:0.04em;', 'meta' => 'Space · 2px walls'],
            ['name' => 'elegant',   'label' => 'Elegant',   'font' => '"Playfair Display", Georgia, serif',                    'style' => 'font-style:italic;font-weight:700;', 'meta' => 'Playfair · serif'],
            ['name' => 'bold',      'label' => 'Bold',      'font' => '"Montserrat", ui-sans-serif, sans-serif',               'style' => 'font-weight:900;letter-spacing:-0.01em;', 'meta' => 'Montserrat · loud'],
            ['name' => 'pixel',     'label' => 'Pixel',     'font' => '"PixelMplus10", "Press Start 2P", monospace',           'style' => 'letter-spacing:0.04em;',  'meta' => 'PixelMplus · 8-bit'],
            ['name' => 'tech',      'label' => 'Tech',      'font' => '"JetBrains Mono", ui-monospace, monospace',             'style' => 'font-weight:500;',       'meta' => 'JetBrains · code'],
        ];
    @endphp

    {{-- Breakout: pull left/right/up out of main's padding so the gradient
         backdrop fills edge-to-edge. Bottom margin returns to flow. --}}
    <div class="-mx-6 lg:-mx-10 -mt-10 mb-12">
    <section
        class="tune-hero relative isolate overflow-hidden"
        x-data="{
            hoverTune: null,
            hoverTheme: null,
            // Auto-cycle preview state. When nobody is hovering, these advance
            // through the lists on a timer and drive the iframe preview +
            // visual active marker. They never touch the OUTER page state
            // (committed `tune`/`theme` and localStorage stay put).
            cycleTune: null,
            cycleTheme: null,
            _cycleTuneIdx: 0,
            _cycleThemeIdx: 0,
            _cycleTimer: null,
            _cyclePhase: 'tune',     // 'tune' | 'theme' — alternates so only ONE axis cycles at a time
            _cycleTicksInPhase: 0,
            _cycleStopped: false,
            // Local-only previews applied to the iframe's documentElement.
            // We never touch the OUTER page's data-tune/data-theme, so the
            // left-column Hero copy stays put while only the preview swaps.
            applyTunePreviewToIframe(name) {
                const f = document.getElementById('tune-hero-frame');
                if (!f || !f.contentDocument) return;
                const doc = f.contentDocument.documentElement;
                if (doc) doc.setAttribute('data-tune', name ?? (this.tune || 'default'));
            },
            applyThemePreviewToIframe(name) {
                const f = document.getElementById('tune-hero-frame');
                if (!f || !f.contentDocument) return;
                const doc = f.contentDocument.documentElement;
                if (doc) doc.setAttribute('data-theme', name ?? (this.theme || 'pinion'));
            },
            commitTune(name) {
                // Global commit — calls inherited setTune() from the body scope,
                // which writes data-tune on <html>, persists to localStorage,
                // and updates the navbar tune-chip strip. Also stops auto-cycle
                // so the user's commit is visibly respected.
                this.setTune(name);
                this.hoverTune = null;
                this.stopCycling();
                this.applyTunePreviewToIframe(name);
            },
            commitTheme(name) {
                this.setTheme(name);
                this.hoverTheme = null;
                this.stopCycling();
                this.applyThemePreviewToIframe(name);
            },
            startCycling() {
                // Skip auto-cycle entirely under prefers-reduced-motion.
                if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
                if (this._cycleStopped) return;
                // Single timer alternates phases. Only ONE axis cycles at a
                // time so the visual change is attributable to that axis
                // (showing both axes drifting at once made the demo unreadable).
                // Phase length: 8 ticks × 1500ms = 12s per axis.
                const TICK_MS = 1500;
                const TICKS_PER_PHASE = 8;
                this._cycleTimer = setInterval(() => {
                    if (this._cycleStopped) return;

                    // Advance the currently-active axis (respect hover-pause).
                    if (this._cyclePhase === 'tune') {
                        if (this.hoverTune === null) {
                            this._cycleTuneIdx = (this._cycleTuneIdx + 1) % this.tunes.length;
                            this.cycleTune = this.tunes[this._cycleTuneIdx];
                        }
                    } else {
                        if (this.hoverTheme === null) {
                            this._cycleThemeIdx = (this._cycleThemeIdx + 1) % this.themes.length;
                            this.cycleTheme = this.themes[this._cycleThemeIdx];
                        }
                    }

                    // After advancing, see if it's time to swap phases.
                    this._cycleTicksInPhase++;
                    if (this._cycleTicksInPhase >= TICKS_PER_PHASE) {
                        this._cyclePhase = (this._cyclePhase === 'tune') ? 'theme' : 'tune';
                        this._cycleTicksInPhase = 0;
                        // Reset the now-dormant axis so iframe/selector revert
                        // to the committed value while the other axis takes over.
                        if (this._cyclePhase === 'tune') this.cycleTheme = null;
                        else                              this.cycleTune  = null;
                    }
                }, TICK_MS);
            },
            stopCycling() {
                this._cycleStopped = true;
                if (this._cycleTimer) { clearInterval(this._cycleTimer); this._cycleTimer = null; }
                this.cycleTune = null;
                this.cycleTheme = null;
            },
            initFrame() {
                const f = document.getElementById('tune-hero-frame');
                if (!f) return;
                const sync = () => {
                    this.applyTunePreviewToIframe(this.tune);
                    this.applyThemePreviewToIframe(this.theme);
                };
                if (f.contentDocument && f.contentDocument.readyState === 'complete') {
                    sync();
                } else {
                    f.addEventListener('load', sync, { once: true });
                }
            },
        }"
        x-init="initFrame(); startCycling()"
        x-effect="applyTunePreviewToIframe(hoverTune ?? cycleTune ?? tune); applyThemePreviewToIframe(hoverTheme ?? cycleTheme ?? theme)"
    >
        {{-- Atmospheric backdrop: dual radial gradients + faint grid texture.
             Scoped via the .tune-hero selector below. --}}
        <div aria-hidden="true" class="tune-hero__bg">
            <div class="tune-hero__bg-grad"></div>
            <div class="tune-hero__bg-grid"></div>
        </div>

        <div class="tune-hero__container">
            {{-- ========== 35% LEFT: heading → CTAs → tune selector ========== --}}
            <div class="tune-hero__copy-col">
                {{-- Eyebrow + version chip --}}
                <div class="tune-hero__eyebrow-row">
                    <x-badge appearance="soft" color="primary" icon="bolt">v0.4.0 · BLADE</x-badge>
                    <span class="tune-hero__eyebrow">— REACT / VUE / WEB COMPONENTS COMING v0.5+</span>
                </div>

                {{-- Title — leads with the two selling points (tune + AI native).
                     "tuneable" picks up the active tune's display font on hover. --}}
                <h1 class="tune-hero__title">
                    <span
                        class="tune-hero__title-line tune-hero__title-line--accent"
                        :data-tune="tune"
                    ><span class="tune-hero__title-tune">Tuneable</span> UI,</span>
                    <span class="tune-hero__title-line">built for AI</span>
                    <span class="tune-hero__title-line tune-hero__title-line--muted">to ship with.</span>
                </h1>

                <p class="tune-hero__subtitle">
                    Shape, spacing, and font are a switchable axis — flip <code>data-tune</code> and the whole surface changes without touching theme. Every component ships with an AGENTS.md-grade reference doc so AI agents read it once and code it right.
                </p>

                {{-- Primary CTAs --}}
                <div class="tune-hero__ctas">
                    <x-button
                        href="https://github.com/sparrowhawk-labs/pinion-ui"
                        color="primary"
                        size="md"
                        icon="code-square"
                        iconRight="arrow-right"
                    >View on GitHub</x-button>
                    <x-button
                        href="#components"
                        appearance="ghost"
                        size="md"
                        icon="widget"
                    >Browse components</x-button>
                </div>

                {{-- Handoff strip. "10 Tune presets" lives last so the eye
                     runs into the typographic list immediately below. --}}
                <div class="tune-hero__chips">
                    <x-badge appearance="soft" color="info" icon="palette">30+ daisyUI themes</x-badge>
                    <x-badge appearance="soft" color="neutral" icon="widget">46 Blade components</x-badge>
                    <x-badge appearance="outline" color="accent" icon="magic-stick-3">10 Tune presets ↓</x-badge>
                </div>

                {{-- ==== Selectors row: TUNE on the left, THEME on the right.
                     Same width (1fr 1fr) + same height (each list capped at
                     290px). Side-by-side at lg+; stacks below lg.            --}}
                <div class="tune-hero__selectors">
                    {{-- TUNE selector --}}
                    <div class="tune-hero__selector">
                        <div class="tune-hero__selector-head">
                            <span class="tune-hero__selector-label">PICK A TUNE</span>
                        </div>

                        <div class="tune-hero__list"
                             role="listbox"
                             aria-label="Tune presets"
                             x-on:mouseleave="hoverTune = null">
                            @foreach($tunesHero as $idx => $t)
                                <button
                                    type="button"
                                    role="option"
                                    x-on:mouseenter="hoverTune = '{{ $t['name'] }}'; applyTunePreviewToIframe('{{ $t['name'] }}')"
                                    x-on:focus="hoverTune = '{{ $t['name'] }}'; applyTunePreviewToIframe('{{ $t['name'] }}')"
                                    x-on:click="commitTune('{{ $t['name'] }}')"
                                    x-bind:class="{
                                        'tune-hero__row--active': (cycleTune ?? tune) === '{{ $t['name'] }}' && !hoverTune,
                                        'tune-hero__row--hover':  hoverTune === '{{ $t['name'] }}',
                                    }"
                                    x-bind:aria-selected="tune === '{{ $t['name'] }}' ? 'true' : 'false'"
                                    class="tune-hero__row tune-hero__row--tune"
                                    style="animation-delay: {{ $idx * 35 }}ms;"
                                >
                                    <span class="tune-hero__row-num">{{ str_pad($idx + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                    <span class="tune-hero__row-name"
                                          style="font-family: {{ $t['font'] }}; {{ $t['style'] }}">{{ $t['label'] }}</span>
                                    <span class="tune-hero__row-mark" aria-hidden="true">
                                        <template x-if="(cycleTune ?? tune) === '{{ $t['name'] }}' && !hoverTune">
                                            <x-i type="check-circle" class="w-3.5 h-3.5" />
                                        </template>
                                        <template x-if="hoverTune === '{{ $t['name'] }}'">
                                            <x-i type="eye" class="w-3.5 h-3.5" />
                                        </template>
                                    </span>
                                </button>
                            @endforeach
                        </div>
                    </div>

                    {{-- THEME selector — uses Alpine x-for to render the 30+
                         daisyUI themes from the body scope `themes` array.
                         Each row carries its own data-theme so the inline
                         swatches resolve --color-primary/secondary/accent
                         from that theme's CSS variables. --}}
                    <div class="tune-hero__selector">
                        <div class="tune-hero__selector-head">
                            <span class="tune-hero__selector-label tune-hero__selector-label--theme">PICK A THEME</span>
                        </div>

                        <div class="tune-hero__list"
                             role="listbox"
                             aria-label="Color themes"
                             x-on:mouseleave="hoverTheme = null">
                            <template x-for="(t, i) in themes" :key="t">
                                <button
                                    type="button"
                                    role="option"
                                    x-on:mouseenter="hoverTheme = t; applyThemePreviewToIframe(t)"
                                    x-on:focus="hoverTheme = t; applyThemePreviewToIframe(t)"
                                    x-on:click="commitTheme(t)"
                                    x-bind:class="{
                                        'tune-hero__row--active-theme': (cycleTheme ?? theme) === t && !hoverTheme,
                                        'tune-hero__row--hover-theme':  hoverTheme === t,
                                    }"
                                    x-bind:aria-selected="theme === t ? 'true' : 'false'"
                                    x-bind:style="`animation-delay: ${i * 18}ms;`"
                                    class="tune-hero__row tune-hero__row--theme"
                                >
                                    {{-- data-theme is scoped to the swatch chip only.
                                         If we put it on the whole row, the row's
                                         text colors (base-content) get resolved to
                                         that theme's palette too, breaking contrast
                                         against the page (e.g. dark-theme row text
                                         goes white on the light page). Swatch-only
                                         scope keeps colour preview without breaking
                                         the row's readability. --}}
                                    <span class="tune-hero__row-swatches" aria-hidden="true" x-bind:data-theme="t">
                                        <span class="bg-primary"></span>
                                        <span class="bg-secondary"></span>
                                        <span class="bg-accent"></span>
                                    </span>
                                    <span class="tune-hero__row-name" x-text="t"></span>
                                    <span class="tune-hero__row-mark" aria-hidden="true">
                                        <template x-if="(cycleTheme ?? theme) === t && !hoverTheme">
                                            <span><x-i type="check-circle" class="w-3.5 h-3.5" /></span>
                                        </template>
                                        <template x-if="hoverTheme === t">
                                            <span><x-i type="eye" class="w-3.5 h-3.5" /></span>
                                        </template>
                                    </span>
                                </button>
                            </template>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ========== 65% RIGHT: iframe preview at ~85% scale ========== --}}
            <div class="tune-hero__preview-col">
                <div class="tune-hero__preview-frame">
                    {{-- Browser chrome trim — sells the "this is an app screen" read --}}
                    <div class="tune-hero__chrome">
                        <div class="tune-hero__chrome-dots">
                            <span style="background: #ff5f57"></span>
                            <span style="background: #febc2e"></span>
                            <span style="background: #28c840"></span>
                        </div>
                        <div class="tune-hero__chrome-addr">
                            <x-i type="lock-keyhole" class="w-3 h-3 opacity-50" />
                            acme.pinion.app
                            <span class="tune-hero__chrome-tune-tag">
                                data-tune=<span x-text="hoverTune ?? cycleTune ?? tune" class="text-primary font-semibold">default</span>
                            </span>
                        </div>
                    </div>

                    {{-- Scaled iframe wrapper. Iframe is sized at 1/scale so
                         post-`scale(.85)` it covers the column. transform-origin
                         is top-left. Bottom is cropped to fit hero height —
                         that's intentional (top bar + KPI strip + chart start
                         is the recognizable surface). Fade-mask softens crop. --}}
                    <div class="tune-hero__iframe-clip">
                        <iframe
                            id="tune-hero-frame"
                            src="/_demo-app"
                            title="pinion-ui app demo"
                            class="tune-hero__iframe"
                            loading="lazy"
                            scrolling="no"
                            tabindex="-1"
                            aria-hidden="true"
                        ></iframe>
                        {{-- Bottom fade-mask to soften the hard crop --}}
                        <div class="tune-hero__iframe-fade" aria-hidden="true"></div>
                    </div>

                    {{-- Hover-catch shield: prevents the iframe from swallowing
                         pointer events; stops accidental clicks/scroll inside. --}}
                    <div class="tune-hero__iframe-shield" aria-hidden="true"></div>

                    {{-- Live label, bottom edge, monospace --}}
                    <div class="tune-hero__preview-foot">
                        <span class="inline-flex items-center gap-1.5">
                            <span class="tune-hero__live-dot"></span>
                            <span>LIVE</span>
                        </span>
                        <span class="opacity-50">·</span>
                        <span>acme studio · throughput dashboard</span>
                        <span class="ml-auto opacity-50">
                            <template x-if="hoverTune || cycleTune">
                                <span>previewing <span class="text-accent font-semibold" x-text="hoverTune ?? cycleTune"></span></span>
                            </template>
                            <template x-if="!hoverTune && !cycleTune">
                                <span>committed: <span class="text-primary font-semibold" x-text="tune"></span></span>
                            </template>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>

    <style>
        /* ============================================================
           Tune Hero styles — scoped under .tune-hero
           ============================================================ */
        .tune-hero {
            padding: 1.75rem 1.5rem 1.5rem;
            border-radius: 0;
        }
        @media (min-width: 1024px) {
            .tune-hero { padding: 2rem 2.5rem 1.75rem; }
        }
        .tune-hero__bg {
            position: absolute; inset: 0; z-index: -1;
            pointer-events: none; overflow: hidden;
        }
        .tune-hero__bg-grad {
            position: absolute; inset: -25%;
            background:
                radial-gradient(ellipse at 12% 22%, color-mix(in oklab, var(--color-primary) 18%, transparent), transparent 55%),
                radial-gradient(ellipse at 88% 78%, color-mix(in oklab, var(--color-accent) 22%, transparent), transparent 52%),
                radial-gradient(ellipse at 50% 50%, color-mix(in oklab, var(--color-secondary) 10%, transparent), transparent 72%);
            filter: blur(48px);
            animation: tune-hero-drift 22s ease-in-out infinite alternate;
        }
        .tune-hero__bg-grid {
            position: absolute; inset: 0;
            background-image:
                linear-gradient(to right, color-mix(in oklab, var(--color-base-content) 6%, transparent) 1px, transparent 1px),
                linear-gradient(to bottom, color-mix(in oklab, var(--color-base-content) 6%, transparent) 1px, transparent 1px);
            background-size: 36px 36px;
            mask-image: radial-gradient(ellipse at center, black 35%, transparent 78%);
            opacity: 0.5;
        }
        @keyframes tune-hero-drift {
            0%   { transform: translate(-2%, -1%) scale(1.0); }
            50%  { transform: translate(2%, 2%) scale(1.04); }
            100% { transform: translate(-1%, 1%) scale(1.02); }
        }

        /* Container grid 35 / 65 (stacks below lg). Copy LEFT, iframe RIGHT. */
        .tune-hero__container {
            position: relative;
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
            align-items: stretch;
        }
        @media (min-width: 1024px) {
            .tune-hero__container {
                grid-template-columns: 35fr 65fr;
                gap: 2.25rem;
            }
        }

        /* ============ LEFT: iframe preview ============ */
        .tune-hero__preview-col {
            display: flex; flex-direction: column;
            min-width: 0;
        }
        .tune-hero__preview-frame {
            position: relative;
            display: flex; flex-direction: column;
            border-radius: 1rem;
            background: color-mix(in oklab, var(--color-base-100) 92%, transparent);
            border: 1px solid color-mix(in oklab, var(--color-base-content) 14%, transparent);
            box-shadow:
                0 1px 0 color-mix(in oklab, var(--color-base-content) 6%, transparent) inset,
                0 40px 80px -30px color-mix(in oklab, var(--color-base-content) 28%, transparent);
            overflow: hidden;
            backdrop-filter: blur(6px);
        }
        @media (min-width: 1024px) {
            /* lg+: stretch the frame to fill the column so its bottom edge
               aligns with the LEFT (copy + selector) column's bottom. */
            .tune-hero__preview-frame { flex: 1; }
        }
        .tune-hero__chrome {
            display: flex; align-items: center; gap: 0.625rem;
            padding: 0.5rem 0.875rem;
            background: color-mix(in oklab, var(--color-base-200) 70%, transparent);
            border-bottom: 1px solid color-mix(in oklab, var(--color-base-content) 10%, transparent);
            font-family: ui-monospace, "SFMono-Regular", monospace;
            font-size: 0.75rem;
            color: color-mix(in oklab, var(--color-base-content) 70%, transparent);
        }
        .tune-hero__chrome-dots {
            display: flex; gap: 0.375rem;
        }
        .tune-hero__chrome-dots span {
            display: inline-block;
            width: 10px; height: 10px;
            border-radius: 999px;
            opacity: 0.85;
        }
        .tune-hero__chrome-addr {
            flex: 1;
            display: inline-flex; align-items: center; gap: 0.375rem;
            padding: 0.25rem 0.625rem;
            background: color-mix(in oklab, var(--color-base-100) 80%, transparent);
            border-radius: 999px;
            border: 1px solid color-mix(in oklab, var(--color-base-content) 8%, transparent);
            font-size: 0.6875rem;
            max-width: 100%;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
        .tune-hero__chrome-tune-tag {
            margin-left: 0.5rem;
            padding: 0 0.375rem;
            border-radius: 4px;
            background: color-mix(in oklab, var(--color-primary) 8%, transparent);
            color: color-mix(in oklab, var(--color-base-content) 70%, transparent);
            font-size: 0.625rem;
        }

        /* Scaled-iframe clip box. Hero-appropriate height (not a tower):
           ~80vh on lg+ with a hard cap so the whole opener is a single
           eyeful. Below the iframe content is cropped intentionally. */
        .tune-hero__iframe-clip {
            position: relative;
            width: 100%;
            /* mobile: shorter, app reads as a card */
            height: clamp(360px, 56vh, 480px);
            background:
                linear-gradient(to bottom,
                    color-mix(in oklab, var(--color-base-200) 40%, transparent),
                    transparent 30%);
            overflow: hidden;
        }
        @media (min-width: 1024px) {
            .tune-hero__iframe-clip {
                /* lg+: clip box flex-grows inside .tune-hero__preview-frame
                   (which itself stretches to match the LEFT column height),
                   so the iframe's bottom edge aligns with the selector list's
                   bottom edge. min-height keeps a sensible floor. */
                flex: 1;
                height: auto;
                min-height: 460px;
            }
        }
        /* Iframe at ~85% scale. Inverse-sized so it still fills the clip
           box after the transform. transform-origin top-left so the crop
           lands at the bottom (we want the top of the app visible). */
        .tune-hero__iframe {
            position: absolute;
            top: 0; left: 0;
            width: calc(100% / 0.85);   /* ≈ 117.65% */
            height: calc(100% / 0.85);
            border: 0;
            transform: scale(0.85);
            transform-origin: top left;
            pointer-events: none;
            background: var(--color-base-100);
        }
        /* Bottom fade-mask that softens the hard crop where the iframe
           clips. Sits inside the clip box, above the iframe, no pointer. */
        .tune-hero__iframe-fade {
            position: absolute;
            left: 0; right: 0; bottom: 0;
            height: 96px;
            pointer-events: none;
            z-index: 1;
            background: linear-gradient(
                to bottom,
                transparent 0%,
                color-mix(in oklab, var(--color-base-100) 55%, transparent) 55%,
                color-mix(in oklab, var(--color-base-100) 92%, transparent) 100%
            );
        }
        .tune-hero__iframe-shield {
            position: absolute;
            inset: 38px 0 30px 0;
            z-index: 2;
            pointer-events: auto;
            background: transparent;
            /* Subtle inner ring so the preview "frame" reads */
            box-shadow: 0 0 0 1px color-mix(in oklab, var(--color-base-content) 4%, transparent) inset;
        }
        .tune-hero__preview-foot {
            position: relative;
            display: flex; align-items: center; gap: 0.5rem;
            padding: 0.5rem 0.875rem;
            border-top: 1px solid color-mix(in oklab, var(--color-base-content) 10%, transparent);
            background: color-mix(in oklab, var(--color-base-200) 70%, transparent);
            font-family: ui-monospace, "SFMono-Regular", monospace;
            font-size: 0.6875rem;
            color: color-mix(in oklab, var(--color-base-content) 70%, transparent);
        }
        .tune-hero__live-dot {
            width: 6px; height: 6px; border-radius: 999px;
            background: var(--color-success);
            box-shadow: 0 0 0 0 color-mix(in oklab, var(--color-success) 60%, transparent);
            animation: tune-hero-pulse 2.4s ease-in-out infinite;
        }
        @keyframes tune-hero-pulse {
            0%, 100% { box-shadow: 0 0 0 0 color-mix(in oklab, var(--color-success) 60%, transparent); }
            50%      { box-shadow: 0 0 0 6px color-mix(in oklab, var(--color-success) 0%, transparent); }
        }

        /* ============ RIGHT: copy + selector column ============ */
        .tune-hero__copy-col {
            display: flex; flex-direction: column;
            min-width: 0;
        }
        .tune-hero__eyebrow-row {
            display: flex; align-items: center; gap: 0.625rem;
            margin-bottom: 0.625rem;
            flex-wrap: wrap;
        }
        .tune-hero__eyebrow {
            font-family: ui-monospace, "SFMono-Regular", monospace;
            font-size: 0.625rem;
            letter-spacing: 0.16em;
            color: color-mix(in oklab, var(--color-base-content) 55%, transparent);
            font-weight: 600;
        }
        .tune-hero__title {
            font-size: clamp(2.25rem, 4vw, 3.5rem);
            line-height: 1.02;
            font-weight: 900;
            letter-spacing: -0.032em;
            display: flex; flex-direction: column; gap: 0.02em;
            margin-bottom: 0.875rem;
        }
        .tune-hero__title-line { display: block; }
        .tune-hero__title-line--accent {
            /* Inherit no `display: flex` from parent — keep word flow inline.
               Size/weight match the other lines (parent .tune-hero__title) for
               a uniform 3-line headline; only the font swap on `:data-tune`
               distinguishes this line. */
            display: inline-block;
            /* Force-inherit from parent because tune.css applies
               `[data-tune] { font-size: var(--font-size-base, 1rem) }` to ANY
               element carrying data-tune, which would otherwise reset this
               span to 16px. */
            font-size: inherit;
            line-height: inherit;
            transition: font-family 280ms ease;
        }
        .tune-hero__title-line--muted {
            color: color-mix(in oklab, var(--color-base-content) 60%, transparent);
            font-weight: 800;
        }
        .tune-hero__title-tune {
            /* This single word adopts the hovered/active tune's heading font
               via inheritance (we set :data-tune on the parent span). It
               also gets a gradient sweep to draw the eye. */
            font-family: var(--font-heading, inherit);
            background: linear-gradient(120deg, var(--color-primary), var(--color-accent));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            font-style: italic;
            padding-right: 0.06em;
        }
        .tune-hero__subtitle {
            font-size: 0.8125rem;
            color: color-mix(in oklab, var(--color-base-content) 72%, transparent);
            line-height: 1.5;
            margin-bottom: 0.75rem;
            max-width: 34rem;
        }
        .tune-hero__subtitle code {
            font-family: ui-monospace, "SFMono-Regular", monospace;
            font-size: 0.8125rem;
            background: color-mix(in oklab, var(--color-base-content) 8%, transparent);
            padding: 0.1em 0.4em;
            border-radius: 0.25rem;
        }
        .tune-hero__ctas {
            display: flex; flex-wrap: wrap; gap: 0.5rem;
            margin-bottom: 0.625rem;
        }
        .tune-hero__chips {
            display: flex; flex-wrap: wrap; gap: 0.375rem;
            padding-bottom: 0.625rem;
            margin-bottom: 0.625rem;
            border-bottom: 1px dashed color-mix(in oklab, var(--color-base-content) 14%, transparent);
        }

        /* Selectors row — TUNE | THEME side-by-side at lg+, stacks below. */
        .tune-hero__selectors {
            display: flex; flex-direction: column;
            gap: 0.875rem;
        }
        @media (min-width: 1024px) {
            .tune-hero__selectors {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 0.625rem;
            }
        }

        /* Selector */
        .tune-hero__selector {
            display: flex; flex-direction: column;
            gap: 0.5rem;
            min-width: 0;
        }
        .tune-hero__selector-head {
            display: flex; align-items: baseline; justify-content: space-between;
            gap: 0.5rem;
        }
        .tune-hero__selector-label {
            font-family: ui-monospace, "SFMono-Regular", monospace;
            font-size: 0.625rem;
            letter-spacing: 0.18em;
            color: color-mix(in oklab, var(--color-accent) 75%, transparent);
            font-weight: 700;
        }
        .tune-hero__selector-label--theme {
            /* Theme selector uses primary accent to visually distinguish from
               the tune selector's accent color, while staying in the palette. */
            color: color-mix(in oklab, var(--color-primary) 75%, transparent);
        }
        .tune-hero__selector-hint {
            font-family: ui-monospace, "SFMono-Regular", monospace;
            font-size: 0.625rem;
            letter-spacing: 0.05em;
            color: color-mix(in oklab, var(--color-base-content) 45%, transparent);
        }
        .tune-hero__list {
            display: flex; flex-direction: column;
            gap: 0.0625rem;
            padding: 0.3125rem;
            border-radius: 0.75rem;
            background: color-mix(in oklab, var(--color-base-100) 70%, transparent);
            border: 1px solid color-mix(in oklab, var(--color-base-content) 10%, transparent);
            backdrop-filter: blur(6px);
            box-shadow: 0 20px 40px -25px color-mix(in oklab, var(--color-base-content) 22%, transparent);
            /* All 10 tunes fit on tall viewports; on short viewports scroll
               inside the list so the hero stays a single eyeful. */
            max-height: 290px;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: color-mix(in oklab, var(--color-base-content) 22%, transparent) transparent;
        }
        .tune-hero__list::-webkit-scrollbar { width: 6px; }
        .tune-hero__list::-webkit-scrollbar-track { background: transparent; }
        .tune-hero__list::-webkit-scrollbar-thumb {
            background: color-mix(in oklab, var(--color-base-content) 18%, transparent);
            border-radius: 6px;
        }
        .tune-hero__row {
            position: relative;
            display: grid;
            grid-template-columns: 1.25rem 1fr 1rem;
            align-items: baseline;
            gap: 0.5rem;
            padding: 0.32rem 0.625rem;
            background: transparent;
            border: 1px solid transparent;
            border-radius: 0.5rem;
            text-align: left;
            color: var(--color-base-content);
            cursor: pointer;
            transition:
                background 180ms ease,
                border-color 180ms ease,
                transform 200ms cubic-bezier(.2,.8,.2,1);
            animation: tune-hero-row-in 540ms cubic-bezier(.2,.8,.2,1) both;
        }
        /* Theme row uses a 3-swatch chip in place of the index number. */
        .tune-hero__row--theme {
            grid-template-columns: 1.75rem 1fr 1rem;
        }
        .tune-hero__row-swatches {
            display: inline-flex; align-items: center; gap: 1px;
            align-self: center;
            border-radius: 3px;
            overflow: hidden;
            box-shadow: 0 0 0 1px color-mix(in oklab, var(--color-base-content) 14%, transparent);
        }
        .tune-hero__row-swatches > span {
            display: inline-block;
            width: 8px; height: 14px;
        }
        @keyframes tune-hero-row-in {
            0%   { opacity: 0; transform: translateX(8px); }
            100% { opacity: 1; transform: translateX(0); }
        }
        .tune-hero__row:hover { transform: translateX(2px); }
        .tune-hero__row-num {
            font-family: ui-monospace, "SFMono-Regular", monospace;
            font-size: 0.625rem;
            color: color-mix(in oklab, var(--color-base-content) 40%, transparent);
            font-feature-settings: "tnum";
            align-self: center;
        }
        .tune-hero__row-name {
            /* The headline: each row's label rendered in its OWN tune's
               display font. This is the strongest single visual hook. */
            font-size: 0.95rem;
            line-height: 1.1;
            color: var(--color-base-content);
            min-width: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            align-self: center;
        }
        .tune-hero__row-meta {
            font-family: ui-monospace, "SFMono-Regular", monospace;
            font-size: 0.625rem;
            color: color-mix(in oklab, var(--color-base-content) 45%, transparent);
            white-space: nowrap;
            align-self: center;
        }
        .tune-hero__row-mark {
            display: flex; align-items: center; justify-content: center;
            color: color-mix(in oklab, var(--color-base-content) 30%, transparent);
            align-self: center;
        }

        /* Hover state */
        .tune-hero__row:hover,
        .tune-hero__row--hover {
            background: color-mix(in oklab, var(--color-accent) 12%, transparent);
            border-color: color-mix(in oklab, var(--color-accent) 32%, transparent);
        }
        .tune-hero__row--hover .tune-hero__row-mark,
        .tune-hero__row:hover .tune-hero__row-mark {
            color: var(--color-accent);
        }

        /* Active (committed) state */
        .tune-hero__row--active {
            background: color-mix(in oklab, var(--color-primary) 12%, transparent);
            border-color: color-mix(in oklab, var(--color-primary) 38%, transparent);
            box-shadow:
                0 0 0 1px color-mix(in oklab, var(--color-primary) 22%, transparent),
                0 4px 14px -6px color-mix(in oklab, var(--color-primary) 35%, transparent);
        }
        .tune-hero__row--active .tune-hero__row-num,
        .tune-hero__row--active .tune-hero__row-mark {
            color: var(--color-primary);
            font-weight: 700;
        }

        /* Theme selector hover + active states. Mirror of the tune row but
           keyed off `theme`/`hoverTheme` (separate Alpine state). We can't
           reuse the same modifier classes because Tailwind/daisyUI re-resolves
           `bg-primary` inside `[data-theme]`-scoped rows, which would tint
           every row's hover/active state to ITS OWN theme rather than the
           page's current theme. Solid neutrals avoid that surprise. */
        .tune-hero__row--hover-theme {
            background: color-mix(in oklab, var(--color-base-content) 8%, transparent);
            border-color: color-mix(in oklab, var(--color-base-content) 22%, transparent);
        }
        .tune-hero__row--hover-theme .tune-hero__row-mark {
            color: color-mix(in oklab, var(--color-base-content) 65%, transparent);
        }
        .tune-hero__row--active-theme {
            background: color-mix(in oklab, var(--color-base-content) 10%, transparent);
            border-color: color-mix(in oklab, var(--color-base-content) 38%, transparent);
            box-shadow:
                0 0 0 1px color-mix(in oklab, var(--color-base-content) 22%, transparent),
                0 4px 14px -6px color-mix(in oklab, var(--color-base-content) 35%, transparent);
        }
        .tune-hero__row--active-theme .tune-hero__row-name,
        .tune-hero__row--active-theme .tune-hero__row-mark {
            color: var(--color-base-content);
            font-weight: 700;
        }

        .tune-hero__row:focus-visible {
            outline: 2px solid var(--color-accent);
            outline-offset: 2px;
        }

        /* Reduced motion — keep transitions, kill ambient animation */
        @media (prefers-reduced-motion: reduce) {
            .tune-hero__bg-grad,
            .tune-hero__live-dot,
            .tune-hero__row {
                animation: none !important;
            }
            .tune-hero__row:hover { transform: none; }
            .tune-hero__title-line--accent { transition: none; }
        }
    </style>

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
