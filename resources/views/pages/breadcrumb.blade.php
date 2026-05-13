@extends('layouts.playground')

@section('title', '— Breadcrumb')
@section('heading', 'Breadcrumb')
@section('subheading', '階層ナビゲーション。daisyUI 5 の breadcrumbs class を wrap。dual API: items 配列で渡すか、自前で &lt;ul&gt; に &lt;li&gt; を書くか。最後の item (url 省略) は現在地として link 化しない。separator は chevron (default) / slash の 2 種、size は sm / md / lg。')

@section('content')
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        items API — size=md, separator=chevron
    </p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Docs', 'url' => '/docs'],
            ['label' => 'Breadcrumb'],
        ]" />
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">items API vs slot API — 同じ結果を 2 つの書き方で</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element space-y-4">
        <div>
            <p class="text-xs text-base-content/60 mb-1">items 配列</p>
            <x-breadcrumb :items="[
                ['label' => 'Home', 'url' => '/'],
                ['label' => 'Products', 'url' => '/products'],
                ['label' => 'Detail'],
            ]" />
        </div>
        <div>
            <p class="text-xs text-base-content/60 mb-1">slot で自前 li</p>
            <x-breadcrumb>
                <li><a href="/">Home</a></li>
                <li><a href="/products">Products</a></li>
                <li><span>Detail</span></li>
            </x-breadcrumb>
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">separator variants — chevron (default) / slash</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element space-y-3">
        <div>
            <p class="text-xs text-base-content/60 mb-1">chevron (default)</p>
            <x-breadcrumb separator="chevron" :items="[
                ['label' => 'Home', 'url' => '/'],
                ['label' => 'Settings', 'url' => '/settings'],
                ['label' => 'Profile'],
            ]" />
        </div>
        <div>
            <p class="text-xs text-base-content/60 mb-1">slash</p>
            <x-breadcrumb separator="slash" :items="[
                ['label' => 'Home', 'url' => '/'],
                ['label' => 'Settings', 'url' => '/settings'],
                ['label' => 'Profile'],
            ]" />
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">size variants — sm / md / lg</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element space-y-3">
        <div>
            <p class="text-xs text-base-content/60 mb-1">sm</p>
            <x-breadcrumb size="sm" :items="[
                ['label' => 'Home', 'url' => '/'],
                ['label' => 'Library', 'url' => '/library'],
                ['label' => 'Books'],
            ]" />
        </div>
        <div>
            <p class="text-xs text-base-content/60 mb-1">md (default)</p>
            <x-breadcrumb size="md" :items="[
                ['label' => 'Home', 'url' => '/'],
                ['label' => 'Library', 'url' => '/library'],
                ['label' => 'Books'],
            ]" />
        </div>
        <div>
            <p class="text-xs text-base-content/60 mb-1">lg</p>
            <x-breadcrumb size="lg" :items="[
                ['label' => 'Home', 'url' => '/'],
                ['label' => 'Library', 'url' => '/library'],
                ['label' => 'Books'],
            ]" />
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">real-world — 長いパス (5 階層) + slash + sm</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-breadcrumb size="sm" separator="slash" :items="[
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Organization', 'url' => '/org'],
            ['label' => 'Yakaze Tech Studio', 'url' => '/org/yakaze'],
            ['label' => 'Projects', 'url' => '/org/yakaze/projects'],
            ['label' => 'pinion-ui', 'url' => '/org/yakaze/projects/pinion-ui'],
            ['label' => 'Breadcrumb'],
        ]" />
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">real-world — slot API で icon + label を組み合わせ</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-breadcrumb>
            <li>
                <a href="/">
                    <x-i type="home-2" variant="linear" class="w-4 h-4" />
                    Home
                </a>
            </li>
            <li>
                <a href="/docs">
                    <x-i type="document-text" variant="linear" class="w-4 h-4" />
                    Docs
                </a>
            </li>
            <li>
                <span class="inline-flex items-center gap-1">
                    <x-i type="bookmark" variant="linear" class="w-4 h-4" />
                    Breadcrumb
                </span>
            </li>
        </x-breadcrumb>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-8">使い方</p>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim{{-- items 配列で渡す (最後の url 省略 = 現在地) --}}
&lt;x-breadcrumb :items="[
    ['label' =&gt; 'Home', 'url' =&gt; '/'],
    ['label' =&gt; 'Docs', 'url' =&gt; '/docs'],
    ['label' =&gt; 'Breadcrumb'],
]" /&gt;

{{-- slot で自前に書く (icon 等を混ぜたい時) --}}
&lt;x-breadcrumb&gt;
    &lt;li&gt;&lt;a href="/"&gt;&lt;x-i type="home-2" variant="linear" class="w-4 h-4" /&gt; Home&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a href="/docs"&gt;Docs&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;span&gt;Breadcrumb&lt;/span&gt;&lt;/li&gt;
&lt;/x-breadcrumb&gt;

{{-- separator: chevron (default) / slash --}}
&lt;x-breadcrumb separator="slash" :items="[...]" /&gt;

{{-- size: sm / md (default) / lg --}}
&lt;x-breadcrumb size="lg" :items="[...]" /&gt;
@endverbatim</code></pre>
@endsection
