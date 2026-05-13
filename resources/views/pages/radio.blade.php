@extends('layouts.playground')

@section('title', '— Radio')
@section('heading', 'Radios')
@section('subheading', 'fake-radio (peer + sr-only) — color × appearance (solid / soft / base-100 / base-200 / base-300) × size, with radio-group')

@section('content')
    @php
        $colors = ['primary','secondary','accent','neutral','info','success','warning','error'];
    @endphp

    {{-- 1. appearance × color matrix (each cell is its own group so all 8 can demo as checked) --}}
    @foreach(['solid','soft','base-100','base-200','base-300'] as $app)
        <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
            @if($app === 'solid')<span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>@endif
            {{ $app }} (checked)
        </p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-compact mb-2">
            @foreach($colors as $c)
                <x-radio :appearance="$app" :color="$c" :label="$c" :name="'radio_'.$app.'_'.$c.'_chk'" value="1" checked />
            @endforeach
        </div>
        <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">{{ $app }} (unchecked)</p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-compact mb-6">
            @foreach($colors as $c)
                <x-radio :appearance="$app" :color="$c" :label="$c" :name="'radio_'.$app.'_'.$c.'_un'" value="1" />
            @endforeach
        </div>
    @endforeach

    {{-- 2. sizes --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Sizes</p>
    <div class="flex flex-col gap-compact mb-6">
        @foreach(['sm','md','lg'] as $s)
            <x-radio :size="$s" :label="'size '.$s" name="radio_sizes" :value="$s" :checked="$s === 'md'" />
        @endforeach
    </div>

    {{-- 3. radio-group with options array --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Radio group (options array)</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-element mb-6">
        <x-radio-group
            name="os"
            label="OS を選択"
            value="mac"
            :options="['mac' => 'Mac', 'windows' => 'Windows', 'linux' => 'Linux']"
        />
        <x-radio-group
            name="plan"
            label="プラン"
            description="後から変更できます"
            value="pro"
            color="success"
            appearance="base-100"
            :options="['free' => 'Free', 'pro' => 'Pro', 'enterprise' => 'Enterprise']"
        />
    </div>

    {{-- 4. radio-group with slot composition --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Radio group (slot composition with description)</p>
    <x-radio-group name="notify" label="通知設定" required>
        <x-radio name="notify" value="all" label="すべて受信する" description="新着・返信・お知らせを全て通知します" checked />
        <x-radio name="notify" value="mention" label="メンションのみ" description="自分宛の通知のみ受け取ります" />
        <x-radio name="notify" value="none" label="受信しない" description="サイト内に来た時だけ確認します" />
    </x-radio-group>

    {{-- 5. horizontal orientation --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">Horizontal orientation</p>
    <x-radio-group
        name="fruit"
        label="好きなフルーツ"
        orientation="horizontal"
        value="apple"
        :options="['apple' => 'りんご', 'banana' => 'バナナ', 'cherry' => 'さくらんぼ']"
    />

    {{-- 6. error / disabled --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">Error / Disabled</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-element mb-6">
        <x-radio-group
            name="confirm"
            label="同意"
            error="いずれかを選択してください"
            :options="['yes' => 'はい', 'no' => 'いいえ']"
        />
        <x-radio-group
            name="lock"
            label="Disabled group"
            value="b"
            disabled
            :options="['a' => 'A', 'b' => 'B (selected)', 'c' => 'C']"
        />
    </div>

    {{-- 7. surface match --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">On base-200 surface</p>
    <div class="bg-base-200 p-element rounded-[var(--radius-box)] mb-6">
        <x-radio-group
            name="theme_surface"
            label="テーマ"
            appearance="base-200"
            value="auto"
            :options="['light' => 'Light', 'dark' => 'Dark', 'auto' => 'Auto']"
        />
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">On base-300 surface</p>
    <div class="bg-base-300 p-element rounded-[var(--radius-box)] mb-6">
        <x-radio-group
            name="density_surface"
            label="密度"
            appearance="base-300"
            value="comfortable"
            color="warning"
            :options="['compact' => 'Compact', 'comfortable' => 'Comfortable', 'spacious' => 'Spacious']"
        />
    </div>
@endsection
