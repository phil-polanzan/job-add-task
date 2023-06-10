<?php

namespace App\Html;

use App\Exceptions\HtmlElementException;

abstract class HtmlElement
{
	private string $label;
	private array $attributeKeys = ['class', 'id'];
	private ?string $templateFile = null;
	private array $attributes = [
		'class' => '',
		'id' => ''
	];

	public function __construct(string $label)
	{
		$this->label = trim($label);
	}

	public function __get(string $key)
	{
		// todo check if either attribute of property exists

		$value = $this->attributes[$key] ?? null;

		if (in_array($key, $this->attributeKeys) && !is_null($value)) {
			return $value;
		} elseif ($value = $this->getPropertyValue($key)) {
			return $value;
		}

		return null;
	}

	public function __set(string $key, $value) : void
	{
		if (in_array($key, $this->attributeKeys)) {
			$this->addAttributes([$key => $value]);
		} elseif (in_array($key,  ['templateFile', 'attributes'])) {
			switch ($key) {
				case 'attributes':
					$this->attributes = $value;
					break;

				case 'templateFile':
					$this->templateFile = $value;
					break;
			}
		}
	}

	protected function getPropertyValue(string $key)
	{
		return match($key) {
			'label', 'attributes', 'attributeKeys', 'templateFile' => $this->$key,
			default => null
		};
	}

	public function addAttributes(array $attributes) : void
	{
		foreach ($attributes as $key => $value) {
			$attributes[strtolower($key)] = is_null($value) ? '' : trim($value);
		}

		$this->attributes = array_merge($this->attributes, $attributes);
	}

	protected function addAttributeKeys(array $keys) : void
	{
		$this->attributeKeys = array_unique(array_merge($this->attributeKeys, $keys));
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

	public static function formatString(string $string) : string
	{
		return str_replace(' ', '-', strtolower($string));
	}

	public function getAttributesHtmlString(array $additionalAttributes = []) : string
	{
		return $this->formatHtmlAttributesString(array_merge($this->attributes, $additionalAttributes));
	}

	protected function formatHtmlAttributesString(array $attributes) : string
	{
		$mapFn = function ($key, $value) {
			$value = trim($value);
			return "$key=\"$value\"";
		};

		return implode(' ', array_map($mapFn, array_keys($attributes), array_values($attributes)));
	}
}
