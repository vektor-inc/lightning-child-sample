<?php
add_filter( 'vk_post_options', 'my_vk_post_option_custom' );
function my_vk_post_option_custom( $options ){

	$post_type      = lightning_get_post_type();
	$post_type_slug = $post_type['slug'];

	// 改変する投稿タイプを指定
	if ( $post_type_slug === 'post' ){

		// 最後に追加するHTMLを変数に入れておく
		$append_html  = '<table class="table-sm mt-3">';
		$append_html .= '<tr><th>サイズ</th><td>' . esc_html( $post->size ) . '</td></tr>';
		$append_html .= '<tr><th>重量</th><td>' . esc_html( $post->weight ) . '</td></tr>';
		$append_html .= '</table>';

		
		// 最後に追加するHTMLをオプションにセット
		$options['overlay'] = $append_html;

	}

	return $options;
}