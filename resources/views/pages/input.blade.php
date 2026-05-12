@extends('layouts.playground')

@section('title', '— Input')
@section('heading', 'Inputs')
@section('subheading', 'color × appearance (outline / soft / underline / ghost) — プレフィックス/サフィックス, アイコン, フローティングラベル, アペンドスロット対応')

@section('content')
    {{-- 1. appearance matrix × colors --}}
    @foreach(['outline','soft','underline','ghost'] as $app)
        <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">{{ $app }}</p>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-compact mb-6">
            @foreach(['neutral','primary','info','success','warning','error'] as $c)
                <x-input :appearance="$app" :color="$c" placeholder="{{ $c }}" />
            @endforeach
        </div>
    @endforeach

    {{-- 2. sizes --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Sizes</p>
    <div class="grid grid-cols-3 gap-compact mb-6">
        @foreach(['sm','md','lg'] as $s)
            <x-input :size="$s" placeholder="size {{ $s }}" />
        @endforeach
    </div>

    {{-- 3. label / hint / error / corner hint --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Label &amp; helper text</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-element mb-6">
        <x-input label="メールアドレス" name="email" placeholder="you@example.com" hint="半角英数字で入力" />
        <x-input label="パスワード" name="password" type="password" required corner-hint="必須" placeholder="8 文字以上" />
        <x-input label="ユーザー名" name="user" placeholder="take***" error="このユーザー名は既に使用されています" />
        <x-input label="メモ" corner-hint="最大 100 文字" placeholder="任意入力" hint="空欄可" />
    </div>

    {{-- 4. icon left / right --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">With icon</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-element mb-6">
        <x-input icon-left="magnifer" placeholder="検索…" />
        <x-input icon-right="calendar" placeholder="日付を選択" />
        <x-input icon-left="letter" placeholder="name@company.com" color="success" hint="OK" />
        <x-input icon-left="lock-password" type="password" icon-right="eye" placeholder="パスワード" />
    </div>

    {{-- 5. prefix / suffix --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Prefix / Suffix (input group)</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-element mb-6">
        <x-input prefix="https://" placeholder="example.com" />
        <x-input suffix=".com" placeholder="example" />
        <x-input prefix="¥" suffix="税込" placeholder="0" />
        <x-input prefix="@" placeholder="username" />
    </div>

    {{-- 6. append slot (button inside) --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Append slot (button inside)</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-element mb-6">
        <x-input placeholder="キーワードを入力">
            <x-slot:append>
                <button type="button" class="px-[var(--px-field-md)] bg-primary text-primary-content text-[length:var(--text-field-sm)] font-medium cursor-pointer hover:bg-primary/90 transition-colors">
                    検索
                </button>
            </x-slot:append>
        </x-input>
        <x-input placeholder="コードを入力" icon-left="key">
            <x-slot:append>
                <button type="button" class="px-[var(--px-field-md)] bg-base-200 text-base-content border-l border-base-300 text-[length:var(--text-field-sm)] font-medium cursor-pointer hover:bg-base-300 transition-colors">
                    適用
                </button>
            </x-slot:append>
        </x-input>
    </div>

    {{-- 7. floating label — all sizes × icon yes/no --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Floating label — without icon</p>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-element mb-4">
        <x-input floating size="sm" label="sm: ユーザー名" name="floating_user_sm" />
        <x-input floating size="md" label="md: メールアドレス" name="floating_email_md" type="email" />
        <x-input floating size="lg" label="lg: 電話番号" name="floating_tel_lg" type="tel" required />
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Floating label — with icon</p>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-element mb-4">
        <x-input floating size="sm" label="sm: 検索" icon-left="magnifer" name="floating_search_sm" />
        <x-input floating size="md" label="md: メールアドレス" icon-left="letter" type="email" name="floating_email_icon_md" />
        <x-input floating size="lg" label="lg: 電話番号" icon-left="phone" type="tel" required name="floating_tel_icon_lg" />
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Floating label — appearance variants</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-element mb-6">
        <x-input floating label="Soft appearance" appearance="soft" />
        <x-input floating label="Underline appearance" appearance="underline" />
        <x-input floating label="Ghost appearance" appearance="ghost" icon-left="user" />
        <x-input floating label="エラー例" icon-left="info-circle" error="入力内容が正しくありません" />
    </div>

    {{-- 8. disabled / readonly --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Disabled / Readonly</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-element">
        <x-input label="Disabled" disabled placeholder="入力不可" />
        <x-input label="Readonly" readonly value="変更不可の値" />
    </div>
@endsection
