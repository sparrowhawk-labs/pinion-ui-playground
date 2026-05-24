@extends('layouts.playground')

@section('title', '— Spinner')
@section('heading', 'Spinner')
@section('subheading', __('playground.subheading.spinner'))

@section('content')
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        単独表示 — variant=spinner, size=md, color=null
    </p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-spinner />
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">variants — spinner / dots / ring / bars / ball / infinity</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="flex items-center gap-8">
            <div class="flex flex-col items-center gap-2">
                <x-spinner variant="spinner" />
                <span class="text-xs text-base-content/60">spinner</span>
            </div>
            <div class="flex flex-col items-center gap-2">
                <x-spinner variant="dots" />
                <span class="text-xs text-base-content/60">dots</span>
            </div>
            <div class="flex flex-col items-center gap-2">
                <x-spinner variant="ring" />
                <span class="text-xs text-base-content/60">ring</span>
            </div>
            <div class="flex flex-col items-center gap-2">
                <x-spinner variant="bars" />
                <span class="text-xs text-base-content/60">bars</span>
            </div>
            <div class="flex flex-col items-center gap-2">
                <x-spinner variant="ball" />
                <span class="text-xs text-base-content/60">ball</span>
            </div>
            <div class="flex flex-col items-center gap-2">
                <x-spinner variant="infinity" />
                <span class="text-xs text-base-content/60">infinity</span>
            </div>
        </div>
        <pre class="mt-4 text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim&lt;x-spinner variant="spinner" /&gt;
&lt;x-spinner variant="dots" /&gt;
&lt;x-spinner variant="ring" /&gt;
&lt;x-spinner variant="bars" /&gt;
&lt;x-spinner variant="ball" /&gt;
&lt;x-spinner variant="infinity" /&gt;@endverbatim</code></pre>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">size variants — xs / sm / md / lg / xl</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="flex items-end gap-6">
            <div class="flex flex-col items-center gap-2">
                <x-spinner size="xs" />
                <span class="text-xs text-base-content/60">xs</span>
            </div>
            <div class="flex flex-col items-center gap-2">
                <x-spinner size="sm" />
                <span class="text-xs text-base-content/60">sm</span>
            </div>
            <div class="flex flex-col items-center gap-2">
                <x-spinner size="md" />
                <span class="text-xs text-base-content/60">md</span>
            </div>
            <div class="flex flex-col items-center gap-2">
                <x-spinner size="lg" />
                <span class="text-xs text-base-content/60">lg</span>
            </div>
            <div class="flex flex-col items-center gap-2">
                <x-spinner size="xl" />
                <span class="text-xs text-base-content/60">xl</span>
            </div>
        </div>
        <div class="flex items-end gap-6 mt-6">
            <div class="flex flex-col items-center gap-2">
                <x-spinner variant="ring" size="xs" />
                <span class="text-xs text-base-content/60">xs</span>
            </div>
            <div class="flex flex-col items-center gap-2">
                <x-spinner variant="ring" size="sm" />
                <span class="text-xs text-base-content/60">sm</span>
            </div>
            <div class="flex flex-col items-center gap-2">
                <x-spinner variant="ring" size="md" />
                <span class="text-xs text-base-content/60">md</span>
            </div>
            <div class="flex flex-col items-center gap-2">
                <x-spinner variant="ring" size="lg" />
                <span class="text-xs text-base-content/60">lg</span>
            </div>
            <div class="flex flex-col items-center gap-2">
                <x-spinner variant="ring" size="xl" />
                <span class="text-xs text-base-content/60">xl</span>
            </div>
        </div>
        <pre class="mt-4 text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim&lt;x-spinner size="xs" /&gt;
&lt;x-spinner size="sm" /&gt;
&lt;x-spinner size="md" /&gt;  {{-- default --}}
&lt;x-spinner size="lg" /&gt;
&lt;x-spinner size="xl" /&gt;@endverbatim</code></pre>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">color variants — default / primary / secondary / accent / info / success / warning / error</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="flex items-end gap-6 flex-wrap">
            <div class="flex flex-col items-center gap-2">
                <x-spinner />
                <span class="text-xs text-base-content/60">default</span>
            </div>
            <div class="flex flex-col items-center gap-2">
                <x-spinner color="primary" />
                <span class="text-xs text-base-content/60">primary</span>
            </div>
            <div class="flex flex-col items-center gap-2">
                <x-spinner color="secondary" />
                <span class="text-xs text-base-content/60">secondary</span>
            </div>
            <div class="flex flex-col items-center gap-2">
                <x-spinner color="accent" />
                <span class="text-xs text-base-content/60">accent</span>
            </div>
            <div class="flex flex-col items-center gap-2">
                <x-spinner color="info" />
                <span class="text-xs text-base-content/60">info</span>
            </div>
            <div class="flex flex-col items-center gap-2">
                <x-spinner color="success" />
                <span class="text-xs text-base-content/60">success</span>
            </div>
            <div class="flex flex-col items-center gap-2">
                <x-spinner color="warning" />
                <span class="text-xs text-base-content/60">warning</span>
            </div>
            <div class="flex flex-col items-center gap-2">
                <x-spinner color="error" />
                <span class="text-xs text-base-content/60">error</span>
            </div>
        </div>
        <pre class="mt-4 text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim&lt;x-spinner /&gt;                       {{-- default (currentColor) --}}
&lt;x-spinner color="primary" /&gt;
&lt;x-spinner color="success" /&gt;
&lt;x-spinner color="error" /&gt;@endverbatim</code></pre>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">real-world example — button 内 spinner</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="flex items-center gap-3 flex-wrap">
            <x-button color="primary">
                <x-spinner size="sm" />
                Loading...
            </x-button>
            <x-button color="success" appearance="outline">
                <x-spinner size="sm" variant="dots" />
                Saving
            </x-button>
            <x-button color="neutral" appearance="soft" size="sm">
                <x-spinner size="xs" />
                Loading...
            </x-button>
            <x-button color="error" size="lg">
                <x-spinner size="sm" variant="ring" />
                Deleting...
            </x-button>
        </div>
        <pre class="mt-4 text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim&lt;x-button color="primary"&gt;
    &lt;x-spinner size="sm" /&gt;
    Loading...
&lt;/x-button&gt;

&lt;x-button color="success" appearance="outline"&gt;
    &lt;x-spinner size="sm" variant="dots" /&gt;
    Saving
&lt;/x-button&gt;@endverbatim</code></pre>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-8">使い方</p>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim{{-- default (spinner + md + currentColor) --}}
&lt;x-spinner /&gt;

{{-- variant: spinner (default) / dots / ring / bars / ball / infinity --}}
&lt;x-spinner variant="ring" /&gt;

{{-- size: xs / sm / md (default) / lg / xl --}}
&lt;x-spinner size="lg" /&gt;

{{-- color: null (default = currentColor) / primary / secondary / accent / info / success / warning / error --}}
&lt;x-spinner color="primary" /&gt;

{{-- 組み合わせ --}}
&lt;x-spinner variant="ring" size="xl" color="success" /&gt;

{{-- button 内 --}}
&lt;x-button color="primary"&gt;
    &lt;x-spinner size="sm" /&gt;
    Loading...
&lt;/x-button&gt;
@endverbatim</code></pre>
@endsection
