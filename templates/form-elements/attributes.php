<?php
$objAttributes = $obj->getAttributes();
$objAttributes['class'] .= ' form-control';

if (isset($class)) {
	$objAttributes['class'] .= " $class";
}

$elementAttributes = $obj->getAttributesHtmlString($objAttributes);

