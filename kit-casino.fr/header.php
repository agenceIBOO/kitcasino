<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
        <link href="<?php echo get_template_directory_uri(); ?>/css/jquery-ui-1.10.1.css" rel="stylesheet" type="text/css"> 
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body onload="initialize()" <?php body_class(); ?>>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;signed_in=true&amp;libraries=places"></script>
		<script>
		// This example displays an address form, using the autocomplete feature
		// of the Google Places API to help users fill in the information.

		var placeSearch, autocomplete;
		var componentForm = {
		street_number: 'short_name',
		route: 'long_name',
		locality: 'long_name',
		administrative_area_level_1: 'short_name',
		country: 'long_name',
		postal_code: 'short_name'
		};

		function initialize() {
		// Create the autocomplete object, restricting the search
		// to geographical location types.
		autocomplete = new google.maps.places.Autocomplete(
		/** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
		{ types: ['geocode'] });
		// When the user selects an address from the dropdown,
		// populate the address fields in the form.
		google.maps.event.addListener(autocomplete, 'place_changed', function() {
		fillInAddress();
		});
		}

		// [START region_fillform]
		function fillInAddress() {
		// Get the place details from the autocomplete object.
		var place = autocomplete.getPlace();

		for (var component in componentForm) {
		document.getElementById(component).value = '';
		document.getElementById(component).disabled = false;
		}

		// Get each component of the address from the place details
		// and fill the corresponding field on the form.
		for (var i = 0; i < place.address_components.length; i++) {
		var addressType = place.address_components[i].types[0];
		if (componentForm[addressType]) {
		var val = place.address_components[i][componentForm[addressType]];
		document.getElementById(addressType).value = val;
		}
		}
		}
		// [END region_fillform]
		</script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="http://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
		<script>
		$(function() {
		$( "#date-picker-input-1" ).datepicker({
		altField: "#datepicker",
		closeText: 'Fermer',
		prevText: 'Précédent',
		nextText: 'Suivant',
		currentText: 'Aujourd\'hui',
		monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
		monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
		dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
		dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
		dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
		weekHeader: 'Sem.',
		dateFormat: 'dd/mm/yy'
		})
		.datepicker('widget').wrap('<div class="ll-skin-melon"/>');
		});
		</script>



			<!-- header -->
			<header class="header clear" role="banner">

					<!-- logo -->
					<div class="logo">
						<a href="<?php echo home_url(); ?>">
							<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
							<img src="<?php echo get_template_directory_uri(); ?>/img/test.jpg" alt="Logo" >
						</a>
					</div>
					<!-- /logo -->

					<!-- nav -->
					<nav class="nav" role="navigation">
						<ul>
							<li><a href="http://www.kit-casino.fr/wordpress/"><img src="<?php echo get_template_directory_uri(); ?>/img/home_off.png" alt="home"> </a></li>
							<li><a href="http://www.kit-casino.fr/wordpress/jeux">Nos jeux</a></li>
							<li><a href="http://www.kit-casino.fr/wordpress/association">L'association</a></li>
							<li><a href="http://www.kit-casino.fr/wordpress/tarifs-devis">Tarifs et devis</a></li>
							<li><a href="http://www.kit-casino.fr/wordpress/contact">Contact</a></li>
						</ul>
					</nav>
					<!-- /nav -->

			</header>
			<!-- /header -->
