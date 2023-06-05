<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
abstract class BootSomeComponent implements HealComponent {
	protected $primary_element;

	public function el($name, $attributes = [], $append = false) : HealComponent {
		return $this->primary_element->el($name, $attributes, $append);
	}

	public function at($values, $append = false) : HealComponent {
		return $this->primary_element->at($values, $append);
	}
	public function te($str, $break_on_newline = false) : HealComponent {
		return $this->primary_element->te($str, $break_on_newline);
	}
	public function co($str) : HealComponent {
		return $this->primary_element->co($str);
	}
	public function fr($str) : bool {
		return $this->primary_element->fr($str);
	}
	public function __call($name, $arguments){
		return HealDocument::try_plugin($this->primary_element, $name, $arguments);
	}
}