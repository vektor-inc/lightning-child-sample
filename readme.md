htmlはHTMLブロックに、
CSSは子テーマのstyle.cssなどに記入してください。

## 簡単な見た目の調整は下記を参考にしてください

全てのWordPressテーマで使える！デザインをピンポイントで変更する方法 〜親テーマのCSSは書き換えないで

https://www.vektor-inc.co.jp/post/css_customize/

---

### セクションベースの制御

```
add_filter( 'lightning_get_the_class_names', 'my_lightning_add_class_baseSection', 16 );
function my_lightning_add_class_baseSection( $class_names ) {
	// if ( is_page ){
		// セクションベースを有効にする
		$class_names['siteContent'] = $class_names['siteContent'] . ' siteContent-base-on';
		$class_names['mainSection'] = $class_names['mainSection'] . ' mainSection-base-on';
		$class_names['sideSection'] = $class_names['sideSection'] . ' sideSection-base-on';
	// }
	return $class_names;
}
```

### footer カラム数を4カラムに変更

```
// footer カラム数を4カラムに変更
add_filter( 'lightning_footer_widget_area_count','my_footer_change' );
function my_footer_change($footer_widget_area_count){
    $footer_widget_area_count = 4;
    return $footer_widget_area_count;
}
```

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
