@extends('layouts.playground')

@section('title', '— Font Debug')
@section('heading', 'Font Debug')
@section('subheading', __('playground.subheading.font-debug'))

@section('content')
<div>
    <div class="mb-8 flex flex-wrap items-center gap-4 p-4 bg-base-200 rounded-lg">
        <div class="flex items-center gap-2">
            <span class="text-sm font-medium">data-ja (page-level):</span>
            <button @click="setJa(!ja)"
                :class="ja ? 'bg-primary text-primary-content' : 'bg-base-100 hover:bg-base-300'"
                class="text-sm px-3 py-1 rounded border border-base-300 transition-colors cursor-pointer"
                x-text="ja ? 'on' : 'off'"></button>
        </div>
        <div class="ml-auto text-xs text-base-content/60 flex items-center gap-3">
            <span>Tune: <code class="font-mono bg-base-100 px-1.5 py-0.5 rounded" x-text="tune"></code></span>
            <span>Theme: <code class="font-mono bg-base-100 px-1.5 py-0.5 rounded" x-text="theme"></code></span>
        </div>
    </div>

    <p class="text-sm text-base-content/70 mb-10 leading-relaxed">
        上のトグルで <code class="bg-base-200 px-1.5 py-0.5 rounded">&lt;html data-ja&gt;</code> を on / off 切替。
        通常運用では locale=ja のときのみ on (locale が source of truth) だが、 ここでは Latin 単体の挙動も確認できる。
        ページ再読み込みで locale 由来の状態に戻る (localStorage 永続化なし)。
    </p>

    <h2 class="text-xl font-bold mb-3">Current state — page-level mix</h2>
    <div class="p-5 border border-base-300 rounded mb-12">
        <p class="text-4xl mb-3 font-bold">Tuneable UI, 設計の流儀</p>
        <p class="text-lg mb-3">Build distinctive Blade interfaces — 美しく、 そして 自然に。</p>
        <p class="text-sm text-base-content/70 mb-3">The quick brown fox jumps over the lazy dog. いろはにほへと ちりぬるを。</p>
        <code class="text-sm bg-base-200 px-2 py-1 inline-block rounded">const greeting = "こんにちは"; // hello, world</code>
    </div>

    <h2 class="text-xl font-bold mb-2">All tunes × data-ja matrix</h2>
    <p class="text-sm text-base-content/70 mb-6">
        各 tune を <code class="bg-base-200 px-1.5 py-0.5 rounded">data-ja</code> on / off で並べた matrix。
        各セルは独自の <code class="bg-base-200 px-1.5 py-0.5 rounded">data-tune × data-ja</code> scope を持つので、
        上のトグルの影響を受けず independent に確認できる。
    </p>
    <div class="space-y-6">
        @foreach(['default','sharp','soft','playful','corporate','brutal','elegant','bold','pixel','tech'] as $t)
            <div>
                <div class="text-xs uppercase tracking-wider text-base-content/50 mb-2 font-semibold">tune = {{ $t }}</div>
                <div class="grid grid-cols-2 gap-3">
                    <div data-tune="{{ $t }}" data-ja class="p-4 border border-base-300 rounded">
                        <span class="text-[10px] text-base-content/50 mb-2 block uppercase tracking-wider">data-ja</span>
                        <p class="text-2xl mb-1 font-bold">Tuneable UI 設計の流儀</p>
                        <p class="text-sm">Build with 自信 — Latin & JP fallback chain.</p>
                    </div>
                    <div data-tune="{{ $t }}" data-ja="off" class="p-4 border border-base-300 rounded">
                        <span class="text-[10px] text-base-content/50 mb-2 block uppercase tracking-wider">data-ja="off"</span>
                        <p class="text-2xl mb-1 font-bold">Tuneable UI 設計の流儀</p>
                        <p class="text-sm">Build with 自信 — Latin only, JP glyphs fall through to system.</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
