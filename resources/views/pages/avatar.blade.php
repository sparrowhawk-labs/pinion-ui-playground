@extends('layouts.playground')

@section('title', '— Avatar')
@section('heading', 'Avatars')
@section('subheading', 'initials / icon / image + size × shape × status indicator')

@section('content')
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Sizes (initials)</p>
    <div class="flex flex-wrap items-end gap-compact mb-6">
        @foreach(['xs','sm','md','lg','xl'] as $s)
            <x-avatar initials="XY" :size="$s" color="primary" appearance="solid" />
        @endforeach
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Color × appearance (initials)</p>
    <div class="flex flex-wrap items-center gap-compact mb-3">
        @foreach(['primary','secondary','accent','info','success','warning','error'] as $c)
            <x-avatar :initials="strtoupper(substr($c,0,2))" :color="$c" appearance="solid" />
        @endforeach
    </div>
    <div class="flex flex-wrap items-center gap-compact mb-3">
        @foreach(['primary','secondary','accent','info','success','warning','error'] as $c)
            <x-avatar :initials="strtoupper(substr($c,0,2))" :color="$c" appearance="soft" />
        @endforeach
    </div>
    <div class="flex flex-wrap items-center gap-compact mb-6">
        @foreach(['primary','secondary','accent','info','success','warning','error'] as $c)
            <x-avatar :initials="strtoupper(substr($c,0,2))" :color="$c" appearance="outline" />
        @endforeach
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Shapes</p>
    <div class="flex flex-wrap items-center gap-compact mb-6">
        <x-avatar initials="CI" shape="circle" color="primary" appearance="soft" />
        <x-avatar initials="RD" shape="rounded" color="primary" appearance="soft" />
        <x-avatar initials="SQ" shape="square" color="primary" appearance="soft" />
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Icon</p>
    <div class="flex flex-wrap items-center gap-compact mb-6">
        <x-avatar icon="user" color="neutral" appearance="soft" />
        <x-avatar icon="crown" color="warning" appearance="soft" />
        <x-avatar icon="bell" color="info" appearance="soft" />
        <x-avatar icon="shield-check" color="success" appearance="soft" />
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Status indicator</p>
    <div class="flex flex-wrap items-center gap-compact">
        <x-avatar initials="ON" color="primary" appearance="solid" status="online" />
        <x-avatar initials="AW" color="warning" appearance="soft" status="away" />
        <x-avatar initials="BU" color="error" appearance="soft" status="busy" />
        <x-avatar initials="OF" color="neutral" appearance="soft" status="offline" />
    </div>
@endsection
