<?php
class BootSomeCard extends HealElement {
	public function header(){
		$element = new BootSomeElement('div');
		$this->appendChild($element);
		$element->at(['class'=>'card-header']);
		return $element;
	}

	public function body(){
		$element = new BootSomeElement('div');
		$this->appendChild($element);
		$element->at(['class'=>'card-body']);
		return $element;
	}

	public function footer(){
		$element = new BootSomeElement('div');
		$this->appendChild($element);
		$element->at(['class'=>'card-footer']);
		return $element;
	}
}
?>
