@extends('layouts.playground')

@section('title', '— Button')
@section('heading', 'Buttons')
@section('subheading', 'color × appearance (solid / outline / soft / base-100 / base-200 / base-300 / ghost / link) — 全 8 colors')

@section('content')
    @foreach(['solid','outline','soft','base-100','base-200','base-300'] as $app)
        <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">{{ $app }}</p>
        <div class="flex flex-wrap items-center gap-compact mb-6">
            @foreach(['primary','secondary','accent','neutral','info','success','warning','error'] as $c)
                <x-button :color="$c" :appearance="$app">{{ $c }}</x-button>
            @endforeach
        </div>
    @endforeach

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">On base-200 surface</p>
    <div class="bg-base-200 p-element rounded-[var(--radius-box)] flex flex-wrap items-center gap-compact mb-6">
        @foreach(['primary','accent','success'] as $c)
            <x-button :color="$c" appearance="base-200">{{ $c }}</x-button>
        @endforeach
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">On base-300 surface</p>
    <div class="bg-base-300 p-element rounded-[var(--radius-box)] flex flex-wrap items-center gap-compact mb-6">
        @foreach(['primary','warning','neutral'] as $c)
            <x-button :color="$c" appearance="base-300">{{ $c }}</x-button>
        @endforeach
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Ghost / Link</p>
    <div class="flex flex-wrap items-center gap-compact mb-6">
        <x-button appearance="ghost">ghost</x-button>
        @foreach(['primary','secondary','error'] as $c)
            <x-button :color="$c" appearance="link">link {{ $c }}</x-button>
        @endforeach
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Sizes &amp; States</p>
    <div class="flex flex-wrap items-end gap-compact">
        @foreach(['xs','sm','md','lg'] as $s)
            <x-button :size="$s">{{ $s }}</x-button>
        @endforeach
        <x-button disabled>disabled</x-button>
        <x-button loading>loading</x-button>
        <x-button icon="home">home</x-button>
        <x-button icon-right="alt-arrow-right">next</x-button>
    </div>
@endsection
