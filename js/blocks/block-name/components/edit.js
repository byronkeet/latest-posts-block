/**
 * WordPress dependencies.
 */
const { __ } = wp.i18n;

const Edit = ( props ) => {
	const {
		attributes: {
		},
	} = props;

	return (
		<p>{ __( 'Edit', 'block-boilerplate' ) }</p>
	);
};

export default Edit;
