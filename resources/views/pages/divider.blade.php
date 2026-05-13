@extends('layouts.playground')

@section('title', '— Divider')
@section('heading', 'Divider')
@section('subheading', 'daisyUI 5 の divider クラスをラップしたセクション区切り線。@verbatim<x-divider>@endverbatim でただの線、slot にテキストを入れるとラベル付き。direction=vertical で flex 内の縦線にもなる。')

@section('content')
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        ラベルなし — ただの仕切り線
    </p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 px-element py-element">
        <p>上のセクション</p>
        <x-divider />
        <p>下のセクション</p>
    </div>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto mb-8"><code>@verbatim&lt;x-divider /&gt;@endverbatim</code></pre>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">with label — slot にテキスト</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 px-element py-element">
        <p>ログインフォーム</p>
        <x-divider>OR</x-divider>
        <p>ソーシャルログイン</p>
    </div>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto mb-8"><code>@verbatim&lt;x-divider&gt;OR&lt;/x-divider&gt;@endverbatim</code></pre>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">position variants — center (default) / start / end</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 px-element py-element">
        <x-divider>center (default)</x-divider>
        <x-divider position="start">start</x-divider>
        <x-divider position="end">end</x-divider>
    </div>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto mb-8"><code>@verbatim&lt;x-divider&gt;center (default)&lt;/x-divider&gt;
&lt;x-divider position="start"&gt;start&lt;/x-divider&gt;
&lt;x-divider position="end"&gt;end&lt;/x-divider&gt;@endverbatim</code></pre>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">color variants — null (default) / primary / secondary / accent / info / success / warning / error / neutral</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 px-element py-element">
        <x-divider>default (no color)</x-divider>
        <x-divider color="primary">primary</x-divider>
        <x-divider color="secondary">secondary</x-divider>
        <x-divider color="accent">accent</x-divider>
        <x-divider color="info">info</x-divider>
        <x-divider color="success">success</x-divider>
        <x-divider color="warning">warning</x-divider>
        <x-divider color="error">error</x-divider>
        <x-divider color="neutral">neutral</x-divider>
    </div>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto mb-8"><code>@verbatim&lt;x-divider color="primary"&gt;primary&lt;/x-divider&gt;
&lt;x-divider color="success"&gt;success&lt;/x-divider&gt;
&lt;x-divider color="error"&gt;error&lt;/x-divider&gt;@endverbatim</code></pre>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">vertical divider — flex 内に置く縦線</p>
    <div class="mb-4 border border-base-300 rounded-[var(--radius-box)] bg-base-100 px-element py-element">
        <div class="flex w-full">
            <div class="flex-1 grid place-items-center py-6">Left</div>
            <x-divider direction="vertical">OR</x-divider>
            <div class="flex-1 grid place-items-center py-6">Right</div>
        </div>
    </div>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 px-element py-element">
        <div class="flex w-full">
            <div class="flex-1 grid place-items-center py-6">A</div>
            <x-divider direction="vertical" color="primary" />
            <div class="flex-1 grid place-items-center py-6">B</div>
            <x-divider direction="vertical" color="success">VS</x-divider>
            <div class="flex-1 grid place-items-center py-6">C</div>
        </div>
    </div>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto mb-8"><code>@verbatim&lt;div class="flex w-full"&gt;
    &lt;div&gt;Left&lt;/div&gt;
    &lt;x-divider direction="vertical"&gt;OR&lt;/x-divider&gt;
    &lt;div&gt;Right&lt;/div&gt;
&lt;/div&gt;@endverbatim</code></pre>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">real-world examples — ログイン分割 / card section</p>
    <div class="grid md:grid-cols-2 gap-6 mb-8">
        {{-- Login form with OR divider --}}
        <div class="border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
            <h3 class="font-medium mb-3">ログイン</h3>
            <div class="space-y-2">
                <input type="email" placeholder="email" class="input input-bordered w-full" />
                <input type="password" placeholder="password" class="input input-bordered w-full" />
                <button class="btn btn-primary w-full">ログイン</button>
            </div>
            <x-divider>または</x-divider>
            <div class="space-y-2">
                <button class="btn btn-outline w-full">Google でログイン</button>
                <button class="btn btn-outline w-full">GitHub でログイン</button>
            </div>
        </div>

        {{-- Card section with divider --}}
        <div class="border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
            <h3 class="font-medium mb-2">プロフィール</h3>
            <p class="text-sm text-base-content/70">アカウント情報を編集できます。</p>
            <x-divider position="start" color="primary">基本情報</x-divider>
            <p class="text-sm">名前: tatun55</p>
            <p class="text-sm">メール: tatun@example.com</p>
            <x-divider position="start" color="primary">通知設定</x-divider>
            <p class="text-sm">メール通知: ON</p>
            <p class="text-sm">プッシュ通知: OFF</p>
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-8">使い方</p>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim{{-- ただの仕切り線 --}}
&lt;x-divider /&gt;

{{-- ラベル付き --}}
&lt;x-divider&gt;OR&lt;/x-divider&gt;

{{-- color --}}
&lt;x-divider color="primary"&gt;Primary&lt;/x-divider&gt;

{{-- ラベル位置 (center / start / end) --}}
&lt;x-divider position="start"&gt;Section&lt;/x-divider&gt;

{{-- 縦線 (flex 内に置く) --}}
&lt;div class="flex"&gt;
    &lt;div&gt;Left&lt;/div&gt;
    &lt;x-divider direction="vertical"&gt;OR&lt;/x-divider&gt;
    &lt;div&gt;Right&lt;/div&gt;
&lt;/div&gt;@endverbatim</code></pre>
@endsection
