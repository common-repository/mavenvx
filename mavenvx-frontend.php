<?php
add_action( 'wp_enqueue_scripts', 'mavenvx_load_js' );

function mavenvx_load_js() {
  if ( mavenvx_check_is_post( ) ) { // Check if it's a post
    $tracking_code = get_option( 'mavenvx_code' );
    $saved_cats = get_option( 'mavenvx_categories' );
    $debug = get_option( 'mavenvx_debug_mode' );
    $cats_satisfy = mavenvx_check_categories( false, $tracking_code, $saved_cats );
    if ( $cats_satisfy ) {
      $maven_script = MAVENVX_JS_URL . $tracking_code;
      $nonce = '0.1';
      if ( ! empty( $debug ) ) {
        if ( $debug === 'yes' ) {
          $nonce = $nonce . '%26debug=true%26mavenvx=test';
        }
      }

      wp_enqueue_script( 'mavenvx-script', $maven_script, array(), $nonce, true );
    }
  }
}

// Adds async=true and comment to identify mavenvx script
add_filter( 'script_loader_tag', 'mavenvx_script_loader', 10, 2 );

function mavenvx_script_loader( $tag, $handle ) {
  if ( 'mavenvx-script' !== $handle ) {
    return $tag;
  } else {
    $tag = str_replace( '<script', '<!-- MavenVX (https://mavenvx.com) -->' . PHP_EOL .'<script', $tag );

    $new_tag = str_replace( ' src', ' data-cfasync="false" async="true" src', $tag );
    $pattern = '/%26debug=true%26mavenvx=test/i';
    $replacement = '&debug=true&mavenvx=' . rand();

    return preg_replace($pattern, $replacement, $new_tag);
  }
}
?>