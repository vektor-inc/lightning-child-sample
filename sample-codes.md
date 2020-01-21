htmlはHTMLブロックに、
CSSは子テーマのstyle.cssなどに記入してください。

## 簡単な見た目の調整は下記を参考にしてください

全てのWordPressテーマで使える！デザインをピンポイントで変更する方法 〜親テーマのCSSは書き換えないで

https://www.vektor-inc.co.jp/post/css_customize/




---

## 特定のカスタム投稿タイプで日付や投稿者情報を非表示にする

```
/* 投稿タイプ「custom」の詳細ページで日付や投稿者名を非表示にする */
.single-custom .entry-meta {  display: none; }

/* 投稿タイプ「custom」のアーカイブページで投稿者名を非表示にする */
.post-type-archive-custom .entry-meta { display: none; }

/* カスタム分類「custom-cat」のアーカイブページで投稿者名を非表示にする
.tax-custom-cat .entry-meta { display: none; }
```
