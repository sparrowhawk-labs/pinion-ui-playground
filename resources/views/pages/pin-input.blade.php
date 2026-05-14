@extends('layouts.playground')

@section('title', '— Pin Input')
@section('heading', 'Pin Input')
@section('subheading', 'OTP / 認証コード入力 — N 個の単一文字ボックスが auto-advance / backspace-back / arrow nav / paste-to-fill で連携。autocomplete="one-time-code" を最初のボックスに付与済 (iOS/Android で SMS コード候補が出る)。numeric (default) / alphanumeric、length / size / masked / autofocus 等の prop。combined value は hidden input で form submit される。')

@section('content')
    {{-- DEFAULT --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        length=6, type=numeric, size=md — 6 桁 OTP の典型
    </p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-pin-input name="otp" label="Verification code" hint="6 桁の認証コードを入力" />
    </div>

    {{-- PIN masked --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">masked — 4 桁 PIN を •••• 表示</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-pin-input name="pin" label="PIN" :length="4" masked hint="入力中は伏字" />
    </div>

    {{-- alphanumeric --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">alphanumeric — 8 文字の招待コード</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-pin-input name="invite" label="Invite code" :length="8" type="alphanumeric" size="sm" hint="英数字 (0-9 a-z A-Z)" />
    </div>

    {{-- pre-filled --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">pre-filled — value で初期値 "123" をセット (残り 3 桁を埋める)</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-pin-input name="otp" label="Code" :length="6" value="123" hint="続きを入力" />
    </div>

    {{-- size variants --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">size variants — xs / sm / md (default) / lg</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element space-y-4">
        @foreach (['xs', 'sm', 'md', 'lg'] as $sz)
            <div class="flex items-center gap-4">
                <span class="text-xs font-mono text-base-content/60 w-12">{{ $sz }}</span>
                <x-pin-input :size="$sz" :length="4" />
            </div>
        @endforeach
    </div>

    {{-- error state --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">error state — box border + ring が error tone に</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-pin-input name="otp" label="Verification code" :length="6" error="Code expired — request a new one" />
    </div>

    {{-- paste tip --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">paste 試し — 適当な 6 桁数字をコピーして 1 つ目の box に paste すると全 box が一気に埋まる</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-pin-input :length="6" hint="clipboard から '123456' を paste してみる" autofocus />
    </div>

    {{-- usage --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-8">使い方</p>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim{{-- 最小 — 6 桁 OTP (default) --}}
&lt;x-pin-input name="otp" label="Verification code" autofocus /&gt;

{{-- 4 桁 PIN を masked で --}}
&lt;x-pin-input name="pin" label="PIN" :length="4" masked /&gt;

{{-- 8 文字の英数字招待コード --}}
&lt;x-pin-input name="code" label="Invite code" :length="8" type="alphanumeric" /&gt;

{{-- 初期値セット --}}
&lt;x-pin-input :length="6" value="123" /&gt;

{{-- size: xs / sm / md (default) / lg --}}
&lt;x-pin-input size="sm" :length="4" /&gt;

{{-- error state — box border が error に flip --}}
&lt;x-pin-input :length="6" error="Code expired" /&gt;
@endverbatim</code></pre>
@endsection
