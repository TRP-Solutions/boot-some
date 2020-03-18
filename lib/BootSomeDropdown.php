<?php
class BootSomeDropDown extends BootSomeElement {
	public function a($href, $text = '', $active = false){
		$a = parent::a($href, $text);
		$a->at(['class'=>'dropdown-item']);
		if($active) $a->at(['class'=>'active'], HEAL_ATTR_APPEND);
		return $a;
	}
}