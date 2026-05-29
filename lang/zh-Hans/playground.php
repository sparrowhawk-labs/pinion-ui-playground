<?php

return [
    'brand' => [
        'subline' => 'Blade 适配器 · 实时演示',
    ],

    'nav' => [
        'components' => '组件',
    ],

    'catalog' => [
        'title'    => '组件目录',
        'subtitle' => '46 个 Blade 组件。仅靠 Tailwind + daisyUI 即可运行的静态组件，以及依托 Alpine.js 提供交互行为的动态组件，按类别分别整理。点击卡片即可进入各组件的独立页面。',
        'section'  => [
            'static'  => '静态 — 仅 Tailwind + daisyUI',
            'dynamic' => '动态 — Alpine.js 驱动',
            'icons'   => '图标系统',
        ],
    ],

    'hero' => [
        'eyebrow_chip' => 'v0.4.0 · BLADE',
        'eyebrow_note' => '— REACT / VUE / WEB COMPONENTS COMING v0.5+',
        'title' => [
            'line1' => '创作的速度，',
            'line2' => '没有上限。',
        ],
        'pivot_punch' => '风格自由切换，代码原封不动。',
        'pivot_sub'   => '只用 <code>data-theme</code> 与 <code>data-tune</code> 两个属性，即可整体替换颜色、形状、间距和字体。无需重写、无需重新构建。',
        'subtitle' => '设计不必先定下来，可以边做边决定。颜色、形状、间距，一个属性就能整体切换。转向只在一瞬，返工时间归零。与 AI 并肩，创意随之变幻自如，不断加速。',
        'cta' => [
            'github'     => '在 GitHub 查看',
            'components' => '浏览组件',
        ],
        'chip' => [
            'themes'     => '30+ daisyUI themes',
            'components' => '46 UI components',
            'tunes'      => '11 Tune presets ↓',
        ],
        'selector' => [
            'tune_label'  => 'PICK A TUNE',
            'theme_label' => 'PICK A THEME',
        ],
        'iframe' => [
            'live'        => 'LIVE',
            'foot'        => 'acme studio · throughput dashboard',
            'previewing'  => '预览中：',
            'committed'   => '已确定：',
        ],
    ],

    'stat' => [
        'components' => [
            'label' => '组件',
            'desc'  => '跨越 7 个分类',
        ],
        'tunes' => [
            'label' => 'Tune 预设',
            'desc'  => 'shape × space × font',
        ],
        'themes' => [
            'label' => 'daisyUI 主题',
            'desc'  => 'light · dark · 全部主题化',
        ],
        'icons' => [
            'label' => 'Solar 图标',
            'desc'  => 'pinion-icons v0.1.0',
        ],
        'icons_credit' => '图标数来自 sparrowhawk-labs/pinion-icons →',
    ],

    'whats_new' => [
        'title'         => '最新发布',
        'all_releases'  => '所有发布',
        'card1' => [
            'title'    => '单一 import 预设',
            'body'     => '一行 <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">pinion-ui.css</code> import 会在你的 app.css 中装配 Tailwind v4、daisyUI v5 和 tune 标记系统。',
            'released' => '发布时间 — 2026-04',
        ],
        'card2' => [
            'title'    => 'Focus + Collapse 插件',
            'body'     => '<code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">ui:install</code> 现在自动装配 <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">@alpinejs/focus</code> 和 <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">@alpinejs/collapse</code> — modal 焦点陷阱和 accordion 高度动画即装即用。',
            'released' => '发布时间 — 2026-05',
        ],
        'card3' => [
            'title'    => 'Popover padding 属性',
            'body'     => '<code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">&lt;x-popover&gt;</code> 上的新 <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">padding</code> 属性，让右键上下文菜单能紧贴内容。',
            'released' => '发布时间 — 2026-05',
        ],
    ],

    'ai_native' => [
        'title'       => '为 AI 代理而生',
        'alert_title' => 'AI 代理能正确编写 pinion-ui',
        'bullet1'     => '一次性阅读 <code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">CLAUDE.md</code> 了解项目约定',
        'bullet2'     => '<code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">AGENTS.md</code> 指导每个组件的查询工作流',
        'bullet3'     => '<code class="text-xs bg-base-200 px-1.5 py-0.5 rounded">reference/components/</code> 下有 46 份每组件参考文档',
        'bullet4'     => '全新 Laravel 安装已验证 — 将包导入任何新应用，立即构建',
        'install' => [
            'title'  => '60 秒快速安装',
            'step1'  => '# 1. 添加包',
            'step2'  => '# 2. 安装资产 + AGENTS.md 脚手架',
            'step3'  => '# 3. 构建 & 运行',
            'foot'   => '加上 <code class="text-xs">--ai</code> 会将 <code class="text-xs">CLAUDE.md</code> + <code class="text-xs">AGENTS.md</code> 放在你的 repo 根目录。',
        ],
    ],

    'components' => [
        'title'     => '组件 — 实时体验',
        'subtitle'  => '46 个中的 9 个 — 从侧边栏选择任何组件查看完整矩阵',
        'modal' => [
            'desc'    => '由 Alpine 驱动的对话框，带焦点陷阱、ESC 和背景关闭。',
            'title'   => '欢迎来到 pinion-ui',
            'body'    => '46 个组件，全部主题化，全部为 AI 代理编写文档。按 <kbd class="kbd kbd-sm">Esc</kbd> 或点击外部关闭。',
            'button'  => '打开模态',
            'close'   => '关闭',
            'ok'      => '明白了',
        ],
        'rating' => [
            'stars'      => '星级',
            'half_heart' => '半心',
        ],
        'toggle' => [
            'email' => '邮件通知',
            'dark'  => '深色模式',
        ],
        'input' => [
            'label'       => '邮箱',
            'hint'        => '浮动标签 · iconLeft 属性',
            'placeholder' => 'you@example.com',
        ],
        'input_number' => [
            'label' => '数量',
            'hint'  => 'Alpine 驱动的 ± 和边界固定',
        ],
        'tooltip' => [
            'intro'   => '悬停下方任意按钮：',
            'light'   => '默认浅色面板',
            'neutral' => '标准深色气泡',
            'success' => '语义色彩',
        ],
        'stepper' => [
            'plan'  => '规划',
            'build' => '构建',
            'ship'  => '发布',
        ],
    ],

    'ready' => [
        'title'    => '准备好构建了吗？',
        'subtitle' => '获取包、浏览组件、发布 UI。',
        // :heart 占位符会被替换为预渲染的 <x-i type="heart"> SVG
        'foot'     => 'MIT 许可 · 由 sparrowhawk-labs 倾心打造 :heart',
    ],

    'subheading' => [
        'accordion' => '可折叠列表。v0.4.0 采用嵌套语法改进（能安全地传递 Blade slot，无 XSS 风险）。在 &lt;x-accordion&gt; 内并排放置 &lt;x-accordion-item title="..."&gt;content&lt;/x-accordion-item&gt;。支持 single-open / multiple-open，3 个尺寸等级。内容可以是任意 Blade 标记、组件或链接。Alpine x-collapse 驱动平滑动画。',
        'alert' => '8 种外观 × 语义色彩，支持可关闭',
        'avatar' => '首字母/图标/图像 + 尺寸 × 形状 × 状态指示器',
        'avatar-group' => 'daisyUI 5 avatar-group 类将多个头像堆叠排列（人脸堆积）。用于项目成员、参与者或负责人列表。只需在 slot 中并排多个 &lt;x-avatar&gt; 即可。spacing 控制堆叠密度：3 档（紧密 / 标准 / 宽松）。',
        'badge' => '颜色 × 外观（实心 / 轮廓 / 柔和 / base-100 / base-200 / base-300 / 圆点）',
        'breadcrumb' => '分层导航。包装 daisyUI 5 的 breadcrumbs 类。双 API：通过 items 数组传递，或自行编写 &lt;ul&gt; 和 &lt;li&gt;。末项（省略 url）显示为当前位置，不生成链接。分隔符 2 种：chevron（默认）/ 斜杠；尺寸 3 档：sm / md / lg。',
        'button' => '颜色 × 外观（实心 / 轮廓 / 柔和 / base-100 / base-200 / base-300 / 幽灵 / 链接）— 共 8 种颜色',
        'button-group' => '分段控制风格，将多个按钮/链接束在一起。包装器自动去除中间子元素的 border-radius 并合并相邻边框。悬停时由包装器统一应用柔和色调，组件不显得厚重（v0.3.3 改进）。方向：水平（默认）/ 垂直。子元素无需添加 `class="join-item"`（v0.3.3 起不再需要）。',
        'card' => '外观 = 默认 / 浮起 / 填充 / base-100 / base-200 / base-300 / 轮廓 / 柔和 / 实心 / 顶部边框 / 幽灵 — 支持分隔线开关',
        'checkbox' => '虚拟复选框（peer + sr-only）— 颜色 × 外观（实心 / 柔和 / base-100 / base-200 / base-300）× 尺寸',
        'collapse' => '包装 daisyUI 5 的 collapse 类，单个开/关块（无 JS，内部复选框控制）。通过 title prop 或 slot:title 传递标题，$slot 传递主文本。icon（null=默认 / 箭头 / 加号）、bordered（默认 true）、open（初始打开状态）共 3 个 prop + title。默认是无图标的极简显示，需要时可通过 icon prop 选择图标。多个连接可垂直排列组成常见问题解答。',
        'divider' => 'daisyUI 5 divider 类的包装器，用于分隔部分。@verbatim<x-divider>@endverbatim 输出纯线条，slot 中加文本则为带标签的分隔线。direction=vertical 在 flex 中变成垂直线。',
        'dropdown' => 'Alpine.js 驱动的通用下拉菜单。trigger 可通过 slot 自定义，label prop 可快速变为按钮。position（底端右对齐默认 / 底端左 / 顶端右 / 顶端左）、size（sm/md/lg）、width（任意 Tailwind w-* class）3 个 prop。菜单内容自由 — 可放链接、按钮或任何元素。',
        'file-upload' => '原生 &lt;input type="file"&gt; + file:* 工具类（行内）和虚线拖放区（大区域）。Alpine 驱动的多文件进度条 — 进度条动画由模拟进度驱动，演示自运行。',
        'indicator' => 'daisyUI 5 indicator 类的包装器，在另一个元素的角落重叠徽章或圆点。position（上/中/下 × 左/中/右，共 9 种）、dot（bool，true=纯圆点无文字）、color（8 色，默认=错误）、appearance（实心默认 / 柔和 / 轮廓 / 幽灵 / 虚线）4 个 prop。默认实心（浓填充）强调"有通知"。柔和等为可选。$badge slot 放内容，$slot 放被覆盖的元素。',
        'input' => '颜色 × 外观（轮廓 / 柔和 / 下划线 / 幽灵）— 支持前缀/后缀、图标、浮动标签、追加 slot',
        'input-group' => '将任意表单元素水平并排连接。支持 select+input、input+button、input+input 等组合。x-input 的 prefix/suffix/append 适合单输入框自定义，此组件适合多个同级表单元素。`$c[\'addon\']` 辅助类可将文本修饰 span 对齐到 addon 高度。',
        'input-number' => '数量选择器 — [−] [input] [＋] 3 元素边框连接。min/max/step 同时在 HTML 属性和 Alpine 限制中强制执行，到达边界时 ± 按钮自动禁用。原生微调箭头隐藏。支持小数步长（如 0.5）。',
        'kbd' => '键盘快捷键用行内芯片。HTML5 &lt;kbd&gt; 元素由 daisyUI 5 的 kbd 类包装。仅 2 个 prop：size 和 appearance。可嵌入段落或用 + 连接表示组合键。',
        'modal' => 'Alpine x-data 驱动的叠加对话框。点击 trigger slot 中的元素打开，或从其他地方 $dispatch("open-modal-{id}") 打开。size（sm/md/lg/xl/full）、title、showClose、closeOnBackdrop 共 5 个 prop。背景点击 / Escape / × 按钮关闭。x-trap 处理焦点陷阱，x-teleport 渲染到 body 末尾。',
        'notification-system' => '在页面放置一次，任意 Alpine 组件可 $dispatch("notify", { type, content }) 发出 Toast。position / appearance / size / duration / event-name 通过 prop 控制。',
        'pagination' => 'full（编号）/ simple（上一页-当前/总数-下一页）— 颜色 × 外观 × 尺寸，支持 Laravel paginator',
        'pin-input' => 'OTP / 验证码输入 — N 个单字符框自动推进 / 退格回退 / 方向键导航 / 粘贴填充联动。首框预设 autocomplete="one-time-code"（iOS/Android 可显示短信码候选）。numeric（默认）/ 字母数字，length / size / masked / autofocus 等 prop。组合值通过隐藏 input 随表单提交。',
        'popover' => '点击（或悬停）在触发器旁浮起的面板。介于 dropdown 和 tooltip 之间 — 可放任意内容（信息卡 / 迷你表单 / 确认提示）。4 个放置位置（上/右/下/左）CSS 定位（无碰撞检测），可选箭头，trigger="click"（默认）/ "hover"。Alpine 驱动，ESC 或外部点击关闭。',
        'progress' => 'daisyUI progress bar 包装器。value=null 为不确定（动画条纹），指定 value 为确定状态。通过 prop 控制颜色 × 尺寸 × showLabel（百分比 / 分数）。a11y 已附加 role=progressbar + aria-valuenow / valuemin / valuemax。',
        'radio' => '虚拟单选框（peer + sr-only）— 颜色 × 外观（实心 / 柔和 / base-100 / base-200 / base-300）× 尺寸，支持 radio-group',
        'range-slider' => 'daisyUI 5 range 类的包装器，&lt;input type="range"&gt; + 标签/值显示/提示/错误提示。8 种颜色 × 5 种尺寸，min/max/step，showValue（Alpine 实时显示），错误状态。既可作表单输入，也可作纯视觉滑块。',
        'rating' => 'daisyUI 5 rating（遮罩 + 单选框）包装器。星形 / 心形 / 圆形，半星（half=true），只读模式。每个演示 name 属性必须唯一以隔离单选框组。',
        'select' => '原生 select — 颜色 × 外观、尺寸、选项组、多选、浮动标签',
        'sidebar' => 'x-teleport 渲染到 body 末尾的抽屉类组件。点击 trigger slot 打开，Escape / × / 背景点击关闭。side（左/右）、size（sm/md/lg）、backdrop 3 个轴生成变体。x-trap.inert.noscroll 和 role=dialog/aria-modal=true 保障 a11y。backdrop=false 时整个叠加层 pointer-events-none，仅面板 pointer-events-auto，后台页面可操作（适用于永久检查器、工具调色板）。',
        'skeleton' => '内容加载中的占位符。包装 daisyUI 的 skeleton 类，通过 prop 控制 shape（矩形 / 圆 / 文本）/ width / height / radius / animated。width / height 用 Tailwind 类名传递（如 `w-32`、`h-4`）。',
        'spinner' => '加载指示器行内显示。包装 daisyUI 5 的 loading 类。variant（旋转/圆点/圆环/条纹/球/无穷）× size（xs〜xl）× color（8 色）组合，表达按钮内、整页或卡片等一切"等待时间"。',
        'stat' => 'KPI / 指标单独显示。包装 daisyUI 的 stats + stat 类，除 label / value / desc 外，还有 valueColor / trend / trendValue 控制着色和方向箭头。多个并排时设 wrapped=false，外层自行 &lt;div class="stats"&gt;。',
        'stepper' => '多步骤流程可视化 — 注册流 / 结账 / 向导。通过 items 数组传递，各项添加 state=done|current|upcoming。orientation（水平默认 / 垂直）和 variant（编号默认 / 圆点）2 个修饰符。timeline 用于仅追加历史，stepper 用于有界顺序进度。',
        'table-scroll' => '常规表格显示 + x-table-scroll 包装器：水平滚动时显示左右按钮和渐变淡出。内容不溢出时包装器透明（无额外内容）。非仅用于表格，也适用于卡片列表、图片条纹等。',
        'tabs' => '选项卡式内容切换。v0.4.0 采用嵌套语法改进（能安全地传递 Blade slot，无 XSS 风险）。在 &lt;x-tabs&gt; 内并排放置 &lt;x-tab name="..." label="..."&gt;content&lt;/x-tab&gt;。variant：下划线（默认）/ 盒子 / 胶囊；size：sm / md / lg。用 default 指定初始活跃标签（省略时为第一个）。Alpine x-data 保持客户端活跃状态。',
        'textarea' => '颜色 × 外观（轮廓 / 柔和 / 下划线 / 幽灵）— 行数、自动调整大小、字符计数器、标签/提示/错误',
        'timeline' => 'daisyUI 5 timeline 类的包装器，时序列表。直接通过 items 数组传递即可。orientation（垂直/水平）、compact（单侧对齐）、snap（图标上端对齐）、appearance（实心默认 / 柔和）4 个修饰符。各项添加 state=done|current|upcoming 时，中间图标和连接线改变颜色。默认实心（浓主色）使完成链突出清晰。需要温和外观时才选 appearance="soft"。',
        'toggle' => '开关（peer + sr-only，role="switch"）— 颜色 × 外观（实心 / 柔和）× 尺寸，支持可选的开/关状态标签。实心填充滑轨；柔和反转并填充拇指。',
        'tooltip' => 'daisyUI 5 tooltip 类的包装器，无 JS / 纯 CSS 悬停提示。trigger 放入 slot，本文通过 text prop 传递。position（上/右/下/左）、color（浅色默认 + 8 个变体含中性）、open（常显）3 个 prop。',
    ],
];
