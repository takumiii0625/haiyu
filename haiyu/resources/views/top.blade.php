<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>金沢区 地域循環油プロジェクト｜廃食油1L=10円で地域へ循環</title>
    <meta name="description" content="10月1日スタート。家庭・飲食店の廃食油を1L=10円で循環資金化し、金沢区の医療・福祉と子どもたちの学びへ。参加方法・回収マップ・お問い合わせ。">
    <link href="https://unpkg.com/modern-css-reset/dist/reset.min.css" rel="stylesheet">
    <style>
        :root {
            --ocean: #0B7285;
            --leaf: #2F9E44;
            --oil: #F08C00;
            --bg: #F6F9FC;
            --text: #1F2937;
            --ink: #0b5561;
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
            justify-content: space-between;
            height: 60px
        }

        .nav__logo {
            font-weight: 900;
            color: var(--ocean)
        }

        .nav__links a {
            margin-left: 16px;
            color: var(--text);
            text-decoration: none
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
            padding: 56px 0
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

        .contact-cta {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            align-items: center
        }
    </style>
</head>

<body>
    <header>
        <div class="container nav">
            <div class="nav__logo">地域循環油｜金沢区</div>
            <nav class="nav__links">
                <a href="#about">仕組み</a>
                <a href="#join">参加方法</a>
                <a href="#cases">実績</a>
                <a href="#map">回収マップ</a>
                <a href="#contact">お問い合わせ</a>
            </nav>
        </div>
    </header>

    <main>
        <!-- HERO -->
        <section class="hero">
            <div class="container">
                <div class="tag">10/1 START</div>
                <p class="hero__eyebrow">1L=10円で地域へ循環</p>
                <h1>金沢区 地域循環油プロジェクト</h1>
                <p class="hero__sub">家庭・飲食店の廃食油を、医療・福祉と子どもたちの学びへつなぐ。</p>
                <div class="meta">主催：地域循環油プロジェクト（金沢区モデル）／ 寄付先例：横浜ホスピス ほか</div>
                <div class="hero__art"><span>（キービジュアル画像をここに差し替え）</span></div>
                <p style="margin-top:18px;">
                    <a class="btn btn--primary" target="_blank" rel="noopener" href="https://docs.google.com/forms/d/REPLACE_WITH_YOUR_FORM_ID/viewform?usp=pp_url&utm_source=lp&utm_medium=cta&utm_campaign=kanazawa">お問い合わせ（Googleフォーム）</a>
                </p>
            </div>
        </section>

        <!-- ABOUT / 3C -->
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
                        <p>出前授業で“循環者”を育成。子ども主体で集め、使い道も自分たちで決める。</p>
                    </div>
                    <div class="card">
                        <h3>Community</h3>
                        <p>回収活動が関係をつなぎ、防災・減災にも寄与。地域で続けられる仕組み。</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 金沢区モデル -->
        <section id="kanazawa">
            <div class="container">
                <h2>金沢区モデルの仕組み（10/1開始）</h2>
                <div class="flow">
                    <div class="card"><strong>1. 集める</strong>
                        <p>家庭・飲食店から廃食油を回収。</p>
                    </div>
                    <div class="card"><strong>2. 換金</strong>
                        <p>回収量に応じて <strong>1L=10円</strong> を循環資金に。</p>
                    </div>
                    <div class="card"><strong>3. 還元</strong>
                        <p>資金を地域の医療・福祉へ寄付。教育連携も。</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 参加方法 -->
        <section id="join">
            <div class="container">
                <h2>参加方法</h2>
                <div class="tabs">
                    <div class="card">
                        <h3>家庭</h3>
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
                        <p>拠点回収の設置ガイドやポスター素材をご提供。</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 実績 -->
        <section id="cases">
            <div class="container">
                <h2>実績と学びの広がり</h2>
                <div class="grid grid--3">
                    <div class="card">
                        <h3>藤が丘小</h3>
                        <p>317L回収（CO₂0.73t相当）→3,170円で校内緑化を実施。</p>
                    </div>
                    <div class="card">
                        <h3>鶴見小</h3>
                        <p>区役所回収の調査・見学→授業→提案へ。行政連携の探究活動。</p>
                    </div>
                    <div class="card">
                        <h3>金沢区モデル</h3>
                        <p>医療・福祉への寄付と教育連携のモデル化を推進。</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- MAP / スケジュール -->
        <section id="map">
            <div class="container">
                <h2>回収スケジュール & マップ</h2>
                <div class="card">
                    <p>（ここに回収カレンダーとGoogleマップの埋め込みを実装予定）</p>
                    <ul>
                        <li>例）毎月第◯◯曜日：区役所前 特設回収</li>
                        <li>例）随時：JA支店／団地集会所 ほか</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- FAQ -->
        <section id="faq">
            <div class="container">
                <h2>よくある質問</h2>
                <div class="faq">
                    <details>
                        <summary>どんな油が対象ですか？</summary>
                        <p>天ぷら油・揚げ物油など、家庭や飲食店で使用済みの植物油が対象です。ラードなど動物性油脂は不可です。</p>
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
        <section id="contact">
            <div class="container">
                <h2>お問い合わせ</h2>
                <div class="cta-block">
                    <h3>ご相談・お申込み・出前授業のご依頼はこちら</h3>
                    <p class="contact-cta">
                        <a class="btn btn--primary" target="_blank" rel="noopener" href="https://docs.google.com/forms/d/REPLACE_WITH_YOUR_FORM_ID/viewform?usp=pp_url&utm_source=lp&utm_medium=footer_cta&utm_campaign=kanazawa">Googleフォームを開く</a>
                        <span>※ 別タブで開きます。確認メールが自動送信されます。</span>
                    </p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <div class="footer-links">
                <a href="#">プライバシー</a>
                <a href="#">利用規約</a>
                <a href="#contact">お問い合わせ</a>
            </div>
            <small>© 地域循環油プロジェクト（金沢区）</small>
        </div>
    </footer>
</body>

</html>