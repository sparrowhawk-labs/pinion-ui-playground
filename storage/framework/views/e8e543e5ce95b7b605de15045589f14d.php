<?php $__env->startSection('title', '— Icons'); ?>
<?php $__env->startSection('heading', 'Icons'); ?>

<?php $__env->startSection('subheading'); ?>
<?php echo e(count($icons)); ?> Solar icons × 6 styles + Fluent Emoji + Pixelarticons — powered by <code class="font-mono text-sm bg-base-200 px-1.5 py-0.5 rounded">&lt;x-i&gt;</code> from <code class="font-mono text-sm bg-base-200 px-1.5 py-0.5 rounded">sparrowhawk-labs/pinion-icons</code>.
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    window.__ICONS_DATA = {
        icons: <?php echo json_encode($icons); ?>,
        variants: <?php echo json_encode($variants); ?>,
        emojiNames: <?php echo json_encode($emojiNames); ?>,
        pixelNames: <?php echo json_encode($pixelNames); ?>

    };
    window.__VIRTUAL_VARIANTS = ['emoji', 'pixel'];
    window.iconsPage = function () {
        return {
            variant: localStorage.getItem('pinion-icons-variant') || 'bold-duotone',
            size: parseInt(localStorage.getItem('pinion-icons-size') || '24'),
            filter: '',
            page: 1,
            perPage: 96,
            allIcons: window.__ICONS_DATA.icons,
            emojiNames: window.__ICONS_DATA.emojiNames,
            pixelNames: window.__ICONS_DATA.pixelNames,
            variants: [...window.__ICONS_DATA.variants, ...window.__VIRTUAL_VARIANTS],
            toast: '',
            toastTimer: null,
            setVariant(v) { this.variant = v; this.page = 1; localStorage.setItem('pinion-icons-variant', v); },
            setSize(s) { this.size = parseInt(s); localStorage.setItem('pinion-icons-size', this.size); },
            get activeLibrary() {
                if (this.variant === 'emoji') return 'fluent-emoji';
                if (this.variant === 'pixel') return 'pixelarticons';
                return 'solar';
            },
            iconSrc(name) {
                if (this.variant === 'emoji') return `/vendor-icons/fluent-emoji/${name}.svg`;
                if (this.variant === 'pixel') return `/vendor-icons/pixelarticons/${name}.svg`;
                return `/vendor-icons/solar/${name}-${this.variant}.svg`;
            },
            solarVariant() {
                return window.__VIRTUAL_VARIANTS.includes(this.variant) ? 'bold-duotone' : this.variant;
            },
            get filteredIcons() {
                if (!this.filter) return this.allIcons;
                const q = this.filter.toLowerCase();
                return this.allIcons.filter(n => n.toLowerCase().includes(q));
            },
            get pagedIcons() {
                const start = (this.page - 1) * this.perPage;
                return this.filteredIcons.slice(start, start + this.perPage);
            },
            get totalPages() {
                return Math.max(1, Math.ceil(this.filteredIcons.length / this.perPage));
            },
            copySnippet(name) {
                const snippet = '<' + 'x-i type="' + name + '" variant="' + this.variant + '" />';
                navigator.clipboard.writeText(snippet).then(() => {
                    this.toast = 'Copied: ' + snippet;
                    clearTimeout(this.toastTimer);
                    this.toastTimer = setTimeout(() => this.toast = '', 2000);
                });
            },
            init() {
                this.$watch('filter', () => this.page = 1);
            }
        };
    };
