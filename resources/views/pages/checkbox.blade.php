@extends('layouts.playground')

@section('title', '— Checkbox')
@section('heading', 'Checkboxes')
@section('subheading', __('playground.subheading.checkbox'))

@section('content')
    @php
        $colors = ['primary','secondary','accent','neutral','info','success','warning','error'];
    @endphp

    {{-- 1. appearance × color matrix (checked) --}}
    @foreach(['solid','soft','base-100','base-200','base-300'] as $app)
        <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
            @if($app === 'solid')<span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>@endif
            {{ $app }} (checked)
        </p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-compact mb-2">
            @foreach($colors as $c)
                <x-checkbox :appearance="$app" :color="$c" :label="$c" checked />
            @endforeach
        </div>
        <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">{{ $app }} (unchecked)</p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-compact mb-6">
            @foreach($colors as $c)
                <x-checkbox :appearance="$app" :color="$c" :label="$c" />
            @endforeach
        </div>
    @endforeach

    {{-- 2. sizes --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Sizes</p>
    <div class="flex flex-col gap-compact mb-6">
        @foreach(['sm','md','lg'] as $s)
            <x-checkbox :size="$s" :label="'size '.$s" checked />
        @endforeach
    </div>

    {{-- 3. states --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">States</p>
    <div class="flex flex-col gap-compact mb-6">
        <x-checkbox label="未チェック" />
        <x-checkbox label="チェック済み" checked />
        <x-checkbox label="Indeterminate (一部選択)" indeterminate />
    </div>

    {{-- 4. with description --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">With description</p>
    <div class="flex flex-col gap-element mb-6">
        <x-checkbox name="news" label="ニュースレターを受信する" description="月 1〜2 回の頻度。いつでも解除できます。" checked />
        <x-checkbox name="terms" appearance="soft" color="success" label="利用規約に同意する" description="サービスの利用条件、プライバシーポリシーを含みます。" required />
        <x-checkbox name="marketing" appearance="base-100" color="accent" label="マーケティング情報の利用" description="閲覧履歴を分析し関連性の高い案内を表示します。" checked />
    </div>

    {{-- 5. base-200 surface demo --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">On base-200 surface</p>
    <div class="bg-base-200 p-element rounded-[var(--radius-box)] flex flex-col gap-compact mb-6">
        <x-checkbox appearance="base-200" color="primary" label="base-200 appearance on base-200 surface" checked />
        <x-checkbox appearance="base-200" color="success" label="success" />
        <x-checkbox appearance="base-200" color="neutral" label="neutral" indeterminate />
    </div>

    {{-- 6. base-300 surface demo --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">On base-300 surface</p>
    <div class="bg-base-300 p-element rounded-[var(--radius-box)] flex flex-col gap-compact mb-6">
        <x-checkbox appearance="base-300" color="primary" label="base-300 appearance on base-300 surface" checked />
        <x-checkbox appearance="base-300" color="warning" label="warning" />
    </div>

    {{-- 7. error state --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Error state</p>
    <div class="flex flex-col gap-compact mb-6">
        <x-checkbox name="agree" label="同意してください" description="続行するには同意が必要です" error="必須項目です" />
    </div>

    {{-- 8. disabled --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Disabled</p>
    <div class="flex flex-col gap-compact mb-6">
        <x-checkbox label="Disabled (unchecked)" disabled />
        <x-checkbox label="Disabled (checked)" checked disabled />
        <x-checkbox appearance="soft" color="info" label="Disabled (soft + checked)" checked disabled />
        <x-checkbox appearance="base-100" color="primary" label="Disabled (base-100 + checked)" checked disabled />
    </div>

    {{-- 9. group --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Group (multi-select fruits)</p>
    <fieldset class="flex flex-col gap-compact mb-6">
        @foreach(['apple' => 'りんご', 'banana' => 'バナナ', 'cherry' => 'さくらんぼ', 'durian' => 'ドリアン'] as $v => $l)
            <x-checkbox name="fruits[]" :value="$v" :label="$l" />
        @endforeach
    </fieldset>

    {{-- 10. inline group --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Inline group</p>
    <div class="flex flex-wrap gap-x-6 gap-y-2 mb-6">
        @foreach(['公開','下書き','アーカイブ'] as $opt)
            <x-checkbox :label="$opt" />
        @endforeach
    </div>
@endsection
