@extends('layouts.playground')

@section('title', '— Overview')
@section('heading', 'pinion-ui v2 Playground')
@section('subheading', 'Real Laravel Blade components + pinion-icons, wired via composer path repo')

@section('content')
    <div class="space-y-element">
        <x-card appearance="elevated">
            <x-slot:header><h3 class="font-bold text-lg">Components</h3></x-slot:header>
            <ul class="space-y-2 text-sm">
                <li><a href="/button" class="text-primary hover:underline">Button</a> — color × appearance × size + icons</li>
                <li><a href="/alert" class="text-primary hover:underline">Alert</a> — 8 appearances incl. bordered-top/left</li>
                <li><a href="/badge" class="text-primary hover:underline">Badge</a> — solid/outline/soft/white/dot</li>
                <li><a href="/card" class="text-primary hover:underline">Card</a> — 8 appearances + divider toggle</li>
                <li><a href="/avatar" class="text-primary hover:underline">Avatar</a> — initials/icon/image + status indicator</li>
            </ul>
        </x-card>

        <x-card appearance="soft" color="info">
            <x-slot:header><h3 class="font-bold">How to use</h3></x-slot:header>
            <p class="text-sm">左サイドバーからコンポーネントを選択。上部ツールバーで <code>theme</code>（daisyUI 35 種）× <code>tune</code>（10 種）× 日本語 on/off を切替できます。</p>
        </x-card>
    </div>
@endsection
