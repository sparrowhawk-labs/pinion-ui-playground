@extends('layouts.playground')

@section('title', '— File Upload')
@section('heading', 'File Upload')
@section('subheading', 'native <input type="file"> + file:* utility (inline) and dashed dropzone (large area). Multi-file with progress bar driven by Alpine — simulate flag fakes upload progress so the demo is self-running.')

@section('content')
    @php
        $colors = ['primary','secondary','accent','neutral','info','success','warning','error'];
    @endphp

    {{-- 1. inline appearance × color --}}
    @foreach(['outline','soft'] as $app)
        <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
            @if($app === 'outline')<span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>@endif
            {{ $app }} (inline)
        </p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-element mb-6">
            @foreach(['primary','success','warning','error'] as $c)
                <x-file-upload :appearance="$app" :color="$c" :label="ucfirst($c).' — '.$app" />
            @endforeach
        </div>
    @endforeach

    {{-- 2. sizes (inline) --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Sizes (inline)</p>
    <div class="flex flex-col gap-element mb-6">
        @foreach(['sm','md','lg'] as $s)
            <x-file-upload :size="$s" :label="'size '.$s" />
        @endforeach
    </div>

    {{-- 3. dropzone × color --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Dropzone</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-element mb-6">
        <x-file-upload appearance="dropzone" color="primary" label="Cover image" description="PNG, JPG, WebP — max 5MB" accept="image/*" />
        <x-file-upload appearance="dropzone" color="success" label="Documents" description="PDF, DOCX — max 10MB" accept=".pdf,.doc,.docx" />
    </div>

    {{-- 4. multiple + simulate progress (horizontal layout, default) --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Horizontal preview — multi-file with simulated progress</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-element mb-6">
        <x-file-upload
            appearance="dropzone"
            color="primary"
            label="Documents (horizontal preview)"
            description="Each file gets its own row with thumbnail, name, size, progress."
            multiple
            simulate
        />
        <x-file-upload
            appearance="outline"
            color="info"
            label="Inline picker (horizontal preview)"
            description="Inline file input, multiple selection, progress runs to 100%."
            multiple
            simulate
        />
    </div>

    {{-- 5. grid layout — square thumbnails (image gallery style) --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Grid preview — square thumbnails (image gallery style)</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-element mb-6">
        <x-file-upload
            appearance="dropzone"
            color="primary"
            preview-layout="grid"
            label="Photo gallery"
            description="Pick several images — preview tiles fill in like Ant Design / Mantine picture-card."
            accept="image/*"
            multiple
            simulate
        />
        <x-file-upload
            appearance="outline"
            color="success"
            preview-layout="grid"
            label="Mixed assets"
            description="Images show thumbnails, other types show a generic file icon."
            multiple
            simulate
        />
    </div>

    {{-- 5. error state --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Error state</p>
    <div class="flex flex-col gap-element mb-6">
        <x-file-upload label="Profile photo" description="JPG / PNG only" error="Required — please choose a file" />
        <x-file-upload appearance="dropzone" label="Receipt" description="PDF only" error="Required — please choose a file" />
    </div>

    {{-- 6. disabled --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Disabled</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-element mb-6">
        <x-file-upload label="Disabled (inline)" disabled />
        <x-file-upload appearance="dropzone" color="primary" label="Disabled (dropzone)" disabled />
    </div>

    {{-- 7. on surfaces --}}
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">On base-200 surface</p>
    <div class="bg-base-200 p-element rounded-[var(--radius-box)] mb-6">
        <x-file-upload appearance="dropzone" color="primary" label="Upload on a base-200 panel" multiple simulate />
    </div>
@endsection
