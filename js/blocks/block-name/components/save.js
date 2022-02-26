/**
 * WordPress dependencies.
 */
const { __ } = wp.i18n;

const Save = ( props ) => {
	const {
		attributes: {
		},
	} = props;

	return (
		<p>{ __( 'Save', 'block-boilerplate' ) }</p>
	);
};

export default Save;
