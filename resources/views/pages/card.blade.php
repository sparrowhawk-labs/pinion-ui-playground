@extends('layouts.playground')

@section('title', '— Card')
@section('heading', 'Cards')
@section('subheading', __('playground.subheading.card'))

@section('content')
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Default / Elevated / Filled / Ghost</p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-element mb-8">
        <x-card appearance="default">
            <x-slot:header><h3 class="font-bold">Default</h3></x-slot:header>
            <p class="text-sm text-base-content/70">base-100 + base-content/10 border。</p>
        </x-card>
        <x-card appearance="elevated">
            <x-slot:header><h3 class="font-bold">Elevated</h3></x-slot:header>
            <p class="text-sm text-base-content/70">shadow で浮き上がる。</p>
        </x-card>
        <x-card appearance="filled">
            <x-slot:header><h3 class="font-bold">Filled</h3></x-slot:header>
            <p class="text-sm text-base-content/70">base-200 背景、border なし。</p>
        </x-card>
        <x-card appearance="ghost">
            <x-slot:header><h3 class="font-bold">Ghost</h3></x-slot:header>
            <p class="text-sm text-base-content/70">完全に透明。</p>
        </x-card>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Base-100 × color</p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-element mb-8">
        @foreach(['primary','accent','success','warning'] as $c)
            <x-card appearance="base-100" :color="$c">
                <x-slot:header><h3 class="font-bold capitalize">{{ $c }}</h3></x-slot:header>
                <p class="text-sm opacity-80">primary surface に colored title。</p>
            </x-card>
        @endforeach
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Base-200 × color (on base-200 surface)</p>
    <div class="bg-base-200 p-element rounded-[var(--radius-box)] grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-element mb-8">
        @foreach(['primary','info','success','error'] as $c)
            <x-card appearance="base-200" :color="$c">
                <x-slot:header><h3 class="font-bold capitalize">{{ $c }}</h3></x-slot:header>
                <p class="text-sm opacity-80">surface 上で違和感なく溶け込む。</p>
            </x-card>
        @endforeach
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Base-300 × color (on base-300 surface)</p>
    <div class="bg-base-300 p-element rounded-[var(--radius-box)] grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-element mb-8">
        @foreach(['primary','accent','warning','neutral'] as $c)
            <x-card appearance="base-300" :color="$c">
                <x-slot:header><h3 class="font-bold capitalize">{{ $c }}</h3></x-slot:header>
                <p class="text-sm opacity-80">tertiary surface (sidebar 等) に最適。</p>
            </x-card>
        @endforeach
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Outline × color</p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-element mb-8">
        @foreach(['primary','success','warning','error'] as $c)
            <x-card appearance="outline" :color="$c">
                <x-slot:header><h3 class="font-bold capitalize">{{ $c }}</h3></x-slot:header>
                <p class="text-sm text-base-content/70">outline カラーを {{ $c }} に。</p>
            </x-card>
        @endforeach
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Soft × color</p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-element mb-8">
        @foreach(['primary','info','success','warning'] as $c)
            <x-card appearance="soft" :color="$c">
                <x-slot:header><h3 class="font-bold capitalize">{{ $c }} soft</h3></x-slot:header>
                <p class="text-sm opacity-80">tinted background + colored text.</p>
            </x-card>
        @endforeach
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Solid / Bordered-top</p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-element mb-8">
        <x-card appearance="solid" color="primary">
            <h3 class="font-bold">Solid Primary</h3>
            <p class="text-sm opacity-80 mt-1">CTA 用の強調カード。</p>
        </x-card>
        <x-card appearance="solid" color="neutral">
            <h3 class="font-bold">Solid Neutral</h3>
            <p class="text-sm opacity-80 mt-1">ダーク系の強調。</p>
        </x-card>
        <x-card appearance="bordered-top" color="info">
            <x-slot:header><h3 class="font-bold">Bordered-top Info</h3></x-slot:header>
            <p class="text-sm text-base-content/70">上部アクセントバー。</p>
        </x-card>
        <x-card appearance="bordered-top" color="success">
            <x-slot:header><h3 class="font-bold">Bordered-top Success</h3></x-slot:header>
            <p class="text-sm text-base-content/70">Preline 風の上線。</p>
        </x-card>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">No divider (divider=false)</p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-element mb-8">
        <x-card :divider="false">
            <x-slot:header><h3 class="font-bold">Default + no divider</h3></x-slot:header>
            <p class="text-sm text-base-content/70">区切り線を非表示。視覚階層のみで構成。</p>
            <x-slot:footer>
                <span class="text-xs text-base-content/60">footer text</span>
            </x-slot:footer>
        </x-card>
        <x-card appearance="elevated" :divider="false">
            <x-slot:header><h3 class="font-bold">Elevated + no divider</h3></x-slot:header>
            <p class="text-sm text-base-content/70">shadow だけで浮かせ、内部は line なし。</p>
        </x-card>
        <x-card appearance="base-100" color="info" :divider="false">
            <x-slot:header><h3 class="font-bold">Base-100 + no divider</h3></x-slot:header>
            <p class="text-sm opacity-80">colored title + divider なし。</p>
        </x-card>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Hoverable / with footer</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-element">
        <x-card appearance="elevated" hoverable>
            <x-slot:header>
                <div class="flex items-center gap-2">
                    <x-avatar initials="XY" color="primary" appearance="solid" size="sm" />
                    <div>
                        <h3 class="font-bold">pinion-ui</h3>
                        <p class="text-xs text-base-content/60">Laravel Blade UI kit</p>
                    </div>
                </div>
            </x-slot:header>
            <p class="text-sm text-base-content/70">theme × tune の直交 2 軸で無限の見た目を表現。</p>
            <x-slot:footer>
                <div class="flex items-center justify-between">
                    <x-badge color="success" appearance="dot">active</x-badge>
                    <x-button size="sm" appearance="soft">詳細</x-button>
                </div>
            </x-slot:footer>
        </x-card>
        <x-card appearance="base-100" color="primary" hoverable>
            <x-slot:header><h3 class="font-bold">Pro プラン</h3></x-slot:header>
            <p class="text-3xl font-bold">¥2,980<span class="text-sm text-base-content/60 font-normal">/月</span></p>
            <ul class="mt-4 space-y-1 text-sm text-base-content/70">
                <li>• 無制限コンポーネント</li>
                <li>• 優先サポート</li>
                <li>• カスタム tune</li>
            </ul>
            <x-slot:footer>
                <x-button color="primary" class="w-full">今すぐ開始</x-button>
            </x-slot:footer>
        </x-card>
    </div>
@endsection
