<?php
$class = $obj->class;
$class .= $obj->required ? 'required' : '';
?>
<label for="<?php echo $obj->name; ?>" class="form-label <?php echo $class; ?>"><?php echo $obj->label; ?></label>
<?php if ($obj->notes): ?>
	<br><em><?php echo $obj->notes; ?></em>
<?php
endif;
