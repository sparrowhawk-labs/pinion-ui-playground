@extends('layouts.playground')

@section('title', '— Tabs')
@section('heading', 'Tabs')
@section('subheading', __('playground.subheading.tabs'))

@section('content')
    {{-- DEFAULT --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        underline / md
    </p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-tabs>
            <x-tab name="overview" label="概要">
                <p class="text-sm">製品の全体像です。タブで切り替えて詳細を確認できます。</p>
            </x-tab>
            <x-tab name="specs" label="仕様">
                <p class="text-sm">サイズ・重量・対応 OS などの技術情報。</p>
            </x-tab>
            <x-tab name="reviews" label="レビュー">
                <p class="text-sm">★★★★☆ 良い感触です（仮テキスト）。</p>
            </x-tab>
        </x-tabs>
    </div>

    {{-- variant: boxed --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">variant = boxed (active = filled primary chip)</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-tabs variant="boxed">
            <x-tab name="a" label="Account">
                <p class="text-sm">アカウント設定パネル。</p>
            </x-tab>
            <x-tab name="b" label="Security">
                <p class="text-sm">セキュリティ設定パネル。</p>
            </x-tab>
            <x-tab name="c" label="Billing">
                <p class="text-sm">請求設定パネル。</p>
            </x-tab>
        </x-tabs>
    </div>

    {{-- variant: pill --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">variant = pill (subtle base-200 chip)</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-tabs variant="pill">
            <x-tab name="all" label="All">
                <p class="text-sm">すべての項目。</p>
            </x-tab>
            <x-tab name="active" label="Active">
                <p class="text-sm">アクティブな項目のみ。</p>
            </x-tab>
            <x-tab name="done" label="Done">
                <p class="text-sm">完了済みの項目のみ。</p>
            </x-tab>
        </x-tabs>
    </div>

    {{-- sizes --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">sizes — sm / md / lg (underline)</p>
    @foreach(['sm','md','lg'] as $s)
        <div class="mb-4 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
            <p class="text-[10px] text-base-content/40 mb-2">size = {{ $s }}</p>
            <x-tabs :size="$s">
                <x-tab name="one" label="One"><p class="text-sm">One panel.</p></x-tab>
                <x-tab name="two" label="Two"><p class="text-sm">Two panel.</p></x-tab>
                <x-tab name="three" label="Three"><p class="text-sm">Three panel.</p></x-tab>
            </x-tabs>
        </div>
    @endforeach

    {{-- default prop --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">default = "specs" — 初期 active タブを指定</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-tabs default="specs">
            <x-tab name="overview" label="概要"><p class="text-sm">概要 (default ではない)</p></x-tab>
            <x-tab name="specs" label="仕様"><p class="text-sm">仕様 (初期表示)</p></x-tab>
            <x-tab name="reviews" label="レビュー"><p class="text-sm">レビュー</p></x-tab>
        </x-tabs>
    </div>

    {{-- with icons --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">tab に icon を付ける — icon prop に HTML / pinion-icons 等のレンダリング済 markup を渡す</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        @php
            $svg = fn ($d) => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-4 h-4">'.$d.'</svg>';
            $homeIcon     = $svg('<path d="M3 11l9-7 9 7M5 10v10h14V10" stroke-linejoin="round" stroke-linecap="round"/>');
            $settingsIcon = $svg('<circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.7 1.7 0 0 0 .34 1.87l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.7 1.7 0 0 0-1.87-.34 1.7 1.7 0 0 0-1.03 1.56V21a2 2 0 1 1-4 0v-.08a1.7 1.7 0 0 0-1.11-1.56 1.7 1.7 0 0 0-1.87.34l-.06.06A2 2 0 1 1 4.13 16.93l.06-.06A1.7 1.7 0 0 0 4.53 15a1.7 1.7 0 0 0-1.56-1.03H3a2 2 0 1 1 0-4h.08A1.7 1.7 0 0 0 4.63 8.86a1.7 1.7 0 0 0-.34-1.87l-.06-.06A2 2 0 1 1 7.06 4.1l.06.06A1.7 1.7 0 0 0 9 4.5 1.7 1.7 0 0 0 10.02 2.94V3a2 2 0 1 1 4 0v.08A1.7 1.7 0 0 0 15.14 4.63a1.7 1.7 0 0 0 1.87-.34l.06-.06A2 2 0 1 1 19.9 7.06l-.06.06A1.7 1.7 0 0 0 19.5 9a1.7 1.7 0 0 0 1.56 1.03H21a2 2 0 1 1 0 4h-.08a1.7 1.7 0 0 0-1.52 1z" stroke-linejoin="round" stroke-linecap="round"/>');
            $profileIcon  = $svg('<circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 4-7 8-7s8 3 8 7" stroke-linejoin="round" stroke-linecap="round"/>');
        @endphp
        <x-tabs variant="boxed">
            <x-tab name="home" label="Home" :icon="$homeIcon">
                <p class="text-sm">Home パネル。</p>
            </x-tab>
            <x-tab name="settings" label="Settings" :icon="$settingsIcon">
                <p class="text-sm">Settings パネル。</p>
            </x-tab>
            <x-tab name="profile" label="Profile" :icon="$profileIcon">
                <p class="text-sm">Profile パネル。</p>
            </x-tab>
        </x-tabs>
    </div>

    {{-- many tabs --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">多数のタブ — 横方向は flex-wrap で改行する</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-tabs variant="pill" size="sm">
            <x-tab name="t1" label="Inbox"><p class="text-sm">Inbox</p></x-tab>
            <x-tab name="t2" label="Drafts"><p class="text-sm">Drafts</p></x-tab>
            <x-tab name="t3" label="Sent"><p class="text-sm">Sent</p></x-tab>
            <x-tab name="t4" label="Spam"><p class="text-sm">Spam</p></x-tab>
            <x-tab name="t5" label="Trash"><p class="text-sm">Trash</p></x-tab>
            <x-tab name="t6" label="Archive"><p class="text-sm">Archive</p></x-tab>
            <x-tab name="t7" label="Important"><p class="text-sm">Important</p></x-tab>
        </x-tabs>
    </div>

    {{-- usage --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-8">使い方</p>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim{{-- 1. 最小構成 — &lt;x-tabs&gt; の中に &lt;x-tab&gt; を並べる。name は activeTab の値、label がボタン文言、slot がパネル内容 --}}
&lt;x-tabs&gt;
    &lt;x-tab name="overview" label="概要"&gt;&lt;p&gt;概要&lt;/p&gt;&lt;/x-tab&gt;
    &lt;x-tab name="specs"    label="仕様"&gt;&lt;p&gt;仕様&lt;/p&gt;&lt;/x-tab&gt;
&lt;/x-tabs&gt;

{{-- 2. variant / size / default を指定 --}}
&lt;x-tabs variant="boxed" size="lg" default="specs"&gt;
    &lt;x-tab name="overview" label="概要"&gt;…&lt;/x-tab&gt;
    &lt;x-tab name="specs"    label="仕様"&gt;…&lt;/x-tab&gt;
&lt;/x-tabs&gt;

{{-- 3. icon 付き — icon prop に &lt;x-i&gt; 等のレンダリング済 HTML を渡す --}}
&lt;x-tabs&gt;
    &lt;x-tab name="home" label="Home" :icon="view('components.i', ['type'=&gt;'home-2','class'=&gt;'w-4 h-4'])-&gt;render()"&gt;
        &lt;p&gt;Home&lt;/p&gt;
    &lt;/x-tab&gt;
&lt;/x-tabs&gt;
@endverbatim</code></pre>
@endsection
