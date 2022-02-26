<?php
/**
 * Blocks Initializer
 *
 * @package Block_Boilerplate
 */

namespace Block_Boilerplate;

/**
 * Block initializer class. Enqueue CSS/JS of all the blocks.
 */
class Blocks {
	/**
	 * The plugin's block namespace.
	 *
	 * @var string
	 */
	const BLOCK_NAMESPACE = 'block-boilerplate';

	/**
	 * The blocks to register.
	 *
	 * @var array
	 */
	const BLOCK_SLUGS = [
		'block-stripe',
	];

	/**
	 * Blocks constructor.
	 */
	public function __construct() {
		add_filter( 'block_categories', [ $this, 'block_categories' ] );
		add_action( 'init', [ $this, 'block_assets' ] );
	}

	/**
	 * Create a custom block category
	 *
	 * @param array $categories List of current categories.
	 *
	 * @return array
	 */
	public function block_categories( array $categories ): array {
		return array_merge(
			$categories,
			[
				[
					'slug'  => 'ecommerce',
					'title' => __( 'Ecommerce', 'block-boilerplate' ),
				],
			]
		);
	}

	/**
	 * Enqueue Gutenberg block assets for both frontend + backend.
	 *
	 * Assets enqueued:
	 * 1. blocks.style.build.css - Frontend + Backend.
	 * 2. blocks.build.js - Backend.
	 * 3. blocks.editor.build.css - Backend.
	 *
	 * @uses {wp-blocks} for block type registration & related functions.
	 * @uses {wp-element} for WP Element abstraction — structure of blocks.
	 * @uses {wp-i18n} to internationalize the block's text.
	 * @uses {wp-editor} for WP editor styles.
	 */
	public function block_assets() {
		$version = block_boilerplate_version();

		// Register block styles for both frontend + backend.
		wp_register_style(
			'block-boilerplate-style-css',
			plugins_url( '/build/style.css', dirname( __FILE__ ) ),
			is_admin() ? [ 'wp-editor' ] : null,
			$version
		);

		// Register block editor styles for backend.
		wp_register_style(
			'block-boilerplate-editor-css', // Handle.
			plugins_url( '/build/editor.css', dirname( __FILE__ ) ),
			[ 'wp-edit-blocks' ],
			$version
		);

		// Register block editor script for backend.
		wp_register_script(
			'block-boilerplate-block-js',
			plugins_url( '/build/blocks.js', dirname( __FILE__ ) ),
			[ 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ],
			$version,
			true
		);

		wp_localize_script(
			'block-boilerplate-block-js',
			'blockBoilerplateAllowedBlockTypes',
			block_boilerplate()->blocks::BLOCK_SLUGS
		);

		$this->register_block_types();
	}

	/**
	 * Register the blocks.
	 */
	public function register_block_types() {
		$block_type_args = [
			'style'         => 'block-boilerplate-style-css',
			'editor_style'  => 'block-boilerplate-editor-css',
			'editor_script' => 'block-boilerplate-block-js',
		];

		/**
		 * Register Gutenberg block on server-side.
		 *
		 * Register the block on server-side to ensure that the block
		 * scripts and styles for both frontend and backend are
		 * enqueued when the editor loads.
		 *
		 * @link https://wordpress.org/gutenberg/handbook/blocks/writing-your-first-block-type#enqueuing-block-scripts
		 */
		foreach ( block_boilerplate()->blocks::BLOCK_SLUGS as $block_slug ) {
			$namespace = self::BLOCK_NAMESPACE;
			register_block_type( "$namespace/$block_slug", $block_type_args );
		}
	}
}
