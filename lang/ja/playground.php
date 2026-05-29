<?php

return [
    'brand' => [
        'subline' => 'Blade アダプター · ライブデモ',
    ],

    'nav' => [
        'components' => 'コンポーネント',
    ],

    'catalog' => [
        'title'    => 'コンポーネントカタログ',
        'subtitle' => '46 個の Blade コンポーネント。 Tailwind + daisyUI のみで動く静的コンポーネントと、 Alpine.js で挙動を持つ動的コンポーネントを分けて整理。 カードを押すと各コンポーネントの個別ページに飛びます。',
        'section'  => [
            'static'  => '静的 — Tailwind + daisyUI のみ',
            'dynamic' => '動的 — Alpine.js 駆動',
            'icons'   => 'アイコンシステム',
        ],
    ],

    'hero' => [
        'eyebrow_chip' => 'v0.4.0 · BLADE',
        'eyebrow_note' => '— REACT / VUE / WEB COMPONENTS COMING v0.5+',
        'title' => [
            'line1' => 'つくる速度に、',
            'line2' => '上限はない。',
        ],
        'pivot_punch' => 'コードはそのまま、 スタイルだけピボット。',
        'pivot_sub'   => '<code>data-theme</code> と <code>data-tune</code> の 2 属性で、 色・形・余白・書体を丸ごと差し替え。 リライトもリビルドも不要。',
        'subtitle' => 'デザインは固めず、 走りながら決めていい。 色も形も余白も、 属性ひとつで丸ごと変わる。 ピボットは一瞬、 やり直しの時間はゼロ。 AI と並走するこの UI で、 クリエイティブが、 変幻自在に加速する。',
        'cta' => [
            'github'     => 'GitHub で見る',
            'components' => 'コンポーネント一覧',
        ],
        'chip' => [
            'themes'     => '30+ daisyUI themes',
            'components' => '46 Blade components',
            'tunes'      => '11 Tune presets ↓',
        ],
        'selector' => [
            'tune_label'  => 'PICK A TUNE',
            'theme_label' => 'PICK A THEME',
        ],
        'iframe' => [
            'live'        => 'LIVE',
            'foot'        => 'acme studio · throughput dashboard',
            'previewing'  => 'プレビュー中:',
            'committed'   => '確定:',
        ],
    ],

    'stat' => [
        'components' => [
            'label' => 'コンポーネント',
            'desc'  => '7 カテゴリにまたがる',
        ],
        'tunes' => [
            'label' => 'Tune プリセット',
            'desc'  => 'shape × space × font',
        ],
        'themes' => [
            'label' => 'daisyUI テーマ',
            'desc'  => 'light · dark · 全 themed',
        ],
        'icons' => [
            'label' => 'Solar アイコン',
            'desc'  => 'pinion-icons v0.1.0',
        ],
        'icons_credit' => 'アイコン数の出典は sparrowhawk-labs/pinion-icons →',
    ],

    'whats_new' => [
        'title'         => '最新リリース',
        'all_releases'  => 'リリース一覧',
        'card1' => [
            'title'    => '単一 import プリセット',
            'body'     => '<code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">pinion-ui.css</code> を 1 行 import するだけで、 Tailwind v4 · daisyUI v5 · tune トークンが app.css に組み込まれる。',
            'released' => 'リリース — 2026-04',
        ],
        'card2' => [
            'title'    => 'Focus + Collapse プラグイン',
            'body'     => '<code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">ui:install</code> が <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">@alpinejs/focus</code> と <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">@alpinejs/collapse</code> を自動配線。 modal の focus-trap と accordion の高さアニメが追加設定なしで動く。',
            'released' => 'リリース — 2026-05',
        ],
        'card3' => [
            'title'    => 'Popover の padding プロパティ',
            'body'     => '<code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">&lt;x-popover&gt;</code> に <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">padding</code> プロパティが新登場。 右クリックメニュー等で中身にぴったり寄せられる。',
            'released' => 'リリース — 2026-05',
        ],
    ],

    'ai_native' => [
        'title'       => 'AI エージェントのための設計',
        'alert_title' => 'AI エージェントが pinion-ui を正しく書ける',
        'bullet1'     => 'プロジェクト規約は <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">CLAUDE.md</code> を 1 度読めば足りる',
        'bullet2'     => '<code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">AGENTS.md</code> がコンポーネント単位の lookup workflow を案内',
        'bullet3'     => '<code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">reference/components/</code> 配下に 46 件の per-component リファレンス',
        'bullet4'     => 'Fresh-Laravel install 検証済 — 新規アプリにパッケージを入れるだけでビルドが通る',
        'install' => [
            'title'  => '60 秒で導入',
            'step1'  => '# 1. パッケージを追加',
            'step2'  => '# 2. アセットと AGENTS.md scaffolding を install',
            'step3'  => '# 3. Build & 起動',
            'foot'   => '<code class="text-xs">--ai</code> を付けると <code class="text-xs">CLAUDE.md</code> と <code class="text-xs">AGENTS.md</code> が repo ルートに展開される。',
        ],
    ],

    'components' => [
        'title'     => 'コンポーネント — ライブ体験',
        'subtitle'  => '46 中 9 つを抜粋 — サイドバーから任意のコンポーネントの全マトリクスを開ける',
        'modal' => [
            'desc'    => 'Alpine ベースの dialog。 focus trap · ESC · 背景クリックで dismiss。',
            'title'   => 'Pinion UI へようこそ',
            'body'    => '46 コンポーネント、 すべて themeable、 すべて AI エージェント向けにドキュメント化済。 <kbd class="kbd kbd-sm">Esc</kbd> または外側クリックで閉じる。',
            'button'  => 'モーダルを開く',
            'close'   => '閉じる',
            'ok'      => '了解',
        ],
        'rating' => [
            'stars'      => '星',
            'half_heart' => 'half · ハート',
        ],
        'toggle' => [
            'email' => 'メール通知',
            'dark'  => 'ダークモード',
        ],
        'input' => [
            'label'       => 'メールアドレス',
            'hint'        => 'floating label · iconLeft prop',
            'placeholder' => 'you@example.com',
        ],
        'input_number' => [
            'label' => '数量',
            'hint'  => 'Alpine ベースの ± · 上下限クランプ付き',
        ],
        'tooltip' => [
            'intro'   => '下のボタンをホバー:',
            'light'   => 'デフォルトの薄い面',
            'neutral' => '標準のダークバブル',
            'success' => 'セマンティックカラー',
        ],
        'stepper' => [
            'plan'  => '企画',
            'build' => '構築',
            'ship'  => '出荷',
        ],
    ],

    'ready' => [
        'title'    => 'いざ実装へ',
        'subtitle' => 'パッケージを取得し、 コンポーネントを眺め、 UI を出荷しよう。',
        // :heart は <x-i type="heart"> の placeholder (テンプレ側で SVG に置換される)
        'foot'     => 'MIT ライセンス · sparrowhawk-labs より :heart を込めて',
    ],

    'subheading' => [
        'accordion' => '開閉式リスト。v0.4.0 で nested 構文に変更 (Blade slot を XSS なく自然に渡せる)。&lt;x-accordion-item title="..."&gt;content&lt;/x-accordion-item&gt; を &lt;x-accordion&gt; の中に並べる。single-open / multiple-open、size 3段階。content は Blade slot のため任意の Blade markup・コンポーネント・リンク等が使える。Alpine x-collapse で滑らかにアニメーション。',
        'alert' => '8 appearances × semantic colors, dismissible 対応',
        'avatar' => 'initials / icon / image + size × shape × status indicator',
        'avatar-group' => 'daisyUI 5 の avatar-group クラスで avatar を重ねた列 (facepile)。プロジェクトメンバー / 参加者 / 担当者リスト等に使う。slot に &lt;x-avatar&gt; を複数並べるだけ。spacing で重なり量を 3 段切替 (tight / normal / loose)。',
        'badge' => 'color × appearance (solid / outline / soft / base-100 / base-200 / base-300 / dot)',
        'breadcrumb' => '階層ナビゲーション。daisyUI 5 の breadcrumbs class を wrap。dual API: items 配列で渡すか、自前で &lt;ul&gt; に &lt;li&gt; を書くか。最後の item (url 省略) は現在地として link 化しない。separator は chevron (default) / slash の 2 種、size は sm / md / lg。',
        'button' => 'color × appearance (solid / outline / soft / base-100 / base-200 / base-300 / ghost / link) — 全 8 colors',
        'button-group' => 'segmented control 風に複数の button / link を束ねる wrapper。中央 child の border-radius は wrapper が自動で 0 にし、隣接 border は 1 本に統合される。hover は wrapper 側で soft tint に上書きされ、group コンテキストで重くならない (v0.3.3 で改善)。orientation は horizontal (default) / vertical。child に `class="join-item"` を付ける必要はない (v0.3.3 で不要に)。',
        'card' => 'appearance = default / elevated / filled / base-100 / base-200 / base-300 / outline / soft / solid / bordered-top / ghost — divider toggle',
        'checkbox' => 'fake-checkbox (peer + sr-only) — color × appearance (solid / soft / base-100 / base-200 / base-300) × size',
        'collapse' => 'daisyUI 5 の collapse class を wrap した single open/close ブロック (no-JS、内部の checkbox で開閉制御)。title prop か slot:title でヘッダ、$slot で本文を渡す。icon (null=default / arrow / plus)・bordered (default true)・open (初期 open) の 3 props + title。デフォルトはアイコンなしのミニマル表示で、必要に応じて icon prop でアイコンを opt-in する。複数まとめて FAQ にしたい時はそのまま縦に並べるだけ。',
        'divider' => 'daisyUI 5 の divider クラスをラップしたセクション区切り線。@verbatim<x-divider>@endverbatim でただの線、slot にテキストを入れるとラベル付き。direction=vertical で flex 内の縦線にもなる。',
        'dropdown' => 'Alpine.js で開閉する汎用ドロップダウン。trigger を slot で差し替え可能、label prop で簡易ボタン化も可能。position (bottom-end default / bottom-start / top-end / top-start)・size (sm/md/lg)・width (任意の Tailwind w-* class) の 3 props。menu の中身は自由スロット — リンクでもボタンでも何でも入る。',
        'file-upload' => 'native <input type="file"> + file:* utility (inline) and dashed dropzone (large area). Multi-file with progress bar driven by Alpine — simulate flag fakes upload progress so the demo is self-running.',
        'indicator' => 'daisyUI 5 の indicator class を wrap した、別要素の角にバッジやドットを重ねるためのレイアウト。position (top/middle/bottom × start/center/end の 9 通り)・dot (bool, true = テキスト無しの純ドット)・color (8 色、default=error)・appearance (solid default / soft / outline / ghost / dash) の 4 props。default は solid (濃い fill) で「通知あり」を強く伝える。soft 等は opt-in。中身は $badge slot に入れ、被せたい要素は $slot に入れる。',
        'input' => 'color × appearance (outline / soft / underline / ghost) — プレフィックス/サフィックス, アイコン, フローティングラベル, アペンドスロット対応',
        'input-group' => 'form 要素を任意に組み合わせて横並びに joined する generic wrapper。select+input、input+button、input+input 等。x-input の prefix/suffix/append は単一 input 中心の組み合わせ用、こちらは複数の同格 form 要素用。`$c[\'addon\']` helper class でテキスト装飾 span も addon 高さに揃えられる。',
        'input-number' => '数量セレクタ — [−] [input] [＋] の 3 要素を border 連結。min/max/step は HTML 属性と Alpine clamp 両方で enforced、bound 到達時は ± ボタンが auto-disable する。native spinner arrows は非表示。decimal step (e.g. 0.5) も可。',
        'kbd' => 'キーボードショートカット用の inline chip。HTML5 <kbd> 要素を daisyUI 5 の kbd class で wrap。size と appearance の 2 props のみ。文章内に埋め込んだり、+ で繋いで combo を表現する。',
        'modal' => 'Alpine x-data 駆動のオーバーレイダイアログ。trigger slot に置いた要素をクリックで開く、または別所から $dispatch("open-modal-{id}") で開く。size (sm/md/lg/xl/full)・title・showClose・closeOnBackdrop の 5 props。背景 click / Escape / × ボタンで閉じる。x-trap で focus trap、x-teleport で body 直下に描画。',
        'notification-system' => 'ページに1度置き、任意の Alpine コンポーネントから $dispatch("notify", { type, content }) で Toast を出す。position / appearance / size / duration / event-name は props で制御。',
        'pagination' => 'full (numbered) / simple (prev-current/total-next) — color × appearance × size、Laravel paginator 対応',
        'pin-input' => 'OTP / 認証コード入力 — N 個の単一文字ボックスが auto-advance / backspace-back / arrow nav / paste-to-fill で連携。autocomplete="one-time-code" を最初のボックスに付与済 (iOS/Android で SMS コード候補が出る)。numeric (default) / alphanumeric、length / size / masked / autofocus 等の prop。combined value は hidden input で form submit される。',
        'popover' => 'クリック (or hover) でトリガー横に浮かぶ panel。dropdown と tooltip の中間 — 任意コンテンツ (info card / mini form / 確認 prompt) を入れる。4 placement (top/right/bottom/left) を CSS で配置 (collision detection なし)、optional arrow、trigger="click" (default) / "hover"。Alpine 駆動、ESC で close、click 外で close。',
        'progress' => 'daisyUI progress bar wrapper. value=null で indeterminate (animated stripe)、value 指定で determinate。color × size × showLabel (percent / fraction) を props で制御。a11y は role=progressbar + aria-valuenow / valuemin / valuemax 付与済み。',
        'radio' => 'fake-radio (peer + sr-only) — color × appearance (solid / soft / base-100 / base-200 / base-300) × size, with radio-group',
        'range-slider' => 'daisyUI 5 の range class を wrap した <input type="range"> + ラベル/値表示/ヒント/エラーの chrome 付き。8 colors × 5 sizes、min/max/step、showValue (Alpine で live 表示)、error state。フォーム入力としても、純粋な視覚スライダーとしても使える。',
        'rating' => 'daisyUI 5 の rating (mask + radio) ラッパー。star / heart / circle 形状、半分星 (half=true)、readonly に対応。各 demo の name 属性は radio group を分離するため必ず unique。',
        'select' => 'native select — color × appearance, sizes, optgroup, multiple, floating label',
        'sidebar' => 'x-teleport で body 直下に描画される drawer 系コンポーネント。trigger slot を click で開き、Escape / × / 背景 click で閉じる。side (left/right)・size (sm/md/lg)・backdrop の 3 軸で variant を作る。focus trap (x-trap.inert.noscroll) と role=dialog/aria-modal=true で a11y も担保。backdrop=false の時は overlay 全体を pointer-events-none にして、panel のみ pointer-events-auto に戻し、背後ページを操作可能にする (永続 inspector ・ツールパレット用途)。',
        'skeleton' => 'コンテンツ読み込み中の placeholder。daisyUI の skeleton class を wrap し、shape (rect / circle / text) / width / height / radius / animated を props で制御。width / height は Tailwind class 名 (`w-32`, `h-4` 等) で渡す。',
        'spinner' => 'ローディング表示用の inline indicator。daisyUI 5 の loading class を wrap。variant (spinner/dots/ring/bars/ball/infinity) × size (xs〜xl) × color (8 色) の組み合わせで、ボタン内・ページ全体・カードなどあらゆる「待ち時間」を表現する。',
        'stat' => 'KPI / metric の単独表示。daisyUI の stats + stat class を wrap し、label / value / desc に加え valueColor / trend / trendValue で色付け＆方向矢印を制御。複数並べたい場合は wrapped=false で外側に &lt;div class="stats"&gt; を自前で作る。',
        'stepper' => 'multi-step プロセスの可視化 — sign-up flow / checkout / wizard。items 配列で渡し、各 item に state=done|current|upcoming を付与。orientation (horizontal default / vertical) と variant (numbered default / dotted) の 2 modifier。timeline は append-only ヒストリ用、stepper は bounded sequential progress 用。',
        'table-scroll' => '通常の table 表示 + x-table-scroll ラッパーで横スクロール時のみ左右ボタンと gradient fade を出す。コンテンツが overflow しない時はラッパーは透明 (何も足さない)。table 専用ではなく、card list / image strip 等にも使える。',
        'tabs' => 'タブ式コンテンツ切替。v0.4.0 で nested 構文に変更 (Blade slot を XSS なく自然に渡せる)。&lt;x-tab name="..." label="..."&gt;content&lt;/x-tab&gt; を &lt;x-tabs&gt; の中に並べる。variant: underline (default) / boxed / pill、size: sm / md / lg。default で初期 active な name を指定 (省略時は最初の tab)。Alpine の x-data でクライアント側の active 状態を保持。',
        'textarea' => 'color × appearance (outline / soft / underline / ghost) — rows, autoresize, character counter, label/hint/error',
        'timeline' => 'daisyUI 5 の timeline class を wrap した時系列リスト。items 配列で渡すだけ。orientation (vertical/horizontal)・compact (片側寄せ)・snap (アイコンを上端 snap)・appearance (solid default / soft) の 4 modifier。各 item に state=done|current|upcoming を付けると middle icon と connector の色が変化。default は solid (濃い primary) で done chain がはっきり立つ。穏やかに見せたいときだけ appearance="soft" を opt-in。',
        'toggle' => 'switch (peer + sr-only, role="switch") — color × appearance (solid / soft) × size, with optional ON/OFF state label. solid fills the rail; soft inverts and fills the thumb.',
        'tooltip' => 'daisyUI 5 の tooltip class を wrap した no-JS / pure CSS のホバーチップ。trigger を slot に入れ、本文は text prop で渡す。position (top/right/bottom/left)・color (light default + 8 variants 含む neutral)・open (常時表示) の 3 props。',
    ],
];
