@extends('layouts.playground')

@section('title', '— Tabs')
@section('heading', 'Tabs')
@section('subheading', 'タブ式コンテンツ切替。tabs は連想配列で渡す (key => [label, content, icon?])。variant: underline (default) / boxed / pill、size: sm / md / lg。default で初期 active な key を指定 (省略時は最初の key)。Alpine の x-data でクライアント側の active 状態を保持。')

@section('content')
    {{-- DEFAULT --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        underline / md
    </p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-tabs :tabs="[
            'overview' => ['label' => '概要', 'content' => '<p class=\'text-sm\'>製品の全体像です。タブで切り替えて詳細を確認できます。</p>'],
            'specs'    => ['label' => '仕様', 'content' => '<p class=\'text-sm\'>サイズ・重量・対応 OS などの技術情報。</p>'],
            'reviews'  => ['label' => 'レビュー', 'content' => '<p class=\'text-sm\'>★★★★☆ 良い感触です（仮テキスト）。</p>'],
        ]" />
    </div>

    {{-- variant: boxed --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">variant = boxed (active chip on tinted background)</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-tabs variant="boxed" :tabs="[
            'a' => ['label' => 'Account',  'content' => '<p class=\'text-sm\'>アカウント設定パネル。</p>'],
            'b' => ['label' => 'Security', 'content' => '<p class=\'text-sm\'>セキュリティ設定パネル。</p>'],
            'c' => ['label' => 'Billing',  'content' => '<p class=\'text-sm\'>請求設定パネル。</p>'],
        ]" />
    </div>

    {{-- variant: pill --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">variant = pill (subtle base-200 chip, no wrapper bg)</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-tabs variant="pill" :tabs="[
            'all'    => ['label' => 'All',    'content' => '<p class=\'text-sm\'>すべての項目。</p>'],
            'active' => ['label' => 'Active', 'content' => '<p class=\'text-sm\'>アクティブな項目のみ。</p>'],
            'done'   => ['label' => 'Done',   'content' => '<p class=\'text-sm\'>完了済みの項目のみ。</p>'],
        ]" />
    </div>

    {{-- sizes --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">sizes — sm / md / lg (underline)</p>
    @foreach(['sm','md','lg'] as $s)
        <div class="mb-4 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
            <p class="text-[10px] text-base-content/40 mb-2">size = {{ $s }}</p>
            <x-tabs :size="$s" :tabs="[
                'one'   => ['label' => 'One',   'content' => '<p class=\'text-sm\'>One panel.</p>'],
                'two'   => ['label' => 'Two',   'content' => '<p class=\'text-sm\'>Two panel.</p>'],
                'three' => ['label' => 'Three', 'content' => '<p class=\'text-sm\'>Three panel.</p>'],
            ]" />
        </div>
    @endforeach

    {{-- default prop --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">default = "specs" — 初期 active タブを指定</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-tabs default="specs" :tabs="[
            'overview' => ['label' => '概要', 'content' => '<p class=\'text-sm\'>概要 (default ではない)</p>'],
            'specs'    => ['label' => '仕様', 'content' => '<p class=\'text-sm\'>仕様 (初期表示)</p>'],
            'reviews'  => ['label' => 'レビュー', 'content' => '<p class=\'text-sm\'>レビュー</p>'],
        ]" />
    </div>

    {{-- with icons --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">tab に icon を付ける — tab item に icon キーで &lt;x-i&gt; 等の HTML を渡す</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        @php
            // icon prop は raw HTML を受け取るので、playground では inline SVG を渡す。
            // 実プロジェクトでは Blade::render('<x-i type="home-2" variant="linear" class="w-4 h-4" />')
            // などで pinion-icons 経由のレンダリング済 HTML を渡せる。
            $svg = fn ($d) => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-4 h-4">'.$d.'</svg>';
            $homeIcon     = $svg('<path d="M3 11l9-7 9 7M5 10v10h14V10" stroke-linejoin="round" stroke-linecap="round"/>');
            $settingsIcon = $svg('<circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.7 1.7 0 0 0 .34 1.87l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.7 1.7 0 0 0-1.87-.34 1.7 1.7 0 0 0-1.03 1.56V21a2 2 0 1 1-4 0v-.08a1.7 1.7 0 0 0-1.11-1.56 1.7 1.7 0 0 0-1.87.34l-.06.06A2 2 0 1 1 4.13 16.93l.06-.06A1.7 1.7 0 0 0 4.53 15a1.7 1.7 0 0 0-1.56-1.03H3a2 2 0 1 1 0-4h.08A1.7 1.7 0 0 0 4.63 8.86a1.7 1.7 0 0 0-.34-1.87l-.06-.06A2 2 0 1 1 7.06 4.1l.06.06A1.7 1.7 0 0 0 9 4.5 1.7 1.7 0 0 0 10.02 2.94V3a2 2 0 1 1 4 0v.08A1.7 1.7 0 0 0 15.14 4.63a1.7 1.7 0 0 0 1.87-.34l.06-.06A2 2 0 1 1 19.9 7.06l-.06.06A1.7 1.7 0 0 0 19.5 9a1.7 1.7 0 0 0 1.56 1.03H21a2 2 0 1 1 0 4h-.08a1.7 1.7 0 0 0-1.52 1z" stroke-linejoin="round" stroke-linecap="round"/>');
            $profileIcon  = $svg('<circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 4-7 8-7s8 3 8 7" stroke-linejoin="round" stroke-linecap="round"/>');
        @endphp
        <x-tabs variant="boxed" :tabs="[
            'home'     => ['label' => 'Home',     'icon' => $homeIcon,     'content' => '<p class=\'text-sm\'>Home パネル。</p>'],
            'settings' => ['label' => 'Settings', 'icon' => $settingsIcon, 'content' => '<p class=\'text-sm\'>Settings パネル。</p>'],
            'profile'  => ['label' => 'Profile',  'icon' => $profileIcon,  'content' => '<p class=\'text-sm\'>Profile パネル。</p>'],
        ]" />
    </div>

    {{-- many tabs / scroll --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">多数のタブ — whitespace-nowrap で 1 行に揃う (狭幅で確認推奨)</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-tabs variant="pill" size="sm" :tabs="[
            't1' => ['label' => 'Inbox',     'content' => '<p class=\'text-sm\'>Inbox</p>'],
            't2' => ['label' => 'Drafts',    'content' => '<p class=\'text-sm\'>Drafts</p>'],
            't3' => ['label' => 'Sent',      'content' => '<p class=\'text-sm\'>Sent</p>'],
            't4' => ['label' => 'Spam',      'content' => '<p class=\'text-sm\'>Spam</p>'],
            't5' => ['label' => 'Trash',     'content' => '<p class=\'text-sm\'>Trash</p>'],
            't6' => ['label' => 'Archive',   'content' => '<p class=\'text-sm\'>Archive</p>'],
            't7' => ['label' => 'Important', 'content' => '<p class=\'text-sm\'>Important</p>'],
        ]" />
    </div>

    {{-- usage --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-8">使い方</p>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim{{-- 1. 最小構成 — tabs を連想配列で渡す。key は activeTab の値に使われる --}}
&lt;x-tabs :tabs="[
    'overview' =&gt; ['label' =&gt; '概要', 'content' =&gt; '&lt;p&gt;概要&lt;/p&gt;'],
    'specs'    =&gt; ['label' =&gt; '仕様', 'content' =&gt; '&lt;p&gt;仕様&lt;/p&gt;'],
]" /&gt;

{{-- 2. variant / size / default を指定 --}}
&lt;x-tabs
    variant="boxed"
    size="lg"
    default="specs"
    :tabs="[ ... ]"
/&gt;

{{-- 3. icon 付き — icon キーに HTML 文字列を渡す --}}
&lt;x-tabs :tabs="[
    'home' =&gt; [
        'label'   =&gt; 'Home',
        'icon'    =&gt; view('components.i', ['type' =&gt; 'home-2', 'variant' =&gt; 'linear', 'class' =&gt; 'w-4 h-4'])-&gt;render(),
        'content' =&gt; '&lt;p&gt;Home&lt;/p&gt;',
    ],
]" /&gt;
@endverbatim</code></pre>
@endsection
