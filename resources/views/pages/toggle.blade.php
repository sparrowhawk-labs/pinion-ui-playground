@extends('layouts.playground')

@section('title', '— Toggle')
@section('heading', 'Toggles')
@section('subheading', __('playground.subheading.toggle'))

@section('content')
    @php
        $colors = ['primary','secondary','accent','neutral','info','success','warning','error'];
    @endphp

    {{-- 1. appearance × color matrix --}}
    @foreach(['solid','soft'] as $app)
        <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
            @if($app === 'solid')<span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>@endif
            {{ $app }} (checked)
        </p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-compact mb-2">
            @foreach($colors as $c)
                <x-toggle :appearance="$app" :color="$c" :label="$c" checked />
            @endforeach
        </div>
        <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">{{ $app }} (unchecked)</p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-compact mb-6">
            @foreach($colors as $c)
                <x-toggle :appearance="$app" :color="$c" :label="$c" />
            @endforeach
        </div>
    @endforeach

    {{-- 2. sizes --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Sizes</p>
    <div class="flex flex-col gap-compact mb-6">
        @foreach(['sm','md','lg'] as $s)
            <x-toggle :size="$s" :label="'size '.$s" checked />
        @endforeach
    </div>

    {{-- 3. with state label (ON / OFF text on the rail) --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">With state label (solid only, md / lg)</p>
    <div class="flex flex-col gap-compact mb-6">
        <x-toggle label="Default size, ON by default" stateLabel checked />
        <x-toggle label="Default size, OFF by default" stateLabel />
        <x-toggle size="lg" color="success" label="Large success, with state label" stateLabel checked />
        <x-toggle size="sm" label="Small — silently ignored (track too narrow)" stateLabel checked />
        <x-toggle appearance="soft" color="warning" label="Soft warning — silently ignored (insufficient contrast)" stateLabel checked />
    </div>

    {{-- 4. with description --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">With description</p>
    <div class="flex flex-col gap-element mb-6">
        <x-toggle name="notify" label="プッシュ通知を受け取る" description="iOS / Android / Web 全てに即時配信されます。" checked />
        <x-toggle name="autosave" appearance="soft" color="success" label="自動保存" description="30 秒ごとに下書きを保存します。" checked />
        <x-toggle name="beta" appearance="soft" color="accent" label="β機能を有効化" description="安定版より早く新機能を試せます。挙動は予告なく変更されることがあります。" />
    </div>

    {{-- 5. error state --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Error state</p>
    <div class="flex flex-col gap-compact mb-6">
        <x-toggle name="agree" label="同意する" description="続行するには同意が必要です" error="必須項目です" />
    </div>

    {{-- 6. disabled --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Disabled</p>
    <div class="flex flex-col gap-compact mb-6">
        <x-toggle label="Disabled (off)" disabled />
        <x-toggle label="Disabled (on)" checked disabled />
        <x-toggle appearance="soft" color="info" label="Disabled (soft + on)" checked disabled />
    </div>
@endsection
