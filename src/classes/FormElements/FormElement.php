<?php

namespace App\FormElements;


use App\Exceptions\HtmlElementException;
use App\Html\HtmlElement;

abstract class FormElement extends HtmlElement
{
	private string $notes;

	public function __construct(string $name, ?string $label)
	{
		parent::__construct($label ?? $name);
		$this->addAttributeKeys(['name', 'id', 'required', 'class']);
		$this->addAttributes(['name' => $name]);
	}

	/**
	 * @throws HtmlElementException
	 */
	public function __get(string $key)
	{
		if ($value = parent::__get($key)) {
			return $value;
		} elseif (in_array($key, ['notes'])) {
			return $this->$key;
		}

		throw new HtmlElementException("$key attribute not found");
	}

	public function setNotes(string $notes) : void
	{
		$this->notes = $notes;
	}

	public function addAttributes(array $attributes) : void
	{
		parent::addAttributes($attributes);

		if (!isset($attributes['id'])) {
			$attributes['id'] = $this->name;
		}

		$attributes['required'] ??= false;
		$attributes['required'] = (bool)$attributes['required'];
		$this->setAttributes(array_merge($this->getAttributes(), $attributes));
	}
}
