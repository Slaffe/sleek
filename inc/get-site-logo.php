<?php
# Add custom logo support
add_theme_support('custom-logo', [
	'header-text' => [get_bloginfo('name'), get_bloginfo('description')]
]);

function sleek_get_site_logo ($inlineSvg = false, $append = '') {
	$alt = get_bloginfo('name');

	if (get_bloginfo('description')) {
		$alt .= ' - ' . get_bloginfo('description');
	}

	# Check custom logo
	if ($customLogoId = get_theme_mod('custom_logo')) {
		$logo = '<img src="' . wp_get_attachment_image_src($customLogoId, 'full')[0] . '" alt="' . $alt . '">';
	}
	# Check site-logo.svg
	elseif ($svgLogo = locate_template('dist/assets/svg/site-logo' . $append . '.svg')) {
		if ($inlineSvg) {
			# TODO: Is aria-label still correct? # TODO: Should I remove <?xml etc?
			$logo = str_replace('<svg', '<svg aria-label="' . $alt . '"', file_get_contents($svgLogo));
		}
		else {
			$logo = '<img src="' . get_stylesheet_directory_uri() . '/dist/assets/svg/site-logo' . $append . '.svg' . '" alt="' . $alt . '">';
		}
	}
	# Check site-logo.png
	elseif (file_exists(get_stylesheet_directory() . '/dist/assets/site-logo.png')) {
		$logo = '<img src="' . get_stylesheet_directory_uri() . '/dist/assets/site-logo' . $append . '.png' . '" alt="' . $alt . '">';
	}
	# Default to text (with <tag> support)
	else {
		$logo = str_replace(['&lt;', '&gt;'], ['<', '>'], get_bloginfo('name'));
	}

	return $logo;
}
