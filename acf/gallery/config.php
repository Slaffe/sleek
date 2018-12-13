<?php
/***
Use the Gallery module to add any number of images to the page.
***/
return [
	[
		'name' => 'gallery_title',
		'label' => __('Title', 'sleek'),
		'instructions' => __('Enter a title to display above the gallery.', 'sleek'),
		'type' => 'text'
	],
	[
		'name' => 'gallery_description',
		'label' => __('Description', 'sleek'),
		'instructions' => __('Enter a description for the gallery.', 'sleek'),
		'type' => 'wysiwyg'
	],
	[
		'name' => 'gallery_images',
		'label' => __('Images', 'sleek'),
		'instructions' => __('Select any number of images.', 'sleek'),
		'type' => 'gallery'
	]
];
