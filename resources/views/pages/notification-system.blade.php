@extends('layouts.playground')

@section('title', '— Notification')
@section('heading', 'Notification')
@section('subheading', 'ページに1度置き、任意の Alpine コンポーネントから $dispatch("notify", { type, content }) で Toast を出す。position / appearance / size / duration / event-name は props で制御。')

@section('content')
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        bordered-left / md / bottom-right (event: <code class="text-base-content">notify</code>)
    </p>
    {{-- bordered-left: button has no exact match, outline is closest (white + colored accent). --}}
    <div class="flex flex-wrap gap-2 mb-3">
        <x-button color="info" appearance="outline"
            x-on:click="$dispatch('notify', { type: 'info', content: '更新を確認しています…' })">info</x-button>
        <x-button color="success" appearance="outline"
            x-on:click="$dispatch('notify', { type: 'success', content: '保存しました' })">success</x-button>
        <x-button color="warning" appearance="outline"
            x-on:click="$dispatch('notify', { type: 'warning', content: 'まもなく期限切れになります' })">warning</x-button>
        <x-button color="error" appearance="outline"
            x-on:click="$dispatch('notify', { type: 'error', content: '通信に失敗しました' })">error</x-button>
        <x-button color="neutral" appearance="base-100"
            x-on:click="
                $dispatch('notify', { type: 'success', content: '1件目' });
                setTimeout(() => $dispatch('notify', { type: 'info', content: '2件目' }), 200);
                setTimeout(() => $dispatch('notify', { type: 'warning', content: '3件目' }), 400);
            ">スタック (3件)</x-button>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">solid / top-right / sm (event: <code class="text-base-content">notify-solid</code>)</p>
    <div class="flex flex-wrap gap-2 mb-3">
        <x-button color="info" appearance="solid" size="sm"
            x-on:click="$dispatch('notify-solid', { type: 'info', content: '同期しました' })">info</x-button>
        <x-button color="success" appearance="solid" size="sm"
            x-on:click="$dispatch('notify-solid', { type: 'success', content: 'デプロイ成功' })">success</x-button>
        <x-button color="warning" appearance="solid" size="sm"
            x-on:click="$dispatch('notify-solid', { type: 'warning', content: 'CPU 高負荷' })">warning</x-button>
        <x-button color="error" appearance="solid" size="sm"
            x-on:click="$dispatch('notify-solid', { type: 'error', content: 'タイムアウト' })">error</x-button>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">soft / bottom-left / lg (event: <code class="text-base-content">notify-left</code>)</p>
    <div class="flex flex-wrap gap-2 mb-3">
        <x-button color="info" appearance="soft" size="sm"
            x-on:click="$dispatch('notify-left', { type: 'info', content: 'バックアップを開始しました' })">info</x-button>
        <x-button color="success" appearance="soft" size="sm"
            x-on:click="$dispatch('notify-left', { type: 'success', content: 'アーカイブが完了しました' })">success</x-button>
        <x-button color="warning" appearance="soft" size="sm"
            x-on:click="$dispatch('notify-left', { type: 'warning', content: 'ストレージ容量が残りわずかです' })">warning</x-button>
        <x-button color="error" appearance="soft" size="sm"
            x-on:click="$dispatch('notify-left', { type: 'error', content: 'バックアップに失敗' })">error</x-button>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-6">outline / top-center / sm (event: <code class="text-base-content">notify-top</code>)</p>
    <div class="flex flex-wrap gap-2 mb-3">
        <x-button color="info" appearance="outline" size="sm"
            x-on:click="$dispatch('notify-top', { type: 'info', content: '上部中央に出ます' })">info</x-button>
        <x-button color="success" appearance="outline" size="sm"
            x-on:click="$dispatch('notify-top', { type: 'success', content: 'コピーしました' })">success</x-button>
        <x-button color="warning" appearance="outline" size="sm"
            x-on:click="$dispatch('notify-top', { type: 'warning', content: 'セッションの有効期限が近づいています' })">warning</x-button>
        <x-button color="error" appearance="outline" size="sm"
            x-on:click="$dispatch('notify-top', { type: 'error', content: '権限がありません' })">error</x-button>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-8">使い方</p>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim {{-- 1. layout に1度だけ置く --}}
&lt;x-notification-system /&gt;

{{-- 2. 任意のコンポーネントから dispatch --}}
&lt;button x-on:click="$dispatch('notify', { type: 'success', content: '保存しました' })"&gt;
    保存
&lt;/button&gt;

{{-- 3. Laravel の session flash でも発火 --}}
return redirect()-&gt;back()-&gt;with('notify', ['type' =&gt; 'success', 'content' =&gt; '保存しました']);

{{-- 4. 位置・見た目を変えたい時 --}}
&lt;x-notification-system position="top-right" appearance="solid" size="sm" :duration="5000" /&gt;

{{-- 5. 同じページに複数を共存させたい場合は event-name で分離 --}}
&lt;x-notification-system position="top-center" event-name="notify-toast" /&gt;
&lt;button x-on:click="$dispatch('notify-toast', { type: 'info', content: '…' })"&gt;…&lt;/button&gt;
@endverbatim</code></pre>

    {{-- Mount instances with different prop combos, each scoped to its own event name. --}}
    <x-notification-system />
    <x-notification-system event-name="notify-solid" appearance="solid" position="top-right" size="sm" />
    <x-notification-system event-name="notify-left" appearance="soft" position="bottom-left" size="lg" />
    <x-notification-system event-name="notify-top" appearance="outline" position="top-center" size="sm" />
@endsection
