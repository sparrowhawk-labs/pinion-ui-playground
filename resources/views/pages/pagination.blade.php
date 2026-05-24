@extends('layouts.playground')

@section('title', '— Pagination')
@section('heading', 'Pagination')
@section('subheading', __('playground.subheading.pagination'))

@section('content')
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        Full — soft primary, md
    </p>
    <div class="mb-8">
        <x-pagination.full :current="3" :last="10" :total="237" :perPage="25" />
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Full — near start (no left dots)</p>
    <div class="mb-8">
        <x-pagination.full :current="2" :last="10" :total="237" :perPage="25" />
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Full — near end (no right dots)</p>
    <div class="mb-8">
        <x-pagination.full :current="9" :last="10" :total="237" :perPage="25" />
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Full — wide window (onEachSide=2)</p>
    <div class="mb-8">
        <x-pagination.full :current="6" :last="20" :total="487" :perPage="25" :on-each-side="2" />
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Full — appearance variants (color=accent)</p>
    @foreach(['soft','solid','outline'] as $app)
        <div class="mb-4">
            <p class="text-[10px] text-base-content/40 mb-1">{{ $app }}</p>
            <x-pagination.full :current="3" :last="7" :total="160" :perPage="25" color="accent" :appearance="$app" />
        </div>
    @endforeach

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">Full — sizes</p>
    @foreach(['sm','md','lg'] as $s)
        <div class="mb-4">
            <p class="text-[10px] text-base-content/40 mb-1">size = {{ $s }}</p>
            <x-pagination.full :current="3" :last="7" :total="160" :perPage="25" :size="$s" />
        </div>
    @endforeach

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">Full — without info</p>
    <div class="mb-8">
        <x-pagination.full :current="3" :last="10" :total="237" :perPage="25" :show-info="false" />
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">Full — custom labels (EN)</p>
    <div class="mb-8">
        <x-pagination.full :current="3" :last="10" :total="237" :perPage="25"
            prev-label="Previous" next-label="Next"
            info-template="Showing :first - :last of :total" />
    </div>

    <hr class="my-10 border-base-300">

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        Simple — soft primary, md
    </p>
    <div class="mb-8">
        <x-pagination.simple :current="3" :last="10" :total="237" :perPage="25" />
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Simple — onFirstPage</p>
    <div class="mb-8">
        <x-pagination.simple :current="1" :last="10" :total="237" :perPage="25" />
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Simple — last page</p>
    <div class="mb-8">
        <x-pagination.simple :current="10" :last="10" :total="237" :perPage="25" />
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Simple — color × appearance (color=success, soft)</p>
    <div class="mb-8">
        <x-pagination.simple :current="2" :last="5" :total="115" :perPage="25" color="success" appearance="soft" />
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Simple — sizes</p>
    @foreach(['sm','md','lg'] as $s)
        <div class="mb-4">
            <p class="text-[10px] text-base-content/40 mb-1">size = {{ $s }}</p>
            <x-pagination.simple :current="2" :last="5" :total="115" :perPage="25" :size="$s" />
        </div>
    @endforeach

    <hr class="my-10 border-base-300">

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">page-change event (no baseUrl, Alpine $dispatch)</p>
    <div class="mb-8" x-data="{ msg: 'まだクリックされていません' }" @page-change.window="msg = `ページ ${$event.detail.page} が要求されました`">
        <x-pagination.full :current="3" :last="8" :total="200" :perPage="25" appearance="outline" />
        <p class="mt-3 text-sm text-base-content/70" x-text="msg"></p>
    </div>
@endsection
