@extends('layouts.playground')

@section('title', '— Timeline')
@section('heading', 'Timeline')
@section('subheading', 'daisyUI 5 の timeline class を wrap した時系列リスト。items 配列で渡すだけ。orientation (vertical/horizontal)・compact (片側寄せ)・snap (アイコンを上端 snap) の 3 modifier。各 item に state=done|current|upcoming を付けると middle icon と connector の色が変化する。')

@section('content')
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        vertical, no compact — 4 items (商品ステータス 例)
    </p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-timeline :items="[
            ['title' => '注文受付', 'time' => '10/01 09:12', 'desc' => 'ご注文ありがとうございます'],
            ['title' => '入金確認', 'time' => '10/01 10:30', 'desc' => 'クレジットカード決済を確認しました'],
            ['title' => '発送準備', 'time' => '10/02 14:00', 'desc' => '倉庫でピッキング中'],
            ['title' => 'お届け完了', 'time' => '10/03 16:45', 'desc' => 'お客様にお渡しが完了しました'],
        ]" />
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">orientation=horizontal — 横並びの 4 ステップ</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element overflow-x-auto">
        <x-timeline orientation="horizontal" :items="[
            ['title' => 'カート', 'time' => 'Step 1'],
            ['title' => '配送先', 'time' => 'Step 2'],
            ['title' => '支払い', 'time' => 'Step 3'],
            ['title' => '完了', 'time' => 'Step 4'],
        ]" />
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">compact — 全 items を片側に寄せる (片側レイアウト)</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-timeline compact :items="[
            ['title' => '要件定義',   'time' => '2025/06', 'desc' => 'クライアントヒアリング完了'],
            ['title' => '設計',       'time' => '2025/07', 'desc' => 'API・データモデル確定'],
            ['title' => '実装',       'time' => '2025/08', 'desc' => 'コア機能の開発'],
            ['title' => 'リリース',   'time' => '2025/09', 'desc' => '本番デプロイ'],
        ]" />
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">snap — middle icon を上端に snap (時刻に高低差があっても揃う)</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-timeline snap :items="[
            ['title' => 'リサーチ', 'time' => 'Week 1', 'desc' => '市場調査・競合分析・ユーザーインタビュー (合計 12 件)'],
            ['title' => 'プロトタイプ', 'time' => 'Week 2', 'desc' => 'Figma で MVP UI'],
            ['title' => 'ユーザーテスト', 'time' => 'Week 3', 'desc' => '5 名のターゲットユーザーに対する usability test と改善ループ。フィードバックを元に IA を再設計。'],
            ['title' => '本実装', 'time' => 'Week 4', 'desc' => 'TypeScript + React で実装開始'],
        ]" />
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">with state — done / current / upcoming で middle icon と connector の色が変化</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-timeline :items="[
            ['title' => '注文受付',   'time' => '10/01 09:12', 'desc' => '完了済み', 'state' => 'done'],
            ['title' => '入金確認',   'time' => '10/01 10:30', 'desc' => '完了済み', 'state' => 'done'],
            ['title' => '発送準備',   'time' => '10/02',       'desc' => '現在ここ', 'state' => 'current'],
            ['title' => 'お届け',     'time' => '10/03 予定',   'desc' => '未着手',   'state' => 'upcoming'],
            ['title' => '受領確認',   'time' => '10/04 予定',   'desc' => '未着手',   'state' => 'upcoming'],
        ]" />
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-8">使い方</p>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim{{-- items 配列で渡す (vertical がデフォルト) --}}
&lt;x-timeline :items="[
    ['title' =&gt; '注文受付', 'time' =&gt; '10/01 09:12', 'desc' =&gt; 'ありがとうございます'],
    ['title' =&gt; '入金確認', 'time' =&gt; '10/01 10:30'],
    ['title' =&gt; '発送準備', 'time' =&gt; '10/02 14:00'],
    ['title' =&gt; 'お届け完了', 'time' =&gt; '10/03 16:45'],
]" /&gt;

{{-- orientation: vertical (default) / horizontal --}}
&lt;x-timeline orientation="horizontal" :items="[...]" /&gt;

{{-- compact: 全 items を片側に寄せる --}}
&lt;x-timeline compact :items="[...]" /&gt;

{{-- snap: middle icon を上端 snap --}}
&lt;x-timeline snap :items="[...]" /&gt;

{{-- state per item: done / current / upcoming で icon・connector の色変化 --}}
&lt;x-timeline :items="[
    ['title' =&gt; 'Step 1', 'state' =&gt; 'done'],
    ['title' =&gt; 'Step 2', 'state' =&gt; 'current'],
    ['title' =&gt; 'Step 3', 'state' =&gt; 'upcoming'],
]" /&gt;
@endverbatim</code></pre>
@endsection
