# Pinion UI Playground

[![License](https://img.shields.io/github/license/sparrowhawk-labs/pinion-ui-playground.svg?style=flat-square)](LICENSE)
[![PHP Version](https://img.shields.io/badge/php-%5E8.3-777BB4?style=flat-square)](composer.json)
[![Laravel](https://img.shields.io/badge/laravel-%5E13.0-FF2D20?style=flat-square)](https://laravel.com)

A Laravel showcase app for **[`sparrowhawk-labs/pinion-ui`](https://github.com/sparrowhawk-labs/pinion-ui)** and **[`sparrowhawk-labs/pinion-icons`](https://github.com/sparrowhawk-labs/pinion-icons)**. Every component rendered across daisyUI's 35 themes × Pinion UI's 11 Tune presets, plus a browser for all 7,400+ Pinion Icons.

By [Sparrowhawk Labs](https://sparrowhawk-labs.dev).

## What's in here

- **13 component pages** — Button, Alert, Badge, Card, Avatar, Input, Textarea, Select, Checkbox, Radio, Toggle, File Upload
- **Theme × Tune matrix** — pick any of 35 daisyUI themes and 11 Tune presets independently; every component re-renders live. State persisted in `localStorage`.
- **Side-by-side debug mode** — render the same page in two themes (lofi / night) simultaneously to spot contrast issues, using `<template x-if>` so radios/checkboxes don't collide.
- **Icon browser** — `/icons` page enumerates all 1,234 Solar concepts × 6 stroke variants + Fluent Emoji + Pixelarticons virtual variants. Filter, paginate, click-to-copy `<x-i>` snippets.
- **Japanese toggle** — flip page-level `data-ja` for a Japanese-vs-English layout sanity check.

## Setup

Requires PHP 8.3+, Node 22+, Composer 2.

```bash
git clone https://github.com/sparrowhawk-labs/pinion-ui-playground
cd pinion-ui-playground

composer install
npm install
cp .env.example .env
php artisan key:generate
npm run build
php artisan serve
```

Open <http://127.0.0.1:8000>. For live-reload during development use `npm run dev` in a second terminal (the `composer dev` script runs server + queue + logs + vite together).

## How it works

```
resources/
├── css/app.css                 # imports the pinion-ui preset (wires Tailwind @source globs)
├── js/app.js                   # boots Alpine.js + @alpinejs/collapse
└── views/
    ├── layouts/playground.blade.php   # sidebar + theme/tune/ja/debug top bar
    └── pages/                          # one file per component (anonymous <x-button>, <x-input>, …)
        ├── overview.blade.php
        ├── button.blade.php
        ├── …
        └── icons.blade.php             # icon browser with variant/size controls + filter + pagination
```

The Tune layer (shape / spacing / font / sizing) lives in `pinion-ui` itself; this playground just toggles `data-tune` on `<html>` to swap presets. The icon browser uses a tiny `/vendor-icons/{library}/{file}` proxy route (see `routes/web.php`) so `<img src>` can read SVGs out of the vendor directory directly — no asset publishing required.

## Pinion series

Part of the [Sparrowhawk Labs](https://sparrowhawk-labs.dev) `pinion-*` series:

- [`sparrowhawk-labs/pinion-icons`](https://github.com/sparrowhawk-labs/pinion-icons) — unified icon system
- [`sparrowhawk-labs/pinion-ui`](https://github.com/sparrowhawk-labs/pinion-ui) — Blade UI components (hard-requires pinion-icons)
- **`sparrowhawk-labs/pinion-ui-playground`** *(this repo)* — showcase Laravel app
- `sparrowhawk-labs/sparrowhawk` *(framework core, in design)*

## License

MIT — see [LICENSE](LICENSE).
