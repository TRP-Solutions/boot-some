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

	public function listgroup(){
		$listgroup = new BootSomeCardListGroup('div');
		$this->appendChild($listgroup);
		$listgroup->at(['class'=>'list-group list-group-flush']);
		return $listgroup;
	}

	public function footer(){
		$element = new BootSomeElement('div');
		$this->appendChild($element);
		$element->at(['class'=>'card-footer']);
		return $element;
	}
}

class BootSomeCardListGroup extends BootSomeElement {
	public function item(){
		$item = $this->el('div',['class'=>'list-group-item']);
		return $item;
	}
}
?>
