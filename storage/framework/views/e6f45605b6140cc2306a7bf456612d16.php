<!DOCTYPE html>
<html lang="ja" data-theme="light" data-tune="default" data-ja>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pinion-ui playground <?php echo $__env->yieldContent('title'); ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&family=Fredoka:wght@400;600&family=IBM+Plex+Sans:wght@400;500;600;700&family=Instrument+Sans:wght@400;500;700&family=Inter:wght@400;500;700&family=JetBrains+Mono:wght@400;500;700&family=Lora:ital,wght@0,400;0,500;0,700;1,400&family=M+PLUS+1+Code:wght@400;500;700&family=M+PLUS+1p:wght@400;500;700&family=Montserrat:wght@400;500;700;900&family=Noto+Sans+JP:wght@400;500;700&family=Nunito:wght@400;700;800&family=Outfit:wght@400;500;600;700&family=Playfair+Display:wght@400;700&family=Press+Start+2P&family=Quicksand:wght@400;500;700&family=Shippori+Mincho:wght@400;500;700&family=Space+Grotesk:wght@400;500;700&family=Space+Mono:wght@400;700&family=Zen+Maru+Gothic:wght@400;500;700&display=swap" rel="stylesheet">

    
    <script>
        (function () {
            var d = document.documentElement;
            var t = localStorage.getItem('pinion-theme');
            var u = localStorage.getItem('pinion-tune');
            var j = localStorage.getItem('pinion-ja');
            if (t) d.setAttribute('data-theme', t);
            if (u) d.setAttribute('data-tune', u);
            d.setAttribute('data-ja', j === 'off' ? 'off' : '');
        })();
    </script>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-base-100 text-base-content min-h-screen" x-data="{
    theme: localStorage.getItem('pinion-theme') || 'light',
    tune: localStorage.getItem('pinion-tune') || 'default',
    ja: localStorage.getItem('pinion-ja') !== 'off',
    debug: localStorage.getItem('pinion-debug') === 'on',
    themes: ['light','dark','abyss','acid','aqua','autumn','black','bumblebee','business','caramellatte','cmyk','coffee','corporate','cupcake','cyberpunk','dim','dracula','emerald','fantasy','forest','garden','halloween','lemonade','lofi','luxury','night','nord','pastel','retro','silk','sunset','synthwave','valentine','winter','wireframe'],
    tunes: ['default','sharp','soft','playful','corporate','brutal','elegant','bold','pixel','tech'],
    setTheme(t) { this.theme = t; document.documentElement.setAttribute('data-theme', t); localStorage.setItem('pinion-theme', t); },
    setTune(t) { this.tune = t; document.documentElement.setAttribute('data-tune', t); localStorage.setItem('pinion-tune', t); },
    setJa(on) { this.ja = on; document.documentElement.setAttribute('data-ja', on ? '' : 'off'); localStorage.setItem('pinion-ja', on ? 'on' : 'off'); },
    setDebug(on) { this.debug = on; localStorage.setItem('pinion-debug', on ? 'on' : 'off'); },
    // Debug mode mounts the same yielded content twice (lofi + night). The two
    // copies share name=... and id=... because the section is re-emitted
    // verbatim, so radios collide across panes (only one stays checked) and
    // labels link to the wrong input. Post-mount we suffix every name/id and
    // re-link label[for] within the pane — purely cosmetic in debug mode, no
    // impact on form submission semantics (this UI never POSTs).
    isolateDuplicates(root, suffix) {
        for (const el of root.querySelectorAll('input[name], select[name], textarea[name]')) {
            el.name = el.name + '__' + suffix;
        }
        const idMap = new Map();
        for (const el of root.querySelectorAll('[id]')) {
            const newId = el.id + '__' + suffix;
            idMap.set(el.id, newId);
            el.id = newId;
        }
        for (const el of root.querySelectorAll('label[for]')) {
            if (idMap.has(el.htmlFor)) el.htmlFor = idMap.get(el.htmlFor);
        }
        // Browser deduped same-name radios across the two panes at parse time —
        // by the time names are unique each radio is its own group, but the
        // unchecked side has already lost `.checked`. Restore from HTML's
        // `defaultChecked` (the parsed `checked` attribute) so each pane shows
        // the original state independently.
        for (const el of root.querySelectorAll('input[type=radio], input[type=checkbox]')) {
            el.checked = el.defaultChecked;
        }
    },
}">

    <?php
        $nav = [
            ['slug' => '',        'label' => 'Overview'],
            ['slug' => 'button',  'label' => 'Button'],
            ['slug' => 'alert',   'label' => 'Alert'],
            ['slug' => 'badge',   'label' => 'Badge'],
            ['slug' => 'card',    'label' => 'Card'],
            ['slug' => 'avatar',  'label' => 'Avatar'],
            ['slug' => 'input',    'label' => 'Input'],
            ['slug' => 'textarea', 'label' => 'Textarea'],
            ['slug' => 'select',   'label' => 'Select'],
            ['slug' => 'checkbox', 'label' => 'Checkbox'],
            ['slug' => 'radio',    'label' => 'Radio'],
            ['slug' => 'toggle',   'label' => 'Toggle'],
            ['slug' => 'file-upload', 'label' => 'File Upload'],
            ['slug' => 'icons',    'label' => 'Icons',    'section' => 'pinion-icons'],
        ];
        $current = request()->path() === '/' ? '' : request()->path();
    ?>

    <div class="flex min-h-screen">
        
        <aside class="w-60 shrink-0 border-r border-base-300 bg-base-200/40 sticky top-0 h-screen overflow-y-auto">
            <div class="p-4 border-b border-base-300">
                <a href="/" class="text-sm font-bold text-primary">pinion-ui playground</a>
                <p class="text-xs text-base-content/50 mt-1">Blade components</p>
            </div>
            <nav class="p-2 flex flex-col gap-0.5">
                <div class="px-3 pt-1 pb-1 text-[10px] font-semibold uppercase tracking-wider text-base-content/40">pinion-ui</div>
                <?php $__currentLoopData = $nav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $active = $current === $item['slug'];
                        $isSection = isset($item['section']);
                    ?>
                    <?php if($isSection): ?>
                        <div class="mt-3 px-3 pt-1 pb-1 text-[10px] font-semibold uppercase tracking-wider text-base-content/40"><?php echo e($item['section']); ?></div>
                    <?php endif; ?>
                    <a href="/<?php echo e($item['slug']); ?>"
                       class="block px-3 py-2 rounded text-sm transition-colors <?php echo e($active ? 'bg-primary text-primary-content font-semibold' : 'text-base-content hover:bg-base-300'); ?>">
                        <?php echo e($item['label']); ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </nav>
        </aside>

        
        <div class="flex-1 min-w-0 flex flex-col">
            
            <div class="sticky top-0 z-50 bg-base-200 border-b border-base-300 px-4 py-3">
                <div class="flex flex-wrap items-center gap-4">
                    <div class="flex items-center gap-2">
                        <label class="text-xs font-medium text-base-content/60">Theme:</label>
                        <select x-model="theme" @change="setTheme($event.target.value)" class="text-xs bg-base-100 border border-base-300 rounded px-2 py-1 outline-none">
                            <?php $__currentLoopData = ['light','dark','abyss','acid','aqua','autumn','black','bumblebee','business','caramellatte','cmyk','coffee','corporate','cupcake','cyberpunk','dim','dracula','emerald','fantasy','forest','garden','halloween','lemonade','lofi','luxury','night','nord','pastel','retro','silk','sunset','synthwave','valentine','winter','wireframe']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($t); ?>"><?php echo e($t); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="flex items-center gap-2">
                        <label class="text-xs font-medium text-base-content/60">Tune:</label>
                        <div class="flex flex-wrap gap-1">
                            <template x-for="t in tunes" :key="t">
                                <button @click="setTune(t)"
                                    :class="tune === t ? 'bg-primary text-primary-content' : 'bg-base-100 text-base-content hover:bg-base-300'"
                                    class="text-xs px-2 py-0.5 rounded border border-base-300 transition-colors cursor-pointer"
                                    x-text="t"></button>
                            </template>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <label class="text-xs font-medium text-base-content/60">Japanese:</label>
                        <button @click="setJa(!ja)"
                            :class="ja ? 'bg-primary text-primary-content' : 'bg-base-100 text-base-content hover:bg-base-300'"
                            class="text-xs px-2 py-0.5 rounded border border-base-300 transition-colors cursor-pointer"
                            x-text="ja ? 'on' : 'off'"></button>
                    </div>
                    <div class="flex items-center gap-2">
                        <label class="text-xs font-medium text-base-content/60">Debug:</label>
                        <button @click="setDebug(!debug)"
                            :class="debug ? 'bg-primary text-primary-content' : 'bg-base-100 text-base-content hover:bg-base-300'"
                            class="text-xs px-2 py-0.5 rounded border border-base-300 transition-colors cursor-pointer"
                            :title="debug ? 'lofi / night 同時表示' : 'デバッグ表示 (lofi/night 2-カラム)'"
                            x-text="debug ? 'lofi/night' : 'off'"></button>
                    </div>
                </div>
            </div>

            
            <template x-if="!debug">
                <main class="flex-1 px-6 lg:px-10 py-10 max-w-6xl">
                    <h1 class="text-3xl font-bold mb-2"><?php echo $__env->yieldContent('heading'); ?></h1>
                    <?php if (! empty(trim($__env->yieldContent('subheading')))): ?>
                        <p class="text-base-content/60 mb-8"><?php echo $__env->yieldContent('subheading'); ?></p>
                    <?php endif; ?>

                    <?php echo $__env->yieldContent('content'); ?>
                </main>
            </template>

            
            <template x-if="debug">
                <div class="flex-1 grid grid-cols-2 divide-x divide-base-300 min-h-[calc(100vh-3.5rem)]">
                    
                    <main data-theme="lofi" :data-tune="tune"
                          x-init="$nextTick(() => isolateDuplicates($el, 'lofi'))"
                          class="bg-base-100 text-base-content min-w-0 px-4 lg:px-6 py-8 overflow-x-auto">
                        <div class="text-[10px] uppercase tracking-wider text-base-content/50 mb-3 font-semibold">data-theme = lofi</div>
                        <h1 class="text-2xl font-bold mb-2"><?php echo $__env->yieldContent('heading'); ?></h1>
                        <?php if (! empty(trim($__env->yieldContent('subheading')))): ?>
                            <p class="text-base-content/60 mb-6 text-sm"><?php echo $__env->yieldContent('subheading'); ?></p>
                        <?php endif; ?>
                        <?php echo $__env->yieldContent('content'); ?>
                    </main>
                    <main data-theme="night" :data-tune="tune"
                          x-init="$nextTick(() => isolateDuplicates($el, 'night'))"
                          class="bg-base-100 text-base-content min-w-0 px-4 lg:px-6 py-8 overflow-x-auto">
                        <div class="text-[10px] uppercase tracking-wider text-base-content/50 mb-3 font-semibold">data-theme = night</div>
                        <h1 class="text-2xl font-bold mb-2"><?php echo $__env->yieldContent('heading'); ?></h1>
                        <?php if (! empty(trim($__env->yieldContent('subheading')))): ?>
                            <p class="text-base-content/60 mb-6 text-sm"><?php echo $__env->yieldContent('subheading'); ?></p>
                        <?php endif; ?>
                        <?php echo $__env->yieldContent('content'); ?>
                    </main>
                </div>
            </template>
        </div>
    </div>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH /Users/a_t/project/sparrowhawk-labs/pinion-ui-playground/resources/views/layouts/playground.blade.php ENDPATH**/ ?>