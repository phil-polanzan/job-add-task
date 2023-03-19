<?php

namespace App\FormElements;


use App\Exceptions\FormElementException;

abstract class FormElement
{
	private string $label;
	private string $templateFile;
	private array $attributes;
	private array $attributeKeys;
	private string $notes;

	public function __construct(string $name, ?string $label)
	{
		$this->label = $label ?? $name;
		$this->addAttributeKeys(['name', 'id', 'required', 'class']);
		$this->addAttributes(['name' => $name]);
	}

	/**
	 * @throws FormElementException
	 */
	public function __get(string $key)
	{
		if (in_array($key, $this->attributeKeys) && $value = $this->getAttribute($key)) {
			return $value;
		} elseif (in_array($key, ['label', 'notes', 'attributes'])) {
			return $this->$key;
		}

		throw new FormElementException("$key attribute not found");
	}

	public function __set(string $key, $value) : void
	{
		if (in_array($key, $this->attributeKeys)) {
			$this->addAttributes([$key => $value]);
		}

		throw new FormElementException("$key attribute not found");
	}

	public function getAttribute($key)
	{
		return $this->attributes[$key] ?? null;
	}

	protected function addAttributeKeys(array $keys) : void
	{
		$this->attributeKeys = array_unique(array_merge($this->attributeKeys, $keys));
	}

	public function setNotes(string $notes) : void
	{
		$this->notes = $notes;
	}

	protected function setTemplateFile(string $file) : void
	{
		$this->templateFile = $file;
	}

	/**
	 * @throws FormElementException
	 */
	public function render() : void
	{
		$file = ROOT_PATH . "/templates/form-elements/{$this->templateFile}";

		if (!file_exists($file)) {
			throw new FormElementException("$file not found");
		}

		$mapFn = function ($key, $value) {
			return "$key=\"$value\"";
		};

		$args = ['obj' => $this];
		require $file;
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

	protected function parseClassAttribute(array $attributes) : array {
		if (!isset($attributes['id'])) {
			$attributes['id'] = $this->name;
		}

		$attributes['required'] ??= false;
		$attributes['required'] = (bool)$attributes['required'];

		return $attributes;
	}

	public function addAttributes(array $attributes) : void
	{
		$this->attributes = array_merge(
			$this->attributes, $this->sanitiseAttribute($attributes), $this->parseClassAttribute($attributes)
		);
	}
}
