@extends('layouts.playground')

@section('title', '— Input Group')
@section('heading', 'Input Group')
@section('subheading', __('playground.subheading.input-group'))

@section('content')
    @php
        $c = \SparrowhawkLabs\PinionUi\Compose\InputGroupComposer::compose([]);
        $addon = $c['addon'];
    @endphp

    {{-- DEFAULT --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        2 input pair (first + last name) — 同格 input を 2 つ joined
    </p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element max-w-md">
        <x-input-group label="Full name">
            <x-input name="first" placeholder="First" />
            <x-input name="last"  placeholder="Last" />
        </x-input-group>
    </div>

    {{-- text addon --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">text addon — `https://` `$` `@` 等を addon class で渡す</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element max-w-md space-y-4">
        <x-input-group label="Website">
            <span class="{{ $addon }}">https://</span>
            <x-input name="url" placeholder="example.com" />
        </x-input-group>

        <x-input-group label="Amount">
            <span class="{{ $addon }}">$</span>
            <x-input type="number" name="amount" value="0" />
            <span class="{{ $addon }}">.00</span>
        </x-input-group>

        <x-input-group label="Email">
            <x-input name="local" placeholder="user" />
            <span class="{{ $addon }}">@</span>
            <x-input name="domain" placeholder="example.com" />
        </x-input-group>
    </div>

    {{-- select + input --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">select + input — country code + phone</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element max-w-md">
        <x-input-group label="Phone">
            <x-select name="country">
                <option value="+81">JP +81</option>
                <option value="+1">US +1</option>
                <option value="+44">UK +44</option>
            </x-select>
            <x-input type="tel" name="phone" placeholder="90-1234-5678" />
        </x-input-group>
    </div>

    {{-- input + button --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">input + button — search bar</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element max-w-md">
        <x-input-group>
            <x-input type="search" name="q" placeholder="Search…" />
            <x-button type="submit" appearance="solid" color="primary">Go</x-button>
        </x-input-group>
    </div>

    {{-- size variants --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">size variants — sm / md / lg (child の `size` も合わせて渡すこと)</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element max-w-md space-y-4">
        @foreach (['xs', 'sm', 'md', 'lg'] as $sz)
            @php $c2 = \SparrowhawkLabs\PinionUi\Compose\InputGroupComposer::compose(['size' => $sz]); @endphp
            <x-input-group :size="$sz">
                <span class="{{ $c2['addon'] }}">{{ $sz }}</span>
                <x-input :size="$sz" placeholder="size {{ $sz }}" />
                <x-button :size="$sz" appearance="outline" color="neutral">Go</x-button>
            </x-input-group>
        @endforeach
    </div>

    {{-- error state --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">error state — label/hint が text-error</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element max-w-md">
        <x-input-group label="Email" error="Domain not recognised">
            <x-input name="local" placeholder="user" />
            <span class="{{ $addon }}">@</span>
            <x-input name="domain" placeholder="example.com" />
        </x-input-group>
    </div>

    {{-- usage --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-8">使い方</p>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim{{-- 同格 input 2 つ --}}
&lt;x-input-group label="Full name"&gt;
    &lt;x-input name="first" placeholder="First" /&gt;
    &lt;x-input name="last"  placeholder="Last" /&gt;
&lt;/x-input-group&gt;

{{-- addon class でテキスト装飾を渡す --}}
@php $c = SparrowhawkLabs\PinionUi\Compose\InputGroupComposer::compose([]); @endphp
&lt;x-input-group label="Website"&gt;
    &lt;span class="{{ $c['addon'] }}"&gt;https://&lt;/span&gt;
    &lt;x-input name="url" placeholder="example.com" /&gt;
&lt;/x-input-group&gt;

{{-- select + input --}}
&lt;x-input-group label="Phone"&gt;
    &lt;x-select name="country"&gt;
        &lt;option value="+81"&gt;JP +81&lt;/option&gt;
        &lt;option value="+1"&gt;US +1&lt;/option&gt;
    &lt;/x-select&gt;
    &lt;x-input type="tel" name="phone" /&gt;
&lt;/x-input-group&gt;

{{-- input + submit button --}}
&lt;x-input-group&gt;
    &lt;x-input type="search" name="q" placeholder="Search…" /&gt;
    &lt;x-button type="submit" color="primary"&gt;Go&lt;/x-button&gt;
&lt;/x-input-group&gt;

{{-- size — wrapper と child の両方に size を揃える --}}
&lt;x-input-group size="sm"&gt;
    &lt;x-input size="sm" placeholder="Compact" /&gt;
    &lt;x-button size="sm"&gt;Send&lt;/x-button&gt;
&lt;/x-input-group&gt;
@endverbatim</code></pre>
@endsection
