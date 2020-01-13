( function( api ) {

	// Extends our custom "theme-info" section.
	api.sectionConstructor['theme-info'] = api.Section.extend(
		{

				// No events for this type of section.
			attachEvents: function () {},

				// Always make the section active.
			isContextuallyActive: function () {
				return true;
			}
		}
	);

	// Extends our custom "upsell-frontpage-sections" section.
	api.sectionConstructor['upsell-frontpage-sections'] = api.Section.extend(
		{

				// No events for this type of section.
			attachEvents: function () {},

				// Always make the section active.
			isContextuallyActive: function () {
				return true;
			}
		}
	);

} )( wp.customize );
