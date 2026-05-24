@extends('layouts.playground')

@section('title', '— Indicator')
@section('heading', 'Indicator')
@section('subheading', __('playground.subheading.indicator'))

@section('content')
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        position=top-end, dot=false, color=error, appearance=solid — bell button に未読数 "3" を重ねる
    </p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="flex items-center gap-6">
            <x-indicator>
                <x-slot:badge>3</x-slot:badge>
                <button class="btn btn-circle" aria-label="notifications">
                    <x-i type="bell" variant="linear" class="w-5 h-5" />
                </button>
            </x-indicator>
            <span class="text-sm text-base-content/60">↑ ベルの右上に赤いバッジで "3" を表示</span>
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">9 positions grid — top / middle / bottom × start / center / end</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="grid grid-cols-3 gap-6 place-items-center">
            @foreach ([
                'top-start', 'top-center', 'top-end',
                'middle-start', 'middle-center', 'middle-end',
                'bottom-start', 'bottom-center', 'bottom-end',
            ] as $pos)
                <div class="flex flex-col items-center gap-2">
                    <x-indicator :position="$pos">
                        <x-slot:badge>!</x-slot:badge>
                        <div class="w-24 h-16 bg-base-200 border border-base-300 rounded-[var(--radius-box)] flex items-center justify-center text-xs text-base-content/60">
                            box
                        </div>
                    </x-indicator>
                    <span class="text-[10px] text-base-content/50 font-mono">{{ $pos }}</span>
                </div>
            @endforeach
        </div>
        <p class="text-xs text-base-content/50 mt-6 text-center">top-end が daisyUI default。class 名は <code>indicator-top indicator-end</code> 等の組み合わせ。</p>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">dot vs badge — テキスト無しの純ドット (dot=true) vs バッジテキスト (dot=false, default)</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="grid grid-cols-2 gap-8 place-items-center">
            <div class="flex flex-col items-center gap-3">
                <x-indicator :dot="true">
                    <button class="btn btn-circle" aria-label="notifications">
                        <x-i type="bell" variant="linear" class="w-5 h-5" />
                    </button>
                </x-indicator>
                <span class="text-xs text-base-content/60">dot=true — 「何かある」だけを示すミニドット</span>
            </div>
            <div class="flex flex-col items-center gap-3">
                <x-indicator>
                    <x-slot:badge>12</x-slot:badge>
                    <button class="btn btn-circle" aria-label="notifications">
                        <x-i type="bell" variant="linear" class="w-5 h-5" />
                    </button>
                </x-indicator>
                <span class="text-xs text-base-content/60">dot=false (default) — 件数を表示</span>
            </div>
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">color variants — 全色 (default=error 先頭)</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-x-6 gap-y-8 place-items-center">
            @foreach (['error', 'primary', 'secondary', 'accent', 'info', 'success', 'warning'] as $i => $col)
                <div class="flex flex-col items-center gap-2">
                    <x-indicator :color="$col">
                        <x-slot:badge>{{ $i + 1 }}</x-slot:badge>
                        <div class="w-20 h-14 bg-base-200 border border-base-300 rounded-[var(--radius-box)] flex items-center justify-center text-xs text-base-content/60">
                            box
                        </div>
                    </x-indicator>
                    <span class="text-[10px] text-base-content/50 font-mono">{{ $col }}@if($col === 'error') (default)@endif</span>
                </div>
            @endforeach
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-x-6 gap-y-8 place-items-center mt-8">
            @foreach (['error', 'primary', 'secondary', 'accent', 'info', 'success', 'warning'] as $col)
                <div class="flex flex-col items-center gap-2">
                    <x-indicator :color="$col" :dot="true">
                        <div class="w-20 h-14 bg-base-200 border border-base-300 rounded-[var(--radius-box)] flex items-center justify-center text-xs text-base-content/60">
                            box
                        </div>
                    </x-indicator>
                    <span class="text-[10px] text-base-content/50 font-mono">{{ $col }} · dot</span>
                </div>
            @endforeach
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">appearance variants — solid (default) / soft / outline / ghost / dash</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="grid grid-cols-2 md:grid-cols-5 gap-x-6 gap-y-8 place-items-center">
            @foreach (['solid' => 'solid (default)', 'soft' => 'soft', 'outline' => 'outline', 'ghost' => 'ghost', 'dash' => 'dash'] as $app => $label)
                <div class="flex flex-col items-center gap-2">
                    <x-indicator :appearance="$app" color="error">
                        <x-slot:badge>3</x-slot:badge>
                        <div class="w-20 h-14 bg-base-200 border border-base-300 rounded-[var(--radius-box)] flex items-center justify-center text-xs text-base-content/60">
                            box
                        </div>
                    </x-indicator>
                    <span class="text-[10px] text-base-content/50 font-mono">{{ $label }}</span>
                </div>
            @endforeach
        </div>
        <p class="text-xs text-base-content/50 mt-6 text-center">default は <code>solid</code> で「通知あり」を強く伝える。穏やかに見せたいときは <code>appearance="soft"</code> を opt-in。</p>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">real-world examples — Avatar + new message dot / Cart + count / Inbox + unread</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="flex flex-wrap items-end gap-12">
            {{-- Avatar + new message dot --}}
            <div class="flex flex-col items-center gap-2">
                <x-indicator :dot="true" color="success" position="bottom-end">
                    <div class="avatar">
                        <div class="w-14 rounded-full bg-base-300 flex items-center justify-center">
                            <x-i type="user" variant="bold" class="w-8 h-8 text-base-content/40" />
                        </div>
                    </div>
                </x-indicator>
                <span class="text-xs text-base-content/60">Avatar + online dot</span>
            </div>

            {{-- Cart icon + count --}}
            <div class="flex flex-col items-center gap-2">
                <x-indicator color="primary">
                    <x-slot:badge>5</x-slot:badge>
                    <button class="btn btn-square" aria-label="cart">
                        <x-i type="cart-large" variant="linear" class="w-6 h-6" />
                    </button>
                </x-indicator>
                <span class="text-xs text-base-content/60">Cart + count (primary)</span>
            </div>

            {{-- Inbox + unread badge --}}
            <div class="flex flex-col items-center gap-2">
                <x-indicator>
                    <x-slot:badge>99+</x-slot:badge>
                    <button class="btn" aria-label="inbox">
                        <x-i type="inbox" variant="linear" class="w-5 h-5" />
                        Inbox
                    </button>
                </x-indicator>
                <span class="text-xs text-base-content/60">Inbox + unread count</span>
            </div>

            {{-- Avatar + new message badge with number --}}
            <div class="flex flex-col items-center gap-2">
                <x-indicator color="error">
                    <x-slot:badge>2</x-slot:badge>
                    <div class="avatar">
                        <div class="w-14 rounded-full bg-base-300 flex items-center justify-center">
                            <x-i type="chat-round" variant="linear" class="w-7 h-7 text-base-content/50" />
                        </div>
                    </div>
                </x-indicator>
                <span class="text-xs text-base-content/60">Avatar + new messages</span>
            </div>

            {{-- Card + "NEW" tag --}}
            <div class="flex flex-col items-center gap-2">
                <x-indicator color="warning" position="top-start">
                    <x-slot:badge>NEW</x-slot:badge>
                    <div class="w-40 h-24 bg-base-200 border border-base-300 rounded-[var(--radius-box)] flex items-center justify-center text-sm text-base-content/60">
                        product card
                    </div>
                </x-indicator>
                <span class="text-xs text-base-content/60">Card + "NEW" tag (top-start)</span>
            </div>
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-8">使い方</p>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim{{-- 最小 — top-end に "3" のバッジ (default color=error) --}}
&lt;x-indicator&gt;
    &lt;x-slot:badge&gt;3&lt;/x-slot:badge&gt;
    &lt;button class="btn btn-circle"&gt;...&lt;/button&gt;
