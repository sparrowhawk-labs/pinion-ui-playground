<?php

return [
    'brand' => [
        'subline' => 'Blade 配接器 · 實時演示',
    ],

    'hero' => [
        'eyebrow_chip' => 'v0.4.0 · BLADE',
        'eyebrow_note' => '— REACT / VUE / WEB COMPONENTS COMING v0.5+',
        'title' => [
            'line1' => '創作的速度，',
            'line2' => '沒有上限。',
        ],
        'subtitle' => '設計不必先定案，可以邊做邊決定。色彩、形狀、間距，一個屬性就能整體切換。轉向只在一瞬，返工時間歸零。與 AI 並肩，創意隨之變幻自如，不斷加速。',
        'cta' => [
            'github'     => '在 GitHub 上查看',
            'components' => '瀏覽元件',
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
            'previewing'  => '預覽中：',
            'committed'   => '已提交：',
        ],
    ],

    'stat' => [
        'components' => [
            'label' => '元件',
            'desc'  => '跨越 7 個類別',
        ],
        'tunes' => [
            'label' => 'Tune 預設',
            'desc'  => 'shape × space × font',
        ],
        'themes' => [
            'label' => 'daisyUI 主題',
            'desc'  => '淺色 · 深色 · 全部已主題化',
        ],
        'icons' => [
            'label' => 'Solar 圖示',
            'desc'  => 'pinion-icons v0.1.0',
        ],
        'icons_credit' => '圖示計數來自 sparrowhawk-labs/pinion-icons →',
    ],

    'whats_new' => [
        'title'         => '最新發布',
        'all_releases'  => '所有版本',
        'card1' => [
            'title'    => '單一匯入預設',
            'body'     => '單行匯入 <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">pinion-ui.css</code> 即可在 app.css 中配置 Tailwind v4、daisyUI v5 和 tune 語彙系統。',
            'released' => '發布於 — 2026-04',
        ],
        'card2' => [
            'title'    => 'Focus + Collapse 外掛',
            'body'     => '<code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">ui:install</code> 現在自動連接 <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">@alpinejs/focus</code> 和 <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">@alpinejs/collapse</code> — 彈窗焦點捕獲和手風琴高度動畫開箱即用。',
            'released' => '發布於 — 2026-05',
        ],
        'card3' => [
            'title'    => 'Popover 內距屬性',
            'body'     => '<code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">&lt;x-popover&gt;</code> 的新 <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">padding</code> 屬性，讓右鍵操作選單可以緊密依附其內容。',
            'released' => '發布於 — 2026-05',
        ],
    ],

    'ai_native' => [
        'title'       => '為 AI 代理而構建',
        'alert_title' => 'AI 代理可以正確編寫 pinion-ui',
        'bullet1'     => '讀一次 <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">CLAUDE.md</code> 即可掌握專案約定',
        'bullet2'     => '<code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">AGENTS.md</code> 指導逐元件查詢工作流程',
        'bullet3'     => '<code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">reference/components/</code> 下有 46 份逐元件參考文件',
        'bullet4'     => 'Fresh Laravel 安裝已驗證 — 將套件放入任何新應用即可構建',
        'install' => [
            'title'  => '60 秒快速導入',
            'step1'  => '# 1. 要求套件',
            'step2'  => '# 2. 安裝資源和 AGENTS.md 支架',
            'step3'  => '# 3. 構建與執行',
            'foot'   => '<code class="text-xs">--ai</code> 將 <code class="text-xs">CLAUDE.md</code> 和 <code class="text-xs">AGENTS.md</code> 放入專案根目錄。',
        ],
    ],

    'components' => [
        'title'     => '元件 — 實時試驗',
        'subtitle'  => '46 個中的 9 個 — 從側邊欄選擇任何項目來查看完整矩陣',
        'modal' => [
            'desc'    => '由 Alpine 驅動的對話框，具有焦點捕獲、ESC 和背景關閉功能。',
            'title'   => '歡迎來到 pinion-ui',
            'body'    => '46 個元件，全部可主題化，全部已為 AI 代理文件化。按 <kbd class="kbd kbd-sm">Esc</kbd> 或點擊外部區域關閉。',
            'button'  => '開啟彈窗',
            'close'   => '關閉',
            'ok'      => '明白了',
        ],
        'rating' => [
            'stars'      => '星星',
            'half_heart' => '半顆 · 心',
        ],
        'toggle' => [
            'email' => '電子郵件通知',
            'dark'  => '深色模式',
        ],
        'input' => [
            'label'       => '電子郵件',
            'hint'        => '浮動標籤 · iconLeft 屬性',
            'placeholder' => 'you@example.com',
        ],
        'input_number' => [
            'label' => '數量',
            'hint'  => '由 Alpine 驅動的 ± 與邊界鉗制',
        ],
        'tooltip' => [
            'intro'   => '將滑鼠懸停在下方按鈕上：',
            'light'   => '預設淺色表面',
            'neutral' => '標準深色泡泡',
            'success' => '語意顏色',
        ],
        'stepper' => [
            'plan'  => '規劃',
            'build' => '構建',
            'ship'  => '出貨',
        ],
    ],

    'ready' => [
        'title'    => '準備好構建了嗎？',
        'subtitle' => '取得套件、瀏覽元件、出貨 UI。',
        // :heart placeholder 被替換為預先渲染的 <x-i type="heart"> SVG。
        'foot'     => 'MIT 授權 · 由 sparrowhawk-labs :heart 精心打造',
    ],

    'subheading' => [
        'accordion' => '可摺疊列表。v0.4.0 改為巢狀語法 (Blade 槽位可自然傳遞，無 XSS 顧慮)。&lt;x-accordion-item title="..."&gt;content&lt;/x-accordion-item&gt; 列在 &lt;x-accordion&gt; 內。支援 single-open / multiple-open，尺寸 3 階段。content 為 Blade 槽位，可使用任意 Blade 標記、元件、連結等。Alpine x-collapse 提供平滑動畫。',
        'alert' => '8 種外觀 × 語意顏色，支援可關閉',
        'avatar' => '首字母 / 圖示 / 圖像 + 尺寸 × 形狀 × 狀態指示器',
        'avatar-group' => 'daisyUI 5 的 avatar-group 類別疊疊頭像成列 (facepile)。用於專案成員 / 參與者 / 負責人清單等。槽位中列多個 &lt;x-avatar&gt; 即可。spacing 有 3 階切換 (tight / normal / loose)。',
        'badge' => '顏色 × 外觀 (solid / outline / soft / base-100 / base-200 / base-300 / dot)',
        'breadcrumb' => '階層式導航。包裝 daisyUI 5 的 breadcrumbs 類別。雙 API：透過 items 陣列傳遞，或自行在 &lt;ul&gt; 中撰寫 &lt;li&gt;。末項 (省略 url) 為目前位置，不轉為連結。分隔符號有 chevron (預設) / slash 兩種，尺寸為 sm / md / lg。',
        'button' => '顏色 × 外觀 (solid / outline / soft / base-100 / base-200 / base-300 / ghost / link) — 全 8 色',
        'button-group' => '多個 button / link 捆綁為分段控制風格的包裝器。中央子元素的 border-radius 由包裝器自動設為 0，相鄰邊框合併為 1 條。hover 在包裝器層級以軟色調覆蓋，群組內容不顯重 (v0.3.3 改善)。orientation 為 horizontal (預設) / vertical。子項無需附加 `class="join-item"` (v0.3.3 改為不需)。',
        'card' => '外觀 = default / elevated / filled / base-100 / base-200 / base-300 / outline / soft / solid / bordered-top / ghost — 分隔符切換',
        'checkbox' => '虛擬核取方塊 (peer + sr-only) — 顏色 × 外觀 (solid / soft / base-100 / base-200 / base-300) × 尺寸',
        'collapse' => 'daisyUI 5 的 collapse 類別包裝，單一開關區塊 (無 JS，內部核取方塊控制開閉)。title 屬性或 slot:title 作頁首，$slot 作本文。icon (null=預設 / arrow / plus)、bordered (預設 true)、open (初始開啟) 3 個屬性 + title。預設為無圖示最小風格，必要時可用 icon 屬性加選圖示。多項組成常見問答時直接縱排即可。',
        'divider' => 'daisyUI 5 的 divider 類別包裝，段落分隔線。@verbatim<x-divider>@endverbatim 為純線條，槽位內放文字可帶標籤。direction=vertical 時在 flex 內成為縱線。',
        'dropdown' => 'Alpine.js 驅動的通用下拉選單。trigger 可透過槽位替換，label 屬性可簡化為按鈕。position (bottom-end 預設 / bottom-start / top-end / top-start)、size (sm/md/lg)、width (任意 Tailwind w-* 類別) 3 個屬性。選單內容自由槽位 — 可放連結、按鈕等任何內容。',
        'file-upload' => '原生 <input type="file"> + file:* 工具類 (行內) 及虛線拖放區 (大面積)。多檔案進度條由 Alpine 驅動 — 模擬标誌讓演示自動執行進度。',
        'font-debug' => '日文 × 拉丁字體堆棧驗證 — 設計師 / 貢獻者用',
        'indicator' => 'daisyUI 5 的 indicator 類別包裝，在別層元素角落疊徽章或點。position (top/middle/bottom × start/center/end 共 9 種)、dot (布林，true=純點無文字)、color (8 色，預設=error)、appearance (solid 預設 / soft / outline / ghost / dash) 4 個屬性。預設 solid (濃填充) 強調「有通知」。soft 等為選加。內容放入 $badge 槽位，被覆蓋元素放入 $slot。',
        'input' => '顏色 × 外觀 (outline / soft / underline / ghost) — 前綴 / 後綴、圖示、浮動標籤、附加槽位支援',
        'input-group' => '任意組合表單元素橫排 joined。select+input、input+button、input+input 等。x-input 的 prefix/suffix/append 用於單一 input 中心組合，這個用於多個同等表單元素。`$c[\'addon\']` 輔助類別可讓文字裝飾 span 對齊 addon 高度。',
        'input-number' => '數量選擇器 — [−] [input] [＋] 3 元素邊框連結。min/max/step 同時由 HTML 屬性和 Alpine 鉗制強制，達邊界時 ± 按鈕自動停用。原生旋轉箭頭隱藏。支援小數 step (如 0.5)。',
        'kbd' => '鍵盤快速鍵用行內晶片。HTML5 <kbd> 元素由 daisyUI 5 的 kbd 類別包裝。僅 size 和 appearance 2 個屬性。可嵌入文句內或用 + 連接組合。',
        'modal' => 'Alpine x-data 驅動的覆蓋對話框。trigger 槽位內元素點擊開啟，或其他位置呼叫 $dispatch("open-modal-{id}") 開啟。size (sm/md/lg/xl/full)、title、showClose、closeOnBackdrop 4 個屬性。背景點擊 / Escape / × 按鈕關閉。x-trap 提供焦點捕獲，x-teleport 繪製到 body 直下。',
        'notification-system' => '頁面放置一次，任意 Alpine 元件可呼叫 $dispatch("notify", { type, content }) 發送 Toast。position / appearance / size / duration / event-name 由屬性控制。',
        'pagination' => '完整 (已編號) / 簡單 (前-當前/總計-後) — 顏色 × 外觀 × 尺寸，支援 Laravel paginator',
        'pin-input' => 'OTP / 驗證碼輸入 — N 個單字元方塊自動前進 / 退格返回 / 方向鍵導航 / 貼上填充。首個方塊已附加 autocomplete="one-time-code" (iOS/Android 會顯示簡訊碼候選)。numeric (預設) / alphanumeric、length / size / masked / autofocus 等屬性。合併值透過隱藏 input 提交。',
        'popover' => '點擊 (或懸停) 在 trigger 旁浮出面板。dropdown 與 tooltip 之間 — 可放任意內容 (資訊卡 / 迷你表單 / 確認提示)。4 個 placement (top/right/bottom/left) 由 CSS 配置 (無碰撞偵測)，可選箭頭，trigger="click" (預設) / "hover"。Alpine 驅動，ESC 關閉，外部點擊關閉。',
        'progress' => 'daisyUI progress bar 包裝。value=null 為不確定 (動畫條紋)、value 指定為確定。顏色 × 尺寸 × showLabel (百分比 / 分數) 由屬性控制。無障礙已附加 role=progressbar + aria-valuenow / valuemin / valuemax。',
        'radio' => '虛擬單選鈕 (peer + sr-only) — 顏色 × 外觀 (solid / soft / base-100 / base-200 / base-300) × 尺寸，含單選鈕群組',
        'range-slider' => 'daisyUI 5 的 range 類別包裝，<input type="range"> + 標籤 / 值顯示 / 提示 / 錯誤的修飾。8 色 × 5 尺寸、min/max/step、showValue (Alpine 即時顯示)、error 狀態。可作表單輸入或純視覺滑桿。',
        'rating' => 'daisyUI 5 的 rating (mask + radio) 包裝。星 / 心 / 圓形，支援半星 (half=true)、唯讀。各演示的 name 屬性必須唯一以分離單選鈕群組。',
        'select' => '原生 select — 顏色 × 外觀、尺寸、選項群組、多選、浮動標籤',
        'sidebar' => 'x-teleport 繪製到 body 直下的抽屜式元件。trigger 槽位點擊開啟，Escape / × / 背景點擊關閉。side (left/right)、size (sm/md/lg)、backdrop 3 軸構成變體。焦點捕獲 (x-trap.inert.noscroll) 和 role=dialog/aria-modal=true 確保無障礙。backdrop=false 時整個 overlay 設 pointer-events-none，面板單獨改回 pointer-events-auto，允許背後頁面操作 (永久 inspector、工具調色板用途)。',
        'skeleton' => '內容載入中的佔位符。包裝 daisyUI 的 skeleton 類別，shape (rect / circle / text) / width / height / radius / animated 由屬性控制。width / height 用 Tailwind 類別名傳遞 (`w-32`、`h-4` 等)。',
        'spinner' => '載入顯示用行內指示器。包裝 daisyUI 5 的 loading 類別。variant (spinner/dots/ring/bars/ball/infinity) × size (xs〜xl) × color (8 色) 組合，可用於按鈕內、整頁、卡片等各種「等待時間」。',
        'stat' => 'KPI / 指標單獨顯示。包裝 daisyUI 的 stats + stat 類別，除 label / value / desc 外，valueColor / trend / trendValue 控制著色與方向箭頭。多項並排時用 wrapped=false 讓外側自行產生 &lt;div class="stats"&gt;。',
        'stepper' => '多步驟流程可視化 — 註冊流程 / 結帳 / 精靈。items 陣列傳遞，各項附加 state=done|current|upcoming。orientation (horizontal 預設 / vertical) 與 variant (numbered 預設 / dotted) 2 個修飾符。timeline 供僅追加歷史，stepper 供有界序列進度。',
        'table-scroll' => '通常表格顯示 + x-table-scroll 包裝，溢出時橫捲才顯示左右按鈕與漸層淡入。內容不溢出時包裝透明 (無額外貢獻)。非表格專用，也可用於卡片列表 / 圖像條帶等。',
        'tabs' => '分頁式內容切換。v0.4.0 改為巢狀語法 (Blade 槽位可自然傳遞，無 XSS 顧慮)。&lt;x-tab name="..." label="..."&gt;content&lt;/x-tab&gt; 列在 &lt;x-tabs&gt; 內。variant：underline (預設) / boxed / pill、size：sm / md / lg。default 指定初始作用 name (省略時為首分頁)。Alpine x-data 保持客戶端作用狀態。',
        'textarea' => '顏色 × 外觀 (outline / soft / underline / ghost) — rows、autoresize、字元計數器、label/hint/error',
        'theme-preview' => 'v0.4.0 同梱預定的 data-theme="pinion" 音調，用於使用者判斷的頁面。各卡片用行內 CSS 變數覆寫 daisyUI v5 語彙系統 (實裝上整理到 themes 陣列)。',
        'timeline' => 'daisyUI 5 的 timeline 類別包裝，時序列表。items 陣列傳遞即可。orientation (vertical/horizontal)、compact (偏向一側)、snap (圖示貼上端)、appearance (solid 預設 / soft) 4 個修飾符。各項附加 state=done|current|upcoming 時中點圖示與連接線變色。預設 solid (濃主色) 使完成鏈明顯。穩和時只加選 appearance="soft"。',
        'toggle' => '開關 (peer + sr-only，role="switch") — 顏色 × 外觀 (solid / soft) × 尺寸，搭配選項開 / 關狀態標籤。solid 填充軌道；soft 反轉並填充拇指。',
        'tooltip' => 'daisyUI 5 的 tooltip 類別包裝，無 JS / 純 CSS 懸停提示。trigger 放入槽位，本文用 text 屬性傳遞。position (top/right/bottom/left)、color (light 預設 + 8 變體含 neutral)、open (常時顯示) 3 個屬性。',
    ],
];
