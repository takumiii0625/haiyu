<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>金沢区 地域循環油プロジェクト｜廃食油1L=10円で地域へ循環</title>
    <meta name="description" content="10月1日スタート。家庭・飲食店の廃食油を1L=10円で循環資金化し、金沢区の医療・福祉と子どもたちの学びへ。参加方法・回収マップ・お問い合わせ。">
    <link href="https://unpkg.com/modern-css-reset/dist/reset.min.css" rel="stylesheet">
    {{-- favicon（PNGをそのまま使用） --}}
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}"> {{-- iOS用 --}}

    <style>
        :root {
            --ocean: #0B7285;
            --leaf: #2F9E44;
            --oil: #F08C00;
            --bg: #F6F9FC;
            --text: #1F2937;
            --ink: #0b5561;
            --white: #ffffff;
            --max: 1100px;
        }

        body {
            font-family: "Noto Sans JP", system-ui, -apple-system, "Segoe UI", sans-serif;
            color: var(--text);
            background: var(--bg);
        }

        .container {
            max-width: var(--max);
            margin: 0 auto;
            padding: 0 16px;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 700
        }

        .btn--primary {
            background: var(--ocean);
            color: #fff
        }

        .btn--secondary {
            border: 2px solid var(--ocean);
            color: var(--ocean);
            background: #fff
        }

        header {
            position: sticky;
            top: 0;
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
            z-index: 10
        }

        .nav {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            /* 左詰めベース */
            height: 60px;
            gap: 12px;
            /* 左側の要素同士の間隔 */
        }

        /* 右側のナビを右端へ押し出す */
        .nav__links {
            margin-left: auto;
            /* ← ここがポイント */
            display: flex;
            gap: 16px;
        }

        .nav__logo {
            font-weight: 900;
            color: var(--ocean)
        }

        /* 既存 */
        .nav__links a {
            margin-left: 16px;
            color: var(--text);
            text-decoration: none;
        }

        /* レイアウト（任意）：ボタンとnavを横並びにする場合 */
        .header-row {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
        }


        .nav-toggle {
            display: none !important;
            /* ← まず隠す */
        }

        /* ===== スマホレイアウト ===== */
        @media (max-width: 768px) {

            /* ハンバーガーボタン */
            /* ボタン本体 */
            /* ボタン本体 */
            .nav-toggle {
                position: relative;
                width: 44px;
                height: 44px;
                display: inline-flex !important;
                align-items: center;
                justify-content: center;
                background: var(--ocean, #0B7285);
                color: #fff;
                /* 線色は currentColor を使用 */
                border-radius: 9999px;
                border: 1px solid rgba(0, 0, 0, .15);
                z-index: 4000;
            }

            /* 閉じている時：::before で中央線＋上下線を box-shadow で同時に描く（=三本線） */
            .nav-toggle::before {
                content: "";
                position: absolute;
                left: 10px;
                right: 10px;
                height: 3px;
                top: 50%;
                transform: translateY(-50%);
                background: currentColor;
                border-radius: 2px;
                box-shadow: 0 -8px 0 0 currentColor, 0 8px 0 0 currentColor;
                /* 上下の線 */
                transition: transform .22s ease, box-shadow .22s ease, opacity .18s ease;
                transform-origin: center;
            }

            /* ✕ 用のもう1本（初期は非表示） */
            .nav-toggle::after {
                content: "";
                position: absolute;
                left: 10px;
                right: 10px;
                height: 3px;
                top: 50%;
                transform: translateY(-50%) rotate(0deg);
                background: currentColor;
                border-radius: 2px;
                opacity: 0;
                transition: transform .22s ease, opacity .18s ease;
                transform-origin: center;
            }

            .nav-toggle {
                display: inline-flex;
                position: fixed;
                top: 12px;
                right: 12px;
                /* ← 画面の右上に固定 */
                z-index: 4000;
            }

            /* 開いた時（≡ → ✕） */
            .nav-toggle[aria-expanded="true"]::before {
                box-shadow: none;
                /* 上下の線を消す */
                transform: translateY(-50%) rotate(45deg);
            }

            .nav-toggle[aria-expanded="true"]::after {
                opacity: 1;
                transform: translateY(-50%) rotate(-45deg);
            }


            /* スマホではメニューはドロワーに */
            .nav__links {
                position: fixed;
                top: 0;
                right: 0;
                bottom: 0;
                width: min(82vw, 180px);
                background: rgba(255, 255, 255, 0.96);
                backdrop-filter: blur(6px);
                display: flex;
                flex-direction: column;
                padding: 72px 24px 24px;
                gap: 18px;
                transform: translateX(100%);
                opacity: 0;
                pointer-events: none;
                transition: transform .25s ease, opacity .25s ease;
                z-index: 1000;
            }

            .nav__links a {
                margin: 0;
                font-size: 18px;
                color: #111;
                /* カバー濃いめ＋文字#111想定 */
            }

            /* 開いた状態 */
            .nav__links.is-open {
                transform: translateX(0);
                opacity: 1;
                pointer-events: auto;
            }

            /* 背景スクロール固定 */
            body.menu-open {
                overflow: hidden;
            }
        }

        /* PCでは従来通り横並び */
        @media (min-width: 769px) {
            .nav__links {
                display: flex;
                align-items: center;
            }
        }


        .hero {
            background: #fff;
            padding: 64px 0
        }

        .hero__eyebrow {
            color: var(--oil);
            font-weight: 800
        }

        .hero h1 {
            font-size: clamp(28px, 4vw, 44px);
            line-height: 1.2;
            color: var(--ocean);
            margin: .4em 0
        }


        .hero__sub {
            font-size: 18px;
            margin-bottom: 20px
        }

        .grid {
            display: grid;
            gap: 20px
        }

        .grid--3 {
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr))
        }

        .card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 20px
        }

        section {
            padding: 28px 0
        }

        h2 {
            font-size: clamp(22px, 3vw, 32px);
            margin-bottom: 16px;
            color: var(--ink)
        }

        .flow {
            display: grid;
            gap: 12px;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr))
        }

        .faq details {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 14px;
            margin-bottom: 10px
        }

        footer {
            padding: 40px 0;
            color: #475569
        }

        .tag {
            display: inline-block;
            background: #E6FCF5;
            color: #0F5132;
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700
        }

        .hero__art {
            width: 100%;
            height: 220px;
            border-radius: 14px;
            border: 1px dashed #93c5fd;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 18px;
            background: #fff
        }

        .hero__art span {
            opacity: .6
        }

        .meta {
            font-size: 14px;
            color: #64748b
        }

        .tabs {
            display: grid;
            gap: 12px;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr))
        }

        .cta-block {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 24px;
            text-align: center
        }

        .cta-block h3 {
            margin-top: 0
        }

        .footer-links a {
            color: #475569;
            margin-right: 12px;
            text-decoration: none
        }


        /* -------------------------------------------------------------------------------------------------------------------------------------------------- */
        /* テキストは前面、背景は背面 */
        .hero {
            position: relative;
            z-index: 0;
            color: #111;
            /* 白カバー前提で濃い文字色に */
        }

        .hero .container {
            position: relative;
            z-index: 2;
        }

        /* 背景レイヤー */
        .main-visual {
            position: absolute;
            inset: 0;
            z-index: 1;
        }

        .main-visual .img-wrap {
            position: absolute;
            inset: 0;
        }

        .main-visual .img-wrap img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 0;
        }

        /* ★ 薄い白カバー（画像の上・文字の下） */
        .main-visual::after {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(255, 255, 255, 0.35);
            /* 濃さは 0.25〜0.55 で調整 */
            z-index: 1;
            pointer-events: none;
            /* クリックをブロックしない */
        }



        /* -------------------------------------------------------------------------------------------------------------------------------------------------- */
        /* 白色文字 */
    </style>
