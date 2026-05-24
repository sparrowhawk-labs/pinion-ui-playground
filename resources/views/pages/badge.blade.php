@extends('layouts.playground')

@section('title', '— Badge')
@section('heading', 'Badges')
@section('subheading', __('playground.subheading.badge'))

@section('content')
    @foreach(['solid','outline','soft','base-100','base-200','base-300'] as $app)
        <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">{{ $app }}</p>
        <div class="flex flex-wrap items-center gap-compact mb-6">
            @foreach(['primary','secondary','accent','neutral','info','success','warning','error'] as $c)
                <x-badge :color="$c" :appearance="$app">{{ $c }}</x-badge>
            @endforeach
        </div>
    @endforeach

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">On base-200 surface</p>
    <div class="bg-base-200 p-element rounded-[var(--radius-box)] flex flex-wrap items-center gap-compact mb-6">
        @foreach(['primary','accent','success','warning'] as $c)
            <x-badge :color="$c" appearance="base-200">{{ $c }}</x-badge>
        @endforeach
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Dot (status indicator)</p>
    <div class="flex flex-wrap items-center gap-compact mb-6">
        @foreach(['info','success','warning','error','neutral'] as $c)
            <x-badge :color="$c" appearance="dot">{{ $c }}</x-badge>
        @endforeach
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Sizes / pill / icon</p>
    <div class="flex flex-wrap items-center gap-compact">
        @foreach(['xs','sm','md','lg'] as $s)
            <x-badge :size="$s" color="primary">{{ $s }}</x-badge>
        @endforeach
        <x-badge pill color="success">pill</x-badge>
        <x-badge pill color="error" appearance="solid">pill solid</x-badge>
        <x-badge icon="check-circle" color="success" appearance="soft">with icon</x-badge>
        <x-badge icon="star" color="warning" appearance="outline">featured</x-badge>
    </div>
@endsection
