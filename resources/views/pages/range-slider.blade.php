@extends('layouts.playground')

@section('title', '— Range Slider')
@section('heading', 'Range Slider')
@section('subheading', __('playground.subheading.range-slider'))

@section('content')
    {{-- DEFAULT --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        color=primary, size=md, min=0, max=100 — label + showValue で値をライブ表示
    </p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element max-w-md">
        <x-range-slider name="volume" label="Volume" :value="40" showValue />
    </div>

    {{-- color variants --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">color variants — 8 colors</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-5 max-w-3xl">
            @foreach (['primary', 'secondary', 'accent', 'neutral', 'info', 'success', 'warning', 'error'] as $col)
                <x-range-slider :color="$col" :label="ucfirst($col)" :value="50" showValue />
            @endforeach
        </div>
    </div>

    {{-- size variants --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">size variants — xs / sm / md (default) / lg / xl</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="space-y-4 max-w-md">
            @foreach (['xs', 'sm', 'md', 'lg', 'xl'] as $sz)
                <x-range-slider :size="$sz" :label="$sz === 'md' ? 'md (default)' : $sz" :value="60" showValue />
            @endforeach
        </div>
    </div>

    {{-- min/max/step + value display --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">min / max / step — 0-1000、step=50 で価格上限スライダ</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element max-w-md">
        <x-range-slider name="price-cap" label="Max price (¥)" :min="0" :max="1000" :step="50" :value="500" showValue hint="50円刻みで上限を設定" />
    </div>

    {{-- error state --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">error state — label/hint が text-error に切替</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element max-w-md">
        <x-range-slider name="risk" label="Risk tolerance" :min="0" :max="100" :value="95" error="Maximum 80 まで設定可能です" />
    </div>

    {{-- disabled state --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">disabled — 操作不能</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element max-w-md">
        <x-range-slider label="Read only" :value="35" hint="この設定は管理者のみ変更可能" disabled />
    </div>

    {{-- no label, no chrome --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">no label / no chrome — 純粋なスライダー</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element max-w-md">
        <x-range-slider :value="70" />
    </div>

    {{-- usage --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-8">使い方</p>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim{{-- 最小 — name + label --}}
&lt;x-range-slider name="volume" label="Volume" /&gt;

{{-- 値をライブ表示 (Alpine 駆動) --}}
&lt;x-range-slider name="volume" label="Volume" :value="40" showValue /&gt;

{{-- min / max / step --}}
&lt;x-range-slider name="price" label="Max" :min="0" :max="1000" :step="50" :value="500" showValue /&gt;

{{-- color: primary (default) / secondary / accent / neutral / info / success / warning / error --}}
&lt;x-range-slider color="success" label="Quality" :value="80" showValue /&gt;

{{-- size: xs / sm / md (default) / lg / xl --}}
&lt;x-range-slider size="lg" label="Large" :value="60" /&gt;

{{-- error state — label/hint が text-error に --}}
&lt;x-range-slider label="Risk" :value="95" error="Maximum 80 まで" /&gt;

{{-- Livewire model — wire:* は input に forwarding --}}
&lt;x-range-slider name="zoom" wire:model.live="zoom" :min="50" :max="200" :value="$zoom" showValue /&gt;
@endverbatim</code></pre>
@endsection
