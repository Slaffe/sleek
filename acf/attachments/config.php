<?php
/***
The Attachments module allows you to add any number of files for download.
***/
return [
	[
		'name' => 'attachments-title',
		'label' => __('Title', 'sleek'),
		'instructions' => __('Enter a title to display above the attachments.', 'sleek'),
		'type' => 'text'
	],
	[
		'name' => 'attachments-description',
		'label' => __('Description', 'sleek'),
		'instructions' => __('Enter a description for the attachments.', 'sleek'),
		'type' => 'wysiwyg',
		'media_upload' => false
	],
	[
		'name' => 'attachments-files',
		'label' => __('Files', 'sleek'),
		'instructions' => __('Select any number of files.', 'sleek'),
		'type' => 'repeater',
		'sub_fields' => [
			[
				'name' => 'attachments-files-file',
				'label' => __('Select a file', 'sleek'),
				'type' => 'file'
			]
		]
	]
];