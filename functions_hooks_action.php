<?php

/*-------------------------------------------*/
/*  <head>タグ内に自分の追加したいタグを追加する
/*-------------------------------------------*/
function my_add_wp_head_custom(){ ?>
<!-- head内に書きたいコード -->
<?php }
add_action( 'wp_head', 'my_add_wp_head_custom',1);

function my_add_wp_footer_custom(){ ?>
<!-- footerに書きたいコード -->
<?php }
add_action( 'wp_footer', 'my_add_wp_footer_custom', 1 );
