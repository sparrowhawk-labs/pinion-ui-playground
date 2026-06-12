@extends('layouts.playground')

@section('title', '— Tooltip')
@section('heading', 'Tooltip')
@section('subheading', __('playground.subheading.tooltip'))

@section('content')
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        position=top, color=null (light: base-100 + 細い border + soft shadow), open=false — trigger を hover で表示
    </p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="flex items-center gap-4 pt-10">
            <x-tooltip text="Hi from tooltip">
                <x-button appearance="base-200" color="neutral">Hover me</x-button>
            </x-tooltip>
            <span class="text-sm text-base-content/60">↑ ボタン上にカーソルを乗せると tooltip が出ます</span>
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">positions — top / right / bottom / left</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 px-element py-12">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 place-items-center">
            <x-tooltip text="上に出る" position="top">
                <x-button size="sm" appearance="base-200" color="neutral">top</x-button>
            </x-tooltip>
            <x-tooltip text="右に出る" position="right">
                <x-button size="sm" appearance="base-200" color="neutral">right</x-button>
            </x-tooltip>
            <x-tooltip text="下に出る" position="bottom">
                <x-button size="sm" appearance="base-200" color="neutral">bottom</x-button>
            </x-tooltip>
            <x-tooltip text="左に出る" position="left">
                <x-button size="sm" appearance="base-200" color="neutral">left</x-button>
            </x-tooltip>
        </div>
        <p class="text-xs text-base-content/50 mt-6 text-center">それぞれ hover すると指定方向に tooltip が出ます。</p>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">surface variants — base-100 / base-200 (= default) / base-300 を選択肢として比較。背景面に応じて使い分けたい時に</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 px-element py-12">
        <div class="grid grid-cols-3 gap-x-6 gap-y-12 place-items-center">
            <x-tooltip text="base-100 (hairline ring)" color="base-100" :open="true">
                <x-button size="sm" appearance="base-200" color="neutral">base-100</x-button>
            </x-tooltip>
            <x-tooltip text="base-200 (= default)" color="base-200" :open="true">
                <x-button size="sm" appearance="base-200" color="neutral">base-200</x-button>
            </x-tooltip>
            <x-tooltip text="base-300 (more contrast)" color="base-300" :open="true">
                <x-button size="sm" appearance="base-200" color="neutral">base-300</x-button>
            </x-tooltip>
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">color variants — open=true で常時表示して比較 (default=light が先頭、neutral=daisyUI 素の dark grey)</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 px-element py-12">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-x-6 gap-y-12 place-items-center">
            <x-tooltip text="default (light)" :open="true">
                <x-button size="sm" appearance="base-200" color="neutral">default</x-button>
            </x-tooltip>
            <x-tooltip text="neutral" color="neutral" :open="true">
                <x-button size="sm" appearance="base-200" color="neutral">neutral</x-button>
            </x-tooltip>
            <x-tooltip text="primary" color="primary" :open="true">
                <x-button size="sm" appearance="base-200" color="neutral">primary</x-button>
            </x-tooltip>
            <x-tooltip text="secondary" color="secondary" :open="true">
                <x-button size="sm" appearance="base-200" color="neutral">secondary</x-button>
            </x-tooltip>
            <x-tooltip text="accent" color="accent" :open="true">
                <x-button size="sm" appearance="base-200" color="neutral">accent</x-button>
            </x-tooltip>
            <x-tooltip text="info" color="info" :open="true">
                <x-button size="sm" appearance="base-200" color="neutral">info</x-button>
            </x-tooltip>
            <x-tooltip text="success" color="success" :open="true">
                <x-button size="sm" appearance="base-200" color="neutral">success</x-button>
            </x-tooltip>
            <x-tooltip text="warning" color="warning" :open="true">
                <x-button size="sm" appearance="base-200" color="neutral">warning</x-button>
            </x-tooltip>
            <x-tooltip text="error" color="error" :open="true">
                <x-button size="sm" appearance="base-200" color="neutral">error</x-button>
            </x-tooltip>
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">open state — hover (default) vs 常時表示 (open=true)</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 px-element py-12">
        <div class="grid grid-cols-2 gap-8 place-items-center">
            <div class="flex flex-col items-center gap-2">
                <x-tooltip text="hover で出る">
                    <x-button appearance="base-200" color="neutral">open=false (default)</x-button>
                </x-tooltip>
                <span class="text-xs text-base-content/50">マウスを乗せた時だけ表示</span>
            </div>
            <div class="flex flex-col items-center gap-2">
                <x-tooltip text="常時表示" :open="true" color="primary">
                    <x-button appearance="base-200" color="neutral">open=true</x-button>
                </x-tooltip>
                <span class="text-xs text-base-content/50">常に表示 (オンボーディングや注目箇所のハイライトに)</span>
            </div>
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">real-world examples — icon button / disabled / form helper / 長文</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="flex flex-col gap-6">
            {{-- icon button --}}
            <div class="flex items-center gap-4">
                <span class="text-sm text-base-content/70 w-40">icon button (close)</span>
                <x-tooltip text="閉じる" position="top">
                    <button class="inline-flex items-center justify-center w-8 h-8 rounded-full text-base-content hover:bg-base-200 transition-colors cursor-pointer" aria-label="close">
                        <x-i type="close-circle" variant="linear" class="w-5 h-5" />
                    </button>
                </x-tooltip>
                <x-tooltip text="お気に入りに追加" position="top" color="warning">
                    <button class="inline-flex items-center justify-center w-8 h-8 rounded-full text-base-content hover:bg-base-200 transition-colors cursor-pointer" aria-label="favorite">
                        <x-i type="star" variant="linear" class="w-5 h-5" />
                    </button>
                </x-tooltip>
                <x-tooltip text="通知を確認" position="top" color="info">
                    <button class="inline-flex items-center justify-center w-8 h-8 rounded-full text-base-content hover:bg-base-200 transition-colors cursor-pointer" aria-label="notifications">
                        <x-i type="bell" variant="linear" class="w-5 h-5" />
                    </button>
                </x-tooltip>
            </div>

            {{-- disabled button explanation --}}
            <div class="flex items-center gap-4">
                <span class="text-sm text-base-content/70 w-40">disabled の理由を説明</span>
                <x-tooltip text="フォームを保存するには必須項目を入力してください" position="right" color="error">
                    <span class="inline-block">
                        <x-button size="sm" disabled>保存</x-button>
                    </span>
                </x-tooltip>
            </div>

            {{-- form helper next to label --}}
            <div class="flex items-start gap-4">
                <span class="text-sm text-base-content/70 w-40 pt-2">フォームラベル横ヘルプ</span>
                <div class="flex-1 max-w-xs">
                    <label class="flex items-center gap-1.5 text-sm font-medium mb-1">
                        API トークン
                        <x-tooltip text="ダッシュボード > 設定 > API から発行できます" position="right" color="info">
                            <span class="inline-flex items-center justify-center w-4 h-4 rounded-full text-base-content/50 cursor-help">
                                <x-i type="info-circle" variant="linear" class="w-4 h-4" />
                            </span>
                        </x-tooltip>
                    </label>
                    <x-input size="sm" placeholder="sk-..." />
                </div>
            </div>

            {{-- truncated text reveal --}}
            <div class="flex items-center gap-4">
                <span class="text-sm text-base-content/70 w-40">長文を hover で全文表示</span>
                <x-tooltip text="これは省略されている長いメッセージの全文です。tooltip は折り返し表示されます。" position="bottom">
                    <span class="inline-block max-w-[16rem] truncate align-middle text-sm border-b border-dashed border-base-content/40 cursor-help">
                        これは省略されている長いメッセージの全文です…
                    </span>
                </x-tooltip>
            </div>
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-8">使い方</p>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim{{-- 最小 (position=top, color=light default) --}}
&lt;x-tooltip text="Hi"&gt;
    &lt;button class="btn"&gt;Hover me&lt;/button&gt;
