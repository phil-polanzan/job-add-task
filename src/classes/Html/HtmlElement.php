<?php

namespace App\Html;

use App\Exceptions\HtmlElementException;

abstract class HtmlElement
{

	private string $label;
	private array $attributeKeys;
	private string $templateFile;
	private array $attributes;

	public function __construct(string $label)
	{
		$this->label = $label;
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


	/**
	 * @throws HtmlElementException
	 */
	public function __get(string $key)
	{
		if (in_array($key, $this->getAttributeKeys()) && $value = $this->getAttribute($key)) {
			return $value;
		} elseif (in_array($key, ['label'])) {
			return $this->$key;
		}

		throw new HtmlElementException("$key attribute not found");
	}

	public function __set(string $key, $value) : void
	{
		if (in_array($key, $this->getAttributeKeys())) {
			$this->addAttributes([$key => $value]);
		}

		throw new HtmlElementException("$key attribute not found");
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
}
