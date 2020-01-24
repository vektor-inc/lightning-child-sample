このファイルの最新版は下記になります。

https://github.com/vektor-inc/lightning-child-sample

## 簡単な見た目の調整は下記を参考にしてください

全てのWordPressテーマで使える！デザインをピンポイントで変更する方法 〜親テーマのCSSは書き換えないで

https://www.vektor-inc.co.jp/post/css_customize/

---

## 投稿タイプ毎にサイドバーのファイルを変更する

sidebar-__投稿タイプ名__.php のファイルを作れば適用される

---

## ベースセクションを有効にする

メインコンテンツエリア / サイドバーエリア下の「台紙」を有効にできます。

* Lightning Proの場合はコードを書かなくても有効にしたいページを管理画面から簡単に設定できます。
* Lightning 8 / Pro 3 以降 BS4スキン指定時のみ有効

```php
add_filter( 'lightning_get_the_class_names', 'my_lightning_add_class_baseSection', 16 );
function my_lightning_add_class_baseSection( $class_names ) {
	// 有効にしたいページで条件分岐
	// if ( ! is_front_page() ){
		// セクションベースを有効にする
		$class_names['siteContent'] = $class_names['siteContent'] . ' siteContent-base-on';
		$class_names['mainSection'] = $class_names['mainSection'] . ' mainSection-base-on';
		$class_names['sideSection'] = $class_names['sideSection'] . ' sideSection-base-on';
	// }
	return $class_names;
}
```

---

## 投稿一覧ページのループ部分のカスタマイズ

### A-1. テンプレートファイルで標準レイアウトからカスタマイズする方法

* Lightning Proの場合はコードを書かなくても 外観 > カスタマイズカスタマイズ > Lightningアーカイブ設定 から簡単に設定できます。
* わかりやすいがcoolじゃない手法です

1. 子テーマに template-parts/post/loop-post.php ファイルを作成
2. 親テーマの template-parts/post/loop-layout-media.php の内容をコピーして 1. で複製したファイルに貼り付け
3. 任意に改変

---

### A-2. 特定のカスタム投稿タイプだけ改変する

カスタム投稿タイプのスラッグが event なら

template-parts/post/loop-__event__.php

にすれば event にだけ適用される

---

### A-3-1. カードレイアウトにする

子テーマのループファイルに以下を貼り付け

```php
<?php
$options = array(
	'layout'                     => 'card-horizontal', // card , card-horizontal , media
	'display_image'              => true,
	'display_image_overlay_term' => true,
	'display_excerpt'            => true,
	'display_date'               => true,
	'display_new'                => true,
	'display_btn'                => true,
	'image_default_url'          => false,
	'overlay'                    => false,
	'btn_text'                   => __( 'Read more', 'lightning' ),
	'btn_align'                  => 'text-right',
	'new_text'                   => __( 'New!!', 'lightning' ),
	'new_date'                   => 7,
	'class_outer'                => '',
	'class_title'                => '',
	'body_prepend'               => '',
	'body_append'                => '',
);
wp_kses_post( VK_Component_Posts::the_view( $post, $options ) );
```

#### 利用可能な主なパラメーター

|  パラメーター  |    |
| ---- | ---- |
|  layout  |  card , card-horizontal , media の何れか  |
|  display_***  |  要素の表示非表示制御  |
|  image_default_url | アイキャッチ画像がない時のデフォルト画像の指定 |
|  overlay  | 画像の上にかぶせる要素  |
|  class_outer  |  一つの投稿の外側に追加するclass名  |

---

### A-3-2. 投稿リストの表示カラム数の制御

※ VK_Component_Posts を使う事が前提です

#### A-3-2-1. カラム制御の有効化

まずカラムを有効にするためにはループの外側の要素のclass名を vk_posts に改変する必要があるので下記のコードで改変する

```
add_filter( 'lightning_get_the_class_names', 'my_lightning_class_change_postList', 16 );
function my_lightning_class_change_postList( $class_names ) {
	// if ( get_post_type() === 'post' ){
		// 投稿ループの外側のclass名を改変する
		$class_names['postList'] = 'vk_posts';
	// }
	return $class_names;
}
```

#### A-3-2-1. カラム数指定

画面サイズ毎に何カラムにするか指定できます。識別するクラス名は `vk_post-col-md-6` のようになり、  
.vk_post-col-__表示画面サイズ__-__分割数__ という意味になります。

|  xs  |  sm  |  md  |  lg  |  xl  |
| ---- | ---- | ---- | ---- | ---- |
|  <576px  | ≥576px |  ≥768px  |  ≥992px  |  ≥1200px  |

|  12  |  6  |  4  |  ３  |
| ---- | ---- | ---- | ---- |
|  全幅  | 2分割 |  3分割  |  4分割  |

このクラス名を画面サイズ毎に全て出力します

例）

```
<?php
$options = array(
	'layout'                     => 'card',
	'display_image'              => true,
	'display_image_overlay_term' => true,
	'display_excerpt'            => true,
	'display_date'               => true,
	'display_new'                => true,
	'display_btn'                => true,
	'image_default_url'          => false,
	'overlay'                    => false,
	'btn_text'                   => __( 'Read more', 'lightning' ),
	'btn_align'                  => 'text-right',
	'new_text'                   => __( 'New!!', 'lightning' ),
	'new_date'                   => 7,
	'class_outer'                => 'vk_post-col-xs-12 vk_post-col-sm-6 vk_post-col-md-6 vk_post-col-lg-4 vk_post-col-xl-4',
	'class_title'                => '',
	'body_prepend'               => '',
	'body_append'                => '',
);
wp_kses_post( VK_Component_Posts::the_view( $post, $options ) );
```

---