&lt;/x-tooltip&gt;

{{-- position: top (default) / right / bottom / left --}}
&lt;x-tooltip text="右に出る" position="right"&gt;
    &lt;button class="btn"&gt;...&lt;/button&gt;
&lt;/x-tooltip&gt;

{{-- color: light (default) / neutral / primary / secondary / accent / info / success / warning / error --}}
&lt;x-tooltip text="保存しました" color="success"&gt;
    &lt;button class="btn"&gt;...&lt;/button&gt;
&lt;/x-tooltip&gt;

{{-- neutral = daisyUI 素の dark grey bubble (light default を opt-out したい時) --}}
&lt;x-tooltip text="dark grey" color="neutral"&gt;
    &lt;button class="btn"&gt;...&lt;/button&gt;
&lt;/x-tooltip&gt;

{{-- open=true で常時表示 (オンボーディング / 注目箇所のハイライト) --}}
&lt;x-tooltip text="ここを押してください" :open="true" color="primary"&gt;
    &lt;button class="btn"&gt;Start&lt;/button&gt;
&lt;/x-tooltip&gt;

{{-- icon button + tooltip でラベルを補う --}}
&lt;x-tooltip text="閉じる"&gt;
    &lt;button class="btn btn-circle btn-ghost" aria-label="close"&gt;
        &lt;x-i type="close-circle" variant="linear" class="w-5 h-5" /&gt;
    &lt;/button&gt;
&lt;/x-tooltip&gt;
@endverbatim</code></pre>
@endsection
