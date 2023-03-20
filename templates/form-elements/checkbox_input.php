<?php $obj = $args['obj']; ?>
<label for="<?php echo $obj->name; ?>"><?php echo $obj->label; ?></label>
<?php if ($obj->notes): ?>
	<br><em><?php echo $obj->notes; ?></em>
<?php endif; ?>
<input <?php echo $obj->getAttributesHtmlString(); ?>/>
