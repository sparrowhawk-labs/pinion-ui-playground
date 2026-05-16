@extends('layouts.playground')

@section('title', '— Pinion Theme Preview')
@section('heading', 'Pinion Theme — Preview')
@section('subheading', 'v0.4.0 同梱予定の data-theme="pinion" の tone を user 判断するためのページ。各カードは inline CSS variables で daisyUI v5 token を上書きしている (実装上は themes 配列にまとめる)。')

@section('content')
@php
    // Common base tokens (warm cream surface, near-black ink). 各 card で primary / accent のみ上書きする。
    $base = [
        '--color-base-100'        => 'oklch(0.985 0.005 75)',
        '--color-base-200'        => 'oklch(0.965 0.005 75)',
        '--color-base-300'        => 'oklch(0.92 0.005 75)',
        '--color-base-content'    => 'oklch(0.18 0.005 50)',
        '--color-neutral'         => 'oklch(0.18 0.005 50)',
        '--color-neutral-content' => 'oklch(0.985 0.005 75)',
    ];
    $renderStyle = function (array $tokens) use ($base) {
        $merged = array_merge($base, $tokens);
        return collect($merged)->map(fn ($v, $k) => "{$k}: {$v}")->implode('; ');
    };

    $amber500    = 'oklch(0.795 0.165 65)';   // ≈ #F59E0B
    $amber550    = 'oklch(0.75 0.165 58)';    // ≈ #E58A0E (500/600 中間 = picked)
    $amber600    = 'oklch(0.71 0.165 50)';    // ≈ #D97706
    $amberContent = 'oklch(0.18 0.005 50)';

    $charcoals = [
        '0.18' => 'oklch(0.18 0.005 50)',
        '0.22' => 'oklch(0.22 0.005 50)',
        '0.24' => 'oklch(0.24 0.005 50)',
        '0.26' => 'oklch(0.26 0.005 50)',
        '0.28' => 'oklch(0.28 0.005 50)',
        '0.30' => 'oklch(0.30 0.005 50)',   // picked
    ];
@endphp

