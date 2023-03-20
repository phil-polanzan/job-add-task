<?php
$obj = $args['obj'];

// custom setting for attributes
$objAttributes = $obj->getAttributes();
$mapFn = function ($key, $value) {
	$key = trim($key);
	$value = trim($value);

	return "$key=\"$value\"";
};
$elementAttributes = implode(' ', array_map($mapFn, array_keys($objAttributes), array_values($objAttributes)));
?>
<label for="<?php echo $obj->name; ?>"><?php echo $obj->label; ?></label>
<?php if ($obj->notes): ?>
	<br><em><?php echo $obj->notes; ?></em>
<?php endif; ?>
<input <?php echo $elementAttributes; ?>/>
