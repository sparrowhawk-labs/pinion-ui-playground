<?php $__env->startSection('title', '— Overview'); ?>
<?php $__env->startSection('heading', 'pinion-ui v2 Playground'); ?>
<?php $__env->startSection('subheading', 'Real Laravel Blade components + pinion-icons, wired via composer path repo'); ?>

<?php $__env->startSection('content'); ?>
    <div class="space-y-element">
        <?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'c454336ee90fd804c2f0328e5acccf4b::card','data' => ['appearance' => 'elevated']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['appearance' => 'elevated']); ?>
             <?php $__env->slot('header', null, []); ?> <h3 class="font-bold text-lg">Components</h3> <?php $__env->endSlot(); ?>
            <ul class="space-y-2 text-sm">
                <li><a href="/button" class="text-primary hover:underline">Button</a> — color × appearance × size + icons</li>
                <li><a href="/alert" class="text-primary hover:underline">Alert</a> — 8 appearances incl. bordered-top/left</li>
                <li><a href="/badge" class="text-primary hover:underline">Badge</a> — solid/outline/soft/white/dot</li>
                <li><a href="/card" class="text-primary hover:underline">Card</a> — 8 appearances + divider toggle</li>
                <li><a href="/avatar" class="text-primary hover:underline">Avatar</a> — initials/icon/image + status indicator</li>
            </ul>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal53747ceb358d30c0105769f8471417f6)): ?>
<?php $attributes = $__attributesOriginal53747ceb358d30c0105769f8471417f6; ?>
<?php unset($__attributesOriginal53747ceb358d30c0105769f8471417f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53747ceb358d30c0105769f8471417f6)): ?>
<?php $component = $__componentOriginal53747ceb358d30c0105769f8471417f6; ?>
<?php unset($__componentOriginal53747ceb358d30c0105769f8471417f6); ?>
<?php endif; ?>

        <?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'c454336ee90fd804c2f0328e5acccf4b::card','data' => ['appearance' => 'soft','color' => 'info']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['appearance' => 'soft','color' => 'info']); ?>
             <?php $__env->slot('header', null, []); ?> <h3 class="font-bold">How to use</h3> <?php $__env->endSlot(); ?>
            <p class="text-sm">左サイドバーからコンポーネントを選択。上部ツールバーで <code>theme</code>（daisyUI 35 種）× <code>tune</code>（10 種）× 日本語 on/off を切替できます。</p>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal53747ceb358d30c0105769f8471417f6)): ?>
<?php $attributes = $__attributesOriginal53747ceb358d30c0105769f8471417f6; ?>
<?php unset($__attributesOriginal53747ceb358d30c0105769f8471417f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53747ceb358d30c0105769f8471417f6)): ?>
<?php $component = $__componentOriginal53747ceb358d30c0105769f8471417f6; ?>
<?php unset($__componentOriginal53747ceb358d30c0105769f8471417f6); ?>
<?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.playground', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/a_t/project/sparrowhawk-labs/pinion-ui-playground/resources/views/pages/overview.blade.php ENDPATH**/ ?>