<div class="space-y-12">

    {{-- ════════════════════════════════════════════════════════════════════
         Section 1 — Charcoal primary depth (amber-500 fixed)
         ════════════════════════════════════════════════════════════════════ --}}
    <section>
        <h2 class="text-xl font-bold mb-1">① Charcoal primary depth</h2>
        <p class="text-sm text-base-content/60 mb-4">
            accent = <code>amber-500</code> (≈#F59E0B) 固定。primary の濃さで比較。
            beck は <code>L=0.18</code> 寄り (Sign in が near-black)。
        </p>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-6 gap-4">
            @foreach($charcoals as $tag => $value)
                @php
                    $style = $renderStyle([
                        '--color-primary'         => $value,
                        '--color-primary-content' => 'oklch(0.985 0.005 75)',
                        '--color-accent'          => $amber500,
                        '--color-accent-content'  => $amberContent,
                    ]);
                @endphp
                <div class="rounded-lg p-5 border" style="{{ $style }}; background: var(--color-base-100); color: var(--color-base-content); border-color: var(--color-base-300);">
                    <div class="text-[10px] uppercase tracking-wider opacity-60 mb-3 font-semibold flex flex-wrap gap-1 items-center">
                        <span>primary L = {{ $tag }}</span>
                        @if($tag === '0.30')<span class="normal-case opacity-100 text-[9px] bg-base-200 px-1 rounded">picked</span>@endif
                        @if($tag === '0.18')<span class="normal-case opacity-100 text-[9px] bg-base-200 px-1 rounded">beck-like</span>@endif
                    </div>
                    @include('pages.partials.theme-preview-demo')
                </div>
            @endforeach
        </div>
    </section>

    {{-- ════════════════════════════════════════════════════════════════════
         Section 2 — Amber accent tone (charcoal 0.24 fixed)
         ════════════════════════════════════════════════════════════════════ --}}
    <section>
        <h2 class="text-xl font-bold mb-1">② Amber accent tone</h2>
        <p class="text-sm text-base-content/60 mb-4">
            primary = <code>charcoal L=0.24</code> 固定。accent dot / badge / CTA の amber tone を比較。
        </p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach([
                ['amber-500 / ≈#F59E0B', $amber500, 'beck と同系、明るく親しみ'],
                ['amber-550 / ≈#E58A0E', $amber550, 'picked — 500/600 中間'],
                ['amber-600 / ≈#D97706', $amber600, '一段落ち着いた orange、重く深め'],
            ] as [$tag, $value, $note])
                @php
                    $style = $renderStyle([
                        '--color-primary'         => $charcoals['0.24'],
                        '--color-primary-content' => 'oklch(0.985 0.005 75)',
                        '--color-accent'          => $value,
                        '--color-accent-content'  => $amberContent,
                    ]);
                @endphp
                <div class="rounded-lg p-6 border" style="{{ $style }}; background: var(--color-base-100); color: var(--color-base-content); border-color: var(--color-base-300);">
                    <div class="text-[10px] uppercase tracking-wider opacity-60 mb-1 font-semibold">accent = {{ $tag }}</div>
                    <p class="text-xs opacity-60 mb-4">{{ $note }}</p>
                    @include('pages.partials.theme-preview-demo')

                    {{-- Larger amber accent surfaces to feel the tone --}}
                    <div class="mt-4 pt-4 border-t" style="border-color: var(--color-base-300)">
                        <div class="flex flex-wrap gap-3 items-center">
                            <div class="flex items-center gap-2 text-sm">
                                <span class="inline-block w-2 h-2 rounded-full" style="background: var(--color-accent)"></span>
                                <span>dev · local only</span>
                            </div>
                            <x-button color="accent" size="sm">Accent CTA</x-button>
                            <x-button color="accent" appearance="soft" size="sm">soft</x-button>
                            <x-badge color="accent">solid</x-badge>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ════════════════════════════════════════════════════════════════════
         Section 3 — Final pick: charcoal 0.28 + amber-550
         ════════════════════════════════════════════════════════════════════ --}}
    <section>
        <h2 class="text-xl font-bold mb-1">③ Mini preview — picked combo</h2>
        <p class="text-sm text-base-content/60 mb-4">
            <strong>picked:</strong> charcoal <code>L=0.30</code> + amber <code>550</code> (≈#E58A0E)。beck-login 風に組んで全体の佇まいを確認。
        </p>
        @php
            $style = $renderStyle([
                '--color-primary'         => $charcoals['0.30'],
                '--color-primary-content' => 'oklch(0.985 0.005 75)',
                '--color-accent'          => $amber550,
                '--color-accent-content'  => $amberContent,
            ]);
        @endphp
        <div class="rounded-lg p-12 border" style="{{ $style }}; background: var(--color-base-100); color: var(--color-base-content); border-color: var(--color-base-300);">
            <div class="max-w-md mx-auto">
                <div class="text-center mb-8">
                    <div class="inline-flex items-baseline gap-2">
                        <span class="text-3xl font-bold tracking-tight" style="font-family: ui-serif, Georgia, serif;">pinion</span>
                        <span class="inline-block w-2.5 h-2.5 rounded-full" style="background: var(--color-accent)"></span>
                    </div>
                    <p class="text-sm opacity-60 mt-2">Blade UI for Laravel.</p>
                </div>

                <div class="rounded-lg p-8 border" style="background: var(--color-base-100); border-color: var(--color-base-300);">
                    <div class="space-y-4">
                        <div>
                            <label class="text-sm font-medium mb-1 block">Email</label>
                            <x-input type="email" class="w-full" />
                        </div>
                        <div>
                            <label class="text-sm font-medium mb-1 block">Password</label>
                            <x-input type="password" class="w-full" />
                        </div>
                        <div class="flex items-center gap-2">
                            <x-checkbox id="theme-remember" color="primary" />
                            <label for="theme-remember" class="text-sm cursor-pointer">Remember me</label>
                        </div>
                        <x-button color="primary" class="w-full">Sign in</x-button>
                        <div class="flex justify-between text-xs">
                            <a class="opacity-70 hover:opacity-100 cursor-pointer">Create an account</a>
                            <a class="opacity-70 hover:opacity-100 cursor-pointer">Forgot password?</a>
                        </div>
                    </div>
                </div>

                <div class="mt-8 text-center">
                    <div class="flex items-center justify-center gap-2 text-xs opacity-60">
                        <span class="inline-block w-1.5 h-1.5 rounded-full" style="background: var(--color-accent)"></span>
                        <span>dev · local only · one-click sign in</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ════════════════════════════════════════════════════════════════════
         Section 5 — Secondary candidates (primary + accent locked)
         ════════════════════════════════════════════════════════════════════ --}}
    <section>
        <h2 class="text-xl font-bold mb-1">⑤ Secondary candidates</h2>
        <p class="text-sm text-base-content/60 mb-4">
            primary = <code>charcoal L=0.30</code>, accent = <code>amber-550</code> 固定。secondary は amber 58° との harmony rule で 4 候補。
            success (145°) / error (25°) と区別できる hue 範囲 (175°–270° + 300°–330°) から選定。
        </p>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
            @foreach([
                ['A. Teal-petrol',   'oklch(0.45 0.10 200)', 'Triadic / 工業・印刷インク的'],
                ['B. Slate-indigo',  'oklch(0.45 0.07 250)', 'Complement / SaaS 王道、落ち着き'],
                ['C. Plum',          'oklch(0.42 0.09 320)', 'Split-comp / 上品・洗練'],
                ['D. Petrol-blue',   'oklch(0.45 0.06 220)', 'Subtle / 控えめ・上品'],
            ] as [$tag, $secValue, $note])
                @php
                    $style = $renderStyle([
                        '--color-primary'           => $charcoals['0.30'],
                        '--color-primary-content'   => 'oklch(0.985 0.005 75)',
                        '--color-accent'            => $amber550,
                        '--color-accent-content'    => $amberContent,
                        '--color-secondary'         => $secValue,
                        '--color-secondary-content' => 'oklch(0.985 0.005 75)',
                    ]);
                @endphp
                <div class="rounded-lg p-5 border" style="{{ $style }}; background: var(--color-base-100); color: var(--color-base-content); border-color: var(--color-base-300);">
                    <div class="text-[11px] uppercase tracking-wider opacity-70 mb-1 font-bold">{{ $tag }}</div>
                    <p class="text-xs opacity-60 mb-1"><code class="text-[10px]">{{ $secValue }}</code></p>
                    <p class="text-xs opacity-60 mb-4">{{ $note }}</p>

                    {{-- Secondary surfaces --}}
                    <div class="flex flex-wrap gap-2 items-center mb-3">
                        <x-button color="secondary" size="sm">Secondary</x-button>
                        <x-button color="secondary" appearance="outline" size="sm">outline</x-button>
                        <x-button color="secondary" appearance="soft" size="sm">soft</x-button>
                    </div>
                    <div class="flex flex-wrap gap-2 items-center mb-4">
                        <x-badge color="secondary">solid</x-badge>
                        <x-badge color="secondary" appearance="soft">soft</x-badge>
                        <x-badge color="secondary" appearance="outline">outline</x-badge>
                    </div>

                    {{-- Co-existence check: secondary alongside primary + accent --}}
                    <div class="pt-3 border-t flex flex-wrap gap-1.5 items-center" style="border-color: var(--color-base-300)">
                        <x-button color="primary" size="sm">Primary</x-button>
                        <x-button color="secondary" size="sm">2nd</x-button>
                        <x-button color="accent" size="sm">Accent</x-button>
                    </div>
                </div>
            @endforeach
        </div>
        <p class="text-xs text-base-content/50 mt-3">
            ※ 並べた最下段の <code>Primary / 2nd / Accent</code> 横並びで「3 色のバランス」を最終判断。
        </p>
    </section>

    {{-- Decision hints --}}
    <section class="text-sm text-base-content/70 space-y-2 pt-4 border-t border-base-300">
        <p><strong>判断ポイント:</strong></p>
        <ul class="list-disc pl-5 space-y-1">
            <li>primary の濃さは「CTA の存在感」と「テキストとの差分」のバランス。0.18 = beck 完全踏襲 / 0.24 = 落ち着き / 0.26 = やや薄く読みやすい</li>
            <li>amber-500 vs amber-600 は「明るく親しみ」 vs 「深く真面目」。pinion-ui のブランド感としてどっちを取るか</li>
            <li>確定したら <code>src/resources/css/pinion-ui.css</code> に <code>@plugin 'daisyui/theme' { name: 'pinion'; ... }</code> を追加 (v0.4.0 BC break)</li>
            <li>dark 専用テーマは v0.4.0 では同梱しない方針 — dark mode が要るユーザーは daisyUI 標準の <code>dark</code> / <code>dim</code> / <code>night</code> 等を <code>data-theme</code> で指定してもらう</li>
        </ul>
    </section>
</div>
@endsection
