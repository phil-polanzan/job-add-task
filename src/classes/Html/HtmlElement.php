<?php

namespace App\Html;

abstract class HtmlElement
{
	private array $attributeKeys;
	private array $attributes;

	protected function setAttributes(array $attributes) : void
	{
		$this->attributes = $attributes;
	}

	public function getAttributes() : array
	{
		return $this->attributes;
	}

	protected function getAttributeKeys() : array
	{
		return $this->attributeKeys;
	}

	protected function addAttributeKeys(array $keys) : void
	{
		$this->attributeKeys = array_unique(array_merge($this->attributeKeys, $keys));
	}

	public function addAttributes(array $attributes) : void
	{
		foreach ($attributes as $key => $value) {
			$key = strtolower($key);

			if (in_array($key, $this->attributeKeys)) {
				continue;
			}

			$value ??= trim($value);

			if (!empty($value)) {
				$attributes[strtolower($key)] = $value;
			}
		}

		$this->setAttributes(array_merge($this->attributes, $attributes));
	}

	public function getAttribute($key)
	{
		return $this->attributes[$key] ?? null;
	}
}
