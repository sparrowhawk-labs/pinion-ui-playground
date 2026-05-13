@extends('layouts.demo')

@section('title', '— Sidebar (right)')

@section('content')
    <div class="space-y-4">
        <x-sidebar side="right" size="md">
            <x-slot:trigger>
                <x-button color="primary">Open right sidebar</x-button>
            </x-slot:trigger>

            <div class="space-y-3 pt-element">
                <h2 class="text-lg font-semibold">Right drawer</h2>
                <p class="text-sm text-base-content/70">
                    <code class="text-xs">side="right"</code> / <code class="text-xs">size="md"</code> / backdrop あり。<br>
                    右からスライドイン。× ボタンは panel の左上に出ます。
                </p>
                <p class="text-sm text-base-content/70">
                    詳細パネル、フィルター UI、設定パネルなど右配置が自然な用途向け。
                </p>
            </div>
        </x-sidebar>

        <p class="text-xs text-base-content/50">
            右から slide-in、close ボタンは内側 (左上) に配置。
        </p>
    </div>
@endsection
