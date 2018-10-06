<?php
class BootSomeTable extends HealElement {
	public function thead(){
		$element = new BootSomeTableNode('thead');
		$this->appendChild($element);
		return $element;
	}

	public function tbody(){
		$element = new BootSomeTableNode('tbody');
		$this->appendChild($element);
		return $element;
	}
}

class BootSomeTableNode extends HealElement {
	public function tr($color = null){
		$element = new BootSomeTableTr('tr');
		$this->appendChild($element);
		if($color) $element->at(['class'=>'table-'.$color]);
		return $element;
	}
}

class BootSomeTableTr extends HealElement {
	public function td($color = null){
		$element = new BootSomeElement('td');
		$this->appendChild($element);
		if($color) $element->at(['class'=>'table-'.$color]);
		return $element;
	}

	public function th($color = null){
		$element = new BootSomeElement('th');
		$this->appendChild($element);
		if($color) $element->at(['class'=>'table-'.$color]);
		return $element;
	}
}
?>