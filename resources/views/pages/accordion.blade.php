@extends('layouts.playground')

@section('title', '— Accordion')
@section('heading', 'Accordion')
@section('subheading', __('playground.subheading.accordion'))

@section('content')
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        single-open / size=md
    </p>
    <div class="mb-8">
        <x-accordion>
            <x-accordion-item title="セクション 1">1つ目の内容。</x-accordion-item>
            <x-accordion-item title="セクション 2">2つ目の内容。</x-accordion-item>
            <x-accordion-item title="セクション 3">3つ目の内容。</x-accordion-item>
        </x-accordion>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">multiple-open — 複数同時に開ける</p>
    <div class="mb-8">
        <x-accordion :multiple="true">
            <x-accordion-item title="セクション 1">1つ目の内容。</x-accordion-item>
            <x-accordion-item title="セクション 2">2つ目の内容。</x-accordion-item>
            <x-accordion-item title="セクション 3">3つ目の内容。</x-accordion-item>
        </x-accordion>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">size variants</p>
    @foreach(['sm','md','lg'] as $s)
        <div class="mb-4">
            <p class="text-[10px] text-base-content/40 mb-1">size={{ $s }}</p>
            <x-accordion :size="$s">
                <x-accordion-item title="セクション 1">1つ目の内容。</x-accordion-item>
                <x-accordion-item title="セクション 2">2つ目の内容。</x-accordion-item>
                <x-accordion-item title="セクション 3">3つ目の内容。</x-accordion-item>
            </x-accordion>
        </div>
    @endforeach

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">リッチコンテンツ — Blade slot なので任意の markup / コンポーネント / リンク / リスト・複数段落も自然に書ける</p>
    <div class="mb-8">
        <x-accordion>
            <x-accordion-item title="リンク付き">
                <p>外部リソースへのリンクを含むコンテンツ。<a href="#" class="link link-primary">公式ドキュメント</a> を参照してください。</p>
            </x-accordion-item>
            <x-accordion-item title="リスト">
                <ul class="list-disc list-inside space-y-1">
                    <li>箇条書き 1</li>
                    <li>箇条書き 2</li>
                    <li>箇条書き 3</li>
                </ul>
            </x-accordion-item>
            <x-accordion-item title="複数段落">
                <p class="mb-2">最初の段落。pinion-ui v0.4.0 以降は Blade slot として受け取るため、任意の HTML / Blade コンポーネントを埋め込めます。</p>
                <p>2 段落目。改行・装飾も自由です。</p>
            </x-accordion-item>
        </x-accordion>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">FAQ デモ — 実利用イメージ (single-open)</p>
    <div class="mb-8 max-w-2xl">
        <x-accordion>
            <x-accordion-item title="pinion-ui とは何ですか？">
                Tailwind v4 + daisyUI v5 + Alpine.js をベースにした、Yakaze Tech Studio 内製の Blade コンポーネントライブラリです。プロジェクト横断で UI 一貫性を担保することを目的としています。
            </x-accordion-item>
            <x-accordion-item title="プロジェクトに導入するには？">
                <code class="text-primary">composer require sparrowhawk-labs/pinion-ui</code> のあと、<code class="text-primary">php artisan ui:install</code> で必要な resource を wire-up してください。
            </x-accordion-item>
            <x-accordion-item title="既存の daisyUI コンポーネントと共存できますか？">
                はい。pinion-ui は daisyUI の class を内部で利用しているため、同じ theme variable を共有します。&lt;x-...&gt; と通常の daisyUI markup を併用しても問題ありません。
            </x-accordion-item>
            <x-accordion-item title="独自のカラーパレットを使いたい">
                daisyUI v5 の <code class="text-primary">@verbatim@plugin "daisyui/theme"@endverbatim</code> ディレクティブでテーマを定義してください。pinion-ui の class はすべて theme variable 経由なので、テーマを変えるだけで配色が追従します。
            </x-accordion-item>
            <x-accordion-item title="バグを見つけました">
                GitHub Issues で報告してください。再現手順とスクリーンショットがあると助かります。<a href="#" class="link link-primary">sparrowhawk-labs/pinion-ui#issues</a>
            </x-accordion-item>
        </x-accordion>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">FAQ (multiple-open) — 比較対象を同時に見たい時</p>
    <div class="mb-8 max-w-2xl">
        <x-accordion :multiple="true">
            <x-accordion-item title="pinion-ui とは何ですか？">
                Tailwind v4 + daisyUI v5 + Alpine.js をベースにした、Blade コンポーネントライブラリ。
            </x-accordion-item>
            <x-accordion-item title="導入手順は？">
                <code class="text-primary">composer require</code> → <code class="text-primary">php artisan ui:install</code>。
            </x-accordion-item>
            <x-accordion-item title="dark mode は？">
                v0.4.0 から light only (pinion)。dark が必要なら daisyUI 標準 <code class="text-primary">dark</code> / <code class="text-primary">dim</code> / <code class="text-primary">night</code> を &lt;html data-theme&gt; で指定。
            </x-accordion-item>
        </x-accordion>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-8">使い方</p>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim{{-- single-open (default) — 1度に1つしか開かない --}}
&lt;x-accordion&gt;
    &lt;x-accordion-item title="質問 1"&gt;回答 1 (Blade slot なので任意の markup 可)&lt;/x-accordion-item&gt;
    &lt;x-accordion-item title="質問 2"&gt;
        &lt;p&gt;複数段落も OK&lt;/p&gt;
        &lt;a href="/docs" class="link link-primary"&gt;リンクも自然に&lt;/a&gt;
    &lt;/x-accordion-item&gt;
&lt;/x-accordion&gt;

{{-- multiple-open — 複数同時に開ける --}}
&lt;x-accordion :multiple="true"&gt; … &lt;/x-accordion&gt;

{{-- サイズ (sm / md / lg) --}}
&lt;x-accordion size="sm"&gt; … &lt;/x-accordion&gt;
@endverbatim</code></pre>
@endsection
