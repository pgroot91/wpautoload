<?php
/**
 * WP-Autoload
 *
 * @package   WP-Autoload
 * @author    Maksym Denysenko
 * @link      https://github.com/mdenisenko/WP-Autoload
 * @copyright Copyright (c) 2020
 * @license   GPL-2.0+
 * @wordpress-plugin
 */

use WP_Autoload\Autoload;
use WP_Autoload\Cache;

/**
 * Don't use composer on production.
 */
require_once plugin_dir_path( __FILE__ ) . 'classes/class-cache.php';
require_once plugin_dir_path( __FILE__ ) . 'classes/class-exception.php';
require_once plugin_dir_path( __FILE__ ) . 'classes/class-autoload.php';

$prefix  = defined( 'WP_AUTOLOAD_PREFIX' ) ? WP_AUTOLOAD_PREFIX : 'Custom_';
$folders = defined( 'WP_AUTOLOAD_FOLDERS' ) ? WP_AUTOLOAD_FOLDERS : [
	WP_CONTENT_DIR . '/mu-plugins/',
	WP_CONTENT_DIR . '/plugins/',
	WP_CONTENT_DIR . '/themes/',
];
new Autoload( $prefix, $folders, new Cache() );
