@extends('layouts.playground')

@section('title', '— Textarea')
@section('heading', 'Textareas')
@section('subheading', 'color × appearance (outline / soft / underline / ghost) — rows, autoresize, character counter, label/hint/error')

@section('content')
    {{-- 1. appearance matrix × colors --}}
    @foreach(['outline','soft','underline','ghost'] as $app)
        <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
            @if($app === 'outline')<span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>@endif
            {{ $app }}
        </p>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-compact mb-6">
            @foreach(['neutral','primary','info','success','warning','error'] as $c)
                <x-textarea :appearance="$app" :color="$c" rows="2" placeholder="{{ $c }}" />
            @endforeach
        </div>
    @endforeach

    {{-- 2. sizes --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Sizes</p>
    <div class="grid grid-cols-3 gap-compact mb-6">
        @foreach(['sm','md','lg'] as $s)
            <x-textarea :size="$s" rows="2" placeholder="size {{ $s }}" />
        @endforeach
    </div>

    {{-- 3. rows --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Rows (initial height)</p>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-element mb-6">
        <x-textarea rows="2" placeholder="rows=2" />
        <x-textarea rows="4" placeholder="rows=4" />
        <x-textarea rows="6" placeholder="rows=6" />
    </div>

    {{-- 4. label / hint / error / corner hint --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Label &amp; helper text</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-element mb-6">
        <x-textarea label="お問い合わせ内容" name="message" placeholder="ご用件をご記入ください" hint="500 文字程度を目安に" />
        <x-textarea label="自己紹介" name="bio" required corner-hint="必須" placeholder="プロフィールを入力" />
        <x-textarea label="フィードバック" name="feedback" placeholder="入力してください" error="本文は 10 文字以上必要です" />
        <x-textarea label="メモ" rows="4" corner-hint="任意" placeholder="後で編集できます" hint="改行可" />
    </div>

    {{-- 5. autoresize --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Autoresize (height grows with content)</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-element mb-6">
        <x-textarea autoresize rows="2" label="autoresize" placeholder="改行を入れると自動で伸びます" hint="rows=2 が最小高さ" />
        <x-textarea autoresize rows="3" appearance="soft" label="autoresize + soft" placeholder="ここに長文を貼り付けてみてください…" />
    </div>

    {{-- 6. character counter --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Character counter</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-element mb-6">
        <x-textarea label="自由カウント" counter rows="3" placeholder="入力するとカウントが増えます" />
        <x-textarea label="上限あり" maxlength="200" rows="3" placeholder="200 文字まで" hint="残り文字数は右下に表示" />
        <x-textarea label="上限 + corner hint" maxlength="100" corner-hint="100 文字まで" rows="3" placeholder="例: タイトル説明" />
        <x-textarea label="autoresize + counter" autoresize maxlength="500" rows="2" placeholder="伸びる + カウントの組合せ" />
    </div>

    {{-- 7. disabled / readonly --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Disabled / Readonly</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-element">
        <x-textarea label="Disabled" disabled rows="3" placeholder="入力不可" />
        <x-textarea label="Readonly" readonly rows="3">この内容は変更できません。
複数行にわたる説明文をここに表示します。</x-textarea>
    </div>
@endsection
