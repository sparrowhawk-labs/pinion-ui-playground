<!DOCTYPE html>
{{--
    Minimal LP-demo layout.
    No playground sidebar/navbar, no Alpine root scope on <body>.
    The outer overview page will reach into this document's <html> element
    and poke `data-tune` directly to drive a live preview without reload.

    Theme is fixed to `pinion` so the scaled preview always reads in the
    project's brand colors regardless of what the outer page's theme is.
    Default tune is `default`; the outer page will override it on hover.
--}}
<html lang="en" data-theme="pinion" data-tune="default">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pinion-ui — live preview</title>

    {{-- iframe-embedded preview only; never useful as a stand-alone search
         hit. noindex prevents it from cluttering SERPs as duplicate / low-value. --}}
    <meta name="robots" content="noindex,nofollow">

    {{-- v2 tune fonts. tune.css self-hosts only PixelMplus; every other tune's
         typeface (font = tune identity, pinion-ui invariant #5) loads via this
         link — mirrors layouts/playground.blade.php. Without it the embedded LP
         falls back to system fonts and the FONT axis of the tune morph silently
         breaks (rough/radius/shadow still apply, so it's easy to miss). --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Instrument+Sans:wght@400;500;600&family=IBM+Plex+Sans:wght@300;400;500;600;700&family=IBM+Plex+Mono:wght@400;500&family=JetBrains+Mono:wght@400;500;700&family=Space+Grotesk:wght@400;500;700&family=Space+Mono:wght@400;700&family=Playfair+Display:wght@400;500;600;700;800&family=Source+Serif+4:opsz,wght@8..60,400;8..60,600&family=Hanken+Grotesk:wght@300;400;500;600&family=Quicksand:wght@400;500;600;700&family=Nunito:wght@400;600;700;800&family=Caveat:wght@400;500;600;700&family=Patrick+Hand&family=Press+Start+2P&family=Noto+Sans+JP:wght@400;500;700&family=Shippori+Mincho:wght@400;500;700&family=Zen+Maru+Gothic:wght@400;500;700&family=Yomogi&family=Zen+Kurenaido&family=M+PLUS+1p:wght@400;500;700&family=M+PLUS+1+Code:wght@400;500;700&display=swap" rel="stylesheet">

    {{-- Self-contained: needs the playground's compiled CSS so the embedded
         components render with theme + tune tokens. JS only needed for the
         tiny header CTA; safe to load. --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Strip body padding/margin: the LP fills the iframe edge-to-edge.
           No scrollbars on the LP body — outer wrapper handles overflow. */
        html, body { margin: 0; padding: 0; }
        body { overflow-x: hidden; }

        /* Hide focus outlines inside the preview — the iframe is non-interactive
           visual material, and outlines from any focus state leaking in look bad
           at the 40% downscale. */
        .lp-preview *:focus { outline: none !important; }

        /* Smooth tune/theme preview transitions.
           When the outer page pokes `data-theme` / `data-tune` on <html>, the
           cascading CSS variables (colors, radii, borders, shadows, spacing)
           swap. Without transitions these snap; here they cross-fade for ~700ms
           so the iframe reads as a fluid morph rather than a stutter.
           - Properties listed explicitly (never `transition: all`) so we don't
             accidentally animate layout-only things.
           - `:where(*)` has zero specificity so it never fights component CSS.
           - Font-family can't truly interpolate across families; the swap is
             still instant, but the surrounding shape/color morph masks that.
           - prefers-reduced-motion disables the cross-fade entirely. */
        :where(*) {
            transition:
                background-color   700ms ease,
                color              700ms ease,
                border-color       700ms ease,
                border-radius      500ms cubic-bezier(.2,.8,.2,1),
                border-width       500ms ease,
                box-shadow         700ms ease,
                fill               700ms ease,
                stroke             700ms ease;
        }
        @media (prefers-reduced-motion: reduce) {
            :where(*) { transition: none; }
        }
    </style>
</head>
<body class="bg-base-100 text-base-content">
    <div class="lp-preview">
        @yield('content')
    </div>
</body>
</html>
