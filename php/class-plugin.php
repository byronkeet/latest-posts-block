<?php
/**
 * Primary plugin file.
 *
 * @package Block_Boilerplate
 */

namespace Block_Boilerplate;

/**
 * Class Plugin.
 */
class Plugin {
	/**
	 * The plugin's block initializer.
	 *
	 * @var Blocks
	 */
	public $blocks;

	/**
	 * Path to the plugin file relative to the plugins directory.
	 *
	 * @var string
	 */
	public $plugin_file;

	/**
	 * Plugin initializer.
	 *
	 * @param string $plugin_file The plugin's basename.
	 */
	public function init( string $plugin_file ) {
		$this->plugin_file = $plugin_file;
		$this->blocks      = new Blocks();
	}
}
