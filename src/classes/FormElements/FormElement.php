<?php

namespace App\FormElements;


use App\Exceptions\HtmlElementException;
use App\Html\HtmlElement;

abstract class FormElement extends HtmlElement
{
	private string $notes = '';
	private string $validationErrorMessage = '';

	public function __construct(string $name, ?string $label)
	{
		parent::__construct($label ?? $name);
		$this->addAttributeKeys(['name', 'required']);
		$this->addAttributes(['name' => $name]);
	}

	/**
	 * @throws HtmlElementException
	 */
	public function __get(string $key)
	{
		$value = parent::__get($key);

		if (!is_null($value)) {
			return $value;
		}

		throw new HtmlElementException("$key attribute not found");
	}

	protected function getClassProperty(string $key)
	{
		$value = parent::__get($key);

		if (!is_null($value)) {
			return $value;
		} elseif (in_array($key, ['notes', 'validationErrorMessage'])) {
			$value = null;

			switch ($key) {
				case 'notes':
					$value = $this->notes;
					break;

				case 'validationErrorMessage':
					$value = $this->validationErrorMessage;
					break;
			}
		}

		return $value;
	}

	public function setNotes(string $notes) : void
	{
		$this->notes = $notes;
	}

	public function setValidationErrorMessage(string $validationErrorMessage) : void
	{
		$this->validationErrorMessage = $validationErrorMessage;
	}

	public function addAttributes(array $attributes) : void
	{
		parent::addAttributes($attributes);

		if (!isset($attributes['id'])) {
			$attributes['id'] = $this->getAttribute('name');
		}

		$attributes['required'] ??= false;
		$attributes['required'] = (bool)$attributes['required'];
		$this->setAttributes(array_merge($this->getAttributes(), $attributes));
	}

	public function getAttributesHtmlString(array $additionalAttributes = []) : string
	{
		$formAttributes = array_merge($this->getAttributes(), $additionalAttributes);
		$required = $formAttributes['required'] ?? false;
		unset($formAttributes['required']);

		return $this->formatHtmlAttributesString($formAttributes) . ($required ? ' required' : '');
	}
}