### A-3-3. カスタムフィールドの値を追加する

VK_Component_Posts::the_view() に投げるパラメーターの body_prepend や body_append に html で指定する事によって出力できる。

body_prepend ... タイトルの前に追加される  
body_append ... 最後に追加される

この body_append などにカスタムフィールドの値を取得して生成したHTMLを追加する  
ここではカスタムフィールド size と weight が既に作ってあるものとする

```
<?php
// 最後に追加するHTMLを変数に入れておく
$append_html  = '<table class="table-sm mt-3">';
$append_html .= '<tr><th>サイズ</th><td>' . esc_html( $post->size ) . '</td></tr>';
$append_html .= '<tr><th>重量</th><td>' . esc_html( $post->weight ) . '</td></tr>';
$append_html .= '</table>';

$options = array(
	'layout'       => 'card',
	'display_date' => false,
	'class_outer'  => 'vk_post-col-xs-12 vk_post-col-sm-6 vk_post-col-md-6 vk_post-col-lg-4 vk_post-col-xl-4',
	'body_prepend' => '',
	'body_append'  => $append_html,
);
wp_kses_post( VK_Component_Posts::the_view( $post, $options ) );
```

---

### B. フックでループを改変する

A では改変するループ部分をテンプレートファイルとして書きましたが、以下の方法を使えば functions.php などだけで改変する事ができます。

```
// 標準のループをオフにする
add_filter( 'is_lightning_extend_loop', 'my_lightning_extend_loop_change' );
function my_lightning_extend_loop_change( $change ) {

	// 現在のページの投稿タイプを取得
	$post_type      = lightning_get_post_type();
	$post_type_slug = $post_type['slug'];

	// 改変する投稿タイプを指定
	if ( $post_type_slug === 'post' ){
		$change = true;
	}
	return $change;

}

// 改変するループを挿入する
add_action( 'lightning_extend_loop', 'my_loop_layout_change' );
function my_loop_layout_change() {

	// 現在のページの投稿タイプを取得
	$post_type      = lightning_get_post_type();
	$post_type_slug = $post_type['slug'];

	// 変更したい投稿タイプだけ処理
	if ( $post_type_slug === 'post' ) {
		global $wp_query;
		// ループ自体のオプション
		$options_loop = array(
			'class_loop_outer' => 'vk_posts-postType-' . $post_type_slug,
		);
		// 一つの投稿のオプション
		$options = array(
			'layout'                     => 'card',
			// 'display_image'              => true,
			// 'display_image_overlay_term' => true,
			// 'display_excerpt'            => true,
			// 'display_date'               => true,
			// 'display_new'                => true,
			// 'display_btn'                => true,
			// 'image_default_url'          => false,
			// 'overlay'                    => false,
			// 'btn_text'                   => __( 'Read more', 'lightning' ),
			// 'btn_align'                  => 'text-right',
			// 'new_text'                   => __( 'New!!', 'lightning' ),
			// 'new_date'                   => 7,
			'class_outer'                => 'vk_post-col-xs-12 vk_post-col-sm-6 vk_post-col-md-6 vk_post-col-lg-6 vk_post-col-xl-6',
			// 'class_title'                => '',
			// 'body_prepend'               => '',
			// 'body_append'                => '',
		);
		VK_Component_Posts::the_loop( $wp_query, $options, $options_loop );
	}
}
```
---

### C. プロ版ユーザーがパラメーターを変更する

これまでのカスタマイズは Lightning Pro なら管理画面から設定できるため必要ありませんが、カスタムフィールドの値を挿入したりする部分などは以下のように追加する事ができます。

* Lightning Pro 3.1.0 / Lightning 8.1.0 〜

```
add_filter( 'vk_post_options', 'my_vk_post_option_custom' );
function my_vk_post_option_custom( $options ){

	// 現在のループの投稿タイプを取得
	$post_type      = lightning_get_post_type();
	$post_type_slug = $post_type['slug'];

	// 改変する投稿タイプを指定
	if ( $post_type_slug === 'post' ){

		// 最後に追加するHTMLを変数に入れておく。
		// ここではカスタムフィールド size と weight の値を取得している。
		global $post;
		$append_html  = '<table class="table-sm mt-3">';
		$append_html .= '<tr><th>サイズ</th><td>' . esc_html( $post->size ) . '</td></tr>';
		$append_html .= '<tr><th>重量</th><td>' . esc_html( $post->weight ) . '</td></tr>';
		$append_html .= '</table>';

		// 最後に追加するHTMLをオプションにセット
		$options['body_append'] = $append_html;

	}

	return $options;
}
```

---

## ページ上部の表示タイトル名を変更

```
add_filter( 'lightning_pageTitCustom','my_page_title_custom' );
function my_page_title_custom($pageTitle){
	// 変更する条件を指定
    if ( is_page() ){ // 固定ページの場合
			// 変更後の名前
      $pageTitle = '変更します';
    }
    return $pageTitle;
}
```


---

## footer カラム数を4カラムに変更

```
// footer カラム数を4カラムに変更
add_filter( 'lightning_footer_widget_area_count','my_footer_change' );
function my_footer_change($footer_widget_area_count){
    $footer_widget_area_count = 4;
    return $footer_widget_area_count;
}
```
---

## <head>タグ内に自分の追加したいタグを追加する

※ JavaScript や css ファイルの場合は enque で読み込んだ方が良い

```
function my_add_wp_head_custom(){ ?>
<!-- head内に書きたいコード -->
<?php }
add_action( 'wp_head', 'my_add_wp_head_custom',1);
```

```
function my_add_wp_footer_custom(){ ?>
<!-- footerに書きたいコード -->
<?php }
add_action( 'wp_footer', 'my_add_wp_footer_custom', 1 );
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
