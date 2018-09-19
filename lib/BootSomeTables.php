<?php
class BootSomeTableElement extends HealElement {
	public function thead() {
		$element = new BootSomeTableNodeElement('thead');
		$this->appendChild($element);
		return $element;
	}
	public function tbody() {
		$element = new BootSomeTableNodeElement('tbody');
		$this->appendChild($element);
		return $element;
	}
}

class BootSomeTableNodeElement extends HealElement {
	public function tr($color = null) {
		$element = new BootSomeTableTrElement('tr');
		$this->appendChild($element);
		if($color) $element->at(['class'=>'table-'.$color]);
		return $element;
	}
}

class BootSomeTableTrElement extends HealElement {
	public function td($color = null) {
		$element = new BootSomeElement('td');
		$this->appendChild($element);
		if($color) $element->at(['class'=>'table-'.$color]);
		return $element;
	}
	public function th($color = null) {
		$element = new BootSomeElement('th');
		$this->appendChild($element);
		if($color) $element->at(['class'=>'table-'.$color]);
		return $element;
	}
}
?>