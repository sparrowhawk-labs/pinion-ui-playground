@extends('layouts.playground')

@section('title', '— Progress')
@section('heading', 'Progress')
@section('subheading', __('playground.subheading.progress'))

@section('content')
    @php
        $colors = [null, 'primary', 'secondary', 'accent', 'info', 'success', 'warning', 'error', 'neutral'];
        $sizes = ['xs', 'sm', 'md', 'lg'];
    @endphp

    {{-- 1. DEFAULT — no props (indeterminate) --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        no props — indeterminate (animated stripe), neutral grey, md
    </p>
    <div class="mb-8 max-w-md">
        <x-progress />
    </div>

    {{-- 2. value 段階表示 --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">value — 0 / 25 / 50 / 75 / 100 (max=100)</p>
    <div class="flex flex-col gap-3 mb-8 max-w-md">
        @foreach([0, 25, 50, 75, 100] as $v)
            <div class="flex items-center gap-3">
                <span class="text-xs text-base-content/60 w-10 shrink-0 tabular-nums">{{ $v }}</span>
                <x-progress :value="$v" color="primary" class="flex-1" />
            </div>
        @endforeach
    </div>

    {{-- 3. color variants (default → 8 colors) --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">color variants — default (null = neutral grey) / primary / secondary / accent / info / success / warning / error / neutral</p>
    <div class="flex flex-col gap-3 mb-8 max-w-md">
        @foreach($colors as $c)
            <div class="flex items-center gap-3">
                <span class="text-xs text-base-content/60 w-20 shrink-0">{{ $c ?? 'default' }}</span>
                <x-progress :value="60" :color="$c" class="flex-1" />
            </div>
        @endforeach
    </div>

    {{-- 4. size variants --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">size variants — xs / sm / md / lg (height は tailwind utility で表現、daisyUI 5 に progress-{size} は無い)</p>
    <div class="flex flex-col gap-3 mb-8 max-w-md">
        @foreach($sizes as $s)
            <div class="flex items-center gap-3">
                <span class="text-xs text-base-content/60 w-10 shrink-0">{{ $s }}</span>
                <x-progress :value="60" :size="$s" color="primary" class="flex-1" />
            </div>
        @endforeach
    </div>

    {{-- 5. showLabel --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">showLabel — percent (default) / fraction</p>
    <div class="flex flex-col gap-3 mb-8 max-w-md">
        <x-progress :value="42" color="info" showLabel />
        <x-progress :value="42" color="info" showLabel labelFormat="fraction" />
        <x-progress :value="7" :max="10" color="success" showLabel labelFormat="fraction" />
        <x-progress :value="7" :max="10" color="success" showLabel />
    </div>

    {{-- 6. indeterminate --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">indeterminate — value=null (animated stripe, aria-valuenow 省略)</p>
    <div class="flex flex-col gap-3 mb-8 max-w-md">
        <x-progress :value="null" />
        <x-progress :value="null" color="primary" />
        <x-progress :value="null" color="success" size="lg" />
        <x-progress :value="null" color="error" size="xs" />
    </div>

    {{-- 7. 使い方 --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-8">使い方</p>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim {{-- determinate (value=0-100, max=100) --}}
&lt;x-progress :value="60" /&gt;

{{-- カスタム max --}}
&lt;x-progress :value="7" :max="10" /&gt;

{{-- color (null=neutral grey) --}}
&lt;x-progress :value="60" color="primary" /&gt;
&lt;x-progress :value="60" color="success" /&gt;

{{-- size: xs / sm / md (default) / lg --}}
&lt;x-progress :value="60" size="lg" /&gt;

{{-- ラベル (右上に表示) --}}
&lt;x-progress :value="42" showLabel /&gt;                       {{-- "42%" --}}
&lt;x-progress :value="7" :max="10" showLabel labelFormat="fraction" /&gt;  {{-- "7 / 10" --}}

{{-- indeterminate (進捗不明) — daisyUI が animated stripe を出す --}}
&lt;x-progress :value="null" /&gt;
&lt;x-progress /&gt;  {{-- value 省略でも同じ --}}
@endverbatim</code></pre>
@endsection
