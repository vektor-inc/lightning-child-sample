<?php


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








/*
  カスタム投稿タイプ「イベント情報」を追加
/*
-------------------------------------------*/
// add_action( 'init', 'add_post_type_event', 0 );
// function add_post_type_event() {
// register_post_type( 'event', /* カスタム投稿タイプのスラッグ */
// array(
// 'labels' => array(
// 'name' => 'イベント情報',
// ),
// 'public' => true,
// 'has_archive' => true,
// 'supports' => array('title','editor','excerpt','thumbnail','author')
// )
// );
// }

/*
-------------------------------------------*/
/*
  カスタム分類「イベント情報カテゴリー」を追加
/*
-------------------------------------------*/
// add_action( 'init', 'add_custom_taxonomy_event', 0 );
// function add_custom_taxonomy_event() {
// register_taxonomy(
// 'event-cat', /* カテゴリーの識別子 */
// 'event', /* 対象の投稿タイプ */
// array(
// 'hierarchical' => true,
// 'update_count_callback' => '_update_post_term_count',
// 'label' => 'イベントカテゴリー',
// 'singular_label' => 'イベント情報カテゴリー',
// 'public' => true,
// 'show_ui' => true,
// )
// );
// }

/********* 備考1 **********
Lightningはカスタム投稿タイプを追加すると、
作成したカスタム投稿タイプのサイドバー用のウィジェットエリアが自動的に追加されます。
プラグイン VK All in One Expansion Unit のウィジェット機能が有効化してあると、
VK_カテゴリー/カスタム分類ウィジェット が使えるので、このウィジェットで、
今回作成した投稿タイプ用のカスタム分類を設定したり、
VK_アーカイブウィジェット で、今回作成したカスタム投稿タイプを指定する事もできます。

/********* 備考2 **********
カスタム投稿タイプのループ部分やサイドバーをカスタマイズしたい場合は、
下記の命名ルールでファイルを作成してアップしてください。
module_loop_★ポストタイプ名★.php
 */

/*
-------------------------------------------*/
/*
  フッターのウィジェットエリアの数を増やす
/*
-------------------------------------------*/
// add_filter('lightning_footer_widget_area_count','lightning_footer_widget_area_count_custom');
// function lightning_footer_widget_area_count_custom($footer_widget_area_count){
// $footer_widget_area_count = 4; // ← 1~4の半角数字で設定してください。
// return $footer_widget_area_count;
// }
