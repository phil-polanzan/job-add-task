<div class="row form-wrapper">
	<form <?php echo $form->getAttributesHtmlString(); ?> novalidate>
		<?php foreach ($form->elements as $element): ?>
			<div class="row">
				<?php $element->render(); ?>
			</div>
		<?php endforeach; ?>
	</form>
</div>