</head>

<body>
    <style>
        /* ヘッダーの基準高さ（お好みで） */
        :root {
            --header-h: 54px;
        }

        @media (max-width: 768px) {
            :root {
                --header-h: 60px;
            }
        }

        /* ヘッダー行 */
        .container.nav {
            display: flex;
            align-items: center;
            /* 垂直センター */
            gap: 12px;
            height: var(--header-h);
            /* ← 高さを決める（重要） */
            /* 必要なら左右パディングも */
            padding-inline: 6px;
        }

        /* ロゴ画像をヘッダーの高さにフィット */
        .container.nav>img {
            height: 40px;
            /* ← ヘッダーの高さに合わせる */
            width: auto;
            /* 比率維持 */
            display: block;
            /* 余白対策 */
        }

        /* 文字ロゴなどの位置調整（任意） */
        .nav__logo {
            line-height: 1;
            font-weight: 700;
        }

        /* 右側ナビの並び（任意） */
        .nav__links {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        /* コンテンツが重なる器を作る */
        .hero .container {
            position: relative;
        }

        /* バブルは常に背面＆クリックを通す */
        #bubble-container {
            position: absolute;
            inset: 0;
            z-index: 0;
            /* 背面に */
            pointer-events: none;
            /* クリックを通す（これが重要） */
        }

        /* 他の要素（ボタン含む）は前面に */
        .hero .container>*:not(#bubble-container) {
            position: relative;
            z-index: 1;
        }

        /* バブルが <canvas> の場合の保険 */
        #bubble-container canvas {
            pointer-events: none;
        }
    </style>
    <header>
        <div class="container nav">
            <img src="./image/logo.png" />
            <div class="nav__logo">地域循環油｜金沢区</div>
            <!-- ここを追加 -->
            <button class="nav-toggle" style="--ocean:#0B7285;"
                aria-label="メニュー" aria-expanded="false" aria-controls="global-nav"></button>


            <!-- 既存のナビ。idを付けるだけ -->
            <nav id="global-nav" class="nav__links">
                <a href="#about">仕組み</a>
                <a href="#join">参加方法</a>
                <a href="#cases">実績</a>
                <a href="#map">回収ボックス</a>
                <a href="#contact">お問い合わせ</a>
            </nav>

        </div>
    </header>

    <main>
        <!-- HERO -->
        <section class="hero">

            <!-- 背景画像（テキストの背面に敷く） -->
            <div class="main-visual" aria-hidden="true">

                <div class="img-wrap">

                    <img src="image/top1.png" alt="" fetchpriority="high">
                </div>
            </div>

            <!-- 既存の内容 -->

            <div class="container">
                <div id="bubble-container"></div>
                <div class="tag">2025/10/1(水) START</div>
                <p class="hero__eyebrow">廃食油を捨てずに、地域の力へ</p>
                <h1>金沢区 地域循環油プロジェクト</h1>
                <p class="hero__sub">家庭・飲食店の廃食油を、医療・福祉と子どもたちの学びへつなぐ。</p>
                <div class="meta">連携：金沢区自助連絡協議会<br> 寄付先例：横浜ホスピス「うみとそらのおうち」、金沢区ママ、金沢区自助連絡協議会ほか</div>
                <p style="margin-top:18px;">
                    <a class="btn btn--primary" target="_blank" rel="noopener"
                        href="https://forms.gle/qqTUBBmjqKwtzvL29">
                        お問い合わせ（Googleフォーム）
                    </a>
                </p>
            </div>
        </section>


        <!-- ABOUT / 3C -->
        <style>
            /* バブル背景コンテナ */
            #bubble-container {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                overflow: hidden;
                /* 背景として表示 */
            }

            /* バブルのスタイル */
            .bubble {
                position: absolute;
                background: rgba(46, 209, 179, 0.1);
                /* 淡い青色 */
                border-radius: 50%;
                /* 丸い形状 */
                pointer-events: none;
                /* クリック無効化 */
                opacity: 0;
                transition: opacity 1s ease-in-out;
            }

            /* メディアクエリで画面幅に応じたサイズ調整 */
            @media (max-width: 768px) {
                .bubble {
                    animation: bubble-animation-small 3s linear infinite;
                }
            }

            /* ランダムな動きのアニメーション */
            @keyframes bubble-animation {
                0% {
                    transform: translate(0, 0) scale(0.5);
                    opacity: 0;
                }

                25% {
                    transform: translate(50px, -50px) scale(1.0);
                    opacity: 0.5;
                }


                50% {
                    transform: translate(50px, -50px) scale(1.2);
                    opacity: 0.8;
                }

                75% {
                    transform: translate(100px, -100px) scale(2.5);
                    opacity: 0.5;
                }


                100% {
                    transform: translate(200px, -200px) scale(3.0);
                    opacity: 0;
                }
            }

            /* 小さいバブル用のアニメーション */
            @keyframes bubble-animation-small {
                0% {
                    transform: translate(0, 0) scale(0.5);
                    /* 小さいスケールで開始 */
                    opacity: 0;
                }

                25% {
                    transform: translate(20px, -20px) scale(0.2);
                    /* 小さな移動とスケールアップ */
                    opacity: 0.5;
                }

                50% {
                    transform: translate(20px, -20px) scale(0.5);
                    /* 小さな移動とスケールアップ */
                    opacity: 0.8;
                }

                75% {
                    transform: translate(10px, -10px) scale(0.8);
                    /* 小さなスケールで終了 */
                    opacity: 0.5;
                }

                100% {
                    transform: translate(10px, -10px) scale(1.0);
                    /* 小さなスケールで終了 */
                    opacity: 0;
                }
            }
        </style>


        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const bubbleContainer = document.getElementById("bubble-container");

                // バブルコンテナが見つからない場合のエラー処理
                if (!bubbleContainer) {
                    console.error("Bubble container not found.");
                    return;
                }

                // ランダムな値を生成する関数
                const getRandom = (min, max) => Math.random() * (max - min) + min;

                // バブルを生成する関数
                const createBubble = () => {
                    const bubble = document.createElement("div");
                    bubble.className = "bubble";

                    // ランダムなサイズを設定
                    const maxSize = window.innerWidth <= 768 ? 80 : 200; // 小さい画面では最大100px、大きい画面では最大200px
                    const size = getRandom(20, maxSize);
                    bubble.style.width = `${size}px`;
                    bubble.style.height = `${size}px`;

                    // ランダムな初期位置を設定
                    bubble.style.left = `${getRandom(0, 100)}%`; // 横位置
                    bubble.style.top = `${getRandom(0, 100)}%`; // 縦位置

                    // カスタムアニメーションを作成
                    const keyframes = `
                        @keyframes move-${Date.now()} {
                            0% {
                                transform: translate(0, 0) scale(1);
                                opacity: 1;
                            }
                            100% {
                                transform: translate(${getRandom(-200, 200)}px, ${getRandom(-200, 200)}px) scale(${getRandom(0.5, 1.5)});
                                opacity: 0;
                            }
                        }
                    `;

                    // スタイルタグを作成して挿入
                    const style = document.createElement("style");
                    style.innerHTML = keyframes;
                    document.head.appendChild(style);

                    // カスタムアニメーションを適用
                    bubble.style.animation = `move-${Date.now()} 5s linear infinite`;

                    // バブルをコンテナに追加
                    bubbleContainer.appendChild(bubble);

                    bubble.style.opacity = 1;
                    // バブルを一定時間後に削除
                    setTimeout(() => {
                        bubble.remove();
                        style.remove(); // アニメーションスタイルも削除
                    }, 4000); // アニメーション時間終了後
                };

                // 一定間隔でバブルを生成
                setInterval(() => {
                    createBubble();
                }, 100); // 0.5秒ごとに生成
            });
        </script>

        <!-- バブル背景 -->
        <style>
            /* ------- 3C丸レイアウトのカスタム変数（サイズ・色） ------- */
            #about {
                --bubble-size: clamp(220px, 28vw, 360px);
                /* 丸の直径 */
                --shift: calc(var(--bubble-size) * 0.48);
                /* ← 0.42 から 0.58 にUP */

                /* 小さいほど薄く見える（0〜1） */
                --bubble-alpha: .7;

                /* 丸の色：アルファを共通化 */
                --c1: rgba(11, 114, 133, var(--bubble-alpha));
                /* Carbon Zero */
                --c2: rgba(34, 139, 94, var(--bubble-alpha));
                /* Circulate   */
                --c3: rgba(0, 153, 188, var(--bubble-alpha));
                /* Community   */
            }

            /* 見出しは中央寄せ（お好みで） */
            #about h2 {
                text-align: center;
                margin-bottom: clamp(60px, 2.5vw, 84px);
            }

            /* グリッドの見た目は使わず、重なり配置用の「キャンバス」にする */
            #about .grid--3 {
                position: relative;
                min-height: calc(var(--bubble-size) * 1.75);
            }

            /* 各カードを“丸”にする */
            #about .grid--3 .card {
                position: absolute;
                width: var(--bubble-size);
                aspect-ratio: 1 / 1;
                /* 正円に */
                border-radius: 9999px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                text-align: center;
                padding: clamp(16px, 2.4vw, 28px);
                color: #fff;
                box-shadow: 0 10px 30px rgba(0, 0, 0, .18);
                backdrop-filter: blur(2px);
            }

            /* タイトルと本文の整え */
            #about .grid--3 .card h3 {
                font-size: clamp(18px, 1.4vw, 22px);
                line-height: 1.2;
                margin: 0 0 8px;
            }

            #about .grid--3 .card p {
                font-size: clamp(20px, 1.1vw, 16px);
                line-height: 1.6;
                margin: 0;
            }

            /* --- 3つの丸の位置（デスクトップ）--- */
            #about .grid--3 .card:nth-child(1) {
                /* Carbon Zero：上 */
                left: 50%;
                top: calc(50% - var(--shift));
                transform: translate(-50%, -50%);
                background: var(--c1);
            }

            #about .grid--3 .card:nth-child(2) {
                /* Circulate：左下 */
                left: calc(50% - var(--shift));
                top: calc(50% + var(--shift) / 2);
                transform: translate(-50%, -50%);
                background: var(--c2);
            }

            #about .grid--3 .card:nth-child(3) {
                /* Community：右下 */
                left: calc(50% + var(--shift));
                top: calc(50% + var(--shift) / 2);
                transform: translate(-50%, -50%);
                background: var(--c3);
            }

            /* 丸同士の重なりをきれいに見せる（淡く交差させたいなら） */
            #about .grid--3 .card {
                mix-blend-mode: normal;
            }

            /* ▼ スマホだけサイズを小さく */
            @media (max-width: 768px) {

                #about .grid--3 .card p {
                    font-size: clamp(12px, 1.1vw, 10px);
                    line-height: 1.6;
                    margin: 0;
                }

                #about {
                    /* 画面幅の約52%にすると3つの並び（約1.84×直径）がちょうど収まります */
                    --bubble-size: min(52vw, 260px);
                    /* まだはみ出すなら 50vw や 48vw に */
                    --shift: calc(var(--bubble-size) * 0.46);
                    /* 既存の重なり比そのまま */
                }

                /* 器の高さも直径に追従（見切れ防止・配置は変えない） */
                #about .grid--3 {
                    min-height: calc(var(--bubble-size) * 1.75);
                }

                /* 重なりを弱めたいなら（任意） */
                #about .grid--3 .card+.card {
                    margin-top: -1px;
                }

                /* もっと弱く→ -6px など */
            }

            /* 必要なら multiply も試せます */
        </style>
        <section id="about">
            <div class="container">

                <h2>廃食油は、地域を豊かにする資源 ― 3Cの取り組み</h2>
                <div class="grid grid--3">
                    <div class="card">
                        <h3>Carbon Zero</h3>
                        <p>地域由来の廃食油をエネルギーへ。混合装置等の導入で脱炭素を推進。</p>
                    </div>
                    <div class="card">
                        <h3>Circulate</h3>
                        <p>出前授業で“循環者”を育成。子ども主体で集め、子どもたちが地域と大人を育てる。</p>
                    </div>
                    <div class="card">
                        <h3>Community</h3>
                        <p>回収活動が関係をつなぎ、防災・減災にも寄与。地域で続けられる仕組み。</p>
                    </div>
                </div>
            </div>

        </section>

        <style>
            /* ====== Kanazawa Flow arrows ====== */

            #kanazawa {
                --accent: #0B7285;
                /* 三角の色 */
                --gap: 44px;
                /* カード間のすき間（→の置き場） */
                --arrow-w: 18px;
                /* 三角の横幅（頂点方向） */
                --arrow-h: 19px;
                /* 三角の高さ */
            }

            #kanazawa .flow {
                display: flex;
                gap: var(--gap);
            }

            #kanazawa .flow .card {
                position: relative;
                flex: 1 1 0;
                background: #fff;
                border-radius: 16px;
                padding: 18px 20px;
                box-shadow: 0 10px 24px rgba(0, 0, 0, .08);
            }

            /* ---- PC/タブレット：右向きの三角（→） ---- */
            #kanazawa .flow .card:not(:last-child)::after {
                content: "";
                position: absolute;
                top: 50%;
                right: calc(-1 * (var(--gap) / 2 + var(--arrow-w) / 2));
                /* すき間中央に配置 */
                transform: translateY(-50%);
                width: 0;
                height: 0;
                border-top: calc(var(--arrow-h) / 2) solid transparent;
                border-bottom: calc(var(--arrow-h) / 2) solid transparent;
                border-left: var(--arrow-w) solid var(--accent);
                /* ▶ */
                pointer-events: none;
            }

            /* カウンターの開始 */
            #kanazawa .flow {
                counter-reset: step;
            }

            /* 各カードで +1（※ここでだけ increment。::before ではしない） */
            #kanazawa .flow .card {
                counter-increment: step;
            }

            /* ① カード側の番号表示を無効化（残っていたら上書き） */
            #kanazawa .flow .card::before {
                content: none !important;
            }

            /* ② 見出しの前にだけ数字を表示 */
            #kanazawa .flow .card .step::before {
                content: counter(step) ". ";
                font-weight: 800;
                color: #000000;
            }

            .ocean-link {
                color: var(--ocean);
            }

            .ocean-link:hover,
            .ocean-link:focus-visible {
                color: color-mix(in oklab, var(--ocean) 88%, black);
            }

            .ocean-link:visited {
                color: var(--ocean);
            }

            /* ---- スマホ：縦並び＋下向きの三角（▼） ---- */
            @media (max-width: 768px) {
                #kanazawa .flow {
                    flex-direction: column;
                    gap: 28px;
                    /* モバイルのすき間 */
                }

                #kanazawa .flow .card:not(:last-child)::after {
                    top: auto;
                    right: auto;
                    left: 50%;
                    bottom: -22px;
                    transform: translateX(-50%);
                    border: none;
                    width: 0;
                    height: 0;
                    border-left: calc(var(--arrow-h) / 2) solid transparent;
                    border-right: calc(var(--arrow-h) / 2) solid transparent;
                    border-top: var(--arrow-w) solid var(--accent);
                    /* ▼ */
                }

            }
        </style>
        <!-- 金沢区モデル -->
        <section id="kanazawa">
            <div class="container">
                <h2>金沢区モデルの仕組み（10/1 開始）</h2>

                <div class="flow">
                    <!-- 1. 集める -->
                    <div class="card">
                        <h3 class="step">集める</h3>
                        <p>
                            <strong>【ご家庭】</strong><br>・ルンビニー・つながりの庭<br>
                            <strong>【飲食店】【回収場所】</strong><br>・
                            事前に打ち合わせが必要です。<br><a href="#contact" class="ocean-link">お問い合わせ</a> からご連絡ください。
                        </p>
                    </div>


                    <!-- 2. 換金 -->
                    <div class="card">
                        <h3 class="step">換金</h3>
                        <p>集まった廃食油は弊社が回収・換金し、地域の活動資金になります。</p>

                        <!-- レート表示 -->
                        ・ご家庭</span> <strong>1L＝5円</strong><br>
                        ・飲食店、回収場所</span> <strong>1L＝10円</strong>
                    </div>


                    <!-- 3. 還元 -->
                    <div class="card">
                        <h3 class="step">還元</h3>
                        <p>
                            循環資金は<strong>子育て・医療・福祉</strong>など地域の活動へ還元。
                            例：金沢区の子育て活動（<span>金沢区ママ</span> など）の支援。
                        </p>
                        <small>
                            主催：金沢区自助連絡協議会 × 株式会社共創
                        </small>
                    </div>
                </div>
            </div>
        </section>

        <style>
            #join .tabs {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: clamp(14px, 2.6vw, 22px);
            }

            @media (max-width:768px) {
                #join .tabs {
                    grid-template-columns: 1fr;
                }
            }

            #join .tabs .card {
                background: #fff;
                border: 1px solid rgba(0, 0, 0, .06);
                border-radius: 16px;
                padding: 20px;
                box-shadow: 0 10px 24px rgba(0, 0, 0, .06);
                transition: transform .18s ease, box-shadow .18s ease;
            }

            #join .tabs .card:hover {
                transform: translateY(-2px);
                box-shadow: 0 14px 32px rgba(0, 0, 0, .12);
            }

            #join .tabs .card h3 {
                margin: 0 0 6px;
                font-weight: 800;
                padding-left: 42px;
                position: relative;
            }

            /* テーマ色（お好みで） */
            #join {
                --ocean: #0B7285;
            }

            /* 見出しの左に“丸＋アイコン”を出す土台 */
            #join .tabs .card h3 {
                position: relative;
                padding-left: 42px;
                /* 丸＋アイコン分の余白 */
            }

            /* 丸い薄背景（以前の絵文字は削除） */
            #join .tabs .card h3::before {
                content: "";
                position: absolute;
                left: 0;
                top: 50%;
                transform: translateY(-50%);
                width: 30px;
                height: 30px;
                border-radius: 999px;
                background: rgba(11, 114, 133, .12);
            }

            /* アイコン本体（SVGをマスクして任意色に） */
            #join .tabs .card h3::after {
                content: "";
                position: absolute;
                left: 6px;
                top: 50%;
                transform: translateY(-50%);
                width: 18px;
                height: 18px;
                background-color: var(--ocean);
                /* ← アイコンの色 */
                /* マスク（両エンジン対応） */
                -webkit-mask: var(--icon) no-repeat center / contain;
                mask: var(--icon) no-repeat center / contain;
            }

            /* それぞれのカードに使うBootstrap Icons（CDNのSVG）を割当て */
            #join .tabs .card:nth-child(1) h3 {
                /* 家庭 */
                --icon: url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/icons/house-door-fill.svg");
            }

            #join .tabs .card:nth-child(2) h3 {
                /* 飲食店 */
                --icon: url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/icons/shop.svg");
            }

            #join .tabs .card:nth-child(3) h3 {
                /* 学校・PTA */
                --icon: url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/icons/mortarboard-fill.svg");
            }

            #join .tabs .card:nth-child(4) h3 {
                /* 自治会・管理組合 */
                --icon: url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/icons/people-fill.svg");
                /* 施設寄りにしたいなら buildings-fill.svg でもOK */
            }
        </style>
        <!-- 参加方法 -->
        <section id="join">
            <div class="container">
                <h2>参加方法</h2>
                <div class="tabs">
                    <div class="card">
                        <h3>ご家庭</h3>
                        <p>冷ました油をペットボトル等の容器に。指定回収日や持込先へ。</p>
                    </div>
                    <div class="card">
                        <h3>飲食店</h3>
                        <p>定期回収をご提案。数量・容器・衛生・領収のルールをご案内。</p>
                    </div>
                    <div class="card" id="school">
                        <h3>学校・PTA</h3>
                        <p>出前授業→回収→使い道決定まで伴走。学びと実践を接続。</p>
                    </div>
                    <div class="card">
                        <h3>自治会・管理組合</h3>
                        <p>拠点回収の設置ガイドをご提供。</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 新着情報 -->
        <section id="cases">
            <div class="container">
                <h2>新着情報</h2>
                <div class="grid grid--3">
                    <div class="card case">
                        <figure class="case-thumb">
                            <img src="image/kacho-fugetsu-volunteer-dayori.jpg" alt="花鳥風月ボランティア便り" loading="lazy" width="1280" height="720">
                        </figure>
                        <h3>2026年2月</h3>
                        <p>横浜市立六浦小学校むつうら花鳥風月ボランティアにて、廃食油常設回収がスタートしました。</p>
                        <a href="{{ asset('pdf/kacho-fugetsu-volunteer-dayori.pdf') }}" target="_blank" rel="noopener noreferrer">詳細を確認する</a>
                    </div>
                    <div class="card case">
                        <figure class="case-thumb">
                            <img src="image/mokuroku.jpg" alt="目録贈呈" loading="lazy" width="1280" height="720">
                        </figure>
                        <h3>2025年12月4日</h3>
                        <p>金沢区自助連絡協議会（自助カナ）総会にて金沢区地域循環油プロジェクトを紹介させていただき、金沢区自助連絡協議会に目録を贈呈しました。</p>
                    </div>
                    <div class="card case">
                        <figure class="case-thumb">
                            <img src="image/radio.png" alt="鶴見小の見学と提案の活動" loading="lazy" width="1280" height="720">
                        </figure>
                        <h3>Circular Economy + RADIO</h3>
                        <p>第36回のゲストとして Circular Economyに出演しました。</p>
                        <a href="https://www.youtube.com/watch?v=2dJnZPDhYwE" target="_blank" rel="noopener noreferrer">番組を聴く</a>
                        </p>
                    </div>
                    <div class="card case">
                        <figure class="case-thumb">
                            <img src="image/中村桂子先生.jpg" alt="中村桂子先生" loading="lazy" width="1280" height="720">
                        </figure>
                        <h3>【中村桂子先生にご面談いただきました】</h3>
                        <p>5年前、新聞で「生命誌絵巻」と中村桂子先生の考えに触れて以来、「人間は自然の一部」という感覚が、自分の行動や判断の土台になりました。<br>
                            私が進めている「地域循環油プロジェクト」も、根っこにあるのはこの考えです。<br>
                            いつか先生に直接お会いしてお話を伺いたい、そう願っていましたが、今日それが叶いました。<br>
                            最近は、心に浮かんだことを一つずつ“かたち”にすることを大切にしています。<br>
                            そして今日から、また新たなスタート。<br>
                            先生から学ばせていただいたことを、これからの活動に落とし込み、地域での小さな循環を、次の世代につながる大きな循環へ育てていきます。</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- 実績 -->
        <style>
            /* グリッド（PC=3列、SP=1列） */
            #cases .grid--3 {
                display: grid;
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: clamp(12px, 2.4vw, 20px);
            }

            @media (max-width: 768px) {
                #cases .grid--3 {
                    grid-template-columns: 1fr;
                }
            }

            /* カードの基本 */
            #cases .card.case {
                display: flex;
                flex-direction: column;
                background: #fff;
                border: 1px solid rgba(0, 0, 0, .06);
                border-radius: 14px;
                overflow: hidden;
                /* 角丸に合わせて画像も切り抜く */
                box-shadow: 0 10px 24px rgba(0, 0, 0, .06);
            }

            /* 1) 比率を変数で統一（16:9 を例。1:1 や 4:3 にしてもOK） */
            #cases {
                --thumb-ratio: 16 / 9;
            }

            #cases .case-thumb {
                display: block;
                /* figureの余計な挙動を防ぐ */
                width: 100%;
                aspect-ratio: var(--thumb-ratio);
                /* ← 全カード同じ比率で揃える */
                overflow: hidden;
                /* 角丸に合わせて切り抜き */
                background: #eef2f5;
                /* プレースホルダー */
            }

            /* 2) 画像は枠いっぱいにフィット＆トリミング */
            #cases .case-thumb img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                /* 余白を作らずカバー */
                object-position: center;
                display: block;
                max-width: none;
                /* リセットの max-width:100% を打ち消す保険 */
            }

            /* 3) 古いブラウザ向けフォールバック（aspect-ratio未対応時） */
            @supports not (aspect-ratio: 1) {
                #cases .case-thumb {
                    position: relative;
                }

                #cases .case-thumb::before {
                    content: "";
                    display: block;
                    padding-top: calc(100% * (9 / 16));
                    /* 16:9。比率を変えたらここも変更 */
                }

                #cases .case-thumb>img {
                    position: absolute;
                    inset: 0;
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }
            }


            /* テキスト余白 */
            #cases .card.case h3 {
                margin: 10px 14px 4px;
                font-weight: 800;
            }

            #cases .card.case p {
                margin: 0 14px 14px;
                line-height: 1.6;
            }

            /* ちょい演出（任意） */
            #cases .card.case:hover {
                transform: translateY(-2px);
                box-shadow: 0 14px 32px rgba(0, 0, 0, .12);
                transition: .18s;
            }
        </style>
        <section id="cases">
            <div class="container">
                <h2>実績と学びの広がり</h2>
                <div class="grid grid--3">
                    <div class="card case">
                        <figure class="case-thumb">
                            <img src="image/fuzigaoka.png" alt="藤が丘小の回収の様子" loading="lazy" width="1280" height="720">
                        </figure>
                        <h3>藤が丘小</h3>
                        <p>317L回収（CO₂0.73t相当）→3,170円で校内緑化を実施。</p>
                    </div>

                    <div class="card case">
                        <figure class="case-thumb">
                            <img src="image/turumi.png" alt="鶴見小の見学と提案の活動" loading="lazy" width="1280" height="720">
                        </figure>
                        <h3>鶴見小</h3>
                        <p>区役所回収の調査・見学→授業→提案へ。行政連携の探究活動。</p>
                    </div>

                    <div class="card case">
                        <figure class="case-thumb">
                            <img src="image/kanazawa.png" alt="金沢区モデルの寄付と教育連携" loading="lazy" width="1280" height="720">
                        </figure>
                        <h3>金沢区モデル</h3>
                        <p>医療・福祉への寄付と教育連携のモデル化を推進。</p>
                    </div>
                </div>
            </div>
        </section>


        <!-- MAP / スケジュール -->
        <style>
            /* カード全体 */
            .map-card {
                padding: 16px;
            }

            /* 上段：場所情報＋写真の2カラム */
            .place-block {
                display: grid;
                grid-template-columns: 1.2fr 1fr;
                gap: 16px;
                align-items: start;
            }

            .place-info h3 {
                margin: 0 0 6px;
                font-weight: 800;
            }

            .place-name {
                font-size: 18px;
                font-weight: 800;
                margin: 2px 0 4px;
            }

            .place-addr {
                margin: 0 0 10px;
                color: #555;
            }

            .place-notes {
                margin: 0 0 12px 1em;
                padding: 0;
            }

            .place-notes li {
                margin-bottom: 6px;
            }

            .place-photo {
                margin: 0;
            }

            .place-photo img {
                width: 100%;
                height: auto;
                border-radius: 8px;
                display: block;
            }

            .place-photo figcaption {
                font-size: 12px;
                color: #666;
                margin-top: 6px;
            }

            /* 下段：スケジュール＋地図 */
            .schedule-and-map {
                display: grid;
                grid-template-columns: 1fr 1.2fr;
                gap: 16px;
                margin-top: 16px;
            }

            .schedule h4 {
                margin: 0 0 8px;
                font-weight: 800;
            }

            .schedule ul {
                margin: 0;
                padding-left: 1.1em;
            }

            .gmap iframe {
                width: 100%;
                height: 280px;
                border: 0;
                border-radius: 8px;
            }

            /* スマホ：縦並びに */
            @media (max-width: 768px) {

                .place-block,
                .schedule-and-map {
                    grid-template-columns: 1fr;
                }
            }
        </style>
        <section id="map">
            <div class="container">
                <h2>ご家庭の廃食油 ~回収ボックス~</h2>

                <div class="card map-card">
                    <!-- 上：場所情報＋写真 -->
                    <div class="place-block">
                        <div class="place-info">

                            <p class="place-name">ルンビニー・つながりの庭</p>
                            <p class="place-addr">住所：横浜市金沢区釜利谷東1-24-8（入口脇にボックス）</p>

                            <ul class="place-notes">
                                <li>冷ました <strong>廃食油</strong> をペットボトルに入れてお持ちください。</li>
                                <li>容器のフタは<strong>しっかり締めて</strong>ください。</li>
                                <li>自転車は園庭に駐輪可。<strong>車はコインパーキング</strong>をご利用ください（路上駐車はご遠慮ください）。</li>
                            </ul>


                        </div>

                        <figure class="place-photo">
                            <!-- 画像パスは実ファイルに差し替えてください -->
                            <img src="image/spot1.png" alt="ルンビニー・つながりの庭の入口脇に設置された青い回収ボックス">
                            <figcaption>※入口脇の青い回収ボックスにお入れください。</figcaption>
                        </figure>
                    </div>
                </div>
                <div class="card map-card">
                    <!-- 上：場所情報＋写真 -->
                    <div class="place-block">
                        <div class="place-info">

                            <p class="place-name">イエローハット 金沢文庫店</p>
                            <p class="place-addr">住所：横浜市金沢区釜利谷東4-1-5</p>

                            <ul class="place-notes">

                            </ul>


                        </div>

                        <figure class="place-photo">
                            <!-- 画像パスは実ファイルに差し替えてください -->
                            <img src="image/spot2.png" alt="イエローハット 金沢文庫店">
                            <figcaption></figcaption>
                        </figure>
                    </div>
                </div>
                <div class="card map-card">
                    <!-- 上：場所情報＋写真 -->
                    <div class="place-block">
                        <div class="place-info">

                            <p class="place-name">ウエノクリーニング各店舗</p>
                            <p class="place-addr"></p>

                            <ul class="place-notes">
                                <li>本店・金沢文庫店・さくらい店・金沢八景店・能見台駅店の<strong>5店舗</strong>にて設置</li>
                            </ul>


                        </div>

                        <figure class="place-photo">
                            <!-- 画像パスは実ファイルに差し替えてください -->
                            <img src="image/spot3.png" alt="ウエノクリーニング各店舗">
                            <figcaption></figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </section>

        <!-- 寄付 -->
        <section id="map">
            <div class="container">
                <h2>ご協力店舗様</h2>

                <div class="card map-card">
                    <!-- 上：場所情報＋写真 -->
                    <div class="">
                        <div class="place-info">

                            <p class="place-name">金沢区自助連絡協議会への寄付をしていただいた飲食店様</p>

                            <ul class="place-notes">
                                ①酒処 全助　<a href="https://tabelog.com/kanagawa/A1401/A140310/14092302/?msockid=3527056973ce697301c0167e7224686b" target="_blank"
                                    rel="noopener noreferrer">酒処全助のご予約 - 金沢文庫/居酒屋 | 食べログ</a><br>
                                ②手羽先番長 金沢文庫駅前店　<a href="http://www.tebaban.com/tenpo.html">手羽先番長｜店舗紹介</a><br>
                                ③ほっかほっか弁当 金沢文庫店　<a href="https://www.bing.com/maps?&q=ほっかほっか亭%20金沢区&filters=segment%3A%22local%22&cp=35.514328~139.618729&lvl=10" target="_blank"
                                    rel="noopener noreferrer">ほっかほっか亭 金沢区 - Bing 地図</a><br>
                                ④そば処居酒屋どん 金沢文庫店　<a href="https://don-kanazawabunko.owst.jp/" target="_blank"
                                    rel="noopener noreferrer">そば処居酒屋どん 金沢文庫店【公式】</a><br>
                                ⑤ゆらい処 まんちゅう　<a href="https://tabelog.com/kanagawa/A1401/A140310/14100692/?msockid=3527056973ce697301c0167e7224686b" target="_blank"
                                    rel="noopener noreferrer">ゆらい処 まんちゅうのご予約 - 金沢文庫/居酒屋 | 食べログ</a><br>
                                ⑥スポーツ酒場 DUGOUT　<a href="https://www.instagram.com/sports.dugout/" target="_blank"
                                    rel="noopener noreferrer">スポーツ酒場　DUGOUT(@sports.dugout) • Instagram写真と動画</a><br>
                            </ul>
                            <p class="place-name">横浜ホスピスうみとそらのおうちへの寄付をしていただいた飲食店様</p>
                            <ul class="place-notes">
                                ①荒川屋ダイニングバー Sandfish食堂　<a href="https://tabelog.com/kanagawa/A1401/A140310/14009790/?msockid=3527056973ce697301c0167e7224686b" target="_blank"
                                    rel="noopener noreferrer">荒川屋ダイニングバ－サンドフィッシュ （Sandfish） - 金沢八景/ダイニングバー | 食べログ</a>
                            </ul>
                            <figure class="place-photo">
                                <figcaption>※ 敬称略</figcaption>
                            </figure>

                        </div>


                    </div>


                </div>
            </div>
        </section>
        <!-- FAQ -->
        <style>
            /* テーマ色（お好みで） */
            #faq {
                --accent: #0B7285;
                --surface: #fff;
                --ring: #4da3ff;
            }

            /* セクション余白 */
            #faq {
                padding-block: clamp(24px, 4vw, 56px);
            }

            /* PC=2列／SP=1列 */
            #faq .faq {
                display: grid;
                gap: clamp(12px, 2.4vw, 18px);
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            @media (max-width:768px) {
                #faq .faq {
                    grid-template-columns: 1fr;
                }
            }

            /* detailsをカード化 */
            #faq .faq details {
                background: var(--surface);
                border: 1px solid rgba(0, 0, 0, .08);
                border-radius: 14px;
                box-shadow: 0 10px 24px rgba(0, 0, 0, .06);
                overflow: hidden;
                /* 角丸を活かす */
            }

            /* 見出し（summary）：大きめのタップ領域＆矢印 */
            #faq .faq summary {
                list-style: none;
                cursor: pointer;
                position: relative;
                padding: 16px 44px 16px 48px;
                /* 左Qバッジ／右矢印の余白 */
                font-weight: 800;
                outline: none;
            }

            #faq .faq summary::-webkit-details-marker {
                display: none;
            }

            /* 左の「Q」バッジ */
            #faq .faq summary::before {
                content: "Q";
                position: absolute;
                left: 14px;
                top: 50%;
                transform: translateY(-50%);
                width: 24px;
                height: 24px;
                border-radius: 999px;
                display: grid;
                place-items: center;
                background: rgba(11, 114, 133, .12);
                color: var(--accent);
                font-weight: 900;
                font-size: 14px;
            }

            /* 右の矢印（Bootstrap Iconsのchevron-down.svgをマスク） */
            #faq .faq summary::after {
                content: "";
                position: absolute;
                right: 14px;
                top: 50%;
                transform: translateY(-50%) rotate(0deg);
                width: 18px;
                height: 18px;
                background-color: var(--accent);
                -webkit-mask: url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/icons/chevron-down.svg") no-repeat center/contain;
                mask: url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/icons/chevron-down.svg") no-repeat center/contain;
                transition: transform .2s ease;
            }

            /* 開いた時の強調＆矢印反転 */
            #faq .faq details[open] summary {
                background: linear-gradient(180deg, rgba(11, 114, 133, .05), transparent 60%);
                border-bottom: 1px solid rgba(0, 0, 0, .06);
            }

            #faq .faq details[open] summary::after {
                transform: translateY(-50%) rotate(180deg);
            }

            /* 答え部分：少しふわっと出す */
            #faq .faq details>p {
                padding: 12px 16px 18px 48px;
                /* Qバッジ位置とそろえる */
                margin: 0;
                line-height: 1.75;
                position: relative;
                opacity: 0;
                transform: translateY(-4px);
                transition: opacity .18s ease, transform .18s ease;
            }

            /* 「A」バッジ（任意・外すなら消してOK） */
            #faq .faq details>p::before {
                content: "A";
                position: absolute;
                left: 14px;
                top: 4px;
                width: 24px;
                height: 24px;
                border-radius: 999px;
                display: grid;
                place-items: center;
                background: var(--accent);
                color: #fff;
                font-weight: 900;
                font-size: 14px;
            }

            #faq .faq details[open]>p {
                opacity: 1;
                transform: none;
            }

            /* アクセシビリティ：キーボード操作の見やすいリング */
            #faq .faq summary:focus-visible {
                outline: 3px solid var(--ring);
                outline-offset: 2px;
            }

            /* 動きを控えめ設定の人にはフェードだけに */
            @media (prefers-reduced-motion: reduce) {
                #faq .faq details>p {
                    transition: opacity .1s ease;
                    transform: none;
                }
            }

            /* 既存の #faq .faq { display:grid; … } を PC では段組みに変更 */
            @media (min-width: 769px) {
                #faq .faq {
                    display: block;
                    /* ← grid をやめる */
                    column-count: 2;
                    /* 2段組みに */
                    column-gap: 18px;
                    /* 段のすき間 */
                }

                #faq .faq details {
                    break-inside: avoid;
                    /* 枠が段で分断されないように */
                    -webkit-column-break-inside: avoid;
                    margin-bottom: 18px;
                    /* 段内の下マージン */
                    width: 100%;
                    box-sizing: border-box;
                }
            }
        </style>
        <section id="faq">
            <div class="container">
                <h2>よくある質問</h2>
                <div class="faq">
                    <details>
                        <summary>どんな油が対象ですか？</summary>
                        <p>天ぷら油・揚げ物油など、ご家庭や飲食店で使用済みの植物油が対象です。ラードなど動物性油脂は不可です。</p>
                    </details>
                    <details>
                        <summary>油はどのように持ち込めばよいですか？</summary>
                        <p>冷ましてからペットボトル等の容器に移し替えてください。キャップをしっかり閉めてください。</p>
                    </details>
                    <details>
                        <summary>回収は無料ですか？</summary>
                        <p>はい、無料です。さらに回収された油量に応じて地域へ循環資金として還元されます。</p>
                    </details>
                    <details>
                        <summary>参加登録は必要ですか？</summary>
                        <p>個人家庭は不要です。飲食店や団体は事前にご相談ください。</p>
                    </details>
                </div>
            </div>
        </section>

        <!-- CONTACT CTA -->
        <style>
            .contact-cta {
                display: flex;
                flex-direction: column;
                /* ← 縦に並べる */
                align-items: center;
                /* ← 水平センター */
                gap: 10px;
                /* ボタンと※の間隔 */
                text-align: center;
                /* テキストも中央寄せ */
                margin: 24px 0;
                /* お好みで余白 */
            }

            .contact-cta .btn {
                display: inline-flex;
                /* ボタン内テキストの中央揃え */
                align-items: center;
                justify-content: center;
            }

            .contact-cta span {
                display: block;
                /* ※ を改行して下に */
                font-size: 12px;
                color: #666;
                /* お好みで薄めに */
            }
        </style>

        <section id="contact">
            <div class="container">
                <h2>お問い合わせ</h2>
                <div class="cta-block">
                    <h3>ご相談・お申込み・出前授業のご依頼はこちら</h3>
                    <p class="contact-cta">
                        <a class="btn btn--primary" target="_blank" rel="noopener" href="https://forms.gle/qqTUBBmjqKwtzvL29">Googleフォームを開く</a>
                        <span>※ 別タブで開きます。確認メールが自動送信されます。</span>
                    </p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <div class="footer-links">
                <a href="https://chiiki-junkanyu.jp/" target="_blank"
                    rel="noopener noreferrer">公式ホームページへ</a>
            </div>
            <small>© 地域循環油プロジェクト（金沢区）</small>
        </div>
    </footer>
</body>

</html>

<script>
    const btn = document.querySelector('.nav-toggle');
    const nav = document.getElementById('global-nav');
    btn.addEventListener('click', () => {
        const open = btn.getAttribute('aria-expanded') === 'true';
        btn.setAttribute('aria-expanded', String(!open)); // ← これでアイコンが≡⇔✕に
        nav?.classList.toggle('is-open', !open); // メニュー本体の開閉（任意）
        document.body.classList.toggle('menu-open', !open);
    });
</script>