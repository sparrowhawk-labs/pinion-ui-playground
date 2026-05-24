@extends('layouts.playground')

@section('title', '— Rating')
@section('heading', 'Rating')
@section('subheading', __('playground.subheading.rating'))

@section('content')
    {{-- 1. デフォルト --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        デフォルト (max=5, size=md, color=warning, shape=star, value=0)
    </p>
    <div class="mb-6">
        <x-rating name="rating-default" />
    </div>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto mb-8"><code>@verbatim&lt;x-rating name="rating-default" /&gt;@endverbatim</code></pre>

    {{-- 2. value variants --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">value variants — 0 / 1 / 2 / 3 / 4 / 5</p>
    <div class="flex flex-col gap-2 mb-6">
        @foreach([0, 1, 2, 3, 4, 5] as $v)
            <div class="flex items-center gap-3">
                <span class="text-xs text-base-content/60 w-16">value={{ $v }}</span>
                <x-rating :name="'rating-value-'.$v" :value="$v" />
            </div>
        @endforeach
    </div>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto mb-8"><code>@verbatim&lt;x-rating name="rating-value-3" :value="3" /&gt;@endverbatim</code></pre>

    {{-- 3. size variants --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">size variants — xs / sm / md / lg / xl</p>
    <div class="flex flex-col gap-2 mb-6">
        @foreach(['xs', 'sm', 'md', 'lg', 'xl'] as $s)
            <div class="flex items-center gap-3">
                <span class="text-xs text-base-content/60 w-16">size={{ $s }}</span>
                <x-rating :name="'rating-size-'.$s" :size="$s" :value="3" />
            </div>
        @endforeach
    </div>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto mb-8"><code>@verbatim&lt;x-rating name="rating-size-lg" size="lg" :value="3" /&gt;@endverbatim</code></pre>

    {{-- 4. color variants --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">color variants — warning (default) / primary / secondary / accent / info / success / error</p>
    <div class="flex flex-col gap-2 mb-6">
        @foreach(['warning', 'primary', 'secondary', 'accent', 'info', 'success', 'error'] as $col)
            <div class="flex items-center gap-3">
                <span class="text-xs text-base-content/60 w-24">color={{ $col }}</span>
                <x-rating :name="'rating-color-'.$col" :color="$col" :value="4" />
            </div>
        @endforeach
    </div>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto mb-8"><code>@verbatim&lt;x-rating name="rating-color-primary" color="primary" :value="4" /&gt;@endverbatim</code></pre>

    {{-- 5. half=true --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">half=true — 0.5 刻みで星を半分塗れる</p>
    <div class="flex flex-col gap-2 mb-6">
        @foreach([2.5, 3.5, 4.5] as $v)
            <div class="flex items-center gap-3">
                <span class="text-xs text-base-content/60 w-16">value={{ $v }}</span>
                <x-rating :name="'rating-half-'.str_replace('.', '_', (string) $v)" :value="$v" :half="true" />
            </div>
        @endforeach
    </div>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto mb-8"><code>@verbatim&lt;x-rating name="rating-half-2_5" :value="2.5" :half="true" /&gt;@endverbatim</code></pre>

    {{-- 6. shape variants --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">shape variants — star (default) / heart / circle</p>
    <div class="flex flex-col gap-2 mb-6">
        @foreach(['star', 'heart', 'circle'] as $shape)
            <div class="flex items-center gap-3">
                <span class="text-xs text-base-content/60 w-16">{{ $shape }}</span>
                <x-rating :name="'rating-shape-'.$shape" :shape="$shape" :value="3" :color="$shape === 'heart' ? 'error' : ($shape === 'circle' ? 'primary' : 'warning')" />
            </div>
        @endforeach
    </div>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto mb-8"><code>@verbatim&lt;x-rating name="rating-heart" shape="heart" color="error" :value="3" /&gt;
&lt;x-rating name="rating-circle" shape="circle" color="primary" :value="3" /&gt;@endverbatim</code></pre>

    {{-- 7. readonly --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">readonly — 表示専用 (form クリック不可)</p>
    <div class="flex items-center gap-3 mb-6">
        <span class="text-xs text-base-content/60 w-24">value=4 (固定)</span>
        <x-rating name="rating-readonly" :value="4" :readonly="true" />
    </div>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto mb-8"><code>@verbatim&lt;x-rating name="rating-readonly" :value="4" :readonly="true" /&gt;@endverbatim</code></pre>

    {{-- 8. combo — heart + lg + half --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">combination — heart + lg + half (value=3.5)</p>
    <div class="mb-6">
        <x-rating name="rating-combo" shape="heart" size="lg" color="error" :value="3.5" :half="true" />
    </div>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto mb-8"><code>@verbatim&lt;x-rating
    name="rating-combo"
    shape="heart"
    size="lg"
    color="error"
    :value="3.5"
    :half="true"
/&gt;@endverbatim</code></pre>

    {{-- 9. usage notes --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-8">使い方</p>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim{{-- 基本 --}}
&lt;x-rating name="review" :value="4" /&gt;

{{-- size / color --}}
&lt;x-rating name="review" size="lg" color="primary" :value="3" /&gt;

{{-- 半分星 (0.5 刻み) --}}
&lt;x-rating name="review" :value="3.5" :half="true" /&gt;

{{-- 形状を変える --}}
&lt;x-rating name="like" shape="heart" color="error" :value="5" /&gt;

{{-- 表示専用 --}}
&lt;x-rating name="display" :value="4" :readonly="true" /&gt;

{{-- max を変える --}}
&lt;x-rating name="ten" :max="10" :value="7" /&gt;@endverbatim</code></pre>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-8">注意</p>
    <ul class="text-sm text-base-content/70 list-disc pl-5 space-y-1">
        <li><code class="text-xs bg-base-200 px-1 rounded">name</code> 属性は必須。同一ページに複数の rating を置く場合は必ず unique にする (radio group が衝突して単一選択になる)。</li>
        <li>半分星 (<code class="text-xs bg-base-200 px-1 rounded">:half="true"</code>) は <code class="text-xs bg-base-200 px-1 rounded">value</code> を 0.5 刻みで指定。各星が 2 つの radio (<code class="text-xs bg-base-200 px-1 rounded">mask-half-1</code> / <code class="text-xs bg-base-200 px-1 rounded">mask-half-2</code>) に分割される。</li>
        <li><code class="text-xs bg-base-200 px-1 rounded">readonly=true</code> は radio に <code class="text-xs bg-base-200 px-1 rounded">disabled</code> 属性を付与する。form 送信時は別途 hidden input で値を送ること。</li>
    </ul>
@endsection
