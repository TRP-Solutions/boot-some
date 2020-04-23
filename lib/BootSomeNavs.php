<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
class BootSomeNavs extends HealElement {
	public function item(){
		$element = new BootSomeNavsNode('item');
		$this->appendChild($element);
		$element->at(['class'=>'nav-item']);
		return $element;
	}
}

class BootSomeNavsNode extends BootSomeElement {
	public function a($href, $text = '', $active = false){
		$a = parent::a($href, $text);
		$a->at(['class'=>'nav-link']);
		if($active) $a->at(['class'=>'active'], HEAL_ATTR_APPEND);
		return $a;
	}
}
