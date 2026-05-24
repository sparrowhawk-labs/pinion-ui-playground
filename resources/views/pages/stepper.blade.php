@extends('layouts.playground')

@section('title', '— Stepper')
@section('heading', 'Stepper')
@section('subheading', __('playground.subheading.stepper'))

@section('content')
    {{-- DEFAULT --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        horizontal, numbered — sign-up flow の 3 ステップ
    </p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-stepper :items="[
            ['label' => 'Sign up', 'state' => 'done'],
            ['label' => 'Verify email', 'state' => 'current'],
            ['label' => 'Invite team', 'state' => 'upcoming'],
        ]" />
    </div>

    {{-- with descriptions --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">with descriptions — checkout 4 ステップ</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-stepper :items="[
            ['label' => 'Cart',    'desc' => '3 items',    'state' => 'done'],
            ['label' => 'Address', 'desc' => 'Confirmed',  'state' => 'done'],
            ['label' => 'Payment', 'desc' => 'Visa ····',  'state' => 'current'],
            ['label' => 'Confirm', 'desc' => 'Review',     'state' => 'upcoming'],
        ]" />
    </div>

    {{-- vertical --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">vertical — プロジェクトフェーズ</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element max-w-md">
        <x-stepper orientation="vertical" :items="[
            ['label' => '要件定義', 'desc' => 'クライアントヒアリング完了', 'state' => 'done'],
            ['label' => '設計',     'desc' => 'API・データモデル確定',     'state' => 'done'],
            ['label' => '実装',     'desc' => 'コア機能の開発',           'state' => 'current'],
            ['label' => 'リリース', 'desc' => '本番デプロイ',             'state' => 'upcoming'],
        ]" />
    </div>

    {{-- dotted compact --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">variant=dotted — コンパクトな progress 表示 (carousel position 等)</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-stepper variant="dotted" :items="[
            ['state' => 'done'],
            ['state' => 'done'],
            ['state' => 'current'],
            ['state' => 'upcoming'],
            ['state' => 'upcoming'],
        ]" />
    </div>

    {{-- vertical dotted --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">vertical + dotted — 軽量な縦リスト</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element max-w-md">
        <x-stepper orientation="vertical" variant="dotted" :items="[
            ['label' => 'Step 1 — done', 'state' => 'done'],
            ['label' => 'Step 2 — done', 'state' => 'done'],
            ['label' => 'Step 3 — current', 'state' => 'current'],
            ['label' => 'Step 4 — upcoming', 'state' => 'upcoming'],
        ]" />
    </div>

    {{-- all done --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">全 done — 完了状態</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-stepper :items="[
            ['label' => 'Order', 'state' => 'done'],
            ['label' => 'Pay',   'state' => 'done'],
            ['label' => 'Ship',  'state' => 'done'],
            ['label' => 'Done',  'state' => 'done'],
        ]" />
    </div>

    {{-- usage --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-8">使い方</p>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim{{-- 最小 — items 配列で渡す --}}
&lt;x-stepper :items="[
    ['label' =&gt; 'Sign up',     'state' =&gt; 'done'],
    ['label' =&gt; 'Verify email','state' =&gt; 'current'],
    ['label' =&gt; 'Invite team', 'state' =&gt; 'upcoming'],
]" /&gt;

{{-- with descriptions --}}
&lt;x-stepper :items="[
    ['label' =&gt; 'Cart',    'desc' =&gt; '3 items',   'state' =&gt; 'done'],
    ['label' =&gt; 'Payment', 'desc' =&gt; 'Visa ····', 'state' =&gt; 'current'],
]" /&gt;

{{-- orientation: horizontal (default) / vertical --}}
&lt;x-stepper orientation="vertical" :items="[...]" /&gt;

{{-- variant: numbered (default) / dotted (コンパクト) --}}
&lt;x-stepper variant="dotted" :items="[...]" /&gt;
@endverbatim</code></pre>
@endsection
