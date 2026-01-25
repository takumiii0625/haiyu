# News投稿時のFacebook自動投稿 実装手順

## 概要

Webサイトにnews（新着情報）を投稿した際に、Facebookページへ自動的に投稿される機能を実装する手順です。

---

## 全体の流れ

```
1. Facebook Developer 登録
      ↓
2. Facebookアプリ作成
      ↓
3. アクセストークン取得
      ↓
4. Laravel側の実装
      ↓
5. 動作確認・本番運用
```

---

## Phase 1: Facebook Developer 登録

### Step 1-1: Meta for Developers にアクセス

1. [Meta for Developers](https://developers.facebook.com) にアクセス
2. 右上の「**ログイン**」または「**スタート**」をクリック
3. Facebookアカウントでログイン

### Step 1-2: 開発者アカウントの登録

1. 開発者登録画面で以下を入力:
   - メールアドレス
   - 電話番号（SMS認証用）
2. 利用規約に同意
3. 「**登録完了**」をクリック
4. SMSで届いた認証コードを入力

---

## Phase 2: Facebookアプリ作成

### Step 2-1: アプリを作成

1. 右上の「**マイアプリ**」をクリック
2. 「**アプリを作成**」をクリック
3. ユースケース: **ビジネス** を選択
4. アプリ名を入力（例: `haiyu-news-poster`）
5. 「**アプリを作成**」をクリック

### Step 2-2: 必要な機能を追加

1. アプリダッシュボードで「**製品を追加**」を探す
2. 以下を追加:
   - **Facebook ログイン**
   - **Pages API**

---

## Phase 3: アクセストークン取得

### Step 3-1: Graph API Explorer を開く

1. [Graph API Explorer](https://developers.facebook.com/tools/explorer/) にアクセス
2. 作成したアプリを選択

### Step 3-2: 権限を追加

「**権限を追加**」から以下を選択:

- `pages_manage_posts`
- `pages_read_engagement`
- `pages_show_list`

### Step 3-3: トークンを生成

1. 「**Generate Access Token**」をクリック
2. Facebookでログインして権限を許可
3. トークンをコピー

### Step 3-4: ページアクセストークンを取得

Graph API Explorer で実行:

```
GET /me/accounts
```

レスポンスから対象ページの `access_token` と `id` を取得して保存。

### Step 3-5: 長期トークンに変換（推奨）

```
GET /oauth/access_token
  ?grant_type=fb_exchange_token
  &client_id={App ID}
  &client_secret={App Secret}
  &fb_exchange_token={短期トークン}
```

---

## Phase 4: Laravel側の実装

### Step 4-1: 環境変数を設定

`.env` ファイルに追加:

```env
FACEBOOK_PAGE_ID=xxxxxxxxxxxxxxxxx
FACEBOOK_PAGE_ACCESS_TOKEN=xxxxxxxxxxxxxxxx
```

### Step 4-2: Newsモデル・マイグレーション作成

```bash
php artisan make:model News -m
```

マイグレーションファイル:

```php
Schema::create('news', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('content');
    $table->string('image')->nullable();
    $table->boolean('posted_to_facebook')->default(false);
    $table->timestamps();
});
```

### Step 4-3: Facebook投稿サービス作成

`app/Services/FacebookService.php`:

```php
<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FacebookService
{
    protected string $pageId;
    protected string $accessToken;

    public function __construct()
    {
        $this->pageId = config('services.facebook.page_id');
        $this->accessToken = config('services.facebook.access_token');
    }

    public function postToPage(string $message, ?string $link = null): array
    {
        $url = "https://graph.facebook.com/v19.0/{$this->pageId}/feed";

        $params = [
            'message' => $message,
            'access_token' => $this->accessToken,
        ];

        if ($link) {
            $params['link'] = $link;
        }

        $response = Http::post($url, $params);

        return $response->json();
    }
}
```

### Step 4-4: 設定ファイルに追加

`config/services.php`:

```php
'facebook' => [
    'page_id' => env('FACEBOOK_PAGE_ID'),
    'access_token' => env('FACEBOOK_PAGE_ACCESS_TOKEN'),
],
```

### Step 4-5: News作成時に自動投稿

コントローラーまたはObserverで実装:

```php
use App\Services\FacebookService;

// News保存後に実行
$facebook = new FacebookService();
$facebook->postToPage(
    $news->title . "\n\n" . $news->content,
    url('/news/' . $news->id)
);
```

---

## Phase 5: 動作確認・本番運用

### Step 5-1: テスト投稿

1. 開発環境でnewsを作成
2. Facebookページに投稿されるか確認
3. エラーがあればログを確認

### Step 5-2: 本番運用の注意点

| 項目 | 対応 |
|------|------|
| トークン期限 | 60日ごとに更新が必要 |
| エラーハンドリング | API失敗時のリトライ処理を実装 |
| ログ記録 | 投稿成功/失敗をログに記録 |
| 審査申請 | 必要に応じてMeta審査を申請 |

---

## ファイル構成（実装後）

```
haiyu/
├── .env                          # Facebook認証情報
├── config/
│   └── services.php              # Facebook設定
├── app/
│   ├── Models/
│   │   └── News.php              # Newsモデル
│   ├── Services/
│   │   └── FacebookService.php   # Facebook API連携
│   └── Http/Controllers/
│       └── NewsController.php    # News管理
└── database/migrations/
    └── xxxx_create_news_table.php
```

---

## 料金

| 項目 | 料金 |
|------|------|
| Facebook API | **無料** |
| 開発者登録 | **無料** |
| アプリ作成 | **無料** |

---

## 参考リンク

- [Meta for Developers](https://developers.facebook.com)
- [Graph API Explorer](https://developers.facebook.com/tools/explorer/)
- [Pages API ドキュメント](https://developers.facebook.com/docs/pages-api/)
- [Graph API リファレンス](https://developers.facebook.com/docs/graph-api/)
