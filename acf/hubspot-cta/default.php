<?php $options = get_option(SLEEK_SETTINGS_NAME) ?>

<?php if (isset($options['hubspot_portal_id']) and !empty($options['hubspot_portal_id'])) : ?>
	<section id="hubspot-cta">

		<span class="hs-cta-wrapper" id="hs-cta-wrapper-<?php echo $hubspot_cta_id ?>">
			<span class="hs-cta-node hs-cta-<?php echo $hubspot_cta_id ?>" id="hs-cta-<?php echo $hubspot_cta_id ?>">
				<!--[if lte IE 8]><div id="hs-cta-ie-element"></div><![endif]-->
				<a href="https://cta-redirect.hubspot.com/cta/redirect/<?php echo $options['hubspot_portal_id'] ?>/<?php echo $hubspot_cta_id ?>" target="_blank">
					<img class="hs-cta-img" id="hs-cta-img-<?php echo $hubspot_cta_id ?>" src="https://no-cache.hubspot.com/cta/default/<?php echo $options['hubspot_portal_id'] ?>/<?php echo $hubspot_cta_id ?>.png">
				</a>
			</span>
			<script charset="utf-8" src="https://js.hscta.net/cta/current.js"></script>
			<script type="text/javascript">
				hbspt.cta.load(<?php echo $options['hubspot_portal_id'] ?>, '<?php echo $hubspot_cta_id ?>', {});
			</script>
		</span>

	</section>
<?php else : ?>
	<p class="error"><?php _e('Please make sure to enter a valid Hubspot Portal ID inside Settings -> Sleek', 'sleek') ?></p>
<?php endif ?>
