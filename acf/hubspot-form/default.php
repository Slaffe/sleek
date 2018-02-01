<section id="hubspot-form">

	<?php if ($data['hubspot-form-title'] or $data['hubspot-form-description']) : ?>
		<header>

			<?php if ($data['hubspot-form-title']) : ?>
				<h2>
					<?php if ($data['hubspot-form-pre-title']) : ?>
						<small><?php echo $data['hubspot-form-pre-title'] ?></small>
					<?php endif ?>
					<?php echo $data['hubspot-form-title'] ?>
				</h2>
			<?php endif ?>

			<?php echo $data['hubspot-form-description'] ?>

		</header>
	<?php endif ?>

	<?php if ($hsId = get_theme_mod('hubspot_portal_id')) : ?>
		<!--[if lte IE 8]>
			<script charset="utf-8" src="//js.hsforms.net/forms/v2-legacy.js"></script>
		<![endif]-->
		<script charset="utf-8" src="//js.hsforms.net/forms/v2.js"></script>
		<script>
			hbspt.forms.create({
				css: '',
				portalId: '<?php echo $hsId ?>',
				formId: '<?php echo $data['hubspot-form-id'] ?>',
				onFormSubmit: function ($form) {
					document.getElementById('hubspot-form').scrollIntoView();
				}
			});
		</script>
	<?php else : ?>
		<p class="error"><?php _e('Please make sure to enter a valid Hubspot Portal ID inside Appearance -> Customize -> Theme settings', 'sleek') ?></p>
	<?php endif ?>

</section>