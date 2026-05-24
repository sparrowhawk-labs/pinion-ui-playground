{{--
    Inline SVG "chart" — purely decorative, used inside each <x-tab> panel
    of the dashboard demo. Different `accent` colors per tab make the
    tab-switch visually obvious even at 40% scale. No JS.
--}}
@php
    // Deterministic but mode-varying path data so the four tabs look different.
    $paths = [
        'hour'  => 'M0,80 C40,70 80,55 120,52 C160,49 200,68 240,58 C280,48 320,30 360,38 C400,46 440,32 480,28 C520,24 560,40 600,34',
        'day'   => 'M0,70 C40,60 80,30 120,40 C160,50 200,72 240,60 C280,48 320,26 360,32 C400,38 440,55 480,42 C520,29 560,18 600,24',
        'week'  => 'M0,60 C40,72 80,50 120,55 C160,60 200,40 240,46 C280,52 320,68 360,55 C400,42 440,30 480,38 C520,46 560,52 600,30',
        'month' => 'M0,75 C40,55 80,68 120,50 C160,32 200,46 240,38 C280,30 320,52 360,40 C400,28 440,42 480,32 C520,22 560,38 600,18',
    ];
    $path = $paths[$mode] ?? $paths['day'];
    $accent = $accent ?? 'primary';

    // Y-axis labels (just for shape; numbers vary per tab so it doesn't look static)
    $yAxisByMode = [
        'hour'  => ['1.2k','900','600','300'],
        'day'   => ['18k','14k','10k','6k'],
        'week'  => ['120k','90k','60k','30k'],
        'month' => ['520k','390k','260k','130k'],
    ];
    $yLabels = $yAxisByMode[$mode] ?? $yAxisByMode['day'];

    $xAxisByMode = [
        'hour'  => ['00m','15m','30m','45m','60m'],
        'day'   => ['00','06','12','18','24'],
        'week'  => ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
        'month' => ['W1','W2','W3','W4'],
    ];
    $xLabels = $xAxisByMode[$mode] ?? $xAxisByMode['day'];
@endphp

<div class="app-chart">
    {{-- Legend row --}}
    <div class="flex items-center justify-between mb-3">
        <div class="flex items-center gap-3 text-xs text-base-content/60">
            <span class="inline-flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-{{ $accent }}"></span> Total
            </span>
            <span class="inline-flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-base-300"></span> Previous
            </span>
        </div>
        <span class="text-[11px] text-base-content/40 font-mono">UTC</span>
    </div>

    {{-- Chart body: SVG + y-axis labels --}}
    <div class="flex">
        <div class="flex flex-col justify-between text-[10px] text-base-content/40 font-mono pr-2 py-1" style="height: 180px;">
            @foreach($yLabels as $y)
                <span>{{ $y }}</span>
            @endforeach
        </div>

        <div class="flex-1 relative">
            <svg viewBox="0 0 600 100" preserveAspectRatio="none" class="w-full h-[180px] block">
                <defs>
                    <linearGradient id="chart-grad-{{ $mode }}" x1="0" x2="0" y1="0" y2="1">
                        <stop offset="0%"   stop-color="currentColor" stop-opacity="0.32" />
                        <stop offset="100%" stop-color="currentColor" stop-opacity="0" />
                    </linearGradient>
                </defs>

                {{-- horizontal grid lines --}}
                @foreach([20, 40, 60, 80] as $gy)
                    <line x1="0" x2="600" y1="{{ $gy }}" y2="{{ $gy }}"
                          stroke="currentColor" stroke-opacity="0.08" stroke-dasharray="2 4" stroke-width="0.5" />
                @endforeach

                {{-- previous-period ghost line --}}
                <path d="M0,55 C40,62 80,48 120,58 C160,68 200,52 240,55 C280,58 320,48 360,52 C400,56 440,46 480,50 C520,54 560,40 600,46"
                      fill="none" stroke="currentColor" stroke-opacity="0.22" stroke-width="1.2"
                      stroke-dasharray="3 3" />

                {{-- area fill under main line --}}
                <path d="{{ $path }} L600,100 L0,100 Z"
                      fill="url(#chart-grad-{{ $mode }})"
                      class="text-{{ $accent }}" />

                {{-- main line --}}
                <path d="{{ $path }}"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="1.8"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      class="text-{{ $accent }}" />

                {{-- highlight dot at last point --}}
                <circle cx="600" cy="{{ $mode === 'month' ? 18 : ($mode === 'week' ? 30 : ($mode === 'hour' ? 34 : 24)) }}"
                        r="3" fill="currentColor" class="text-{{ $accent }}" />
                <circle cx="600" cy="{{ $mode === 'month' ? 18 : ($mode === 'week' ? 30 : ($mode === 'hour' ? 34 : 24)) }}"
                        r="6" fill="currentColor" fill-opacity="0.2" class="text-{{ $accent }}" />
            </svg>
        </div>
    </div>

    {{-- X-axis labels --}}
    <div class="flex justify-between mt-2 pl-9 text-[10px] text-base-content/40 font-mono">
        @foreach($xLabels as $x)
            <span>{{ $x }}</span>
        @endforeach
    </div>
</div>