</script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div x-data="iconsPage()" class="space-y-12">

    
    <div class="flex flex-wrap items-center gap-4 p-element bg-base-200/60 border border-base-300 rounded-[var(--radius-box)]">
        <div class="flex items-center gap-2">
            <label class="text-xs font-medium text-base-content/60">Variant:</label>
            <div class="flex flex-wrap gap-1">
                <template x-for="v in variants" :key="v">
                    <button @click="setVariant(v)"
                        :class="variant === v ? 'bg-primary text-primary-content' : 'bg-base-100 text-base-content hover:bg-base-300'"
                        class="text-xs px-2 py-0.5 rounded border border-base-300 transition-colors cursor-pointer"
                        x-text="v"></button>
                </template>
            </div>
        </div>
        <div class="flex items-center gap-2">
            <label class="text-xs font-medium text-base-content/60">Size:</label>
            <input type="range" min="16" max="48" step="4" x-model="size" @input="setSize($event.target.value)" class="range range-xs range-primary w-32">
            <span class="text-xs font-mono w-10 text-right" x-text="size + 'px'"></span>
        </div>
    </div>

    
    <section>
        <h2 class="text-xl font-bold mb-2">Variant comparison</h2>
        <p class="text-base-content/60 mb-4 text-sm">Same icon across all 6 Solar styles + <code class="font-mono text-xs bg-base-200 px-1.5 py-0.5 rounded">emoji</code> / <code class="font-mono text-xs bg-base-200 px-1.5 py-0.5 rounded">pixel</code> virtual variants.</p>
        <div class="overflow-x-auto">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th class="text-left">icon</th>
                        <?php $__currentLoopData = $variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th class="text-center"><?php echo e($v); ?></th>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <th class="text-center">emoji</th>
                        <th class="text-center">pixel</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = ['home', 'heart', 'user', 'settings', 'bell', 'trash-bin-trash']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="font-mono text-xs"><?php echo e($name); ?></td>
                            <?php $__currentLoopData = $variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td class="text-center">
                                    <?php if (isset($component)) { $__componentOriginal3381b137e3b34472ebe40260d4414c5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3381b137e3b34472ebe40260d4414c5f = $attributes; } ?>
<?php $component = SparrowhawkLabs\PinionIcons\View\Components\Icon::resolve(['type' => $name,'variant' => $v] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('i'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\SparrowhawkLabs\PinionIcons\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'inline-block','style' => 'width:32px;height:32px']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3381b137e3b34472ebe40260d4414c5f)): ?>
<?php $attributes = $__attributesOriginal3381b137e3b34472ebe40260d4414c5f; ?>
<?php unset($__attributesOriginal3381b137e3b34472ebe40260d4414c5f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3381b137e3b34472ebe40260d4414c5f)): ?>
<?php $component = $__componentOriginal3381b137e3b34472ebe40260d4414c5f; ?>
<?php unset($__componentOriginal3381b137e3b34472ebe40260d4414c5f); ?>
<?php endif; ?>
                                </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <td class="text-center">
                                <?php if (isset($component)) { $__componentOriginal3381b137e3b34472ebe40260d4414c5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3381b137e3b34472ebe40260d4414c5f = $attributes; } ?>
<?php $component = SparrowhawkLabs\PinionIcons\View\Components\Icon::resolve(['type' => $name,'variant' => 'emoji'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('i'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\SparrowhawkLabs\PinionIcons\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'inline-block','style' => 'width:32px;height:32px']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3381b137e3b34472ebe40260d4414c5f)): ?>
<?php $attributes = $__attributesOriginal3381b137e3b34472ebe40260d4414c5f; ?>
<?php unset($__attributesOriginal3381b137e3b34472ebe40260d4414c5f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3381b137e3b34472ebe40260d4414c5f)): ?>
<?php $component = $__componentOriginal3381b137e3b34472ebe40260d4414c5f; ?>
<?php unset($__componentOriginal3381b137e3b34472ebe40260d4414c5f); ?>
<?php endif; ?>
                            </td>
                            <td class="text-center">
                                <?php if (isset($component)) { $__componentOriginal3381b137e3b34472ebe40260d4414c5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3381b137e3b34472ebe40260d4414c5f = $attributes; } ?>
