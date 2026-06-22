@extends('layouts.playground', ['noSidebar' => true])

@section('title', '— Tune Lab')
@section('heading', '')
@section('subheading', '')

@push('scripts')
<style>
    /* Hero/heading stubs from the layout are empty here — hide them. */
    main > h1:empty,
    main > p:empty { display: none; }

    /* ============================================================
       Smooth tune / strength morph.
       When the switcher pokes data-tune / data-tune-strength on <html>,
       the cascading shape/space/font/border/shadow tokens swap. Without
       transitions every component snaps; here they cross-fade so the whole
       page reads as a fluid morph. Scoped to `.tune-lab *` so it never
       leaks into the sticky navbar above. Properties are listed explicitly
       (NEVER `transition: all`) so layout-only props aren't animated.
       `:where(...)` keeps zero specificity so it never fights component CSS.
       font-family can't interpolate across families — the swap is instant
       but the surrounding shape/color morph masks it. Reduced-motion off. */
    :where(.tune-lab *) {
        transition:
            background-color 650ms ease,
            color            650ms ease,
            border-color     650ms ease,
            border-radius    520ms cubic-bezier(.2,.8,.2,1),
            border-width     520ms ease,
            box-shadow       650ms ease,
            fill             650ms ease,
            stroke           650ms ease;
    }
    @media (prefers-reduced-motion: reduce) {
        :where(.tune-lab *) { transition: none; }
    }

    /* ============================================================
       Tune Lab control bar (the signature element) — an instrument
       panel. Monospace labels, numbered tune keys, a strength dial.
       Lives in its own scope so the morph transition doesn't soften
       the panel's own hover feedback (those use shorter transitions).
       ============================================================ */
    .tl-bar {
        background: color-mix(in oklab, var(--color-base-100) 86%, transparent);
        backdrop-filter: blur(10px);
        border-bottom: 1px solid color-mix(in oklab, var(--color-base-content) 12%, transparent);
        box-shadow: 0 10px 30px -22px color-mix(in oklab, var(--color-base-content) 60%, transparent);
    }
    .tl-bar__inner {
        max-width: 80rem;
        margin-inline: auto;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 0.75rem 1.25rem;
        padding: 0.6rem 1.5rem;
    }
    @media (min-width: 1024px) { .tl-bar__inner { padding-inline: 2.5rem; } }
    .tl-bar__legend {
        font-family: ui-monospace, "SFMono-Regular", monospace;
        font-size: 0.625rem;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        font-weight: 700;
        color: color-mix(in oklab, var(--color-accent) 80%, var(--color-base-content));
        white-space: nowrap;
    }
    .tl-bar__group { display: flex; align-items: center; gap: 0.5rem; min-width: 0; }
    .tl-bar__divider {
        width: 1px; align-self: stretch; min-height: 1.5rem;
        background: color-mix(in oklab, var(--color-base-content) 14%, transparent);
    }

    /* ── SIGNATURE: the switcher is a CONTACT SHEET of all 11 tunes ──
       Each chip carries its OWN `data-tune`, so its corner radius, border
       weight and typeface are pulled straight from the real tune system —
       the chip IS an authentic 1:1 specimen of that tune. Picking one
       expands its identity to the whole page below. No 01/02 numbering:
       the order is not a sequence, so the chip's own SHAPE + TYPE VOICE
       carry the information instead. Uniform cell size keeps the sheet
       reading as a tidy grid rather than chaos. */
    .tl-keys { display: flex; flex-wrap: wrap; gap: 0.3rem; }
    .tl-key {
        position: relative;
        display: inline-flex; align-items: center; justify-content: center;
        min-width: 4.75rem;
        padding: 0.34rem 0.6rem;
        /* shape + border read from THIS chip's data-tune (md strength) */
        border-radius: var(--radius-field, 6px);
        border: max(1px, var(--border, 1px)) solid color-mix(in oklab, var(--color-base-content) 22%, transparent);
        background: color-mix(in oklab, var(--color-base-100) 72%, transparent);
        cursor: pointer; line-height: 1;
        filter: none;   /* draft's rough SVG filter must not muddy the chip */
        transition: background 140ms ease, border-color 140ms ease, transform 160ms cubic-bezier(.2,.8,.2,1);
    }
    .tl-key:hover { transform: translateY(-1px); border-color: color-mix(in oklab, var(--color-accent) 50%, transparent); background: color-mix(in oklab, var(--color-accent) 10%, transparent); }
    .tl-key:focus-visible { outline: 2px solid var(--color-accent); outline-offset: 2px; }
    .tl-key__name { font-size: 0.8125rem; }     /* font-family set inline per tune */
    .tl-key.is-active {
        background: var(--color-primary);
        border-color: var(--color-primary);
        box-shadow: 0 5px 16px -7px color-mix(in oklab, var(--color-primary) 75%, transparent);
    }
    .tl-key.is-active .tl-key__name { color: var(--color-primary-content); }

    /* Strength dial — 5 segmented notches. */
    .tl-strength { display: inline-flex; padding: 2px; border-radius: 7px;
        background: color-mix(in oklab, var(--color-base-content) 8%, transparent);
        border: 1px solid color-mix(in oklab, var(--color-base-content) 12%, transparent); }
    .tl-strength button {
        font-family: ui-monospace, "SFMono-Regular", monospace;
        font-size: 0.6875rem; font-weight: 700; text-transform: uppercase;
        padding: 0.22rem 0.5rem; border-radius: 5px; cursor: pointer;
        color: color-mix(in oklab, var(--color-base-content) 55%, transparent);
        transition: background 140ms ease, color 140ms ease;
    }
    .tl-strength button:hover { color: var(--color-base-content); }
    .tl-strength button.is-active {
        background: var(--color-base-100);
        color: var(--color-accent);
        box-shadow: 0 1px 3px color-mix(in oklab, var(--color-base-content) 30%, transparent);
    }
    .tl-strength button:focus-visible { outline: 2px solid var(--color-accent); outline-offset: 1px; }

    /* live read-out */
    .tl-readout {
        font-family: ui-monospace, "SFMono-Regular", monospace;
        font-size: 0.6875rem;
        color: color-mix(in oklab, var(--color-base-content) 60%, transparent);
        white-space: nowrap;
    }
    .tl-readout b { color: var(--color-primary); font-weight: 700; }
    .tl-readout i { color: var(--color-accent); font-style: normal; font-weight: 700; }

    /* ============================================================
       Page-specimen section frame helpers (these DO live under
       .tune-lab so they morph).
       ============================================================ */
    .tl-section { max-width: 80rem; margin-inline: auto; padding-inline: 1.5rem; }
    @media (min-width: 1024px) { .tl-section { padding-inline: 2.5rem; } }

    .tl-eyebrow {
        font-family: ui-monospace, "SFMono-Regular", monospace;
        font-size: 0.625rem; letter-spacing: 0.2em; text-transform: uppercase;
        font-weight: 700;
        color: color-mix(in oklab, var(--color-accent) 80%, var(--color-base-content));
    }
    /* Specimen headings derive from the active tune's heading tokens so
       weight / tracking / family differences are obvious per tune. */
    .tl-h {
        font-family: var(--font-heading, inherit);
        font-weight: var(--font-weight-heading, 800);
        letter-spacing: var(--tracking-heading, -0.02em);
        line-height: 1.08;
    }
    .tl-hero-h {
        font-family: var(--font-heading, inherit);
        font-weight: var(--font-weight-heading, 800);
        letter-spacing: var(--tracking-heading, -0.03em);
        line-height: 1.02;
        font-size: clamp(2.4rem, 6vw, 4.25rem);
    }

    /* Hero backdrop — the page is a TYPE + SHAPE specimen, so the backdrop
       says so literally: the active tune's NAME set huge and near-invisible
       behind the content (it re-letters itself on every switch), over faint
       calibration graph-paper. No drifting colour glow — that ambient gradient
       is the generic "AI hero" tell; the specimen ghost is subject-true and
       does the same atmospheric job while actually meaning something. */
    .tl-hero { position: relative; isolation: isolate; overflow: hidden; }
    .tl-hero__paper {
        position: absolute; inset: 0; z-index: -2; pointer-events: none;
        background-image:
            linear-gradient(to right, color-mix(in oklab, var(--color-base-content) 3.5%, transparent) 1px, transparent 1px),
            linear-gradient(to bottom, color-mix(in oklab, var(--color-base-content) 3.5%, transparent) 1px, transparent 1px);
        background-size: 26px 26px;
        mask-image: radial-gradient(ellipse 78% 70% at 30% 35%, black, transparent 82%);
    }
    .tl-hero__ghost {
        position: absolute; z-index: -1; right: -1.5rem; bottom: -3.2rem;
        pointer-events: none; user-select: none; white-space: nowrap;
        font-family: var(--font-heading, inherit);
        font-weight: var(--font-weight-heading, 800);
        font-size: clamp(7rem, 23vw, 21rem);
        line-height: 0.78; letter-spacing: -0.04em;
        color: color-mix(in oklab, var(--color-base-content) 5%, transparent);
    }
    @media (max-width: 640px) { .tl-hero__ghost { font-size: 7rem; bottom: -1.5rem; right: -0.5rem; } }

    /* trust strip — small caps line; stresses the tune's tracking + weight */
    .tl-trust { display: flex; flex-wrap: wrap; align-items: center; gap: 1.25rem 2.5rem; opacity: 0.6; }
    .tl-trust span {
        font-family: var(--font-heading, inherit);
        font-weight: 700; font-size: 1.05rem; letter-spacing: 0.02em;
        color: var(--color-base-content);
        display: inline-flex; align-items: center; gap: 0.4rem;
    }

    /* ── live spec read-out: the morph, MEASURED. Values are read off a
       hidden probe that consumes the active tune's tokens with transition
       disabled, so the figures are the true targets, not mid-animation. ── */
    .tl-spec { display: inline-flex; align-items: center; gap: 0.5rem;
        font-family: ui-monospace, "SFMono-Regular", monospace; font-size: 0.6875rem;
        color: color-mix(in oklab, var(--color-base-content) 55%, transparent); white-space: nowrap; }
    .tl-spec b { color: var(--color-base-content); font-weight: 700; }
    .tl-spec .tl-swatch {
        width: 0.95rem; height: 0.95rem; flex: none;
        border: max(1px, var(--border)) solid color-mix(in oklab, var(--color-base-content) 55%, transparent);
        border-radius: var(--radius-field);   /* shows the active field radius, live */
        background: color-mix(in oklab, var(--color-primary) 18%, transparent);
    }
    .tl-probe { position: absolute; width: 1px; height: 1px; visibility: hidden;
        border-radius: var(--radius-box); border-style: solid; border-width: var(--border);
        font-family: var(--font-heading); transition: none !important; }
