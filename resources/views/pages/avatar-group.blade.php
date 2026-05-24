@extends('layouts.playground')

@section('title', '— Avatar Group')
@section('heading', 'Avatar Group')
@section('subheading', __('playground.subheading.avatar-group'))

@section('content')
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        spacing=normal — 4 avatars (initials)
    </p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-avatar-group>
            <x-avatar initials="AT" color="primary"   appearance="solid" />
            <x-avatar initials="MN" color="secondary" appearance="solid" />
            <x-avatar initials="KK" color="accent"    appearance="solid" />
            <x-avatar initials="SS" color="info"      appearance="solid" />
        </x-avatar-group>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">spacing variants — tight / normal / loose</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="flex flex-col gap-6">
            <div class="flex items-center gap-6">
                <span class="text-sm text-base-content/70 w-24">tight</span>
                <x-avatar-group spacing="tight">
                    <x-avatar initials="AT" color="primary"   appearance="solid" />
                    <x-avatar initials="MN" color="secondary" appearance="solid" />
                    <x-avatar initials="KK" color="accent"    appearance="solid" />
                    <x-avatar initials="SS" color="info"      appearance="solid" />
                    <x-avatar initials="RY" color="success"   appearance="solid" />
                </x-avatar-group>
                <span class="text-xs text-base-content/50">-space-x-6 (more overlap)</span>
            </div>
            <div class="flex items-center gap-6">
                <span class="text-sm text-base-content/70 w-24">normal</span>
                <x-avatar-group spacing="normal">
                    <x-avatar initials="AT" color="primary"   appearance="solid" />
                    <x-avatar initials="MN" color="secondary" appearance="solid" />
                    <x-avatar initials="KK" color="accent"    appearance="solid" />
                    <x-avatar initials="SS" color="info"      appearance="solid" />
                    <x-avatar initials="RY" color="success"   appearance="solid" />
                </x-avatar-group>
                <span class="text-xs text-base-content/50">-space-x-4 (default)</span>
            </div>
            <div class="flex items-center gap-6">
                <span class="text-sm text-base-content/70 w-24">loose</span>
                <x-avatar-group spacing="loose">
                    <x-avatar initials="AT" color="primary"   appearance="solid" />
                    <x-avatar initials="MN" color="secondary" appearance="solid" />
                    <x-avatar initials="KK" color="accent"    appearance="solid" />
                    <x-avatar initials="SS" color="info"      appearance="solid" />
                    <x-avatar initials="RY" color="success"   appearance="solid" />
                </x-avatar-group>
                <span class="text-xs text-base-content/50">-space-x-2 (less overlap)</span>
            </div>
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">real-world example — Project members + overflow badge</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="flex flex-col gap-6">
            <div class="flex items-center gap-4">
                <span class="text-sm text-base-content/70 w-36">Project members:</span>
                <x-avatar-group>
                    <x-avatar initials="AT" color="primary"   appearance="solid" />
                    <x-avatar initials="MN" color="secondary" appearance="solid" />
                    <x-avatar initials="KK" color="accent"    appearance="solid" />
                    <x-avatar initials="SS" color="info"      appearance="solid" />
                    <x-avatar initials="+12" color="neutral"  appearance="soft" />
                </x-avatar-group>
            </div>
            <div class="flex items-center gap-4">
                <span class="text-sm text-base-content/70 w-36">Reviewers (icons):</span>
                <x-avatar-group spacing="tight">
                    <x-avatar icon="user"         color="neutral" appearance="soft" />
                    <x-avatar icon="crown"        color="warning" appearance="soft" />
                    <x-avatar icon="shield-check" color="success" appearance="soft" />
                    <x-avatar icon="bell"         color="info"    appearance="soft" />
                </x-avatar-group>
            </div>
            <div class="flex items-center gap-4">
                <span class="text-sm text-base-content/70 w-36">Online now:</span>
                <x-avatar-group>
                    <x-avatar initials="AT" color="primary"   appearance="solid" status="online" />
                    <x-avatar initials="MN" color="secondary" appearance="solid" status="online" />
                    <x-avatar initials="KK" color="accent"    appearance="solid" status="away" />
                    <x-avatar initials="SS" color="info"      appearance="solid" status="busy" />
                </x-avatar-group>
            </div>
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">with sizes — sm / md (default) / lg</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="flex flex-col gap-6">
            <div class="flex items-center gap-6">
                <span class="text-sm text-base-content/70 w-16">sm</span>
                <x-avatar-group>
                    <x-avatar size="sm" initials="AT" color="primary"   appearance="solid" />
                    <x-avatar size="sm" initials="MN" color="secondary" appearance="solid" />
                    <x-avatar size="sm" initials="KK" color="accent"    appearance="solid" />
                    <x-avatar size="sm" initials="SS" color="info"      appearance="solid" />
                </x-avatar-group>
            </div>
            <div class="flex items-center gap-6">
                <span class="text-sm text-base-content/70 w-16">md</span>
                <x-avatar-group>
                    <x-avatar initials="AT" color="primary"   appearance="solid" />
                    <x-avatar initials="MN" color="secondary" appearance="solid" />
                    <x-avatar initials="KK" color="accent"    appearance="solid" />
                    <x-avatar initials="SS" color="info"      appearance="solid" />
                </x-avatar-group>
            </div>
            <div class="flex items-center gap-6">
                <span class="text-sm text-base-content/70 w-16">lg</span>
                <x-avatar-group spacing="tight">
                    <x-avatar size="lg" initials="AT" color="primary"   appearance="solid" />
                    <x-avatar size="lg" initials="MN" color="secondary" appearance="solid" />
                    <x-avatar size="lg" initials="KK" color="accent"    appearance="solid" />
                    <x-avatar size="lg" initials="SS" color="info"      appearance="solid" />
                </x-avatar-group>
            </div>
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-8">使い方</p>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim{{-- 最小 (spacing=normal default) --}}
&lt;x-avatar-group&gt;
    &lt;x-avatar initials="AT" color="primary"   appearance="solid" /&gt;
    &lt;x-avatar initials="MN" color="secondary" appearance="solid" /&gt;
    &lt;x-avatar initials="KK" color="accent"    appearance="solid" /&gt;
    &lt;x-avatar initials="SS" color="info"      appearance="solid" /&gt;
&lt;/x-avatar-group&gt;

{{-- spacing: tight (-space-x-6) / normal (-space-x-4) / loose (-space-x-2) --}}
&lt;x-avatar-group spacing="tight"&gt;
    &lt;x-avatar initials="AT" color="primary" appearance="solid" /&gt;
    &lt;x-avatar initials="MN" color="secondary" appearance="solid" /&gt;
&lt;/x-avatar-group&gt;

{{-- with overflow badge (extra members count) --}}
&lt;x-avatar-group&gt;
    &lt;x-avatar initials="AT" color="primary"  appearance="solid" /&gt;
    &lt;x-avatar initials="MN" color="secondary" appearance="solid" /&gt;
    &lt;x-avatar initials="KK" color="accent"   appearance="solid" /&gt;
    &lt;x-avatar initials="SS" color="info"     appearance="solid" /&gt;
    &lt;x-avatar initials="+12" color="neutral" appearance="soft" /&gt;
&lt;/x-avatar-group&gt;

{{-- with status indicators --}}
&lt;x-avatar-group&gt;
    &lt;x-avatar initials="AT" color="primary" appearance="solid" status="online" /&gt;
    &lt;x-avatar initials="MN" color="secondary" appearance="solid" status="busy" /&gt;
&lt;/x-avatar-group&gt;
@endverbatim</code></pre>
@endsection
