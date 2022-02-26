/**
 * BLOCK: Block Name
 */

/**
 * WordPress dependencies.
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;

/**
 * Internal dependencies.
 */
import Edit from './components/edit';
import Save from './components/save';

/**
 * Registers this as a block.
 *
 * @see https://wordpress.org/gutenberg/handbook/block-api/
 * @param {string} name     Block name.
 * @param {Object} settings Block settings.
 * @return {?WPBlock}          The block, if it has been successfully
 *                             registered; otherwise `undefined`.
 */
registerBlockType( 'block-boilerplate/block-stripe', {
	title: __( 'Block Name', 'block-boilerplate' ),
	description: __( 'Block description', 'block-boilerplate' ),
	icon: 'generic',
	category: 'common',
	keywords: [ __( 'keyword1', 'block-boilerplate' ), __( 'keyword2', 'block-boilerplate' ), __( 'keyword3', 'block-boilerplate' ) ],
	attributes: {},

	/* Render the block components. */
	edit: ( props ) => {
		return <Edit { ...props } />;
	},

	/* Save the block markup. */
	save: ( props ) => {
		return <Save { ...props } />;
	},
} );
