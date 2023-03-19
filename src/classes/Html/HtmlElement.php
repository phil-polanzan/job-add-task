<?php

namespace App\Html;

abstract class HtmlElement
{
	private array $attributeKeys;
	private array $attributes;

	public function getAttributes() : array
	{
		return $this->attributes;
	}

	protected function getAttributeKeys() : array
	{
		return $this->attributeKeys;
	}

	/**
	 * remove duplicate properties
	 * // todo check if there's a more elegant way to achieve it
	 */
	private function sanitiseAttribute(array $attributes) : array
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

		return $attributes;
	}

	protected function addAttributeKeys(array $keys) : void
	{
		$this->attributeKeys = array_unique(array_merge($this->attributeKeys, $keys));
	}

	public function addAttributes(array $attributes) : void
	{
		$this->attributes = array_merge(
			$this->attributes, $this->sanitiseAttribute($attributes), $this->parseClassAttribute($attributes)
		);
	}

	public function getAttribute($key)
	{
		return $this->attributes[$key] ?? null;
	}

}