&lt;/x-indicator&gt;

{{-- dot=true — テキスト無しの純ドット ("何かある" だけ伝える) --}}
&lt;x-indicator :dot="true" color="success" position="bottom-end"&gt;
    &lt;div class="avatar"&gt;...&lt;/div&gt;
&lt;/x-indicator&gt;

{{-- position: top-start / top-center / top-end (default)
              middle-start / middle-center / middle-end
              bottom-start / bottom-center / bottom-end --}}
&lt;x-indicator position="bottom-end"&gt;
    &lt;x-slot:badge&gt;5&lt;/x-slot:badge&gt;
    &lt;button class="btn btn-square"&gt;...&lt;/button&gt;
&lt;/x-indicator&gt;

{{-- color: error (default) / primary / secondary / accent / info / success / warning --}}
&lt;x-indicator color="primary"&gt;
    &lt;x-slot:badge&gt;NEW&lt;/x-slot:badge&gt;
    &lt;div&gt;...&lt;/div&gt;
&lt;/x-indicator&gt;

{{-- appearance: solid (default) / soft / outline / ghost / dash --}}
&lt;x-indicator appearance="soft" color="error"&gt;
    &lt;x-slot:badge&gt;3&lt;/x-slot:badge&gt;
    &lt;button class="btn btn-circle"&gt;...&lt;/button&gt;
&lt;/x-indicator&gt;
@endverbatim</code></pre>
@endsection
