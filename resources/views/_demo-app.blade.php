@extends('layouts._lp')

@section('content')
{{--
    "App-typical" preview that lives inside the iframe at 40% scale.
    Vertically rich (one tall page > horizontally rich) so the scaled
    preview reads as a believable working dashboard. No real navbar /
    sidebar / playground chrome — the outer page provides the frame.

    Component choice prioritises tune-sensitivity surfaces:
      • <x-stat>            — radius-box on the wrapper card
      • <x-card>            — radius-box + border weight
      • <x-tabs>            — radius-field on tab buttons, font
      • <x-table-scroll>    — font + spacing
      • <x-accordion>       — radius-field on header buttons
      • <x-stepper>         — circle radius + connector weight
      • <x-input>, <x-toggle>, <x-button>, <x-badge> — full surface

    Self-contained: all Alpine state is owned by the components themselves,
    so the iframe page mounts cleanly without a body-level x-data scope.
--}}

<div class="app-preview min-h-screen bg-base-100 text-base-content">

    {{-- ============ App top bar (slim, not playground chrome) ============ --}}
    <header class="flex items-center justify-between px-8 py-4 border-b border-base-300 bg-base-100/95 backdrop-blur sticky top-0 z-10">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-[var(--radius-field)] bg-primary text-primary-content flex items-center justify-center font-black">
                <x-i type="widget" class="w-4 h-4" />
            </div>
            <div class="leading-tight">
                <div class="font-bold text-sm">Pinion Console</div>
                <div class="text-[10px] uppercase tracking-widest text-base-content/45">Workspace · acme</div>
            </div>
        </div>

        <nav class="hidden md:flex items-center gap-1">
            <a class="px-3 py-1.5 text-sm rounded-[var(--radius-field)] bg-base-200 font-semibold">Overview</a>
            <a class="px-3 py-1.5 text-sm rounded-[var(--radius-field)] text-base-content/70 hover:bg-base-200">Projects</a>
            <a class="px-3 py-1.5 text-sm rounded-[var(--radius-field)] text-base-content/70 hover:bg-base-200">Team</a>
            <a class="px-3 py-1.5 text-sm rounded-[var(--radius-field)] text-base-content/70 hover:bg-base-200">Billing</a>
            <a class="px-3 py-1.5 text-sm rounded-[var(--radius-field)] text-base-content/70 hover:bg-base-200">Settings</a>
        </nav>

        <div class="flex items-center gap-2">
            <button type="button" class="relative w-8 h-8 rounded-[var(--radius-field)] hover:bg-base-200 flex items-center justify-center">
                <x-i type="bell" class="w-4 h-4" />
                <span class="absolute top-1 right-1 w-2 h-2 rounded-full bg-error"></span>
            </button>
            <div class="w-8 h-8 rounded-full bg-accent text-accent-content flex items-center justify-center text-xs font-bold">AT</div>
        </div>
    </header>

    {{-- ============ Page header ============ --}}
    <section class="px-8 pt-7 pb-3">
        <div class="flex items-center gap-2 mb-2 text-[11px] uppercase tracking-widest text-base-content/45 font-semibold">
            <x-i type="home-2" class="w-3 h-3" /> Home <span class="opacity-40">/</span> Overview
        </div>
        <div class="flex flex-wrap items-end justify-between gap-3">
            <div>
                <h1 class="text-3xl font-black tracking-tight" style="font-family: var(--font-heading); letter-spacing: -0.02em;">
                    Welcome back, Akihiko
                </h1>
                <p class="text-sm text-base-content/60 mt-1">Here's how Acme has been doing this week.</p>
            </div>
            <div class="flex items-center gap-2">
                <x-badge appearance="dot" color="success">Live</x-badge>
                <x-button size="sm" appearance="ghost" icon="download">Export</x-button>
                <x-button size="sm" color="primary" icon="add-square">New project</x-button>
            </div>
        </div>
    </section>

    {{-- ============ KPI strip (4 stats) ============ --}}
    <section class="px-8 pt-3 pb-6">
        <div class="stats shadow grid grid-cols-2 lg:grid-cols-4 w-full">
            <x-stat
                :wrapped="false"
                label="Revenue"
                value="$48,219"
                desc="vs. last week"
                trend="up"
                trendValue="+12.4%"
                valueColor="primary"
            >
                <x-i type="dollar-minimalistic" class="w-7 h-7" />
            </x-stat>
            <x-stat
                :wrapped="false"
                label="Active users"
                value="2,841"
                desc="vs. last week"
                trend="up"
                trendValue="+5.1%"
                valueColor="accent"
            >
                <x-i type="users-group-rounded" class="w-7 h-7" />
            </x-stat>
            <x-stat
                :wrapped="false"
                label="Open tickets"
                value="17"
                desc="3 unassigned"
                trend="down"
                trendValue="-22%"
                valueColor="success"
            >
                <x-i type="ticket" class="w-7 h-7" />
            </x-stat>
            <x-stat
                :wrapped="false"
                label="Latency p95"
                value="184ms"
                desc="all regions"
                trend="flat"
                valueColor="info"
            >
                <x-i type="bolt" class="w-7 h-7" />
            </x-stat>
        </div>
    </section>

    {{-- ============ Main grid: chart card + activity ============ --}}
    <section class="px-8 pb-6 grid grid-cols-1 lg:grid-cols-3 gap-5">

        {{-- Left: chart-ish card with tabs (tune-sensitive: radius-field on tabs) --}}
        <x-card appearance="elevated" class="lg:col-span-2">
            <x-slot:header>
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="font-bold text-base" style="font-family: var(--font-heading);">Throughput</h2>
                        <p class="text-xs text-base-content/55">Requests per minute · last 24h</p>
                    </div>
                    <x-badge appearance="soft" color="primary" icon="chart-2">+18%</x-badge>
                </div>
            </x-slot:header>

            <x-tabs variant="boxed" default="day">
                <x-tab name="hour" label="Hour">
                    @include('_demo-app-chart', ['accent' => 'primary', 'mode' => 'hour'])
                </x-tab>
                <x-tab name="day" label="Day">
                    @include('_demo-app-chart', ['accent' => 'primary', 'mode' => 'day'])
                </x-tab>
                <x-tab name="week" label="Week">
                    @include('_demo-app-chart', ['accent' => 'accent', 'mode' => 'week'])
                </x-tab>
                <x-tab name="month" label="Month">
                    @include('_demo-app-chart', ['accent' => 'success', 'mode' => 'month'])
                </x-tab>
            </x-tabs>
        </x-card>

        {{-- Right: activity feed (rich vertical content) --}}
        <x-card appearance="default">
            <x-slot:header>
                <div class="flex items-center justify-between">
                    <h2 class="font-bold text-base" style="font-family: var(--font-heading);">Recent activity</h2>
                    <a class="text-xs link link-hover text-primary">View all →</a>
                </div>
            </x-slot:header>

            <ul class="space-y-3">
                @php
                    $activity = [
                        ['icon' => 'check-circle', 'color' => 'success', 'who' => 'Mei',     'what' => 'merged PR #482 — "fix focus trap"', 'when' => '2m'],
                        ['icon' => 'rocket',       'color' => 'primary', 'who' => 'Akihiko', 'what' => 'deployed v0.4.0 to production',      'when' => '14m'],
                        ['icon' => 'cart-large',   'color' => 'accent',  'who' => 'Stripe',  'what' => 'invoice #INV-2031 paid · $2,400',   'when' => '38m'],
                        ['icon' => 'user-plus',    'color' => 'info',    'who' => 'Jordan',  'what' => 'joined the workspace',              'when' => '1h'],
                        ['icon' => 'shield-warning','color' => 'warning','who' => 'Sentry',  'what' => 'flagged 3 new exceptions',          'when' => '2h'],
                        ['icon' => 'document-add', 'color' => 'primary', 'who' => 'Riley',   'what' => 'opened brief — "Q3 onboarding"',    'when' => '4h'],
                    ];
                @endphp
                @foreach($activity as $a)
                    <li class="flex items-start gap-3">
                        <div class="w-7 h-7 rounded-[var(--radius-field)] bg-{{ $a['color'] }}/15 text-{{ $a['color'] }} flex items-center justify-center shrink-0">
                            <x-i type="{{ $a['icon'] }}" class="w-3.5 h-3.5" />
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm leading-snug">
                                <span class="font-semibold">{{ $a['who'] }}</span>
                                <span class="text-base-content/70">{{ $a['what'] }}</span>
                            </p>
                            <p class="text-[11px] text-base-content/40 mt-0.5">{{ $a['when'] }} ago</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </x-card>
    </section>

    {{-- ============ Onboarding stepper card ============ --}}
    <section class="px-8 pb-6">
        <x-card appearance="bordered-top" color="accent">
            <x-slot:header>
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="font-bold text-base" style="font-family: var(--font-heading);">Workspace setup</h2>
                        <p class="text-xs text-base-content/55">3 of 5 steps complete</p>
                    </div>
                    <x-button size="sm" appearance="ghost" iconRight="arrow-right">Resume</x-button>
                </div>
            </x-slot:header>

            <x-stepper :items="[
                ['label' => 'Create account',   'state' => 'done'],
                ['label' => 'Invite team',      'state' => 'done'],
                ['label' => 'Connect domain',   'state' => 'done'],
                ['label' => 'Configure billing','state' => 'current'],
                ['label' => 'Go live',          'state' => 'upcoming'],
            ]" />
        </x-card>
    </section>

    {{-- ============ Projects table ============ --}}
    <section class="px-8 pb-6">
        <x-card appearance="default">
            <x-slot:header>
                <div class="flex items-center justify-between gap-3">
                    <div>
                        <h2 class="font-bold text-base" style="font-family: var(--font-heading);">Projects</h2>
                        <p class="text-xs text-base-content/55">8 active · 2 archived</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <x-input
                            name="proj_search"
                            type="text"
                            placeholder="Search projects"
                            iconLeft="magnifer"
                            size="sm"
                        />
                        <x-button size="sm" color="primary" icon="add-square">New</x-button>
                    </div>
                </div>
            </x-slot:header>

            <x-table-scroll :showButtons="false">
                <table class="min-w-[720px] w-full text-sm">
                    <thead>
                        <tr class="text-left text-[11px] uppercase tracking-wider text-base-content/45 border-b border-base-300">
                            <th class="py-2 pr-4 font-semibold">Project</th>
                            <th class="py-2 pr-4 font-semibold">Owner</th>
                            <th class="py-2 pr-4 font-semibold">Status</th>
                            <th class="py-2 pr-4 font-semibold">Progress</th>
                            <th class="py-2 pr-4 font-semibold text-right">Budget</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-base-300/70">
                        @php
                            $rows = [
                                ['name' => 'Sparrowhawk Studio site', 'owner' => 'Akihiko', 'status' => ['Shipping','success'], 'pct' => 92,  'budget' => '$8,400'],
                                ['name' => 'Pinion Theme v2',         'owner' => 'Mei',     'status' => ['In review','warning'],'pct' => 71, 'budget' => '$12,000'],
                                ['name' => 'Marigold display face',   'owner' => 'Jordan',  'status' => ['Drafting','primary'], 'pct' => 38, 'budget' => '$28,000'],
                                ['name' => 'Halcyon brand refresh',   'owner' => 'Riley',   'status' => ['Blocked','error'],    'pct' => 14, 'budget' => '$6,200'],
                                ['name' => 'AGENTS.md compiler',      'owner' => 'Akihiko', 'status' => ['Planning','info'],    'pct' => 5,  'budget' => '$3,500'],
                            ];
                        @endphp
                        @foreach($rows as $r)
                            <tr class="hover:bg-base-200/50">
                                <td class="py-3 pr-4 font-semibold">{{ $r['name'] }}</td>
                                <td class="py-3 pr-4">
                                    <div class="flex items-center gap-2">
                                        <div class="w-6 h-6 rounded-full bg-base-300 text-[10px] flex items-center justify-center font-bold">
                                            {{ strtoupper(substr($r['owner'], 0, 1)) }}
                                        </div>
                                        <span class="text-base-content/75">{{ $r['owner'] }}</span>
                                    </div>
                                </td>
                                <td class="py-3 pr-4">
                                    <x-badge size="sm" appearance="soft" color="{{ $r['status'][1] }}">{{ $r['status'][0] }}</x-badge>
                                </td>
                                <td class="py-3 pr-4">
                                    <div class="flex items-center gap-2">
                                        <div class="flex-1 h-1.5 rounded-full bg-base-300 overflow-hidden min-w-[80px]">
                                            <div class="h-full bg-primary" style="width: {{ $r['pct'] }}%;"></div>
                                        </div>
                                        <span class="text-xs tabular-nums text-base-content/60 w-9 text-right">{{ $r['pct'] }}%</span>
                                    </div>
                                </td>
                                <td class="py-3 pr-4 text-right font-mono text-xs tabular-nums text-base-content/75">{{ $r['budget'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </x-table-scroll>
        </x-card>
    </section>

    {{-- ============ Two-col bottom: settings panel + FAQ accordion ============ --}}
    <section class="px-8 pb-8 grid grid-cols-1 lg:grid-cols-2 gap-5">

        {{-- Settings panel (toggles + input row) --}}
        <x-card appearance="default">
            <x-slot:header>
                <h2 class="font-bold text-base" style="font-family: var(--font-heading);">Workspace settings</h2>
            </x-slot:header>

            <div class="space-y-3">
                <x-toggle name="app_notif_email"  label="Email notifications" checked stateLabel />
                <x-toggle name="app_notif_slack"  label="Slack alerts" color="accent" stateLabel />
                <x-toggle name="app_notif_weekly" label="Weekly digest" checked color="success" appearance="soft" stateLabel />
                <x-toggle name="app_beta_flags"   label="Beta features" appearance="soft" color="warning" stateLabel />
            </div>

            <x-divider class="my-4" />

            <div class="space-y-3">
                <x-input
                    name="app_workspace_name"
                    type="text"
                    label="Workspace name"
                    value="Acme Studio"
                    floating
                    iconLeft="buildings-2"
                />
                <x-input
                    name="app_workspace_url"
                    type="text"
                    label="Custom domain"
                    value="acme.pinion.app"
                    floating
                    iconLeft="link"
                    hint="DNS verified · TLS auto"
                />
            </div>

            <x-slot:footer>
                <div class="flex items-center justify-between">
                    <p class="text-xs text-base-content/50">Changes save automatically.</p>
                    <x-button size="sm" color="primary" icon="check">Saved</x-button>
                </div>
            </x-slot:footer>
        </x-card>

        {{-- FAQ accordion (tune-sensitive: radius-field + font on header) --}}
        <x-card appearance="default">
            <x-slot:header>
                <h2 class="font-bold text-base" style="font-family: var(--font-heading);">Help</h2>
            </x-slot:header>

            <x-accordion>
                <x-accordion-item title="How do I invite teammates?">
                    Open <strong>Settings → Team</strong> and paste their email. They'll get a magic link valid for 7 days.
                </x-accordion-item>
                <x-accordion-item title="Can I switch billing plans mid-cycle?">
                    Yes — we'll prorate the change to the day. Downgrades take effect at the next renewal.
                </x-accordion-item>
                <x-accordion-item title="Where do I rotate my API key?">
                    <strong>Settings → API</strong>. Existing keys keep working for 24h after rotation.
                </x-accordion-item>
                <x-accordion-item title="What does the latency p95 number include?">
                    All public API endpoints, measured at the edge across every region we serve.
                </x-accordion-item>
            </x-accordion>
        </x-card>

    </section>

    {{-- ============ Footer ============ --}}
    <footer class="px-8 py-5 border-t border-base-300 flex items-center justify-between text-xs text-base-content/45">
        <span>© 2026 Acme Studio · Powered by Pinion</span>
        <div class="flex items-center gap-4">
            <a class="hover:text-primary">Docs</a>
            <a class="hover:text-primary">Status</a>
            <a class="hover:text-primary">Privacy</a>
        </div>
    </footer>

</div>
@endsection
