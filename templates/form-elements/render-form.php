<div class="row form-wrapper">
	<?php
	$mapFn = function ($key, $value) {
		return "$key=\"$value\"";
	};
	$formAttributes = $form->getAttributes();
	$elementAttributes = implode(' ', array_map($mapFn, array_keys($formAttributes), array_values($formAttributes)));
	?>
	<form <?php echo $elementAttributes; ?> novalidate>
		<?php foreach ($form->elements as $element): ?>
			<div class="row">
				<?php $element->render(); ?>
			</div>
		<?php endforeach; ?>
	</form>
</div>
