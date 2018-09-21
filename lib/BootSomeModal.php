<?php
class BootSomeModalElement extends BootSomeElement {
	public function header() {
		$element = new BootSomeModalHeaderElement('div');
		$this->appendChild($element);
		$element->at(['class'=>'modal-header']);
		return $element;
	}

	public function footer() {
		$element = $this->el('div',['class'=>'modal-footer']);
		return $element;
	}

	public function body() {
		return $this->el('div',['class'=>'modal-body']);
	}
}

class BootSomeModalHeaderElement extends BootSomeElement {
	public function title($text) {
		$return = $this->el('h3',['class'=>'modal-title'])->te($text);
	}

	public function close() {
		return $this->el('button',['class'=>'close'])->te('×');
	}
}
?>