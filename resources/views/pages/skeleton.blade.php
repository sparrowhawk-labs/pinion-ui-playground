@extends('layouts.playground')

@section('title', '— Skeleton')
@section('heading', 'Skeleton')
@section('subheading', 'コンテンツ読み込み中の placeholder。daisyUI の skeleton class を wrap し、shape (rect / circle / text) / width / height / radius / animated を props で制御。width / height は Tailwind class 名 (`w-32`, `h-4` 等) で渡す。')

@section('content')
    {{-- ============================================================
         デフォルト
         ============================================================ --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        shape=rect, width=w-full, height=h-4, lines=1, radius=default, animated=true
    </p>
    <div class="mb-8 p-element border border-base-300 rounded-[var(--radius-box)] bg-base-100">
        <x-skeleton />
    </div>

    {{-- ============================================================
         shapes
         ============================================================ --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">shapes — rect / circle / text</p>
    <div class="mb-8 grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="p-element border border-base-300 rounded-[var(--radius-box)] bg-base-100">
            <p class="text-xs text-base-content/60 mb-2">rect (w-full h-16)</p>
            <x-skeleton width="w-full" height="h-16" />
        </div>
        <div class="p-element border border-base-300 rounded-[var(--radius-box)] bg-base-100 flex items-center justify-center">
            <div class="text-center">
                <p class="text-xs text-base-content/60 mb-2">circle (default w-12 h-12)</p>
                <div class="flex justify-center">
                    <x-skeleton shape="circle" />
                </div>
            </div>
        </div>
        <div class="p-element border border-base-300 rounded-[var(--radius-box)] bg-base-100">
            <p class="text-xs text-base-content/60 mb-2">text (lines=3)</p>
            <x-skeleton shape="text" :lines="3" />
        </div>
    </div>

    {{-- ============================================================
         card placeholder — circle (avatar) + text lines 3
         ============================================================ --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">card placeholder — avatar (circle) + 本文 (text lines=3)</p>
    <div class="mb-8 space-y-3">
        @foreach(range(1, 3) as $i)
            <div class="flex items-start gap-4 p-element border border-base-300 rounded-[var(--radius-box)] bg-base-100">
                <x-skeleton shape="circle" width="w-14" height="h-14" />
                <div class="flex-1 space-y-2">
                    <x-skeleton width="w-1/3" height="h-4" />
                    <x-skeleton shape="text" :lines="3" />
                </div>
            </div>
        @endforeach
    </div>

    {{-- ============================================================
         text lines
         ============================================================ --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">text lines — 1 / 2 / 3 / 5</p>
    <div class="mb-8 grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach([1, 2, 3, 5] as $n)
            <div class="p-element border border-base-300 rounded-[var(--radius-box)] bg-base-100">
                <p class="text-xs text-base-content/60 mb-2">lines={{ $n }}</p>
                <x-skeleton shape="text" :lines="$n" />
            </div>
        @endforeach
    </div>

    {{-- ============================================================
         radius
         ============================================================ --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">radius — default / sm / md / lg / xl / full</p>
    <div class="mb-8 grid grid-cols-2 md:grid-cols-3 gap-4">
        @foreach(['default', 'sm', 'md', 'lg', 'xl', 'full'] as $r)
            <div class="p-element border border-base-300 rounded-[var(--radius-box)] bg-base-100">
                <p class="text-xs text-base-content/60 mb-2">radius={{ $r }}</p>
                <x-skeleton width="w-full" height="h-10" radius="{{ $r }}" />
            </div>
        @endforeach
    </div>

    {{-- ============================================================
         width × height grid
         ============================================================ --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">width × height grid — Tailwind サイズ class</p>
    <div class="mb-8 grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="p-element border border-base-300 rounded-[var(--radius-box)] bg-base-100">
            <p class="text-xs text-base-content/60 mb-2">w-32 h-4 — 細い line</p>
            <x-skeleton width="w-32" height="h-4" />
        </div>
        <div class="p-element border border-base-300 rounded-[var(--radius-box)] bg-base-100">
            <p class="text-xs text-base-content/60 mb-2">w-1/2 h-8 — 半幅</p>
            <x-skeleton width="w-1/2" height="h-8" />
        </div>
        <div class="p-element border border-base-300 rounded-[var(--radius-box)] bg-base-100">
            <p class="text-xs text-base-content/60 mb-2">w-full h-32 — 画像枠</p>
            <x-skeleton width="w-full" height="h-32" radius="lg" />
        </div>
        <div class="p-element border border-base-300 rounded-[var(--radius-box)] bg-base-100">
            <p class="text-xs text-base-content/60 mb-2">w-24 h-24 — 正方形 (rect)</p>
            <x-skeleton width="w-24" height="h-24" radius="md" />
        </div>
    </div>

    {{-- ============================================================
         animated off
         ============================================================ --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">animated=false — pulse animation を suppress (静的 placeholder)</p>
    <div class="mb-8 grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="p-element border border-base-300 rounded-[var(--radius-box)] bg-base-100">
            <p class="text-xs text-base-content/60 mb-2">animated=true (default)</p>
            <div class="space-y-2">
                <x-skeleton width="w-2/3" height="h-4" />
                <x-skeleton width="w-full" height="h-4" />
                <x-skeleton width="w-1/2" height="h-4" />
            </div>
        </div>
        <div class="p-element border border-base-300 rounded-[var(--radius-box)] bg-base-100">
            <p class="text-xs text-base-content/60 mb-2">animated=false</p>
            <div class="space-y-2">
                <x-skeleton width="w-2/3" height="h-4" :animated="false" />
                <x-skeleton width="w-full" height="h-4" :animated="false" />
                <x-skeleton width="w-1/2" height="h-4" :animated="false" />
            </div>
        </div>
    </div>

    {{-- ============================================================
         使い方
         ============================================================ --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-8">使い方</p>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim {{-- デフォルト: 1行のテキスト幅 placeholder --}}
&lt;x-skeleton /&gt;

{{-- circle (avatar) — width/height 未指定なら w-12 h-12 --}}
&lt;x-skeleton shape="circle" /&gt;
&lt;x-skeleton shape="circle" width="w-16" height="h-16" /&gt;

{{-- text — lines>1 で段落 placeholder (最後の行は w-2/3) --}}
&lt;x-skeleton shape="text" :lines="3" /&gt;

{{-- サイズは Tailwind class で (生 px は禁止) --}}
&lt;x-skeleton width="w-32" height="h-8" /&gt;
&lt;x-skeleton width="w-full" height="h-48" radius="lg" /&gt;

{{-- 角丸 --}}
&lt;x-skeleton radius="full" /&gt;  {{-- pill --}}
&lt;x-skeleton radius="lg" /&gt;    {{-- カード型 --}}

{{-- 静的 placeholder (pulse 無し) --}}
&lt;x-skeleton :animated="false" /&gt;

{{-- 実例: card placeholder --}}
&lt;div class="flex items-start gap-4"&gt;
    &lt;x-skeleton shape="circle" width="w-14" height="h-14" /&gt;
    &lt;div class="flex-1 space-y-2"&gt;
        &lt;x-skeleton width="w-1/3" height="h-4" /&gt;
        &lt;x-skeleton shape="text" :lines="3" /&gt;
    &lt;/div&gt;
&lt;/div&gt;
@endverbatim</code></pre>
@endsection
