@extends('layouts.playground')

@section('title', '— Modal')
@section('heading', 'Modal')
@section('subheading', __('playground.subheading.modal'))

@section('content')
    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">
        <span class="inline-block text-[9px] font-bold tracking-wider uppercase bg-primary text-primary-content rounded px-1.5 py-0.5 mr-2 align-middle">default</span>
        size=md / showClose=true / closeOnBackdrop=true — trigger slot をクリックで開く。title はオプションだが、ヘッダー左に見出しが出るので付けるのが一般的
    </p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-modal title="Confirm">
            <x-slot:trigger>
                <x-button>Open default modal</x-button>
            </x-slot:trigger>
            <p class="text-sm text-base-content/80">
                これは最小構成の modal です。close button 有り、背景クリック・Escape で閉じます。
            </p>
        </x-modal>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">title を省略した場合 — ヘッダーは × ボタンのみになる (title が必須でないことを確認)</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <x-modal>
            <x-slot:trigger>
                <x-button appearance="soft">Open titleless modal</x-button>
            </x-slot:trigger>
            <p class="text-sm text-base-content/80">
                title を渡さない modal。シンプルな確認 / イメージギャラリー / Lightbox のような用途。
            </p>
        </x-modal>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">size variants — sm / md / lg / xl / full</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="flex flex-wrap gap-2">
            <x-modal title="Small modal" size="sm">
                <x-slot:trigger>
                    <x-button size="sm">sm (max-w-sm)</x-button>
                </x-slot:trigger>
                <p class="text-sm text-base-content/80">最小サイズ。確認ダイアログや短い通知向け。</p>
            </x-modal>

            <x-modal title="Medium modal (default)" size="md">
                <x-slot:trigger>
                    <x-button size="sm">md (max-w-lg)</x-button>
                </x-slot:trigger>
                <p class="text-sm text-base-content/80">デフォルトサイズ。一般的なフォームや詳細表示。</p>
            </x-modal>

            <x-modal title="Large modal" size="lg">
                <x-slot:trigger>
                    <x-button size="sm">lg (max-w-2xl)</x-button>
                </x-slot:trigger>
                <p class="text-sm text-base-content/80">複数列のフォームや長文の確認画面向け。</p>
            </x-modal>

            <x-modal title="Extra-large modal" size="xl">
                <x-slot:trigger>
                    <x-button size="sm">xl (max-w-4xl)</x-button>
                </x-slot:trigger>
                <p class="text-sm text-base-content/80">テーブル表示やプレビュー画面に。</p>
            </x-modal>

            <x-modal title="Full-width modal" size="full">
                <x-slot:trigger>
                    <x-button size="sm">full (max-w-full mx-4)</x-button>
                </x-slot:trigger>
                <p class="text-sm text-base-content/80">viewport いっぱい (左右 mx-4 マージン)。エディタや大型プレビュー向け。</p>
            </x-modal>
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">title — header の有無 (showClose と独立)</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="flex flex-wrap gap-2">
            <x-modal>
                <x-slot:trigger>
                    <x-button appearance="outline" size="sm">title 無し</x-button>
                </x-slot:trigger>
                <p class="text-sm text-base-content/80">title が無くても showClose=true なら × ボタンだけ右上に出ます。</p>
            </x-modal>

            <x-modal title="設定を保存しますか？">
                <x-slot:trigger>
                    <x-button appearance="outline" size="sm">title 有り</x-button>
                </x-slot:trigger>
                <p class="text-sm text-base-content/80">title 有りなら左に見出し、右に × ボタンが並びます。<code class="text-xs">aria-labelledby</code> も自動付与。</p>
            </x-modal>
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">showClose — × ボタンの表示制御</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="flex flex-wrap gap-2">
            <x-modal title="× ボタン無し" :showClose="false">
                <x-slot:trigger>
                    <x-button appearance="outline" size="sm">showClose=false</x-button>
                </x-slot:trigger>
                <p class="text-sm text-base-content/80">× ボタン無し。Escape または背景 click、または actions 内の専用ボタンで閉じる前提。</p>
                <x-slot:actions>
                    <x-button size="sm" @click="open = false">OK</x-button>
                </x-slot:actions>
            </x-modal>

            <x-modal title="× ボタン有り (default)">
                <x-slot:trigger>
                    <x-button appearance="outline" size="sm">showClose=true (default)</x-button>
                </x-slot:trigger>
                <p class="text-sm text-base-content/80">右上に × ボタンが表示されます。</p>
            </x-modal>
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">closeOnBackdrop — 背景クリック挙動</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="flex flex-wrap gap-2">
            <x-modal title="背景 click で閉じる (default)">
                <x-slot:trigger>
                    <x-button appearance="outline" size="sm">closeOnBackdrop=true (default)</x-button>
                </x-slot:trigger>
                <p class="text-sm text-base-content/80">背景 (半透明黒の外側) をクリックで閉じます。Escape も有効。</p>
            </x-modal>

            <x-modal title="背景 click では閉じない" :closeOnBackdrop="false">
                <x-slot:trigger>
                    <x-button appearance="outline" size="sm">closeOnBackdrop=false</x-button>
                </x-slot:trigger>
                <p class="text-sm text-base-content/80">背景クリックでは閉じません。誤操作を防ぎたいフォーム用。× か Escape、actions ボタンで閉じる。</p>
            </x-modal>
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">actions slot — フッターの操作ボタン</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <div class="flex flex-wrap gap-2">
            <x-modal title="削除の確認" size="sm" :closeOnBackdrop="false">
                <x-slot:trigger>
                    <x-button color="error" size="sm">削除する…</x-button>
                </x-slot:trigger>
                <p class="text-sm text-base-content/80">
                    このアイテムを削除します。この操作は取り消せません。
                </p>
                <x-slot:actions>
                    <x-button appearance="ghost" size="sm" @click="open = false">キャンセル</x-button>
                    <x-button color="error" size="sm" @click="open = false">削除</x-button>
                </x-slot:actions>
            </x-modal>

            <x-modal title="新規プロジェクト" size="md">
                <x-slot:trigger>
                    <x-button color="primary" size="sm">＋ 作成…</x-button>
                </x-slot:trigger>
                <div class="space-y-3">
                    <label class="block">
                        <span class="text-sm font-medium">プロジェクト名</span>
                        <input type="text" class="input input-bordered w-full mt-1" placeholder="my-app" />
                    </label>
                    <label class="block">
                        <span class="text-sm font-medium">説明</span>
                        <textarea class="textarea textarea-bordered w-full mt-1" rows="3" placeholder="任意"></textarea>
                    </label>
                </div>
                <x-slot:actions>
                    <x-button appearance="ghost" size="sm" @click="open = false">キャンセル</x-button>
                    <x-button color="primary" size="sm" @click="open = false">作成</x-button>
                </x-slot:actions>
            </x-modal>
        </div>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2">id + dispatch — 別所から開く (trigger slot 不要)</p>
    <div class="mb-8 border border-base-300 rounded-[var(--radius-box)] bg-base-100 p-element">
        <p class="text-xs text-base-content/60 mb-3">
            <code class="text-xs">id="welcome"</code> を渡しておき、別の任意のボタンから
            <code class="text-xs">$dispatch('open-modal-welcome')</code> で開きます。
            閉じるのは <code class="text-xs">$dispatch('close-modal-welcome')</code>。
        </p>
        <div class="flex flex-wrap gap-2">
            <x-button color="primary" size="sm"
                x-on:click="$dispatch('open-modal-welcome')">welcome modal を開く</x-button>
            <x-button color="info" size="sm"
                x-on:click="$dispatch('open-modal-confirm-reset')">reset 確認 modal を開く</x-button>
        </div>

        {{-- trigger slot 無しで宣言 — 純粋に dispatch から制御される --}}
        <x-modal id="welcome" title="ようこそ" size="md">
            <p class="text-sm text-base-content/80">
                これは <code class="text-xs">id="welcome"</code> 付きの modal で、ページ内の任意の場所から
                <code class="text-xs">$dispatch('open-modal-welcome')</code> で開けます。
            </p>
            <x-slot:actions>
                <x-button size="sm" @click="open = false">閉じる</x-button>
            </x-slot:actions>
        </x-modal>

        <x-modal id="confirm-reset" title="設定をリセット" size="sm" :closeOnBackdrop="false">
            <p class="text-sm text-base-content/80">
                すべての設定をデフォルトに戻します。よろしいですか？
            </p>
            <x-slot:actions>
                <x-button appearance="ghost" size="sm" @click="open = false">キャンセル</x-button>
                <x-button color="warning" size="sm" @click="open = false">リセット</x-button>
            </x-slot:actions>
        </x-modal>
    </div>

    <p class="text-xs uppercase tracking-wider text-base-content/50 mb-2 mt-8">使い方</p>
    <pre class="text-xs bg-base-200 rounded-[var(--radius-box)] px-4 py-3 overflow-x-auto"><code>@verbatim{{-- 1. 最小: trigger slot 付き --}}
