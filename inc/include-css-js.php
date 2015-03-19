<?php
# Theme CSS/JS
# add_action('wp_enqueue_scripts', 'sleek_register_css_js');

function sleek_register_css_js () {
	# jQuery
#	wp_deregister_script('jquery');
#	wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js'); # 2.0.0

#	wp_register_script('jquery_migrate', 'http://code.jquery.com/jquery-migrate-1.1.0.js', array('jquery'));
#	wp_enqueue_script('jquery_migrate');

	# Google Maps
#	wp_register_script('google_maps', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false');
#	wp_enqueue_script('google_maps');

	# Theme Head/Foot JS
#	wp_register_script('sleek_head', get_template_directory_uri() . '/js/head.php', array(), filemtime(TEMPLATEPATH . '/js/head.js'));
#	wp_enqueue_script('sleek_head');

#	wp_register_script('sleek_foot', get_template_directory_uri() . '/js/foot.php', array(), filemtime(TEMPLATEPATH . '/js/foot.js'), true);
#	wp_enqueue_script('sleek_foot');

	# Theme CSS
#	wp_register_style('sleek', get_template_directory_uri() . '/css/all.css', array(), filemtime(TEMPLATEPATH . '/css/all.css'));
#	wp_enqueue_style('sleek');
}

# Admin CSS/JS
# add_action('admin_enqueue_scripts', 'sleek_register_css_js_admin');

function sleek_register_css_js_admin () {
	# Admin JS
	wp_register_script('sleek_admin', get_template_directory_uri() . '/js/admin.js', array('jquery'), filemtime(TEMPLATEPATH . '/js/admin.js'));
	wp_enqueue_script('sleek_admin');

	# Admin CSS
	wp_register_style('sleek_admin', get_template_directory_uri() . '/css/admin.css', array(), filemtime(TEMPLATEPATH . '/css/admin.css'));
	wp_enqueue_style('sleek_admin');
}

# Upgrade Browser Script
# add_action('wp_head', 'sleek_register_browser_update_js');

function sleek_register_browser_update_js () {
	echo str_replace(array("\n", "\t"), '', '<script>
		var $buoop = {};

		$buoop.ol = window.onload;

		window.onload = function () {
			try {
				if ($buoop.ol) $buoop.ol();
			}
			catch (e) {
			}

			var e = document.createElement("script");

			e.setAttribute("type", "text/javascript");
			e.setAttribute("src", "http://browser-update.org/update.js");
			document.body.appendChild(e);
		};
	</script>');
}
