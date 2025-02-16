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
		$this->addAttributeKeys(['method', 'action', 'data-form-tag']);
		$this->addAttributes([
			'method' => $method ?? self::METHOD_GET,
			'action' => ROOT_URL . "/$action",
			'data-form-tag' => $this->getFormTagAttribute()
		]);
		$this->templateFile = 'default.php';
	}

	protected function getFileDirectoryPath() : string
	{
		return '/templates/form-elements/forms';
	}

	private function getFormTagAttribute() : string
	{
		$classTag = explode('\\', $this::class);

		return implode(
			'-', array_map(
				'strtolower', array_filter(
					preg_split('/(?=[A-Z])/', end($classTag))
				)
			)
		);
	}

	protected function getPropertyValue(string $key)
	{
		if ($value = parent::getPropertyValue($key)) {
			return $value;
		}

		return match($key) {
			'elements' => $this->$key,
			default => null
		};
	}

	public function setElements(array $elements) : void
	{
		foreach ($elements as $element) {
			if (!is_object($element) || !is_subclass_of($element::class, 'App\Html\HtmlElement')) {
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
			[
				'name' => 'lib/js/app/files/form.js',
				'is_module' => true
			]
		];
	}
}
