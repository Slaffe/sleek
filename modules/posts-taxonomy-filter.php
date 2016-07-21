<?php
	$postType		= get_post_type();
	$taxs			= (is_search() or is_author() or is_tax() or is_date() or is_month() or is_year() or is_category()) ? false : get_object_taxonomies(get_post_type(), 'names');
	$taxConverter	= array(
		'category' => array(
			'rewrite' => 'cat',
			'property' => 'term_id'
		),
		'post_tag' => array(
			'rewrite' => 'tag'
		)
	);
?>

<?php if ($taxs) : ?>
	<form method="get" action="<?php echo get_post_type_archive_link($postType) ?>" data-submit-onchange>

		<?php foreach ($taxs as $tx) : $txTerms = get_terms(array('taxonomy' => $tx, 'hide_empty' => true)) ?>
			<?php
				$property = 'slug';

				# WordPress is so shit, we need to rename some (built in) taxonomies
				if (isset($taxConverter[$tx])) {
					if (isset($taxConverter[$tx]['property'])) {
						$property = $taxConverter[$tx]['property'];
					}

					$tx = $taxConverter[$tx]['rewrite'];
				}
			?>
			<?php if (count($txTerms) > 3) : ?>
				<p>
					<select name="<?php echo $tx ?>">
						<option value=""><?php _e('Choose ' . $tx, 'sleek') ?></option>
						<?php foreach ($txTerms as $txTerm) : ?>
							<option value="<?php echo $txTerm->{$property} ?>"<?php if (isset($_GET[$tx]) and $txTerm->{$property} == $_GET[$tx]) : ?> selected<?php endif ?>><?php echo $txTerm->name ?></option>
						<?php endforeach ?>
					</select>
				</p>
			<?php elseif (count($txTerms) > 0) : ?>
				<p>
					<?php _e('Show:', 'sleek') ?>
					<?php foreach ($txTerms as $txTerm) : ?>
						<label>
							<input type="checkbox" name="<?php echo $tx ?>[]" value="<?php echo $txTerm->{$property} ?>"<?php if (isset($_GET[$tx]) and in_array($txTerm->{$property}, $_GET[$tx])) : ?> checked<?php endif ?>>
							<?php echo $txTerm->name ?>
						</label>
					<?php endforeach ?>
				</p>
			<?php endif ?>
		<?php endforeach ?>

		<p class="submit"><input type="submit" value="<?php _e('Ok', 'sleek') ?>"></p>

	</form>
<?php endif ?>
