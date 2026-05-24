@extends('layouts.playground')

@section('title', '— Sidebar')
@section('heading', 'Sidebar')
@section('subheading', __('playground.subheading.sidebar'))

@section('content')
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        side=left / size=md / backdrop=true / closeOnBackdrop=true / escape=true — 各 iframe 内で trigger を押して動作を確認
    </p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <iframe src="/demo/sidebar-left"
                    class="w-full h-[420px] border border-base-300 rounded-[var(--radius-box)] bg-base-100"
                    title="Sidebar — side=left"></iframe>
                <p class="text-xs text-base-content/60 mt-2 px-1">左 (default) — side=left, size=md, backdrop=true</p>
            </div>
            <div>
                <iframe src="/demo/sidebar-right"
                    class="w-full h-[420px] border border-base-300 rounded-[var(--radius-box)] bg-base-100"
                    title="Sidebar — side=right"></iframe>
                <p class="text-xs text-base-content/60 mt-2 px-1">右 — side=right, size=md, backdrop=true</p>
            </div>
            <div>
                <iframe src="/demo/sidebar-no-backdrop"
                    class="w-full h-[420px] border border-base-300 rounded-[var(--radius-box)] bg-base-100"
                    title="Sidebar — no backdrop"></iframe>
                <p class="text-xs text-base-content/60 mt-2 px-1">no-backdrop — :backdrop="false" / 背景が操作可能</p>
            </div>
            <div>
                <iframe src="/demo/sidebar-with-content"
                    class="w-full h-[420px] border border-base-300 rounded-[var(--radius-box)] bg-base-100"
                    title="Sidebar — navigation content"></iframe>
                <p class="text-xs text-base-content/60 mt-2 px-1">with-content — 実用的なナビゲーション (logo + menu + user)</p>
            </div>
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">props 一覧</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <ul class="text-sm text-base-content/80 space-y-1.5">
            <li><code class="text-xs">id</code> — string|null (default: <code class="text-xs">sidebar_{uniqid()}</code>)。dispatch で外部から開閉する時に指定</li>
            <li><code class="text-xs">side</code> — <code class="text-xs">'left'</code> | <code class="text-xs">'right'</code> (default: <code class="text-xs">'left'</code>)</li>
            <li><code class="text-xs">size</code> — <code class="text-xs">'sm'</code> (w-64) | <code class="text-xs">'md'</code> (w-80) | <code class="text-xs">'lg'</code> (w-96) (default: <code class="text-xs">'md'</code>)</li>
            <li><code class="text-xs">backdrop</code> — bool (default: true)。false で半透明黒の dim 無し + 背景操作可能</li>
            <li><code class="text-xs">closeOnBackdrop</code> — bool (default: true)。backdrop=true の時のみ有効</li>
            <li><code class="text-xs">escape</code> — bool (default: true)。Escape キーで閉じる</li>
        </ul>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-8">使い方</p>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim{{-- 1. 最小: trigger slot 付き (default = side=left, size=md, backdrop あり) --}}
&lt;x-sidebar&gt;
    &lt;x-slot:trigger&gt;
        &lt;x-button&gt;Open&lt;/x-button&gt;
    &lt;/x-slot:trigger&gt;
    &lt;p&gt;drawer の中身&lt;/p&gt;
&lt;/x-sidebar&gt;

{{-- 2. 右配置 + lg サイズ --}}
&lt;x-sidebar side="right" size="lg"&gt;
    &lt;x-slot:trigger&gt;&lt;x-button&gt;詳細を開く&lt;/x-button&gt;&lt;/x-slot:trigger&gt;
    &lt;!-- 詳細パネル --&gt;
&lt;/x-sidebar&gt;

{{-- 3. backdrop なし — 永続的な inspector / ツールパレット用途
     overlay は pointer-events-none、panel のみ pointer-events-auto なので
     drawer を開いたまま本体ページを操作できる --}}
&lt;x-sidebar :backdrop="false"&gt;
    &lt;x-slot:trigger&gt;&lt;x-button&gt;Inspector&lt;/x-button&gt;&lt;/x-slot:trigger&gt;
    &lt;!-- inspector 内容 --&gt;
&lt;/x-sidebar&gt;

{{-- 4. id 指定 + dispatch で別所から開く --}}
&lt;x-sidebar id="filters" side="right"&gt;
    &lt;!-- filter UI --&gt;
&lt;/x-sidebar&gt;

&lt;button x-on:click="$dispatch('open-sidebar-filters')"&gt;Filters&lt;/button&gt;
&lt;!-- 閉じる: $dispatch('close-sidebar-filters') --&gt;

{{-- props: id, side='left', size='md', backdrop=true, closeOnBackdrop=true, escape=true --}}
{{-- size: sm (w-64) / md (w-80, default) / lg (w-96) --}}
{{-- a11y: role=dialog, aria-modal=true, x-trap.inert.noscroll --}}
{{-- 描画: x-teleport で body 直下 / slide-in アニメーション --}}
@endverbatim</code></pre>
@endsection
