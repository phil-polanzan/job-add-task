<?php

namespace App\Html;

use App\Exceptions\HtmlElementException;

abstract class HtmlElement
{

	private string $label;
	private array $attributeKeys = ['class', 'id'];
	private ?string $templateFile = null;
	private array $attributes = [];

	public function __construct(string $label)
	{
		$this->label = trim($label);
		$this->setAttributes([
			'class' => '',
			'id' => ''
		]);
	}

	public function __get(string $key)
	{
		$value = $this->getAttribute($key) ?? null;

		return !is_null($value) ? $value : $this->getClassProperty($key);
	}

	/**
	 * @throws HtmlElementException
	 */
	public function __set(string $key, $value) : void
	{
		if (in_array($key, $this->getAttributeKeys())) {
			$this->addAttributes([$key => $value]);
		}

		throw new HtmlElementException("$key attribute not found");
	}

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
			$attributes[strtolower($key)] = is_null($value) ? '' : trim($value);
		}

		$this->attributes = array_merge($this->attributes, $attributes);
	}

	public function getAttribute($key)
	{
		return $this->attributes[$key] ?? null;
	}

	protected function getClassProperty(string $key)
	{
		$value = null;

		if (in_array($key, ['label', 'attributes', 'attributeKeys'])) {
			switch ($key) {
				case 'label':
					$value = $this->label;
					break;

				case 'attributes':
					$value = $this->attributes;
					break;

				case 'attributeKeys':
					$value = $this->attributeKeys;
					break;
			}
		}

		return $value;
	}

	/**
	 * @throws HtmlElementException
	 */
	public function render() : void
	{
		$file = ROOT_PATH . "/templates/form-elements/{$this->templateFile}";

		if (!file_exists($file)) {
			throw new HtmlElementException("$file not found");
		}

		$args = ['obj' => $this];
		require $file;
	}

	protected function setTemplateFile(string $file) : void
	{
		$this->templateFile = $file;
	}

	public static function formatString(string $string) : string
	{
		return str_replace(' ', '-', strtolower($string));
	}

	public function getAttributesHtmlString(array $additionalAttributes = []) : string
	{
		return $this->formatHtmlAttributesString(array_merge($this->getAttributes(), $additionalAttributes));
	}

	protected function formatHtmlAttributesString(array $attributes) : string
	{
		$mapFn = function ($key, $value) {
			return "$key=\"$value\"";
		};

		return implode(' ', array_map($mapFn, array_keys($attributes), array_values($attributes)));
	}
}