<?php $component = SparrowhawkLabs\PinionIcons\View\Components\Icon::resolve(['type' => $name,'variant' => 'pixel'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('i'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\SparrowhawkLabs\PinionIcons\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'inline-block','style' => 'width:32px;height:32px']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3381b137e3b34472ebe40260d4414c5f)): ?>
<?php $attributes = $__attributesOriginal3381b137e3b34472ebe40260d4414c5f; ?>
<?php unset($__attributesOriginal3381b137e3b34472ebe40260d4414c5f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3381b137e3b34472ebe40260d4414c5f)): ?>
<?php $component = $__componentOriginal3381b137e3b34472ebe40260d4414c5f; ?>
<?php unset($__componentOriginal3381b137e3b34472ebe40260d4414c5f); ?>
<?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </section>

    
    <section>
        <h2 class="text-xl font-bold mb-2">Library comparison <span class="badge badge-warning badge-sm align-middle ml-1">PoC</span></h2>
        <p class="text-base-content/60 mb-2 text-sm">Same concept across <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">solar</code>, <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">fluent-emoji</code> (Microsoft, MIT — flat color), <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">pixelarticons</code> (MIT — monochrome 8bit). 25-concept PoC; some pixel icons are semantic fallbacks.</p>
        <p class="text-base-content/60 mb-6 text-xs">Plain <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">close / check / plus / minus</code> come from <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">solar-extra</code> (Solar wraps them in rings).</p>
        <div class="overflow-x-auto">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th class="text-left">concept</th>
                        <th class="text-center">solar / solar-extra <span class="text-xs font-normal text-base-content/50">(current variant)</span></th>
                        <th class="text-center">fluent-emoji</th>
                        <th class="text-center">pixelarticons</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $pocConcepts = ['close', 'check', 'plus', 'minus', 'heart', 'star', 'home', 'user', 'settings', 'bell', 'folder', 'file-text', 'magnifer', 'cart-large', 'trash-bin-trash', 'download', 'upload', 'pen', 'eye', 'lock', 'arrow-right', 'arrow-left', 'arrow-up', 'arrow-down', 'hamburger-menu'];
                        $extraNames = ['close', 'check', 'plus', 'minus'];
                    ?>
                    <?php $__currentLoopData = $pocConcepts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $libForName = in_array($name, $extraNames) ? 'solar-extra' : 'solar'; ?>
                        <tr>
                            <td class="font-mono text-xs"><?php echo e($name); ?></td>
                            <td class="text-center">
                                <img :src="`/vendor-icons/<?php echo e($libForName); ?>/<?php echo e($name); ?>-${solarVariant()}.svg`"
                                     alt="<?php echo e($name); ?>" :style="`width:${size}px;height:${size}px`"
                                     class="inline-block opacity-90" />
                                <?php if($libForName === 'solar-extra'): ?>
                                    <div class="text-[9px] text-base-content/40 font-mono mt-0.5">solar-extra</div>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <img src="/vendor-icons/fluent-emoji/<?php echo e($name); ?>.svg"
                                     alt="<?php echo e($name); ?>" :style="`width:${size}px;height:${size}px`"
                                     class="inline-block" />
                            </td>
                            <td class="text-center">
                                <img src="/vendor-icons/pixelarticons/<?php echo e($name); ?>.svg"
                                     alt="<?php echo e($name); ?>" :style="`width:${size}px;height:${size}px`"
                                     class="inline-block" />
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </section>

    
    <section>
        <div class="flex flex-wrap items-end justify-between gap-4 mb-4">
            <div>
                <h2 class="text-xl font-bold mb-1">All icons</h2>
                <p class="text-base-content/60 text-sm">Click any icon to copy its Blade snippet. Respects the variant + size above.</p>
            </div>
            <div class="flex items-center gap-2">
                <input type="text" x-model="filter" placeholder="Filter by name..."
                    class="input input-bordered input-sm w-64">
                <span class="text-xs text-base-content/60">
                    <span x-text="filteredIcons.length"></span> / <span x-text="allIcons.length"></span>
                    <span class="font-mono text-[10px] text-base-content/40" x-text="'(' + activeLibrary + ')'"></span>
                </span>
            </div>
        </div>

        <div class="grid grid-cols-4 sm:grid-cols-6 md:grid-cols-8 lg:grid-cols-10 gap-2">
            <template x-for="name in pagedIcons" :key="name">
                <button @click="copySnippet(name)"
                    class="group flex flex-col items-center justify-center gap-1 p-2 rounded-lg border border-base-200 hover:border-primary hover:bg-base-200/50 transition-colors cursor-pointer aspect-square">
                    <div class="flex-1 flex items-center justify-center w-full" :style="`height:${size + 8}px`">
                        <img :src="iconSrc(name)" :alt="name"
                             :style="`width:${size}px;height:${size}px`"
                             class="opacity-80 group-hover:opacity-100" />
                    </div>
                    <span class="text-[10px] font-mono text-base-content/50 truncate w-full text-center" x-text="name"></span>
                </button>
            </template>
        </div>

        <div class="flex items-center justify-center gap-2 mt-8" x-show="totalPages > 1">
            <button @click="page = Math.max(1, page - 1)" :disabled="page === 1"
                class="btn btn-sm btn-ghost" :class="page === 1 ? 'opacity-40 cursor-not-allowed' : ''">prev</button>
            <span class="text-sm text-base-content/70">
                page <span x-text="page"></span> / <span x-text="totalPages"></span>
            </span>
            <button @click="page = Math.min(totalPages, page + 1)" :disabled="page === totalPages"
                class="btn btn-sm btn-ghost" :class="page === totalPages ? 'opacity-40 cursor-not-allowed' : ''">next</button>
        </div>
    </section>

    
    <section>
        <h2 class="text-xl font-bold mb-2">Size scaling</h2>
        <p class="text-base-content/60 mb-6 text-sm">Single <code class="font-mono text-xs bg-base-200 px-1.5 py-0.5 rounded">heart</code> icon at 12 / 16 / 20 / 24 / 32 / 48 / 64 px — uses current variant.</p>
        <div class="flex flex-wrap items-end gap-6">
            <?php $__currentLoopData = [12, 16, 20, 24, 32, 48, 64]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $px): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex flex-col items-center gap-2">
                    <div class="flex items-center justify-center" style="height:64px;width:64px;">
                        <img :src="iconSrc('heart')" alt="heart" style="width:<?php echo e($px); ?>px;height:<?php echo e($px); ?>px" />
                    </div>
                    <span class="text-xs font-mono text-base-content/50"><?php echo e($px); ?>px</span>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

    
    <section>
        <h2 class="text-xl font-bold mb-2">Color</h2>
        <p class="text-base-content/60 mb-6 text-sm">Inline SVGs via <code class="font-mono text-xs bg-base-200 px-1.5 py-0.5 rounded">&lt;x-i&gt;</code> inherit <code class="font-mono text-xs bg-base-200 px-1.5 py-0.5 rounded">currentColor</code>. Apply <code class="font-mono text-xs bg-base-200 px-1.5 py-0.5 rounded">text-*</code> utilities.</p>
        <div class="flex flex-wrap items-center gap-6 mb-8">
            <?php $__currentLoopData = ['text-red-500','text-blue-500','text-emerald-500','text-amber-500','text-purple-500','text-pink-500','text-cyan-500','text-base-content']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex flex-col items-center gap-2">
                    <div class="<?php echo e($color); ?>">
                        <?php if (isset($component)) { $__componentOriginal3381b137e3b34472ebe40260d4414c5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3381b137e3b34472ebe40260d4414c5f = $attributes; } ?>
