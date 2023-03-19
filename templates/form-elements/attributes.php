<?php
$objAttributes = $obj->getAttributes();
$objAttributes['class'] .= ' form-control';

if (isset($class)) {
	$objAttributes['class'] .= " $class";
}

if (isset($additionalAttributes)) {
	$objAttributes = array_merge($objAttributes, $additionalAttributes);
}

$mapFn = function ($key, $value) {
	$key = trim($key);
	$value = trim($value);

	return "$key=\"$value\"";
};

$elementAttributes = implode(' ', array_map($mapFn, array_keys($objAttributes), array_values($objAttributes)));