</style>
@endpush

@section('content')
@php
    // Each chip's font MUST equal that tune's real --font-heading (tune.css),
    // so the contact-sheet chip is an honest specimen. Verified against
    // src/resources/css/tune.css --td-font-heading per tune.
    $tuneKeys = [
        ['name' => 'default',   'label' => 'Default',   'font' => '"Inter", system-ui, sans-serif',                  'style' => ''],
        ['name' => 'minimal',   'label' => 'Minimal',   'font' => '"Inter", system-ui, sans-serif',                  'style' => 'font-weight:500;letter-spacing:-0.01em;'],
        ['name' => 'sharp',     'label' => 'Sharp',     'font' => '"Instrument Sans", ui-sans-serif, sans-serif',    'style' => 'font-weight:600;letter-spacing:-0.01em;'],
        ['name' => 'corporate', 'label' => 'Corporate', 'font' => '"IBM Plex Sans", ui-sans-serif, sans-serif',      'style' => 'font-weight:700;'],
        ['name' => 'tech',      'label' => 'Tech',      'font' => '"JetBrains Mono", ui-monospace, monospace',       'style' => 'font-weight:500;'],
        ['name' => 'brutal',    'label' => 'Brutal',    'font' => '"Space Grotesk", ui-sans-serif, sans-serif',      'style' => 'font-weight:700;text-transform:uppercase;letter-spacing:0.03em;'],
        ['name' => 'editorial', 'label' => 'Editorial', 'font' => '"Playfair Display", Georgia, serif',              'style' => 'font-weight:600;'],
        ['name' => 'luxury',    'label' => 'Luxury',    'font' => '"Hanken Grotesk", ui-sans-serif, sans-serif',     'style' => 'font-weight:300;letter-spacing:0.01em;'],
        ['name' => 'soft',      'label' => 'Soft',      'font' => '"Quicksand", ui-sans-serif, sans-serif',          'style' => 'font-weight:600;'],
        ['name' => 'pixel',     'label' => 'Pixel',     'font' => '"Press Start 2P", monospace',                     'style' => 'font-size:0.6rem;letter-spacing:0.02em;'],
        ['name' => 'draft',     'label' => 'Draft',     'font' => '"Patrick Hand", cursive',                         'style' => 'font-size:1rem;'],
    ];
