@extends('layouts.playground')

@section('title', '— Popover')
@section('heading', 'Popover')
@section('subheading', 'クリック (or hover) でトリガー横に浮かぶ panel。dropdown と tooltip の中間 — 任意コンテンツ (info card / mini form / 確認 prompt) を入れる。4 placement (top/right/bottom/left) を CSS で配置 (collision detection なし)、optional arrow、trigger="click" (default) / "hover"。Alpine 駆動、ESC で close、click 外で close。')

@section('content')
    {{-- DEFAULT --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        placement=bottom, arrow=true, trigger=click — Help ボタンをクリックして情報パネルを開く
    </p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-popover>
            <x-slot:triggerSlot>
                <x-button appearance="outline" color="neutral" size="sm">
                    <x-i type="question-circle" variant="linear" class="w-4 h-4" /> Help
                </x-button>
            </x-slot:triggerSlot>
            <p class="font-medium mb-1">About this field</p>
            <p class="text-sm text-base-content/70">Enter the email address you used at signup. We'll send a reset link if it matches an account.</p>
        </x-popover>
    </div>

    {{-- 4 placements --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">4 placements — top / right / bottom / left</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 place-items-center py-8">
            @foreach (['top', 'right', 'bottom', 'left'] as $p)
                <x-popover :placement="$p" width="w-56">
                    <x-slot:triggerSlot>
                        <x-button appearance="outline" color="neutral" size="sm">{{ $p }}</x-button>
                    </x-slot:triggerSlot>
                    <p class="text-sm">placement="<code>{{ $p }}</code>" の panel。trigger をクリック / もう一度クリック で閉じる。</p>
                </x-popover>
            @endforeach
        </div>
    </div>

    {{-- confirmation prompt --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">confirmation prompt — Delete ボタンの直上に確認</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-popover placement="top" width="w-64">
            <x-slot:triggerSlot>
                <x-button color="error" appearance="outline" size="sm">Delete</x-button>
            </x-slot:triggerSlot>
            <p class="font-medium mb-2">Delete this item?</p>
            <p class="text-sm text-base-content/70 mb-3">This action can't be undone.</p>
            <div class="flex justify-end gap-2">
                <x-button size="sm" appearance="ghost" x-on:click="open = false">Cancel</x-button>
                <x-button size="sm" color="error" x-on:click="open = false">Delete</x-button>
            </div>
        </x-popover>
    </div>

    {{-- mini form --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">mini form — フィルタ panel</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-popover placement="bottom" width="w-80">
            <x-slot:triggerSlot>
                <x-button appearance="outline" color="neutral">Filter</x-button>
            </x-slot:triggerSlot>
            <p class="font-medium mb-2">Filter results</p>
            <x-input size="sm" label="Keyword" name="q" />
            <div class="mt-3">
                <x-select size="sm" label="Sort by" name="sort">
                    <option value="new">Newest</option>
                    <option value="old">Oldest</option>
                </x-select>
            </div>
            <div class="flex justify-end gap-2 mt-4">
                <x-button size="sm" appearance="ghost" x-on:click="open = false">Cancel</x-button>
                <x-button size="sm" color="primary" x-on:click="open = false">Apply</x-button>
            </div>
        </x-popover>
    </div>

    {{-- hover trigger --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">trigger=hover — info-only popover (inputs を含めると操作不能)</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <p class="text-sm">出張時間は
            <x-popover trigger="hover" placement="top" width="w-fit">
                <x-slot:triggerSlot>
                    <span class="underline decoration-dotted cursor-help font-medium">JST</span>
                </x-slot:triggerSlot>
                <p class="text-sm">Japan Standard Time (UTC+9)</p>
            </x-popover>
            で表示されます。
        </p>
    </div>

    {{-- arrowless --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">arrow=false — context menu 風のミニ panel</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-popover :arrow="false" width="w-48">
            <x-slot:triggerSlot>
                <x-button appearance="ghost" size="sm" class="!p-1">
                    <x-i type="more-horizontal" variant="linear" class="w-5 h-5" />
                </x-button>
            </x-slot:triggerSlot>
            <ul class="text-sm space-y-1">
                <li><a href="#" class="block hover:bg-base-200 rounded px-2 py-1">Edit</a></li>
                <li><a href="#" class="block hover:bg-base-200 rounded px-2 py-1">Duplicate</a></li>
                <li><a href="#" class="block hover:bg-base-200 rounded px-2 py-1 text-error">Delete</a></li>
            </ul>
        </x-popover>
    </div>

    {{-- usage --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-8">使い方</p>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim{{-- 最小 — triggerSlot + slot --}}
&lt;x-popover&gt;
    &lt;x-slot:triggerSlot&gt;
        &lt;x-button size="sm"&gt;Help&lt;/x-button&gt;
    &lt;/x-slot:triggerSlot&gt;
    &lt;p&gt;Panel content here.&lt;/p&gt;
&lt;/x-popover&gt;

{{-- placement: top / right / bottom (default) / left --}}
&lt;x-popover placement="top"&gt;...&lt;/x-popover&gt;

{{-- width: Tailwind utility (default w-72) --}}
&lt;x-popover width="w-80"&gt;...&lt;/x-popover&gt;

{{-- arrow off — context menu 風 --}}
&lt;x-popover :arrow="false"&gt;...&lt;/x-popover&gt;

{{-- trigger=hover (info-only, inputs を含めない) --}}
&lt;x-popover trigger="hover" placement="top"&gt;
    &lt;x-slot:triggerSlot&gt;&lt;span class="underline decoration-dotted"&gt;JST&lt;/span&gt;&lt;/x-slot:triggerSlot&gt;
    &lt;p&gt;Japan Standard Time (UTC+9)&lt;/p&gt;
&lt;/x-popover&gt;

{{-- panel 内から閉じる — Alpine の open が wrapper scope に居る --}}
&lt;x-popover&gt;
    &lt;x-slot:triggerSlot&gt;&lt;x-button&gt;Confirm&lt;/x-button&gt;&lt;/x-slot:triggerSlot&gt;
    &lt;p&gt;Delete this?&lt;/p&gt;
    &lt;x-button x-on:click="open = false"&gt;Cancel&lt;/x-button&gt;
&lt;/x-popover&gt;
@endverbatim</code></pre>
@endsection
