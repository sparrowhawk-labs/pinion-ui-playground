@extends('layouts.playground')

@section('title', '— Collapse')
@section('heading', 'Collapse')
@section('subheading', 'daisyUI 5 の collapse class を wrap した single open/close ブロック (no-JS、内部の checkbox で開閉制御)。title prop か slot:title でヘッダ、$slot で本文を渡す。icon (arrow / plus / null)・bordered (default true)・open (初期 open) の 3 props + title。複数まとめて FAQ にしたい時はそのまま縦に並べるだけ。')

@section('content')
    {{-- DEFAULT --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        icon=arrow, bordered=true — header をクリックで開閉
    </p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-collapse title="Default — クリックで開いてみてください" :open="true">
            <p>これは collapse の本文です。初期状態で <code>:open="true"</code> を指定しているので、ページ表示時から開いています。もう一度ヘッダをクリックすると閉じます。</p>
            <p class="mt-2 text-base-content/60">no-JS で動作 — 内部の checkbox の checked 状態のみで開閉します。</p>
        </x-collapse>
    </div>

    {{-- icon variants --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">icon variants — arrow (default) / plus / null (no icon)</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element space-y-3">
        <x-collapse title="icon=arrow (default)" icon="arrow">
            <p>右側に下向き ▼ が出て、開くと回転します。</p>
        </x-collapse>
        <x-collapse title="icon=plus" icon="plus">
            <p>右側に + が出て、開くと × に変わります。</p>
        </x-collapse>
        <x-collapse title="icon=null — アイコンなし" :icon="null">
            <p>ヘッダ右側に icon が出ません。ミニマルにしたい時用。</p>
        </x-collapse>
    </div>

    {{-- bordered=false --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">bordered=false — ボーダレス表示 (親側で枠を持つ時など)</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-collapse title="bordered=false の collapse" :bordered="false">
            <p>外周のボーダーが消えて、親要素のレイアウトに溶け込みます。Card やセクション内に埋め込む時に使います。</p>
        </x-collapse>
    </div>

    {{-- FAQ 風 --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">FAQ 風 — 複数 collapse を縦に並べる</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element space-y-2">
        <x-collapse title="Q. このコンポーネントは JavaScript が必要ですか？">
            <p>A. いいえ。内部の <code>&lt;input type="checkbox"&gt;</code> の checked 状態だけで開閉します。Alpine.js も含めて、JS は一切走りません。</p>
        </x-collapse>
        <x-collapse title="Q. 複数の collapse を「アコーディオン」のように排他的に開閉できますか？">
            <p>A. それは <code>&lt;x-accordion&gt;</code> の仕事です。collapse は独立した開閉ブロック、accordion は複数項目で 1 つだけ開く（or multiple モード）UI です。</p>
        </x-collapse>
        <x-collapse title="Q. 初期状態を「開いた状態」にしたい時は？">
            <p>A. <code>:open="true"</code> を渡してください。内部 checkbox に <code>checked</code> 属性が付きます。</p>
        </x-collapse>
    </div>

    {{-- usage --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-8">使い方</p>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim{{-- 1. 最小 — title prop と本文 slot --}}
&lt;x-collapse title="クリックで開く"&gt;
    &lt;p&gt;本文をここに書きます。&lt;/p&gt;
&lt;/x-collapse&gt;

{{-- 2. icon variants: arrow (default) / plus / null --}}
&lt;x-collapse title="plus icon" icon="plus"&gt;
    &lt;p&gt;...&lt;/p&gt;
&lt;/x-collapse&gt;

&lt;x-collapse title="アイコンなし" :icon="null"&gt;
    &lt;p&gt;...&lt;/p&gt;
&lt;/x-collapse&gt;

{{-- 3. 初期 open --}}
&lt;x-collapse title="開いた状態で start" :open="true"&gt;
    &lt;p&gt;...&lt;/p&gt;
&lt;/x-collapse&gt;

{{-- 4. ボーダレス (親側で枠を持つ時) --}}
&lt;x-collapse title="bordered=false" :bordered="false"&gt;
    &lt;p&gt;...&lt;/p&gt;
&lt;/x-collapse&gt;

{{-- 5. title を slot で渡す (HTML を含めたい時) --}}
&lt;x-collapse&gt;
    &lt;x-slot:titleSlot&gt;
        &lt;span class="font-bold"&gt;HTML 入り&lt;/span&gt; のタイトル
    &lt;/x-slot:titleSlot&gt;
    &lt;p&gt;本文&lt;/p&gt;
&lt;/x-collapse&gt;
@endverbatim</code></pre>
@endsection
