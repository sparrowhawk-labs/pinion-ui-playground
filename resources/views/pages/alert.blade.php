@extends('layouts.playground')

@section('title', '— Alert')
@section('heading', 'Alerts')
@section('subheading', __('playground.subheading.alert'))

@section('content')
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        bordered-left
    </p>
    <div class="flex flex-col gap-compact mb-6">
        <x-alert color="info" title="お知らせ">新しいバージョンが利用可能です。</x-alert>
        <x-alert color="success" title="完了">データが正常に保存されました。</x-alert>
        <x-alert color="warning" title="注意">ストレージの使用率が 80% を超えています。</x-alert>
        <x-alert color="error" title="エラー (dismissible)" dismissible>接続に失敗しました。再試行してください。</x-alert>
    </div>

    @foreach(['soft','vivid','solid','outline','base-100','base-200','base-300'] as $app)
        <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">{{ $app }}{{ $app === 'soft' ? ' (text-base-content / mute)' : ($app === 'vivid' ? ' (saturated color-mix)' : '') }}</p>
        <div class="flex flex-col gap-compact mb-6">
            <x-alert color="info"    :appearance="$app" title="Info alert">{{ $app }} appearance の情報通知。</x-alert>
            <x-alert color="success" :appearance="$app" title="Success alert">{{ $app }} appearance の成功通知。</x-alert>
            <x-alert color="warning" :appearance="$app" title="Warning alert">{{ $app }} appearance の警告通知。</x-alert>
            <x-alert color="error"   :appearance="$app" title="Error alert">{{ $app }} appearance のエラー通知。</x-alert>
        </div>
    @endforeach

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Surface match (base-200 alert on base-200 background)</p>
    <div class="bg-base-200 p-element rounded-[var(--radius-box)] flex flex-col gap-compact mb-6">
        <x-alert color="info" appearance="base-200" title="周囲と溶け込む">surface 上で違和感なく配置できます。</x-alert>
        <x-alert color="warning" appearance="base-200" title="warning">注意喚起だが控えめ。</x-alert>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Bordered-top</p>
    <div class="flex flex-col gap-compact mb-6">
        <x-alert color="info" appearance="bordered-top" title="Bordered-top Info">上部アクセントバー。</x-alert>
        <x-alert color="success" appearance="bordered-top" title="Bordered-top Success">Preline 風の上線アクセント。</x-alert>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">Ghost / Link</p>
    <div class="flex flex-col gap-compact">
        <x-alert color="info" appearance="ghost" title="Ghost Info">背景・枠線なし、テキストのみの最小表示。</x-alert>
        <x-alert color="primary" appearance="link" title="Link Primary">下線付きリンク調 alert。</x-alert>
    </div>
@endsection
