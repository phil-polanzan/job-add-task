<?php
$objAttributes = $obj->attributes;
$objAttributes['class'] .= ' form-control';
if ($class) {
	$objAttributes['class'] .= " $class";
}

$mapFn = function ($key, $value) {
	return "$key=\"$value\"";
};

$objAttributes = $obj->attributes;
$elementAttributes = implode('', array_map($mapFn, array_keys($objAttributes), array_values($objAttributes)));
