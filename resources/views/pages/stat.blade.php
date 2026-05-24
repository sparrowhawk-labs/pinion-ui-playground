@extends('layouts.playground')

@section('title', '— Stat')
@section('heading', 'Stat')
@section('subheading', __('playground.subheading.stat'))

@section('content')
    {{-- ============================================================
         デフォルト
         ============================================================ --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        label + value だけ — wrapped=true, valueColor=null, trend=null
    </p>
    <div class="mb-8">
        <x-stat label="Visits" value="1,234" />
    </div>

    {{-- ============================================================
         + desc
         ============================================================ --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">+ desc — 補足テキスト</p>
    <div class="mb-8">
        <x-stat label="Visits" value="1,234" desc="since last month" />
    </div>

    {{-- ============================================================
         valueColor variants
         ============================================================ --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">valueColor — null / primary / secondary / accent / info / success / warning / error</p>
    <div class="mb-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
        @foreach([null, 'primary', 'secondary', 'accent', 'info', 'success', 'warning', 'error'] as $color)
            <x-stat
                label="{{ $color ?? 'null (default)' }}"
                value="42.0K"
                desc="valueColor={{ $color ?? 'null' }}"
                :valueColor="$color"
            />
        @endforeach
    </div>

    {{-- ============================================================
         trend variants
         ============================================================ --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">trend — up / down / flat (desc に arrow + 色付け + trendValue)</p>
    <div class="mb-8 grid grid-cols-1 sm:grid-cols-3 gap-3">
        <x-stat label="Signups" value="2,847" desc="vs last week" trend="up" trendValue="+12%" />
        <x-stat label="Refunds" value="38" desc="vs last week" trend="down" trendValue="-3%" />
        <x-stat label="Sessions" value="9,120" desc="vs last week" trend="flat" trendValue="±0%" />
    </div>

    {{-- ============================================================
         with icon (slot)
         ============================================================ --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">with icon (slot) — stat-figure に SVG icon を挿入。valueColor を渡すと icon も同色に</p>
    <div class="mb-8 grid grid-cols-1 sm:grid-cols-3 gap-3">
        <x-stat label="Downloads" value="31K" desc="今月" valueColor="primary">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block h-8 w-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5 5-5M12 15V3"/></svg>
        </x-stat>

        <x-stat label="Likes" value="1.2K" desc="累計" valueColor="error">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block h-8 w-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.636l1.318-1.318a4.5 4.5 0 116.364 6.364L12 20.364l-7.682-7.682a4.5 4.5 0 010-6.364z"/></svg>
        </x-stat>

        <x-stat label="Verified" value="89%" desc="ユーザー認証率" valueColor="success" trend="up" trendValue="+2.1%">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block h-8 w-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </x-stat>
    </div>

    {{-- ============================================================
         wrapped=false — dashboard grid
         ============================================================ --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">wrapped=false — 複数 stat を 1 つの stats container にまとめる (ダッシュボード風)</p>
    <div class="mb-8">
        <div class="stats stats-vertical lg:stats-horizontal shadow w-full">
            <x-stat
                wrapped="false"
                label="Total Visits"
                value="89,400"
                desc="累計"
                valueColor="primary"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block h-8 w-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
            </x-stat>

            <x-stat
                wrapped="false"
                label="New Users"
                value="2,103"
                desc="今月新規"
                valueColor="info"
                trend="up"
                trendValue="+18%"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block h-8 w-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            </x-stat>

            <x-stat
                wrapped="false"
                label="Revenue"
                value="¥1.2M"
                desc="MTD"
                valueColor="success"
                trend="up"
                trendValue="+4.7%"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block h-8 w-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </x-stat>
        </div>
    </div>

    {{-- ============================================================
         使い方
         ============================================================ --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-8">使い方</p>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim{{-- 最小 --}}
&lt;x-stat label="Visits" value="1,234" /&gt;

{{-- + desc --}}
&lt;x-stat label="Visits" value="1,234" desc="since last month" /&gt;

{{-- value に色 --}}
&lt;x-stat label="Errors" value="38" valueColor="error" /&gt;

{{-- trend (up=text-success ↑ / down=text-error ↓ / flat=灰 →) --}}
&lt;x-stat label="Signups" value="2,847" trend="up" trendValue="+12%" desc="vs last week" /&gt;
&lt;x-stat label="Refunds" value="38" trend="down" trendValue="-3%" /&gt;

{{-- icon (stat-figure に slot) --}}
&lt;x-stat label="Downloads" value="31K" valueColor="primary"&gt;
    &lt;svg class="h-8 w-8 stroke-current" ... /&gt;
&lt;/x-stat&gt;

{{-- 複数並べる: 外側 stats を自前で作って wrapped=false --}}
&lt;div class="stats stats-vertical lg:stats-horizontal shadow"&gt;
    &lt;x-stat wrapped="false" label="Visits" value="89,400" /&gt;
    &lt;x-stat wrapped="false" label="Users" value="2,103" trend="up" trendValue="+18%" /&gt;
    &lt;x-stat wrapped="false" label="Revenue" value="¥1.2M" valueColor="success" /&gt;
&lt;/div&gt;
@endverbatim</code></pre>
@endsection
