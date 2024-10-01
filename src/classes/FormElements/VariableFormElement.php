<?php

namespace App\FormElements;

abstract class VariableFormElement extends FormElement
{
	private string $notes = '';
	private string $validationErrorMessage = '';

	public function __construct(string $name, ?string $label)
	{
		parent::__construct($label ?? $name);
		$this->addAttributeKeys(['name', 'required']);
		$this->addAttributes(['name' => $name]);
	}

	protected function getPropertyValue(string $key)
	{
		if ($value = parent::getPropertyValue($key)) {
			return $value;
		}
		return match($key) {
			'notes', 'validationErrorMessage' => $this->$key,
			default => null
		};
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
		if (!isset($attributes['id'])) {
			$attributes['id'] = $this->name;
		}

		$attributes['required'] ??= false;
		$attributes['required'] = (bool)$attributes['required'];
		parent::addAttributes($attributes);
	}

	public function getAttributesHtmlString(array $additionalAttributes = []) : string
	{
		$formAttributes = array_merge($this->attributes, $additionalAttributes);
		$required = $formAttributes['required'] ?? false;
		unset($formAttributes['required']);

		return $this->formatHtmlAttributesString($formAttributes) . ($required ? ' required' : '');
	}
}
