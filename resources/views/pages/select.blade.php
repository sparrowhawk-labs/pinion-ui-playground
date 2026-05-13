@extends('layouts.playground')

@section('title', '— Select')
@section('heading', 'Selects')
@section('subheading', 'native select — color × appearance, sizes, optgroup, multiple, floating label')

@section('content')
    @php
        $fruits = ['apple' => 'りんご', 'banana' => 'バナナ', 'cherry' => 'さくらんぼ', 'durian' => 'ドリアン'];
    @endphp

    {{-- 1. appearance matrix × colors --}}
    @foreach(['outline','soft','underline','ghost'] as $app)
        <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
            @if($app === 'outline')<span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>@endif
            {{ $app }}
        </p>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-compact mb-6">
            @foreach(['neutral','primary','info','success','warning','error'] as $c)
                <x-select :appearance="$app" :color="$c" placeholder="{{ $c }}">
                    @foreach($fruits as $v => $l)<option value="{{ $v }}">{{ $l }}</option>@endforeach
                </x-select>
            @endforeach
        </div>
    @endforeach

    {{-- 2. sizes --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Sizes</p>
    <div class="grid grid-cols-3 gap-compact mb-6">
        @foreach(['sm','md','lg'] as $s)
            <x-select :size="$s" placeholder="size {{ $s }}">
                @foreach($fruits as $v => $l)<option value="{{ $v }}">{{ $l }}</option>@endforeach
            </x-select>
        @endforeach
    </div>

    {{-- 3. label / hint / error / corner hint --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Label &amp; helper text</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-element mb-6">
        <x-select label="国" name="country" placeholder="選択してください" hint="国コードで送信されます">
            <option value="jp">日本</option>
            <option value="us">アメリカ</option>
            <option value="uk">イギリス</option>
        </x-select>
        <x-select label="プラン" name="plan" required corner-hint="必須" placeholder="プランを選択">
            <option value="free">Free</option>
            <option value="pro">Pro</option>
            <option value="enterprise">Enterprise</option>
        </x-select>
        <x-select label="言語" name="lang" error="言語を選んでください" placeholder="未選択">
            <option value="ja">日本語</option>
            <option value="en">English</option>
        </x-select>
        <x-select label="優先度" name="priority" corner-hint="任意" placeholder="後で設定">
            <option value="low">低</option>
            <option value="med">中</option>
            <option value="high">高</option>
        </x-select>
    </div>

    {{-- 4. optgroup --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Optgroup</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-element mb-6">
        <x-select label="フォント" name="font" placeholder="フォントを選択">
            <optgroup label="Sans-serif">
                <option value="inter">Inter</option>
                <option value="noto">Noto Sans JP</option>
            </optgroup>
            <optgroup label="Serif">
                <option value="playfair">Playfair Display</option>
                <option value="lora">Lora</option>
            </optgroup>
            <optgroup label="Mono">
                <option value="jetbrains">JetBrains Mono</option>
                <option value="space">Space Mono</option>
            </optgroup>
        </x-select>
        <x-select label="タイムゾーン" name="tz" appearance="soft" placeholder="タイムゾーン">
            <optgroup label="Asia">
                <option value="tokyo">Asia/Tokyo</option>
                <option value="seoul">Asia/Seoul</option>
                <option value="shanghai">Asia/Shanghai</option>
            </optgroup>
            <optgroup label="Americas">
                <option value="ny">America/New_York</option>
                <option value="la">America/Los_Angeles</option>
            </optgroup>
        </x-select>
    </div>

    {{-- 5. multiple / list (size attribute) --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Multiple &amp; list</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-element mb-6">
        <x-select label="複数選択" name="tags" multiple rows="5" hint="Cmd/Ctrl + クリックで複数選択">
            @foreach($fruits as $v => $l)<option value="{{ $v }}">{{ $l }}</option>@endforeach
            <option value="elderberry">エルダーベリー</option>
        </x-select>
        <x-select label="単一リスト表示" name="single_list" rows="5" hint="size=5 の表示">
            @foreach($fruits as $v => $l)<option value="{{ $v }}">{{ $l }}</option>@endforeach
            <option value="elderberry">エルダーベリー</option>
        </x-select>
    </div>

    {{-- 6. floating label (always-shrunk) --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Floating label</p>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-element mb-4">
        <x-select floating size="sm" label="sm: 国" name="floating_country_sm" placeholder="選択">
            <option value="jp">日本</option><option value="us">米国</option>
        </x-select>
        <x-select floating size="md" label="md: プラン" name="floating_plan_md" placeholder="選択">
            <option value="free">Free</option><option value="pro">Pro</option>
        </x-select>
        <x-select floating size="lg" label="lg: 言語" name="floating_lang_lg" required placeholder="選択">
            <option value="ja">日本語</option><option value="en">English</option>
        </x-select>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Floating — appearance variants</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-element mb-6">
        <x-select floating label="Soft" appearance="soft" placeholder="選択">
            <option value="a">A</option><option value="b">B</option>
        </x-select>
        <x-select floating label="Underline" appearance="underline" placeholder="選択">
            <option value="a">A</option><option value="b">B</option>
        </x-select>
        <x-select floating label="Ghost" appearance="ghost" placeholder="選択">
            <option value="a">A</option><option value="b">B</option>
        </x-select>
        <x-select floating label="エラー例" error="選択してください" placeholder="未選択">
            <option value="a">A</option><option value="b">B</option>
        </x-select>
    </div>

    {{-- 7. disabled --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Disabled</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-element mb-6">
        <x-select label="Disabled" disabled placeholder="操作不可">
            <option value="a">A</option>
        </x-select>
        <x-select label="Disabled (with value)" disabled>
            <option value="a" selected>選択済みの値</option>
            <option value="b">B</option>
        </x-select>
    </div>

    {{-- 8. custom UI mode (Alpine-driven trigger + dropdown, with chips for multi) --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Custom UI — single (`custom`)</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-element mb-6">
        <x-select custom label="国" name="country_custom" placeholder="国を選択">
            <option value="jp">日本</option>
            <option value="us">アメリカ</option>
            <option value="uk">イギリス</option>
            <option value="fr">フランス</option>
            <option value="de" disabled>ドイツ (一時休止)</option>
            <option value="kr">韓国</option>
        </x-select>
        <x-select custom appearance="soft" color="primary" label="プラン" name="plan_custom" placeholder="プランを選択">
            <option value="free">Free</option>
            <option value="pro">Pro</option>
            <option value="enterprise">Enterprise</option>
        </x-select>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Custom UI — multi (chips inside trigger)</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-element mb-6">
        <x-select custom multiple label="フルーツ" name="fruits_custom" placeholder="複数選択">
            @foreach($fruits as $v => $l)<option value="{{ $v }}">{{ $l }}</option>@endforeach
            <option value="elderberry">エルダーベリー</option>
        </x-select>
        <x-select custom multiple appearance="soft" color="success" label="タグ" name="tags_custom" placeholder="タグを複数選択">
            <option value="frontend">frontend</option>
            <option value="backend">backend</option>
            <option value="design">design</option>
            <option value="devops">devops</option>
            <option value="docs">docs</option>
        </x-select>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Custom UI — error / disabled</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-element">
        <x-select custom label="必須" name="req_custom" required error="選択してください" placeholder="未選択">
            <option value="a">A</option>
            <option value="b">B</option>
        </x-select>
        <x-select custom label="操作不可" disabled placeholder="操作不可">
            <option value="a" selected>選択済みの値</option>
            <option value="b">B</option>
        </x-select>
    </div>
@endsection
