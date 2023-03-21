<?php

namespace App\Forms;

use App\Exceptions\HtmlElementException;
use App\Exceptions\FormException;
use App\Html\HtmlElement;

class Form extends HtmlElement
{
	const METHOD_GET = 'GET';
	const METHOD_POST = 'POST';

	private array $elements;

	public function __construct(string $label, string $action, ?string $method = null)
	{
		parent::__construct($label);
		$this->addAttributeKeys(['method', 'action']);
		$this->addAttributes([
			'method' => $method ?? self::METHOD_GET,
			'action' => ROOT_URL . "/$action"
		]);
	}

	protected function getPropertyValue(string $key)
	{
		if ($value = parent::getPropertyValue($key)) {
			return $value;
		}

		switch ($key) {
			case 'elements':
				$value = $this->elements;
				break;

			default:
				$value = null;
		}

		return $value;
	}

	public function setElements(array $elements) : void
	{
		foreach ($elements as $element) {
			if (!is_object($element) || !is_subclass_of(get_class($element), 'App\Html\HtmlElement')) {
				throw new FormException("Error on setting elements");
			}

			$this->elements[self::formatString($element->label)] = $element;
		}
	}

	public function addAttributes(array $attributes) : void
	{
		if (!isset($attributes['id'])) {
			$attributes['id'] = self::formatString((trim($this->label)));
		}

		parent::addAttributes($attributes);
	}

	public function getCssFiles() : array
	{
		return [
			'lib/css/vendor/bootstrap/bootstrap.min.css',
			'lib/css/vendor/bootstrap/bootstrap-datepicker.css',
			'lib/css/vendor/summernote/summernote.min.css',
			'lib/css/app/form.css'
		];
	}

	public function getJsFiles() : array
	{
		return [
			['name' => 'lib/js/vendor/jquery/jquery-3.6.4.min.js'],
			['name' => 'lib/js/vendor/popper/popper.min.js'],
			['name' => 'lib/js/vendor/bootstrap/bootstrap.min.js'],
			['name' => 'lib/js/vendor/bootstrap/bootstrap-datepicker.min.js'],
			['name' => 'lib/js/vendor/summernote/summernote.min.js'],
		];
	}
}
