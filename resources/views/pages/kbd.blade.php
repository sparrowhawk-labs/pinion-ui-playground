@extends('layouts.playground')

@section('title', '— Kbd')
@section('heading', 'Kbd')
@section('subheading', __('playground.subheading.kbd'))

@section('content')
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        単独表示 — size=md, appearance=default
    </p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-kbd>K</x-kbd>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">size variants — xs / sm / md / lg / xl</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="flex items-center gap-3">
            <x-kbd size="xs">K</x-kbd>
            <x-kbd size="sm">K</x-kbd>
            <x-kbd size="md">K</x-kbd>
            <x-kbd size="lg">K</x-kbd>
            <x-kbd size="xl">K</x-kbd>
        </div>
        <div class="flex items-center gap-3 mt-4">
            <x-kbd size="xs">Enter</x-kbd>
            <x-kbd size="sm">Enter</x-kbd>
            <x-kbd size="md">Enter</x-kbd>
            <x-kbd size="lg">Enter</x-kbd>
            <x-kbd size="xl">Enter</x-kbd>
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">appearance variants — default / soft / outline (size=md)</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="flex items-center gap-6">
            <div class="flex items-center gap-2">
                <span class="text-xs text-base-content/60 w-16">default</span>
                <x-kbd>K</x-kbd>
                <x-kbd>Ctrl</x-kbd>
                <x-kbd>↵</x-kbd>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-xs text-base-content/60 w-16">soft</span>
                <x-kbd appearance="soft">K</x-kbd>
                <x-kbd appearance="soft">Ctrl</x-kbd>
                <x-kbd appearance="soft">↵</x-kbd>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-xs text-base-content/60 w-16">outline</span>
                <x-kbd appearance="outline">K</x-kbd>
                <x-kbd appearance="outline">Ctrl</x-kbd>
                <x-kbd appearance="outline">↵</x-kbd>
            </div>
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">shortcut combos — 実例</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="flex flex-col gap-4 text-sm">
            <div class="flex items-center gap-3">
                <span class="text-base-content/70 w-40">コマンドパレットを開く</span>
                <span><x-kbd>Ctrl</x-kbd> + <x-kbd>K</x-kbd></span>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-base-content/70 w-40">保存 (macOS)</span>
                <span><x-kbd>⌘</x-kbd><x-kbd>S</x-kbd></span>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-base-content/70 w-40">ヘルプを表示</span>
                <span><x-kbd>Shift</x-kbd> + <x-kbd>?</x-kbd></span>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-base-content/70 w-40">3 キーコンボ</span>
                <span><x-kbd>Ctrl</x-kbd> + <x-kbd>Shift</x-kbd> + <x-kbd>P</x-kbd></span>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-base-content/70 w-40">大きめサイズ (size=lg)</span>
                <span><x-kbd size="lg">Ctrl</x-kbd> + <x-kbd size="lg">K</x-kbd></span>
            </div>
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">in text — 段落内の埋め込み</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="prose max-w-none text-sm leading-relaxed">
            <p>
                検索を起動するには <x-kbd size="sm">/</x-kbd> を押してください。検索ボックスから抜けるには <x-kbd size="sm">Esc</x-kbd> を押します。
            </p>
            <p class="mt-3">
                ファイルを保存する時は <x-kbd size="sm">⌘</x-kbd><x-kbd size="sm">S</x-kbd>、すべて保存する時は <x-kbd size="sm">⌘</x-kbd> + <x-kbd size="sm">Shift</x-kbd> + <x-kbd size="sm">S</x-kbd> を使います。
            </p>
            <p class="mt-3">
                soft appearance を文章内で使うと、地味なので読み心地が良い: <x-kbd size="sm" appearance="soft">⌘</x-kbd><x-kbd size="sm" appearance="soft">K</x-kbd> でコマンドパレット。
            </p>
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-8">使い方</p>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim{{-- 単独 --}}
&lt;x-kbd&gt;K&lt;/x-kbd&gt;

{{-- size: xs / sm / md (default) / lg / xl --}}
&lt;x-kbd size="lg"&gt;Enter&lt;/x-kbd&gt;

{{-- appearance: default / soft / outline --}}
&lt;x-kbd appearance="soft"&gt;Ctrl&lt;/x-kbd&gt;
&lt;x-kbd appearance="outline"&gt;Ctrl&lt;/x-kbd&gt;

{{-- combo (+ で繋ぐ / 隣接) --}}
&lt;x-kbd&gt;Ctrl&lt;/x-kbd&gt; + &lt;x-kbd&gt;K&lt;/x-kbd&gt;
&lt;x-kbd&gt;⌘&lt;/x-kbd&gt;&lt;x-kbd&gt;S&lt;/x-kbd&gt;

{{-- 文章内に埋め込み --}}
&lt;p&gt;検索は &lt;x-kbd size="sm"&gt;/&lt;/x-kbd&gt; を押してください&lt;/p&gt;
@endverbatim</code></pre>
@endsection
