<?php
/***
Display your latest Instagram photos using the Instagram module. First make sure you have installed the WP Instagram Widget plug-in.
***/
return [
	[
		'name' => 'instagram_title',
		'label' => __('Title', 'sleek'),
		'instructions' => __('Enter a title to display above the Instagram feed.', 'sleek'),
		'type' => 'text'
	],
	[
		'name' => 'instagram_description',
		'label' => __('Description', 'sleek'),
		'instructions' => __('Enter a description for the Instagram feed.', 'sleek'),
		'type' => 'wysiwyg'
	],
	[
		'name' => 'instagram_username',
		'label' => __('Instagram username', 'sleek'),
		'instructions' => __('Enter the Instagram username here. Please note that this module requires the WP Instagram Widget plug-in: https://wordpress.org/plugins/wp-instagram-widget/', 'sleek'),
		'type' => 'text'
	],
	[
		'name' => 'instagram_limit',
		'label' => __('Number of images', 'sleek'),
		'instructions' => __('How many images would you like to display?', 'sleek'),
		'type' => 'number',
		'default_value' => 4
	]
];
