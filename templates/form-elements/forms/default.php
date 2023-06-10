<?php $obj = $args['obj']; ?>
<div class="row form-wrapper">
	<form <?php echo $obj->getAttributesHtmlString(); ?> novalidate>
		<?php foreach ($obj->elements as $element): ?>
			<div class="row">
				<?php $element->render(); ?>
			</div>
		<?php endforeach; ?>
	</form>
</div>
