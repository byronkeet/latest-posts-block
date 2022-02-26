<?php
/**
 * Plugin Name: Block Boilerplate
 * Plugin URI: https://github.com/byronkeet/block-boilerplate/
 * Description: A complete ecommerce solution in a single block.
 * Author: Block Boilerplate
 * Author URI: https://github.com/byronkeet/
 * Version: 1.0.0
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package Block_Boilerplate
 */

use Block_Boilerplate\Plugin;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get plugin version.
 *
 * @return string
 */
function block_boilerplate_version(): string {
	return '1.0.0';
}

/**
 * Block Initializer.
 */
require_once plugin_dir_path( __FILE__ ) . 'php/class-plugin.php';
require_once plugin_dir_path( __FILE__ ) . 'php/class-blocks.php';

/**
 * Return an instance of the Block Boilerplate plugin.
 *
 * @return Plugin
 */
function block_boilerplate(): Plugin {
	static $instance;

	if ( null === $instance ) {
		$instance = new Plugin();
	}

	return $instance;
}

block_boilerplate()->init( plugin_basename( __FILE__ ) );
