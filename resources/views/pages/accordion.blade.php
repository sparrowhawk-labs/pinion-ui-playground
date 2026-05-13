@extends('layouts.playground')

@section('title', '— Accordion')
@section('heading', 'Accordion')
@section('subheading', 'items 配列を渡すだけで開閉式リストを生成。single-open / multiple-open、size 3段階。content は HTML を許容 (リンク・リスト等)。Alpine x-collapse で滑らかにアニメーション。')

@section('content')
    @php
        $faqItems = [
            [
                'title' => 'pinion-ui とは何ですか？',
                'content' => 'Tailwind v4 + daisyUI v5 + Alpine.js をベースにした、Yakaze Tech Studio 内製の Blade コンポーネントライブラリです。プロジェクト横断で UI 一貫性を担保することを目的としています。',
            ],
            [
                'title' => 'プロジェクトに導入するには？',
                'content' => '<code class="text-primary">composer require sparrowhawk-labs/pinion-ui</code> のあと、<code class="text-primary">php artisan vendor:publish --tag=pinion-ui</code> で必要な resource を publish してください。',
            ],
            [
                'title' => '既存の daisyUI コンポーネントと共存できますか？',
                'content' => 'はい。pinion-ui は daisyUI の class を内部で利用しているため、同じ theme variable を共有します。<x-...> と通常の daisyUI markup を併用しても問題ありません。',
            ],
            [
                'title' => '独自のカラーパレットを使いたい',
                'content' => 'daisyUI v5 の <code class="text-primary">@plugin "daisyui/theme"</code> ディレクティブでテーマを定義してください。pinion-ui の class はすべて theme variable 経由なので、テーマを変えるだけで配色が追従します。',
            ],
            [
                'title' => 'バグを見つけました',
                'content' => 'GitHub Issues で報告してください。再現手順とスクリーンショットがあると助かります。<a href="#" class="link link-primary">sparrowhawk-labs/pinion-ui#issues</a>',
            ],
        ];

        $shortItems = [
            ['title' => 'セクション 1', 'content' => '1つ目の内容。'],
            ['title' => 'セクション 2', 'content' => '2つ目の内容。'],
            ['title' => 'セクション 3', 'content' => '3つ目の内容。'],
        ];

        $richItems = [
            [
                'title' => 'リンク付き',
                'content' => '<p>外部リソースへのリンクを含むコンテンツ。<a href="#" class="link link-primary">公式ドキュメント</a> を参照してください。</p>',
            ],
            [
                'title' => 'リスト',
                'content' => '<ul class="list-disc list-inside space-y-1"><li>箇条書き 1</li><li>箇条書き 2</li><li>箇条書き 3</li></ul>',
            ],
            [
                'title' => '複数段落',
                'content' => '<p class="mb-2">最初の段落。pinion-ui の content スロットは <code>{!! !!}</code> で展開されるため、任意の HTML を埋め込めます。</p><p>2 段落目。改行・装飾も自由です。</p>',
            ],
        ];
    @endphp

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        single-open / size=md
    </p>
    <div class="mb-8">
        <x-accordion :items="$shortItems" />
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">multiple-open — 複数同時に開ける</p>
    <div class="mb-8">
        <x-accordion :items="$shortItems" :multiple="true" />
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">size variants</p>
    @foreach(['sm','md','lg'] as $s)
        <div class="mb-4">
            <p class="text-[10px] text-base-content/40 mb-1">size={{ $s }}</p>
            <x-accordion :items="$shortItems" :size="$s" />
        </div>
    @endforeach

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">リッチコンテンツ — HTML / リンク / リスト / 複数段落</p>
    <div class="mb-8">
        <x-accordion :items="$richItems" />
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">FAQ デモ — 実利用イメージ (single-open)</p>
    <div class="mb-8 max-w-2xl">
        <x-accordion :items="$faqItems" />
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">FAQ (multiple-open) — 比較対象を同時に見たい時</p>
    <div class="mb-8 max-w-2xl">
        <x-accordion :items="$faqItems" :multiple="true" />
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-8">使い方</p>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim @php
    $items = [
        ['title' =&gt; '質問 1', 'content' =&gt; '回答 1 (HTML 可)'],
        ['title' =&gt; '質問 2', 'content' =&gt; '&lt;p&gt;回答 2&lt;/p&gt;'],
    ];
@endphp

{{-- single-open (default) — 1度に1つしか開かない --}}
&lt;x-accordion :items="$items" /&gt;

{{-- multiple-open — 複数同時に開ける --}}
&lt;x-accordion :items="$items" :multiple="true" /&gt;

{{-- サイズ --}}
&lt;x-accordion :items="$items" size="sm" /&gt;
&lt;x-accordion :items="$items" size="lg" /&gt;

{{-- content は HTML 可 ({!! !!} で展開) --}}
$items = [
    ['title' =&gt; 'リンク', 'content' =&gt; '&lt;a href="/docs" class="link link-primary"&gt;docs&lt;/a&gt;'],
];
@endverbatim</code></pre>
@endsection
