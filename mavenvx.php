<?php
/**
 * Plugin Name: MavenVX
 * Plugin URI: https://mavenvx.com
 * Description: MavenVX is the simplest way to drive revenue uplift and keep your readers engaged longer using video
 * Version: 1.0.0
 * Author: MavenVX <support@mavenvx.com>
 * Author URI: https://mavenvx.com
 * License: GPLv2 or later
 */
defined( 'ABSPATH' ) or die( 'Not WP' );

define( 'MAVENVX_JS_URL', 'https://js.retailmaven.co/' );
define( 'MAVENVX_API_URL', 'https://api.retailmaven.co' );
define( 'MAVENVX_PATH', dirname( __FILE__ ) );

// Include files
include_once( MAVENVX_PATH . '/mavenvx-helpers.php');
include_once( MAVENVX_PATH . '/mavenvx-admin.php');
include_once( MAVENVX_PATH . '/mavenvx-frontend.php');
include_once( MAVENVX_PATH . '/mavenvx-article-publish.php');
?>
