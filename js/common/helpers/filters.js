wp.hooks.addFilter(
	'blocks.getBlockDefaultClassName',
	'block-boilerplate/block-filters',
	( className, blockName ) => {
		if ( blockName.startsWith( 'block-boilerplate/' ) ) {
			return 'wp-block-block-boilerplate';
		}
		return className;
	}
);
