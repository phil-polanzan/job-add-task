<?php

namespace App\FormElements;


use App\Exceptions\HtmlElementException;
use App\Html\HtmlElement;

abstract class FormElement extends HtmlElement
{
	private string $label;
	private string $templateFile;
	private string $notes;

	public function __construct(string $name, ?string $label)
	{
		$this->label = $label ?? $name;
		$this->addAttributeKeys(['name', 'id', 'required', 'class']);
		$this->addAttributes(['name' => $name]);
	}

	/**
	 * @throws HtmlElementException
	 */
	public function __get(string $key)
	{
		if (in_array($key, $this->getAttributeKeys()) && $value = $this->getAttribute($key)) {
			return $value;
		} elseif (in_array($key, ['label', 'notes'])) {
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

	public function setNotes(string $notes) : void
	{
		$this->notes = $notes;
	}

	protected function setTemplateFile(string $file) : void
	{
		$this->templateFile = $file;
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

		$mapFn = function ($key, $value) {
			return "$key=\"$value\"";
		};

		$args = ['obj' => $this];
		require $file;
	}

	protected function parseClassAttribute(array $attributes) : array {
		if (!isset($attributes['id'])) {
			$attributes['id'] = $this->name;
		}

		$attributes['required'] ??= false;
		$attributes['required'] = (bool)$attributes['required'];

		return $attributes;
	}
}
