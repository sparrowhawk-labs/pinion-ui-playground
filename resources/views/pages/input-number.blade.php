@extends('layouts.playground')

@section('title', '— Input Number')
@section('heading', 'Input Number')
@section('subheading', __('playground.subheading.input-number'))

@section('content')
    {{-- DEFAULT --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        size=md, value=1, min=1 — カートの quantity selector
    </p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-input-number name="quantity" label="Quantity" :value="1" :min="1" />
    </div>

    {{-- bounded --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">bounded — min=1, max=8, step=1 (8 を超えると + が disable される)</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-input-number name="seats" label="Number of seats" :value="2" :min="1" :max="8" hint="1〜8 まで" />
    </div>

    {{-- decimal step --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">decimal step — value=3.5, step=0.5 (0.5 刻み)</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-input-number name="score" label="Score" :value="3.5" :min="0" :max="5" :step="0.5" width="w-40" />
    </div>

    {{-- size variants --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">size variants — xs / sm / md (default) / lg</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element space-y-3">
        @foreach (['xs', 'sm', 'md', 'lg'] as $sz)
            <div class="flex items-center gap-3">
                <span class="text-xs font-mono text-base-content/60 w-12">{{ $sz }}</span>
                <x-input-number :size="$sz" :value="3" :min="0" :max="10" />
            </div>
        @endforeach
    </div>

    {{-- error state --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">error state — label/hint が text-error に</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-input-number name="qty" label="Quantity" :value="0" :min="1" error="At least 1 required" />
    </div>

    {{-- disabled state --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">disabled — input/buttons 全部 disable</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-input-number label="Read only" :value="42" disabled hint="この設定は管理者のみ変更可能" />
    </div>

    {{-- wide --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">width override — width="w-full" でフル幅</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element max-w-md">
        <x-input-number name="price" label="Custom price (¥)" :value="100" :min="0" :step="100" width="w-full" />
    </div>

    {{-- compact (no chrome) --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">no label / no chrome — 単体で table cell 等に</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="flex items-center gap-4">
            <x-input-number :value="1" :min="0" :max="99" />
            <x-input-number :value="5" :min="0" :max="99" size="sm" />
            <x-input-number :value="10" :min="0" :max="99" size="xs" />
        </div>
    </div>

    {{-- usage --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-8">使い方</p>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim{{-- 最小 — name + label + min/value --}}
&lt;x-input-number name="quantity" label="Quantity" :value="1" :min="1" /&gt;

{{-- bounded with step --}}
&lt;x-input-number
    name="seats" label="Seats"
    :value="2" :min="1" :max="8" :step="1"
    hint="1〜8 まで" /&gt;

{{-- decimal step --}}
&lt;x-input-number :value="3.5" :min="0" :max="5" :step="0.5" /&gt;

{{-- size: xs / sm / md (default) / lg --}}
&lt;x-input-number size="sm" :value="1" /&gt;

{{-- width override (default は max-w-[10rem] でキャップ) --}}
&lt;x-input-number width="w-full" :value="1" /&gt;

{{-- error state --}}
&lt;x-input-number label="Qty" :value="0" :min="1" error="At least 1 required" /&gt;

{{-- Livewire model --}}
&lt;x-input-number name="qty" wire:model.live="qty" :value="$qty" :min="0" :max="99" /&gt;
@endverbatim</code></pre>
@endsection
