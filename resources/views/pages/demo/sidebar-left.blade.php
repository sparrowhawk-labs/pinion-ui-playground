@extends('layouts.demo')

@section('title', '— Sidebar (left)')

@section('content')
    <div class="space-y-4">
        <x-sidebar side="left" size="md">
            <x-slot:trigger>
                <x-button color="primary">Open left sidebar</x-button>
            </x-slot:trigger>

            <div class="space-y-3 pt-element">
                <h2 class="text-lg font-semibold">Left drawer</h2>
                <p class="text-sm text-base-content/70">
                    <code class="text-xs">side="left"</code> / <code class="text-xs">size="md"</code> / backdrop あり。<br>
                    Escape キー、× ボタン、背景 click で閉じます。
                </p>
                <p class="text-sm text-base-content/70">
                    drawer 内の content は x-trap によって focus が外に漏れません。
                </p>
            </div>
        </x-sidebar>

        <p class="text-xs text-base-content/50">
            左から slide-in、半透明黒の backdrop あり。最も標準的なドロワー。
        </p>
    </div>
@endsection
