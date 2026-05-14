{{-- Shared demo content for theme-preview cards. CSS variables are inherited from the parent card. --}}
<div class="space-y-3">
    {{-- Brand mark mimicking beck "beck ●" pattern --}}
    <div class="flex items-baseline gap-1.5">
        <span class="text-xl font-bold tracking-tight" style="font-family: ui-serif, Georgia, serif;">pinion</span>
        <span class="inline-block w-1.5 h-1.5 rounded-full" style="background: var(--color-accent)"></span>
    </div>

    {{-- CTAs --}}
    <div class="flex flex-wrap gap-2 items-center">
        <x-button color="primary" size="sm">Sign in</x-button>
        <x-button color="primary" appearance="outline" size="sm">Cancel</x-button>
        <x-button color="primary" appearance="link" size="sm">Forgot?</x-button>
    </div>

    {{-- Accent surfaces --}}
    <div class="flex flex-wrap gap-2 items-center">
        <x-badge color="accent" appearance="dot">dev</x-badge>
        <x-badge color="accent" size="sm">PRO</x-badge>
        <x-badge color="primary" size="sm">v0.4</x-badge>
    </div>
</div>
