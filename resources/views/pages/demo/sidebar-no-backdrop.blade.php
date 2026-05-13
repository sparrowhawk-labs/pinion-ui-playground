@extends('layouts.demo')

@section('title', '— Sidebar (no backdrop)')

@section('content')
    <div class="space-y-4">
        <x-sidebar side="left" size="md" :backdrop="false">
            <x-slot:trigger>
                <x-button color="primary">Open without backdrop</x-button>
            </x-slot:trigger>

            <div class="space-y-3 pt-element">
                <h2 class="text-lg font-semibold">No-backdrop drawer</h2>
                <p class="text-sm text-base-content/70">
                    <code class="text-xs">:backdrop="false"</code> — 背景の dim は無く、<br>
                    overlay 全体が <code class="text-xs">pointer-events-none</code> なので、<br>
                    drawer が出ていても本体ページが完全に操作可能。
                </p>
                <p class="text-sm text-base-content/70">
                    永続的なツールパレットや、ページと並行して編集可能な inspector に最適。
                </p>
            </div>
        </x-sidebar>

        <p class="text-xs text-base-content/50">
            開いた後も裏ページの button や link をクリックできます (試してみてください)。
        </p>

        <div class="border border-dashed border-base-300 rounded-[var(--radius-box)] p-element bg-base-200/30 mt-4">
            <p class="text-xs text-base-content/60 mb-2">背景の interactive 確認用</p>
            <div class="flex gap-2">
                <x-button appearance="outline" size="sm" onclick="alert('clicked background button')">背景ボタン A</x-button>
                <x-button appearance="outline" size="sm" onclick="alert('clicked background button')">背景ボタン B</x-button>
            </div>
        </div>
    </div>
@endsection
