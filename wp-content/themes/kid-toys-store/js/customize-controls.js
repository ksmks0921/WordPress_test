( function( api ) {

	// Extends our custom "kid-toys-store" section.
	api.sectionConstructor['kid-toys-store'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );