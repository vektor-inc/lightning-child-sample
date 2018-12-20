htmlはHTMLブロックに、
CSSは子テーマのstyle.cssなどに記入してください。

## 簡単な見た目の調整は下記を参考にしてください

全てのWordPressテーマで使える！デザインをピンポイントで変更する方法 〜親テーマのCSSは書き換えないで

https://www.vektor-inc.co.jp/post/css_customize/


## スタッフ紹介

### html


```
<div class="staff-outline">
<div class="staff-outline-text">
<h2 class="staff-name">
山田 太郎
<span class="toruna">Yamada Tarou</span>
</h2>
<div class="staff-position">株式会社ベクトル 代表取締役</div>
<h3 class="staff-profile-title">プロフィール</h3>
<p>名古屋のウェブ制作会社数社に10年程度務めた後、株式会社ベクトル設立。
企画・運営・コンサルティング〜WordPressを中心としたシステム開発まで幅広く携わる。</p>
<p>
[ 著書 ]<br>
・いちばんやさしいWordPressの教本（共著）<br>
・現場でかならず使われているWordPressデザインのメソッド（共著）</p>
</div><!-- [ /.staff-outline-text ] -->
<div class="staff-outline-photo">
<img src="https://www.vektor-inc.co.jp/data/photo_ishikawa.jpg" alt="石川栄和" />
</div>
</div>
<div class="staff-profile-table">
<dl>
<dt>出身地</dt>
<dd>愛知県海部郡</dd>
</dl>
<dl>
<dt>行ってみたい場所</dt>
<dd>世界の秘境、地中海の船旅</dd>
</dl>
<dl>
<dt>好きな言葉</dt>
<dd>できるできないではない。やるんだ。<br>
できない事が失敗ではない。できるまでやり続けられなかった事が失敗である。</dd>
</dl>
<dl>
<dt>趣味</dt>
<dd>スケートボード / スプラトゥーン２ / 最近たまに将棋</dd>
</dl>
</div>
```

### css

```

/*-------------------------------------------*/
/* スタッフ紹介
/*-------------------------------------------*/
.staff-outline {
	display: table;
}

.staff-outline-text {
	display: table-cell;
	vertical-align: top;
	width: 60%;
}

.staff-outline-text .staff-name {
	font-family: "ＭＳ Ｐ明朝", "MS PMincho","ヒラギノ明朝 Pro W3", "Hiragino Mincho Pro", "serif";
	border-bottom: none;
	box-shadow: none;
	font-size: 9vw;
	margin-bottom: 1rem;
	padding-bottom: 0;
	line-height: 1.0;
	border: none;
	padding: 0;
	background-color: transparent;
}

.staff-outline-text .staff-name::after {
	border: none;
}

.staff-outline-text .staff-name span {
	font-size: 14px;
	display: block;
	margin-top: 0.5em;
	margin-left: 5px;
	letter-spacing: 5px;
	color: #008a32;
}

.staff-outline-text .staff-position {
	font-size: 12px;
	line-height: 1.6em;
	font-family: "ＭＳ Ｐ明朝", "MS PMincho","ヒラギノ明朝 Pro W3", "Hiragino Mincho Pro", "serif";
}

.staff-outline-text .staff-profile-title {
	font-size: 16px;
	padding-top: 0;
	padding-left: 0;
	padding-bottom: 2px;
	margin-bottom: 1.2rem;
	border-top: none;
	border-bottom: 1px solid #ccc;
}

.staff-outline-text p {
	font-size: 14px;
}

.staff-outline-photo img {
	width: 80%;
	margin: 0 0 0 auto;
	display: block;
	border: 4px solid #efefef;
}

.staff-profile-table {
	margin-top: 2em;
	margin-bottom: 80px;
	border: none;
}

.staff-profile-table dl {
	display: table;
	width: 100%;
}

.staff-profile-table dt,
.staff-profile-table dd {
	display: table-cell;
	border-bottom: 1px solid #ccc;
	padding-left: 10px;
	font-size: 14px;
	padding-bottom: 4px;
}

.staff-profile-table dl {
	margin: 0 0 1rem;
}

.staff-profile-table dt {
	background: none;
	font-weight: lighter;
	border-left-width: 2px;
	border-left-style: solid;
	width: 30%;
}

.staff-profile-table dd {
	border-left: none;
	width: 70%;
}

@media (min-width: 768px) {

.staff-outline-text .staff-name {
	font-size: 5rem;
}

}
```


## 特定のカスタム投稿タイプで日付や投稿者情報を非表示にする

```
/* 投稿タイプ「custom」の詳細ページで日付や投稿者名を非表示にする */
.single-custom .entry-meta {  display: none; }

/* 投稿タイプ「custom」のアーカイブページで投稿者名を非表示にする */
.post-type-archive-custom .entry-meta { display: none; }

/* カスタム分類「custom-cat」のアーカイブページで投稿者名を非表示にする
.tax-custom-cat .entry-meta { display: none; }
```
