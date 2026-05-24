<?php

return [
    'brand' => [
        'subline' => 'Blade adapter · live demos',
    ],

    'hero' => [
        'eyebrow_chip' => 'v0.4.0 · BLADE',
        'eyebrow_note' => '— REACT / VUE / WEB COMPONENTS COMING v0.5+',
        'title' => [
            'line1_html' => '<span class="tune-hero__title-tune">Tuneable</span> UI,',
            'line2'      => 'built for AI',
            'line3'      => 'to ship with.',
        ],
        'subtitle' => 'Shape, spacing, and font are a switchable axis — flip <code>data-tune</code> and the whole surface changes without touching theme. Every component ships with an AGENTS.md-grade reference doc so AI agents read it once and code it right.',
        'cta' => [
            'github'     => 'View on GitHub',
            'components' => 'Browse components',
        ],
        'chip' => [
            'themes'     => '30+ daisyUI themes',
            'components' => '46 Blade components',
            'tunes'      => '10 Tune presets ↓',
        ],
        'selector' => [
            'tune_label'  => 'PICK A TUNE',
            'theme_label' => 'PICK A THEME',
        ],
        'iframe' => [
            'live'        => 'LIVE',
            'foot'        => 'acme studio · throughput dashboard',
            'previewing'  => 'previewing',
            'committed'   => 'committed:',
        ],
    ],

    'stat' => [
        'components' => [
            'label' => 'Components',
            'desc'  => 'across 7 categories',
        ],
        'tunes' => [
            'label' => 'Tune presets',
            'desc'  => 'shape × space × font',
        ],
        'themes' => [
            'label' => 'daisyUI themes',
            'desc'  => 'light · dark · all themed',
        ],
        'icons' => [
            'label' => 'Solar icons',
            'desc'  => 'pinion-icons v0.1.0',
        ],
        'icons_credit' => 'Icon count from sparrowhawk-labs/pinion-icons →',
    ],

    'whats_new' => [
        'title'         => "What's new",
        'all_releases'  => 'All releases',
        'card1' => [
            'title'    => 'Single-import preset',
            'body'     => 'One <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">pinion-ui.css</code> import wires Tailwind v4, daisyUI v5, and the tune token system in your app.css.',
            'released' => 'Released — 2026-04',
        ],
        'card2' => [
            'title'    => 'Focus + collapse plugins',
            'body'     => '<code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">ui:install</code> now auto-wires <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">@alpinejs/focus</code> and <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">@alpinejs/collapse</code> — modal focus-trap and accordion height animation just work.',
            'released' => 'Released — 2026-05',
        ],
        'card3' => [
            'title'    => 'Popover padding prop',
            'body'     => 'New <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">padding</code> prop on <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">&lt;x-popover&gt;</code> so right-click context menus can hug their content tightly.',
            'released' => 'Released — 2026-05',
        ],
    ],

    'ai_native' => [
        'title'       => 'Built for AI agents',
        'alert_title' => 'AI agents code with pinion-ui correctly',
        'bullet1'     => 'Read <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">CLAUDE.md</code> once for project conventions',
        'bullet2'     => '<code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">AGENTS.md</code> guides the per-component lookup workflow',
        'bullet3'     => '46 per-component reference docs under <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">reference/components/</code>',
        'bullet4'     => 'Fresh-Laravel install verified — drop the package into any new app and it builds',
        'install' => [
            'title'  => 'Install in 60 seconds',
            'step1'  => '# 1. Require the package',
            'step2'  => '# 2. Install assets + AGENTS.md scaffolding',
            'step3'  => '# 3. Build & run',
            'foot'   => '<code class="text-xs">--ai</code> drops <code class="text-xs">CLAUDE.md</code> + <code class="text-xs">AGENTS.md</code> in your repo root.',
        ],
    ],

    'components' => [
        'title'     => 'Components — a live taste',
        'subtitle'  => '9 of 46 — pick anything from the sidebar for the full matrix',
        'modal' => [
            'desc'    => 'Alpine-driven dialog with focus trap, ESC + backdrop dismiss.',
            'title'   => 'Welcome to pinion-ui',
            'body'    => '46 components, all themable, all documented for AI agents. Press <kbd class="kbd kbd-sm">Esc</kbd> or click outside to close.',
            'button'  => 'Open modal',
            'close'   => 'Close',
            'ok'      => 'Got it',
        ],
        'rating' => [
            'stars'      => 'stars',
            'half_heart' => 'half · heart',
        ],
        'toggle' => [
            'email' => 'Email notifications',
            'dark'  => 'Dark mode',
        ],
        'input' => [
            'label'       => 'Email',
            'hint'        => 'floating label · iconLeft prop',
            'placeholder' => 'you@example.com',
        ],
        'input_number' => [
            'label' => 'Quantity',
            'hint'  => 'Alpine-driven ± with bound clamping',
        ],
        'tooltip' => [
            'intro'   => 'Hover any button below:',
            'light'   => 'Default light surface',
            'neutral' => 'Stock dark bubble',
            'success' => 'Semantic colour',
        ],
        'stepper' => [
            'plan'  => 'Plan',
            'build' => 'Build',
            'ship'  => 'Ship',
        ],
    ],

    'ready' => [
        'title'    => 'Ready to build?',
        'subtitle' => 'Grab the package, scan the components, ship UI.',
        // :heart placeholder is substituted with a pre-rendered <x-i type="heart"> SVG.
        'foot'     => 'MIT licensed · built with :heart by sparrowhawk-labs',
    ],

    'subheading' => [
        'accordion' => 'Disclosure list. Changed to nested syntax in v0.4.0 (naturally pass Blade slots without XSS). Nest &lt;x-accordion-item title="..."&gt;content&lt;/x-accordion-item&gt; inside &lt;x-accordion&gt;. Single-open or multiple-open, 3 sizes. Content is a Blade slot, so any Blade markup, components, or links work. Alpine x-collapse animates smoothly.',
        'alert' => '8 appearances × semantic colors, dismissible support',
        'avatar' => 'initials / icon / image + size × shape × status indicator',
        'avatar-group' => 'Stack avatars into a facepile using daisyUI 5 avatar-group class. For project members, attendees, or assignees lists. Nest &lt;x-avatar&gt; in a slot. Spacing controls overlap (tight / normal / loose).',
        'badge' => 'color × appearance (solid / outline / soft / base-100 / base-200 / base-300 / dot)',
        'breadcrumb' => 'Hierarchy navigation wrapping daisyUI 5 breadcrumbs class. Dual API: pass items array or write &lt;ul&gt; with &lt;li&gt; yourself. Omit url on the last item to skip linking the current page. Separator: chevron (default) or slash. Sizes: sm / md / lg.',
        'button' => 'color × appearance (solid / outline / soft / base-100 / base-200 / base-300 / ghost / link) — all 8 colors',
        'button-group' => 'Bundle buttons/links as a segmented control. Wrapper auto-zeros border-radius on the center child and collapses shared borders. Hover fills with soft tint on the wrapper, keeping the group visually light (improved v0.3.3). Orientation: horizontal (default) or vertical. No need to add class="join-item" to children (removed v0.3.3).',
        'card' => 'appearance = default / elevated / filled / base-100 / base-200 / base-300 / outline / soft / solid / bordered-top / ghost — toggle divider',
        'checkbox' => 'Fake checkbox (peer + sr-only) — color × appearance (solid / soft / base-100 / base-200 / base-300) × size',
        'collapse' => 'Wrapped daisyUI 5 collapse class for a single toggle block (no-JS, checkbox-driven). Pass header via title prop or slot:title, body via $slot. Icons: null (default) / arrow / plus. Props: bordered (default true), open (initial state). Minimal by default; icon is opt-in. Stack multiple for FAQ.',
        'divider' => 'Section divider wrapping daisyUI 5 divider class. Bare &lt;x-divider&gt; for a line; add text in a slot for a label. direction=vertical makes it a vertical line inside flex.',
        'dropdown' => 'Alpine-driven generic dropdown. Swap trigger via slot, or use label prop for a simple button. position (bottom-end default / bottom-start / top-end / top-start), size (sm/md/lg), width (any Tailwind w-* class). Fill the menu slot with links, buttons, or anything.',
        'file-upload' => 'Native &lt;input type="file"&gt; + file:* inline utilities and dashed dropzone (large area). Multi-file with progress bar driven by Alpine—simulation flags make the demo self-running.',
        'font-debug' => 'JP × Latin font stack reference for designers and contributors',
        'indicator' => 'Wrap daisyUI 5 indicator class to overlay a badge or dot at a corner. position (9 combos: top/middle/bottom × start/center/end), dot (bool; true = plain dot, no text), color (8 colors, default=error), appearance (solid default / soft / outline / ghost / dash). Default is solid (dark fill) for strong "has notification" signal; soft is opt-in. Slot $badge for the badge, $slot for the element beneath.',
        'input' => 'color × appearance (outline / soft / underline / ghost) — prefix/suffix, icon, floating label, append slot support',
        'input-group' => 'Join any form elements horizontally (select+input, input+button, input+input, etc.). x-input prefix/suffix/append are for single-input combos; use this for multiple equal-weight form elements. Use the $c[\'addon\'] helper class to vertically align text decorators to addon height.',
        'input-number' => 'Quantity selector — [−] [input] [＋] in a joined border. min/max/step enforced by HTML attributes and Alpine clamping; ± buttons auto-disable at bounds. Native spinner arrows hidden. Decimal step (e.g. 0.5) supported.',
        'kbd' => 'Inline keyboard shortcut chip wrapping HTML5 &lt;kbd&gt; with daisyUI 5 kbd class. Two props: size and appearance. Embed in prose or chain with + to show combos.',
        'modal' => 'Alpine x-data overlay dialog. Click the trigger slot to open, or dispatch open-modal-{id} from elsewhere. size (sm/md/lg/xl/full), title, showClose, closeOnBackdrop props. Close via background click, Escape, or × button. x-trap for focus trap, x-teleport to append below body.',
        'notification-system' => 'Place once per page; dispatch notify event from any Alpine component with { type, content } payload. position / appearance / size / duration / event-name are configurable props.',
        'pagination' => 'full (numbered) / simple (prev-current/total-next) — color × appearance × size, Laravel paginator compatible',
        'pin-input' => 'OTP / auth code input — N single-char boxes with auto-advance, backspace-back, arrow nav, paste-to-fill. autocomplete="one-time-code" on the first box (shows SMS codes on iOS/Android). numeric (default) / alphanumeric. Props: length, size, masked, autofocus. Combined value posted via hidden input.',
        'popover' => 'Panel floats next to trigger on click (or hover). Sits between dropdown and tooltip — holds any content (info card, mini form, confirm prompt). 4 placements (top/right/bottom/left) via CSS (no collision detection), optional arrow. trigger="click" (default) / "hover". Alpine-driven, closes on Escape or outside click.',
        'progress' => 'daisyUI progress bar wrapper. value=null for indeterminate (animated stripe); set value for determinate. color × size × showLabel (percent / fraction) via props. a11y: role=progressbar + aria-valuenow/valuemin/valuemax.',
        'radio' => 'Fake radio (peer + sr-only) — color × appearance (solid / soft / base-100 / base-200 / base-300) × size, with radio-group',
        'range-slider' => 'Wrapped daisyUI 5 range class. &lt;input type="range"&gt; + chrome (label, value display, hint, error state). 8 colors × 5 sizes, min/max/step, showValue (Alpine live display), error state. Works as both form input and pure visual slider.',
        'rating' => 'daisyUI 5 rating (mask + radio) wrapper. star / heart / circle shapes, half-star support (half=true), readonly. Ensure unique name per demo to keep radio groups separate.',
        'select' => 'Native select — color × appearance, sizes, optgroup, multiple, floating label',
        'sidebar' => 'Drawer component rendered via x-teleport below body. Click trigger slot to open; Escape / × / background click closes. side (left/right), size (sm/md/lg), backdrop are the 3 axes. Focus trap (x-trap.inert.noscroll) and role=dialog/aria-modal=true for a11y. backdrop=false runs pointer-events-none on the overlay and pointer-events-auto on the panel, so you can inspect or interact with the page behind (persistent inspector, tool palette).',
        'skeleton' => 'Content loading placeholder wrapping daisyUI skeleton class. shape (rect / circle / text), width, height, radius, animated via props. width/height are Tailwind class names (w-32, h-4, etc.).',
        'spinner' => 'Loading indicator wrapping daisyUI 5 loading class. variant (spinner/dots/ring/bars/ball/infinity) × size (xs–xl) × color (8 colors) cover every "wait" scenario: inside buttons, full-page, cards, etc.',
        'stat' => 'Single KPI / metric display wrapping daisyUI stats + stat class. label / value / desc plus valueColor / trend / trendValue control color and direction arrows. For multiple stats, set wrapped=false and nest in &lt;div class="stats"&gt; yourself.',
        'stepper' => 'Visualize multi-step process (sign-up flow, checkout, wizard). Pass items array; set state=done|current|upcoming on each. orientation (horizontal default / vertical), variant (numbered default / dotted). timeline is for append-only history; stepper is for bounded sequential progress.',
        'table-scroll' => 'Normal table + x-table-scroll wrapper adds left/right scroll buttons and gradient fades when overflow. Wrapper stays transparent (adds nothing) when content fits. Not table-only; works with card lists, image strips, etc.',
        'tabs' => 'Tab-switched content. Changed to nested syntax in v0.4.0 (naturally pass Blade slots without XSS). Nest &lt;x-tab name="..." label="..."&gt;content&lt;/x-tab&gt; inside &lt;x-tabs&gt;. variant: underline (default) / boxed / pill. size: sm / md / lg. Set default active name (first tab if omitted). Alpine x-data tracks client-side active state.',
        'textarea' => 'color × appearance (outline / soft / underline / ghost) — rows, autoresize, character counter, label/hint/error',
        'theme-preview' => 'Page showing the tone of data-theme="pinion" bundled in v0.4.0. Each card overrides daisyUI v5 tokens inline (implementation uses a themes array).',
        'timeline' => 'Time-series list wrapping daisyUI 5 timeline class. Pass items array. orientation (vertical/horizontal), compact (one-side align), snap (icons snap top), appearance (solid default / soft) modifiers. Add state=done|current|upcoming to items for icon and connector color changes. solid (default) makes done chain prominent; appearance="soft" is opt-in for a gentler look.',
        'toggle' => 'Switch (peer + sr-only, role="switch") — color × appearance (solid / soft) × size, optional ON/OFF state labels. solid fills the rail; soft inverts and fills the thumb.',
        'tooltip' => 'No-JS pure CSS hover tip wrapping daisyUI 5 tooltip class. Put trigger in a slot, pass body via text prop. position (top/right/bottom/left), color (light default + 8 variants including neutral), open (always-on). A11y: title attribute on trigger for screen readers.',
    ],
];
