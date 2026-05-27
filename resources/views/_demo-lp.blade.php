@extends('layouts._lp')

@section('content')
{{--
    Believable marketing LP at native scale. Rendered into an iframe and
    scaled to 0.4 by the outer page wrapper. Components chosen for high
    tune-sensitivity: radius shape, border weight, font family — everything
    a tune controls — should read clearly at 40%.

    No Alpine state needed beyond what individual components self-mount.
    No nav/sidebar — the outer wrapper is what frames this visually.
--}}

<div class="min-h-screen flex flex-col">

    {{-- ============ Top nav strip (fake brand chrome) ============ --}}
    <header class="flex items-center justify-between px-10 py-5 border-b border-base-300/60 bg-base-100/80 backdrop-blur">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-[var(--radius-field)] bg-primary text-primary-content flex items-center justify-center font-black text-lg">N</div>
            <div class="leading-tight">
                <div class="font-bold text-base">Nimbus Type</div>
                <div class="text-[10px] uppercase tracking-widest text-base-content/50">Studio · est. 2026</div>
            </div>
        </div>
        <nav class="hidden md:flex items-center gap-7 text-sm text-base-content/70">
            <a class="hover:text-primary">Work</a>
            <a class="hover:text-primary">Process</a>
            <a class="hover:text-primary">Specimens</a>
            <a class="hover:text-primary">Journal</a>
        </nav>
        <div class="flex items-center gap-2">
            <x-button size="sm" appearance="ghost">Sign in</x-button>
            <x-button size="sm" color="primary" icon="arrow-right">Start a brief</x-button>
        </div>
    </header>

    {{-- ============ HERO ============ --}}
    <section class="relative overflow-hidden px-10 space-section">
        {{-- atmospheric backdrop --}}
        <div aria-hidden="true" class="absolute inset-0 -z-10">
            <div class="absolute -top-32 -right-32 w-[640px] h-[640px] rounded-full"
                 style="background: radial-gradient(circle, color-mix(in oklab, var(--color-primary) 22%, transparent), transparent 65%);">
            </div>
            <div class="absolute -bottom-40 -left-20 w-[520px] h-[520px] rounded-full"
                 style="background: radial-gradient(circle, color-mix(in oklab, var(--color-accent) 18%, transparent), transparent 65%);">
            </div>
            <div class="absolute inset-0 opacity-[0.06]"
                 style="background-image: linear-gradient(to right, currentColor 1px, transparent 1px), linear-gradient(to bottom, currentColor 1px, transparent 1px); background-size: 56px 56px;">
            </div>
        </div>

        <div class="max-w-5xl">
            <div class="flex items-center gap-2 mb-6">
                <x-badge appearance="dot" color="success">Open for Q3 commissions</x-badge>
                <x-badge appearance="soft" color="accent" icon="stars">12 new specimens</x-badge>
            </div>

            <h1 class="text-6xl md:text-7xl font-black leading-[0.95] tracking-tight mb-7"
                style="font-family: var(--font-heading);">
                Letterforms that <span class="italic text-primary">behave</span><br>
                like an opinion.
            </h1>

            <p class="text-xl text-base-content/70 max-w-2xl leading-relaxed mb-9"
               style="font-family: var(--font-body);">
                We design typefaces, identities, and editorial systems for studios that refuse to look like anyone else. Forty‑seven releases, six awards, zero stock fonts.
            </p>

            <div class="flex flex-wrap items-center gap-3 mb-section-inner">
                <x-button color="primary" size="lg" icon="rocket" iconRight="arrow-right">Commission a face</x-button>
                <x-button appearance="ghost" size="lg" icon="play">Watch the reel</x-button>
            </div>

            <div class="flex flex-wrap items-center gap-x-8 gap-y-3 text-sm text-base-content/60">
                <div class="flex items-center gap-2">
                    <x-i type="check-circle" class="w-4 h-4 text-success" />
                    Custom OpenType features
                </div>
                <div class="flex items-center gap-2">
                    <x-i type="check-circle" class="w-4 h-4 text-success" />
                    Variable axes (5 — 9)
                </div>
                <div class="flex items-center gap-2">
                    <x-i type="check-circle" class="w-4 h-4 text-success" />
                    Web licensing included
                </div>
            </div>
        </div>
    </section>

    {{-- ============ "Logo wall" (logotype pretend) ============ --}}
    <section class="px-10 py-10 border-y border-base-300/60 bg-base-200/30">
        <p class="text-[11px] uppercase tracking-[0.22em] text-base-content/40 mb-5 font-semibold">Set in our type at —</p>
        <div class="flex flex-wrap items-center gap-x-10 gap-y-3 text-base-content/55"
             style="font-family: var(--font-heading);">
            <span class="text-2xl font-black tracking-tight">Vellum&amp;Co.</span>
            <span class="text-2xl italic font-bold">Marigold</span>
            <span class="text-2xl font-light tracking-widest uppercase">Halcyon</span>
            <span class="text-2xl font-black">PLATFORM7</span>
            <span class="text-2xl italic">Studio Quill</span>
            <span class="text-2xl font-bold tracking-tight">Orbit/Press</span>
        </div>
    </section>

    {{-- ============ Feature triptych ============ --}}
    <section class="px-10 space-section">
        <div class="max-w-3xl mb-section-inner">
            <p class="text-[11px] uppercase tracking-[0.22em] text-primary mb-3 font-semibold">— Our practice</p>
            <h2 class="text-4xl md:text-5xl font-black tracking-tight mb-5"
                style="font-family: var(--font-heading);">
                Three things, done seriously.
            </h2>
            <p class="text-base text-base-content/65 leading-relaxed">
                We do less than most studios, on purpose. Custom type, editorial systems, and the identity work that lives between them. Every project is led by a partner.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-element">
            <x-card appearance="bordered-top" color="primary" hoverable>
                <x-slot:header>
                    <div class="flex items-center gap-2">
                        <x-i type="pen-new-square" class="w-6 h-6 text-primary" />
                        <span class="text-[10px] uppercase tracking-widest font-semibold text-base-content/50">01 —— Type</span>
                    </div>
                </x-slot:header>
                <h3 class="font-bold text-xl mb-2" style="font-family: var(--font-heading);">Custom typefaces</h3>
                <p class="text-sm text-base-content/65 leading-relaxed">
                    Drawn from brief, drawn by hand, finished in Glyphs. Variable axes calibrated for the actual layouts the type will live in — not abstract specimens.
                </p>
                <x-slot:footer>
                    <a class="text-xs link link-hover text-primary">See the type library —</a>
                </x-slot:footer>
            </x-card>

            <x-card appearance="bordered-top" color="accent" hoverable>
                <x-slot:header>
                    <div class="flex items-center gap-2">
                        <x-i type="layers" class="w-6 h-6 text-accent" />
                        <span class="text-[10px] uppercase tracking-widest font-semibold text-base-content/50">02 —— Editorial</span>
                    </div>
                </x-slot:header>
                <h3 class="font-bold text-xl mb-2" style="font-family: var(--font-heading);">Editorial systems</h3>
                <p class="text-sm text-base-content/65 leading-relaxed">
                    Magazines, art books, annual reports. Grids you can break with confidence. Type stacks that hold across 11 breakpoints and three reading distances.
                </p>
                <x-slot:footer>
                    <a class="text-xs link link-hover text-accent">Studio monographs —</a>
                </x-slot:footer>
            </x-card>

            <x-card appearance="bordered-top" color="success" hoverable>
                <x-slot:header>
                    <div class="flex items-center gap-2">
                        <x-i type="cup-star" class="w-6 h-6 text-success" />
                        <span class="text-[10px] uppercase tracking-widest font-semibold text-base-content/50">03 —— Identity</span>
                    </div>
                </x-slot:header>
                <h3 class="font-bold text-xl mb-2" style="font-family: var(--font-heading);">Identity programs</h3>
                <p class="text-sm text-base-content/65 leading-relaxed">
                    Wordmarks, sub-brands, and the rule books that keep them honest. We hand over a system, not a deck — and we stay on retainer to defend it.
                </p>
                <x-slot:footer>
                    <a class="text-xs link link-hover text-success">Recent identities —</a>
                </x-slot:footer>
            </x-card>
        </div>
    </section>

    {{-- ============ Specimen plate ============ --}}
    <section class="px-10 space-section bg-base-200/40 border-y border-base-300/60">
        <div class="grid grid-cols-1 md:grid-cols-[1fr_1.4fr] gap-section-inner items-center">
            <div>
                <p class="text-[11px] uppercase tracking-[0.22em] text-accent mb-3 font-semibold">— Specimen N° 12</p>
                <h2 class="text-4xl md:text-5xl font-black tracking-tight mb-5"
                    style="font-family: var(--font-heading);">
                    Marigold Display
                </h2>
                <p class="text-base text-base-content/65 leading-relaxed mb-6">
                    A high-contrast didone with a 6-axis variable build. Drawn for the relaunch of <em>Halcyon</em> magazine; opened up for commercial license after a 12-month exclusive.
                </p>

                <div class="flex flex-wrap items-center gap-2 mb-6">
                    <x-badge color="primary" appearance="soft">6 axes</x-badge>
                    <x-badge color="accent" appearance="soft">347 glyphs</x-badge>
                    <x-badge color="success" appearance="soft">Latin Ext.</x-badge>
                    <x-badge color="info" appearance="soft" icon="bolt">VF + static</x-badge>
                </div>

                <div class="flex flex-wrap gap-2">
                    <x-button color="primary" size="md" icon="download">License</x-button>
                    <x-button appearance="outline" size="md" icon="document">Read PDF</x-button>
                </div>
            </div>

            <div class="bg-base-100 border border-base-300 p-12 text-center"
                 style="border-radius: var(--radius-box);">
                <div class="text-[10px] uppercase tracking-[0.2em] text-base-content/40 mb-4">Aa — Marigold Display 96pt</div>
                <div class="text-[180px] leading-none font-black text-primary"
                     style="font-family: var(--font-heading); letter-spacing: -0.04em;">
                    Aa
                </div>
                <div class="mt-6 text-3xl italic text-base-content/80"
                     style="font-family: var(--font-heading);">
                    "Edited<br>by light."
                </div>
            </div>
        </div>
    </section>

    {{-- ============ Pricing-ish strip ============ --}}
    <section class="px-10 space-section">
        <div class="text-center max-w-2xl mx-auto mb-section-inner">
            <p class="text-[11px] uppercase tracking-[0.22em] text-primary mb-3 font-semibold">— Engagements</p>
            <h2 class="text-4xl md:text-5xl font-black tracking-tight mb-5"
                style="font-family: var(--font-heading);">
                Three ways to work with us.
            </h2>
            <p class="text-base text-base-content/65 leading-relaxed">
                Fixed-scope, retained, or licensed. We don't do hourly.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-element max-w-5xl mx-auto">
            <x-card appearance="default" hoverable>
                <x-slot:header>
                    <span class="text-[10px] uppercase tracking-widest font-semibold text-base-content/50">Single-face license</span>
                </x-slot:header>
                <div class="text-4xl font-black mb-1" style="font-family: var(--font-heading);">$1,200<span class="text-sm text-base-content/50 font-normal">/face</span></div>
                <p class="text-sm text-base-content/65 leading-relaxed mb-4">Library type for one product. Includes static + variable, web + desktop.</p>
                <ul class="text-sm space-y-2 mb-4">
                    <li class="flex gap-2"><x-i type="check" library="solar-extra" class="w-4 h-4 text-success shrink-0" /> 1 brand · perpetual</li>
                    <li class="flex gap-2"><x-i type="check" library="solar-extra" class="w-4 h-4 text-success shrink-0" /> Unlimited impressions</li>
                    <li class="flex gap-2"><x-i type="check" library="solar-extra" class="w-4 h-4 text-success shrink-0" /> Updates for life</li>
                </ul>
                <x-slot:footer>
                    <x-button color="primary" appearance="outline" class="w-full">Browse library</x-button>
                </x-slot:footer>
            </x-card>

            <x-card appearance="elevated" color="primary" hoverable>
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] uppercase tracking-widest font-semibold text-primary">Custom commission</span>
                        <x-badge size="xs" color="primary" appearance="solid">Most</x-badge>
                    </div>
                </x-slot:header>
                <div class="text-4xl font-black mb-1" style="font-family: var(--font-heading);">$28k+</div>
                <p class="text-sm text-base-content/65 leading-relaxed mb-4">Bespoke face drawn against your brief. 10—16 weeks. Partner-led.</p>
                <ul class="text-sm space-y-2 mb-4">
                    <li class="flex gap-2"><x-i type="check" library="solar-extra" class="w-4 h-4 text-success shrink-0" /> Full source files</li>
                    <li class="flex gap-2"><x-i type="check" library="solar-extra" class="w-4 h-4 text-success shrink-0" /> Variable axes negotiated</li>
                    <li class="flex gap-2"><x-i type="check" library="solar-extra" class="w-4 h-4 text-success shrink-0" /> 24-month exclusivity</li>
                </ul>
                <x-slot:footer>
                    <x-button color="primary" class="w-full" icon="arrow-right">Start a brief</x-button>
                </x-slot:footer>
            </x-card>

            <x-card appearance="default" hoverable>
                <x-slot:header>
                    <span class="text-[10px] uppercase tracking-widest font-semibold text-base-content/50">Retainer</span>
                </x-slot:header>
                <div class="text-4xl font-black mb-1" style="font-family: var(--font-heading);">$6k<span class="text-sm text-base-content/50 font-normal">/mo</span></div>
                <p class="text-sm text-base-content/65 leading-relaxed mb-4">Ongoing identity stewardship. Monthly design reviews + 8 hours of drawing.</p>
                <ul class="text-sm space-y-2 mb-4">
                    <li class="flex gap-2"><x-i type="check" library="solar-extra" class="w-4 h-4 text-success shrink-0" /> Quarterly system audit</li>
                    <li class="flex gap-2"><x-i type="check" library="solar-extra" class="w-4 h-4 text-success shrink-0" /> Slack channel access</li>
                    <li class="flex gap-2"><x-i type="check" library="solar-extra" class="w-4 h-4 text-success shrink-0" /> 12-month minimum</li>
                </ul>
                <x-slot:footer>
                    <x-button color="primary" appearance="outline" class="w-full">Talk to us</x-button>
                </x-slot:footer>
            </x-card>
        </div>
    </section>

    {{-- ============ Final CTA ============ --}}
    <section class="px-10 space-section bg-base-300/30 border-t border-base-300/60">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-5xl md:text-6xl font-black tracking-tight mb-6"
                style="font-family: var(--font-heading);">
                Want a face<br>of your own?
            </h2>
            <p class="text-lg text-base-content/65 leading-relaxed mb-9">
                We take on six commissions a year. Briefs open until October — after that we close until January.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-3">
                <x-button color="primary" size="lg" icon="letter">Email the studio</x-button>
                <x-button appearance="ghost" size="lg" icon="calendar">Book a call</x-button>
            </div>
        </div>
    </section>

    {{-- ============ Footer ============ --}}
    <footer class="px-10 py-12 border-t border-base-300/60 flex flex-wrap items-center justify-between gap-4">
        <div class="flex items-center gap-3 text-sm text-base-content/55">
            <div class="w-7 h-7 rounded-[var(--radius-field)] bg-primary text-primary-content flex items-center justify-center font-black text-sm">N</div>
            <span>© 2026 Nimbus Type Studio · Made in Helsinki + Lisbon</span>
        </div>
        <div class="flex items-center gap-4 text-sm text-base-content/55">
            <a class="hover:text-primary">Specimens</a>
            <a class="hover:text-primary">Process</a>
            <a class="hover:text-primary">Terms</a>
            <a class="hover:text-primary">Imprint</a>
        </div>
    </footer>

</div>
@endsection
