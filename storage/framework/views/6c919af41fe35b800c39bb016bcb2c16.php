<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['type', 'variant' => null, 'library' => null]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['type', 'variant' => null, 'library' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    // 優先順位: props > config default
    $iconLibrary = $library ?? config('icons.default_library', 'solar');
    $iconVariant = $variant ?? config('icons.default_style', 'bold-duotone');

    // Virtual variants: `emoji` / `pixel` を指定された場合、対応する library に切替
    // （library が明示されていない場合のみ）。これにより <x-i type="heart" variant="emoji" />
    // で fluent-emoji ライブラリが使われる。
    $virtualVariants = [
        'emoji' => 'fluent-emoji',
        'pixel' => 'pixelarticons',
    ];
    if ($library === null && isset($virtualVariants[$iconVariant])) {
        $iconLibrary = $virtualVariants[$iconVariant];
        $iconVariant = null;
    }

    // ライブラリ設定からパスを取得
    $libraryConfig = config('icons.libraries.' . $iconLibrary);
    $libraryPath = $libraryConfig['path'] ?? 'vendor/sparrowhawk-labs/pinion-icons/resources/icons/' . $iconLibrary;
    $libraryPattern = $libraryConfig['pattern'] ?? '{name}-{style}.svg';

    // SVGファイルパスを構築（pattern に従う）
    $filename = str_replace(['{name}', '{style}'], [$type, $iconVariant], $libraryPattern);
    $svgPath = base_path($libraryPath . '/' . $filename);

    // Synthetic-variant fallback: pattern が {style} を含むのに該当ファイルが無い場合、
    // {style} 抜きの {name}.svg を試す（variant の概念を持たないライブラリで同じ icon を
    // 全 variant に synthetic マッピングするため）。
    if (!file_exists($svgPath) && str_contains($libraryPattern, '{style}')) {
        $fallbackPattern = str_replace(['-{style}', '_{style}', '{style}'], '', $libraryPattern);
        $fallbackName = str_replace(['{name}'], [$type], $fallbackPattern);
        $fallbackPath = base_path($libraryPath . '/' . $fallbackName);
        if (file_exists($fallbackPath)) {
            $svgPath = $fallbackPath;
        }
    }

    if (!file_exists($svgPath)) {
        $svg = '<!-- Icon not found: ' . $iconLibrary . '/' . $type . '-' . $iconVariant . ' -->';
    } else {
        $svg = file_get_contents($svgPath);

        // SVGタグに属性をマージ
        $svg = preg_replace(
            '/<svg/',
            '<svg ' . $attributes->except(['type', 'variant', 'library']),
            $svg,
            1
        );
    }
?>

<?php echo $svg; ?>

<?php /**PATH /Users/a_t/project/sparrowhawk-labs/pinion-ui-playground/vendor/sparrowhawk-labs/pinion-icons/src/resources/views/components/i.blade.php ENDPATH**/ ?>