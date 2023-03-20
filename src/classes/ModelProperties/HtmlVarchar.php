<?php

namespace App\ModelProperties;

class HtmlVarchar extends Property
{
	public function sanitise() : void
	{
		$text = stripslashes($this->getValue());
		$text = trim($text);
		$text = str_replace(['<br/>', '<br />'], '<br>', $text);
		$text = str_replace(['<p><br></p>', '</p><p>'], '<br>', $text);
		$text = str_replace(['<p>', '</p>'], '', $text);
		$text = str_replace('&nbsp;', ' ', $text);
		// check if the text has just <br> in the content
		$tmpText = trim(str_replace('<br>', ' ', $text));

		if (strlen($tmpText) == 0) {
			$text = '';
		}

		// remove leading and ending break rows
		$text = preg_replace('/(<br>)+$/', '', $text);
		$text = preg_replace('/^(<br>)+/', '', $text);

		$this->setValue($text);
	}
}
