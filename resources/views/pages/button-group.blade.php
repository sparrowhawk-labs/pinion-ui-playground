@extends('layouts.playground')

@section('title', '— Button Group')
@section('heading', 'Button Group')
@section('subheading', 'segmented control 風に複数の button / link を束ねる wrapper。中央 child の border-radius は wrapper が自動で 0 にし、隣接 border は 1 本に統合される。hover は wrapper 側で soft tint に上書きされ、group コンテキストで重くならない (v0.3.3 で改善)。orientation は horizontal (default) / vertical。child に `class="join-item"` を付ける必要はない (v0.3.3 で不要に)。')

@section('content')
    {{-- DEFAULT --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        orientation=horizontal — 3 つの button を横並びで結合、hover で soft tint
    </p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-button-group>
            <x-button appearance="outline" color="neutral">Left</x-button>
            <x-button appearance="outline" color="neutral">Center</x-button>
            <x-button appearance="outline" color="neutral">Right</x-button>
        </x-button-group>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">orientation=vertical — 縦並びで結合</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-button-group orientation="vertical">
            <x-button appearance="outline" color="neutral">Top</x-button>
            <x-button appearance="outline" color="neutral">Middle</x-button>
            <x-button appearance="outline" color="neutral">Bottom</x-button>
        </x-button-group>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">with toggle state — Alpine.js で segmented control を構成 (active は primary fill + !important で hover override より上に出す)</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div x-data="{ active: 'center' }" class="flex flex-col gap-4">
            <x-button-group>
                <x-button appearance="outline" color="neutral" x-bind:class="active === 'left'   && '!bg-primary !text-primary-content !border-primary'" x-on:click="active = 'left'">Left</x-button>
                <x-button appearance="outline" color="neutral" x-bind:class="active === 'center' && '!bg-primary !text-primary-content !border-primary'" x-on:click="active = 'center'">Center</x-button>
                <x-button appearance="outline" color="neutral" x-bind:class="active === 'right'  && '!bg-primary !text-primary-content !border-primary'" x-on:click="active = 'right'">Right</x-button>
            </x-button-group>
            <p class="text-xs text-base-content/60">
                選択中: <span x-text="active" class="font-medium text-base-content"></span>
            </p>
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">icon-only buttons — 正方形 icon button を束ねる (ツールバー風)</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-button-group>
            <x-button class="w-10 h-10 !p-0" appearance="outline" color="neutral" aria-label="bold">
                <x-i type="text-bold" variant="linear" class="w-4 h-4" />
            </x-button>
            <x-button class="w-10 h-10 !p-0" appearance="outline" color="neutral" aria-label="italic">
                <x-i type="text-italic" variant="linear" class="w-4 h-4" />
            </x-button>
            <x-button class="w-10 h-10 !p-0" appearance="outline" color="neutral" aria-label="underline">
                <x-i type="text-underline" variant="linear" class="w-4 h-4" />
            </x-button>
        </x-button-group>
    </div>

    {{-- usage --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-8">使い方</p>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim{{-- 最小 (orientation=horizontal がデフォルト、join-item は不要) --}}
&lt;x-button-group&gt;
    &lt;x-button appearance="outline" color="neutral"&gt;Left&lt;/x-button&gt;
    &lt;x-button appearance="outline" color="neutral"&gt;Center&lt;/x-button&gt;
    &lt;x-button appearance="outline" color="neutral"&gt;Right&lt;/x-button&gt;
&lt;/x-button-group&gt;

{{-- orientation=vertical で縦並び --}}
&lt;x-button-group orientation="vertical"&gt;
    &lt;x-button appearance="outline" color="neutral"&gt;Top&lt;/x-button&gt;
    &lt;x-button appearance="outline" color="neutral"&gt;Middle&lt;/x-button&gt;
    &lt;x-button appearance="outline" color="neutral"&gt;Bottom&lt;/x-button&gt;
&lt;/x-button-group&gt;

{{-- segmented control (Alpine で active state を管理、active 側は !important で hover override より上) --}}
&lt;div x-data="{ active: 'center' }"&gt;
    &lt;x-button-group&gt;
        &lt;x-button appearance="outline" color="neutral"
            x-bind:class="active === 'left' &amp;&amp; '!bg-primary !text-primary-content !border-primary'"
            x-on:click="active = 'left'"&gt;Left&lt;/x-button&gt;
        ...
    &lt;/x-button-group&gt;
&lt;/div&gt;

{{-- icon-only ツールバー --}}
&lt;x-button-group&gt;
    &lt;x-button class="w-10 h-10 !p-0" appearance="outline" color="neutral" aria-label="bold"&gt;
        &lt;x-i type="text-bold" variant="linear" class="w-4 h-4" /&gt;
    &lt;/x-button&gt;
    ...
&lt;/x-button-group&gt;
@endverbatim</code></pre>
@endsection