&lt;x-modal&gt;
    &lt;x-slot:trigger&gt;
        &lt;x-button&gt;Open&lt;/x-button&gt;
    &lt;/x-slot:trigger&gt;
    &lt;p&gt;本文&lt;/p&gt;
&lt;/x-modal&gt;

{{-- 2. title + size + actions slot (確認ダイアログ典型) --}}
&lt;x-modal title="削除の確認" size="sm" :closeOnBackdrop="false"&gt;
    &lt;x-slot:trigger&gt;
        &lt;x-button color="error"&gt;削除…&lt;/x-button&gt;
    &lt;/x-slot:trigger&gt;
    &lt;p&gt;本当に削除しますか？&lt;/p&gt;
    &lt;x-slot:actions&gt;
        &lt;x-button appearance="ghost" @click="open = false"&gt;キャンセル&lt;/x-button&gt;
        &lt;x-button color="error" @click="open = false"&gt;削除&lt;/x-button&gt;
    &lt;/x-slot:actions&gt;
&lt;/x-modal&gt;

{{-- 3. × ボタン無し + 背景 click で閉じない (フォーム入力中の誤閉じ防止) --}}
&lt;x-modal title="新規作成" :showClose="false" :closeOnBackdrop="false"&gt;
    &lt;x-slot:trigger&gt;&lt;x-button&gt;＋ 作成&lt;/x-button&gt;&lt;/x-slot:trigger&gt;
    &lt;!-- form... --&gt;
    &lt;x-slot:actions&gt;
        &lt;x-button appearance="ghost" @click="open = false"&gt;キャンセル&lt;/x-button&gt;
        &lt;x-button color="primary" @click="open = false"&gt;保存&lt;/x-button&gt;
    &lt;/x-slot:actions&gt;
&lt;/x-modal&gt;

{{-- 4. id を渡して別所の任意のボタンから dispatch で開く --}}
&lt;x-modal id="welcome" title="ようこそ"&gt;
    &lt;p&gt;本文&lt;/p&gt;
&lt;/x-modal&gt;

&lt;button x-on:click="$dispatch('open-modal-welcome')"&gt;開く&lt;/button&gt;
&lt;!-- 閉じるのは $dispatch('close-modal-welcome') --&gt;

{{-- size: sm / md (default) / lg / xl / full --}}
{{-- props: id, title, size, showClose=true, closeOnBackdrop=true --}}
{{-- 背景 click / Escape / × / actions の @click="open = false" で閉じる --}}
{{-- x-trap で focus trap、x-teleport で body 直下に描画 --}}
@endverbatim</code></pre>
@endsection
