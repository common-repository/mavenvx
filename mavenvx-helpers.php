<?php
// Helper functions
/**
 * Check categories match with the admin selection
 *
 * @return Boolean
 */
function mavenvx_check_categories( $id, $tracking_code = '', $site_cats = NULL ) {
  if ( !empty( $tracking_code ) && !empty( $site_cats ) ) {
    $cats_satisfy = false;
    $saved_cats = explode( ',', $site_cats );
    $categories = get_the_category( $id );
    if (!empty( $categories )) {
      foreach ( $saved_cats as $catId ) {
        foreach( $categories as $cat ) {
          if ( $cat->cat_ID === intval( $catId ) ) {
            $cats_satisfy = true;
            break;
          }
        }
      }
    }

    return $cats_satisfy;
  }
}

/**
 * Check if should post. If otherwise e.g. archive, return false
 *
 * @return Boolean
 */
function mavenvx_check_is_post( ) {
  $pos = strpos(strtolower($_SERVER["REQUEST_URI"]), "preview=true");

  if ( is_single( )
  && !is_preview( )
  && !$pos
  && !is_attachment( )
  && !is_archive( )
  && !is_home( )
  && !is_front_page( ) ) {
    return true;
  } else {
    return false;
  }
}
?>