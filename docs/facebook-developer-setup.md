# Facebook Developer 登録ガイド

## 前提条件

- Facebookアカウント（個人）を持っていること
- 電話番号認証が可能であること
- Facebookページ（ビジネスページ）を作成済みであること

---

## Step 1: Meta for Developers にアクセス

1. [Meta for Developers](https://developers.facebook.com) にアクセス
2. 右上の「**ログイン**」または「**スタート**」ボタンをクリック
3. Facebookアカウントでログイン

---

## Step 2: 開発者アカウントの登録

1. ログイン後、開発者登録画面が表示される
2. 以下の情報を入力:
   - **メールアドレス**: 通知を受け取るメールアドレス
   - **電話番号**: SMS認証用
3. 利用規約に同意
4. 「**登録完了**」ボタンをクリック
5. SMSで届いた認証コードを入力

---

## Step 3: アプリの作成

1. 右上の「**マイアプリ**」をクリック
2. 「**アプリを作成**」ボタンをクリック
3. アプリのユースケースを選択:
   - **ビジネス** を選択（ページへの投稿に必要）
4. アプリ名を入力（例: `haiyu-news-poster`）
5. 連絡先メールアドレスを確認
6. 「**アプリを作成**」をクリック

---

## Step 4: 必要な機能を追加

1. アプリダッシュボードで「**製品を追加**」セクションを探す
2. 以下を追加:
   - **Facebook ログイン**: 認証に必要
   - **Pages API**: ページへの投稿に必要
3. 各製品の「**設定**」をクリックして有効化

---

## Step 5: アクセストークンの取得

### 5-1. Graph API Explorer を開く

1. [Graph API Explorer](https://developers.facebook.com/tools/explorer/) にアクセス
2. 右上で作成したアプリを選択

### 5-2. 必要な権限を追加

「**権限を追加**」から以下を選択:
- `pages_manage_posts` - ページへの投稿
- `pages_read_engagement` - ページの読み取り
- `pages_show_list` - 管理ページ一覧

### 5-3. アクセストークンを生成

1. 「**Generate Access Token**」をクリック
2. Facebookでログインして権限を許可
3. 表示されたトークンをコピーして保存

---

## Step 6: ページアクセストークンの取得

ユーザートークンをページトークンに変換する必要があります。

### Graph API Explorer で以下を実行:

```
GET /me/accounts
```

レスポンスから対象ページの `access_token` を取得します。

---

## Step 7: 長期トークンへの変換（推奨）

短期トークン（約1時間）を長期トークン（約60日）に変換:

```
GET /oauth/access_token
  ?grant_type=fb_exchange_token
  &client_id={app-id}
  &client_secret={app-secret}
  &fb_exchange_token={short-lived-token}
```

**App ID / App Secret の確認方法:**
1. アプリダッシュボード → 「**設定**」→「**ベーシック**」
2. App IDとApp Secretが表示される

---

## 注意事項

| 項目 | 説明 |
|------|------|
| 審査 | 一部の権限は本番利用前にMeta審査が必要 |
| トークン管理 | トークンは安全に保管し、公開リポジトリにコミットしない |
| API バージョン | 定期的にAPIバージョンが更新されるため注意 |
| ページ権限 | 投稿するFacebookページの管理者権限が必要 |

---

## 料金について

### 基本料金

| 項目 | 料金 |
|------|------|
| 開発者アカウント登録 | **無料** |
| アプリ作成 | **無料** |
| Graph API 利用 | **無料** |
| ページへの投稿 | **無料** |

### 無料で利用可能な機能

- Facebookページへの投稿（テキスト・画像・リンク）
- ページ情報の取得
- 投稿のインサイト取得
- コメント・リアクションの管理

### 制限事項

| 制限 | 内容 |
|------|------|
| レート制限 | 1時間あたりのAPI呼び出し回数に上限あり |
| 審査 | 一部の高度な権限はMeta審査が必要 |
| ビジネスアカウント | ページへの投稿にはFacebookページが必須 |

### 費用が発生するケース

- **Facebook広告API**: 広告出稿には広告費用が発生
- **サードパーティツール**: Zapier等の連携ツールを使う場合は別途費用
- **サーバー費用**: 自前でシステム構築する場合のホスティング費用

### 結論

**ページへの自動投稿機能は完全無料で実装可能です。**

ただし、以下の作業コストは発生します：
- 開発者登録・アプリ設定の初期作業
- Laravelへの実装作業
- トークンの定期的な更新管理

---

## 参考リンク

- [Meta for Developers](https://developers.facebook.com)
- [Graph API Explorer](https://developers.facebook.com/tools/explorer/)
- [Graph API ドキュメント](https://developers.facebook.com/docs/graph-api/)
