<?php
$objAttributes = $obj->attributes;
$objAttributes['class'] .= ' form-control';

if (isset($class)) {
	$objAttributes['class'] .= " $class";
}

if (isset($additionalAttributes)) {
	$objAttributes = array_merge($objAttributes, $additionalAttributes);
}

$elementAttributes = $obj->getAttributesHtmlString($objAttributes);