@endphp

{{-- Whole page lives under .tune-lab so the morph transition applies and the
     hero/heading stubs are hidden. The page owns full-width edge-to-edge layout. --}}
<div class="tune-lab"
     x-data="{
        strength: (document.documentElement.getAttribute('data-tune-strength') || 'md'),
        strengths: ['xs','sm','md','lg','xl'],
        spec: { r: 0, b: 0, f: '' },
        setStrength(s) {
            this.strength = s;
            document.documentElement.setAttribute('data-tune-strength', s);
        },
        initStrength() {
            // Make sure the attribute is present from the start so the dial and
            // the rendered page agree on first paint.
            document.documentElement.setAttribute('data-tune-strength', this.strength);
        },
        readSpec() {
            // Read resolved tune tokens off a transition-free probe, so the
            // figures are the true targets, not a frame mid-morph.
            requestAnimationFrame(() => {
                const p = this.$refs.probe; if (!p) return;
                const cs = getComputedStyle(p);
                this.spec.r = Math.round(parseFloat(cs.borderTopLeftRadius) || 0);
                this.spec.b = Math.round((parseFloat(cs.borderTopWidth) || 0) * 10) / 10;
                this.spec.f = (cs.fontFamily || '').split(',')[0].replace(/[\u0022\u0027]/g, '').trim();
            });
        },
     }"
     x-init="initStrength()"
     x-effect="tune; strength; readSpec()">

    {{-- Hidden probe — consumes the ACTIVE tune's tokens (from <html>) so the
         control-bar spec read-out can report real resolved values. --}}
    <div class="tl-probe" x-ref="probe" aria-hidden="true"></div>

    {{-- ============================================================
         CONTROL BAR — the signature instrument panel. Sticky inside
         content, sits just under the layout's own navbar.
         ============================================================ --}}
    <div class="tl-bar sticky top-0 z-40">
        <div class="tl-bar__inner">
            <span class="tl-bar__legend">Tune&nbsp;Lab</span>

            {{-- Tune keys = a contact sheet. Each chip wears its OWN data-tune,
                 so its corner radius / border / typeface are real specimens of
                 that tune. Active = body scope `tune`. --}}
            <div class="tl-bar__group">
                <span class="tl-bar__legend" style="color: color-mix(in oklab, var(--color-base-content) 45%, transparent)">tune</span>
                <div class="tl-keys" role="group" aria-label="Tune preset">
                    @foreach($tuneKeys as $t)
                        <button type="button"
                                class="tl-key"
                                data-tune="{{ $t['name'] }}"
                                x-on:click="setTune('{{ $t['name'] }}')"
                                x-bind:class="{ 'is-active': tune === '{{ $t['name'] }}' }"
                                x-bind:aria-pressed="tune === '{{ $t['name'] }}'"
                                title="data-tune={{ $t['name'] }}">
                            <span class="tl-key__name" style="font-family: {{ $t['font'] }}; {{ $t['style'] }}">{{ $t['label'] }}</span>
                        </button>
                    @endforeach
                </div>
            </div>

            <div class="tl-bar__divider" aria-hidden="true"></div>

            {{-- Strength dial: 5 notches → data-tune-strength on <html>. --}}
            <div class="tl-bar__group">
                <span class="tl-bar__legend" style="color: color-mix(in oklab, var(--color-base-content) 45%, transparent)">strength</span>
                <div class="tl-strength" role="group" aria-label="Tune strength">
                    <template x-for="s in strengths" :key="s">
                        <button type="button"
                                x-on:click="setStrength(s)"
                                x-bind:class="{ 'is-active': strength === s }"
                                x-bind:aria-pressed="strength === s"
                                x-text="s"></button>
                    </template>
                </div>
            </div>

            {{-- Live read-out: the active identity, and the morph MEASURED. --}}
            <div class="ml-auto flex items-center justify-end gap-x-4 gap-y-1 flex-wrap">
                <span class="tl-readout" aria-hidden="true">data-tune=<b x-text="tune"></b> · strength=<i x-text="strength"></i></span>
                <span class="tl-spec" aria-hidden="true">
                    <span class="tl-swatch"></span>radius <b x-text="spec.r + 'px'"></b> · border <b x-text="spec.b + 'px'"></b> · <b x-text="spec.f"></b>
                </span>
            </div>
        </div>
    </div>

    {{-- ============================================================
         1. HERO — Halcyon (fictional incident-response SaaS).
         ============================================================ --}}
    <section class="tl-hero" style="padding-block: clamp(3.5rem, 8vw, 6rem);">
        {{-- Specimen backdrop: faint calibration paper + the active tune's name
             set huge behind everything, re-lettering itself on every switch. --}}
        <div class="tl-hero__paper" aria-hidden="true"></div>
        <div class="tl-hero__ghost" aria-hidden="true" x-text="tune"></div>

        <div class="tl-section grid lg:grid-cols-[1.15fr_0.85fr] gap-12 items-center">
            <div>
                <div class="flex items-center gap-3 mb-5 flex-wrap">
                    <x-badge appearance="soft" color="primary" icon="bolt-circle">v3 · 稼働率 99.99%</x-badge>
                    <span class="tl-eyebrow">incident response, calmer</span>
                </div>

                <h1 class="tl-hero-h mb-5">
                    障害対応を、<br>
                    <span style="background:linear-gradient(120deg,var(--color-primary),var(--color-accent));-webkit-background-clip:text;background-clip:text;-webkit-text-fill-color:transparent;">凪</span>の状態へ。
                </h1>

                <p class="text-lg leading-relaxed mb-7" style="color:color-mix(in oklab,var(--color-base-content) 75%,transparent);max-width:34rem;">
                    Halcyon はアラートの洪水を 1 本のタイムラインに束ね、誰が・いつ・何を直したかを自動で記録します。深夜の呼び出しを、落ち着いた手順に変える。
                </p>

                <div class="flex flex-wrap items-center gap-3 mb-7">
                    <x-button color="primary" size="lg" icon="rocket" icon-right="alt-arrow-right">無料で始める</x-button>
                    <x-button appearance="outline" color="neutral" size="lg" icon="document-text">ドキュメント</x-button>
                </div>

                <div class="flex flex-wrap items-center gap-2">
                    <x-badge appearance="soft" color="success" icon="check-circle">SOC 2 Type II</x-badge>
                    <x-badge appearance="soft" color="info" icon="shield-network">SSO / SCIM</x-badge>
                    <x-badge appearance="outline" color="accent" icon="bolt">5 分で導入</x-badge>
                </div>
            </div>

            {{-- Mock product card — a believable "active incident" panel. --}}
            <x-card appearance="elevated" class="shadow-xl">
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="inline-block size-2.5 rounded-full bg-error animate-pulse"></span>
                            <h3 class="tl-h font-bold">INC-2048 · API レイテンシ急増</h3>
                        </div>
                        <x-badge size="sm" color="error" appearance="solid">P1</x-badge>
                    </div>
                </x-slot:header>

                <div class="space-y-4">
                    <div class="flex items-center justify-between text-sm">
                        <span style="color:color-mix(in oklab,var(--color-base-content) 60%,transparent)">影響: checkout-api</span>
                        <span class="font-mono text-xs" style="color:color-mix(in oklab,var(--color-base-content) 55%,transparent)">経過 12:43</span>
                    </div>
                    <div>
                        <div class="flex justify-between text-xs mb-1">
                            <span style="color:color-mix(in oklab,var(--color-base-content) 60%,transparent)">復旧 runbook</span>
                            <span class="font-mono">4 / 6</span>
                        </div>
                        <x-progress :value="4" :max="6" color="warning" size="md" />
                    </div>
                    <div class="flex items-center gap-2 flex-wrap">
                        <x-badge size="sm" appearance="soft" color="neutral">@on-call: akari</x-badge>
                        <x-badge size="sm" appearance="soft" color="info">3 responders</x-badge>
                        <x-badge size="sm" appearance="dot" color="warning">degraded</x-badge>
                    </div>
                </div>

                <x-slot:footer>
                    <div class="flex items-center justify-between">
                        <span class="text-xs" style="color:color-mix(in oklab,var(--color-base-content) 55%,transparent)">自動 postmortem ドラフト生成中…</span>
                        <x-button size="sm" color="primary" appearance="soft" icon="chat-round">参加</x-button>
                    </div>
                </x-slot:footer>
            </x-card>
        </div>
    </section>

    {{-- ============================================================
         2. TRUST STRIP
         ============================================================ --}}
    <div class="tl-section" style="padding-block: 1.75rem;">
        <p class="tl-eyebrow text-center mb-5">運用チームに選ばれています</p>
        <div class="tl-trust justify-center">
            <span><x-i type="server-2" class="w-5 h-5" /> Northwind</span>
            <span><x-i type="cloud" class="w-5 h-5" /> Aerolab</span>
            <span><x-i type="database" class="w-5 h-5" /> Petrel</span>
            <span><x-i type="cpu" class="w-5 h-5" /> Tidewell</span>
            <span><x-i type="global" class="w-5 h-5" /> Mistral.io</span>
            <span><x-i type="layers" class="w-5 h-5" /> Saltmarsh</span>
        </div>
    </div>

    {{-- ============================================================
         3. FEATURES — 4 cards, icons + heading + body.
         Shows radius / shadow / border per tune.
         ============================================================ --}}
    <section class="tl-section" style="padding-block: clamp(3rem, 6vw, 4.5rem);">
        <div class="max-w-2xl mb-10">
            <p class="tl-eyebrow mb-3">shape — radius · shadow · border</p>
            <h2 class="tl-h text-3xl lg:text-4xl mb-3">嵐の中でも、手順は静かに進む</h2>
            <p class="text-base" style="color:color-mix(in oklab,var(--color-base-content) 70%,transparent)">
                検知から復旧、振り返りまでを 1 つの線につなぎ、チームの認知負荷を下げる 4 つの柱。
            </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-element">
            @php
                $features = [
                    ['icon' => 'bolt-circle',      'color' => 'primary', 'title' => 'スマート検知',     'body' => 'ノイズの多いアラートを相関分析でまとめ、本当に重要な 1 件だけを鳴らします。'],
                    ['icon' => 'routing',          'color' => 'accent',  'title' => '自動エスカレーション', 'body' => 'オンコール表とポリシーに沿って、適切な担当へ静かに引き継ぎ。取りこぼしゼロ。'],
                    ['icon' => 'chat-round',       'color' => 'info',    'title' => 'ライブ war room', 'body' => 'Slack / 通話 / メモを 1 つのタイムラインに集約。全員が同じ事実を見て動けます。'],
                    ['icon' => 'pen-new-square',   'color' => 'success', 'title' => '自動 postmortem', 'body' => 'タイムラインから振り返りの下書きを生成。学びを次の当番へ確実に渡します。'],
                ];
            @endphp
            @foreach($features as $f)
                <x-card appearance="default" hoverable>
                    <div class="size-11 rounded-[var(--radius-field)] flex items-center justify-center mb-4"
                         style="background:color-mix(in oklab,var(--color-{{ $f['color'] }}) 15%,transparent);">
                        <x-i type="{{ $f['icon'] }}" class="w-6 h-6" style="color:var(--color-{{ $f['color'] }})" />
                    </div>
                    <h3 class="tl-h text-lg mb-2">{{ $f['title'] }}</h3>
                    <p class="text-sm leading-relaxed" style="color:color-mix(in oklab,var(--color-base-content) 68%,transparent)">{{ $f['body'] }}</p>
                </x-card>
            @endforeach
        </div>
    </section>

    {{-- ============================================================
         4. STATS + DATA — density-heavy. Stats group, a wide table,
         and a state timeline. Lets corporate/tech vs soft/luxury differ.
         ============================================================ --}}
    <section style="background:color-mix(in oklab,var(--color-base-200) 55%,transparent); padding-block: clamp(3rem, 6vw, 4.5rem);">
        <div class="tl-section">
            <div class="max-w-2xl mb-9">
                <p class="tl-eyebrow mb-3">density — spacing · rhythm</p>
                <h2 class="tl-h text-3xl lg:text-4xl mb-3">数字で見る、静けさ</h2>
                <p class="text-base" style="color:color-mix(in oklab,var(--color-base-content) 70%,transparent)">
                    導入チームの中央値。密度の高いダッシュボードほど、tune の余白・角丸・影の違いがはっきり出ます。
                </p>
            </div>

            {{-- Stat group --}}
            <div class="stats stats-vertical lg:stats-horizontal shadow w-full mb-element">
                <x-stat wrapped="false" label="MTTR 中央値" value="6.2分" desc="導入前比" trend="down" trendValue="-58%" valueColor="success">
                    <x-i type="clock-circle" class="w-8 h-8" />
                </x-stat>
                <x-stat wrapped="false" label="月間アラート" value="11.4K" desc="相関後 92% 削減" trend="down" trendValue="-92%" valueColor="primary">
                    <x-i type="bell" class="w-8 h-8" />
                </x-stat>
                <x-stat wrapped="false" label="自動復旧率" value="73%" desc="runbook 起動" trend="up" trendValue="+14%" valueColor="info">
                    <x-i type="routing" class="w-8 h-8" />
                </x-stat>
                <x-stat wrapped="false" label="稼働率" value="99.99%" desc="直近 90 日" trend="flat" trendValue="±0%" valueColor="accent">
                    <x-i type="shield-check" class="w-8 h-8" />
                </x-stat>
            </div>

            <div class="grid lg:grid-cols-[1.5fr_1fr] gap-element">
                {{-- Wide table --}}
                <div class="border border-base-300 rounded-[var(--radius-box)] overflow-hidden bg-base-100">
                    <div class="px-4 py-3 border-b border-base-300 flex items-center justify-between">
                        <h3 class="tl-h text-sm font-bold">最近のインシデント</h3>
                        <x-badge size="sm" appearance="soft" color="neutral">直近 5 件</x-badge>
                    </div>
                    <x-table-scroll>
                        <table class="min-w-[760px] w-full text-sm">
                            <thead class="bg-base-200 text-base-content/70">
                                <tr>
                                    @foreach(['ID','概要','重大度','MTTR','担当','状態','操作'] as $col)
                                        <th class="px-4 py-2 text-left font-medium whitespace-nowrap">{{ $col }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $incidents = [
                                        ['INC-2048','API レイテンシ急増','P1','—','akari','対応中','error'],
                                        ['INC-2047','決済 webhook 遅延','P2','14分','kenji','復旧','warning'],
                                        ['INC-2045','DB レプリカ遅延','P3','31分','misaki','完了','success'],
                                        ['INC-2044','CDN キャッシュ miss','P3','9分','ryouta','完了','success'],
                                        ['INC-2041','SSO ログイン失敗','P2','22分','akari','完了','success'],
                                    ];
                                    $sevColor = ['P1' => 'error', 'P2' => 'warning', 'P3' => 'info'];
                                    $stColor  = ['error' => 'error', 'warning' => 'warning', 'success' => 'success'];
                                    $stLabel  = ['error' => '対応中', 'warning' => '復旧', 'success' => '完了'];
                                @endphp
                                @foreach($incidents as $r)
                                    <tr class="border-t border-base-300 hover:bg-base-200/50">
                                        <td class="px-4 py-2 whitespace-nowrap font-mono text-xs">{{ $r[0] }}</td>
                                        <td class="px-4 py-2 whitespace-nowrap">{{ $r[1] }}</td>
                                        <td class="px-4 py-2 whitespace-nowrap"><x-badge size="sm" appearance="soft" :color="$sevColor[$r[2]]">{{ $r[2] }}</x-badge></td>
                                        <td class="px-4 py-2 whitespace-nowrap font-mono text-xs">{{ $r[3] }}</td>
                                        <td class="px-4 py-2 whitespace-nowrap">{{ $r[4] }}</td>
                                        <td class="px-4 py-2 whitespace-nowrap"><x-badge size="sm" appearance="dot" :color="$stColor[$r[6]]">{{ $stLabel[$r[6]] }}</x-badge></td>
                                        <td class="px-4 py-2 whitespace-nowrap"><x-button size="xs" appearance="soft" color="primary">詳細</x-button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </x-table-scroll>
                </div>

                {{-- State timeline --}}
                <div class="border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
                    <h3 class="tl-h text-sm font-bold mb-4">INC-2048 タイムライン</h3>
                    <x-timeline compact :items="[
                        ['title' => '検知', 'time' => '00:00', 'desc' => 'レイテンシ p99 が閾値超過', 'state' => 'done'],
                        ['title' => '相関 & 通知', 'time' => '00:18', 'desc' => '関連 7 アラートを 1 件に集約', 'state' => 'done'],
                        ['title' => 'runbook 起動', 'time' => '03:40', 'desc' => 'キャッシュ再構築を自動実行', 'state' => 'done'],
                        ['title' => '緩和中', 'time' => '12:43', 'desc' => 'レイテンシ低下を確認中', 'state' => 'current'],
                        ['title' => 'postmortem', 'time' => '—', 'desc' => '振り返りドラフト待ち', 'state' => 'upcoming'],
                    ]" />
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         5. PRICING — 3 tiers, one "Popular".
         ============================================================ --}}
    <section class="tl-section" style="padding-block: clamp(3rem, 6vw, 4.5rem);">
        <div class="max-w-2xl mx-auto text-center mb-10">
            <p class="tl-eyebrow mb-3">surface — card radius · border</p>
            <h2 class="tl-h text-3xl lg:text-4xl mb-3">チームの規模に合わせて</h2>
            <p class="text-base" style="color:color-mix(in oklab,var(--color-base-content) 70%,transparent)">
                すべてのプランに無制限のインシデントと 14 日間の無料トライアルが付きます。
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-element items-stretch max-w-5xl mx-auto">
            {{-- Starter --}}
            <x-card appearance="default" class="flex flex-col">
                <x-slot:header><h3 class="tl-h font-bold text-lg">Starter</h3></x-slot:header>
                <p class="mb-1"><span class="tl-h text-4xl font-bold">¥0</span><span class="text-sm" style="color:color-mix(in oklab,var(--color-base-content) 55%,transparent)">/月</span></p>
                <p class="text-sm mb-5" style="color:color-mix(in oklab,var(--color-base-content) 60%,transparent)">個人・小規模チーム向け。</p>
                <ul class="space-y-2.5 text-sm mb-6 flex-1">
                    <li class="flex gap-2"><x-i type="check" library="solar-extra" class="w-4 h-4 text-success shrink-0 mt-0.5" /> 3 名まで</li>
                    <li class="flex gap-2"><x-i type="check" library="solar-extra" class="w-4 h-4 text-success shrink-0 mt-0.5" /> 基本アラート相関</li>
                    <li class="flex gap-2"><x-i type="check" library="solar-extra" class="w-4 h-4 text-success shrink-0 mt-0.5" /> 7 日間の履歴</li>
                </ul>
                <x-button appearance="outline" color="neutral" class="w-full">無料で始める</x-button>
            </x-card>

            {{-- Team (Popular) --}}
            <x-card appearance="bordered-top" color="primary" class="flex flex-col shadow-lg">
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <h3 class="tl-h font-bold text-lg">Team</h3>
                        <x-badge color="primary" appearance="solid" pill icon="star">人気</x-badge>
                    </div>
                </x-slot:header>
                <p class="mb-1"><span class="tl-h text-4xl font-bold">¥4,800</span><span class="text-sm" style="color:color-mix(in oklab,var(--color-base-content) 55%,transparent)">/月</span></p>
                <p class="text-sm mb-5" style="color:color-mix(in oklab,var(--color-base-content) 60%,transparent)">成長中の運用チームに。</p>
                <ul class="space-y-2.5 text-sm mb-6 flex-1">
                    <li class="flex gap-2"><x-i type="check" library="solar-extra" class="w-4 h-4 text-success shrink-0 mt-0.5" /> 20 名まで</li>
                    <li class="flex gap-2"><x-i type="check" library="solar-extra" class="w-4 h-4 text-success shrink-0 mt-0.5" /> 自動エスカレーション</li>
                    <li class="flex gap-2"><x-i type="check" library="solar-extra" class="w-4 h-4 text-success shrink-0 mt-0.5" /> 自動 postmortem</li>
                    <li class="flex gap-2"><x-i type="check" library="solar-extra" class="w-4 h-4 text-success shrink-0 mt-0.5" /> 90 日間の履歴</li>
                </ul>
                <x-button color="primary" class="w-full" icon="rocket">14 日間 無料トライアル</x-button>
            </x-card>

            {{-- Enterprise --}}
            <x-card appearance="default" class="flex flex-col">
                <x-slot:header><h3 class="tl-h font-bold text-lg">Enterprise</h3></x-slot:header>
                <p class="mb-1"><span class="tl-h text-4xl font-bold">応相談</span></p>
                <p class="text-sm mb-5" style="color:color-mix(in oklab,var(--color-base-content) 60%,transparent)">大規模・規制業界向け。</p>
                <ul class="space-y-2.5 text-sm mb-6 flex-1">
                    <li class="flex gap-2"><x-i type="check" library="solar-extra" class="w-4 h-4 text-success shrink-0 mt-0.5" /> 無制限メンバー</li>
                    <li class="flex gap-2"><x-i type="check" library="solar-extra" class="w-4 h-4 text-success shrink-0 mt-0.5" /> SSO / SCIM / 監査ログ</li>
                    <li class="flex gap-2"><x-i type="check" library="solar-extra" class="w-4 h-4 text-success shrink-0 mt-0.5" /> 専任 CSM・SLA 保証</li>
                </ul>
                <x-button appearance="outline" color="neutral" class="w-full" icon="chat-round">営業に相談</x-button>
            </x-card>
        </div>
    </section>

    {{-- ============================================================
         6. FORM / INTERACTIVE — tabs + accordion + inputs.
         Field radius / padding per tune.
         ============================================================ --}}
    <section style="background:color-mix(in oklab,var(--color-base-200) 55%,transparent); padding-block: clamp(3rem, 6vw, 4.5rem);">
        <div class="tl-section grid lg:grid-cols-2 gap-12 items-start">
            <div>
                <p class="tl-eyebrow mb-3">fields — input radius · padding</p>
                <h2 class="tl-h text-3xl lg:text-4xl mb-3">5 分で、最初の連携を</h2>
                <p class="text-base mb-7" style="color:color-mix(in oklab,var(--color-base-content) 70%,transparent)">
                    既存のアラートソースをつなぐだけ。タブで手順を切り替え、よくある質問は下のアコーディオンで。
                </p>

                <div class="border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element mb-element">
                    <x-tabs variant="boxed">
                        <x-tab name="connect" label="接続">
                            <div class="space-y-element pt-2">
                                <x-input label="ワークスペース名" name="tl_ws" placeholder="acme-sre" icon-left="server-2" hint="チームの識別子になります" />
                                <x-select label="アラートソース" name="tl_src" placeholder="選択してください" icon-left="bell">
                                    <option value="datadog">Datadog</option>
                                    <option value="prometheus">Prometheus / Alertmanager</option>
                                    <option value="cloudwatch">AWS CloudWatch</option>
                                    <option value="sentry">Sentry</option>
                                </x-select>
                                <x-button color="primary" icon="check-circle">接続をテスト</x-button>
                            </div>
                        </x-tab>
                        <x-tab name="route" label="ルーティング">
                            <div class="space-y-element pt-2">
                                <x-select label="オンコール表" name="tl_oncall" placeholder="表を選択">
                                    <option value="primary">Primary on-call</option>
                                    <option value="secondary">Secondary on-call</option>
                                </x-select>
                                <x-input label="エスカレーション (分)" name="tl_esc" type="number" value="15" suffix="分" hint="無応答時に次の担当へ" />
                                <x-button color="primary" icon="routing">ポリシーを保存</x-button>
                            </div>
                        </x-tab>
                        <x-tab name="notify" label="通知">
                            <div class="space-y-element pt-2">
                                <x-input label="Slack チャンネル" name="tl_slack" placeholder="#incidents" prefix="#" />
                                <x-input label="通知メール" name="tl_email" type="email" placeholder="sre@acme.com" icon-left="letter" corner-hint="任意" />
                                <x-button color="primary" icon="bell">通知をオンにする</x-button>
                            </div>
                        </x-tab>
                    </x-tabs>
                </div>
            </div>

            <div>
                <p class="tl-eyebrow mb-3">よくある質問</p>
                <h2 class="tl-h text-3xl lg:text-4xl mb-6">気になるところ</h2>
                <x-accordion>
                    <x-accordion-item title="既存のオンコールツールから移行できますか？">
                        はい。PagerDuty / Opsgenie のスケジュールとエスカレーションポリシーを CSV / API でインポートできます。移行ガイドに沿って通常 1 営業日以内に完了します。
                    </x-accordion-item>
                    <x-accordion-item title="アラートのノイズはどれくらい減りますか？">
                        相関エンジンが重複・フラッピングを束ねるため、導入チームの中央値で月間アラートが 9 割以上削減されます。鳴る回数そのものを減らします。
                    </x-accordion-item>
                    <x-accordion-item title="postmortem は本当に自動ですか？">
                        タイムライン・対応ログ・影響範囲から下書きを生成します。確定はあなたの手で。テンプレートはチームごとにカスタマイズ可能です。
                    </x-accordion-item>
                    <x-accordion-item title="セキュリティ要件に対応していますか？">
                        SOC 2 Type II 準拠、SSO / SCIM、監査ログ、データ所在地の選択に対応。Enterprise プランでは SLA を保証します。
                    </x-accordion-item>
                </x-accordion>
            </div>
        </div>
    </section>

    {{-- ============================================================
         7. TUNE MAP — where each tune sits (shape × voice).
         ============================================================ --}}
    <section class="tl-section" style="padding-block: clamp(3rem, 6vw, 4.5rem);">
        <div class="max-w-2xl mb-9">
            <p class="tl-eyebrow mb-3">coordinates — shape × voice</p>
            <h2 class="tl-h text-3xl lg:text-4xl mb-3">各 tune の立ち位置</h2>
            <p class="text-base" style="color:color-mix(in oklab,var(--color-base-content) 70%,transparent)">
                横軸 = 角の鋭さ（sharp → round）、縦軸 = 声の大きさ（quiet → loud）。上のキーで tune を選ぶと、現在地がハイライトされます。
            </p>
        </div>

        <div class="max-w-3xl">
            <x-positioning-map
                :points="[
                    ['x' => 38, 'y' => 14, 'label' => 'minimal'],
                    ['x' => 15, 'y' => 24, 'label' => 'corporate'],
                    ['x' => 27, 'y' => 32, 'label' => 'sharp'],
                    ['x' => 46, 'y' => 40, 'label' => 'default'],
                    ['x' => 72, 'y' => 20, 'label' => 'luxury'],
                    ['x' => 45, 'y' => 54, 'label' => 'editorial'],
                    ['x' => 30, 'y' => 62, 'label' => 'tech'],
                    ['x' => 88, 'y' => 58, 'label' => 'soft'],
                    ['x' => 62, 'y' => 74, 'label' => 'draft'],
                    ['x' => 8,  'y' => 88, 'label' => 'brutal'],
                    ['x' => 5,  'y' => 97, 'label' => 'pixel'],
                ]"
                x-active="tune"
                :x-labels="['sharp','round']"
                :y-labels="['quiet','loud']"
                size="lg"
            />
        </div>
    </section>

    {{-- ============================================================
         8. CTA BAND
         ============================================================ --}}
    <section style="background:var(--color-primary); color:var(--color-primary-content); padding-block: clamp(3rem, 6vw, 4.5rem);">
        <div class="tl-section text-center">
            <h2 class="tl-h text-3xl lg:text-5xl mb-4">次の障害は、もっと静かに。</h2>
            <p class="text-lg mb-8 mx-auto" style="max-width:36rem;opacity:0.85;">
                14 日間の無料トライアル。クレジットカード不要。最初のインシデントから違いを感じてください。
            </p>
            <div class="flex flex-wrap items-center justify-center gap-3">
                <x-button color="neutral" size="lg" icon="rocket" icon-right="alt-arrow-right">無料トライアルを始める</x-button>
                <x-button appearance="outline" size="lg" color="neutral" icon="chat-round" class="!border-current">デモを予約</x-button>
            </div>
        </div>
    </section>

    {{-- ============================================================
         FOOTER
         ============================================================ --}}
    <footer class="border-t border-base-300" style="padding-block: 3rem;">
        <div class="tl-section grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <x-i type="shield-check" class="w-5 h-5 text-primary" />
                    <span class="tl-h font-bold text-lg">Halcyon</span>
                </div>
                <p class="text-sm" style="color:color-mix(in oklab,var(--color-base-content) 60%,transparent)">障害対応を、凪の状態へ。SRE のための静かなインシデント管理。</p>
                <div class="flex items-center gap-2 mt-4">
                    <x-badge size="sm" appearance="soft" color="success" icon="check-circle">All systems normal</x-badge>
                </div>
            </div>
            @php
                $footCols = [
                    ['製品', ['機能', '料金', '連携', '変更履歴']],
                    ['会社', ['About', 'ブログ', '採用', 'お問い合わせ']],
                    ['リソース', ['ドキュメント', 'ステータス', 'API', 'コミュニティ']],
                ];
            @endphp
            @foreach($footCols as $col)
                <div>
                    <p class="tl-eyebrow mb-3">{{ $col[0] }}</p>
                    <ul class="space-y-2 text-sm">
                        @foreach($col[1] as $link)
                            <li><a href="#" class="hover:text-primary transition-colors" style="color:color-mix(in oklab,var(--color-base-content) 68%,transparent)">{{ $link }}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
        <div class="tl-section mt-10 pt-6 border-t border-base-300 flex flex-wrap items-center justify-between gap-3">
            <span class="text-xs" style="color:color-mix(in oklab,var(--color-base-content) 50%,transparent)">© 2026 Halcyon Inc. · A fictional product for tune review.</span>
            <span class="tl-readout">built with <b>pinion-ui</b> · theme × tune</span>
        </div>
    </footer>

</div>
@endsection
