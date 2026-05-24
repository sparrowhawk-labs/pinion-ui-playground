@extends('layouts.playground')

@section('title', '— Dropdown')
@section('heading', 'Dropdown')
@section('subheading', __('playground.subheading.dropdown'))

@section('content')
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        position=bottom-end / size=md / width=w-52 / label="メニュー"
    </p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="flex items-center gap-4 pb-40">
            <x-dropdown label="メニュー">
                <a href="#" class="block px-4 py-2 text-sm hover:bg-base-200 text-base-content">プロフィール</a>
                <a href="#" class="block px-4 py-2 text-sm hover:bg-base-200 text-base-content">設定</a>
                <hr class="my-1 border-base-300">
                <a href="#" class="block px-4 py-2 text-sm hover:bg-base-200 text-error">ログアウト</a>
            </x-dropdown>
            <span class="text-sm text-base-content/60">↑ クリックで開閉、外側クリック / Esc で閉じる</span>
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">positions — bottom-end / bottom-start / top-end / top-start</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 px-element py-12">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <x-dropdown label="bottom-end" position="bottom-end">
                <a href="#" class="block px-4 py-2 text-sm hover:bg-base-200 text-base-content">右下に開く</a>
                <a href="#" class="block px-4 py-2 text-sm hover:bg-base-200 text-base-content">項目 2</a>
            </x-dropdown>
            <x-dropdown label="bottom-start" position="bottom-start">
                <a href="#" class="block px-4 py-2 text-sm hover:bg-base-200 text-base-content">左下に開く</a>
                <a href="#" class="block px-4 py-2 text-sm hover:bg-base-200 text-base-content">項目 2</a>
            </x-dropdown>
            <x-dropdown label="top-end" position="top-end">
                <a href="#" class="block px-4 py-2 text-sm hover:bg-base-200 text-base-content">右上に開く</a>
                <a href="#" class="block px-4 py-2 text-sm hover:bg-base-200 text-base-content">項目 2</a>
            </x-dropdown>
            <x-dropdown label="top-start" position="top-start">
                <a href="#" class="block px-4 py-2 text-sm hover:bg-base-200 text-base-content">左上に開く</a>
                <a href="#" class="block px-4 py-2 text-sm hover:bg-base-200 text-base-content">項目 2</a>
            </x-dropdown>
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">sizes — sm / md / lg</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="flex flex-wrap items-start gap-6 pb-40">
            <x-dropdown label="sm" size="sm">
                <a href="#" class="block px-3 py-1.5 text-xs hover:bg-base-200 text-base-content">小さい項目 1</a>
                <a href="#" class="block px-3 py-1.5 text-xs hover:bg-base-200 text-base-content">小さい項目 2</a>
            </x-dropdown>
            <x-dropdown label="md (default)" size="md">
                <a href="#" class="block px-4 py-2 text-sm hover:bg-base-200 text-base-content">標準項目 1</a>
                <a href="#" class="block px-4 py-2 text-sm hover:bg-base-200 text-base-content">標準項目 2</a>
            </x-dropdown>
            <x-dropdown label="lg" size="lg">
                <a href="#" class="block px-5 py-2.5 text-base hover:bg-base-200 text-base-content">大きい項目 1</a>
                <a href="#" class="block px-5 py-2.5 text-base hover:bg-base-200 text-base-content">大きい項目 2</a>
            </x-dropdown>
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">widths — w-40 / w-52 (default) / w-72 / w-96</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="flex flex-wrap items-start gap-6 pb-40">
            <x-dropdown label="w-40" width="w-40">
                <a href="#" class="block px-4 py-2 text-sm hover:bg-base-200 text-base-content">狭め</a>
            </x-dropdown>
            <x-dropdown label="w-52" width="w-52">
                <a href="#" class="block px-4 py-2 text-sm hover:bg-base-200 text-base-content">標準幅</a>
            </x-dropdown>
            <x-dropdown label="w-72" width="w-72">
                <a href="#" class="block px-4 py-2 text-sm hover:bg-base-200 text-base-content">少し広め</a>
            </x-dropdown>
            <x-dropdown label="w-96" width="w-96">
                <a href="#" class="block px-4 py-2 text-sm hover:bg-base-200 text-base-content">かなり広め — 長い説明文を入れたい時に便利</a>
            </x-dropdown>
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">custom trigger — slot=trigger でアイコン / アバター等に差し替え</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="flex flex-wrap items-center gap-6 pb-40">
            <x-dropdown>
                <x-slot:trigger>
                    <button class="inline-flex items-center gap-2 px-3 py-2 rounded-[var(--radius-field)] bg-primary text-primary-content text-sm font-medium">
                        <x-i type="hamburger-menu" variant="linear" class="w-4 h-4" />
                        操作
                    </button>
                </x-slot:trigger>
                <a href="#" class="block px-4 py-2 text-sm hover:bg-base-200 text-base-content">編集</a>
                <a href="#" class="block px-4 py-2 text-sm hover:bg-base-200 text-base-content">複製</a>
                <a href="#" class="block px-4 py-2 text-sm hover:bg-base-200 text-error">削除</a>
            </x-dropdown>

            <x-dropdown position="bottom-start">
                <x-slot:trigger>
                    <div class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-base-300 text-base-content font-semibold cursor-pointer">YT</div>
                </x-slot:trigger>
                <div class="px-4 py-2 border-b border-base-300">
                    <div class="text-sm font-medium text-base-content">Yamada Taro</div>
                    <div class="text-xs text-base-content/60">taro@example.com</div>
                </div>
                <a href="#" class="block px-4 py-2 text-sm hover:bg-base-200 text-base-content">プロフィール</a>
                <a href="#" class="block px-4 py-2 text-sm hover:bg-base-200 text-base-content">アカウント設定</a>
                <hr class="my-1 border-base-300">
                <a href="#" class="block px-4 py-2 text-sm hover:bg-base-200 text-error">ログアウト</a>
            </x-dropdown>
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-8">使い方</p>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim {{-- 1. 最小: label でボタン化 --}}
&lt;x-dropdown label="メニュー"&gt;
    &lt;a href="#" class="block px-4 py-2 text-sm hover:bg-base-200"&gt;プロフィール&lt;/a&gt;
    &lt;a href="#" class="block px-4 py-2 text-sm hover:bg-base-200"&gt;ログアウト&lt;/a&gt;
&lt;/x-dropdown&gt;

{{-- 2. 位置・サイズ・幅を変える --}}
&lt;x-dropdown label="設定" position="top-start" size="sm" width="w-64"&gt;
    ...
&lt;/x-dropdown&gt;

{{-- 3. trigger を自前で組む (アバター・アイコンボタン等) --}}
&lt;x-dropdown position="bottom-start"&gt;
    &lt;x-slot:trigger&gt;
        &lt;img src="/avatar.png" class="w-10 h-10 rounded-full cursor-pointer"&gt;
    &lt;/x-slot:trigger&gt;
    &lt;a href="#" class="block px-4 py-2"&gt;プロフィール&lt;/a&gt;
&lt;/x-dropdown&gt;
@endverbatim</code></pre>
@endsection