<?php $component = SparrowhawkLabs\PinionIcons\View\Components\Icon::resolve(['type' => 'star','variant' => 'bold-duotone'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('i'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\SparrowhawkLabs\PinionIcons\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['style' => 'width:48px;height:48px']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3381b137e3b34472ebe40260d4414c5f)): ?>
<?php $attributes = $__attributesOriginal3381b137e3b34472ebe40260d4414c5f; ?>
<?php unset($__attributesOriginal3381b137e3b34472ebe40260d4414c5f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3381b137e3b34472ebe40260d4414c5f)): ?>
<?php $component = $__componentOriginal3381b137e3b34472ebe40260d4414c5f; ?>
<?php unset($__componentOriginal3381b137e3b34472ebe40260d4414c5f); ?>
<?php endif; ?>
                    </div>
                    <span class="text-xs font-mono text-base-content/50"><?php echo e($color); ?></span>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <h3 class="text-base font-semibold mb-4">Semantic (daisyUI) colors</h3>
        <div class="flex flex-wrap items-center gap-6">
            <?php $__currentLoopData = ['text-primary','text-secondary','text-accent','text-info','text-success','text-warning','text-error']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex flex-col items-center gap-2">
                    <div class="<?php echo e($color); ?>">
                        <?php if (isset($component)) { $__componentOriginal3381b137e3b34472ebe40260d4414c5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3381b137e3b34472ebe40260d4414c5f = $attributes; } ?>
<?php $component = SparrowhawkLabs\PinionIcons\View\Components\Icon::resolve(['type' => 'bell','variant' => 'bold'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('i'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\SparrowhawkLabs\PinionIcons\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['style' => 'width:48px;height:48px']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3381b137e3b34472ebe40260d4414c5f)): ?>
<?php $attributes = $__attributesOriginal3381b137e3b34472ebe40260d4414c5f; ?>
<?php unset($__attributesOriginal3381b137e3b34472ebe40260d4414c5f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3381b137e3b34472ebe40260d4414c5f)): ?>
<?php $component = $__componentOriginal3381b137e3b34472ebe40260d4414c5f; ?>
<?php unset($__componentOriginal3381b137e3b34472ebe40260d4414c5f); ?>
<?php endif; ?>
                    </div>
                    <span class="text-xs font-mono text-base-content/50"><?php echo e($color); ?></span>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

    
    <div x-show="toast" x-transition
        class="fixed bottom-6 right-6 bg-neutral text-neutral-content px-4 py-2 rounded-lg shadow-lg text-sm z-50 font-mono"
        x-text="toast"
        style="display:none"></div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.playground', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/a_t/project/sparrowhawk-labs/pinion-ui-playground/resources/views/pages/icons.blade.php ENDPATH**/ ?>