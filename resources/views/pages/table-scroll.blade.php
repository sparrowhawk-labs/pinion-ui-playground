@extends('layouts.playground')

@section('title', '— Table')
@section('heading', 'Table')
@section('subheading', '通常の table 表示 + x-table-scroll ラッパーで横スクロール時のみ左右ボタンと gradient fade を出す。コンテンツが overflow しない時はラッパーは透明 (何も足さない)。table 専用ではなく、card list / image strip 等にも使える。')

@section('content')
    @php
        $columns = ['ID', 'ユーザー名', 'メール', '会社', '部署', '役職', '入社日', '最終ログイン', 'ロール', 'プラン', 'ステータス', 'アクション'];
        $rows = [
            [1001, 'tatun55', 'tatun@example.com', 'Yakaze Tech Studio', '開発', '代表', '2024-04-01', '2026-05-13 09:32', 'admin', 'enterprise', 'active'],
            [1002, 'akari_y', 'akari@example.com', 'Sparrowhawk Labs', 'デザイン', 'リード', '2024-09-15', '2026-05-13 08:11', 'editor', 'pro', 'active'],
            [1003, 'kenji_o', 'kenji@example.com', 'Pinion Inc.', '営業', 'マネージャー', '2025-02-01', '2026-05-12 22:54', 'editor', 'pro', 'invited'],
            [1004, 'misaki_t', 'misaki@example.com', 'Anonymous Co.', 'CS', 'スタッフ', '2025-07-10', '2026-05-13 10:01', 'viewer', 'free', 'active'],
            [1005, 'ryouta_n', 'ryouta@example.com', 'Earthsea LLC', 'エンジニアリング', 'シニア', '2023-11-20', '2026-05-13 09:58', 'admin', 'enterprise', 'suspended'],
        ];
        $narrowColumns = ['ID', '名前', 'ステータス'];
        $narrowRows = [
            [1, '田中', 'active'],
            [2, '山田', 'inactive'],
            [3, '佐藤', 'active'],
        ];
    @endphp

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        plain table — &lt;x-table-scroll&gt; ラッパーなし (narrow content)
    </p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] overflow-hidden bg-base-100">
        <table class="w-full text-sm">
            <thead class="bg-base-200 text-base-content/70">
                <tr>
                    @foreach($narrowColumns as $col)
                        <th class="px-4 py-2 text-left font-medium">{{ $col }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($narrowRows as $row)
                    <tr class="border-t border-base-300 hover:bg-base-200/50">
                        @foreach($row as $cell)
                            <td class="px-4 py-2">{{ $cell }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">&lt;x-table-scroll&gt; wrapping wide table — 12 カラム (横スクロール発生)</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] overflow-hidden bg-base-100">
        <x-table-scroll>
            <table class="min-w-[1000px] w-full text-sm">
                <thead class="bg-base-200 text-base-content/70">
                    <tr>
                        @foreach($columns as $col)
                            <th class="px-4 py-2 text-left font-medium whitespace-nowrap">{{ $col }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($rows as $row)
                        <tr class="border-t border-base-300 hover:bg-base-200/50">
                            @foreach($row as $cell)
                                <td class="px-4 py-2 whitespace-nowrap">{{ $cell }}</td>
                            @endforeach
                            <td class="px-4 py-2 whitespace-nowrap">
                                <x-button color="primary" appearance="soft" size="xs">編集</x-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-table-scroll>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">narrow table — overflow しないのでボタンも fade も出ない</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] overflow-hidden bg-base-100">
        <x-table-scroll>
            <table class="w-full text-sm">
                <thead class="bg-base-200 text-base-content/70">
                    <tr>
                        <th class="px-4 py-2 text-left font-medium">ID</th>
                        <th class="px-4 py-2 text-left font-medium">名前</th>
                        <th class="px-4 py-2 text-left font-medium">ステータス</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-t border-base-300"><td class="px-4 py-2">1</td><td class="px-4 py-2">田中</td><td class="px-4 py-2">active</td></tr>
                    <tr class="border-t border-base-300"><td class="px-4 py-2">2</td><td class="px-4 py-2">山田</td><td class="px-4 py-2">inactive</td></tr>
                </tbody>
            </table>
        </x-table-scroll>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">card list — table 以外の wide content (画像ストリップ・カード列)</p>
    <div class="mb-8">
        <x-table-scroll>
            <div class="flex gap-3 pb-2">
                @foreach(range(1, 12) as $i)
                    <div class="shrink-0 w-48 rounded-[var(--radius-box)] border border-base-300 bg-base-100 p-element">
                        <div class="h-24 rounded-[var(--radius-field)] bg-gradient-to-br from-primary/30 via-secondary/30 to-accent/30 mb-3"></div>
                        <p class="font-medium text-sm">アイテム #{{ $i }}</p>
                        <p class="text-xs text-base-content/60 mt-1">説明文がここに入る</p>
                    </div>
                @endforeach
            </div>
        </x-table-scroll>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">buttonStyle="flat" — 角ばった button (radius-field 準拠)</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] overflow-hidden bg-base-100">
        <x-table-scroll button-style="flat">
            <table class="min-w-[1000px] w-full text-sm">
                <thead class="bg-base-200 text-base-content/70">
                    <tr>
                        @foreach($columns as $col)
                            <th class="px-4 py-2 text-left font-medium whitespace-nowrap">{{ $col }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($rows as $row)
                        <tr class="border-t border-base-300">
                            @foreach($row as $cell)
                                <td class="px-4 py-2 whitespace-nowrap">{{ $cell }}</td>
                            @endforeach
                            <td class="px-4 py-2 whitespace-nowrap"><x-button color="primary" appearance="soft" size="xs">編集</x-button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-table-scroll>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">showButtons=false — ボタン非表示、ネイティブスクロールのみ</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] overflow-hidden bg-base-100">
        <x-table-scroll :show-buttons="false">
            <table class="min-w-[1000px] w-full text-sm">
                <thead class="bg-base-200 text-base-content/70">
                    <tr>
                        @foreach($columns as $col)
                            <th class="px-4 py-2 text-left font-medium whitespace-nowrap">{{ $col }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($rows as $row)
                        <tr class="border-t border-base-300">
                            @foreach($row as $cell)
                                <td class="px-4 py-2 whitespace-nowrap">{{ $cell }}</td>
                            @endforeach
                            <td class="px-4 py-2 whitespace-nowrap"><x-button color="primary" appearance="soft" size="xs">編集</x-button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-table-scroll>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-8">使い方</p>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim &lt;x-table-scroll&gt;
    &lt;table class="min-w-[1000px] w-full"&gt;
        ...
    &lt;/table&gt;
&lt;/x-table-scroll&gt;

{{-- ボタンを四角くしたい --}}
&lt;x-table-scroll button-style="flat"&gt; ... &lt;/x-table-scroll&gt;

{{-- スクロール量を変えたい (viewport 比、default 0.6) --}}
&lt;x-table-scroll :scroll-amount="0.8"&gt; ... &lt;/x-table-scroll&gt;

{{-- ボタンを出さない (ネイティブスクロールのみ) --}}
&lt;x-table-scroll :show-buttons="false"&gt; ... &lt;/x-table-scroll&gt;

{{-- 背景色を合わせる (fade gradient の起点色) --}}
&lt;x-table-scroll fade-color="base-200"&gt; ... &lt;/x-table-scroll&gt;
@endverbatim</code></pre>
@endsection
