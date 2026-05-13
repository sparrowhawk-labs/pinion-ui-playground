@extends('layouts.demo')

@section('title', '— Sidebar (navigation)')

@section('content')
    <div class="space-y-4">
        <x-sidebar side="left" size="md">
            <x-slot:trigger>
                <x-button color="primary">Open navigation</x-button>
            </x-slot:trigger>

            <div class="flex flex-col h-full">
                {{-- Logo --}}
                <div class="flex items-center gap-2 mb-6">
                    <div class="w-8 h-8 rounded-[var(--radius-field)] bg-primary text-primary-content flex items-center justify-center font-bold">P</div>
                    <div>
                        <div class="text-sm font-bold leading-tight">Pinion UI</div>
                        <div class="text-[10px] text-base-content/50 leading-tight">Demo App</div>
                    </div>
                </div>

                {{-- Menu items --}}
                <nav class="flex flex-col gap-0.5">
                    <a href="#" class="flex items-center gap-2 px-3 py-2 rounded-[var(--radius-field)] bg-primary/10 text-primary text-sm font-medium">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        Dashboard
                    </a>
                    <a href="#" class="flex items-center gap-2 px-3 py-2 rounded-[var(--radius-field)] hover:bg-base-200 text-sm">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                        Projects
                    </a>
                    <a href="#" class="flex items-center gap-2 px-3 py-2 rounded-[var(--radius-field)] hover:bg-base-200 text-sm">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        Team
                    </a>
                    <a href="#" class="flex items-center gap-2 px-3 py-2 rounded-[var(--radius-field)] hover:bg-base-200 text-sm">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        Reports
                        <x-badge size="sm" color="info" class="ml-auto">3</x-badge>
                    </a>
                    <a href="#" class="flex items-center gap-2 px-3 py-2 rounded-[var(--radius-field)] hover:bg-base-200 text-sm">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                        Notifications
                    </a>
                    <a href="#" class="flex items-center gap-2 px-3 py-2 rounded-[var(--radius-field)] hover:bg-base-200 text-sm">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Settings
                    </a>
                </nav>

                {{-- User badge (footer).
                     `-mx-[var(--space-element)] px-[var(--space-element)]` lets the
                     hairline border-t span the full panel width (canceling the panel's
                     horizontal padding) while keeping the avatar row inset normally. --}}
                <div class="mt-auto -mx-[var(--space-element)] px-[var(--space-element)] pt-5 border-t border-base-300">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full bg-base-300 flex items-center justify-center text-sm font-semibold">AT</div>
                        <div class="min-w-0 flex-1">
                            <div class="text-sm font-medium truncate">Akihiko Takai</div>
                            <div class="text-xs text-base-content/50 truncate">akihiko@example.com</div>
                        </div>
                    </div>
                </div>
            </div>
        </x-sidebar>

        <p class="text-xs text-base-content/50">
            実用的なナビゲーションドロワーの例 — logo、icon 付き menu items 6 件、user footer。
        </p>
    </div>
@endsection
