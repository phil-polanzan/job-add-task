<?php
$objAttributes = $obj->getAttributes();
$objAttributes['class'] .= ' form-control';

if ($class) {
	$objAttributes['class'] .= " $class";
}

if ($additionalAttributes) {
	$objAttributes = array_merge($objAttributes, $additionalAttributes);
}

$mapFn = function ($key, $value) {
	return "$key=\"$value\"";
};

$elementAttributes = implode('', array_map($mapFn, array_keys($objAttributes), array_values($objAttributes)));
